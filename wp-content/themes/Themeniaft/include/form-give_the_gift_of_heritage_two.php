<!--<form method="post" action="donate-membership-4.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<?php

foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                DonateAmtConfirm: {required: true, number: true},
                cboCardType: {required: true},
                txtCardNumber: {required: true},
                cboCardMonth: {required: true},
                cboCardYear: {required: true},
                txtCCFirstName2: {required: true},
                txtCCLastName2: {required: true},
                txtCCAddress12: {required: true},
                txtCCCity2: {required: true},
                txtCCState2: {required: true},
                txtCCZip2: {required: true, number: true}
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
            <span>Card Type <b><span class="required">*</span></b></span>
            <?php
            $data = Array('Visa', 'Mastercard', 'American Express');
            ?>
            <select name="cboCardType2" id="cboCardType2" size="1">
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['cboCardType2']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Card Number <b><span class="required">*</span> </b> </span>
            <input type="text" name="txtCardNumber2" id="txtCardNumber2" value="<?php echo $_SESSION['txtCardNumber2']; ?>" size="18" maxlength="18">
        </div>
        <div class="midinput">		
            <span>Expiration Month <b><span class="required">*</span></b></span>
            <?php
            unset($data);
            $data = Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
            ?>
            <select name="cboCardMonth2" id="cboCardMonth" size="1">
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['cboCardMonth2']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Expiration Year <b><span class="required">*</span></b> </span>    
            <select name="cboCardYear2" id="cboCardYear2" size="1">
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
            <input type="checkbox" value="1" name="txtCCChkAddress" id="txtCCChkAddress">
            <font face="verdana, arial, helvetica" size="1">Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</font>&nbsp;<br><br>
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>First Name <b><span class="required">*</span></b></span> 
            <input type="text" name="txtCCFirstName2" id="txtCCFirstName2" size="25" maxlength="32" value="<?php echo $_SESSION['txtCCFirstName2']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <b><span class="required">*</span></b></span>
            <input type="text" name="txtCCLastName2" id="txtCCLastName2" size="25" maxlength="64" value="<?php echo $_SESSION['txtCCLastName2']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Street <b><span class="required">*</span></b></span>
            <input type="text" name="txtCCAddress12" id="txtCCAddress12" size="25" maxlength="100" value="<?php echo $_SESSION['txtCCAddress12']; ?>">
        </div>
        <div class="midinput">
            <span>City <b><span class="required">*</span></b> </span>
            <input type="text" name="txtCCCity2" id="txtCCCity2" size="25" maxlength="40" value="<?php echo $_SESSION['txtCCCity2']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>State <b><span class="required">*</span></b></span>
            <input type="text" name="txtCCState2" id="txtCCState2" size="12" maxlength="12" value="<?php echo $_SESSION['txtCCState2']; ?>">
        </div>
        <div class="midinput">
            <span>Zip <b><span class="required">*</span></b></span>
            <input type="text" name="txtCCZip2" id="txtCCZip2" size="10" maxlength="10" value="<?php echo $_SESSION['txtCCZip2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	
            <b><span class="required">*</span><font face="verdana, arial, helvetica" size="1"> Please review all the above information to make sure all fields are correct and click "submit" when finished or
                "reset" to start over:</font></b>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">	
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp;            
            <input type="submit" value="SUBMIT">&nbsp; &nbsp;
            <input type="reset" name="reset" value="RESET">
            <input type="hidden" name="step" value="4">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="2">
    <input type="hidden" name="back" value="true">
</form>