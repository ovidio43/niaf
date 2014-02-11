<!--<form method="post" action="donate-4.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
?>
<!--<form method="post" action="" name="DonateInfo" onsubmit="return(checkit(this));">-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                txtCardNumber: {required: true, number: true},
                txtCCFirstName: {required: true},
                txtCCLastName: {required: true},
                txtCCAddress1: {required: true},
                txtCCCity: {required: true},
                txtCCState: {required: true},
                txtCCZip: {required: true, number: true}
            }
        });
    });
</script>
<form method="post" action="" id="ss-form">
    <div class="row-input">
        <div class="midinput">
            <span>Entered Donation Amount <span class="required">*</span></span>
            <font face="Verdana, Arial, Helvetica" size="2"> <b>$</b></font>				
            <input type="text" name="DonateAmtConfirm" value="100" size="10" maxlength="10" readonly="">
        </div>
        <div class="midinput">		
            <span>Card Type <span class="required">*</span></span>
            <select name="cboCardType" id="cboCardType" size="1">
                <?php
                $data = Array('Visa', 'MasterCard', 'American Express');
                foreach ($data as $value) {
                    $selected = '';
                    if ($_SESSION['cboCardType'] == $value) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>> <?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Card Number <span class="required">*</span>  </span>
            <input type="text" name="txtCardNumber" id="txtCardNumber" value="<?php echo $_SESSION['txtCardNumber']; ?>" size="18" maxlength="18">
        </div>
        <div class="midinput">		
            <span>Expiration Month <span class="required">*</span></span>
            <select name="cboCardMonth" id="cboCardMonth" size="1">
                <?php
                $data = Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
                foreach ($data as $value) {
                    $selected = '';
                    if ($_SESSION['cboCardMonth'] == $value) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>> <?php echo $value; ?></option>
                    <?php
                }
                ?>           
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Expiration Year <span class="required">*</span> </span>    
            <select name="cboCardYear" id="cboCardYear" size="1">
                <?php
                for ($i = 2012; $i < 2020; $i++) {
                    $selected = '';
                    if ($_SESSION['cboCardYear'] == $i) {
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
            <input type="checkbox" value="yes" name="txtCCChkAddress" id="txtCCChkAddress">
            <font face="verdana, arial, helvetica" size="1">Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</font>&nbsp;<br><br>
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>First Name <span class="required">*</span></span> 
            <input type="text" name="txtCCFirstName" id="txtCCFirstName" size="25" maxlength="32" value="<?php echo $_SESSION['txtCCFirstName']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <span class="required">*</span></span>
            <input type="text" name="txtCCLastName" id="txtCCLastName" size="25" maxlength="64" value="<?php echo $_SESSION['txtCCLastName']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Street <span class="required">*</span></span>
            <input type="text" name="txtCCAddress1" id="txtCCAddress1" size="25" maxlength="100" value="<?php echo $_SESSION['txtCCAddress1']; ?>">
        </div>
        <div class="midinput">
            <span>City <span class="required">*</span> </span>
            <input type="text" name="txtCCCity" id="txtCCCity" size="25" maxlength="40" value="<?php echo $_SESSION['txtCCCity']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>State <span class="required">*</span></span>
            <input type="text" name="txtCCState" id="txtCCState" size="12" maxlength="12" value="<?php echo $_SESSION['txtCCState']; ?>">
        </div>
        <div class="midinput">
            <span>Zip <span class="required">*</span></span>
            <input type="text" name="txtCCZip" id="txtCCZip" size="10" maxlength="10" value="<?php echo $_SESSION['txtCCZip']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	
            <b><span class="required">*</span><font face="verdana, arial, helvetica" size="1"> 
                Please review all the above information to make sure all fields are correct and click "submit" when finished or
                "reset" to start over:</font></b>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp; 
            <input type="submit" name="submit" value="SUBMIT">&nbsp; &nbsp;
            <button type="button" id="btn-reset">RESET</button>
            <input type="hidden" name="step" value="4">
        </div>
    </div>
</form>
<form method="post" action="?step-back=true" id="formBack">
    <input type="hidden" name="step" value="2">         
</form>