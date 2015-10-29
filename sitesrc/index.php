<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);


print <<<EOF
<td>
<H1>Home Page for Fixed Innovations (and <EM>FixMeUp!</EM>)</H1>

<P><B>Welcome to Fixed Innovations.</B></P>
<P>
This site is primarily for people who want to convert their multi-speed
bicycles with vertical rear dropouts to fixed-gear or single-speed use. 
It takes you through the process of selecting gears that will fit your
frame, and makes suggestions for what to do if you aren't happy with the
gear choices for your frame.
</P>

<P>
I should mention: I've never seen a frame that couldn't be converted!
It's not that hard.
</P>

<P>
If this is your first time here, you may want to check out the
<A HREF="tutorial.php">Instructions for <EM>FixMeUp!</EM></A>
, which explain step-by-step how to figure out what gears will fit
your bike.
</P>

<HR>

<p>If <a href="mailto:fixin@eehouse.org">Eric House</a> ever gets around to doing a personal
page, this is likely where you'll find it.</p>

EOF;

print_template_end();
?>