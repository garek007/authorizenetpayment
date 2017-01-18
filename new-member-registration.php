<?php 
$pageName = "New Member Application and Payment Form";
$month = new stdClass();

require 'shell_includes/fees.php';

$textmonth = date('F');
$mocode = strtolower(date('M'));

$monthNum = date('n');

$thismonth = $month->{$mocode};

$add=$thismonth['featured']['cost']-$thismonth['basic']['cost'];
		
		
include "shell_includes/header.html" ;
include "shell_includes/mainnav.html" ;
include "shell_includes/wrapperstart.html" ;
?>
<script type="text/javascript">

$( document ).ready(function() {
$("#optional_contacts").delegate(".ui-icon-triangle-1-e","click",function(){

    $(this).parent().next('.contact').toggle('slow');
    $(this).removeClass('ui-icon-triangle-1-e');
    $(this).addClass('ui-icon-triangle-1-s');

});

$("#optional_contacts").delegate(".ui-icon-triangle-1-s","click",function(){
    $(this).parent().next('.contact').toggle('slow');
    $(this).removeClass('ui-icon-triangle-1-s');
    $(this).addClass('ui-icon-triangle-1-e');

  });

//Check if same checkboxes

$('[name=b_contact_same]').change(function(){//for making billing contact info same as primary contact info
	$('[name=b_first_name]').val($('[name=first_name]').val());
	$('[name=b_last_name]').val($('[name=last_name]').val());
	$('[name=b_title]').val($('[name=p_title]').val());
	$('[name=b_email]').val($('[name=p_email]').val());
	$('[name=b_cell]').val($('[name=p_cell]').val());
	$('[name=b_phone]').val($('[name=p_phone]').val());
});


$('[name=b_address_same]').change(function(){//for making primary contact address same as organization address
	$('[name=b_street]').val($('[name=address1]').val());
	$('[name=b_city]').val($('[name=city]').val());
	$('[name=b_state]').val($('[name=state]').val());
	$('[name=b_zip]').val($('[name=zipcode]').val());
});

$('[name=m_contact_same]').change(function(){//for making billing contact info same as primary contact info

	$('[name=m_contact]').val( $('[name=first_name]').val()+" "+$('[name=last_name]').val()                  );
	$('[name=m_title]').val($('[name=p_title]').val());
	$('[name=m_email]').val($('[name=p_email]').val());
	$('[name=m_cell]').val($('[name=p_cell]').val());
	$('[name=m_phone]').val($('[name=p_phone]').val());
});
$('[name=pr_contact_same]').change(function(){//for making billing contact info same as primary contact info

	$('[name=pr_contact]').val( $('[name=first_name]').val()+" "+$('[name=last_name]').val()                  );
	$('[name=pr_title]').val($('[name=p_title]').val());
	$('[name=pr_email]').val($('[name=p_email]').val());
	$('[name=pr_cell]').val($('[name=p_cell]').val());
	$('[name=pr_phone]').val($('[name=p_phone]').val());
});
$('[name=tt_contact_same]').change(function(){//for making billing contact info same as primary contact info

	$('[name=tt_contact]').val( $('[name=first_name]').val()+" "+$('[name=last_name]').val()                  );
	$('[name=tt_title]').val($('[name=p_title]').val());
	$('[name=tt_email]').val($('[name=p_email]').val());
	$('[name=tt_cell]').val($('[name=p_cell]').val());
	$('[name=tt_phone]').val($('[name=p_phone]').val());
});

$('[name=gs_contact_same]').change(function(){//for making billing contact info same as primary contact info

	$('[name=gs_contact]').val( $('[name=first_name]').val()+" "+$('[name=last_name]').val()                  );
	$('[name=gs_title]').val($('[name=p_title]').val());
	$('[name=gs_email]').val($('[name=p_email]').val());
	$('[name=gs_cell]').val($('[name=p_cell]').val());
	$('[name=gs_phone]').val($('[name=p_phone]').val());
});
//$('#make_featured').on('change',function(event){
//$('#members-payment-form').attr('action',function(i,value){ return value+"&Featured=true"  });
//});
$('#make_featured').change(function(event){
	$('#members-payment-form').attr('action',function(i,value){ 
	
	//return value+"&Featured=true" 
	document.cookie="featured=true";
	
	});
});


});
</script>

<form id="members-payment-form" action="process_payment.v2.php"  name="subscribeForm" method="post" novalidate>
  <div class="form">
    <p>Thank you for your interest in joining the San Diego Tourism Authority (SDTA), the official travel resource for the San Diego region. As San Diego’s destination marketing organization, the SDTA spends millions of dollars each year to influence travel buyers to choose San Diego. Your Membership provides exposure to travel audiences through cooperative marketing initiatives and connects you to San Diego’s diverse and collaborative tourism community. We look forward to working with you to ensure our mutual success. </p>
    <p>All SDTA Memberships are for the term July-June annually. ($550)</p>
    <p>You are paying for a Membership term: <?php echo $textmonth; ?> – June 30, 2017</p>
    
    <table width="80%" border="1" cellspacing="0" cellpadding="10" class="duesbreakdown" style="display:none;">
  <tbody>
    <tr>
      <td width="27%" align="center" valign="middle" bgcolor="#F5FBB8">June</td>
      <td width="73%" align="center" valign="middle" bgcolor="#ADD5FB">July 2016 - June 2017</td>
    </tr>
    <tr>
      <td align="center" valign="middle" bgcolor="#F5FBB8">$<?php echo $membership_fees_to_year_end; ?></td>
      <td align="center" valign="middle" bgcolor="#ADD5FB">$550</td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle" bgcolor="#44E99B">Total: $<?php echo $membership_cost; ?></td>
      </tr>
  </tbody>
</table><br>



    <h4 style="clear: both; margin-bottom: 30px;display:none;"><?php echo $numMonths; ?>-Month Membership ( <span id="months"><?php echo $textmonth ?> 2016 - June 2016)</span>: <?php echo '$'.number_format($membership_cost, 2, '.', '');?> </h4>
   
    <p style="display:none;">* For Members joining in the final quarter of a Membership cycle (June) the next term’s annual dues are added to the prorated term to avoid an additional billing in July for the next year’s term.</p>

    <h2>Step One: Enter your business and contact information.</h2>
    <p>Fields marked with an <span class="required">*</span> are required.</p>
    <label for="name_of_person">Name of person filling out this form</label>
    <input type="text" name="person_filling_form" style="width:250px;">
    <div class="row">
      <div class="fieldrange cols_12-4">
        <h4>Business Information (required)</h4>
        <p style="height:50px;">Business information will be listed in printed publications and/or on website exactly as it appears below.</p>
        <label for="org_name">Organization Name<span class="required">*</span></label>
        <input type="text" id="org_name" name="org_name">
        <label for="address1">Street Address<span class="required">*</span></label>
        <input type="text" id="address1" name="address1">
        <label for="city">City<span class="required">*</span></label>
        <input type="text" id="city" name="city">
        <label for="state">State/Province<span class="required">*</span></label>
        <select size="1" id="state" name="state">
          <option selected="selected" value="">Select a State/Province</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AS">American Samoa</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="AP">Armed Forces Pacific</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="GU">Guam</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="PR">Puerto Rico</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="VI">U.S. Virgin Islands</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
        <label for="country">Country<span class="required">*</span></label>
        <select id="country" name="country">
          <option value="AF">Afghanistan</option>
          <option value="AL">Albania</option>
          <option value="DZ">Algeria</option>
          <option value="AS">American Samoa</option>
          <option value="AD">Andorra</option>
          <option value="AO">Angola</option>
          <option value="AG">Antigua and Barbuda</option>
          <option value="AR">Argentina</option>
          <option value="AM">Armenia</option>
          <option value="AW">Aruba</option>
          <option value="AU">Australia</option>
          <option value="AT">Austria</option>
          <option value="AZ">Azerbaijan</option>
          <option value="BS">Bahamas</option>
          <option value="BH">Bahrain</option>
          <option value="BD">Bangladesh</option>
          <option value="BB">Barbados</option>
          <option value="BY">Belarus</option>
          <option value="BE">Belgium</option>
          <option value="BZ">Belize</option>
          <option value="BJ">Benin</option>
          <option value="BM">Bermuda</option>
          <option value="BT">Bhutan</option>
          <option value="BO">Bolivia</option>
          <option value="BA">Bosnia and Herzegovina</option>
          <option value="BW">Botswana</option>
          <option value="BR">Brazil</option>
          <option value="BN">Brunei Darussalam</option>
          <option value="BG">Bulgaria</option>
          <option value="BF">Burkina Faso</option>
          <option value="BI">Burundi</option>
          <option value="CM">Cameroon</option>
          <option value="CA">Canada</option>
          <option value="CV">Cape Verde</option>
          <option value="KY">Cayman Islands</option>
          <option value="CF">Central African Republic</option>
          <option value="TD">Chad</option>
          <option value="CL">Chile</option>
          <option value="CN">China</option>
          <option value="TW">CHINESE TAIPEI ( TAIWAN )</option>
          <option value="CO">Colombia</option>
          <option value="KM">Comoros</option>
          <option value="CD">Democratic Republic of Congo</option>
          <option value="CG">People's Republic of Congo</option>
          <option value="CK">Cook Islands</option>
          <option value="CR">Costa Rica</option>
          <option value="CI">Cote D'Ivoire</option>
          <option value="HR">Croatia</option>
          <option value="CU">Cuba</option>
          <option value="CY">Cyprus</option>
          <option value="CZ">Czech Republic</option>
          <option value="YD">Democratic Republic of Yemen</option>
          <option value="DK">Denmark</option>
          <option value="DJ">Djibouti</option>
          <option value="DM">Dominica</option>
          <option value="DO">Dominican Republic</option>
          <option value="EC">Ecuador</option>
          <option value="EG">Egypt</option>
          <option value="SV">El Salvador</option>
          <option value="GQ">Equatorial Guinea</option>
          <option value="ER">Eritrea</option>
          <option value="EE">Estonia</option>
          <option value="ET">Ethiopia</option>
          <option value="FJ">Fiji</option>
          <option value="FI">Finland</option>
          <option value="FR">France</option>
          <option value="GA">Gabon</option>
          <option value="GM">Gambia</option>
          <option value="GE">Georgia</option>
          <option value="DE">Germany</option>
          <option value="GH">Ghana</option>
          <option value="GB">Great Britain</option>
          <option value="GR">Greece</option>
          <option value="GD">Grenada</option>
          <option value="GU">Guam</option>
          <option value="GT">Guatemala</option>
          <option value="GN">Guinea</option>
          <option value="GY">Guyana</option>
          <option value="HT">Haiti</option>
          <option value="HN">Honduras</option>
          <option value="HK">Hong Kong</option>
          <option value="HU">Hungary</option>
          <option value="IS">Iceland</option>
          <option value="IN">India</option>
          <option value="ID">Indonesia</option>
          <option value="IR">Iran, Islamic Republic of</option>
          <option value="IQ">Iraq</option>
          <option value="IE">Ireland</option>
          <option value="IL">Israel</option>
          <option value="IT">Italy</option>
          <option value="JM">Jamaica</option>
          <option value="JP">Japan</option>
          <option value="JO">Jordan</option>
          <option value="KZ">Kazakhstan</option>
          <option value="KE">Kenya</option>
          <option value="KI">Kiribati</option>
          <option value="KP">Korea, Democratic People's Republic of</option>
          <option value="KR">Korea, Republic of</option>
          <option value="KW">Kuwait</option>
          <option value="KG">Kyrgyzstan</option>
          <option value="LA">Lao People's Democratic Republic</option>
          <option value="LV">Latvia</option>
          <option value="LB">Lebanon</option>
          <option value="LS">Lesotho</option>
          <option value="LR">Liberia</option>
          <option value="LY">Libyan Arab Jamahiriya</option>
          <option value="LI">Liechtenstein</option>
          <option value="LT">Lithuania</option>
          <option value="LU">Luxembourg</option>
          <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
          <option value="MG">Madagascar</option>
          <option value="MW">Malawi</option>
          <option value="MY">Malaysia</option>
          <option value="MV">Maldives</option>
          <option value="ML">Mali</option>
          <option value="MT">Malta</option>
          <option value="MH">Marshall Islands</option>
          <option value="MR">Mauritania</option>
          <option value="MU">Mauritius</option>
          <option value="MX">Mexico</option>
          <option value="FM">Micronesia, Federated States of</option>
          <option value="MD">Moldova, Republic of</option>
          <option value="MC">Monaco</option>
          <option value="MN">Mongolia</option>
          <option value="ME">Montenegro</option>
          <option value="MA">Morocco</option>
          <option value="MZ">Mozambique</option>
          <option value="MM">Myanmar</option>
          <option value="NA">Namibia</option>
          <option value="NP">Nepal</option>
          <option value="NL">Netherlands</option>
          <option value="AN">Netherlands Antilles</option>
          <option value="NZ">New Zealand</option>
          <option value="NI">Nicaragua</option>
          <option value="NE">Niger</option>
          <option value="NG">Nigeria</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="NO">Norway</option>
          <option value="OM">Oman</option>
          <option value="PK">Pakistan</option>
          <option value="PW">Palau</option>
          <option value="PA">Panama</option>
          <option value="PG">Papua New Guinea</option>
          <option value="PY">Paraguay</option>
          <option value="PE">Peru</option>
          <option value="PH">Philippines</option>
          <option value="PL">Poland</option>
          <option value="PT">Portugal</option>
          <option value="PR">Puerto Rico</option>
          <option value="QA">Qatar</option>
          <option value="RO">Romania</option>
          <option value="RU">Russian Federation</option>
          <option value="RW">Rwanda</option>
          <option value="KN">Saint Kitts and Nevis</option>
          <option value="LC">Saint Lucia</option>
          <option value="VC">Saint Vincent and the Grenadines</option>
          <option value="WS">Samoa</option>
          <option value="SM">San Marino</option>
          <option value="SA">Saudi Arabia</option>
          <option value="SN">Senegal</option>
          <option value="RS">Serbia</option>
          <option value="CS">Serbia and Montenegro</option>
          <option value="SC">Seychelles</option>
          <option value="SL">Sierra Leone</option>
          <option value="SG">Singapore</option>
          <option value="SK">Slovakia</option>
          <option value="SI">Slovenia</option>
          <option value="SB">Solomon Islands</option>
          <option value="SO">Somalia</option>
          <option value="ZA">South Africa</option>
          <option value="ES">Spain</option>
          <option value="LK">Sri Lanka</option>
          <option value="SD">Sudan</option>
          <option value="SR">Suriname</option>
          <option value="SZ">Swaziland</option>
          <option value="SE">Sweden</option>
          <option value="CH">Switzerland</option>
          <option value="SY">Syrian Arab Republic</option>
          <option value="TJ">Tajikistan</option>
          <option value="TZ">Tanzania, United Republic of</option>
          <option value="TH">Thailand</option>
          <option value="TG">Togo</option>
          <option value="TO">Tonga</option>
          <option value="TT">Trinidad and Tobago</option>
          <option value="TN">Tunisia</option>
          <option value="TR">Turkey</option>
          <option value="TM">Turkmenistan</option>
          <option value="UG">Uganda</option>
          <option value="UA">Ukraine</option>
          <option value="AE">United Arab Emirates</option>
          <option value="US" selected="selected">United States</option>
          <option value="UY">Uruguay</option>
          <option value="UZ">Uzbekistan</option>
          <option value="VU">Vanuatu</option>
          <option value="VE">Venezuela</option>
          <option value="VN">Viet Nam</option>
          <option value="VG">Virgin Islands, British</option>
          <option value="VI">Virgin Islands, U.S.</option>
          <option value="YE">Yemen Arab Republic</option>
          <option value="YU">Yugoslavia</option>
          <option value="ZR">Zaire</option>
          <option value="ZM">Zambia</option>
          <option value="ZW">Zimbabwe</option>
        </select>
        <label for="zipcode">Zip/Postal Code<span class="required">*</span></label>
        <input type="text" id="zipcode" name="zipcode">
        <label for="org_phone">Organization Phone<span class="required">*</span></label>
        <input type="text" id="org_phone" name="org_phone">
        <label for="tfphone">Toll Free Phone</label>
        <input type="text" id="tfphone" name="tfphone">
        <label for="org_email">Organization Email<span class="required">*</span></label>
        <input type="text" id="org_email" name="org_email">
        <label for="website">Website URL<span class="required">*</span></label>
        <input type="text" id="website" name="website">
        <label for="twitter">Full Twitter URL</label>
        <input type="text" id="twitter" name="twitter" placeholder="http://www.twitter.com/yourbusiness">
      </div>
      <!------- PRIMARY CONTACT INFO --------->
      <div class="fieldrange cols_12-4">
        <h4>Primary Contact Information (required)</h4>
        <p style="height:50px;">Receives primary correspondance, updates, inquiries and notices</p>
        <label for="first_name">First Name<span class="required">*</span></label>
        <input type="text" id="first_name" name="first_name">
        <label for="last_name">Last Name<span class="required">*</span></label>
        <input type="text" id="last_name" name="last_name">
        <label for="p_title">Title<span class="required">*</span></label>
        <input type="text" name="p_title">
        <label for="p_email">Email<span class="required">*</span></label>
        <input type="text" name="p_email">
        <label for="pcontact_phone">Phone Number<span class="required">*</span></label>
        <input type="text" name="p_phone">


<hr>
<h4>Marketing/Advertising Contact </h4>
    
            <p>Primary user for sandiego.org, receives info on advertising, marketing and promotions  </p>
   <div class="checkifsameprimary clearfix">

              <input type="checkbox" class="attractions" value="Billing Contact is Same" name="m_contact_same" style="width: 30px; border: medium none; box-shadow: none;">
              <label for="b_contact_same" style="clear: right; text-align: left;"><em>Check if same as Primary</em></label>
        </div>
            <label for="b_company_name">Company Name</label>
            <input type="text" name="m_company">
            <label for="bcontact_first_name">Contact Name<span class="required">*</span></label>
            <input type="text" name="m_contact">
            <label for="bcontact_title">Title<span class="required">*</span></label>
            <input type="text" name="m_title">
            <label for="bcontact_email">Email<span class="required">*</span></label>
            <input type="text" name="m_email">
            <label for="bcontact_phone">Phone Number<span class="required">*</span></label>
            <input type="text" name="m_phone">
















      </div>
      <!------- BILLING CONTACT INFO --------->
      <div class="fieldrange billing cols_12-4">
        <h4>Billing  Information (required)</h4>
        <p style="height:50px;">To be used for recurring billing. 
              <span class="checkifsameprimary clearfix" style="margin-top:10px;display:block;">
          <input type="checkbox" class="attractions" value="Billing Contact is Same" name="b_contact_same">
          <label for="b_contact_same"><em>Check if same as Primary</em></label>
  </span>
        </p>
        
        

        <label for="first_name">First Name<span class="required">*</span></label>
        <input type="text" name="b_first_name">
        <label for="last_name">Last Name<span class="required">*</span></label>
        <input type="text" name="b_last_name">
        <label for="bcontact_title">Title<span class="required">*</span></label>
        <input type="text" name="b_title">
        <label for="bcontact_email">Email<span class="required">*</span></label>
        <input type="text" name="b_email">
        <label for="bcontact_phone">Phone Number<span class="required">*</span></label>
        <input type="text" name="b_phone">
        

          <div class="checkifsameprimary clearfix" style="margin-top:30px;">
            <input type="checkbox" class="attractions" value="Billing Contact is Same" name="b_address_same" style="width: 30px; border: medium none; box-shadow: none;">
            <label for="b_contact_same" style="clear: right; text-align: left;"><em>Check if address is same as Business Address</em></label>
          </div>
  
        <label for="bcontact_street">Billing Street Address<span class="required">*</span></label>
        <input type="text" name="b_street">
        <label for="bcontact_city">City<span class="required">*</span></label>
        <input type="text" name="b_city">
        <label for="bcontact_state">State/Province<span class="required">*</span></label>
        <select name="b_state" size="1">
          <option selected="selected" value="">Select a State/Province</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AS">American Samoa</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="AP">Armed Forces Pacific</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="GU">Guam</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="PR">Puerto Rico</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="VI">U.S. Virgin Islands</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
        <label for="bcontact_zip">Zip<span class="required">*</span></label>
        <input type="text" name="b_zip">
      </div>
    </div>
    <div id="optional_contacts">
      <h2>Step Two: Enter Additional Contacts</h2>
      <p>Please provide contact information for the following roles that apply.</p>
      <div class="row"> 
        <!------- MARKETING AND ADVERTISING CONTACT INFO --------->

        <!------- PUBLIC RELATIONS CONTACT INFO --------->
        <div class="fieldrange cols_12-4">
          <h4>Public Relations Contact 
            (optional)</h4>
          <div class="publicrelations optional">
            <p>Receives media inquiries, hosting opportunities etc.</p>
            <div class="checkifsameprimary clearfix">
              <input type="checkbox" class="attractions" value="Billing Contact is Same" name="pr_contact_same" style="width: 30px; border: medium none; box-shadow: none;">
              <label for="b_contact_same" style="clear: right; text-align: left;"><em>Check if same as Primary</em></label>
            </div>
            <label for="pr_company_name">Company Name</label>
            <input type="text" name="pr_company">
            <label for="pr_contact_name">Contact Name</label>
            <input type="text" name="pr_contact">
            <label for="pr_contact_title">Title</label>
            <input type="text" name="pr_title">
            <label for="pr_contact_email">Email</label>
            <input type="text" name="pr_email">
            <label for="pr_contact_phone">Phone Number</label>
            <input type="text" name="pr_phone">
          </div>
        </div>
        <!------- TRAVEL TRADE CONTACT INFO --------->
        <div class="fieldrange cols_12-4">
          <h4>Travel Trade Contact 
            (optional)</h4>
          <div class="traveltrade optional">
            <p>Receives leads and referrals for <br>
travel/tour groups</p>
            <div class="checkifsameprimary clearfix">
              <input type="checkbox" class="attractions" value="Billing Contact is Same" name="tt_contact_same" style="width: 30px; border: medium none; box-shadow: none;">
              <label for="b_contact_same" style="clear: right; text-align: left;"><em>Check if same as Primary</em></label>
            </div>
            <label for="tt_company_name">Company Name</label>
            <input type="text" name="tt_company">
            <label for="tt_contact_name">Contact Name </label>
            <input type="text" name="tt_contact">
            <label for="ttcontact_title">Title</label>
            <input type="text" name="tt_title">
            <label for="ttcontact_email">Email </label>
            <input type="text" name="tt_email">
            <label for="ttcontact_phone">Phone Number</label>
            <input type="text" name="tt_phone">
          </div>
        </div>
        <!------- GROUP SALES CONTACT INFO --------->
        <div class="fieldrange cols_12-4">
          <h4>Group Sales Contact 
            (optional)</h4>
          <div class="groupsales optional">
            <p>Receives leads and referrals <br>
for group travel</p>
            <div class="checkifsameprimary clearfix">
              <input type="checkbox" class="attractions" value="Billing Contact is Same" name="gs_contact_same" style="width: 30px; border: medium none; box-shadow: none;">
              <label for="b_contact_same" style="clear: right; text-align: left;"><em>Check if same as Primary</em></label>
            </div>
            <label for="gs_company_name">Company Name</label>
            <input type="text" name="gs_company">
            <label for="gs_contact_name">Contact Name </label>
            <input type="text" name="gs_contact">
            <label for="gscontact_title">Title</label>
            <input type="text" name="gs_title">
            <label for="gscontact_email">Email </label>
            <input type="text" name="gs_email">
            <label for="gscontact_phone">Phone Number</label>
            <input type="text" name="gs_phone">
          </div>
        </div>
      </div>
    </div>
    
    <!-- End optional contacts DIV -->
           <h3>Tell us about your business.</h3>
    <div class="row">

      <div class="cols_12-6">
    
        <label for="category">Please select the category that best describes your business [Primary]<span class="required">*</span></label>
        <select size="1" name="primary_category">
          <option selected="selected" value="">--SELECT A CATEGORY--</option>
          <option>Community Organizations	--&gt;	Associations &amp; Organizations</option>
          <option>Event Venues	--&gt;	Venues</option>
          <option>Meetings Support Services	--&gt;	Caterers</option>
          <option>Meetings Support Services	--&gt;	Computer &amp; Equipment Rental</option>
          <option>Meetings Support Services	--&gt;	Employment Services</option>
          <option>Meetings Support Services	--&gt;	Entertainment</option>
          <option>Meetings Support Services	--&gt;	Event Planners</option>
          <option>Meetings Support Services	--&gt;	Event Technology &amp; Production</option>
          <option>Meetings Support Services	--&gt;	Florists &amp; Décor</option>
          <option>Meetings Support Services	--&gt;	Fireworks and Special Effects</option>
          <option>Meetings Support Services	--&gt;	Interpreters &amp; Translators</option>
          <option>Meetings Support Services	--&gt;	Party Rental Supplies</option>
          <option>Meetings Support Services	--&gt;	Photographers</option>
          <option>Meetings Support Services	--&gt;	Promotional Gifts</option>
          <option>Meetings Support Services	--&gt;	Printing Services</option>
          <option>Meetings Support Services	--&gt;	Security</option>
          <option>Meetings Support Services	--&gt;	Speakers</option>
          <option>Meetings Support Services	--&gt;	Team Building</option>
          <option>Meetings Support Services	--&gt;	Tradeshow Services</option>
          <option>Plan Your Trip	--&gt;	Travel Guides</option>
          <option>Plan Your Trip	--&gt;	Visitor Services	--&gt;	Visitor Information Centers</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Group &amp; Charter Transportation</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Limousines and Towncars</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Other</option>
          <option>Plan Your Trip	--&gt;	My Travel	--&gt;	Book Your Trip</option>
          <option>Professional Services	--&gt;	Corporate &amp; HQ</option>
     
          <option>Professional Services	--&gt;	Finance/Insurance/Legal/Real Estate</option>
          <option>Professional Services	--&gt;	Internet &amp; Technology Solutions</option>
          <option>Professional Services	--&gt;	Marketing and Media</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Galleries</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	History and Heritage</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Museums</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Music</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Theatre</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Bars</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Breweries</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Nightclubs</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Restaurants</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Wineries</option>
          <option>What To Do	--&gt;	Parks &amp; Gardens</option>
          <option>What To Do	--&gt;	Spas</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Action Sports</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Biking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Boating</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Fishing</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Golf</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Kayaking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Scuba</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Surfing</option>
          <option>What To Do	--&gt;	Tours &amp; Sightseeing</option>
          <option>Where To Stay	--&gt;	Bed &amp; Breakfasts</option>
          <option>Where To Stay	--&gt;	Camping &amp; RV Parks</option>
          <option>Where To Stay	--&gt;	Hostels</option>
          <option>Where To Stay	--&gt;	Vacation Rentals</option>
        </select>
      </div>
      <div class="cols_12-6">
        <label for="addcategory">Select up to three additional categories that pertain to your business [Additional Categories]</label>
        <select class="valid" size="1" name="addcategory1">
          <option selected="selected">--SELECT A CATEGORY--</option>
          <option>Community Organizations	--&gt;	Associations &amp; Organizations</option>
          <option>Event Venues	--&gt;	Venues</option>
          <option>Meetings Support Services	--&gt;	Caterers</option>
          <option>Meetings Support Services	--&gt;	Computer &amp; Equipment Rental</option>
          <option>Meetings Support Services	--&gt;	Employment Services</option>
          <option>Meetings Support Services	--&gt;	Entertainment</option>
          <option>Meetings Support Services	--&gt;	Event Planners</option>
          <option>Meetings Support Services	--&gt;	Event Technology &amp; Production</option>
          <option>Meetings Support Services	--&gt;	Florists &amp; Décor</option>
          <option>Meetings Support Services	--&gt;	Fireworks and Special Effects</option>
          <option>Meetings Support Services	--&gt;	Interpreters &amp; Translators</option>
          <option>Meetings Support Services	--&gt;	Party Rental Supplies</option>
          <option>Meetings Support Services	--&gt;	Photographers</option>
          <option>Meetings Support Services	--&gt;	Promotional Gifts</option>
          <option>Meetings Support Services	--&gt;	Printing Services</option>
          <option>Meetings Support Services	--&gt;	Security</option>
          <option>Meetings Support Services	--&gt;	Speakers</option>
          <option>Meetings Support Services	--&gt;	Team Building</option>
          <option>Meetings Support Services	--&gt;	Tradeshow Services</option>
          <option>Plan Your Trip	--&gt;	Travel Guides</option>
          <option>Plan Your Trip	--&gt;	Visitor Services	--&gt;	Visitor Information Centers</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Group &amp; Charter Transportation</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Limousines and Towncars</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Other</option>
          <option>Plan Your Trip	--&gt;	My Travel	--&gt;	Book Your Trip</option>
          <option>Professional Services	--&gt;	Corporate &amp; HQ</option>
          <option>Professional Services	--&gt;	Event Production Companies</option>
          <option>Professional Services	--&gt;	Finance/Insurance/Legal/Real Estate</option>
          <option>Professional Services	--&gt;	Internet &amp; Technology Solutions</option>
          <option>Professional Services	--&gt;	Marketing and Media</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Galleries</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	History and Heritage</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Museums</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Music</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Theatre</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Bars</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Breweries</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Nightclubs</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Restaurants</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Wineries</option>
          <option>What To Do	--&gt;	Parks &amp; Gardens</option>
          <option>What To Do	--&gt;	Spas</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Action Sports</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Biking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Boating</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Fishing</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Golf</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Kayaking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Scuba</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Surfing</option>
          <option>What To Do	--&gt;	Tours &amp; Sightseeing</option>
          <option>Where To Stay	--&gt;	Bed &amp; Breakfasts</option>
          <option>Where To Stay	--&gt;	Camping &amp; RV Parks</option>
          <option>Where To Stay	--&gt;	Hostels</option>
          <option>Where To Stay	--&gt;	Vacation Rentals</option>
        </select>
        <select size="1" name="addcategory2">
          <option selected="selected">--SELECT A CATEGORY--</option>
          <option>Community Organizations	--&gt;	Associations &amp; Organizations</option>
          <option>Event Venues	--&gt;	Venues</option>
          <option>Meetings Support Services	--&gt;	Caterers</option>
          <option>Meetings Support Services	--&gt;	Computer &amp; Equipment Rental</option>
          <option>Meetings Support Services	--&gt;	Employment Services</option>
          <option>Meetings Support Services	--&gt;	Entertainment</option>
          <option>Meetings Support Services	--&gt;	Event Planners</option>
          <option>Meetings Support Services	--&gt;	Event Technology &amp; Production</option>
          <option>Meetings Support Services	--&gt;	Florists &amp; Décor</option>
          <option>Meetings Support Services	--&gt;	Fireworks and Special Effects</option>
          <option>Meetings Support Services	--&gt;	Interpreters &amp; Translators</option>
          <option>Meetings Support Services	--&gt;	Party Rental Supplies</option>
          <option>Meetings Support Services	--&gt;	Photographers</option>
          <option>Meetings Support Services	--&gt;	Promotional Gifts</option>
          <option>Meetings Support Services	--&gt;	Printing Services</option>
          <option>Meetings Support Services	--&gt;	Security</option>
          <option>Meetings Support Services	--&gt;	Speakers</option>
          <option>Meetings Support Services	--&gt;	Team Building</option>
          <option>Meetings Support Services	--&gt;	Tradeshow Services</option>
          <option>Plan Your Trip	--&gt;	Travel Guides</option>
          <option>Plan Your Trip	--&gt;	Visitor Services	--&gt;	Visitor Information Centers</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Group &amp; Charter Transportation</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Limousines and Towncars</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Other</option>
          <option>Plan Your Trip	--&gt;	My Travel	--&gt;	Book Your Trip</option>
          <option>Professional Services	--&gt;	Corporate &amp; HQ</option>
          <option>Professional Services	--&gt;	Event Production Companies</option>
          <option>Professional Services	--&gt;	Finance/Insurance/Legal/Real Estate</option>
          <option>Professional Services	--&gt;	Internet &amp; Technology Solutions</option>
          <option>Professional Services	--&gt;	Marketing and Media</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Galleries</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	History and Heritage</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Museums</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Music</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Theatre</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Bars</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Breweries</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Nightclubs</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Restaurants</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Wineries</option>
          <option>What To Do	--&gt;	Parks &amp; Gardens</option>
          <option>What To Do	--&gt;	Spas</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Action Sports</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Biking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Boating</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Fishing</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Golf</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Kayaking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Scuba</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Surfing</option>
          <option>What To Do	--&gt;	Tours &amp; Sightseeing</option>
          <option>Where To Stay	--&gt;	Bed &amp; Breakfasts</option>
          <option>Where To Stay	--&gt;	Camping &amp; RV Parks</option>
          <option>Where To Stay	--&gt;	Hostels</option>
          <option>Where To Stay	--&gt;	Vacation Rentals</option>
        </select>
        <select size="1" name="addcategory3">
          <option selected="selected">--SELECT A CATEGORY--</option>
          <option>Community Organizations	--&gt;	Associations &amp; Organizations</option>
          <option>Event Venues	--&gt;	Venues</option>
          <option>Meetings Support Services	--&gt;	Caterers</option>
          <option>Meetings Support Services	--&gt;	Computer &amp; Equipment Rental</option>
          <option>Meetings Support Services	--&gt;	Employment Services</option>
          <option>Meetings Support Services	--&gt;	Entertainment</option>
          <option>Meetings Support Services	--&gt;	Event Planners</option>
          <option>Meetings Support Services	--&gt;	Event Technology &amp; Production</option>
          <option>Meetings Support Services	--&gt;	Florists &amp; Décor</option>
          <option>Meetings Support Services	--&gt;	Fireworks and Special Effects</option>
          <option>Meetings Support Services	--&gt;	Interpreters &amp; Translators</option>
          <option>Meetings Support Services	--&gt;	Party Rental Supplies</option>
          <option>Meetings Support Services	--&gt;	Photographers</option>
          <option>Meetings Support Services	--&gt;	Promotional Gifts</option>
          <option>Meetings Support Services	--&gt;	Printing Services</option>
          <option>Meetings Support Services	--&gt;	Security</option>
          <option>Meetings Support Services	--&gt;	Speakers</option>
          <option>Meetings Support Services	--&gt;	Team Building</option>
          <option>Meetings Support Services	--&gt;	Tradeshow Services</option>
          <option>Plan Your Trip	--&gt;	Travel Guides</option>
          <option>Plan Your Trip	--&gt;	Visitor Services	--&gt;	Visitor Information Centers</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Group &amp; Charter Transportation</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Limousines and Towncars</option>
          <option>Plan Your Trip	--&gt;	Getting Around	--&gt;	Other</option>
          <option>Plan Your Trip	--&gt;	My Travel	--&gt;	Book Your Trip</option>
          <option>Professional Services	--&gt;	Corporate &amp; HQ</option>
          <option>Professional Services	--&gt;	Event Production Companies</option>
          <option>Professional Services	--&gt;	Finance/Insurance/Legal/Real Estate</option>
          <option>Professional Services	--&gt;	Internet &amp; Technology Solutions</option>
          <option>Professional Services	--&gt;	Marketing and Media</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Galleries</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	History and Heritage</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Museums</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Music</option>
          <option>What To Do	--&gt;	Arts &amp; Culture	--&gt;	Theatre</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Bars</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Breweries</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Nightclubs</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Restaurants</option>
          <option>What To Do	--&gt;	Dining &amp; Nightlife	--&gt;	Wineries</option>
          <option>What To Do	--&gt;	Parks &amp; Gardens</option>
          <option>What To Do	--&gt;	Spas</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Action Sports</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Biking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Boating</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Fishing</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Golf</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Kayaking</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Scuba</option>
          <option>What To Do	--&gt;	Sports &amp; Recreation	--&gt;	Surfing</option>
          <option>What To Do	--&gt;	Tours &amp; Sightseeing</option>
          <option>Where To Stay	--&gt;	Bed &amp; Breakfasts</option>
          <option>Where To Stay	--&gt;	Camping &amp; RV Parks</option>
          <option>Where To Stay	--&gt;	Hostels</option>
          <option>Where To Stay	--&gt;	Vacation Rentals</option>
        </select>
      </div>
      <div style="clear:both;padding-top:25px;">*The SDTA team reserves the right to make a final determination on appropriate business categories.</div>
    </div>
   <div class="row">
        
        <div class="cols_12-6">
        <h3>Stand out with a Featured Listing</h3>
        <p>Featured listings are placed at the top of all other results and have better exposure to website visitors. Annual featured listing dues are $1800. The prorated amount through June 2016 is: <?php echo '$'.$pay_feat_amount; ?>.</p>
           
                  <input type="checkbox" value="off" name="featured" style="width: 30px; border: medium none; box-shadow: none;">
                  <label for="make_featured" style="clear: right; text-align: left;">Yes, please make this a featured listing.</label>
       
        </div>
        <div class="cols_12-6" id="featuredlistingexample">
       		<span>
            
            </span>
       
        </div>
    </div>
    <div class="sticky">
      <h3 style="margin:0;padding:0;">Questions?</h3>
      Do you have questions about this form or about your package options? Please contact the Membership Department at 619-557-2823. </div>
  </div>
  <p style="text-align:right;">
   <label for="promocode">Promo code</label> <input type="text" name="promocode" >
  

  </p>
  <p>
  <label for="captcha">Human Verification: 2+3= (enter in box)</label> <input type="text" name="captcha" >
  </p>
  <h2>Step Three: Submit your information, then on to payment.</h2>
  <input type="hidden" value="<?php echo $thismonth['basic']['cost']; ?>" >
  <input type="submit" id="submit-button" value="Submit">
</form>
<?php include "shell_includes/pageend.html" ?>