<?php 


		
		
include "shell_includes/header.html" ;
include "shell_includes/mainnav.html" ;
include "shell_includes/wrapperstart.html" ;



//var_dump($month->{$mocode});

$emailMessage = 
"
SDTA TERMS AND CONDITIONS AGREEMENT \r
------------------------------------
Full Name: ".$_POST['name']." \r
Company: ".$_POST['company']." \r
Email: ".$_POST['email']." \r
I agree to the terms and conditions: ".$_POST['agree']." \r

";



// Contact subject
$subject ="SDTA Terms and Conditions"; 


// Mail of sender
$mail_from="salachniewicz@sandiego.org, bhilemon@sandiego.org"; 
$name = 'Stan Alachniewicz';
// From 
$header="from: $name <$mail_from>";

// Enter your email address

$to ='salachniewicz@sandiego.org, ads@sandiego.org';
//$to ='salachniewicz@sandiego.org';
$send_contact=mail($to,$subject,$emailMessage,$header);

// Check, if message sent to your email 
// display message "We've recived your information"
?>

<div class="row">
<?php
if($send_contact){ ?>
	
<div class="cols_12-5" >
    <h2>Thank you</h2>
    <p>Your information has been received.</p>
</div>
<?php
}
else { ?>
<div class="cols_12-5">
<h2>There was an error</h2>
<p>There was an error sumbmitting your information. Please use your browser's back button and try again. If you need assistance please contact the Membership Department at 619-557-2823.</p>
</div>
<?php }
?>
</div>
<?php
include "shell_includes/pageend.html";

?>