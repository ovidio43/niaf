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
                x_amount: {required: true, number: true},
                x_card_type: {required: true},
                x_card_num: {required: true,number: true},
                x_expiration_month: {required: true},
                x_expiration_year: {required: true},
                x_first_name: {required: true},
                x_last_name: {required: true},
                x_address: {required: true},
                x_city: {required: true},
                x_state: {required: true},
                x_zip: {required: true}
            }
        });
    });
</script>
<form method="post" action="" id="ss-form">

    <div class="row-input">
        <div class="midinput">
            <span>Entered Donation Amount <span class="required">*</span></span>
            <font face="Verdana, Arial, Helvetica" size="2"> <b>$</b></font>				
            <input type="text" name="x_amount" readonly="" value="<?php echo $_SESSION['GrandTotal'];?>">
        </div>
        <div class="midinput">		
            <span>Card Type <b><span class="required">*</span></b></span>
            <?php
            $data = Array('Visa', 'Mastercard', 'American Express');
            ?>
            <select name="x_card_type" >
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['x_card_type']) {
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
            <input type="text" name="x_card_num" value="<?php echo $_SESSION['x_card_num']; ?>" >
        </div>
        <div class="midinput">		
            <span>Expiration Month <b><span class="required">*</span></b></span>
            <?php
            unset($data);
            $data = Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
            ?>
            <select name="x_expiration_month" >
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['x_expiration_month']) {
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
            <select name="x_expiration_year" >
                <?php
                for ($i = 2012; $i < 2020; $i++) {
                    $selected = '';
                    if ($i == $_SESSION['x_expiration_year']) {
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
            <input type="checkbox" value="yes" name="checkAddressSame" >
            <font face="verdana, arial, helvetica" size="1">Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</font>&nbsp;<br><br>
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>First Name <b><span class="required">*</span></b></span> 
            <input type="text" name="x_first_name" value="<?php echo $_SESSION['x_first_name']; ?>">
        </div>
        <div class="midinput">
            <span>Last Name <b><span class="required">*</span></b></span>
            <input type="text" name="x_last_name" value="<?php echo $_SESSION['x_last_name']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>Street <b><span class="required">*</span></b></span>
            <input type="text" name="x_address"  value="<?php echo $_SESSION['x_address']; ?>">
        </div>
        <div class="midinput">
            <span>City <b><span class="required">*</span></b> </span>
            <input type="text" name="x_city" value="<?php echo $_SESSION['x_city']; ?>">
        </div>
    </div>	
    <div class="row-input">
        <div class="midinput">
            <span>State <b><span class="required">*</span></b></span>
            <input type="text" name="x_state" value="<?php echo $_SESSION['x_state']; ?>">
        </div>
        <div class="midinput">
            <span>Zip <b><span class="required">*</span></b></span>
            <input type="text" name="x_zip" value="<?php echo $_SESSION['x_zip']; ?>">
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
</form>