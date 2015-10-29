<?php

function print_background()
{
  return "background=\"./img/cog.png\"";
}

function print_navbar_td( $self )
{
  $menuData = array( "index.php" => array("Home" , 0 ),
                     "why.php" => array("Why ride fixed?",0),
                     "fixin.php" => array("Fixed Innovations",0),
                     "axle.php" => array("FI Axle explained",1),
                     "products.php" => array("FI Products",1),
                     "order.php" => array("FI Order Form",1),
                     "fixmeup.php" => array("FixMeUp!", 0 ),
                     "tutorial.php" => array( "Instructions", 1 ),
                     "formfmu.php" => array("HTML form",1),
                     "javafmu.php" => array("Java",1),
                     "downloads.php" => array("Mac & Win",1),
                     "stretch.php" => array("Chainstretch",1),
                     "chainstay.php" => array("Chainstay Length",0),
                     "links.php" => array("Links",0),
                     "source.php" => array("Source",0),
                     "credits.php" => array("Credits",0),
                    );
print <<<EOF
  <TD WIDTH="99" VALIGN=TOP 
  height=100		
  bgcolor="CC99CC">	
  <CENTER>		
  <A HREF="credits.php"><IMG SRC="./img/rotation3_27.gif" WIDTH="99" HEIGHT="99" ALT="FI logo"></A>
  </CENTER>
  <font face="Arial, Helvetica, sanserif" size=2>
EOF;

 foreach( $menuData as $link => $arr ) {

   $txt = $arr[0];
   $cls = $arr[1] == 0? "" : "class=\"em1\"";

   print( "<div $cls>" );
   if ( $link != $self ) {
     print( "<a href=\"$link\">" );
   }
   print( "$txt" );
   if ( $link != $self ) {
     print( "</a>" );
   }
   print( "</div>\n" );
 }

print <<<EOF
<A HREF="mailto:fixin@eehouse.org">Mail us</A>		
	</FONT>								
	</td>								
	<td BACKGROUND="./img/smlink.png" WIDTH="18"			
	 bgcolor="CC99CC">						
	<IMG SRC="./img/trans.png" WIDTH=18 HEIGHT=1 ALT="">		
	</td>
EOF;
}

function print_navbar_bottom()
{
}

function print_bottom_timestamp()
{
  print( "<div align=\"center\">" );
  print( "Copyright 1996-2007 by Eric House & "
         . "Fixed Innovations\n" );

  print( "<br><em>If you notice problems with or have comments about "
         . "this site please let <a href=\"mailto:fixin@eehouse.org\">"
         . " me</a> know.</em>" );

  print( "</div>" );
}

function print_style($self)
{
  print <<<EOL
    <style type="text/css">
    h1,h2,h3,h4 { text-align: center; }
   .em1 { margin-left: 1em }
    dt { font-weight: bold; }
    dd { margin-bottom: 6px }
  </style>
EOL;
}

function print_template_start($self)
{
  $self = basename($self);

  print( "<html><head>" );

  print_style($self);

  print( "</head><body " . print_background() . ">" );

  print( "<div align=left>\n" );

  // Can't I just put the width in the div?  This table exists only to
  // have width....
  print( "<table width=\"600\"><tr><td>\n" );

  print( "<table border=0 cellspacing=0 cellpadding=5 >\n" );
  print( "<tr>" );

  print_navbar_td($self);
  print( "<td>" );
}


function print_template_end()
{
  print_navbar_bottom();
  print( "</td>" );

  print( "</tr></table>" );

  print_bottom_timestamp();

  print( "</td></tr></table\n" );

  print( "</div></body>" );
  print( "</html>" );
}

?>
