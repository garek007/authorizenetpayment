<?php 
require 'anet/autoload.php';

define("AUTHORIZENET_API_LOGIN_ID", "");
define("AUTHORIZENET_TRANSACTION_KEY", "");

define("AUTHORIZENET_MD5_SETTING", "pete");
$message = new AuthorizeNetSIM;
if ($message->isAuthorizeNet()) {
    $transactionId = $message->transaction_id;
}



$captcha = $_POST['captcha'];

include "shell_includes/header.html" ;
include "shell_includes/mainnav.html" ;
include "shell_includes/wrapperstart.html" ;

require 'shell_includes/fees.php';

//see if the customer has applied a promocode
$promocode = isset($_POST['promocode']);
if($promocode){
	switch(strtolower($_POST['promocode'])){
		case "beer50":$membership_cost = round($membership_cost/2,2);break;//(pay amount/divided by 2, round to 2 decimals)
		default:break;
	}
}

//see if the customer wants a featured listing
$featured = isset($_POST['featured']);
//calculate featured listing costs




if($featured){
	$isfeatured = "THIS IS A FEATURED LISTING";
	$membership_cost+=$pay_feat_amount;
}else{
	$isfeatured = "";
}

$invoice_num = rand();

$org_name = $_POST['org_name'];
$org_phone = $_POST['org_phone'];
$org_address = $_POST['address1'];
$org_city = $_POST['city'];
$org_state = $_POST['state'];
$org_country = $_POST['country'];
$org_zip = $_POST['zipcode'];
$p_email = $_POST['p_email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

include "shell_includes/mail_message-html.php";

//echo $emailMessage;
//get month

$mail_from="salachniewicz@sandiego.org"; 
$name = 'Stan Alachniewicz';
$to ='salachniewicz@sandiego.org, bhilemon@sandiego.org, chyvonen@sandiego.org, smason@sandiego.org';
$subject ="New member registration."; 

$header="from: $name <$mail_from> \r\n";
$header.= "MIME-Version: 1.0\r\n";
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";


// Check, if message sent to your email 
// display message "We've recived your information"
?>

<div class="row">
<?php

if($captcha == 5){
	$send_contact=mail($to,$subject,$emailMessage,$header);
	if($send_contact){ ?>
	
<div class="cols_12-5" >
<h2>Thank you</h2>
<p>Your membership application is nearly complete. Payment of annual membership dues, pro-rated from the date of application through June 30th,
is due with your application. Please use the form below to make this payment and complete your membership application.</p>


<form method="post" name="myformname" action="https://secure2.authorize.net/gateway/transact.dll">
<?php
//testing URL
//https://test.authorize.net/gateway/transact.dll

$api_login_id = "3G436DqJyDvD";
//sandbox 9MF47Nc8Aba

$transaction_key = "2Sp7NsQx6USr295F";
//trans key for sandbox 76aruHd7R9q4e9AM
$amount = $membership_cost;
//$org_name = $_POST['org_name'];

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

<input type="hidden" name="x_logo_URL" value="https://secure.authorize.net/mgraphics/Logo_1124822_01.jpg">
<?php
echo $sim->getHiddenFieldString();?>
<input type="hidden" name="x_company" value="<?php echo $org_name; ?>"> 
<input type="hidden" name="x_address" value="<?php echo $org_address; ?>">
<input type="hidden" name="x_city" value="<?php echo $org_city; ?>">
<input type="hidden" name="x_state" value="<?php echo $org_state; ?>">
<input type="hidden" name="x_country" value="<?php echo $org_country; ?>">
<input type="hidden" name="x_email" value="<?php echo $p_email; ?>">
<input type="hidden" name="x_first_name" value="<?php echo $first_name; ?>">
<input type="hidden" name="x_last_name" value="<?php echo $last_name; ?>">
<input type="hidden" name="x_phone" value="<?php echo $org_phone; ?>">

<INPUT TYPE="hidden" NAME="x_show_form" VALUE="PAYMENT_FORM">
<input type="submit" name="submit" value="Pay Now - $<?php echo $amount; ?>" >

</form>





</div>
<?php }else { ?>
<div class="cols_12-5">
<h2>There was an error</h2>
<p>There was an error sumbmitting your information. Please use your browser's back button and try again. If you need assistance please contact the Membership Department at 619-557-2823.</p>
</div>
<?php }
	
	
}else{
	echo "You did not pass verification, please go back and re-enter the Human Verification section.";
}


?>
</div>
<?php
include "shell_includes/pageend.html";

?>