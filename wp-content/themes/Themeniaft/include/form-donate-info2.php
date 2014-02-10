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
    <?php
    $recip = $_POST['numgifts'];
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
                <input type="text" name="RFirstName<?php echo $i; ?>" id="RFirstName<?php echo $i; ?>" size="25" maxlength="32" value="">
            </div>
            <div class="midinput">
                <span>Last Name <span class="required">*</span></span>
                <input type="text" name="RLastName<?php echo $i; ?>" id="RLastName<?php echo $i; ?>" size="25" maxlength="64" value="">
            </div>
        </div>	
        <div class="row-input">
            <div class="midinput">
                <span>Street <span class="required">*</span></span>
                <input type="text" name="RAddress<?php echo $i; ?>" id="RAddress<?php echo $i; ?>" size="25" maxlength="100" value="">
            </div>
            <div class="midinput">
                <br>
                <input type="text" name="RAddress2<?php echo $i; ?>" size="25" maxlength="100" value="">
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>City <span class="required">*</span></span>
                <input type="text" name="RCity<?php echo $i; ?>" id="RCity<?php echo $i; ?>" size="25" maxlength="40" value="">
            </div>
            <div class="midinput">
                <span>State <span class="required">*</span></span>
                <input type="text" name="RState<?php echo $i; ?>" id="RState<?php echo $i; ?>" size="12" maxlength="12" value="">
            </div>
        </div>	
        <div class="row-input">
            <div class="midinput">
                <span>Zip <span class="required">*</span></span>
                <input type="text" name="RZip<?php echo $i; ?>" id="RZip<?php echo $i; ?>" size="10" maxlength="10" value="">
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