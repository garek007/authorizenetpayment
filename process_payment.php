<?php 

/*
// grab recaptcha library
require_once "shell_includes/autoload.php";
// your secret key
$secret = "6LfF1BYTAAAAAE18KlYmZso8q_pthlS0cn7Nv_1f";





require('shell_includes/autoload.php');
$reCaptcha = new \ReCaptcha\ReCaptcha($secret);

  // if submitted check response

  if ($_POST["g-recaptcha-response"] && $_POST["name"] && $_POST["email"]) {

    $resp = $reCaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);

    if ($resp->isSuccess()) {

        echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";

    } else {

        $errors = $resp->getErrorCodes();

    }

  } else {

    echo 'You did not fill all form!';

  }



*/


$captcha = $_POST['captcha'];


$month = new stdClass();

require 'shell_includes/monthrates.php';

$textmonth = date('F');
$mocode = strtolower(date('M'));

$monthNum = date('n');

$thismonth = $month->{$mocode};

$add=$thismonth['featured']['cost']-$thismonth['basic']['cost'];;
		
		
include "shell_includes/header.html" ;
include "shell_includes/mainnav.html" ;
include "shell_includes/wrapperstart.html" ;

require 'shell_includes/monthrates.php';



$featured = isset($_POST['featured']);

if(isset($_POST['promocode'])){
	$promocode=$_POST['promocode'];	
}
$textmonth = date('F');
$mocode = strtolower(date('M'));
$monthNum = date('n');

$thismonth = $month->{$mocode};

if(strtolower($promocode)==="wine50"){
	$pcode = "-50";
}

if($featured == true){
	$isfeatured = "THIS IS A FEATURED LISTING";
	$id = $thismonth['featured'.$pcode]['id'];
	$cost = $thismonth['featured'.$pcode]['cost'];
}else{
	$id = $thismonth['basic'.$pcode]['id'];
	$cost = $thismonth['basic'.$pcode]['cost'];
	$isfeatured = "";
}


//var_dump($month->{$mocode});

$emailMessage = 
$isfeatured." \n
Name of person filling out form: ".$_POST['person_filling_form']." \n
BUSINESS INFORMATION \r
------------------------------------\r
Organization Name: ".$_POST['org_name']." \r
Organization Phone: ".$_POST['org_phone']." \r
Address: ".$_POST['address1']." \r
City: ".$_POST['city']." \r
State: ".$_POST['state']." \r
Country: ".$_POST['country']." \r
Zip Code: ".$_POST['zipcode']." \r
Toll Free Phone: ".$_POST['tfphone']." \r
Organization Email: ".$_POST['org_email']."  \n
Website URL: ".$_POST['website']." \r 
Twitter URL: ".$_POST['twitter']." \r 
\n
PRIMARY CONTACT INFORMATION \r
------------------------------------
First Name: ".$_POST['first_name']." \r
Last Name: ".$_POST['last_name']." \r
Title: ".$_POST['p_title']." \r
Email: ".$_POST['p_email']." \r
Cell: ".$_POST['p_cell']." \r
Phone: ".$_POST['p_phone']." \r
\n
BILLING INFORMATION \r
------------------------------------\r
First Name: ".$_POST['b_first_name']." \r
Last Name: ".$_POST['b_last_name']." \r
Title: ".$_POST['b_title']." \r
Email: ".$_POST['b_email']." \r
Address: ".$_POST['b_street']." \r
City: ".$_POST['b_city']." \r
State: ".$_POST['b_state']." \r
Zip: ".$_POST['b_zip']." \r
Phone: ".$_POST['b_phone']." \r
\n
MARKETING/ADVERTISING CONTACT (MEMBERNET CONTACT)\r
------------------------------------\r
Company Name: ".$_POST['m_company']." \r
Contact Name: ".$_POST['m_contact']." \r
Title: ".$_POST['m_title']." \r
Email: ".$_POST['m_email']." \r
Phone: ".$_POST['m_phone']." \r
\n
PUBLIC RELATIONS CONTACT
------------------------------------
Company Name: ".$_POST['pr_company']." \r
Contact Name: ".$_POST['pr_contact']." \r
Title: ".$_POST['pr_title']." \r
Email: ".$_POST['pr_email']." \r
Phone: ".$_POST['pr_phone']." \r
\n
TRAVEL TRADE CONTACT \r
------------------------------------\r 
Company Name: ".$_POST['tt_company']." \r
Contact Name: ".$_POST['tt_contact']." \r
Title: ".$_POST['tt_title']." \r
Email: ".$_POST['tt_email']." \r
Phone: ".$_POST['tt_phone']." \r
\n
GROUP SALES CONTACT \r
------------------------------------\r
Company Name: ".$_POST['gs_company']." \r
Contact Name: ".$_POST['gs_contact']." \r
Title: ".$_POST['gs_title']." \r
Email: ".$_POST['gs_email']." \r
Phone: ".$_POST['gs_phone']." \r
\n
Primary Category: ".$_POST['primary_category']." \n\r
Additional Category 1: ".$_POST['addcategory1']." \n\r
Additional Category 2: ".$_POST['addcategory2']." \n\r
Additional Category 3: ".$_POST['addcategory3']." \n\r
";

//echo $emailMessage;
//get month



/*

//another way of doing this if I felt like iterating through an array instead
//but I don't like how I can't see the month name
$month= [
	[  'basic'=>['id'=>'123966c7-ec83-4dc4-b88e-c660bf214d08', 'cost'=>'$275.00'],
	   'featured'=>['id'=>'a039f909-a026-4ccf-b78d-f3c2fc765c0b', 'cost'=>'$875.00']  
	 	],
	[  'basic'=>['id'=>'123966c7-ec83-4dc4-b88e-c660bf214d08', 'cost'=>'$275.00'],
	   'featured'=>['id'=>'a039f909-a026-4ccf-b78d-f3c2fc765c0b', 'cost'=>'$875.00']  
	 	],
	[  'basic'=>['id'=>'123966c7-ec83-4dc4-b88e-c660bf214d08', 'cost'=>'$275.00'],
	   'featured'=>['id'=>'a039f909-a026-4ccf-b78d-f3c2fc765c0b', 'cost'=>'$875.00']  
	 	],
	[  'basic'=>['id'=>'123966c7-ec83-4dc4-b88e-c660bf214d08', 'cost'=>'$275.00'],
	   'featured'=>['id'=>'a039f909-a026-4ccf-b78d-f3c2fc765c0b', 'cost'=>'$875.00']  
	 	],						
];
*/



// Contact subject
$subject ="New member registration."; 


// Mail of sender
$mail_from="salachniewicz@sandiego.org"; 
$name = 'Stan Alachniewicz';
// From 
$header="from: $name <$mail_from>";

// Enter your email address

$to ='salachniewicz@sandiego.org, bhilemon@sandiego.org, chyvonen@sandiego.org, smason@sandiego.org';
//$to ='salachniewicz@sandiego.org';


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


<form action="https://Simplecheckout.authorize.net/payment/CatalogPayment.aspx" method="post" name="PrePage">
    <input id="LinkId" type="hidden" value="<?php echo $id; ?>" name="LinkId" /> 
    <input id="paynow" type="submit" value="Pay Now - <?php echo '$'.number_format((float)$cost, 2, '.', ''); ?>" />
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