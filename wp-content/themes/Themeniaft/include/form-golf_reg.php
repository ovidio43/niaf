<style type="text/css">
    .sub-amount{
        width: auto !important;        
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.select-Packages').on('change', function() {
            var am = jQuery(this).attr('amount');
            var cant = jQuery(this).val();
            var r = am * cant;
            jQuery(this).parent().siblings().children('input').val(r);

            var v1 = Number(jQuery('#dollarcorporatestandard').val());
            var v2 = Number(jQuery('#dollarcorporatepremium').val());
            var v3 = Number(jQuery('#dollarcorporatetitle').val());
            r = v1 + v2 + v3;
            jQuery('#x_amount').val(r);
        });
        jQuery('#regform').validate({
            rules: {
                x_amount: {required: true},
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
    <div class="row-input">
        <div class="biginput">
            Welcome to the 4th Annual NIAF Golf Tournament Registration Form. <b>Please Reserve </b>Your Spots Today! <br><br>
            &nbsp;&nbsp;<u>Please Note:</u><br><br>
            &nbsp;&nbsp; - Fields with a red <span class="required">*</span> are <span class="required"><b>Required</b></span> <br><br>
            &nbsp;&nbsp;- All forms are <u>securely</u> submitted using encryption
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <b>Golf Packages:</b>
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">
            <select name="numcorporatestandards" size="1" class="select-Packages" amount="2500">
                <option value="0" selected="">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>                           
            <b>Standard Level Sponsorship - $2,500</b><br> 
            <ul>    
                <li>Includes Golf Foursome package</li>
                <li>Company Listing on NIAF Website</li>
                <li>Four (4) Rat Pack Live dinner and show tickets</li>
                <li>Printed acknowledgement on event day material</li>   
            </ul>                           

        </div>
        <div class="midinput">
            <b>$</b>&nbsp;<input type="text" readonly="" value="0.00" size="9" id="dollarcorporatestandard" name="dollarcorporatestandard" class="sub-amount">
        </div>        
    </div>
    <div class="row-input">
        <div class="midinput">
            <select name="numcorporatepremiums" size="1" class="select-Packages" amount="5000">
                <option value="0" selected="">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>                           
            <b>Premium Level Sponsorship - $5,000</b> 
            <ul>            
                <li>Includes Golf Foursome package </li>
                <li>Company Listing on NIAF Website</li>
                <li>Printed and verbal acknowledgement on event day</li>
                <li>Eight (8) Rat Pack Live dinner and show tickets</li>
                <li>Recognition in the NIAF E-Newsletter</li>
            </ul>

        </div>
        <div class="midinput">
            <b>$</b>&nbsp;<input type="text" readonly="" value="0.00" size="9" id="dollarcorporatepremium" name="dollarcorporatepremium" class="sub-amount">      
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">        
            <select name="numcorporatetitles" size="1" class="select-Packages" amount="10000">
                <option value="0" selected="">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>                           
            <b>Title Level Sponsorship - $10,000</b>                 
            <ul>
                <li>Includes Golf Foursome package </li>
                <li>Company Listing on NIAF Website</li>
                <li>Verbal acknowledgement on event day</li>
                <li>Twenty (20) Rat Pack Live dinner and show tickets</li>
                <li>Company name listed on all event printed material and press releases</li>
                <li>Advertisement and recognition  in the NIAF E-Newsletter</li>
                <li>Full page ad in one issue of NIAF Ambassador Magazine</li>
            </ul>

        </div>
        <div class="midinput">
            <b>$</b>&nbsp;<input type="text" readonly="" value="0.00" size="9" id="dollarcorporatetitle" name="dollarcorporatetitle" class="sub-amount">
        </div>
    </div>
    <div class="row-input">        
        <div class="biginput">      
            <?php
            for ($i = 0; $i < 40; $i++) {
                echo '&nbsp;';
            }
            ?><b>TOTAL REMITTED $</b>
            <!--<input type="hidden" name="dollartotal" size="9" maxlength="9" value="0.00">--> 
            <input type="text" name="x_amount"  id="x_amount" readonly="" size="9" maxlength="9" value="" class="sub-amount">    
        </div>
    </div>              

    <div class="row-input">
        <div class="biginput">      
            <b><u>Please enter the golfer names:</u></b>
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">
            <span>Golfer 1 </span>
            <input type="text" value="" size="60" maxlength="100" name="golfer1" id="golfer1">
        </div>
        <div class="midinput">
            <span>Golfer 2</span>
            <input type="text" value="" size="60" maxlength="100" name="golfer2" id="golfer2">  
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">
            <span>Golfer 3</span>
            <input type="text" value="" size="60" maxlength="100" name="golfer3" id="golfer3">
        </div>
        <div class="midinput">
            <span>Golfer 4</span>
            <input type="text" value="" size="60" maxlength="100" name="golfer4" id="golfer4">
        </div>
    </div>  
    <hr noshade="1">
    <div class="row-input">
        <div class="biginput">        
            <b><u>Please complete below</u></b>
        </div>
    </div>

    <div class="row-input">
        <div class="midinput">
            <span class="required">*</span>&nbsp; Salutation:
            <select name="Salutation" value="Select Salutation" size="1">
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Mr. and Mrs.">Mr. and Mrs.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
                <option value="Hon.">Hon.</option>
                <option value="Rev.">Rev.</option>
                <option value="Sen.">Sen.</option>
            </select>
        </div>
        <div class="midinput">
            <span class="required">*</span>&nbsp; First Name:
            <input type="text" name="x_first_name" size="50" maxlength="50" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span class="required">*</span>&nbsp; Last Name:
            <input type="text" name="x_last_name" size="50" maxlength="75" value="">
        </div>
        <div class="midinput">
            Firm/Organization: 
            <input type="text" name="txtOrganization" size="50" maxlength="75" value="">
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">
            <span class="required">*</span>&nbsp;Address:
            <input type="text" name="x_address" size="50" maxlength="60" value="">
        </div>
        <div class="midinput">
            <br>
            <input type="text" name="txtAddress2" size="50" maxlength="60" value="">
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">
            <span class="required">*</span>&nbsp;City:
            <input type="text" name="x_city" size="25" maxlength="40" value="">
        </div>
        <div class="midinput">
            <span type="text" class="required">*</span>&nbsp;State Abbreviation: &nbsp;&nbsp;<i>example: DC</i>
            <input type="text" name="x_state" size="2" maxlength="2" value="">

        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">
            <span class="required">*</span>*&nbsp;Zip Code:
            <input type="text" name="x_zip" size="10" maxlength="10" value="">
        </div>
        <div class="midinput">
            Home Phone:<i>&nbsp;&nbsp;&nbsp;&nbsp;example: 202-387-0600</i>
            <input type="text" name="txtHomePhone" size="12" maxlength="12" value="">
        </div>
    </div>  

    <div class="row-input">
        <div class="midinput">
            Business Phone:&nbsp;&nbsp;<i>example: 202-387-0800</i>
            <input type="text" name="txtBizPhone" size="12" maxlength="12" value="">
        </div>
        <div class="midinput">
            <span class="required">*</span>*&nbsp;Email Address:&nbsp;&nbsp;<i>example: johndoe@aol.com</i>
            <input type="text" name="txtEmail" size="30" maxlength="30" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="biginput">
            <font color="blue"><u><b>Payment Method</b></u></font>
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            <span>Credit Card:</span>
            <select name="x_card_type" size="1">
                <option value="">Select</option>
                <option value="0">Visa</option>
                <option value="1">MasterCard</option>
                <option value="2">American Express</option>
            </select>                   
        </div>
        <div class="midinput">
            Credit Card Number:
            <input type="text" name="x_card_num" size="16" maxlength="16" value="">
        </div>
    </div>
    <div class="row-input">
        <div class="midinput">
            Credit Card Expiration Month:
            <select name="x_expiration_month" value="Select Month" size="1">
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
        </div>
        <div class="midinput">
            Credit Card Expiration Year:
            <select name="x_expiration_year" size="1">
                <option value="" selected="">Select</option>
                <option value="2014">2014</option>                  
                <option value="2015">2015</option>              
                <option value="2016">2016</option>              
                <option value="2017">2017</option>  
                <option value="2018">2018</option>                                          
            </select>
        </div>
    </div>

    <div class="row-input">
        <div class="biginput">   
            <center>
                <input type="hidden" name="send" value="true">
                <input type="submit" value="SUBMIT">
                <input type="reset" value="RESET"> 
            </center>
        </div>
    </div>
</form>