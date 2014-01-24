<form action="<?php echo get_template_directory_uri(); ?>/include/send-form-new-york-gala-registration.php" method="post" name="form-new-york" id="form-new-york">

    <p>Welcome to the NIAF'S New York Gala Registration Form. <b>Please Reserve </b>Your Spot Today!</p>
    <ul>
        <u>Please Note:</u>
        - Fields with a red <span class="required">*</span> are <span class="required">Required</span>
        - All forms are <u>securely</u> submitted using encryption
    </ul>

    <h3 class="form-title">Reservation:</h3>

    <div class="row-input">
        <div class="biginput">
            <b><span class="required">*</span> Choose Your Package: </b><br>
            <input type="radio" value="Member" name="level" id="level1" amount="750" class="amount">
            <label for="level1">Member: $750</label>
            <br>
            <input type="radio" value="Non-Member" name="level" id="level2" amount="1000" class="amount">
            <label for="level2">Non-Member: $1,000</label>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('.amount').on('click', function() {
                var amount = jQuery(this).attr('amount');
                jQuery('#GrandTotal').val(amount);
                if (jQuery(this).val() == 'Member' && jQuery(this).is(':checked')) {
                    jQuery('#guest1').addClass('required').parent().remove('span').prepend('<span class="required">*&nbsp;</span>');
                } else {
                    jQuery('#guest1').removeClass('required').parent().children('span').remove();
                }
            });

            jQuery('#txtCCChkAddress').on('click', function() {
                if (jQuery(this).is(':checked')) {
                    jQuery('#txtCCFirstName').val(jQuery('#txtFirstName').val());
                    jQuery('#txtCCLastName').val(jQuery('#txtLastName').val());
                    jQuery('#txtCCAddress1').val(jQuery('#txtAddress1').val());
                    jQuery('#txtCCCity').val(jQuery('#txtCity').val());
                    jQuery('#txtCCState').val(jQuery('#txtState').val());
                    jQuery('#txtCCZip').val(jQuery('#txtZip').val());
                } else {
                    jQuery('#txtCCFirstName').val('');
                    jQuery('#txtCCLastName').val('');
                    jQuery('#txtCCAddress1').val('');
                    jQuery('#txtCCCity').val('');
                    jQuery('#txtCCState').val('');
                    jQuery('#txtCCZip').val('');
                }
            });

        });</script>

    <div class="row-input">
        <div class="biginput">
            <b>TOTAL REMITTED $</b><input type="hidden" name="dollartotal" size="9" maxlength="9" value="0.00">
            <input type="text" name="dollartotal2" id="GrandTotal" size="9" maxlength="9" value="0.00" onfocus="blur();">
        </div>
    </div>
    <b><u>Please enter your NIAF membership number if a member:</u></b>
    <div class="row-input">
        <div class="biginput">
            NIAF Membership #<input type="text" value="" size="60" maxlength="100" name="guest1" id="guest1">
        </div>
    </div>
    <center><b><u>Please complete below</u></b></center>
    <div class="row-input">
        <div class="biginput">
            <span class="required">*&nbsp;</span> Salutation:
            <select name="Salutation" value="Select Salutation" size="1">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Mr. and Mrs.">Mr. and Mrs.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
                <option value="Hon.">Hon.</option>
                <option value="Rev.">Rev.</option>
                <option value="Sen.">Sen.</option>
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="required">*&nbsp;</span> First Name:
            <input type="text" id="txtFirstName" name="txtFirstName" size="50" maxlength="50" value="">
        </div>
        <div class="midinput">
            <span class="required">*&nbsp;</span> Last Name:
            <input type="text" id="txtLastName" name="txtLastName" size="50" maxlength="75" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            Firm/Organization:
            <input type="text" id="txtOrganization" name="txtOrganization" size="50" maxlength="75" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="required">*&nbsp;</span>Address:
            <input type="text" id="txtAddress1" name="txtAddress1" size="50" maxlength="60" value="">
        </div>
        <div class="midinput"> 
            <br>                                                                       
            <input type="text" id="txtAddress2" name="txtAddress2" size="50" maxlength="60" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="required">*&nbsp;</span>City:
            <input type="text" id="txtCity" name="txtCity" size="25" maxlength="40" value="">
        </div>
        <div class="midinput">    
            <span class="required">*&nbsp;</span>State Abbreviation:
            <input type="text" id="txtState" name="txtState" size="2" maxlength="2" value="">&nbsp;&nbsp;<i>example: DC</i>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">      
            <span class="required">*&nbsp;</span>Zip Code:
            <input type="text" id="txtZip" name="txtZip" size="10" maxlength="10" value="">
        </div>
        <div class="midinput">    
            Home Phone:
            <input type="text" id="txtHomePhone" name="txtHomePhone" size="12" maxlength="12" value="">&nbsp;&nbsp;<i>example: 202-387-0600</i>
        </div>
    </div>                                                                                                                              <div class="row-input">
        <div class="midinput"> 
            Business Phone:
            <input type="text" id="txtBizPhone" name="txtBizPhone" size="12" maxlength="12" value="">&nbsp;&nbsp;<i>example: 202-387-0800</i>
        </div>
        <div class="midinput">             
            <span class="required">*&nbsp;</span>Email Address:
            <input type="text" id="txtEmail" name="txtEmail" size="30" maxlength="30" value="">&nbsp;&nbsp;<i>example: johndoe@aol.com</i>
        </div>
    </div>
    <h3><u>Payment Method</u></h3>
    <div class="row-input">
        <div class="midinput"> 
            Credit Card:
            <select id="CardType" name="CardType" size="1">
                <option value="N/A">Select</option>
                <option value="Visa">Visa</option>
                <option value="MasterCard1">MasterCard</option>
                <option value="American Express">American Express</option>
            </select>                   
        </div>
        <div class="midinput">   
            Credit Card Number:
            <input type="text" id="" name="txtCCNumber" size="16" maxlength="16" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput"> 
            Credit Card Expiration Month:
            <select id="" name="CardExpMonth" value="Select Month" size="1">
                <option value="N/A">Select</option>
                <option value="01">1 - Jan</option>
                <option value="02">2 - Feb</option>
                <option value="03">3 - Mar</option>
                <option value="04">4 - Apr</option>
                <option value="05">5 - May</option>
                <option value="06">6 - Jun</option>
                <option value="07">7 - Jul</option>
                <option value="08">8 - Aug</option>
                <option value="09">9 - Sep</option>
                <option value="10">10 - Oct</option>
                <option value="11">11 - Nov</option>
                <option value="12">12 - Dec</option>
            </select>
        </div>
        <div class="midinput"> 
            Credit Card Expiration Year:
            <select id="" name="CardExpYear" size="1">
                <option value="N/A" selected="">Select</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>                  
                <option value="2015">2015</option>              
                <option value="2016">2016</option>              
                <option value="2017">2017</option>                                                                      
                <option value="2018">2018</option>                                                                      
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput"> 
            <input type="checkbox" value="1" name="txtCCChkAddress" id="txtCCChkAddress">
            Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</span>&nbsp;
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            First Name <span class="required">*</span>
            <input type="text" name="txtCCFirstName" id="txtCCFirstName" size="25" maxlength="32" value="">
        </div>
        <div class="midinput"> 
            Last Name <span class="required">*</span>
            <input type="text" name="txtCCLastName" id="txtCCLastName" size="25" maxlength="64" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            Street <span class="required">*</span>
            <input type="text" name="txtCCAddress1" id="txtCCAddress1" size="25" maxlength="100" value="">
        </div>
        <div class="midinput"> 
            City <span class="required">*</span>
            <input type="text" name="txtCCCity" id="txtCCCity" size="25" maxlength="40" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            State <span class="required">*</span>
            <input type="text" name="txtCCState" id="txtCCState" size="12" maxlength="12" value="">
        </div>
        <div class="midinput"> 
            Zip <span class="required">*</span>
            <input type="text" name="txtCCZip" id="txtCCZip" size="10" maxlength="10" value="">
        </div>
    </div>
    <center>
        <input type="submit" name="submit" value="SUBMIT">
        <input type="reset" name="reset" value="RESET">
        <span id="msg"></span>
    </center>
</form>