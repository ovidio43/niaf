<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
            rules: {
                x_amount: {required: true},
                x_card_num: {required: true, number: true},
                x_first_name: {required: true},
                x_last_name: {required: true},
                x_address: {required: true},
                x_city: {required: true},
                x_state: {required: true},
                x_zip: {required: true, number: true},
            }
        });
        jQuery('#checkAddressSame').on('click', function() {
            if (jQuery(this).is(':checked')) {
                jQuery('#x_first_name').val(jQuery('#tempx_first_name').val());
                jQuery('#x_last_name').val(jQuery('#tempx_last_name').val());
                jQuery('#x_address').val(jQuery('#tempx_address').val());
                jQuery('#x_city').val(jQuery('#tempx_city').val());
                jQuery('#x_state').val(jQuery('#tempx_state').val());
                jQuery('#x_zip').val(jQuery('#tempx_zip').val());
            } else {
                jQuery('.repeat').val('');
            }
        });
    });
</script>



<form id="ss-form" action="" method="post">   
    <div class="row-input">
        <div class="midinput">
            <span>Entered Donation Amount <span class="required">*</span><b> $</b></span>            				
            <input type="text" value="<?php echo $_SESSION['DonateAmt']; ?>"  readonly="" name="x_amount">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">		
            <span>Card Type <span class="required">*</span></span>
            <select size="1" id="cboCardType" name="x_card_type">
                <?php
                $data = Array('Visa', 'MasterCard', 'American Express');
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
        <div class="midinput">
            <span>Card Number <span class="required">*</span></span>            				
            <input type="text"  value="" name="x_card_num" autocomplete="off" >
        </div>
    </div> 

    <div class="row-input">
        <div class="midinput">
            <span>Expiration Month <span class="required">*</span></span>  
            <select name="x_expiration_month">
                <?php
                $month = Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
                foreach ($month as $value) {
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
        <div class="midinput">
            <span>Expiration Year <span class="required">*</span></span>  
            <select name="x_expiration_year">
                <?php
                $y = date('Y');
                $count = $y + 6;
                for ($i = $y; $i < $count; $i++) {
                    $selected = '';
                    if (substr($i, 2) == $_SESSION['x_expiration_year']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option value="<?php echo substr($i, 2); ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php
                }
                ?>                
            </select>
        </div>
    </div>
    <input type="hidden" id="tempx_first_name" value="<?php echo $_SESSION['txtFirstName']; ?>">
    <input type="hidden" id="tempx_last_name" value="<?php echo $_SESSION['txtLastName']; ?>">
    <input type="hidden" id="tempx_address" value="<?php echo $_SESSION['txtAddress1']; ?>">
    <input type="hidden" id="tempx_city" value="<?php echo $_SESSION['txtCity']; ?>">
    <input type="hidden" id="tempx_state" value="<?php echo $_SESSION['txtState']; ?>">
    <input type="hidden" id="tempx_zip" value="<?php echo $_SESSION['txtZip']; ?>">
    <div class="row-input">        
        <input type="checkbox" name="checkAddressSame" id="checkAddressSame" >
        <span>Check this box if the credit card billing address is the same as previously entered. If not, please complete the below </span>            				        
    </div>  
    <div class="row-input">
        <div class="midinput">    
            <span>First Name <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_first_name']; ?>"  name="x_first_name" id="x_first_name" class="repeat">
        </div>
        <div class="midinput">    
            <span>Last Name <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_last_name']; ?>"  name="x_last_name" id="x_last_name" class="repeat">
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">    
            <span>Street  <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_address']; ?>" name="x_address" id="x_address" class="repeat">
        </div>
        <div class="midinput">    
            <span>City  <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_city']; ?>" name="x_city" id="x_city" class="repeat">
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">    
            <span>State  <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_state']; ?>" name="x_state" id="x_state" class="repeat">
        </div>
        <div class="midinput">    
            <span>Zip  <span class="required">*</span></span> 
            <input value="<?php echo $_SESSION['x_zip']; ?>" name="x_zip" id="x_zip" class="repeat">
        </div>
    </div> 
    <div class="row-input">
        <div class="biginput">	
            <input type="hidden" value="Donation" name="x_description">
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp; 
            <input type="submit" value="SUBMIT">&nbsp; &nbsp;
            <button type="button" id="btn-reset">RESET</button>
            <input type="hidden" name="step" value="4">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="2">    
</form>