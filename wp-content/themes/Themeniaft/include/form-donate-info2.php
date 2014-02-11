<!--<form method="post" action="donate-3.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
$recip = $_SESSION['numgifts'];
for ($i = 1; $i <= 10; $i++) {
    if ($i > $recip) {
        unset($_SESSION['RFirstName' . $i]);
        unset($_SESSION['RLastName' . $i]);
        unset($_SESSION['RAddress' . $i]);
        unset($_SESSION['RAddress2' . $i]);
        unset($_SESSION['RCity' . $i]);
        unset($_SESSION['RState' . $i]);
        unset($_SESSION['RZip' . $i]);
    }
}


//$recip = $_SESSION['numgifts'];
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
        rules: {
<?php for ($i = 1; $i <= $recip; $i++) { ?>
            RFirstName<?php echo $i; ?>: {required: true},
                    RLastName<?php echo $i; ?>: {required: true},
                    RAddress1<?php echo $i; ?>: {
                    required: true
                    }
            ,
                    RCity<?php echo $i; ?>: {
                    required: true
                    }
            ,
                    RState<?php echo $i; ?>: {
                    required: true
                    }
            ,
                    RZip<?php echo $i; ?>: {required: true, number: true},
<?php } ?>
        }
    });
    });
</script>
<!--<form method="post" action="" name="DonateInfo" onsubmit="return(checkit(this));">-->
<form method="post" action="" id="ss-form">
    <?php
    for ($i = 1; $i <= $recip; $i++) {
        ?>
        <div class="row-input">
            <div class="biginput">
                <b> Recipient <?php echo $i; ?></b>
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>First Name <span class="required">*</span></span>
                <input type="text" name="RFirstName<?php echo $i; ?>" id="RFirstName<?php echo $i; ?>" size="25" maxlength="32" value="<?php echo $_SESSION['RFirstName' . $i]; ?>">
            </div>
            <div class="midinput">
                <span>Last Name <span class="required">*</span></span>
                <input type="text" name="RLastName<?php echo $i; ?>" id="RLastName<?php echo $i; ?>" size="25" maxlength="64" value="<?php echo $_SESSION['RLastName' . $i]; ?>">
            </div>
        </div>	
        <div class="row-input">
            <div class="midinput">
                <span>Street <span class="required">*</span></span>
                <input type="text" name="RAddress<?php echo $i; ?>" id="RAddress<?php echo $i; ?>" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress' . $i]; ?>">
            </div>
            <div class="midinput">
                <br>
                <input type="text" name="RAddress2<?php echo $i; ?>" size="25" maxlength="100" value="<?php echo $_SESSION['RAddress2' . $i]; ?>">
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>City <span class="required">*</span></span>
                <input type="text" name="RCity<?php echo $i; ?>" id="RCity<?php echo $i; ?>" size="25" maxlength="40" value="<?php echo $_SESSION['RCity' . $i]; ?>">
            </div>
            <div class="midinput">
                <span>State <span class="required">*</span></span>
                <input type="text" name="RState<?php echo $i; ?>" id="RState<?php echo $i; ?>" size="12" maxlength="12" value="<?php echo $_SESSION['RState' . $i]; ?>">
            </div>
        </div>	
        <div class="row-input">
            <div class="midinput">
                <span>Zip <span class="required">*</span></span>
                <input type="text" name="RZip<?php echo $i; ?>" id="RZip<?php echo $i; ?>" size="10" maxlength="10" value="<?php echo $_SESSION['RZip' . $i]; ?>">
            </div>
        </div>
        <?php
    }
    ?>
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
            <button type="button" id="btn-reset">RESET</button>
            <input type="hidden" name="step" value="3">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="1">    
</form>