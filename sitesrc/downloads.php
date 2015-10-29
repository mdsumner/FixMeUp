<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1>Downloading Native <EM>FixMeUp!</EM> Versions</H1>


<P><EM>FixMeUp!</EM> is available for Wintel boxes.  </P>

<P> This program is free for non-commercial use. By most standards
it's "better" (i.e. more powerful) than the original <A
HREF="javafmu.php ">Java</A> version, particularly if you want to open
multiple windows to compare different frames or gearing options.  </P>

<P>But because it runs directly on your hardware, you don't have the
Java guarantee that I can't erase your hard disk or something of the
like. I wouldn't do that, but then most of you don't know me, so if
either you or the owner of your computer is paranoid, go with the <A
HREF="formfmu.php">html form version</A> or one of the <A
HREF="javafmu.php ">Java versions</A>.</P>

<P>Documentation for Windows <em>FixMeUp!</em> (included in the
package you'll download) is sparse, but probably sufficient. If I've
left something obvious out you can always <a
href="mailto:fmu@eehouse.org">email me</a>. Please let me know about
bugs as well, of course. Really compelling feature requests might
persuade me to turn another version, but I'll probably leave it at
this.  I've been doing way too little fixed gear riding thanks to
various coding exercises.</P>

<H3>Click below to download...</H3>

<P>I had a seven-week sabbatical (from Apple Computer) in October and
November of 1996. One result was <A
HREF="/fmu/FixMeUp.exe"><EM>FixMeUp!</EM> for Windows</A>. It was my
first attempt at Windoze programming, and in fact I wrote and tested
it entirely on a PowerMac 8500 running SoftWindows.  (That was 1996:
now, in 2006, I've run it a lot on every version of WIndows since, and
am maintaining it using MinGW and WINE on Linux.  It rocks!).</P>

EOF;

print_template_end();

?>