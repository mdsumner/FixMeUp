<?php

include_once( "fmuutils.php" );

define( "RING", "Ring" );
define( "COG", "Cog" );
define( "STAYLEN",  "Stay_length" );
define( "CHAINLEN", "Chain_length" );
define( "GEARIN", "Gear_inches" );
define( "STAYRANGE", 0.3 );     // in inches

class Node
{
  var $data;
   
    function Node( $r, $c ,$sl, $cl, $gi )
    {
      $this->data[RING] = $r;
      $this->data[COG] = $c;
      $this->data[STAYLEN] = $sl;
      $this->data[CHAINLEN] = $cl;
      $this->data[GEARIN] = $gi;
    }

    function NodeToTH( $file, $sortKey ) {
      print( "<tr><td></td>" );

      foreach( $this->data as $key => $value ) {
        print( "<th>" );
        if ( $key != $sortKey ) {
            print( "<a href=\"" . strip_tags($file) . 
                   "?sortKey=" . strip_tags($key) . "\">" );
        }
        print( "$key" );
        if ( $key != $sortKey ) {
          print( "</a>" );
        }
        print( "</th>" );
      }
      print( "</tr>" );
    }

    function NodeToTR( $count, $metric, $useHalfLink ) {
      print( "<tr>" );
      printf( "<td>$count</td>" );
      printf( "<td>%d</td>" , $this->Ring() );
      printf( "<td>%d</td>" , $this->Cog() );

      $stayLen = $this->StayLen();
      if ( $metric ) {
        $stayLen *= 2.54;
      }
      printf( "<td>%.3f</td>" , $stayLen );

      if ( $useHalfLink ) {
        printf( "<td>%.1f</td>" , $this->Links()/2 );
      } else {
        printf( "<td>%d</td>" , $this->Links()/2 );
      }
      printf( "<td>%.1f</td>" , $this->Gear() );
      print( "</tr>\n" );
    }

    function Ring() {
      return $this->data[RING];
    }

    function Cog() {
      return $this->data[COG];
    }

    function Gear() {
      return $this->data[GEARIN];
    }

    function Staylen() {
      return $this->data[STAYLEN];
    }

    function Links() {
      return $this->data[CHAINLEN];
    }

    

}

function buildNodeList( $bigRing, $smallRing, $bigCog, $smallCog, 
                        $stayLenInIn, $wheelDiam, $stretch, $useHalfLink )
{
  $result = array();
//   error_log( "bigRing=$bigRing");
//   error_log( "smallRing=$smallRing");
//   error_log( "bigCog=$bigCog");
//   error_log( "smallCog=$smallCog");
//   error_log( "stayLenInIn=$stayLenInIn");
//   error_log( "wheelDiam=$wheelDiam");
//   error_log( "stretch=$stretch" );
//   error_log( "isMetric=$isMetric");

  $minStayLen = $stayLenInIn - (STAYRANGE/2.0);
  $maxStayLen = $stayLenInIn + (STAYRANGE/2.0);

  //error_log( "figuring staylens from $minStayLen in. to $maxStayLen in." );

  for ( $ring = $bigRing; $ring >= $smallRing; --$ring ) {
    for ( $cog = $bigCog; $cog >= $smallCog; --$cog ) {

      $perim = perimeterFromGear( $ring, $cog, $minStayLen );
      $minHalfLinks = chainBound( $perim, $stretch, true, 
                                  $useHalfLink );

      $perim = perimeterFromGear( $ring, $cog, $maxStayLen );
      $maxHalfLinks = chainBound( $perim, $stretch, false, 
                                  $useHalfLink );

//       print( "$ring x $cog: running from $minHalfLinks to $maxHalfLinks<br>" );

      for ( $curHalfLinks = $minHalfLinks;
            $curHalfLinks <= $maxHalfLinks;
            $curHalfLinks += $useHalfLink ? 1 : 2 )	{
        // start too big and work down
        $curStayLength = 
          calcStayForGear( $ring, $cog,
                           stretch( $curHalfLinks * 0.5, $stretch ), 
                           $maxHalfLinks );

        if ( ($curStayLength <= $maxStayLen )
             && ($curStayLength >= $minStayLen ) ) {
						
          // now print the chainlength.  If it's for display to the
          // user, we need it in inches (rather than half-inches),
          // but unless halfLinks are enabled there's no need to
          // print as a float since there won't be any half sizes.

          $node = new Node( $ring, $cog, 
                            $curStayLength,
                            $curHalfLinks, ($ring*$wheelDiam)/$cog );
          array_push( $result, $node );
        }
      }
    }
  }

//   error_log( "buildNodeList returning " . Count($result) . " nodes." );
  return $result;
} // buildNodeList

function perimeterFromGear( $ring, $cog, $stayLength )
{
    $cogRadius = $cog / (4 * M_PI);
    $ringRadius = $ring / (4 * M_PI);

    $theta = acos( ($ringRadius-$cogRadius)/$stayLength)*(180/M_PI);

    $result = ((180-$theta) * M_PI * $ringRadius + $theta * M_PI * $cogRadius +
               180 * sqrt( pow($stayLength,2) - 
                           pow(($ringRadius-$cogRadius),2) ))
      / 90;

//     print( "perimeterFromGear($ring,$cog,$stayLength)=>$result<br>" );

    return $result;
} // perimeterFromGear

function chainBound( $d, $stretch, $upper, $useHalfLink )
{
    // considering stretch and whether halfLinks are enabled, return
    // the number of halflinks needed to create the chain whose lenght
    // is just above or below d

  $oneLink = stretch( $useHalfLink? 0.5: 1.0, $stretch );
  $linkCount = floor($d / $oneLink);
  $temp = $oneLink * $linkCount;

  if ( ($upper) && ($temp != $d) ) {
	$linkCount++;
  }

  if ( !$useHalfLink ) {
	$linkCount *= 2;
  }

  return $linkCount;
} // chainBound


function stretch( $chainlen, $stretch )
{
  return $chainlen + (( $chainlen * $stretch) / 12 );
}

function calcStayForGear( $ring, $cog, $chainLen, $trialStayLength )
{
  $kTolerance = 0.0001;
  $counter = 6;

//   print( "calcStayForGear($ring, $cog, $chainLen, $trialStayLength ) =>" );

  while ( --$counter > 0 ) {
    // compare with chainLen (target) and adjust
	$curDiff = perimeterFromGear( $ring, $cog, $trialStayLength )
      - $chainLen;

    // this is ok as the only way it can be below 0 is if greater than
    // -kTolerance

	if ( $curDiff < $kTolerance ) {
      break;
	} else {
      $trialStayLength -= $curDiff/2.0;
	}
  }

  if ( $counter <= 0 ) {
	$trialStayLength = 0.0;
  }

//   print( "$trialStayLength<br>" );
  return $trialStayLength;
} // calcStayForGear

?>
