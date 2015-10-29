<?php

include_once( "fmuinc.php" );
include_once( "engine.php" );
include_once( "fmuutils.php" );

$vals = getValsFrom_REQUEST( $defaultValues, $_REQUEST);

$vals = checkVals( $vals );

$localStayLen = $vals["stayLen"]; 
if ( $vals["isMetric"] ) {
  $localStayLen /= 2.54;
}


/*****************************************************************************
 * Print the form with current values displayed, or defaults if first
 * time through or reset
 ****************************************************************************/

print_template_start($PHP_SELF);

print( "<h2><em>FixMeUp!</em> Online" 
       . " (<a href=\"$url?"
       . paramsToUrl( shiftStayBy($vals, 0))
       . "\">copy this link</a>)</h2>"
       );

print( "<form action=\"" . basename($PHP_SELF). "\" method=post>\n" );

if ( $vals["display"] == "table" ) {
  $pngChecked = "";
  $tableChecked = "checked";
} elseif ( $vals["display"] == "png" ) {
  $pngChecked = "checked";
  $tableChecked = "";
}
print( "Display as chart<input type=\"RADIO\" name=\"display\" value=\"png\" $pngChecked> or " );
print( "tabulated text<INPUT TYPE=\"radio\" name=\"display\" VALUE=\"table\" $tableChecked>\n" );
print( "<br>\n" );

print( "Teeth on chainrings: largest: <input type=text NAME=\"maxRing\" SIZE=2 VALUE=\""
       . $vals["maxRing"] . "\">" );
print( "and smallest: <input type=text NAME=\"minRing\" size=2 value=\""
       . $vals["minRing"] . "\">" );
print( "<br>\n" );

print( "Teeth on cogs: largest: <input type=text NAME=\"maxCog\" SIZE=2 "
       . "VALUE=\"" . $vals["maxCog"] . "\">" );
print( "and smallest: <INPUT TYPE=TEXT NAME=\"minCog\" size=2 value=\""
       . $vals["minCog"] . "\">" );
print( "<br>\n" );

if ( $vals["isMetric"] ) {
  $metricChecked = "checked";
  $inchesChecked = "";
} else {
  $metricChecked = "";
  $inchesChecked = "checked";
}
print( "Units below are "
       . "centimeters<input type=\"radio\" name=\"isMetric\" value=\"1\" "
       . "$metricChecked> "
       . "or inches<input type=\"radio\" name=\"isMetric\" value=\"0\" "
       . "$inchesChecked>" );
print( "<br>\n" );

print( "Chainstay length (in above units): <input type=text name=\"stayLen\" "
       . "size=6 value=\"" );
printf( "%.3f", $vals["isMetric"]? $localStayLen * 2.54: $localStayLen );
print( "\">\n" );
print( "<br>\n" );

// If add something that increases the range (larger than 26.84 or
// smaller than 19.15, need to also fix params to coerceToRangeNums(
// $vals["wheelDiam"], ...) in function checkVals() in fmuutils.php.
$tireDiams = array( "26.8" => "700x35",
                    "26.27" => "700x28",
                    "26.16" => "700x23",
                    "26.08" => "700x20",
                    "26.84" => "27x1.25",
                    "25.63" => "26x1.9",
                    "23.97" => "26(559mm)x1.0",
                    "24.49" => "26(650c)x1.0",
                    "21.97" => "24x1",
                    "19.15" => "20x1.75",
                    );

print( "Tire diameter: <select name=\"wheelDiam\" >\n" );
optionsFromArray( $tireDiams, $vals["wheelDiam"] );
print( "</select><br>\n" );

if ( $vals["useHalfLink"] ) {
  $halfChecked = "checked";
  $noHalfChecked = "";
} else {
  $halfChecked = "";
  $noHalfChecked = "checked";
}
print( "Include <a href=\"tutorial1.php#halflink\">half-link</a>? \n"
       . "Yes<input type=\"radio\" name=\"useHalfLink\" value=\"1\" \n"
       . "$halfChecked> \n"
       . " No<input type=\"radio\" name=\"useHalfLink\" value=\"0\" \n"
       . "$noHalfChecked> <br>" );

print( "<a href=\"stretch.php\">Chain stretch</a> "
       . "(in inches per 12 inches of chain):\n"
       . "<input type=text NAME=\"stretch\" SIZE=4 \n"
       . "VALUE=\"" . sprintf( "%.2f", $vals["stretch"]) . "\">"
       . "<br>" );

if ( $vals["display"] == "png" ) {
  $adjusts = array( "none" => "Off",
                    "vert" => "Vertical",
                    "fi" => "Fixed. Inn.",
                    "hor" => "Horizontal",
                    );
  print( "<a href=\"tutorial1.php#highlight_area\">Highlight area</a>: <select
name=\"axleAdjust\" >\n" );
  optionsFromArray( $adjusts, $vals["axleAdjust"] );
  print( "</select><br>\n" );
}

print( "<div align=\"center\"> "  /*<input type=reset value=\"Reset form\">"*/
       . "<input type=submit name=generate value=\"Generate\">"
       . "</div>\n" );

print( "</form>\n" );


if ( $vals["display"] == "png" ) {

  print( "<table><tr valign=\"top\">" );
  $url = basename($PHP_SELF);
  print( "<td><a href=\"$url?" 
         . paramsToUrl( shiftStayBy($vals, -(STAYRANGE/2)) )
         . "\"><img src=\"img/left.png\"></a></td>\n" );
  print( "<td><img src=\"makepng.php?" . paramsToUrl($vals) . "\""
         . " width=\"" . ((STAYRANGE/KPIXELLENGTH) + KLEFTOFFSET + NODEWIDTH)
         . "\"></td>\n" );
  print( "<td><a href=\"$url?" 
         . paramsToUrl( shiftStayBy($vals, STAYRANGE/2) )
         . "\"><img src=\"img/right.png\"></a></td>\n" );
  print( "</tr></table>" );

} elseif ( $vals["display"] == "table" ) {

  print( "<hr>\n" );

  $nodes = buildNodeList( $vals["maxRing"], $vals["minRing"], 
                          $vals["maxCog"], $vals["minCog"], 
                          $localStayLen, $vals["wheelDiam"], 
                          $vals["stretch"], $vals["useHalfLink"] );

  $sorter = getSortFunction( $vals["sortKey"] );
  if ( $sorter ) {
    usort( $nodes, $sorter );
  }

  print( "\n<br><table border=2>" );

  // first can provide header as well as any
  if ( Count($nodes) > 0 ) {
    $nodes[0]->NodeToTH( basename($PHP_SELF), $vals["sortKey"], $vals );
  }
  $count = 1;
  foreach( $nodes as $node ) {
    $node->NodeToTR( $count++, $vals["isMetric"], $vals["useHalfLink"] );
  }

  print( "</table>" );
}

print_template_end();

/******************************************************************************
 * Functions follow
 ******************************************************************************/

function optionsFromArray( $data, $curVal )
{
  foreach( $data as $val => $name ) {
    print( "<option " );
    if ( $curVal == $val ) {
      print( " selected " );
    }
    print( "value=\"$val\">$name\n" );
  }
} // optionsFromArray

function numCmp( $na, $nb )
{
  $diff = $na - $nb;
  if ( $diff > 0 ) {
    return 1;
  } elseif ( $diff == 0 ) {
    return 0;
  } else {
    return -1;
  }
}

function cmpRings( $nodea, $nodeb )
{
  return numCmp( $nodea->Ring(), $nodeb->Ring() );
}

function cmpCogs( $nodea, $nodeb )
{
  return numCmp( $nodea->Cog(), $nodeb->Cog() );
}

function cmpStaylens( $nodea, $nodeb )
{
  return numCmp( $nodea->Staylen(), $nodeb->Staylen() );
}

function cmpChainlens( $nodea, $nodeb )
{
  return numCmp( $nodea->Links(), $nodeb->Links() );
}

function cmpGearins( $nodea, $nodeb )
{
  return numCmp( $nodea->Gear(), $nodeb->Gear() );
}

function getSortFunction( $sortKey )
{
  switch( $sortKey ) {
  case RING: return "cmpRings";
  case COG: return "cmpCogs";
  case STAYLEN: return "cmpStaylens";
  case CHAINLEN: return "cmpChainlens";
  case GEARIN: return "cmpGearins";
  }
  return 0;
}

function shiftStayBy( $vals, $dist )
{
  if ( $vals["isMetric"] ) {
    $dist *= 2.54;
  }
  $vals["stayLen"] += $dist;
  return $vals;
}

?>