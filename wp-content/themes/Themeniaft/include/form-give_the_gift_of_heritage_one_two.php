<form method="post" action="donate-3.asp" name="DonateInfo" onsubmit="return(checkit(this));">
	<input name="txtFirstName" id="txtFirstName" type="hidden" value="fddf">
	<input name="txtAddress1" id="txtAddress1" type="hidden" value="sdfsd">
	<input name="txtAddress2" id="txtAddress2" type="hidden" value="sdfsd">
	<input name="txtZip" id="txtZip" type="hidden" value="sdfds">
	<input name="txtLastName" id="txtLastName" type="hidden" value="dsfd">
	<input name="txtOrganization" id="txtOrganization" type="hidden" value="">
	<input name="txtTitle" id="txtTitle" type="hidden" value="">
	<input name="txtSpouse" id="txtSpouse" type="hidden" value="">
	<input name="txtCity" id="txtCity" type="hidden" value="sdfds">
	<input name="txtState" id="txtState" type="hidden" value="sdfsd">
	<input name="txtWorkPhone" id="txtWorkPhone" type="hidden" value="">
	<input name="submit" id="submit" type="hidden" value="CONTINUE">
	<input name="txtHomePhone" id="txtHomePhone" type="hidden" value="">
	<input name="txtEmail" id="txtEmail" type="hidden" value="sdfsd">
	<input name="txtFaxPhone" id="txtFaxPhone" type="hidden" value="">
	<input name="DonateAmt" id="DonateAmt" type="hidden" value="25">
	<input name="chkHonor" id="chkHonor" type="hidden" value="on">
	<input name="numgifts" id="numgifts" type="hidden" value="2">
	<div class="row-input">
	    <div class="biginput">
			Recipient 1
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>First Name <span class="required">*</span></span>
			<input text="text" name="RFirstName1" id="RFirstName1" size="25" maxlength="32" value="">
		</div>
		 <div class="midinput">
			<span>Last Name <span class="required">*</span></span>
			<input text="text" name="RLastName1" id="RLastName1" size="25" maxlength="64" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			<span>Street <span class="required">*</span></span>
			<input text="text" name="RAddress11" id="RAddress11" size="25" maxlength="100" value="">
		</div>
		 <div class="midinput">
			<br>
			<input text="text" name="RAddress21" size="25" maxlength="100" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>City <span class="required">*</span></span>
			<input text="text" name="RCity1" id="RCity1" size="25" maxlength="40" value="">
		</div>
		<div class="midinput">
			<span>State <span class="required">*</span></span>
			<input type="text" name="RState1" id="RState1" size="12" maxlength="12" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			<span>Zip <span class="required">*</span></span>
			<input text="text" name="RZip1" id="RZip1" size="10" maxlength="10" value="">
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
			<input text="text" name="RFirstName2" id="RFirstName2" size="25" maxlength="32" value="">
		</div>
		<div class="midinput">
			<span>Last Name <span class="required">*</span></span>
			<input text="text" name="RLastName2" id="RLastName2" size="25" maxlength="64" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Street <span class="required">*</span></span>
			<input text="text" name="RAddress12" id="RAddress22" size="25" maxlength="100" value="">
		</div>
		<div class="midinput">
			<br>
			<input text="text" name="RAddress22" size="25" maxlength="100" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>City <span class="required">*</span></span>
			<input text="text" name="RCity2" id="RCity2" size="25" maxlength="40" value="">
		</div>
		<div class="midinput">
			<span>State <span class="required">*</span></span>
			<input type="text" name="RState2" id="RState2" size="12" maxlength="12" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Zip <span class="required">*</span></span>
			<input text="text" name="RZip2" id="RZip2" size="10" maxlength="10" value="">
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
			<input type="button" onclick="javascript:history.go(-1);" name="previous" value="PREVIOUS"> &nbsp; &nbsp;
			<input type="submit" name="submit" value="CONTINUE">&nbsp; &nbsp;
			<input type="reset" name="reset" value="RESET">
		</div>
	</div>
</form>