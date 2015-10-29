<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1>Java versions of <EM>FixMeUp!</EM></H1>

<table>
<tr>
<td><img src="./img/5perc.png"></td>
<td>The Java version of <EM>FixMeUp!</EM> was first, and was also among the first serious applets written.  It won a &quot;Top 5 Percent&quot; award back in 1996.
</td></tr>
</table>


<P>In case you missed them, here are the <A
HREF="tutorial.php">Instructions for <EM>FixMeUp!</EM></A>.</P>

<applet code="com/fixin/fmu1_1/fmu/FixMeUp.class" 
	width=500 height=400 align=bottom>
<PARAM name = "MaxRing" value = "53" >
<PARAM name = "MinRing" value = "39" >
<PARAM name = "MaxCog" value = "24" >
<PARAM name = "MinCog" value = "14" >
<PARAM name = "UserStaylen" value = "16.117" >
<PARAM name = "WheelCircumference" value = "700x23" >
<PARAM name = "FontSize" value = "14" >

<P>If you see this line your browser does not understand Java and will
not be able to run FixMeUp!</P>
</APPLET>

<p>
If you have a larger screen, try <a href="fmu1_1_big.php">this bigger 
version</a>.
</p>


<p> If you haven&#39;t used <EM>FixMeUp!</EM> before and want to find
 out in advance what to expect, check out the <A
 HREF="tutorial.php"><EM>FixMeUp!</EM> instructions</A>.  </p>

EOF;

print_template_end();

?>