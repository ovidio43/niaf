<!--<form method="post" action="donorverify.asp" name="DonorInfo">-->
<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                DropDownSalutation: {required: true},
                txtFirstName2: {required: true},
                txtLastName2: {required: true},
                txtAddress12: {required: true},
                txtCity: {required: true},
                txtState: {required: true},
                txtZip: {required: true, number: true},
                txtEmail: {required: true, email: true},
                txtCountry: {required: true},
                level: {required: true},
                income: {required: true},
                DropDownDOB: {required: true},
                education: {required: true},
                cboCardType: {required: true},
                txtCardNumber: {required: true},
                cboCardMonth: {required: true},
                cboCardYear: {required: true},
                txtCCFirstName: {required: true},
                txtCCLastName: {required: true},
                txtCCAddress1: {required: true},
                txtCCCity: {required: true},
                txtCCState: {required: true},
                txtCCZip: {required: true, number: true},
                inttrestCategories: {required: true},
                heardAbout: {required: true},
                txtHomePhone2: {number: true, minlength: 15},
                txtWorkPhone2: {numeric: true}
            }
        });
    });
</script>
<form method="post" action="" id="ss-form">

    <div class="row-input">
        <div class="midinput">
            <span><strong>New Membership</strong></span>
            <input type="radio" value="true" <?php echo $_SESSION['optNewMember'] == 'true' ? 'checked' : ''; ?> name="optNewMember">
        </div>
        <div class="midinput">		
            <span><strong>Renewal </strong></span>
            <input type="radio" value="false" <?php echo $_SESSION['optNewMember'] == 'false' ? 'checked' : ''; ?> name="optNewMember">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <span>(Enter Member ID if known)</span>
            <input type="text" name="txtMemberID" size="7" maxlength="7" value="<?php echo $_SESSION['txtMemberID']; ?>">
        </div>
    </div>
    <font face="Verdana, Arial, Helvetica" size="1">
    <font color="blue">------------------------------------------------------------------</font>
    </font>
    <div class="row-input">
        <div class="biginput">
            <span><b><u>Contact Information:</u></b></span> 
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            Salutation: <span class="required">*</span>
            <?php
            $data = Array(
                'Atty.', 'Capt.', 'Cav.', 'Col.', 'Com.', 'Deacon', 'Del.', 'Dott.', 'Dr.', 'Fr.', 'Gen.', 'Hon.', 'Judge',
                'Lt.', 'Lt. Col.', 'Lt. Comm.', 'Maj. Gen.', 'Maj.', 'Mayor', 'Mr.', 'Mr. &amp, Mrs.', 'Mrs.', 'Ms.', 'Msgr.',
                'Prof.', 'Rev.', 'Rev. Msgr.', 'Sen.', 'Sgt.', 'Sister',
            );
            ?>

            <select name="DropDownSalutation" value="Select" size="1">
                <option value="">-- SELECT --</option>	
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['DropDownSalutation']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>             
            </select>	
        </div>
        <div class="midinput">
            <span>First Name: <span class="required">*</span></span>		
            <input type="text" name="txtFirstName2" size="25" maxlength="45" value="<?php echo $_SESSION['txtFirstName2']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Middle Name(or Initial):</span>
            <input type="text" name="txtMiddleName" size="25" maxlength="45" value="<?php echo $_SESSION['txtMiddleName']; ?>">
        </div>
        <div class="midinput">
        </span>Last Name: <span class="required">*</span></span>
    <input type="text" name="txtLastName2" size="25" maxlength="45" value="<?php echo $_SESSION['txtLastName2']; ?>">
</div>
</div>
<div class="row-input">
    <div class="midinput">
        <span>Suffix - (if applicable):</span>
        <?php
        unset($data);
        $data = array('II', 'III', 'Esq', 'Jr', 'MD', 'PhD', 'Sr');
        ?>
        <select name="DropDownSuffix" value="Select" size="1">
            <option value="">-- SELECT --</option>				
            <?php
            $selected = '';
            foreach ($data as $value) {
                $selected = '';
                if ($value == $_SESSION['DropDownSuffix']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php
            }
            ?>
        </select>		
    </div>
    <div class="midinput">
        <span>Nick Name:</span>	
        <input type="text" name="txtNickName" size="25" maxlength="45" value="<?php echo $_SESSION['txtNickName']; ?>">
    </div>
</div>
<div class="row-input">
    <div class="midinput">
        <span>Spouse Name - (if applicable):</pan>
            <input type="text" name="txtSpouse2" size="25" maxlength="75" value="<?php echo $_SESSION['txtSpouse2']; ?>">
            </div>
            <div class="midinput">
                <span>Organization:</span>
                <input type="text" name="txtOrganization2" size="25" maxlength="60" value="<?php echo $_SESSION['txtOrganization2']; ?>">
            </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Title:</span>
            <input type="text" name="txtTitle2" size="25" maxlength="45" value="<?php echo $_SESSION['txtTitle2']; ?>">
        </div>
        <div class="midinput">	
            <span>Check if this is a work address:</span>
            <input type="checkbox"  name="strWorkAddr2" <?php echo $_SESSION['strWorkAddr2Ref'] == 'yes' ? 'checked' : ''; ?> class="checkedYes">
            <input type="hidden"  name="strWorkAddr2Ref" value="<?php echo $_SESSION['strWorkAddr2Ref'] == 'yes' ? 'yes' : 'no'; ?>" >
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <span>Street: <span class="required">*</span></span>		
            <input type="text" name="txtAddress12" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress12']; ?>">
        </div>
        <div class="midinput">
            <br>
            <input type="text" name="txtAddress22" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress22']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">			
            <span>City: <span class="required">*</span></span>		
            <input type="text" name="txtCity2" size="25" maxlength="40" value="<?php echo $_SESSION['txtCity2']; ?>">
        </div>
        <div class="midinput">
            <span>State: <span class="required">*</span></span>	
            <input type="text" name="txtState2" size="2" maxlength="2" value="<?php echo $_SESSION['txtState2']; ?>">		
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Country:<br>&nbsp;(For Non-USA residents only) <span class="required">*</span></span>
            <input type="text" name="txtCountry" size="25" maxlength="50" value="<?php echo $_SESSION['txtCountry']; ?>">		
        </div>
        <div class="midinput">
            <span>Zip: <span class="required">*</span></span>
            <input type="text" name="txtZip2" size="10" maxlength="10" value="<?php echo $_SESSION['txtZip2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Home Telephone:</span>
            <input type="text" name="txtHomePhone2" size="15" maxlength="15" value="<?php echo $_SESSION['txtHomePhone2']; ?>">
        </div>
        <div class="midinput">
            <span>Work Telephone:</span>
            <input type="text" name="txtWorkPhone2" size="15" maxlength="15" value="<?php echo $_SESSION['txtWorkPhone2']; ?>">&nbsp;
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Fax:</span>
            <input type="text" name="txtFaxPhone2" size="15" maxlength="15" value="<?php echo $_SESSION['txtFaxPhone2']; ?>">
        </div>
        <div class="midinput">
            <span> E-mail Address: <span class="required">*</span></span>	
            <input type="text" name="txtEmail2" size="25" maxlength="65" value="<?php echo $_SESSION['txtEmail2']; ?>">
        </div>
    </div>
    <font color="blue">--------------------------------------------------------------------</font>
    <div class="row-input">
        <div class="biginput">	
            <span class="required">*</span> <u><b>Choose Your Council Membership:</b></u>		
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <input type="radio" value="STU" <?php echo $_SESSION['level'] == 'STU' ? 'checked' : ''; ?> name="level" id="level1" onclick="clevel(25)">
            NIAF Student Membership - $25 <br>
            <input type="radio" value="AS" <?php echo $_SESSION['level'] == 'AS' ? 'checked' : ''; ?> name="level" id="level2" onclick="clevel(50)">
            NIAF Associate Membership  - $50 <br>
            <input type="radio" value="NSM" <?php echo $_SESSION['level'] == 'NSM' ? 'checked' : ''; ?> name="level" id="level3" onclick="clevel(125)">
            NIAF Sustaining Membership - $125 <br>
            <input type="radio" value="NPM" <?php echo $_SESSION['level'] == 'NPM' ? 'checked' : ''; ?> name="level" id="level4" onclick="clevel(250)">
            NIAF Patron Membership - $250 
        </div>
        <div class="midinput">
            <input type="radio" value="NCM" <?php echo $_SESSION['level'] == 'NCM' ? 'checked' : ''; ?> name="level" id="level5" onclick="clevel(500)">
            NIAF Council Membership - $500 <br>
            <input type="radio" value="BCM" <?php echo $_SESSION['level'] == 'BCM' ? 'checked' : ''; ?> name="level" id="level6" onclick="clevel(1000)">
            NIAF Business Council Membership - $1,000 <br>
            <input type="radio" value="FCM" <?php echo $_SESSION['level'] == 'FCM' ? 'checked' : ''; ?> name="level" id="level7" onclick="clevel(2500)">
            Founder's Circle Membership - $2,500 <br>
            <input type="radio" value="CCM" <?php echo $_SESSION['level'] == 'CCM' ? 'checked' : ''; ?> name="level" id="level8" onclick="clevel(5000)">
            Chairman's Circle Membership - $5,000 
        </div>
    </div>			

    <div class="row-input">
        <div class="biginput">
            <a href="/membership/membership-types.asp" target="_blank">CLICK HERE</a> to learn more about our membership levels.	
        </div>
    </div>
    <font face="Verdana, Arial, Helvetica" size="1">
    <font color="blue">---------------------------------------------------------------------</font>
    </font>
    <div class="row-input">
        <div class="biginput">
            <b><u>Statistical Information:</u></b>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <b>Please Note:</b> In order to get a more accurate sense of the demographics of our members, where their interests lie, and through which avenues they've come to learn about the NIAF, we require that the following be completed.  Please rest assured that the NIAF will <u>not</u> share this information with outside parties.  This information is collected and used solely for in-house statistical purposes.
            <br>
            <br>
            If you do not want to provide the following information, we kindly ask that you call 202-387-0600 and we can take your membership information over the phone.
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">		
            <span>YEAR OF BIRTH <span class="required">*</span><br></span>
            <select name="DropDownDOB" size="1">
                <option selected="">-- SELECT --</option>
                <?php
                $selected = '';
                for ($i = 1900; $i < 2009; $i++) {
                    $selected = '';
                    if ($i == $_SESSION['DropDownDOB']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <font color="blue">-------------------------</font>

    <div class="row-input">
        <div class="biginput">	
            HIGHEST LEVEL OF <br>EDUCATION RECEIVED<span class="required">*</span>
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">	
            <input type="radio" value="High School" <?php echo $_SESSION['education'] == 'High School' ? 'checked' : ''; ?> name="education">
            High School <br>
            <input type="radio" value="Associate Degree" <?php echo $_SESSION['education'] == 'Associate Degree' ? 'checked' : ''; ?> name="education">
            Associate Degree <br>
            <input type="radio" value="Bachelor Degree" <?php echo $_SESSION['education'] == 'Bachelor Degree' ? 'checked' : ''; ?> name="education">
            Bachelor's Degree
        </div>
        <div class="midinput">
            <input type="radio" value="Graduate" <?php echo $_SESSION['education'] == 'Graduate' ? 'checked' : ''; ?> name="education">
            Graduate <br>
            <input type="radio" value="Doctorate" <?php echo $_SESSION['education'] == 'Doctorate' ? 'checked' : ''; ?> name="education">
            Doctorate
        </div>
    </div>		
    <font color="blue">-------------------------</font>					
    <div class="row-input">
        <div class="biginput">
            <span>HOUSEHOLD INCOME <span class="required">*</span></span>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <input type="radio" value="$75,000 and below" <?php echo $_SESSION['income'] == '$75,000 and below' ? 'checked' : ''; ?> name="income">
            $75,000 and below <br>
            <input type="radio" value="$75,001 - $150,000" <?php echo $_SESSION['income'] == '$75,001 - $150,000' ? 'checked' : ''; ?> name="income">
            $75,001 - $150,000
        </div>
        <div class="midinput">
            <input type="radio" value="$150,001 - $300,000" <?php echo $_SESSION['income'] == '$150,001 - $300,000' ? 'checked' : ''; ?> name="income">
            $150,001 - $300,000	<br>
            <input type="radio" value="$300,001 and above" <?php echo $_SESSION['income'] == '$300,001 and above' ? 'checked' : ''; ?> name="income">
            $300,000 and above
        </div>
    </div>
    <font color="blue">-------------------------</font>					
    <div class="row-input">
        <div class="biginput">			
            INTEREST CATEGORIES <span class="required">*</span><br>
            (check all that apply)
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	        
            <?php
            unset($data);
            $data = Array(
                'Scholarships and Grants', 'Youth and Education', 'Language and Culture',
                'U.S. Italy Relations', 'Political Advocacy and Action'
            );
            foreach ($data as $value) {
                $checked = '';
                foreach ($_SESSION['inttrestCategories'] as $val) {
                    if ($val == $value) {
                        $checked = 'checked';
                    }
                }
                ?>
                <input type="checkbox" name="inttrestCategories[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                <?php
            }
            ?>
<!--            <input type="checkbox" name="inttrestCategories[]" value="chkScholarships">Scholarships and Grants<br>
<input type="checkbox" name="inttrestCategories[]" value="chkYouthAndEducation">Youth and Education<br>	
<input type="checkbox" name="inttrestCategories[]" value="chkLanguageAndCulture">Language and Culture<br>
<input type="checkbox" name="inttrestCategories[]" value="chkUSItalyRelations">U.S. Italy Relations<br>
<input type="checkbox" name="inttrestCategories[]" value="chkPoliticalAdvocacyAndAction">Political Advocacy and Action-->
        </div>
        <div class="midinput">
            <?php
            unset($data);
            $data = Array(
                'Anti-Defamation Issues', 'Travel Program', 'Mentoring and Leadership',
                'Professional Networking'
            );
            foreach ($data as $value) {
                $checked = '';
                foreach ($_SESSION['inttrestCategories'] as $val) {

                    if ($val == $value) {
                        $checked = 'checked';
                    }
                }
                ?>
                <input type="checkbox" name="inttrestCategories[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                <?php
            }
            ?>
<!--            <input type="checkbox" name="inttrestCategories[]" value="chkAntiDefamationIssues">Anti-Defamation Issues<br>
<input type="checkbox" name="inttrestCategories[]" value="chkTravelProgram">Travel Program<br>	
<input type="checkbox" name="inttrestCategories[]" value="chkMentoringAndLeadership">Mentoring and Leadership<br>
<input type="checkbox" name="inttrestCategories[]" value="chkProfessionalNetworking">Professional Networking-->
        </div>
    </div>

    <font color="blue">-------------------------</font>			
    <div class="row-input">
        <div class="biginput">
            I HEARD ABOUT THE <br>NIAF THROUGH <span class="required">*</span><br><br>
            (check all that apply)&nbsp;&nbsp;
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <?php
            unset($data);
            $data = Array(
                'A friend/relative', 'Business Contact', 'Mailing',
                'Internet'
            );
            foreach ($data as $value) {
                $checked = '';
                foreach ($_SESSION['heardAbout'] as $val) {
                    if ($val == $value) {
                        $checked = 'checked';
                    }
                }
                ?>
                <input type="checkbox" name="heardAbout[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                <?php
            }
            ?>

<!--            <input type="checkbox" name="heardAbout[]" value="chkFriendRelative">A friend/relative<br>
            <input type="checkbox" name="heardAbout[]" value="chkBusinessContact">Business Contact<br>
            <input type="checkbox" name="heardAbout[]" value="chkNIAFMailing">Mailing<br>
            <input type="checkbox" name="heardAbout[]" value="chkInternet">Internet<br>		-->
        </div>
        <div class="midinput">  
            <?php
            unset($data);
            $data = Array(
                'NIAF Event', 'Media', 'Perillo Tours'
            );
            foreach ($data as $value) {
                $checked = '';
                foreach ($_SESSION['heardAbout'] as $val) {
                    if ($val == $value) {
                        $checked = 'checked';
                    }
                }
                ?>
                <input type="checkbox" name="heardAbout[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                <?php
            }
            ?>
<!--            <input type="checkbox" name="heardAbout[]" value="chkNIAFEvent">NIAF Event<br>
<input type="checkbox" name="heardAbout[]" value="chkMedia">Media<br>
<input type="checkbox" name="heardAbout[]" value="chkPerilloTours">Perillo Tours<br>-->
        </div>
    </div>
    <font color="blue">------------------------------------------</font>
    <div class="row-input">
        <div class="biginput">
            <b><u>Membership Prepayment:</u></b>
            For your convenience, members may elect to prepay their membership for multiple years
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <span>Membership term:</span>	
            <?php
            unset($data);
            $data = Array('1 Year', '2 Years', '3 Years', '4 Years', '5 Years');
            ?>
            <select name="memberterm" id="memberterm" value="Select" size="1" onchange="memterm()">
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['memberterm']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>	
        </div>
        <div class="midinput">
            <span>Total Payment:</span>
            <input type="text" name="GrandTotal" id="GrandTotal" value="<?php echo $_SESSION['GrandTotal']; ?>" size="10" maxlength="15" readonly="">
        </div>
    </div>	

    <div class="row-input">
        <div class="biginput">
            <span><b><u>Payment Method:</u></b></span>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <span>Card Type <b><span class="required">*</span></b></span><br>
            <?php
            unset($data);
            $data = Array('Visa', 'Mastercard', 'American Express');
            ?>
            <select name="cboCardType" size="1">				
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['cboCardType']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="midinput">
            Card Number <b><span class="required">*</span> </b><br>           
            <input type="text" name="txtCardNumber" value="<?php echo $_SESSION['txtCardNumber']; ?>" size="30" maxlength="20">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <span>Expiration Month <b> <span class="required">*</span> </b><br></span>	
            <?php
            unset($data);
            $data = Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
            ?>
            <select name="cboCardMonth" size="1">
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['cboCardMonth']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="midinput">
            <span>Expiration Year <b><font color="#CC0000">*</font> </b><br></span>
            <select name="cboCardYear" size="1">
                <?php
                for ($i = 2012; $i < 2020; $i++) {
                    $selected = '';
                    if ($i == $_SESSION['cboCardYear']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php
                }
                ?>                					
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	    
            <input type="checkbox" name="txtCCChkAddress" id="txtCCChkAddress" <?php echo $_SESSION['txtCCChkAddressRef'] == 'yes' ? 'checked' : ''; ?> class="checkedYes">
            <input type="hidden" name="txtCCChkAddressRef"  value="<?php echo $_SESSION['txtCCChkAddressRef'] == 'yes' ? 'yes' : 'no'; ?>" >
            <font face="verdana, arial, helvetica" size="1">Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</font>&nbsp;<br><br>
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">	
            <font face="verdana, arial, helvetica" size="1">First Name </font>
            <span class="required">*</span><br>
            <input type="text" name="txtCCFirstName" id="txtCCFirstName" size="25" maxlength="32" value="<?php echo $_SESSION['txtCCFirstName']; ?>">
        </div>
        <div class="midinput">
            <font face="verdana, arial, helvetica" size="1">Last Name</font> 
            <span class="required">*</span><br>
            <input type="text" name="txtCCLastName" id="txtCCLastName" size="25" maxlength="64" value="<?php echo $_SESSION['txtCCLastName']; ?>">
        </div>
    </div>	

    <div class="row-input">
        <div class="midinput">	
            <font face="verdana, arial, helvetica" size="1">Street</font>
            <span class="required">*</span><br>
            <input type="text" name="txtCCAddress1" id="txtCCAddress1" size="25" maxlength="100" value="<?php echo $_SESSION['txtCCAddress1']; ?>">
        </div>
        <div class="midinput">
            <font face="verdana, arial, helvetica" size="1">City </font>
            <span class="required">*</span><br>
            <input type="text" name="txtCCCity" id="txtCCCity" size="25" maxlength="40" value="<?php echo $_SESSION['txtCCCity']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">	
            <font face="verdana, arial, helvetica" size="1">State</font>
            <span class="required">*</span><br>
            <input type="text" name="txtCCState" id="txtCCState" size="12" maxlength="12" value="<?php echo $_SESSION['txtCCState']; ?>">
        </div>
        <div class="midinput">
            <font face="verdana, arial, helvetica" size="1">Zip</font><span class="required">*</span><br>
            <input type="text" name="txtCCZip" id="txtCCZip" size="10" maxlength="10" value="<?php echo $_SESSION['txtCCZip']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	
            <b><span class="required">*</span> Please review all the above information to make sure all fields are correct and click "submit" when finished or
                "reset" to start over:</b>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">            
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp;
            <input type="submit" value="CONTINUE">&nbsp; &nbsp;
            <input type="reset" name="reset" value="RESET">
            <input type="hidden" name="step" value="3">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="1">
</form>


