<?php



$emailMessage = <<<EOT
<html><body style="font-family:Helvetica,Arial,sans-serif;font-size:14px;">
$isfeatured <br>
<strong>Invoice Number:</strong> $invoice_num <br>
<strong>Name of person filling out form:</strong> $_POST[person_filling_form] <br>
<hr>
<p>
<h2 style="margin-bottom:5px;">BUSINESS INFORMATION</h2> 

<strong>Organization Name:</strong> $org_name <br>
<strong>Organization Phone:</strong> $org_phone <br>
<strong>Address:</strong> $org_address <br>
<strong>City:</strong> $org_city <br>
<strong>State:</strong> $org_state <br>
<strong>Country:</strong> $org_country <br>
<strong>Zip Code:</strong> $org_zip <br>
<strong>Toll Free Phone:</strong> $_POST[tfphone] <br>
<strong>Organization Email:</strong> $_POST[org_email]  <br>
<strong>Website URL:</strong> $_POST[website] <br>
<strong>Twitter URL:</strong> $_POST[twitter] <br> 
</p>
<hr>
<p>
<h2 style="margin-bottom:5px;">PRIMARY CONTACT INFORMATION</h2>

<strong>First Name:</strong> $first_name <br>
<strong>Last Name:</strong> $last_name <br>
<strong>Title:</strong> $_POST[p_title] <br>
<strong>Email:</strong> $p_email <br>
<strong>Cell:</strong> $_POST[p_cell] <br>
<strong>Phone:</strong> $_POST[p_phone] <br>
</p>
<hr>
<p>
<h2 style="margin-bottom:5px;">BILLING INFORMATION </h2>

<strong>First Name:</strong> $_POST[b_first_name] <br>
<strong>Last Name:</strong> $_POST[b_last_name] <br>
<strong>Title:</strong> $_POST[b_title] <br>
<strong>Email:</strong> $_POST[b_email] <br>
<strong>Address:</strong> $_POST[b_street] <br>
<strong>City:</strong> $_POST[b_city] <br>
<strong>State:</strong> $_POST[b_state] <br>
<strong>Zip:</strong> $_POST[b_zip] <br>
<strong>Phone:</strong> $_POST[b_phone] <br>
</p>
<hr>
<p>
<h3 style="margin-bottom:5px;">MARKETING/ADVERTISING CONTACT (MEMBERNET CONTACT)</h3>

<strong>Company Name:</strong> $_POST[m_company] <br>
<strong>Contact Name:</strong> $_POST[m_contact] <br>
<strong>Title:</strong> $_POST[m_title] <br>
<strong>Email:</strong> $_POST[m_email] <br>
<strong>Phone:</strong> $_POST[m_phone] <br>
</p>
<hr>
<p>
<h3 style="margin-bottom:5px;">PUBLIC RELATIONS CONTACT</h3>

<strong>Company Name:</strong> $_POST[pr_company] <br>
<strong>Contact Name:</strong> $_POST[pr_contact] <br>
<strong>Title:</strong> $_POST[pr_title] <br>
<strong>Email:</strong> $_POST[pr_email] <br>
<strong>Phone:</strong> $_POST[pr_phone] <br>
</p>
<hr>
<p>
<h3 style="margin-bottom:5px;">TRAVEL TRADE CONTACT</h3>

<strong>Company Name:</strong> $_POST[tt_company] <br>
<strong>Contact Name:</strong> $_POST[tt_contact] <br>
<strong>Title:</strong> $_POST[tt_title] <br>
<strong>Email:</strong> $_POST[tt_email] <br>
<strong>Phone:</strong> $_POST[tt_phone] <br>
</p>
<hr>
<p>
<h3 style="margin-bottom:5px;">GROUP SALES CONTACT </h3>

<strong>Company Name:</strong> $_POST[gs_company] <br>
<strong>Contact Name:</strong> $_POST[gs_contact] <br>
<strong>Title:</strong> $_POST[gs_title] <br>
<strong>Email:</strong> $_POST[gs_email] <br>
<strong>Phone:</strong> $_POST[gs_phone] <br>
</p>

<hr>
<p><strong>Primary Category:</strong> $_POST[primary_category] <br>
<strong>Additional Category 1:</strong> $_POST[addcategory1] <br>
<strong>Additional Category 2:</strong> $_POST[addcategory2] <br>
<strong>Additional Category 3:</strong> $_POST[addcategory3] <br></p>
</body></html>
EOT;
?>