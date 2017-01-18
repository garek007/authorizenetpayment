<?php

include "shell_includes/header.html" ;
include "shell_includes/mainnav.html" ;
include "shell_includes/wrapperstart.html" ;

$invoice = $_GET['invoice'];
$amount = $_GET['amount'];
?>
<h2>Find Your Invoice</h2>
<p>Enter your invoice number and payment amount in the fields below. We will find your invoice number, and take you to the secure payment form.</p>

<div class="form">
<form method="post" action="submit.php">
<div class="row">
<div class="cols_12-4">
<label>Invoice Number</label><br>

<input type="text" name="invoice" id="invoice" placeholder="Invoice Number" value="<?php echo $invoice; ?>">

<label>Payment Amount</label><br>
<input type="text" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>">


<input type="submit" value="Go to Secure Payment Form">
</div>
</div>
</form>

</div>








<?php include "shell_includes/pageend.html" ?>