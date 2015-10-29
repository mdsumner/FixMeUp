<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1><EM>FixMeUp!</EM> Instructions: Using <EM>FixMeUp!</EM></H1>

<P> Using <EM>FixMeUp!</EM> begins with figuring out how long your chainstay is.
Out to a couple of decimal places.  We're working on a <A
HREF="chainstay.php"> chainstay measurement page</A> to help with the
task; but until it's finished, a tape measure or yardstick is about
the best you can do.  </P>

<P>Once you know your chainstay length, you're pretty much done.  Plug it
into the &quot;Chainstay&quot; field in <EM>FixMeUp!</EM>.  Fill in the fields for
the largest and smallest chainrings you can get for the crank on your
bike.  Fill in the fields for the largest and smallest cogs you have or
will be using.
</P>

<P>(Your local bike shop can help determine what the range
is; last I checked EuroAsia was making top-quality cogs with from 14-18
teeth.  If you're less picky the range is broader.  And of course if you're
setting up a single-speed with a freewheel or cassette cog the range is
larger still.)
</P>

<P>Now click the &quot;Apply&quot; button.  <EM>FixMeUp!</EM> will display the gears
that come closest to fitting your chainstay (assuming you measured it
correctly. :-)  For help in interpreting what you see, see the section on
<A HREF="tutorial2.php">interpreting results</A>.
</P>

<HR>

<P><EM>FixMeUp!</EM> has a number of additional features not directly related to
displaying the gears that will work on a frame.  They're explained 
<A HREF="tutorial1.php">here</A>.
</P>

EOF;

print_template_end();

?>