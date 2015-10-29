<?php

include_once( "engine.php" );
include_once( "fmuutils.php" );

define( "KCHARTTOP",  25 );
define( "KBOTTOMMARGIN", 15 );
define( "KFIAXLEADJUST", 2.0 );
define( "KGEARHEIGHT", 10 );
define( "KPIXELSPERROW", 50 );
define( "KHORIZONTALINTERVAL", 0.05 );
define( "KTEXTHEIGHT", 12 );

$vals = checkVals( getValsFrom_REQUEST( $defaultValues, $_REQUEST) );

// error_log( "makepng using: maxRing=$maxRing; minRing = $minRing" );
// error_log( "makepng using: maxCog=$maxCog; minCog = $minCog" );
// error_log( "stayLen=$stayLen; wheelDiam=$wheelDiam" );

$stayInIn = $vals["stayLen"];
if ( $vals["isMetric"] ) {
  $stayInIn /= 2.54;
}

$nodes = buildNodeList( $vals["maxRing"], $vals["minRing"],
                        $vals["maxCog"], $vals["minCog"],
                        $stayInIn,
                        $vals["wheelDiam"], $vals["stretch"],
                        $vals["useHalfLink"] );

printPng( $stayInIn, $vals["isMetric"], $nodes, 
          adjustToNum($vals["axleAdjust"]) );

/*****************************************************************************
 * Functions below this point
 *****************************************************************************/

function printPng( $center, $metric, $nodes, $rgnWidth )
{
  getSizeForImage( $nodes, $center,
                   // the rest are out params:
                   $width, $height, $maxGear, $chainstayMin );

  $height += KCHARTTOP;
  $width += KLEFTOFFSET + NODEWIDTH;//strwidth( "40x13", gdMediumBoldFont );

  $im = @imagecreate ($width, $height + KBOTTOMMARGIN)
    or die ("Cannot Initialize new GD image stream");
  //error_log( "built $width x $height image" );
  $background_color = imagecolorallocate($im, 255, 255, 255);
  $text_color = imagecolorallocate ($im, 233, 14, 91);

  $colors["hilite"] = imagecolorallocate ($im, 225, 225, 255);
  $colors["gray"] = imagecolorallocate ($im, 200, 200, 200 );
  $colors["black"] = imagecolorallocate ($im, 0, 0, 0);

  $colors["red"] = imagecolorallocate($im, 255, 0, 0);
  $colors["blue"] = imagecolorallocate($im, 0, 255, 0);
  $colors["green"] = imagecolorallocate($im, 0, 0, 255);
  $colors["cyan"] = imagecolorallocate($im, 0, 255, 255);
  $colors["magenta"] = imagecolorallocate($im, 255, 0, 255);

  paintStayArea( $im, $center, $width, $height, $chainstayMin, $rgnWidth, 
                 $colors );
  drawGrid( $im, $width, $height, $maxGear, $colors );
  drawVerts( $im, $center, $width, $height, $metric, $chainstayMin, $colors );

  foreach ( $nodes as $node ) {
    plot( $im, 3, $node, $chainstayMin, $maxGear, $colors );
  }

  writeChainColors( $im, $height, $colors );

  header( "Content-type: image/png" );
  imagepng( $im );
  imagedestroy( $im );
} // printPng

function plot( $im, $font, $node, $minStay, $maxGear, $colors )
{
  global $chainLengthsUsed;

  $isHalflink = (($node->Links())%2) == 1;
  $staylen = $node->Staylen(); // will be in metric if not using inches

  $x = floor((($staylen - $minStay) / KPIXELLENGTH));
  $x += KLEFTOFFSET;
  $y = ( $maxGear - $node->Gear() ) * KGEARHEIGHT;
  $y += KCHARTTOP;
  $y -= 5;
  $str = sprintf( "%d%s%d", $node->Ring(), 
                  $isHalflink?"*":"x", $node->Cog() );
  $color = colorForChain( $node->Links() );
  imagestring( $im, $font, $x, $y, $str, $colors[$color] );
 //  error_log( "plot at $x,$y" );

  $chainLengthsUsed[$node->Links()] = $color;
}  // plot

function writeChainColors( $im, $height, $colors )
{
  global $chainLengthsUsed;
  if ( $chainLengthsUsed ) {
    ksort( $chainLengthsUsed, SORT_NUMERIC );
    $x = KLEFTOFFSET;
    $y = $height;

    $str = "Chainlengths (in 1\" links):";

    imagestring( $im, 2, $x, $y, $str, $colors["black"] );
    $x += strlen($str) * 6.5;

    foreach ( $chainLengthsUsed as $len=>$color ) {
      if ( ($len % 2) == 0 ) {
        $str = sprintf( "%d", $len/2 );
      } else {
        $str = sprintf( "%.1f", $len/2 );
      }
      imagestring( $im, 2, $x, $y, $str, $colors[$color] );
      $x += (strlen($str) * 6.5) + 3;
    }

    global $useHalfLink;
    if ( $useHalfLink ) {
      $str = "(* means half-link)";
      imagestring( $im, 2, $x, $y, $str, $colors["black"] );
    }
  }
} // writeChainColors

function colorForChain( $nLinks )
{
  $nLinks %= 5;
  switch( $nLinks ) {
  case 0: return "red";
  case 1: return "blue";
  case 2: return "green";
  case 3: return "cyan";
  case 4: return "magenta";
  }
} // colorForChain

function getSizeForImage( $nodes, $center, 
                          &$width, &$height, &$maxGear, &$minStay )
{
  $minGear = 1000.0;
  $maxGear = 0.0;
  $minStay = 100.00;
  $maxStay = 0.0;

  foreach ( $nodes as $node ) {
    $gear = $node->Gear();
    if ( $minGear > $gear ) { $minGear = $gear; }
    if ( $maxGear < $gear ) { $maxGear = $gear; }
  }

  $minStay = $center - (STAYRANGE/2);
  $maxStay = $minStay + STAYRANGE;

  $width = ($maxStay-$minStay) / KPIXELLENGTH;
  $height = ($maxGear - $minGear + 3) * KGEARHEIGHT;
  
  if ( $height < 70 * KGEARHEIGHT ) {
      $height = 70 * KGEARHEIGHT;
  }
} // getSizeForImage

function paintStayArea( $im, $center, $width, $height, $stayMin, $rgnWidth,
                        $colors )
{
  $rectMiddle = KLEFTOFFSET + (($center - $stayMin)/KPIXELLENGTH);

  $rectWidth = ($rgnWidth / 25.4)/ KPIXELLENGTH;
  $left = $rectMiddle - round($rectWidth/2);
  if ( $left < KLEFTOFFSET) {
	$left = KLEFTOFFSET;
  }

  imagefilledrectangle( $im, $left, KCHARTTOP, $left+$rectWidth,
                        $height, $colors["hilite"] );
} // paintStayArea

function drawGrid( $im, $width, $height, $maxGear, $colors )
{
    if ( $maxGear == 0 ) {
        $maxGear = 99;
    }
  for ( $i = 0; ; ++$i ) {
    $thisHeight = $i * KPIXELSPERROW + KCHARTTOP;

	if ( $thisHeight > $height ) {
      break;
	}

	$num = $maxGear - $i*5;		// 5 gear inches/row
	drawNumStringBefore( $im, KLEFTOFFSET,
                         $thisHeight-10/2,
                         $num, "\"", $colors["black"] );
    imageline( $im, KLEFTOFFSET, $thisHeight, $width, $thisHeight,
               $colors["gray"] );
  }
  imageline( $im, KLEFTOFFSET, $height, $width,
             $height, $colors["gray"] );
} // drawGrid

function drawVerts( $im, $center, $width, $height, $metric, $minStay, $colors )
{
  $inchesCenter = $center;
  $staylenAtStart = $inchesCenter;

  imageline( $im, KLEFTOFFSET, KCHARTTOP, KLEFTOFFSET, $height,
             $colors["gray"] );
 
  for ( $staylenToDraw = $staylenAtStart; ;
        $staylenToDraw += KHORIZONTALINTERVAL ) {
	if ( !drawOneVert( $im, $width, $height, $metric, $staylenToDraw, $minStay, 
                       true, $colors ) ) {
      break;
	}
  }

  for ( $staylenToDraw = $staylenAtStart; ; ) {
	$staylenToDraw -= KHORIZONTALINTERVAL;
	if ( !drawOneVert( $im, $width, $height, $metric, $staylenToDraw, 
                       $minStay, false, $colors ) ) {
      break;
    }
  }
} // drawVerts

function drawOneVert( $im, $width, $height, $metric, 
                      $staylen, $minStay, $forward, 
                      $colors )
{

  $leftCoord = KLEFTOFFSET +
	round(($staylen-$minStay)/KPIXELLENGTH);

  if ( $forward && $leftCoord > $width ) {
	return false;
  }

  if ( (!$forward) && $leftCoord < KLEFTOFFSET ) {
	return false;
  }

  imageline( $im, $leftCoord, KCHARTTOP, $leftCoord, $height, 
             $colors["gray"] );   

  $str = sprintf( "%.2f%s",
                  ($metric ?  $staylen * 2.54 : $staylen),
                  ($metric ?  " cm" : "\"" ) );

  $leftCoord -= strlen($str) * 3;
  imagestring( $im, 2, $leftCoord, KCHARTTOP-KTEXTHEIGHT, $str,
                $colors["black"] );

  return true;
} // drawOneVert

function drawNumStringBefore( $im, $x, $y, $num, $suffix, $color )
{
  $str = sprintf( "%d%s", $num, $suffix );
  $x -= strlen($str) * 6.5;//strwidth( $str, gdSmallFont );
  imagestring( $im, 2, $x, $y, $str, $color );
  return strlen($str);
} // drawNumStringBefore
?>
