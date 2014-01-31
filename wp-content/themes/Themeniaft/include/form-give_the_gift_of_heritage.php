<!--<form action="<?php echo get_template_directory_uri(); ?>/include/send-form-new-york-gala-registration.php" method="post" name="form-new-york" id="form-new-york">

</form>-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                txtFirstName: {required: true},
                txtLastName: {required: true},
                txtAddress1: {required: true},
                txtCity: {required: true},
                txtState: {required: true},
                txtZip: {required: true, number: true},
                txtEmail: {required: true, email: true},
                nummemberships: {required: true},
                txtHomePhone: {number: true, minlength: 15},
                txtWorkPhone: {numeric: true},
            }
        });
    });
</script>
<form method="post" action="" id="ss-form" >

    Complete the form below to contribute to the NIAF.  All information is securely submitted using encryption.  Please note that fields with a 
    <span class="required"><b>*</b></span> are required!
    <div class="row-input">
        <div class="midinput">
            <span>First Name <span class="required">*</span></span>
            <input type="text" name="txtFirstName" id="txtFirstName" size="25" maxlength="32" value="<?php echo $_SESSION['txtFirstName']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name<span class="required">*</span></span>
            <input type="text" name="txtLastName" id="txtLastName" size="25" maxlength="64" value="<?php echo $_SESSION['txtLastName']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <span >Spouse Name - if applicable</span>
            <input type="text" name="txtSpouse" id="txtSpouse" size="25" maxlength="75" value="<?php echo $_SESSION['txtSpouse']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span >Organization</span>
            <input type="text" name="txtOrganization" id="txtOrganization" size="25" maxlength="32" value="<?php echo $_SESSION['txtOrganization']; ?>">
        </div>
        <div class="midinput">
            <span >Title</span>
            <input type="text" name="txtTitle" id="txtTitle" size="25" maxlength="32" value="<?php echo $_SESSION['txtTitle']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <input type="checkbox"  name="strWorkAddr" <?php echo $_SESSION['strWorkAddrRef'] == 'yes' ? 'checked' : ''; ?> class="checkedYes">
            <input type="hidden"  name="strWorkAddrRef" value="<?php echo $_SESSION['strWorkAddrRef'] == 'yes' ? 'yes' : 'no'; ?>">            
            <span >Check if this is a work address</span>&nbsp;
        </div>
    </div>		
    <div class="row-input">
        <div class="midinput">	
            <span >Street<span class="required">*</span></span>
            <input type="text" name="txtAddress1" id="txtAddress1" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress1']; ?>">
        </div>
        <div class="midinput">
            <br>
            <input type="text" name="txtAddress2" id="txtAddress2" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <span >City <span class="required">*</span></span>
            <input type="text" name="txtCity" id="txtCity" size="25" maxlength="40" value="<?php echo $_SESSION['txtCity']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span >State<span class="required">*</span></span>
            <input type="text" name="txtState" id="txtState" size="12" maxlength="12" value="<?php echo $_SESSION['txtState']; ?>">
        </div>
        <div class="midinput">
            <span >Zip</span><span class="required">*</span>
            <input type="text" name="txtZip" id="txtZip" size="10" maxlength="10" value="<?php echo $_SESSION['txtZip']; ?>">
        </div>
    </div>		
    <div class="row-input">
        <div class="midinput">
            <span >Home Telephone</span>
            <input type="text" name="txtHomePhone" id="txtHomePhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtHomePhone']; ?>">&nbsp;
        </div>
        <div class="midinput">
            <span >Work Telephone</span>
            <input type="text" name="txtWorkPhone" id="txtWorkPhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtWorkPhone']; ?>">&nbsp;
        </div>
    </div>		
    <div class="row-input">
        <div class="midinput">
            <span >E-mail<span class="required">*</span></span>&nbsp;
            <input type="text" name="txtEmail" id="txtEmail" size="25" maxlength="40" value="<?php echo $_SESSION['txtEmail']; ?>">&nbsp;
        </div>
        <div class="midinput">
            <span >Fax</span>
            <input type="text" name="txtFaxPhone" id="txtFaxPhone" size="15" maxlength="15" value="<?php echo $_SESSION['txtFaxPhone']; ?>">&nbsp;
        </div>
    </div>		
    <div class="row-input">
        <div class="biginput">
            <span >Gift Memberships</span>&nbsp;             
            <select name="nummemberships" id="nummemberships" size="1" onchange="verifynummemberships(this)">
                <?php
                for ($i = 0; $i < 6; $i++) {
                    $selected = '';
                    if ($i == $_SESSION['nummemberships']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php
                }
                ?>                
            </select><span>Recipient(s)<span class="required">*</span></span>
        </div>
    </div>

    <p>
        <b>Please review all the above information to make sure all fields are correct and click "continue" when finished or
            "reset" to start over:</b>
    </p>    
    <input type="submit" value="CONTINUE">&nbsp; &nbsp;
    <input type="reset" name="reset" value="RESET">
    <input type="hidden" name="step" value="2">
</form>