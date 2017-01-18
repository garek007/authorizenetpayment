<?php
require 'anet/autoload.php';

define("AUTHORIZENET_API_LOGIN_ID", "9MF47Nc8Aba");
define("AUTHORIZENET_TRANSACTION_KEY", "76aruHd7R9q4e9AM");

define("AUTHORIZENET_MD5_SETTING", "pete");
$message = new AuthorizeNetSIM;
if ($message->isAuthorizeNet()) {
    $transactionId = $message->transaction_id;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body onload="document.forms.myformname.submit();">



<form method="post" name="myformname" action="https://secure2.authorize.net/gateway/transact.dll">



<?php

//testing URL
//https://test.authorize.net/gateway/transact.dll

$api_login_id = "3G436DqJyDvD";
//sandbox 9MF47Nc8Aba


$transaction_key = "2Sp7NsQx6USr295F";
//trans key for sandbox 76aruHd7R9q4e9AM
$amount = $_POST['amount'];
$org_name = $_POST['org_name'];
$invoice_num = $_POST['invoice'];
$fp_sequence = "123";
$time = time();

$fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $time);
$sim = new AuthorizeNetSIM_Form(
    array(
    'x_amount'        => $amount,
    'x_fp_sequence'   => $fp_sequence,
    'x_fp_hash'       => $fingerprint,
    'x_fp_timestamp'  => $time,
    'x_relay_response'=> "FALSE",
    'x_login'         => $api_login_id,
		'x_invoice_num' => $invoice_num,
    )
);
?>
<script>/*
$(document).ready(function(e) {
  $('#x_amount').change(function(){
			$.ajax({
				type: "POST",
				url:"anet/getFingerprint.php",
				data: {price:50}
				}).done(function(data){
					$('input[name="x_fp_hash"]').val(data);
				});
		
		});
	
	
});
*/
</script>

<input type="hidden" name="x_logo_URL" value="https://secure.authorize.net/mgraphics/Logo_1124822_01.jpg">
<?php
echo $sim->getHiddenFieldString();?>
<input type="hidden" name="x_company" value="<?php echo $org_name; ?>"> 
<INPUT TYPE=HIDDEN NAME="x_show_form" VALUE="PAYMENT_FORM">

</form>









</body>
</html>