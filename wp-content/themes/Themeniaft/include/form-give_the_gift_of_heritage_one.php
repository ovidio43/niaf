<form method="post" action="donorverify.asp" name="DonorInfo">
		
	<div class="row-input">
	    <div class="midinput">
			<span><strong>New Membership</strong></span>
			<input type="radio" value="true" name="optNewMember">
		</div>
		<div class="midinput">		
			</span><strong>Renewal </strong></span>
			<input type="radio" value="false" name="optNewMember">
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">
			<span>(Enter Member ID if known)</span>
			<input type="text" name="txtMemberID" size="7" maxlength="7" value="">
		</div>
	</div>
	<font face="Verdana, Arial, Helvetica" size="1">
		<font color="blue">------------------------------------------------------------------</font>
	</font>
	<div class="row-input">
	    <div class="biginput">
			<span><b><u>Contact Information:</u></b><span> 
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			Salutation: <span class="required">*</span>
			<select name="DropDownSalutation" value="Select" size="1">
				<option value="">-- SELECT --</option>							
				<option value="Atty.">Atty.</option>
				<option value="Capt.">Capt.</option>	
				<option value="Cav.">Cav.</option>
				<option value="Col.">Col.</option>
				<option value="Com.">Com.</option>
				<option value="Deacon">Deacon</option>
				<option value="Del.">Del.</option>	
				<option value="Dott.">Dott.</option>
				<option value="Dr.">Dr.</option>
				<option value="Fr.">Fr.</option>
				<option value="Gen.">Gen.</option>
				<option value="Hon.">Hon.</option>	
				<option value="Judge">Judge</option>
				<option value="Lt.">Lt.</option>
				<option value="Lt. Col.">Lt. Col.</option>
				<option value="Lt. Comm.">Lt. Comm.</option>
				<option value="Maj. Gen.">Maj. Gen.</option>	
				<option value="Maj.">Maj.</option>
				<option value="Mayor">Mayor</option>
				<option value="Mr.">Mr.</option>
				<option value="Mr. &amp; Mrs.">Mr. &amp; Mrs.</option>
				<option value="Mrs.">Mrs.</option>	
				<option value="Ms.">Ms.</option>
				<option value="Msgr.">Msgr.</option>
				<option value="Prof.">Prof.</option>
				<option value="Rev.">Rev.</option>
				<option value="Rev. Msgr.">Rev. Msgr.</option>	
				<option value="Sen.">Sen.</option>
				<option value="Sgt.">Sgt.</option>
				<option value="Sister">Sister</option>										
			</select>	
		</div>
		<div class="midinput">
			<span>First Name: <span class="required">*</span></span>		
			<input type="text" name="txtFirstName" size="25" maxlength="45" value="">
		</div>
	</div>	
	<div class="row-input">
    	<div class="midinput">
			<span>Middle Name(or Initial):</span>
			<input type="text" name="txtMiddleName" size="25" maxlength="45" value="">
		</div>
		<div class="midinput">
			 </span>Last Name: <span class="required">*</span></span>
			<input type="text" name="txtLastName" size="25" maxlength="45" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Suffix - (if applicable):</span>
			<select name="DropDownSuffix" value="Select" size="1">
				<option value="">-- SELECT --</option>				
				<option value="II">II</option>					
				<option value="III">III</option>
				<option value="Esq">Esq</option>
				<option value="Jr">Jr</option>
				<option value="MD">MD</option>
				<option value="PhD">PhD</option>
				<option value="Sr">Sr</option>		
			</select>		
		</div>
		<div class="midinput">
			<span>Nick Name:</span>	
			<input type="text" name="txtNickName" size="25" maxlength="45" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Spouse Name - (if applicable):</pan>
			<input type="text" name="txtSpouse" size="25" maxlength="75" value="">
		</div>
		<div class="midinput">
			<span>Organization:</span>
			<input type="text" name="txtOrganization" size="25" maxlength="60" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Title:</span>
			<input type="text" name="txtTitle" size="25" maxlength="45" value="">
		</div>
		<div class="midinput">	
			<span>Check if this is a work address:</span>
			<input type="checkbox" value="1" name="strWorkAddr">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<span>Street: <span class="required">*</span></span>		
			<input type="text" name="txtAddress1" size="25" maxlength="100" value="">
		</div>
		<div class="midinput">
			<br>
			<input type="text" name="txtAddress2" size="25" maxlength="100" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">			
			<span>City: <span class="required">*</span></span>		
			<input type="text" name="txtCity" size="25" maxlength="40" value="">
		</div>
		<div class="midinput">
			<span>State: <span class="required">*</span></span>	
			<input type="text" name="txtState" size="2" maxlength="2" value="">		
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Country:<br>&nbsp;(For Non-USA residents only) <span class="required">*</span></span>
			<input type="text" name="txtCountry" size="25" maxlength="50" value="">		
		</div>
		<div class="midinput">
			<span>Zip: <span class="required">*</span></span>
			<input type="text" name="txtZip" size="10" maxlength="10" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Home Telephone:</span>
			<input type="text" name="txtHomePhone" size="15" maxlength="15" value="">
		</div>
		<div class="midinput">
			<span>Work Telephone:</span>
			<input type="text" name="txtWorkPhone" size="15" maxlength="15" value="">&nbsp;
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">
			<span>Fax:</span>
			<input type="text" name="txtFaxPhone" size="15" maxlength="15" value="">
		</div>
		<div class="midinput">
			<span> E-mail Address: <span class="required">*</span></span>	
			<input type="text" name="txtEmail" size="25" maxlength="65" value="">
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
			<input type="radio" value="STU" name="level" id="level1" onclick="clevel(25)">
			NIAF Student Membership - $25 <br>
			<input type="radio" value="AS" name="level" id="level2" onclick="clevel(50)">
			NIAF Associate Membership  - $50 <br>
			<input type="radio" value="NSM" name="level" id="level3" onclick="clevel(125)">
			NIAF Sustaining Membership - $125 <br>
			<input type="radio" value="NPM" name="level" id="level4" onclick="clevel(250)">
			NIAF Patron Membership - $250 
		</div>
		<div class="midinput">
			<input type="radio" value="NCM" name="level" id="level5" onclick="clevel(500)">
			NIAF Council Membership - $500 <br>
			<input type="radio" value="BCM" name="level" id="level6" onclick="clevel(1000)">
			NIAF Business Council Membership - $1,000 <br>
			<input type="radio" value="FCM" name="level" id="level7" onclick="clevel(2500)">
			Founder's Circle Membership - $2,500 <br>
			<input type="radio" value="CCM" name="level" id="level8" onclick="clevel(5000)">
			Chairman's Circle Membership - $5,000 
		</div>
	</div>			

	<div class="row-input">
	    <div class="biginput">
		 	<a href="/membership/membership-types.asp" target="_blank">CLICK HERE</a> to learn more about our membership levels.	
		</div>
	</div>
	<font face="Verdana, Arial, Helvetica" size="1">
		<font color="blue">---------------------------------------------------------------------</font>
	</font>
	<div class="row-input">
	    <div class="biginput">
			<b><u>Statistical Information:</u></b>
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">
			<b>Please Note:</b> In order to get a more accurate sense of the demographics of our members, where their interests lie, and through which avenues they've come to learn about the NIAF, we require that the following be completed.  Please rest assured that the NIAF will <u>not</u> share this information with outside parties.  This information is collected and used solely for in-house statistical purposes.
			<br>
			<br>
			If you do not want to provide the following information, we kindly ask that you call 202-387-0600 and we can take your membership information over the phone.
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">		
			<span>YEAR OF BIRTH <span class="required">*</span><br><span>
			<select name="DropDownDOB" size="1">
				<option selected="">-- SELECT --</option>
				<option>1900</option>
				<option>1901</option>
				<option>1902</option>
				<option>1903</option>
				<option>1904</option>
				<option>1905</option>
				<option>1906</option>
				<option>1907</option>
				<option>1908</option>
				<option>1909</option>							
				<option>1910</option>
				<option>1911</option>
				<option>1912</option>
				<option>1913</option>
				<option>1914</option>
				<option>1915</option>
				<option>1916</option>
				<option>1917</option>
				<option>1918</option>
				<option>1919</option>
				<option>1920</option>
				<option>1921</option>
				<option>1922</option>
				<option>1923</option>
				<option>1924</option>
				<option>1925</option>
				<option>1926</option>
				<option>1927</option>
				<option>1928</option>
				<option>1929</option>							
				<option>1930</option>
				<option>1931</option>
				<option>1932</option>
				<option>1933</option>
				<option>1934</option>
				<option>1935</option>
				<option>1936</option>
				<option>1937</option>
				<option>1938</option>
				<option>1939</option>							
				<option>1940</option>
				<option>1941</option>
				<option>1942</option>
				<option>1943</option>
				<option>1944</option>
				<option>1945</option>
				<option>1946</option>
				<option>1947</option>
				<option>1948</option>
				<option>1949</option>							
				<option>1950</option>
				<option>1951</option>
				<option>1952</option>
				<option>1953</option>
				<option>1954</option>
				<option>1955</option>
				<option>1956</option>
				<option>1957</option>
				<option>1958</option>
				<option>1959</option>							
				<option>1960</option>
				<option>1961</option>
				<option>1962</option>
				<option>1963</option>
				<option>1964</option>
				<option>1965</option>
				<option>1966</option>
				<option>1967</option>
				<option>1968</option>
				<option>1969</option>							
				<option>1970</option>
				<option>1971</option>
				<option>1972</option>
				<option>1973</option>
				<option>1974</option>
				<option>1975</option>
				<option>1976</option>
				<option>1977</option>
				<option>1978</option>
				<option>1979</option>							
				<option>1980</option>
				<option>1981</option>
				<option>1982</option>
				<option>1983</option>
				<option>1984</option>
				<option>1985</option>
				<option>1986</option>
				<option>1987</option>
				<option>1988</option>
				<option>1989</option>
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
				<option>1998</option>
				<option>1999</option>
				<option>2000</option>
				<option>2001</option>
				<option>2002</option>
				<option>2003</option>
				<option>2004</option>								
				<option>2005</option>
				<option>2006</option>
				<option>2007</option>
				<option>2008</option>
			</select>
		</div>
	</div>
	<font color="blue">-------------------------</font>
			
	<div class="row-input">
	    <div class="biginput">	
			HIGHEST LEVEL OF <br>EDUCATION RECEIVED<span class="required">*</span>
		</div>
	</div>
	
	<div class="row-input">
    	<div class="midinput">	
			<input type="radio" value="High School" name="education">
			High School <br>
			<input type="radio" value="Associate Degree" name="education">
			Associate Degree <br>
			<input type="radio" value="Bachelor Degree" name="education">
			Bachelor's Degree
		</div>
		<div class="midinput">
			<input type="radio" value="Graduate" name="education">
			Graduate <br>
			<input type="radio" value="Doctorate" name="education">
			Doctorate
		</div>
	</div>		
	<font color="blue">-------------------------</font>					
	<div class="row-input">
    	<div class="biginput">
			<span>HOUSEHOLD INCOME <span class="required">*</span></span>
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<input type="radio" value="$75,000 and below" name="income">
			$75,000 and below <br>
			<input type="radio" value="$75,001 - $150,000" name="income">
			$75,001 - $150,000
		</div>
		<div class="midinput">
			<input type="radio" value="$150,001 - $300,000" name="income">
			$150,001 - $300,000	<br>
			<input type="radio" value="$300,001 and above" name="income">
			$300,000 and above
		</div>
	</div>
	<font color="blue">-------------------------</font>					
	<div class="row-input">
    	<div class="biginput">			
			INTEREST CATEGORIES <span class="required">*</span><br>
			(check all that apply)
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<input type="checkbox" name="chkScholarships">Scholarships and Grants<br>
			<input type="checkbox" name="chkYouthAndEducation">Youth and Education<br>	
			<input type="checkbox" name="chkLanguageAndCulture">Language and Culture<br>
			<input type="checkbox" name="chkUSItalyRelations">U.S. Italy Relations<br>
			<input type="checkbox" name="chkPoliticalAdvocacyAndAction">Political Advocacy and Action
		</div>
		<div class="midinput">
			<input type="checkbox" name="chkAntiDefamationIssues">Anti-Defamation Issues<br>
			<input type="checkbox" name="chkTravelProgram">Travel Program<br>	
			<input type="checkbox" name="chkMentoringAndLeadership">Mentoring and Leadership<br>
			<input type="checkbox" name="chkProfessionalNetworking">Professional Networking
		</div>
	</div>
	
			<font color="blue">-------------------------</font>			
	<div class="row-input">
	    <div class="biginput">
			I HEARD ABOUT THE <br>NIAF THROUGH <span class="required">*</span><br><br>
			(check all that apply)&nbsp;&nbsp;
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<input type="checkbox" name="chkFriendRelative">A friend/relative<br>
			<input type="checkbox" name="chkBusinessContact">Business Contact<br>
			<input type="checkbox" name="chkNIAFMailing">Mailing<br>
			<input type="checkbox" name="chkInternet">Internet<br>		
		</div>
		<div class="midinput">
			<input type="checkbox" name="chkNIAFEvent">NIAF Event<br>
			<input type="checkbox" name="chkMedia">Media<br>
			<input type="checkbox" name="chkPerilloTours">Perillo Tours<br>
		</div>
	</div>
	<font color="blue">------------------------------------------</font>
	<div class="row-input">
	    <div class="biginput">
			<b><u>Membership Prepayment:</u></b>
			For your convenience, members may elect to prepay their membership for multiple years
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<span>Membership term:</span>	
			<select name="memberterm" id="memberterm" value="Select" size="1" onchange="memterm()">
				<option value="1">1 Year</option>					
				<option selected="" value="2">2 Years</option>					
				<option value="3">3 Years</option>
				<option value="4">4 Years</option>
				<option value="5">5 Years</option>
			</select>	
		</div>
		<div class="midinput">
			<span>Total Payment:</span>
			<input type="text" name="GrandTotal" id="GrandTotal" value="" size="10" maxlength="15" readonly="">
		</div>
	</div>	
	
	<div class="row-input">
	    <div class="biginput">
			<span><b><u>Payment Method:</u></b></span>
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<span>Card Type <b><span class="required">*</span></b></span><br>
        	<select name="cboCardType" size="1">				
       			<option value="Visa">Visa</option>
				<option value="Mastercard"> MasterCard</option>
				<option value="American Express">American Express</option>
			</select>
		</div>
		<div class="midinput">
			Card Number <b><span class="required">*</span> </b><br>           
            <input type="text" name="txtCardNumber" value="" size="30" maxlength="20">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<span>Expiration Month <b> <span class="required">*</span> </b><br></span>				
	        <select name="cboCardMonth" size="1">
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
			</select>
		</div>
		<div class="midinput">
			<span>Expiration Year <b><font color="#CC0000">*</font> </b><br></span>
			<select name="cboCardYear" size="1">
				<option>2012</option>
				<option>2013</option>
				<option selected="">2014</option>
				<option>2015</option>
				<option>2016</option>					
				<option>2017</option>					
				<option>2018</option>		
				<option>2019</option>										
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
			<font face="verdana, arial, helvetica" size="1">First Name </font>
			<span class="required">*</span><br>
			<input type"text" name="txtCCFirstName" id="txtCCFirstName" size="25" maxlength="32" value="">
		</div>
		<div class="midinput">
			<font face="verdana, arial, helvetica" size="1">Last Name</font> 
			<span class="required">*</span><br>
			<input type"text" name="txtCCLastName" id="txtCCLastName" size="25" maxlength="64" value="">
		</div>
	</div>	

	<div class="row-input">
    	<div class="midinput">	
			<font face="verdana, arial, helvetica" size="1">Street</font>
			<span class="required">*</span><br>
			<input type"text" name="txtCCAddress1" id="txtCCAddress1" size="25" maxlength="100" value="">
		</div>
		<div class="midinput">
			<font face="verdana, arial, helvetica" size="1">City </font>
			<span class="required">*</span><br>
			<input type"text" name="txtCCCity" id="txtCCCity" size="25" maxlength="40" value="">
		</div>
	</div>
	<div class="row-input">
    	<div class="midinput">	
			<font face="verdana, arial, helvetica" size="1">State</font>
			<span class="required">*</span><br>
			<input type="text" name="txtCCState" id="txtCCState" size="12" maxlength="12" value="">
		</div>
		<div class="midinput">
			<font face="verdana, arial, helvetica" size="1">Zip</font><span class="required">*</span><br>
			<input type"text" name="txtCCZip" id="txtCCZip" size="10" maxlength="10" value="">
		</div>
	</div>
	<div class="row-input">
	    <div class="biginput">	
			<b><span class="required">*</span> Please review all the above information to make sure all fields are correct and click "submit" when finished or
			"reset" to start over:</b>
		</div>
	</div>

		<input type="hidden" name="fromdcp" value="">
		<input type="hidden" name="fromemail" value="">
	<div class="row-input">
	    <div class="biginput">
			<input type="button" onclick="javascript:history.go(-1);" name="previous" value="PREVIOUS"> &nbsp; &nbsp;
			<input type="submit" name="submit" value="CONTINUE">&nbsp; &nbsp;
			<input type="reset" name="reset" value="RESET">
		</div>
	</div>
</form>
	
	
