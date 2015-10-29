<?php

include_once( "fmuinc.php" );

print_template_start($PHP_SELF);

print <<<EOF

<H1>Fixed Innovations&#39; Price Sheet and Order Form </H1>

<P>We'd love to have a nice automated shopping-cart-style order system
here, but we'd either need to sell a few hundred extra hubs to pay
for it or else give up riding and do it ourselves.  We hope you'll
appreciate that, for now, we'll keep doing things the (comparably)
low-tech way: email.</P>

<P> What follows is a table listing the products we sell, the options
with which they're available, and their prices.  Ordering is simple:
pick what you want and tell us via MAILME(email).  We'll reply
confirming the price and to make arrangements to ship your new stuff
to you.  </P>

<TABLE BORDER=1 CELLPADDING=1 WIDTH="100%">
   <TR>
      <TD>
         <P>Fixed Innovations axle
      </TD><TD>
         <P>axle alone
      </TD><TD>
         <P>$32
      </TD></TR>
   <TR>
      <TD>
         <P>
      </TD><TD>
         <P>axle kit
      </TD><TD>
         <P>$35
      </TD></TR>
   <TR>
      <TD>
         <P>Bullseye double-sided hub
      </TD><TD>
         <P>rear only w/ stock axle
      </TD><TD>
         <P>$90
      </TD></TR>
   <TR>
      <TD>
         <P>
      </TD><TD>
         <P>rear only w/ FI axle
      </TD><TD>
         <P>$110
      </TD></TR>
   <TR>
      <TD>
         <P>
      </TD><TD>
         <P>pair w/ stock axle
      </TD><TD>
         <P>$150
      </TD></TR>
   <TR>
      <TD>
         <P>
      </TD><TD>
         <P>pair w/ FI axle
      </TD><TD>
         <P>$170
      </TD></TR>
   <TR>
      <TD>
         <P>Phil Wood single-sided fixed (w/lockring)
      </TD><TD>
         <P>rear only w/ 120mm axle
      </TD><TD>
         <P>$143
      </TD></TR>
   <TR>
      <TD>
         <P>&nbsp;&nbsp;(choose bolt-on <EM>or</EM> QR axle)</P>
      </TD><TD>
         <P>pair w/ 120mm axle
      </TD><TD>
         <P>$250
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>126 or 130mm axle upgrade
      </TD><TD>
         <P>$20</P>
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>135mm axle upgrade
      </TD><TD>
         <P>$35</P>
      </TD></TR>
   <TR>
      <TD>
         <P>Phil Wood double-sided freewheel/fixed (w/lockring)
      </TD><TD>
         <P>rear only w/ 120mm axle
      </TD><TD>
         <P>$160
      </TD></TR>
   <TR>
      <TD>
         <P>&nbsp;&nbsp;(choose bolt-on <EM>or</EM> QR axle)</P>
      </TD><TD>
         <P>pair w/ 120mm axle
      </TD><TD>
         <P>$267
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>126 or 130mm axle upgrade
      </TD><TD>
         <P>$20</P>
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>135mm axle upgrade
      </TD><TD>
         <P>$35</P>
      </TD></TR>
   <TR>
      <TD>
         <P>Phil Wood double-sided fixed (w/lockrings)
      </TD><TD>
         <P>rear only w/ 120mm axle
      </TD><TD>
         <P>$167
      </TD></TR>
   <TR>
      <TD>
         <P>&nbsp;&nbsp;(choose bolt-on <EM>or</EM> QR axle)</P>
      </TD><TD>
         <P>pair w/ 120mm axle
      </TD><TD>
         <P>$274
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>126 or 130mm axle upgrade
      </TD><TD>
         <P>$20</P>
      </TD></TR>
   <TR>
      <TD>
         &nbsp;
      </TD><TD>
         <P>135mm axle upgrade
      </TD><TD>
         <P>$35</P>
      </TD></TR>
   <TR>
      <TD>
         <P>Phil Wood "custom" drilling
      </TD><TD>
         <P>for 24, 40 and 48-holes
      </TD><TD>
         <P>$12/hub
      </TD></TR>
   <TR>
      <TD>
         <P>Shipping via US Mail
      </TD><TD>
         <P>Free on hub orders; cost on axles
      </TD><TD>
         <P>$3 or less
      </TD></TR>
</TABLE>

<p>We take checks and PayPal, but not credit cards.  We'd have to raise prices around 10% to cover the fixed costs associated
with being able to process CC orders.  If the convenience is worth
that much to you, let us know; with enough "yes" votes we might take
the plunge.</p>

<P>
</P>

<P>
</P>

EOF;

print_template_end();

?>