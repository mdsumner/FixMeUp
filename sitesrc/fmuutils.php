<?php

include_once( "engine.php" );

$defaultValues = array(
  "maxRing" => 53,
  "minRing" => 34,
  "maxCog" => 20, 
  "minCog" => 13, 
  "stayLen" => 42.0,
  "wheelDiam" => 26.16,
  "isMetric" => true,              // true
  "display" => "png", 
  "useHalfLink" => false,
  "stretch" => 0.0, 
  "axleAdjust" => "vert",
  "sortKey" => "STAYLEN",
  );

define( "KLEFTOFFSET", 30 );
define( "KPIXELLENGTH", 0.0005 );
define( "NODEWIDTH", 40 );

function getValsFrom_REQUEST( $invals )
{
  $newArray = array();

  foreach( $invals as $name => $value ) {
    if ( isset( $_REQUEST[$name] ) ) {
      $newArray[$name] = $_REQUEST[$name];
    } else {
      $newArray[$name] = $value;
    }
  }
  
  return $newArray;
}

function coerceToRangeNums( $val, $metric, $lbound, $ubound )
{
  if ( $metric ) {
    $val /= 2.54;           // make it inches
  }

  if ( $val < $lbound ) {
    $val = $lbound;
  } elseif ( $val > $ubound ) {
    $val = $ubound;
  }
  if ( $metric ) {
    $val *= 2.54;           // make it cm
  }
  return $val;
}

function coerceToRangeArray( $val, $okVals )
{
  foreach( $okVals as $oneVal ) {
    if ( $oneVal == $val ) {
      return $val;
    }
  }
  return $okVals[0];
}

// Force all values into a legal range
function checkVals( $vals )
{
  if ( $vals["maxRing"] > 60 ) { $vals["maxRing"] = 60; }
  if ( $vals["minRing"] < 20 ) { $vals["minRing"] = 20; }
  if ( $vals["maxRing"] < $vals["minRing"] ) {
    $vals["maxRing"] = $vals["minRing"];
  }

  if ( $vals["maxCog"] > 34 ) { $vals["maxCog"] = 34; }
  if ( $vals["minCog"] < 9 ) { $vals["minCog"] = 9; }
  if ( $vals["maxCog"] < $vals["minCog"] ) {
    $vals["maxCog"] = $vals["minCog"];
  }

  $vals["stayLen"] = coerceToRangeNums( $vals["stayLen"], $vals["isMetric"], 
                                        10, 25 );
  $vals["wheelDiam"] = coerceToRangeNums( $vals["wheelDiam"], 
                                          false, 19.15, 26.84 );
  $vals["stretch"] = coerceToRangeNums( $vals["stretch"], false,
                                        0.000, 0.050 );

  $vals["axleAdjust"] = coerceToRangeArray( $vals["axleAdjust"],
                                            array( "fi", 
                                                   "vert",
                                                   "hor",
                                                   "none" ) );

  $vals["sortKey"] = coerceToRangeArray( $vals["sortKey"],
                                         array( STAYLEN,
                                                COG,
                                                RING,
                                                CHAINLEN,
                                                GEARIN ) );


  $vals["display"] = coerceToRangeArray( $vals["display"],
                                         array( "table",
                                                "png" ) );


  return $vals;
}

function logArray( $arr )
{
  $str = "";

  foreach( $arr as $name => $val ) {
    $str .= "$name=$val :: ";
  }
  
  error_log( $str );
}

function paramsToUrl( $vals )
{
  $str = "";
  $firstPass = 1;
  foreach ( $vals as $name => $val ) {

    if ( $firstPass ) {
      $firstPass = 0;
    } else {
      $str .= "&";
    }

    $str .= "$name=$val";
  }
  return $str;
}

function adjustToNum( $siz )
{
  if ( $siz == "hor" ) {
    return 10.0;
  } elseif ( $siz == "none" ) {
    return 0;
  } elseif ( $siz == "vert" ) {
    return 0.5;
  } else {
    return 2.0;
  }
}

?>