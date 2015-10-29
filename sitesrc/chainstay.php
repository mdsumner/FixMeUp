<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1>Fixed Innovations' Chainstay Measurement guide</H1>

<P>This page is incomplete.</P>

<P>Getting a measurement of your chainstay that's accurate enough to
make using <EM>FixMeUp!</EM> effortless isn't easy.  We think we have a method
that will work, but have not had time to test it yet, let alone to
write it up here.</P>

<P>For now, the best you can do is to use a tape measure.  Chainstay
length is the distance from the middle of your rear dropout where the
axle sits to the middle of the bottom bracket spindle.  Measure that
length as close to the chain path as you can.  And try to be accurate.</P>

<HR>

<P>The method we want to test will work like this (if it works at all
:-): You'll pick a chainring and cog, run the chain around them as if
to make a single-speed (i.e. not through the rear derailleur) and then
cut the chain so that it's just short of closing.  You'll then use
calipers, if you have them, or a ruler, to measure the gap between the
centers of the pins nearest the ends of the chain -- which should be
less than 1&quot;.  From this number and the sizes of your cog and
chainring it should be possible to produce a number of guesses at your
chainstay length, each 1/2&quot; apart.  You should then be able to
pick the right one with a ruler if not just by eye.  </P>

<P> (Don't worry: if this
method works we'll put a calculator on this page to produce those
guesses for you.)  </P>

EOF;

print_template_end();

?>