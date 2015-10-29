<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1>Using Chainstretch with <EM>FixMeUp!</EM></H1>

<P>Normally <EM>FixMeUp!</EM> assumes that your chain is exactly 1&quot; long per
link.  It draws gears on the chart based on that assumption.  And we
recommend that you use a new chain in order to keep the assumption valid
and to eliminate an unnecessary variable.
</P>

<P>
Using a slightly worn chain has a dramatic effect on the results <EM>FixMeUp!</EM>
produces -- as you can see if you select a gear in the middle of the chart
and then redraw using a very small stretch value, say 0.01.  If you find
that there is no workable gear that will fit your frame, you can use 
chainstretch to your advantage.  This page tells you how.
</P>

<P>More to come....</P>

EOF;

print_template_end();

?>