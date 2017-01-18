<?php

$membership_fees=array(
'jul'=>550,
'aug'=>504.17,
'sep'=>458.33,
'oct'=>412.50,
'nov'=>366.67,
'dec'=>320.83,
'jan'=>275,
'feb'=>229.17,
'mar'=>183.33,
'apr'=>137.50,
'may'=>91.67,
'jun'=>45.83
);


/*
$month->dec=array(  
		'basic'=>array('id'=>'e752237e-9ee5-4b34-be43-8fbb19d1d062', 'cost'=>320.83),
		'featured'=>array('id'=>'00564275-8080-4a2a-a81d-98f6e7fb1ac1', 'cost'=>1020.83)  
	 	);	
	*/
	
//$membership_dues = 550;
$featured = 1800;
$cur_month = strtolower(date('M'));

$pay_this_amount = $membership_fees[$cur_month];

$promocode;
if(true){
$half_off_membership_fees = round($pay_this_amount/2,2);//(pay amount/divided by 2, round to 2 decimals)
//$pay_this_amount = $half_off_membership_fees;
}
//now add featured listing fees if featured

//if featured listing
if(true){
	$array_pos = array_search($cur_month,array_keys($membership_fees));
	$subtract = $array_pos*($featured/12);
	$pay_feat_amount = $featured - $subtract;	
	
}


echo number_format ($pay_this_amount,2);
echo "<br>";
echo number_format ($pay_feat_amount,2);
echo "<br>";
echo number_format (($pay_this_amount+$pay_feat_amount),2);
echo "<br>";
echo number_format (($half_off_membership_fees+$pay_feat_amount),2);
echo "<br>";

echo "Please pay this amount $".$pay_this_amount." and pay this amount if you are getting half off ".$half_off_membership_fees;
echo "<br>";
echo "If this is a featured listing you'll pay ".($pay_feat_amount+$pay_this_amount);

$today = date('n d');


		
		
		

?>