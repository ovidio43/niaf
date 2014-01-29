<!--<form method="post" action="donate-3.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                RFirstName1: {required: true},
                RLastName1: {required: true},
                RAddress11: {required: true},
                RCity1: {required: true},
                RState1: {required: true},
                RZip1: {required: true, number: true},
                RFirstName2: {required: true},
                RLastName2: {required: true},
                RAddress12: {required: true},
                RCity2: {required: true},
                RState2: {required: true},
                RZip2: {required: true, number: true}
            }
        });
    });
</script>
<!--<form method="post" action="" name="DonateInfo" onsubmit="return(checkit(this));">-->
<form method="post" action="" id="ss-form">

    <div class="row-input">
        <div class="biginput">
            Recipient 1
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>First Name <span class="required">*</span></span>
            <input text="text" name="RFirstName1" id="RFirstName1" size="25" maxlength="32" value="<?php echo $_SESSION['RFirstName1']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <span class="required">*</span></span>
            <input text="text" name="RLastName1" id="RLastName1" size="25" maxlength="64" value="<?php echo $_SESSION['RLastName1']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Street <span class="required">*</span></span>
            <input text="text" name="RAddress11" id="RAddress11" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress11']; ?>">
        </div>
        <div class="midinput">
            <br>
            <input text="text" name="RAddress21" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress21']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>City <span class="required">*</span></span>
            <input text="text" name="RCity1" id="RCity1" size="25" maxlength="40" value="<?php echo $_SESSION['RCity1']; ?>">
        </div>
        <div class="midinput">
            <span>State <span class="required">*</span></span>
            <input type="text" name="RState1" id="RState1" size="12" maxlength="12" value="<?php echo $_SESSION['RState1']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Zip <span class="required">*</span></span>
            <input text="text" name="RZip1" id="RZip1" size="10" maxlength="10" value="<?php echo $_SESSION['RZip1']; ?>">
        </div>
    </div>

    <div class="row-input">
        <div class="biginput">
            Recipient 2
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>First Name <span class="required">*</span></span>
            <input text="text" name="RFirstName2" id="RFirstName2" size="25" maxlength="32" value="<?php echo $_SESSION['RFirstName2']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <span class="required">*</span></span>
            <input text="text" name="RLastName2" id="RLastName2" size="25" maxlength="64" value="<?php echo $_SESSION['RLastName2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Street <span class="required">*</span></span>
            <input text="text" name="RAddress12" id="RAddress22" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress12']; ?>">
        </div>
        <div class="midinput">
            <br>
            <input text="text" name="RAddress22" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress22']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>City <span class="required">*</span></span>
            <input text="text" name="RCity2" id="RCity2" size="25" maxlength="40" value="<?php echo $_SESSION['RCity2']; ?>">
        </div>
        <div class="midinput">
            <span>State <span class="required">*</span></span>
            <input type="text" name="RState2" id="RState2" size="12" maxlength="12" value="<?php echo $_SESSION['RState2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Zip <span class="required">*</span></span>
            <input text="text" name="RZip2" id="RZip2" size="10" maxlength="10" value="<?php echo $_SESSION['RZip2']; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <b><span class="required">*</span> Please review all the above information to make sure all fields are correct and click "continue" when finished or
                "reset" to start over:</b>
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp;            
            <input type="submit" name="submit" value="CONTINUE">&nbsp; &nbsp;
            <input type="reset" name="reset" value="RESET">
            <input type="hidden" name="step" value="3">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="1">    
</form>