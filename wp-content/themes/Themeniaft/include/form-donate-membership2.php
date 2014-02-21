<!--<form method="post" action="donorverify.asp" name="DonorInfo">-->
<?php
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}

$recip = $_SESSION['nummemberships'];
for ($i = 1; $i <= 5; $i++) {
    if ($i > $recip) {
        unset($_SESSION['DropDownSalutation' . $i]);
        unset($_SESSION['txtFirstName2' . $i]);
        unset($_SESSION['txtMiddleName' . $i]);
        unset($_SESSION['txtLastName2' . $i]);
        unset($_SESSION['DropDownSuffix' . $i]);
        unset($_SESSION['txtNickName' . $i]);
        unset($_SESSION['txtSpouse2' . $i]);
        unset($_SESSION['txtOrganization2' . $i]);
        unset($_SESSION['txtTitle2' . $i]);
        unset($_SESSION['strWorkAddr2' . $i]);
        unset($_SESSION['txtAddress12' . $i]);
        unset($_SESSION['txtAddress22' . $i]);
        unset($_SESSION['txtCity2' . $i]);
        unset($_SESSION['txtState2' . $i]);
        unset($_SESSION['txtCountry' . $i]);
        unset($_SESSION['txtZip2' . $i]);
        unset($_SESSION['txtHomePhone2' . $i]);
        unset($_SESSION['txtWorkPhone2' . $i]);
        unset($_SESSION['txtFaxPhone2' . $i]);
        unset($_SESSION['txtEmail2' . $i]);
        unset($_SESSION['memberterm' . $i]);
        unset($_SESSION['GrandTotal' . $i]);
    }
}
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ss-form').validate({
        rules: {
<?php
for ($i = 1; $i <= $recip; $i++) {
    ?>
            DropDownSalutation<?php echo $i; ?>: {required: true},
                    txtFirstName2<?php echo $i; ?>: {required: true},
                    txtLastName2<?php echo $i; ?>: {required: true},
                    txtAddress12<?php echo $i; ?>: {required: true},
                    txtCity2<?php echo $i; ?>: {required: true},
                    txtState2<?php echo $i; ?>: {required: true},
                    txtCountry<?php echo $i; ?>: {required: true},
                    txtZip2<?php echo $i; ?>: {required: true, number: true},
                    txtEmail2<?php echo $i; ?>: {required: true, email: true},
                    level<?php echo $i; ?>: {required: true},
                    GrandTotal<?php echo $i; ?>:{required: true},
    <?php
}
?>
        }
    });
    });
</script>
<form method="post" action="" id="ss-form">
    <div class="row-input">
        <div class="biginput">
            <span>Please provide the recipient addresses to mail confirmation of your gift. Please note that fields with a <span class="required">*</span> are required! </span>	    
        </div>
    </div>
    <hr>
    <?php
    for ($i = 1; $i <= $recip; $i++) {
        ?>
        <div class="row-input">
            <div class="biginput">
                <center><span><b><u>Gift Membership <?php echo $i; ?></u></b></span> </center>
            </div>
        </div>
        <div class="row-input">
            <div class="biginput">
                <span><b><u>Contact Information:</u></b></span> 
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                Salutation: <span class="required">*</span>
                <?php
                $data = Array(
                    'Atty.', 'Capt.', 'Cav.', 'Col.', 'Com.', 'Deacon', 'Del.', 'Dott.', 'Dr.', 'Fr.', 'Gen.', 'Hon.', 'Judge',
                    'Lt.', 'Lt. Col.', 'Lt. Comm.', 'Maj. Gen.', 'Maj.', 'Mayor', 'Mr.', 'Mr. &amp, Mrs.', 'Mrs.', 'Ms.', 'Msgr.',
                    'Prof.', 'Rev.', 'Rev. Msgr.', 'Sen.', 'Sgt.', 'Sister',
                );
                ?>

                <select name="DropDownSalutation<?php echo $i; ?>" >
                    <option value="">-- SELECT --</option>	
                    <?php
                    $selected = '';
                    foreach ($data as $value) {
                        $selected = '';
                        if ($value == $_SESSION['DropDownSalutation' . $i]) {
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
                <span>First Name: <span class="required">*</span></span>		
                <input type="text" name="txtFirstName2<?php echo $i; ?>" size="25" maxlength="45" value="<?php echo $_SESSION['txtFirstName2' . $i]; ?>">
            </div>
        </div>	
        <div class="row-input">
            <div class="midinput">
                <span>Middle Name(or Initial):</span>
                <input type="text" name="txtMiddleName<?php echo $i; ?>" size="25" maxlength="45" value="<?php echo $_SESSION['txtMiddleName' . $i]; ?>">
            </div>
            <div class="midinput">
            </span>Last Name: <span class="required">*</span></span>
        <input type="text" name="txtLastName2<?php echo $i; ?>" size="25" maxlength="45" value="<?php echo $_SESSION['txtLastName2' . $i]; ?>">
    </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Suffix - (if applicable):</span>
            <?php
            unset($data);
            $data = array('II', 'III', 'Esq', 'Jr', 'MD', 'PhD', 'Sr');
            ?>
            <select name="DropDownSuffix<?php echo $i; ?>" value="Select" size="1">
                <option value="">-- SELECT --</option>				
                <?php
                $selected = '';
                foreach ($data as $value) {
                    $selected = '';
                    if ($value == $_SESSION['DropDownSuffix' . $i]) {
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
            <span>Nick Name:</span>	
            <input type="text" name="txtNickName<?php echo $i; ?>" size="25" maxlength="45" value="<?php echo $_SESSION['txtNickName' . $i]; ?>">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Spouse Name - (if applicable):</pan>
                <input type="text" name="txtSpouse2<?php echo $i; ?>" size="25" maxlength="75" value="<?php echo $_SESSION['txtSpouse2' . $i]; ?>">
                </div>
                <div class="midinput">
                    <span>Organization:</span>
                    <input type="text" name="txtOrganization2<?php echo $i; ?>" size="25" maxlength="60" value="<?php echo $_SESSION['txtOrganization2' . $i]; ?>">
                </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Title:</span>
                <input type="text" name="txtTitle2<?php echo $i; ?>" size="25" maxlength="45" value="<?php echo $_SESSION['txtTitle2' . $i]; ?>">
            </div>
            <div class="midinput">	
                <span>Check if this is a work address:</span>
                <input type="checkbox"  name="strWorkAddr2<?php echo $i; ?>" <?php echo $_SESSION['strWorkAddr2Ref' . $i] == 'yes' ? 'checked' : ''; ?> class="checkedYes">
                <input type="hidden"  name="strWorkAddr2Ref<?php echo $i; ?>" value="<?php echo $_SESSION['strWorkAddr2Ref' . $i] == 'yes' ? 'yes' : 'no'; ?>" >
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">	
                <span>Street: <span class="required">*</span></span>		
                <input type="text" name="txtAddress12<?php echo $i; ?>" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress12' . $i]; ?>">
            </div>
            <div class="midinput">
                <br>
                <input type="text" name="txtAddress22<?php echo $i; ?>" size="25" maxlength="100" value="<?php echo $_SESSION['txtAddress22' . $i]; ?>">
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">			
                <span>City: <span class="required">*</span></span>		
                <input type="text" name="txtCity2<?php echo $i; ?>" size="25" maxlength="40" value="<?php echo $_SESSION['txtCity2' . $i]; ?>">
            </div>
            <div class="midinput">
                <span>State: <span class="required">*</span></span>	
                <input type="text" name="txtState2<?php echo $i; ?>" size="2" maxlength="2" value="<?php echo $_SESSION['txtState2' . $i]; ?>">		
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Country:<br>&nbsp;(For Non-USA residents only) <span class="required">*</span></span>
                <input type="text" name="txtCountry<?php echo $i; ?>" size="25" maxlength="50" value="<?php echo $_SESSION['txtCountry' . $i]; ?>">		
            </div>
            <div class="midinput">
                <span>Zip: <span class="required">*</span></span>
                <input type="text" name="txtZip2<?php echo $i; ?>" size="10" maxlength="10" value="<?php echo $_SESSION['txtZip2' . $i]; ?>">
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Home Telephone:</span>
                <input type="text" name="txtHomePhone2<?php echo $i; ?>" size="15" maxlength="15" value="<?php echo $_SESSION['txtHomePhone2' . $i]; ?>">
            </div>
            <div class="midinput">
                <span>Work Telephone:</span>
                <input type="text" name="txtWorkPhone2<?php echo $i; ?>" size="15" maxlength="15" value="<?php echo $_SESSION['txtWorkPhone2' . $i]; ?>">&nbsp;
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <span>Fax:</span>
                <input type="text" name="txtFaxPhone2<?php echo $i; ?>" size="15" maxlength="15" value="<?php echo $_SESSION['txtFaxPhone2' . $i]; ?>">
            </div>
            <div class="midinput">
                <span> E-mail Address: <span class="required">*</span></span>	
                <input type="text" name="txtEmail2<?php echo $i; ?>" size="25" maxlength="65" value="<?php echo $_SESSION['txtEmail2' . $i]; ?>">
            </div>
        </div>
        <font color="blue">--------------------------------------------------------------------</font>
        <div class="row-input">
            <div class="biginput">	
                <span class="required">*</span> <u><b>Choose Your Council Membership:</b></u>		
            </div>
        </div>
        <div class="row-input">
            <div class="midinput">
                <input type="radio" value="STU" <?php echo $_SESSION['level' . $i] == 'STU' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  class="gift-membership">
                NIAF Student Membership - $25 <br>
                <input type="radio" value="AS" <?php echo $_SESSION['level' . $i] == 'AS' ? 'checked' : ''; ?> name="level<?php echo $i; ?>" class="gift-membership" >
                NIAF Associate Membership  - $50 <br>
                <input type="radio" value="NSM" <?php echo $_SESSION['level' . $i] == 'NSM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>" class="gift-membership">
                NIAF Sustaining Membership - $125 <br>
                <input type="radio" value="NPM" <?php echo $_SESSION['level' . $i] == 'NPM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  class="gift-membership">
                NIAF Patron Membership - $250 
            </div>
            <div class="midinput">
                <input type="radio" value="NCM" <?php echo $_SESSION['level' . $i] == 'NCM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  class="gift-membership">
                NIAF Council Membership - $500 <br>
                <input type="radio" value="BCM" <?php echo $_SESSION['level' . $i] == 'BCM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  >
                NIAF Business Council Membership - $1,000 <br>
                <input type="radio" value="FCM" <?php echo $_SESSION['level' . $i] == 'FCM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  class="gift-membership">
                Founder's Circle Membership - $2,500 <br>
                <input type="radio" value="CCM" <?php echo $_SESSION['level' . $i] == 'CCM' ? 'checked' : ''; ?> name="level<?php echo $i; ?>"  class="gift-membership">
                Chairman's Circle Membership - $5,000 
                <input type="radio"  value="MSM" <?php echo $_SESSION['level' . $i] == 'MSM' ? 'checked' : ''; ?>  name="level<?php echo $i; ?>"  class="gift-membership">
                Mazzei Society Membership - $10,000 
            </div>
        </div>			

        <div class="row-input">
            <div class="biginput">
                <a href="#" target="_blank">CLICK HERE</a> to learn more about our membership levels.	
            </div>
        </div>
        <?php
    }
    ?>
        <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.gift-membership').on('click',function(){                        
                jQuery('#GrandTotal').val(calc());
            });
            jQuery('#memberterm').on('change',function(){
               jQuery('#GrandTotal').val(calc());
            });
        });
        
        function calc(){
            var subTotal=0;
             var grandTotal = 0;
             var year=Number(jQuery('#memberterm').val());  
             jQuery('.gift-membership').each(function() {
                    if (jQuery(this).is(':checked')) {
                          switch(jQuery(this).val()){
                            case 'STU' :
                                subTotal+=25;
                                break;
                            case 'AS' :
                                subTotal+=50;
                                break;
                            case 'NSM' :
                                subTotal+=125;
                                break;
                            case 'NPM' :
                                subTotal+=250;
                                break;
                            case 'NCM' :
                                subTotal+=500;
                                break;
                            case 'BCM' :
                                subTotal+=1000;
                                break;
                            case 'FCM' :
                                subTotal+=2500;
                                break;
                            case 'CCM' :
                                subTotal+=5000;
                                break;
                            case 'MSM' :
                                subTotal+=10000;
                                break;               
                        } 
                    }
                  });
                  grandTotal=subTotal*year; 
                  return grandTotal;
        }
        </script>   
        
        
    <font color="blue">--------------------------------------------------------------------</font>
    <div class="row-input">
        <div class="midinput">			
            <span>Membership term: </span>		
            <select name="memberterm" id="memberterm">                
                <option value="1" selected="">1 Year</option>					
                <option value="2">2 Years</option>					
                <option value="3">3 Years</option>
                <option value="4">4 Years</option>
                <option value="5">5 Years</option>
            </select>
        </div>
        <div class="midinput">
            <span>Gift Membership One Time Total:</span>	
            <input type="text" readonly="" id="GrandTotal" name="GrandTotal" value="<?php echo $_SESSION['GrandTotal'];?>">
        </div>
    </div> 
    <div class="row-input">
        <div class="biginput">            
            <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp;
            <input type="submit" value="CONTINUE">&nbsp; &nbsp;
            <input type="reset" name="reset" value="RESET">
            <input type="hidden" name="step" value="3">
        </div>
    </div>
</form>
<form method="post" action="" id="formBack">
    <input type="hidden" name="step" value="1">
</form>


