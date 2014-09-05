<style type="text/css">
    .sub-amount{
        width: auto !important;        
    }
    label.error {
        color: red;
        font-size: 11px;
    }
    .member,#tr-txtMemberID{
        display: none;
    }
</style>

<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery("#is_member").click(function() {
            jQuery('#tr-txtMemberID').slideToggle();
            jQuery('#txtMemberID').toggleClass('required');
            if ($("#is_member").is(':checked')) {
                var select, input, nameObj;
                jQuery('.non-member').hide();
                jQuery('.member').show();
                jQuery('.non-member').each(function(index, element) {
                    select = jQuery(element).children().children('select.val');
                    input = jQuery(element).children().children('input.result');
                    select.attr('name', select.attr('name') + 'Z');
                    input.attr('name', input.attr('name') + 'Z');
                });
                jQuery('.member').each(function(index, element) {
                    select = jQuery(element).children().children('select.val');
                    input = jQuery(element).children().children('input.result');
                    nameObj = select.attr('name');
                    if (nameObj.slice(-1) === 'Z') {
                        nameObj = nameObj.substring(0, nameObj.length - 1);
                        select.attr('name', nameObj);
                    }
                    nameObj = input.attr('name');
                    if (nameObj.slice(-1) === 'Z') {
                        nameObj = nameObj.substring(0, nameObj.length - 1);
                        input.attr('name', nameObj);
                    }
                });
            } else {
                jQuery('.non-member').show();
                jQuery('.member').hide();
                jQuery('.member').each(function(index, element) {
                    select = jQuery(element).children().children('select.val');
                    input = jQuery(element).children().children('input.result');
                    select.attr('name', select.attr('name') + 'Z');
                    input.attr('name', input.attr('name') + 'Z');
                });
                jQuery('.non-member').each(function(index, element) {
                    select = jQuery(element).children().children('select.val');
                    input = jQuery(element).children().children('input.result');
                    nameObj = select.attr('name');
                    if (nameObj.slice(-1) === 'Z') {
                        nameObj = nameObj.substring(0, nameObj.length - 1);
                        select.attr('name', nameObj);
                    }
                    nameObj = input.attr('name');
                    if (nameObj.slice(-1) === 'Z') {
                        nameObj = nameObj.substring(0, nameObj.length - 1);
                        input.attr('name', nameObj);
                    }
                });
            }
            jQuery('.val').trigger('change');
        });

        jQuery('.val').on('change', function() {

            var val = parseInt(jQuery(this).val());
            var x = parseInt(jQuery(this).prop('title'));
            var r = val * x;
            var total = 0;
            jQuery(this).parent().siblings(":last").children('input').val(r);
            jQuery('input.result').each(function(index, element) {
                if (jQuery(element).is(':visible')) {
                    total = total + parseInt(element.value);
                }
            });
            jQuery('#x_amount').val(total);

        });


        jQuery('#txtCCChkAddress').on('click', function() {
            if (jQuery(this).is(':checked')) {
                jQuery('#x_first_name').val(jQuery('#txtFirstName').val());
                jQuery('#x_last_name').val(jQuery('#txtLastName').val());
                jQuery('#x_address').val(jQuery('#txtAddress1').val());
                jQuery('#x_city').val(jQuery('#txtCity').val());
                jQuery('#x_state').val(jQuery('#txtState').val());
                jQuery('#x_zip').val(jQuery('#txtZip').val());
            } else {
                jQuery('.repeat').val('');
            }
        });
        jQuery.validator.addMethod('integer', function(value, element, param) {
            return (value != 0) && (value == parseInt(value, 10));
        }, 'Please enter a non zero integer value!');
//
//        jQuery('#regform').validate({
//            rules: {
//                level: {required: true},
//                txtFirstName: {required: true},
//                txtLastName: {required: true},
//                txtAddress1: {required: true},
//                txtCity: {required: true},
//                txtState: {required: true},
//                txtZip: {required: true},
//                dollarcontribution: {number: true},
//                x_amount: {required: true, integer: true},
//                Salutation: {required: true},
//                x_first_name: {required: true},
//                x_last_name: {required: true},
//                x_address: {required: true},
//                x_city: {required: true},
//                x_state: {required: true},
//                x_zip: {required: true},
//                txtEmail: {required: true, email: true},
//                x_card_num: {required: true, number: true},
//                x_card_type: {required: true},
//                x_expiration_month: {required: true},
//                x_expiration_year: {required: true}
//            }
//        });
    });

</script>

<form name="regform" id="regform" action="" method="post">

    <table width="100%" style="border:1px outset #36b;padding:1em;background-color:white;">
        <tr>
            <td colspan="3">
                <b>NIAF 39th ANNIVERSARY GALA WEEKEND REGISTRATION FORM<br>

                    <br>                    
                    </td>            
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="checkbox" name="is_member" id="is_member" value="yes"><label for="is_member">Member</label></td>
                    </tr>
                    <tr id="tr-txtMemberID">
                        <td colspan="3">NIAF Member ID: <font color="red">*&nbsp;</font>  <input value="" maxlength="30" size="30" name="txtMemberID" id="txtMemberID"></td>            
                    </tr>                 
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <!---------------------------------------NON-MEMBER ROWS----------------------------------------------------------------->
                    <tr class="non-member">
                        <td>
                            <select title="2500" id="" name="select_firsttworow" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>First Two Rows</b> Dinner Ticket(s) @ $2,500 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="firsttworow" class="result" readonly=""></td>
                    </tr>
                    <tr class="non-member">
                        <td>
                            <select title="1000" id="" name="select_premierseatingdinner" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>	
                        </td>
                        <td>
                            <b>Premier</b> Seating Dinner Ticket(s) @ $1,000 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="premierseatingdinner" class="result" readonly=""></td>
                    </tr>
                    <tr class="non-member">
                        <td>
                            <select title="600" id="" name="select_preferredseatingdinner" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Preferred</b> Seating Dinner Ticket(s) @ $600 
                        </td>

                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="preferredseatingdinner" class="result" readonly=""></td>
                    </tr>
                    <tr class="non-member">
                        <td>
                            <select title="400" id="" name="select_standardseatingdinner" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Standard</b> Seating Dinner Ticket(s) @ $400 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="standardseatingdinner" class="result" readonly=""></td>
                    </tr>
                    <tr class="non-member">
                        <td>
                            <select title="300" id="" name="select_young_professional2" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Young Professional </b> (under 30) @ $300 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="young_professional2" class="result" readonly=""></td>
                    </tr>                    
                    <!---------------------------------------MEMBER ROWS----------------------------------------------------------------->
                    <tr class="member">
                        <td>
                            <select title="2000" id="" name="select_firsttworowZ" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>First Two Rows</b> Dinner Ticket(s) @ $2,000 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="firsttworowZ" class="result" readonly=""></td>
                    </tr>
                    <tr class="member">
                        <td>
                            <select title="850" id="" name="select_premierseatingdinnerZ" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>	
                        </td>
                        <td>
                            <b>Premier</b> Seating Dinner Ticket(s) @ $850 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="premierseatingdinnerZ" class="result" readonly=""></td>
                    </tr>
                    <tr class="member">
                        <td>
                            <select title="500" id="" name="select_preferredseatingdinnerZ" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Preferred</b> Seating Dinner Ticket(s) @ $500 
                        </td>

                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="preferredseatingdinnerZ" class="result" readonly=""></td>
                    </tr>
                    <tr class="member">
                        <td>
                            <select title="350" id="" name="select_standardseatingdinnerZ" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Standard</b> Seating Dinner Ticket(s) @ $350 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="standardseatingdinnerZ" class="result" readonly=""></td>
                    </tr>
                    <tr class="member">
                        <td>
                            <select title="250" id="" name="select_young_professional2Z" class="val">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Young Professional </b> (under 30) @ $250 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" size="5" value="0" name="young_professional2Z" class="result" readonly=""></td>
                    </tr>

                    <!-- --------------------------------------------------------------------- -->
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">   <b>FRIDAY, OCTOBER 24</b>   </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <!--<td colspan="3"><input type="text" name="niaf_casino_niight" ><b> NIAF Casino Night</b> (under 30)</td>-->            
                        <td colspan="3"><b> Casino Night</b> </td>            
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="member">
                        <td>
                            <select class="val" name="select_member_ticket" id="" title="175">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Standard Ticket</b> @ $175 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="member_ticket" value="0" size="5"></td>
                    </tr>	
                    <tr class="non-member">
                        <td>
                            <select class="val" name="select_non_member_ticket" id="" title="200">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>

                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  

                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Standard Ticket</b> @ $200 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="non_member_ticket" value="0" size="5"></td>
                    </tr>	
                    <tr>
                        <td>
                            <select class="val" name="select_vip_ticket" id="" title="300">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>VIP Ticket</b> @ $300 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="vip_ticket" value="0" size="5"></td>
                    </tr>	
                    <tr>
                        <td>
                            <select class="val" name="select_young_professional" id="" title="125">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>

                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  

                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b>Young Professional </b> (under 30) @ $125 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="young_professional" value="0" size="5"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>SATURDAY, OCTOBER 25</b></td>
                    </tr>
<!--                    <tr>
                        <td>&nbsp;</td>
                    </tr>-->
<!--                    <tr>
                        <td colspan="3"><input type="text" name="niaf_central_networking" ><b> NIAF Central Networking Event</b></td>            
                        <td colspan="3"><b> Central Networking Event</b></td>            
                    </tr>-->
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <select class="val" name="select_wine_tating" id="" title="100">
                                <?php
                                for ($i = 0; $i < 21; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                                    <?php
                                }
                                ?>
                            </select>						
                        </td>
                        <td>
                            <b> Wine Tasting</b> @ $100 per person 
                        </td>
                        <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="wine_tating" value="0" size="5"></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <font color="blue">I am unable to attend, but would like to contribute to the NIAF Education &amp; Scholarship Program.</font>						
                        </td>
                        <td ><b>$</b>&nbsp;<input type="text" class="val result" name="dollarcontribution" size="7" value="0"></td>
                    </tr>			
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>            
                        <td align="right" colspan="2"><font color="blue"><b>TOTAL REMITTED $</b><font></font></font></td>
                        <td><input type="text" readonly value="0" maxlength="9" size="7" name="x_amount" id="x_amount"></td>					
                    </tr>	

    </table>



    <table width="100%">

        <tr>

            <td colspan="2"><br><center><b><u>Please complete below</u></b></center><br></td>

        </tr>

        <tr>

            <td width="39%"><font color="red">*&nbsp;</font> Salutation:</td>

            <td>

                <select size="1"  name="Salutation">

                    <option value="Mr.">Mr.</option>

                    <option value="Mrs.">Mrs.</option>

                    <option value="Mr. and Mrs.">Mr. and Mrs.</option>

                    <option value="Ms.">Ms.</option>

                    <option value="Dr.">Dr.</option>

                    <option value="Hon.">Hon.</option>

                    <option value="Rev.">Rev.</option>

                    <option value="Sen.">Sen.</option>

                </select>

            </td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font> First Name:</td>            

            <td><input value="" maxlength="50" size="50" name="txtFirstName" id="txtFirstName"></td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font> Last Name:</td>           

            <td><input value="" maxlength="75" size="50" name="txtLastName" id="txtLastName"></td>

        </tr>

        <tr>

            <td>&nbsp;&nbsp;Firm/Organization:</td>            

            <td><input value="" maxlength="75" size="50" name="txtOrganization"></td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font>Address:</td>            

            <td><input value="" maxlength="60" size="50" name="txtAddress1" id="txtAddress1"></td>

        </tr>

        <tr>
            <td></td>
            <td><input value="" maxlength="60" size="50" name="txtAddress2"></td>
        </tr>
        <tr>
            <td><font color="red">*&nbsp;</font>City:</td>            

            <td><input value="" maxlength="40" size="25" name="txtCity" id="txtCity"></td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font>State Abbreviation:</td>            

            <td><input value="" maxlength="2" size="2" name="txtState" id="txtState">&nbsp;&nbsp;<i>example: DC</i></td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font>Zip Code:</td>            

            <td><input value="" maxlength="10" size="10" name="txtZip" id="txtZip"></td>

        </tr>

        <tr>

            <td>Home Phone:</td>            

            <td><input value="" maxlength="12" size="12" name="txtHomePhone">&nbsp;&nbsp;<i>example: 202-387-0600</i></td>

        </tr>

        <tr>

            <td>Business Phone:</td>            

            <td><input value="" maxlength="12" size="12" name="txtBizPhone">&nbsp;&nbsp;<i>example: 202-387-0800</i></td>

        </tr>

        <tr>

            <td><font color="red">*&nbsp;</font>E-mail Address:</td>            

            <td><input value="" maxlength="30" size="30" name="txtEmail"><br><i>example: johndoe@aol.com</i></td>

        </tr>



        <tr>

            <td>Credit Card:</td>            

            <td>

                <select size="1" name="x_card_type" id="x_card_type">

                    <option value="">Select</option>

                    <option value="Visa">Visa</option>

                    <option value="MasterCard1">MasterCard</option>

                    <option value="American Express">American Express</option>

                </select>					

            </td>

        </tr>

        <tr>

            <td>Credit Card Number:</td>            

            <td><input type="text" value="" maxlength="16" size="16" name="x_card_num" id=""></td>

        </tr>

        <tr>

            <td>Credit Card Expiration Month:</td>            

            <td>

                <select size="1" value="Select Month" name="x_expiration_month" id="">

                    <option value="">Select</option>

                    <option value="01">1 - Jan</option>

                    <option value="02">2 - Feb</option>

                    <option value="03">3 - Mar</option>

                    <option value="04">4 - Apr</option>

                    <option value="05">5 - May</option>

                    <option value="06">6 - Jun</option>

                    <option value="07">7 - Jul</option>

                    <option value="08">8 - Aug</option>

                    <option value="09">9 - Sep</option>

                    <option value="10">10 - Oct</option>

                    <option value="11">11 - Nov</option>

                    <option value="12">12 - Dec</option>

                </select>

            </td>

        </tr>

        <tr>

            <td>Credit Card Expiration Year:</td>            

            <td>

                <select size="1" name="x_expiration_year" id="">

                    <option selected="" value="">Select</option>

                    <?php
                    $y = date('Y');

                    $count = $y + 6;

                    for ($i = $y; $i < $count; $i++) {
                        ?>

                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php
                    }
                    ?>                                                                                      

                </select>

            </td>

        </tr>

    </table>



    <table cellspacing="0" cellpadding="5" border="0">

        <tr>

            <td colspan="2">

                <br>

                <input type="checkbox" id="txtCCChkAddress" name="txtCCChkAddress" value="1">

                Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below&nbsp;<br><br>

            </td>

        </tr>

        <tr>          

            <td width="30%">

                First Name 

                <font color="red">*</font>

            </td>

            <td>

                Last Name

                <font color="red">*</font>

            </td>

        </tr>

        <tr>

            <td>

                <input value="" maxlength="32" size="25" id="x_first_name" name="x_first_name" class="repeat">

            </td>

            <td>

                <input value="" maxlength="64" size="25" id="x_last_name" name="x_last_name" class="repeat">

            </td>

        </tr>

        <tr>

            <td>

                Street

                <font color="red">*</font>

            </td>            

        </tr>

        <tr>

            <td>
                <input value="" maxlength="100" size="25" id="x_address" name="x_address" class="repeat">
            </td>        
        </tr>
        <tr>
            <td>
                City 
                <font color="red">*</font>
            </td>
            <td>
                State
                <font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                Zip<font color="red">*</font>
                <font size="1" face="verdana, arial, helvetica">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
            </td>
        </tr>
        <tr>
            <td>
                <input value="" maxlength="40" size="25" id="x_city" name="x_city" class="repeat">
            </td>
            <td>
                <input type="text" value="" maxlength="12" size="12" id="x_state" name="x_state" class="repeat">
                <input value="" maxlength="10" size="10" id="x_zip" name="x_zip" class="repeat">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <!-- Captcha HTML Code -->
                <div class="row-input">
                    <div class="midinput">
                        <b>Type the characters you see in the image below</b>
                        <div class="captcha-box">
                            <img src="<?php echo get_template_directory_uri(); ?>/get_captcha.php" alt="" id="captcha" />
                        </div>
                        <div class="text-box">

                            <input name="captcha-code" type="text" id="captcha-code">
                        </div>
                        <div class="captcha-action">
                            <img src="<?php echo get_template_directory_uri(); ?>/refresh.jpg"  alt="" id="captcha-refresh" />
                        </div>
                        <input type="hidden" value="" id="aux">
                    </div>
                </div>
                <!------------------------------------->
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td> 
            <td>
                <br>
                <input type="hidden" value="DC Gala" name="x_description">                
                <input type="submit" value="SUBMIT" name="submit" id="SubmitBullsEye">&nbsp;&nbsp;&nbsp;
                <button id="reset" type="button">RESET</button>        
            </td>
        </tr>
    </table>

</form>
<script type="text/javascript">

    jQuery(document).ready(function() {
        // refresh captcha
        jQuery('img#captcha-refresh').click(function() {
            change_captcha();
        });
        jQuery('#captcha-code').focusout(function() {
            var cod = jQuery('input#captcha-code').val();
            var url = jQuery('body').attr('rel') + '/get_captcha.php';
            query(url, cod);
        });

        jQuery("#SubmitBullsEye").mouseover(function() {
            jQuery("#SubmitBullsEye").focus();
        });
        jQuery('#SubmitBullsEye').on('click', function() {
            var cod = jQuery('input#captcha-code').val();
            var url = jQuery('body').attr('rel') + '/get_captcha.php';
            query(url, cod);
            if (jQuery('#aux').val() != 'ok') {
                alert('please Type the characters you see in the image captcha below or fill required fields');
                change_captcha();
                return false;
            } else {
//                jQuery("#regform").submit();
                return true;
            }
        });


        function query(url, cod) {
            jQuery.ajax({
                url: url,
                data: {cod: cod},
                type: "POST",
                beforeSend: function() {
                    //jQuery("#SubmitBullsEye").prop('disabled', true);
//                    jQuery('#SubmitBullsEye').attr('disabled', true);
                },
                success: function(data) {
                    if (data == 'ok') {
                        jQuery('#aux').val(data);
                    } else {
                        jQuery('#aux').val('no');
                    }
                    //jQuery("#SubmitBullsEye").prop('disabled', false);
//                    jQuery('#SubmitBullsEye').attr('disabled', false);
                }
            })
        }
        function change_captcha() {
            document.getElementById('captcha').src = "<?php echo get_template_directory_uri(); ?>/get_captcha.php?rnd=" + Math.random();
        }
    });

</script>  