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
$cur_month = strtolower(date('M'));

$numMonths = (6-date('n'))+12;

$featured_cost = 1800;
$membership_fees_to_year_end = $membership_fees[$cur_month];
//$membership_cost = $membership_fees[$cur_month]+550;//add 550 if we want to pay through end of the year and another year
$membership_cost = $membership_fees[$cur_month];
$array_pos = array_search($cur_month,array_keys($membership_fees));
$subtract = $array_pos*($featured_cost/12);
$pay_feat_amount = $featured_cost - $subtract;



?>