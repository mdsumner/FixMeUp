<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1><EM>FixMeUp!</EM> Instructions</H1>

<P>This page talks about what <EM>FixMeUp!</EM> does and explains how to use
it to find the right gears for your fixed-gear or single-speed bike.
</P>

<p> These instructions are written to work for all versions of
<em>FixMeUp!</em>, which are similar enough that you&#39;ll have no trouble moving
between them.  There are no separate instuctions for the <a
href="javafmu.php">Java versions</A> or the <a href="formfmu.php">html version</a>; 
the downloadable <a href="downloads.php">Windows and Mac versions</a> do come with
manuals, however.</p>

<p>
Caveat: the html version lacks some of the features described here.  That said, it&#39;s
by far the easiest and fastest to use, so you may want to start with it.
</p>

<P>Here&#39;s a table of contents.<BR>

<BR>What <EM>FixMeUp!</EM> Does<BR>
	&nbsp;&nbsp;&nbsp;<A HREF="tutorial.php#problem">Problem</A><BR>
	&nbsp;&nbsp;&nbsp;<A HREF="tutorial.php#solution">Solution</A><BR>

<BR><A HREF="tutorial3.php">Using <EM>FixMeUp!</EM></A><BR>
	&nbsp;&nbsp;&nbsp;<A HREF="tutorial3.php">From a working gear</A><BR>
	&nbsp;&nbsp;&nbsp;<A HREF="tutorial3.php">From scratch</A><BR>

<BR><A HREF="tutorial1.php">Other features</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#selection_display">Selection display</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#cadence">Cadence</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#tire_size">Tire size</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#highlight_area">Highlight area</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#stretch">Stretch</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial1.php#halflink">Half-link</A><BR>

<BR><A HREF="tutorial2.php">Reading the display</A><BR>
&nbsp;&nbsp;&nbsp;<A HREF="tutorial2.php#highlight">What gears will fit</A><BR>

</P>

<HR>

<a href="problem"></a>
<H2>What <EM>FixMeUp!</EM> does</H2>
<H4>Problem Statement</H4>

<P>
There are three "problems" that contribute to making it hard to find the
right gear for a derailleur-less bike with vertical rear dropouts.<br>
</P>

<h4>Fixed chain path</h4>
<TABLE><TR>
<TD>
First, the chain "path" can&#39;t change.  Without a derailleur, the chain
wraps around the ring and cog and wants to take the shortest path between 
them.  On bikes designed to be used without derailleurs there&#39;s a provision
for changing the distance between the ring and cog in order to change the
length of the path, but of course vertical dropouts don&#39;t allow this.
</TD>
<TD><img src="./img/znoDer.png" 
     width="149" height="53" alt="fixed chain path"></TD>
</TR></TABLE>

<P>
<H4>Chains are 1&quot; long</H4>
Second, chain lengths can only be adjusted 1&quot; at a time.  Chains are made
up of links each exactly 1&quot; long (on a new chain, anyway).  So far nobody&#39;s
figure out how to remove less than one link.<BR>
</P>

<P>
<H4>The chain must be tight</H4>
Finally, the chain must fit snugly.  If a chain doesn&#39;t fit tightly enough
it will be thrown off by bumps in the road, uneven pedalling, or plain bad
luck.  In the worst scenario, losing a chain on a fixed gear can cause you
to crash.<BR>
</P>

<a name="solution"><h4>Solution</h4></a>
	
<P>
Imagine that you have a chain 47&quot; (47 links) long and that you want to
use it on a 42x16 gear (that&#39;s short for "42-tooth chainring paired
with a 16-tooth cog").  You&#39;re going to find a frame, or have one
built, to fit that gear and chain.  There will be exactly one
chainstay length (where "chainstay length" means the distance from the
center of the BB spindle to the center of the rear axle) that will fit
that gear and that chain.
</P>

<P>
Now imagine that you&#39;re going to be less picky about what length chain
you&#39;ll be using.  All you need now is a frame that will accomodate
<EM>any</EM> length chain on a 42x16.  There are a number of chainstay
lengths that will work for your chosen gear.  Since increasing the
length of the chainstay means both the top and bottom runs of chain
must be longer, those chainstay lengths will differ by about 1/2&quot;.
</P>

<P>
Now imagine that you don&#39;t care what cog and ring you use (as long as
the ring fits your crankset and somebody actually makes the cog.)  Agree
to accept  <EM>any</EM> cog/ring combination and <EM>any</EM> length chain
 -- only now let&#39;s try to make do with the frame you have.  Since there are
now a large number of possible chainstay lengths (each corresponding to one
of the ring/cog/chainlength combinations), there&#39;s only one question left
to be answered: <B>What ring/cog/chainlength combinations will fit my
frame with its particular chainstay length?</B>
</P>

<img src="./img/RB1.png" width="502" height="362" alt="<EM>FixMeUp!</EM> screenshot">

<P>
This is what <EM>FixMeUp!</EM> does.  You tell it how long your chainstay is and
what cogs and chainrings you can use.  It then produces a chart like the
one above.
</P>

<P>
Along the top are chainstay lengths, with yours at dead center.  Along the
left edge are gear inches (or meters, European style) that tell how hard
a gear is to push.  Each entry on the chart (such as our 42x16 example above)
represents a gear and is positioned to show what chainstay length the
gear requires and how difficult to push it will be.
</P>

<P>
All you need to do is select from those gears near the middle the gear
whose difficulty suites your riding style and present level of fitness.
</P>


<H2>How to use <EM>FixMeUp!</EM></H2>
<P>
There&#39;s only one difficult thing about using <EM>FixMeUp!</EM>: you have to
figure out very accurately how long your chainstay is.  If you still
need to measure your chainstays, we suggest you take a look at our
page on <A HREF="chainstay.php">chainstay measurement</A>.
</P>



EOF;

print_template_end();

?>