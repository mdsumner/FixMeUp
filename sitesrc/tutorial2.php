<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1><EM>FixMeUp!</EM> Instructions continued: interpreting the results</H1>

<P>Below is a picture of the Java 1.0.2 version of <EM>FixMeUp!</EM>.
I&#39;ll describe reading the display using this picture.  While other
versions of <EM>FixMeUp!</EM> look slightly different, you'll have no trouble
applying what you read here to using those versions.</P>

<P> The numbers along the top of the chart tell you that the chart
shows gears for chainstays ranging from 16.00&quot; to about
16.25&quot;.  And the numbers along the left margin indicate that
gears ranging from 80&quot; down to about 55&quot; are displayed.  To
change the range of gear inches shown you need only scroll the chart
using the scrollbar.  To change the chainstay, enter a new value in
the chainstay field and click on the &quot;Apply&quot; button.  </P>

<P>The label above the middle vertical line is the length of the chainstay
the chart was generated for.  The gears closest to the middle line are
the one's we're interested in.
</P>

<img src="./img/RB1.png" align=center alt="Screenshot">


<a href="#highlight"</a>
<P> The light blue highlight area gives <EM>FixMeUp!</EM>'s
guess at the range of gears that will fit on a frame with the
chainstay length for which the chart was drawn.  The area shown above
is for a frame with vertical dropouts using a standard axle.  With a
horizontal axle the area is several times wider than the chart; with a
<a href="axle.php">Fixed Innovations axle</a> it's about four times
the width you see here.  </P>

<P>The gears you can use in your frame -- assuming all the inputs are
correct! -- are those with their left edges in the blue area.  In this
case, that means 40x14, 42x16 and 44x18.  And maybe a few others in the
part of the chart that's scrolled out of view above or below.
</P>

<P> The purple region at the lower left of <EM>FixMeUp!</EM>&#39;s display gives
detailed information about whatever gear is selected (the 42x16 in the
middle of the chart, in this case.)  The location of this detail area
is one thing that differs among the various <EM>FixMeUp!</EM> versions; in some
it&#39;s in a separate dialog.  </P>

EOF;

print_template_end();

?>