<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1><EM>FixMeUp!</EM></H1>

<P><EM>FixMeUp!</EM> is software that helps you figure out what gears will fit on
your fixed-gear or single-speed bike.  It&#39;s particularly useful for bike
frames with vertical dropouts, because on those frames you can&#39;t just move
the rear wheel to take up slack in the chain.
</P>

<P>There are four different versions of <EM>FixMeUp!</EM>.</P>

<P>First, there&#39;s the <A HREF="formfmu.php">HTML form version</A>.
This will run on any browser (including text-only browsers if you
choose the text-only option on the form) and requires no downloading.
</P>

<P>Next, there are several <A HREF="javafmu.php">Java versions</A>.
These require a browser that can run Java applets.
</P>

<P>Finally, there is a <A HREF="downloads.php">native version</A> for
Wintel computers.  This you have to download to your own computer,
then run it outside the browser.  But once you&#39;re done you can run
<EM>FixMeUp!</EM> without a network connection.  </P>

<P>We recommend that you start with the Java version if you can, or the
HTML version if your browser can&#39;t run Java.  If you find yourself hooked
on <EM>FixMeUp!</EM>, come back later and snag the native version that&#39;s right for
your machine.
</P>

<P>Enjoy!  And be sure to <a href="mailto:fixin@eehouse.org">let us know</a>  what you think.</P>

EOF;

print_template_end();

?>