
<!--<form method="post" action="donate-2.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<script type="text/javascript">
    jQuery(document).ready(function() {
//        jQuery('#cat-all').on('click', function() {
//            if (jQuery(this).is(':checked')) {
//                jQuery('input.cat-don').prop('checked', true);
//            } else {
//                jQuery('input.cat-don').prop('checked', false);
//            }
//        });
        jQuery('#in-memory').on('click', function() {
            if (jQuery(this).is(':checked')) {
                jQuery('#recipient-donation').show();
                jQuery('#numgifts').addClass('required');
                jQuery('#DonateAmt').addClass('required');
                jQuery('.cb-depend').prop('disabled',false);
            } else {
                jQuery('#recipient-donation').hide();
                jQuery('#numgifts').removeClass('required error');
                jQuery('#DonateAmt').removeClass('required error');
                jQuery('.cb-depend').prop('disabled',true);
            }
        });
        jQuery('.cat-don').on('click', function() {
            jQuery('#cat-all').prop('checked', false);
        }); 
        jQuery('#ss-form').submit(function(e) {
            var don = 0;
            jQuery('.cat-don').each(function() {
                if (jQuery(this).is(':checked')) {
                    don += 5;
                }
            });
            var rec = Number(jQuery('#numgifts').val());
            var r = rec * don;
            var amount = Number(jQuery('#DonateAmt').val());
            if (amount < r) {
                alert('Minimum donation amount is $' + r);
                return false;
            }
        });
        jQuery('#ss-form').validate({
            rules: {
                txtFirstName: {required: true},
                txtLastName: {required: true},
                txtAddress1: {required: true},
                txtCity: {required: true},
                txtState: {required: true},
//                numgifts: {required: true},
                txtZip: {required: true, number: true},
                txtEmail: {required: true, email: true},
                "categoryDonation[]": {required: true}
//                DonateAmt: {required: true, number: true}
            }
        });
    });
</script>
<!--<form method="post" action="" name="DonateInfo" onsubmit="return(checkit(this));">-->
<form method="post" action="" id="ss-form">
    <div class="row-input">
        <div class="biginput">
            Complete the form below to contribute to the NIAF.  All information is securely submitted using encryption.  Please note that fields with a <span class="required">*</span> are required!
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>First Name <span class="required">*</span></span>
            <input type="text" name="txtFirstName" id="txtFirstName" size="25" maxlength="32" value="<?php echo $_SESSION['txtFirstName']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <span class="required">*</span></span>
            <input type="text" name="txtLastName" id="txtLastName" size="25" maxlength="64" value="<?php echo $_SESSION['txtLastName']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Spouse Name - if applicable</span>	
            <input type="text" name="txtSpouse" id="txtSpouse" size="25" maxlength="75" value="<?php echo $_SESSION['txtSpouse']; ?>">
        </div>
        <div class="midinput">
            <span>Organization</span>
            <input type="text" name="txtOrganization" id="txtOrganization" size="25" maxlength="32" value="<?php echo $_SESSION['txtOrganization']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            </span>Title</span>
            <input type="text" name="txtTitle" id="txtTitle" size="25" maxlength="32" value="<?php echo $_SESSION['txtTitle']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <input type="checkbox" name="strWorkAddr" id="strWorkAddr" <?php echo $_SESSION['strWorkAddrRef'] == 'yes' ? 'checked' : ''; ?> class="checkedYes">
            <input type="hidden" name="strWorkAddrRef" value="<?php echo $_SESSION['strWorkAddrRef'] == 'yes' ? 'yes' : 'no'; ?>">
            Check if this is a work address
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Street</span> <span class="required">*</span></span>		
            <input type="text" name="txtAddress1" id="txtAddress1" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress1']; ?>">
        </div>
        <div class="midinput">
            <br>
            <input type="text" name="txtAddress2" id="txtAddress2" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>City <span class="required">*</span></span>
            <input type="text" name="txtCity" id="txtCity" size="25" maxlength="40" value="<?php echo $_SESSION['txtCity']; ?>">
        </div>
        <div class="midinput">
            <span>State <span class="required">*</span></span>
            <input type="text" name="txtState" id="txtState" size="12" maxlength="12" value="<?php echo $_SESSION['txtState']; ?>">
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">
            <span>Zip<span class="required">*</span></pan>
                <input type="text" name="txtZip" id="txtZip" size="10" maxlength="10" value="<?php echo $_SESSION['txtZip']; ?>">
                </div>
                <div class="midinput">
                    <span>Home Telephone</span>
                    <input type="text" name="txtHomePhone" id="txtHomePhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtHomePhone']; ?>">
                </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Work Telephone</span>
                <input type="text" name="txtWorkPhone" id="txtWorkPhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtWorkPhone']; ?>">
            </div>
            <div class="midinput">
                <span>E-mail<span class="required">*</span></span>
                <input type="text" name="txtEmail" id="txtEmail" size="25" maxlength="40" value="<?php echo $_SESSION['txtEmail']; ?>">
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Fax</span>
                <input type="text" name="txtFaxPhone" id="txtFaxPhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtFaxPhone']; ?>">
            </div>
        </div>
        <div class="row-input">
            <div class="biginput">
                <span>Category of Donation <span class="required">*</span></span>
            </div>
        </div>
    <div  class="row-input">
            <div class="midinput">
                <?php
                $c=1;
                unset($data);
                $data = Array('In Memory / In Honor Of', 'General');
                foreach ($data as $value) {
                    $checked = '';
                    foreach ($_SESSION['categoryDonation'] as $val) {
                        if ($val == $value) {
                            $checked = 'checked';
                        }
                    }
                    ?>
                    <input type="checkbox" <?php echo $value=='In Memory / In Honor Of'?'id="in-memory"':''; ?> class="cat-don <?php echo $c>1?'cb-depend" disabled':'"';?> name="categoryDonation[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                    <?php
                    $c++;
                }
                ?>
            </div>
            <div class="midinput">
                <?php
                unset($data);
                $data = Array('Scholarship');
                foreach ($data as $value) {
                    $checked = '';
                    foreach ($_SESSION['categoryDonation'] as $val) {
                        if ($val == $value) {
                            $checked = 'checked';
                        }
                    }
                    ?>
                <input type="checkbox" disabled="" class="cat-don cb-depend" name="categoryDonation[]" value="<?php echo $value; ?>" <?php echo $checked; ?> ><?php echo $value; ?><br>
                    <?php
                }
                ?>  
                <!--<input type="checkbox" id="cat-all">All<br>-->                            
            </div>
        </div>
    <div id="recipient-donation" class="row-input" style="display: none">
            <div class="midinput">
                <span>Recipient(s)</span>               
                <select name="numgifts" id="numgifts" size="1" style="font-size: 14px;">
                    <?php
                    for ($i = 0; $i < 11; $i++) {
                        $selected = '';
                        if ($_SESSION['numgifts'] == $i) {
                            $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $i == 0 ? '' : $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="midinput">
                <span>Donation Amount <span class="required">*</span>  <b>$</b></span>				
                <input type="text" name="DonateAmt" id="DonateAmt" value="<?php echo $_SESSION['DonateAmt']; ?>" size="10" maxlength="10" style="font-size: 14px;">
            </div>
        </div>		

        <div class="row-input">
            <div class="biginput">
                <b><span class="required">*</span>
                    Please review all the above information to make sure all fields are correct and click "continue" when finished or
                    "reset" to start over:</font></b>
            </div>
        </div>
        <div class="row-input">
            <div class="biginput">
                <input type="submit" value="CONTINUE">&nbsp; &nbsp;
                <button type="button" id="btn-reset">RESET</button>
                <input type="hidden" name="step" value="2">
            </div>
        </div>
</form>