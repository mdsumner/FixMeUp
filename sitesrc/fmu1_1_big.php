<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<applet code="com/fixin/fmu1_1/fmu/FixMeUp.class" 
	width=900 height=800 align=bottom>
<PARAM name = "MaxRing" value = "53" >
<PARAM name = "MinRing" value = "39" >
<PARAM name = "MaxCog" value = "24" >
<PARAM name = "MinCog" value = "14" >
<PARAM name = "UserStaylen" value = "16.117" >
<PARAM name = "WheelCircumference" value = "700x23" >
<PARAM name = "FontSize" value = "14" >

<P>If you see this line your browser does not understand Java and will
not be able to run FixMeUp!</P>
</applet>


EOF;

print_template_end();

?>