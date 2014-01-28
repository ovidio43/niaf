<!--<form method="post" action="donate-4.asp" name="DonateInfo" onsubmit="return(checkit(this));">-->
<form method="post" action="" name="DonateInfo" onsubmit="return(checkit(this));">
	<input name="txtFirstName" id="txtFirstName" type="hidden" value="fddf">
	<input name="txtAddress1" id="txtAddress1" type="hidden" value="sdfsd">
	<input name="txtAddress2" id="txtAddress2" type="hidden" value="sdfsd">
	<input name="txtZip" id="txtZip" type="hidden" value="sdfds">
	<input name="RZip2" id="RZip2" type="hidden" value="dfgdf">
	<input name="txtLastName" id="txtLastName" type="hidden" value="dsfd">
	<input name="txtOrganization" id="txtOrganization" type="hidden" value="">
	<input name="txtTitle" id="txtTitle" type="hidden" value="">
	<input name="RAddress11" id="RAddress11" type="hidden" value="fgdf">
	<input name="RAddress21" id="RAddress21" type="hidden" value="fgf">
	<input name="RAddress12" id="RAddress12" type="hidden" value="fdgfd">
	<input name="RAddress22" id="RAddress22" type="hidden" value="dfgdfdf">
	<input name="RState2" id="RState2" type="hidden" value="dfgf">
	<input name="txtSpouse" id="txtSpouse" type="hidden" value="">
	<input name="txtCity" id="txtCity" type="hidden" value="sdfds">
	<input name="txtState" id="txtState" type="hidden" value="sdfsd">
	<input name="txtWorkPhone" id="txtWorkPhone" type="hidden" value="">
	<input name="submit" id="submit" type="hidden" value="CONTINUE, CONTINUE">
	<input name="RState1" id="RState1" type="hidden" value="dfgdf">
	<input name="txtHomePhone" id="txtHomePhone" type="hidden" value="">
	<input name="RCity1" id="RCity1" type="hidden" value="dfgdf">
	<input name="txtEmail" id="txtEmail" type="hidden" value="sdfsd">
	<input name="RFirstName1" id="RFirstName1" type="hidden" value="gdfg">
	<input name="RZip1" id="RZip1" type="hidden" value="fdgf">
	<input name="RFirstName2" id="RFirstName2" type="hidden" value="fdgdf">
	<input name="txtFaxPhone" id="txtFaxPhone" type="hidden" value="">
	<input name="DonateAmt" id="DonateAmt" type="hidden" value="25">
	<input name="RLastName1" id="RLastName1" type="hidden" value="dfgdf">
	<input name="RLastName2" id="RLastName2" type="hidden" value="fgfd">
	<input name="chkHonor" id="chkHonor" type="hidden" value="on">
	<input name="numgifts" id="numgifts" type="hidden" value="2">
	<input name="RCity2" id="RCity2" type="hidden" value="dfgdf">
	<div class="row-input">
	    <div class="midinput">
			<span>Entered Donation Amount <span class="required">*</span></span>
			<font face="Verdana, Arial, Helvetica" size="2"> <b>$</b></font>				
			<input type="text" name="DonateAmtConfirm" value="100" size="10" maxlength="10" readonly="">
		</div>
		<div class="midinput">		
			<span>Card Type <span class="required">*</span></span>
			<select name="cboCardType" id="cboCardType" size="1">
				<option value="0"> Visa</option>
				<option value="1"> MasterCard</option>
				<option value="2"> American Express</option>
			</select>
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Card Number <span class="required">*</span>  </span>
		    <input type="TEXT" name="txtCardNumber" id="txtCardNumber" value="" size="18" maxlength="18">
		</div>
		<div class="midinput">		
			<span>Expiration Month <span class="required">*</span></span>
		    <select name="cboCardMonth" id="cboCardMonth" size="1">
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Expiration Year <span class="required">*</span> </span>    
			<select name="cboCardYear" id="cboCardYear" size="1">
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>					
				<option value="2015">2015</option>										
				<option value="2016">2016</option>											
				<option value="2017">2017</option>											
				<option value="2018">2018</option>												
				<option value="2019">2019</option>												
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
			<span>First Name <span class="required">*</span></span> 
			<input type="text" name="txtCCFirstName" id="txtCCFirstName" size="25" maxlength="32" value="">
		</div>
		 <div class="midinput">
			<span>Last Name <span class="required">*</span></span>
			<input type="text" name="txtCCLastName" id="txtCCLastName" size="25" maxlength="64" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			<span>Street <span class="required">*</span></span>
			<input type="text" name="txtCCAddress1" id="txtCCAddress1" size="25" maxlength="100" value="">
		</div>
		 <div class="midinput">
			<span>City <span class="required">*</span> </span>
			<input type="text" name="txtCCCity" id="txtCCCity" size="25" maxlength="40" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			<span>State <span class="required">*</span></span>
			<input type="text" name="txtCCState" id="txtCCState" size="12" maxlength="12" value="">
		</div>
		 <div class="midinput">
			<span>Zip <span class="required">*</span></span>
			<input type="text" name="txtCCZip" id="txtCCZip" size="10" maxlength="10" value="">
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
			<input type="button" onclick="javascript:history.go(-1);" name="previous" value="PREVIOUS"> &nbsp; &nbsp;
			<input type="submit" name="submit" value="SUBMIT">&nbsp; &nbsp;
			<input type="reset" name="reset" value="RESET">
                        <input type="hidden" name="step" value="5">
		</div>
	</div>
</form>