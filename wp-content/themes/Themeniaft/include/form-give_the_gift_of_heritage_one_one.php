<form method="post" action="donate-2.asp" name="DonateInfo" onsubmit="return(checkit(this));">
	<div class="row-input">
	    <div class="biginput">
			Complete the form below to contribute to the NIAF.  All information is securely submitted using encryption.  Please note that fields with a <span class="required">*</span> are required!
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>First Name <span class="required">*</span></span>
			<input type="text" name="txtFirstName" id="txtFirstName" size="25" maxlength="32" value="">
		</div>
		 <div class="midinput">
			<span>Last Name <span class="required">*</span></span>
			<input type="text" name="txtLastName" id="txtLastName" size="25" maxlength="64" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			<span>Spouse Name - if applicable</span>	
			<input type="text" name="txtSpouse" id="txtSpouse" size="25" maxlength="75" value="">
		</div>
		 <div class="midinput">
			<span>Organization</span>
			<input type="text" name="txtOrganization" id="txtOrganization" size="25" maxlength="32" value="">
		</div>
	</div>	
	<div class="row-input">
	    <div class="midinput">
			</span>Title</span>
			<input type="text" name="txtTitle" id="txtTitle" size="25" maxlength="32" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">
			<input type="checkbox" value="1" name="strWorkAddr" id="strWorkAddr">
			Check if this is a work address
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Street<span> <span class="required">*</span></span>		
			<input type="text" name="txtAddress1" id="txtAddress1" size="25" maxlength="100" value="">
		</div>
		 <div class="midinput">
			<br>
			<input type="text" name="txtAddress2" id="txtAddress2" size="25" maxlength="100" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>City <span class="required">*</span></span>
			<input type="text" name="txtCity" id="txtCity" size="25" maxlength="40" value="">
		</div>
		 <div class="midinput">
			<span>State <span class="required">*</span></span>
			<input type="text" name="txtState" id="txtState" size="12" maxlength="12" value="">
		</div>
	</div>
	
	<div class="row-input">
	    <div class="midinput">
			<span>Zip<span class="required">*</span></pan>
			<input type="text" name="txtZip" id="txtZip" size="10" maxlength="10" value="">
		</div>
		 <div class="midinput">
			<span>Home Telephone</span>
			<input type="text" name="txtHomePhone" id="txtHomePhone" size="15" maxlength="15" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Work Telephone</span>
			<input type="text" name="txtWorkPhone" id="txtWorkPhone" size="15" maxlength="15" value="">
		</div>
		 <div class="midinput">
			<span>E-mail<span class="required">*</span></span>
			<input type="text" name="txtEmail" id="txtEmail" size="25" maxlength="40" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Fax</span>
			<input type="text" name="txtFaxPhone" id="txtFaxPhone" size="15" maxlength="15" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">
			<span>Category of Donation <span class="required">*</span></span>
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<input type="checkbox" name="chkHonor" id="chkHonor" onclick="verifychkhonor(this);"> In Memory / In Honor Of <br>
			<input type="checkbox" name="chkGeneral" id="chkGeneral" onclick="verifychkgeneral(this);"> General	
		</div>
		 <div class="midinput">
			<input type="checkbox" name="chkScholar" id="chkScholar" onclick="verifychkscholar(this);"> Scholarship<br>
			<input type="checkbox" name="chkAll" id="chkAll" onclick="verifychkall(this);"> All
		</div>
	</div>
	<div class="row-input">
	    <div class="midinput">
			<span>Recipient(s)</span>	 
			<select name="numgifts" id="numgifts" size="1" onchange="verifynumgifts(this)">
				<option>0</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
			</select>
		</div>
		 <div class="midinput">
			<span>Donation Amount <span class="required">*</span>  <b>$</b></span>				
			<input type="text" name="DonateAmt" id="DonateAmt" value="" size="10" maxlength="10" onchange="verifyamount(this)">
		</div>
	</div>		
			
	<div class="row-input">
	    <div class="biginput">
			<b><span class="required">*</span> Please review all the above information to make sure all fields are correct and click "continue" when finished or
			"reset" to start over:</font></b>
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">
			<input type="submit" name="submit" value="CONTINUE">&nbsp; &nbsp;
			<input type="reset" name="reset" value="RESET">
		</div>
	</div>
</form>