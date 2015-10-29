<?php


include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1><EM>FixMeUp!</EM> Instructions (continued)</H1>


<H2>Other Features</H2>

<dl>

<A NAME="selection_display"><dt>Selection display</dt></A>

<dd>
In all but the <a href="formfmu.php">html version</a> of <em>FixMeUp!</em> you can use the 
mouse to select a gear.  When you have selected a gear, it will be drawn surrounded by a 
black rectangle.
</dd>

<dd>
If you click on a spot where several gears overlap, <EM>FixMeUp!</EM> will cycle the
selection through each of them in turn.
</dd>

<dd>
Every version of <em>FixMeUp!</em> has a way of displaying extra information about the
currently selected gear.  In the Java versions there&#39;s an area of the display
set aside for this.  In the Mac and Windows versions you can bring up dialogs
with this information, either by double-clicking on the gear or by choosing
the appropriate menu item.
</dd>

<A NAME="#cadence"><dt>Cadence setting</dt></A>

<dd>
When <EM>FixMeUp!</EM> displays information about the selected gear it includes your
speed in that gear at minimum and maximum cadence.  You can change the
minimum and maximum cadence values if you like.
</dd>

<a name="#tire_size"><dt>Tire/wheel size</dt></a>

<DD>
In choosing where to put each gear in the chart, <EM>FixMeUp!</EM>
calculates gear inches using the formula <EM>ring_teeth *
wheel_diameter / cog_teeth</EM>.  The value for wheel_diameter is set
for a 23mm 700c tire by default, but you can set the value to
correspond to the wheels and tires you use on your bike.
</DD>


<a name="#highlight_area"><dt>Highlight area size</dt></a>

<DD>
The light blue column in the middle of the <EM>FixMeUp!</EM> display indicates what
gears will fit with the chainstay shown.  The default value (for most versions,
anyway) is for vertical dropouts.  The other interesting setting shows the
increased selection of gears available with a <A HREF="axle.php">
Fixed Innovations axle</A>.
</DD>

<DD>
You can also choose to turn the highlight area off, or to set it to show
what&#39;s available with horizontal dropouts.  Unless you have a very large 
monitor, this last setting will highlight your entire screen -- serving to
point out that cyclists with horizontal dropouts don&#39;t need <EM>FixMeUp!</EM> at all.
</DD>

<a name="stretch"><dt>Stretch</dt></a>

<DD>
Using chainstretch to shift the gears that will fit your frame is an
advanced topic covered by its very own <A HREF="stretch.php">page</A>.
Each version of <EM>FixMeUp!</EM> has a field in which you tell it how much stretch
your chain has.  Units are in inches <EM>over a 12-link length of chain</EM>,
and the range of legal values is from 0.00&quot; (for a brand new chain)
up to 0.125&quot (after which you ought to throw the chain away before it
damages your drivetrain further.)
</DD>

<A NAME="halflink"><dt>Half-link</dt></A>

<dd>
Half-links, in the track world of 1/8-inch chains, are nifty little chain links whose
plates are neither outer nor inner but instead bend inward so that they can mate with outer
plates on one end and with inner on the other.  The result is that your chain can be 
something-and-a-half inches long -- which for our purposes doubles the number of gears
on the chart.
</dd>

<dd> While I've never used a half-link on a 3/32 (derailleur) chain,
several riders have reported that they are available.  Here's <a
href="http://www.spicercycles.com/index.cgi?cat=18&sub_cat=half%20link%20chain%20link&prod_id=389&cat_desc=Mountain">one
source</a>.  If you know of others, please <a
href="mailto:fixin@eehouse.org">let me know!</a> </dd>

</dl>

EOF;

print_template_end();

?>