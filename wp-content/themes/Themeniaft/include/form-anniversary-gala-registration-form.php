<style type="text/css">
    .sub-amount{
        width: auto !important;        
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.val').on('change', function() {
            var val = parseInt(jQuery(this).val());
            var x = parseInt(jQuery(this).prop('title'));
            var r = val * x;
            var total = 0;
            jQuery(this).parent().siblings(":last").children('input').val(r);
            jQuery('input.result').each(function(index, element) {
                total = total + parseInt(element.value);
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


        jQuery('#regform').validate({
            rules: {
                level: {required: true},
                txtFirstName: {required: true},
                txtLastName: {required: true},
                txtAddress1: {required: true},
                txtCity: {required: true},
                txtState: {required: true},
                txtZip: {required: true},
                x_amount: {required: true, integer: true},
                Salutation: {required: true},
                x_first_name: {required: true},
                x_last_name: {required: true},
                x_address: {required: true},
                x_city: {required: true},
                x_state: {required: true},
                x_zip: {required: true},
                txtEmail: {required: true, email: true},
                x_card_num: {required: true, number: true},
                x_card_type: {required: true},
                x_expiration_month: {required: true},
                x_expiration_year: {required: true}
            }
        });
    });
</script>
<form name="regform" id="regform" action="" method="post">
    <table width="100%" style="border:1px outset #36b;padding:1em;background-color:white;">
        <tr>
            <td colspan="3">Option A: Package Deals</td>
        </tr>
        <tr>
            <td width="8%">
                <select class="val" name="select_dollargalapackage" id="" title="200">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>							
            </td>
            <td width="76%">
                <b>Reserve Package / Best Weekend Package Deal</b> 
                <br>
                <font color="blue"><b>($200 per person for NIAF Members)</b></font>
                <br>
                <i>(Includes all weekend activities; DOES NOT INCLUDE NIAF GALA)</i>                										
            </td>
            <td><b>$</b>&nbsp;<input type="text" readonly class="result"  id="" name="dollargalapackage" size="7" value="0"></td>            
        </tr>			
        <tr >
            <td>
                <select class="val" name="select_dollarnongalapackage" id="" title="250">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>						
            </td>
            <td >
                <b>Reserve Package / Best Weekend Package Deal</b>
                <br>
                <font color="blue"><b>($250 per person for Non-NIAF Members)</b></font>
                <br>
                <i>(Includes all weekend activities; DOES NOT INCLUDE NIAF GALA)</i>                									
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarnongalapackage" size="7" value="0"></td>
        </tr>			
        <tr>
            <td colspan="3"><br><hr></td>
        </tr>
        <tr>
            <td colspan="3">Option B: Reserve Individually<br></td>
        </tr>
        <tr>
            <td colspan="3"><br>Friday, October 25</td>								  
            <td>&nbsp; </td>
        </tr>        
        <tr >
            <td >&nbsp;</td>
            <td colspan="2" >
                <b><i>NIAF Casino Night with Live and Silent Auction <font color="red">(Buy 1, Get 1 Free)</font></i></b>
            </td>
        </tr>
        <tr>
            <td >
                <select class="val" name="select_dollarmemcasino" id="" title="175">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>						
            </td>
            <td  >
                <b>Member Ticket(s)</b> @ $175 <strike>per person</strike> <font color="red">for 2 tickets </font>        		
        </td>
        <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarmemcasino" size="7" value="0"></td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarnonmemcasino" id="" title="200">
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
                <b>Non-Member Ticket(s)</b> @ $200 <strike>per person</strike> <font color="red">for 2 tickets!</font>         			
        </td>
        <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarnonmemcasino" size="7" value="0"></td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarvipcasino" id="" title="250">
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
                <b>VIP Ticket(s)</b> @ $250 <strike>per person</strike> <font color="red">for 2 tickets!</font> - VIP Ticket includes an increased amount of "funny money" for the casino games and access to the <i>High Rollers</i> area        
        </td>
        <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarvipcasino" size="7" value="0"></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">Saturday, October 26</td>								  
            <td>&nbsp; </td>
        </tr>
        <tr>
            <td>
                <!--<select class="val" name="" id="" title="aka falta">-->
                <select  id="select_dollarnaifnetworking" name="select_dollarnaifnetworking" title="aka falta">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>							
            </td>
            <td  >
                <b>NIAF Networking Event</b>(Open to all convention participants) (No Fee)
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarnaifnetworking" size="7" value="0"></td>
        </tr>

        <tr>
            <td>
                <!--<select class="val" size="1" name="numwinetasting" title="75">-->
                <select size="1" name="select_dollarwinetasting" title="75">
                    <option selected="" value="0">0</option>
                </select>								
            </td>
            <td>
                <b>Wine Tasting and Luncheon</b> @ $75 per person (<font color="red"><b><u>SOLD OUT</u></b></font>)                		
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarwinetasting" size="7" value="0"></td>
        </tr>
        <tr>
            <td colspan="3"><br><hr></td>
        </tr>
        <tr>
            <td colspan="3">NIAF Gala</td>								
            <td>&nbsp; </td>
        </tr>
        <tr >
            <td >&nbsp;</td>
            <td colspan="2" >
                <b>Premier Seating</b>
            </td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarmempremier" id="" title="850">
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
                Member Gala Ticket(s) @ $850 each                 
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarmempremier" size="7" value="0"></td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarpremier" id="" title="1000">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>							
            </td>
            <td  >
                Non-Member Gala Ticket(s) @ $1,000 each 
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarpremier" size="7" value="0"></td>
        </tr>
        <tr>
            <td >&nbsp;</td>
            <td colspan="2" >
                <b>Preferred Seating</b>
            </td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarmemprefer" id="" title="500">
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
                Member Gala Ticket(s) @ $500 each                 
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarmemprefer" size="7" value="0"></td>
        </tr>				
        <tr>
            <td>
                <select class="val" name="select_dollarprefer" id="" title="600">
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
                Non-Member Gala Ticket(s) @ $600 each                 
            </td>
            <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarprefer" size="7" value="0"></td>
        </tr>
        <tr>
            <td >&nbsp;</td>
            <td colspan="2" >
                <b>Standard Seating</b>
            </td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarmemstandard" id="" title="350">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>						
            </td>
            <td  >
                Member Gala Ticket(s) @ $350 each                 
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarmemstandard" size="7" value="0"></td>
        </tr>

        <tr>
            <td>
                <select class="val" name="select_dollarstandard" id="" title="400">
                    <?php
                    for ($i = 0; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>  
                        <?php
                    }
                    ?>
                </select>					
            </td>
            <td  >
                Non-Member Gala Ticket(s) @ $400 each                 					
            </td>
            <td  ><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarstandard" size="7" value="0"></td>
        </tr>
        <tr>
            <td >&nbsp;</td>
            <td colspan="2" >
                <b>Youth Professional Seating</b> (under 30)
            </td>
        </tr>
        <tr>
            <td>
                <select class="val" name="select_dollarmemyouthprotickets" id="" title="200">
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
                Member Gala Ticket(s) @ $200 each (Under 30)               
            </td>
            <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollarmemyouthprotickets" size="7" value="0"></td>
        </tr>								
        <tr>
            <td>
                <select class="val" name="select_dollaryouthprotickets" id="" title="250">
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
                Non-Member Gala Ticket(s) @ $250 each (Under 30)               
            </td>
            <td><b>$</b>&nbsp;<input type="text" readonly class="result"  name="dollaryouthprotickets" size="7" value="0"></td>
        </tr>	
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <font color="blue">I am unable to attend, but would like to contribute to the NIAF Education &amp; Scholarship Program.</font>						
            </td>
            <td ><b>$</b>&nbsp;<input type="text" readonly class="result" name="dollarcontribution" size="7" value="0"></td>
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
            <td>NIAF Member ID:</td>            
            <td><input value="" maxlength="30" size="30" name="txtMemberID"></td>
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

    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="2">
                <br>
                <input type="checkbox" id="txtCCChkAddress" name="txtCCChkAddress" value="1">
                <font size="1" face="verdana, arial, helvetica">Check this box if the credit card billing address is the same as previously entered.  If not, please complete the below</font>&nbsp;<br><br>
            </td>
        </tr>
        <tr>          
            <td width="30%">
                <font size="1" face="verdana, arial, helvetica">First Name </font>
                <font color="red">*</font>
            </td>
            <td>
                <font size="1" face="verdana, arial, helvetica">Last Name</font>
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
                <font size="1" face="verdana, arial, helvetica">Street</font>
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
                <font size="1" face="verdana, arial, helvetica">City </font>
                <font color="red">*</font>
            </td>
            <td>
                <font size="1" face="verdana, arial, helvetica">State</font>
                <font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font size="1" face="verdana, arial, helvetica">Zip</font><font color="red">*</font>
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
            <td>&nbsp;</td> 
            <td>
                <br>
                <input type="submit" value="SUBMIT" name="submit">&nbsp;&nbsp;&nbsp;
                <button id="reset" type="button">RESET</button>        
            </td>
        </tr>

    </table>
</form>