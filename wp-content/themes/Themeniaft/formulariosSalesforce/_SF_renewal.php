<?php 
	session_start();
	$weblogin = $_POST['website_login'];
	$mail = strtolower($_POST['email']);

	require '_SF_config.php';
	try {
		require_once ('soapclient/SforcePartnerClient.php');

		$mySforceConnection = new SforcePartnerClient();
		$mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
		$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);

		//EXTRACTING WEBSITE_LOGIN__C OF SALESFORCE
		$query = "SELECT Website_Login__c FROM contact WHERE email = '$mail'";
		$response = $mySforceConnection->query($query);

		foreach ($response->records as $record) {
			 $compareWebsite_login = $record->any;
		}
		//EXTRACTING EMAIL OF SALESFORCE
		$queryEmail = "SELECT email FROM contact WHERE email = '$mail'";
		$responseEmail = $mySforceConnection->query($queryEmail);
		foreach ($responseEmail->records as $recordEmail) {
			 $compareEmail = $recordEmail->any;
		}

		if ($compareWebsite_login<>'' && $compareEmail<>'') {

			$compareWebsite_login = @simplexml_load_string($compareWebsite_login);
			$compareEmail = @simplexml_load_string($compareEmail);# code...
		}
		 

		if ($compareWebsite_login == $weblogin && $compareEmail == $mail && $mail<>'' && $weblogin<>'') {
			//EXTRACTING DATA OF SALESFORCE
			$queryTODOS = "SELECT salutation, 
								  FirstName, 
								  Middle_Initial__c,
								  LastName, 
								  Suffix__c,
								  Nickname__c,
								  Spouse_First_Name__c,
								  AccountId,
								  Title,
								  MailingStreet,
								  MailingCity,
								  MailingState,
								  MailingPostalCode,
								  Email,
								  Membership_Exp_Date__c,
								  Id,
								  Birth_Year__c,
								  Degree__c,
								  Income__c,
								  Interests__c,
								  HomePhone,
								  Phone,
								  Fax,
								  MailingCountry
						   FROM contact 
						   WHERE email = '$mail'";

			$responseTODOS = $mySforceConnection->query($queryTODOS);
			foreach ($responseTODOS->records as $recordTODOS) {
				 $datos = $recordTODOS->any;
			}
			
			//XML FILE PROCESSING
			$datos = str_replace("<sf:Salutation>", "", $datos);
			$datos = str_replace("</sf:Salutation>", "", $datos);
			$datos = str_replace('<sf:Salutation xsi:nil="true"/>', "|", $datos);
			
			$datos = str_replace("<sf:FirstName>", "|", $datos);
			$datos = str_replace("</sf:FirstName>", "", $datos);
			$datos = str_replace('<sf:FirstName xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Middle_Initial__c>", "|", $datos); 
			$datos = str_replace("</sf:Middle_Initial__c>", "", $datos);
			$datos = str_replace('<sf:Middle_Initial__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:LastName>", "|", $datos);
			$datos = str_replace("</sf:LastName>", "", $datos);
			$datos = str_replace('<sf:LastName xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Suffix__c>", "|", $datos);
			$datos = str_replace("</sf:Suffix__c>", "", $datos);
			$datos = str_replace('<sf:Suffix__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Nickname__c>", "|", $datos);
			$datos = str_replace("</sf:Nickname__c>", "", $datos);
			$datos = str_replace('<sf:Nickname__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Spouse_First_Name__c>", "|", $datos);
			$datos = str_replace("</sf:Spouse_First_Name__c>", "", $datos);
			$datos = str_replace('<sf:Spouse_First_Name__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:AccountId>", "|", $datos);
			$datos = str_replace("</sf:AccountId>", "", $datos);
			$datos = str_replace('<sf:AccountId xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Title>", "|", $datos);
			$datos = str_replace("</sf:Title>", "", $datos);
			$datos = str_replace('<sf:Title xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:MailingStreet>", "|", $datos);
			$datos = str_replace("</sf:MailingStreet>", "", $datos);
			$datos = str_replace('<sf:MailingStreet xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:MailingCity>", "|", $datos);
			$datos = str_replace("</sf:MailingCity>", "", $datos);
			$datos = str_replace('<sf:MailingCity xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:MailingState>", "|", $datos);
			$datos = str_replace("</sf:MailingState>", "", $datos);
			$datos = str_replace('<sf:MailingState xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:MailingPostalCode>", "|", $datos);
			$datos = str_replace("</sf:MailingPostalCode>", "", $datos);
			$datos = str_replace('<sf:MailingPostalCode xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Email>", "|", $datos);
			$datos = str_replace("</sf:Email>", "", $datos);
			$datos = str_replace('<sf:Email xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Membership_Exp_Date__c>", "|", $datos);
			$datos = str_replace("</sf:Membership_Exp_Date__c>", "", $datos);
			$datos = str_replace('<sf:Membership_Exp_Date__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Id>", "|", $datos);
			$datos = str_replace("</sf:Id>", "", $datos);

			$datos = str_replace("<sf:Birth_Year__c>", "|", $datos);
			$datos = str_replace("</sf:Birth_Year__c>", "", $datos);
			$datos = str_replace('<sf:Birth_Year__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Degree__c>", "|", $datos);
			$datos = str_replace("</sf:Degree__c>", "", $datos);
			$datos = str_replace('<sf:Degree__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Income__c>", "|", $datos);
			$datos = str_replace("</sf:Income__c>", "", $datos);
			$datos = str_replace('<sf:MailingState xsi:nil="true"/>', "|", $datos);


			$datos = str_replace("<sf:Interests__c>", "|", $datos);
			$datos = str_replace("</sf:Interests__c>", "", $datos);
			$datos = str_replace('<sf:Interests__c xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:HomePhone>", "|", $datos);
			$datos = str_replace("</sf:HomePhone>", "", $datos);
			$datos = str_replace('<sf:HomePhone xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Phone>", "|", $datos);
			$datos = str_replace("</sf:Phone>", "", $datos);
			$datos = str_replace('<sf:Phone xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:Fax>", "|", $datos);
			$datos = str_replace("</sf:Fax>", "", $datos);
			$datos = str_replace('<sf:Fax xsi:nil="true"/>', "|", $datos);

			$datos = str_replace("<sf:MailingCountry>", "|", $datos);
			$datos = str_replace("</sf:MailingCountry>", "", $datos);
			$datos = str_replace('<sf:MailingCountry xsi:nil="true"/>', "|", $datos);
			$arrayREQUERIDOS = array();
			$arrayREQUERIDOS = explode("|", $datos);
			//PROCESAR EL CAMPO "INTEREST CATEGORIES"
			$interesCategories = explode(";", $arrayREQUERIDOS[19]);
			$tamanio = count($interesCategories);
			//EXTRAER EL NOMBRE DE LA ORGANIZATION
			$organizationSQL = "SELECT Name FROM account WHERE Id = '$arrayREQUERIDOS[7]'";
			$responseOrganization = $mySforceConnection->query($organizationSQL);
						foreach ($responseOrganization->records as $rsOrganization) {
							 $datosOrganization = $rsOrganization->any;
						}
			$datosOrganization = str_replace("<sf:Name>", "", $datosOrganization);
			$datosOrganization = str_replace("</sf:Name>", "", $datosOrganization);
			$datosOrganization = str_replace('<sf:Name xsi:nil="true"/>', "", $datosOrganization);
			$nameOrganization = $datosOrganization;

			//CONVIRTIENDO EL STATE
			require_once("_SF_convert_state.php");
			$arrayREQUERIDOS[11] = stateOriginalDigits($arrayREQUERIDOS[11]);
		}else{
			$typeAlert=0;
				echo "
					 <script type='text/javascript'>
					 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
					 </script>
					";
		}
	}catch (Exception $e) {
	  		$typeAlert=5;
				echo "
					 <script type='text/javascript'>
					 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
					 </script>
					";
	}
 ?>
<html>
<head>
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_council_and_paymentmethod.js"></script>
	<!-- FIN VALIDAR-->	
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<link rel="stylesheet" href="change_page/style_vertical.css" type="text/css" media="screen"/>
	<title>Renewal NIAF</title>
	<!-- ALERT -->
		<script>
			function ok(){
				alert("Congratulations, your data has been loaded correctly!!"); 
				return false;
			}
		</script>
	<!-- END ALERT -->
</head>
<body onLoad="ok()">
	<tituloniaf>Renewal NIAF</tituloniaf>
	<hr>
<form name="validar_form" id="validar_form" method="post" action="_SF_register_renewal.php">

<div class="section black" id="section1">
<table>
				<tr>
                    <img src="CSS3/contact.png" height="53">
				</tr>
				<tr>
					<input type="hidden" name="id_contact" value="<?php echo $arrayREQUERIDOS[15]?>">
					<input type="hidden" name="id_account" value="<?php echo $arrayREQUERIDOS[7]?>">
					<th><requerido>* </requerido>Salutation:</th>	
					<td>
						<?php 
						echo "<select class='text' name='salutation'>";
							echo "<option>".$arrayREQUERIDOS[0]."</option>";
							if($arrayREQUERIDOS[0] <> "Atty."){
								echo "<option>Atty.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Capt."){
								echo "<option>Capt.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Cav."){
								echo "<option>Cav.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Col."){
								echo "<option>Col.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Com."){
								echo "<option>Com.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Deacon."){
								echo "<option>Deacon.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Del."){
								echo "<option>Del.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Dott."){
								echo "<option>Dott.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Dr."){
								echo "<option>Dr.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Fr."){
								echo "<option>Fr.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Gen."){
								echo "<option>Gen.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Hon."){
								echo "<option>Hon.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Judge"){
								echo "<option>Judge</option>";
							}
							if($arrayREQUERIDOS[0] <> "Lt."){
								echo "<option>Lt.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Lt. Col."){
								echo "<option>Lt. Col.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Lt. Comm."){
								echo "<option>Lt. Comm.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Maj. Gen."){
								echo "<option>Maj. Gen.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Maj."){
								echo "<option>Maj.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Mayor"){
								echo "<option>Mayor</option>";
							}
							if($arrayREQUERIDOS[0] <> "Mr."){
								echo "<option>Mr.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Mr. & Mrs."){
								echo "<option>Mr. & Mrs.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Mrs."){
								echo "<option>Mrs.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Ms."){
								echo "<option>Ms.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Msgr."){
								echo "<option>Msgr.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Prof."){
								echo "<option>Prof.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Rev."){
								echo "<option>Rev.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Rev. Msgr."){
								echo "<option>Rev. Msgr.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Sen."){
								echo "<option>Sen.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Sgt."){
								echo "<option>Sgt.</option>";
							}
							if($arrayREQUERIDOS[0] <> "Sister"){
								echo "<option>Sister</option>";
							}
						 echo "</select>";
						 ?>
					</td>
				</tr>
				<tr>
					<th><requerido>* </requerido>First Name:</th>
					<td><input class="text" type="text" name="first_name" value="<?php echo $arrayREQUERIDOS[1]?>"></td>
				</tr> 
				<tr>
					<th>Middle Name(or Initial):</th>
					<td><input class="text" type="text" name="middle_name" value="<?php echo $arrayREQUERIDOS[2]?>"></td>
				</tr>
				<tr>
					<th><requerido>* </requerido>Last Name:</th>
					<td><input class="text" type="text" name="last_name" value="<?php echo $arrayREQUERIDOS[3]?>"></td>
				</tr>
				<tr>
					<th>Suffix - (if applicable):</th>
					<td>
						<?php 
							echo "<select class='text' name='suffix'>";
							echo "<option>".$arrayREQUERIDOS[4]."</option>";
							if($arrayREQUERIDOS[4]<>"II")
							{
								echo "<option>II</option>";
							}
							if($arrayREQUERIDOS[4]<>"III")
							{
								echo "<option>III</option>";
							}
							if($arrayREQUERIDOS[4]<>"Esq")
							{
								echo "<option>Esq</option>";
							}
							if($arrayREQUERIDOS[4]<>"Jr")
							{
								echo "<option>Jr</option>";
							}
							if($arrayREQUERIDOS[4]<>"MD")
							{
								echo "<option>MD</option>";
							}
							if($arrayREQUERIDOS[4]<>"PhD")
							{
								echo "<option>PhD</option>";
							}
							if($arrayREQUERIDOS[4]<>"Sr")
							{
								echo "<option>Sr</option>";
							}
						 ?>
					</td>
				</tr>
				<tr>
					<th>Nick Name:</th>
					<td><input class="text" type="text" name="nick_name" value="<?php echo $arrayREQUERIDOS[5]?>"></td>
				</tr>
				<tr>
					<th>Spouse Name - (if applicable):</th>
					<td><input class="text" type="text" name="spouse_name" value="<?php echo $arrayREQUERIDOS[6]?>"></td>
				</tr>
				<!--<tr>
					<th>Organization:</th>
					<td><input class="text" type="text" name="organization" value="<?php echo $nameOrganization ?>"></td>
				</tr>-->
				<tr>
					<th>Title:</th>
					<td><input class="text" type="text" name="title" value="<?php echo $arrayREQUERIDOS[8]?>"></td>
				</tr>
				<tr>
				<tr>
					<th><requerido>* </requerido>Street:</th>
					<td><input class="text" type="text" name="street" value="<?php echo $arrayREQUERIDOS[9]?>"></td>
				</tr>
				<tr>
					<th><requerido>* </requerido>City:</th>
					<td><input class="text" type="text" name="city" value="<?php echo $arrayREQUERIDOS[10]?>"></td>
				</tr>
				<tr>
					<th><requerido>* </requerido>State:</th>
					<td>
						<?php
							echo "<select class='text' name='state'>";
							if($arrayREQUERIDOS[11]==" ")
							{
								echo "<option>--None--</option>";
							}else{
								echo "<option>".$arrayREQUERIDOS[11]."</option>";
								echo "<option>--None--</option>";
							}

							if($arrayREQUERIDOS[11]<>"Alabama")
							{
								echo "<option>Alabama</option>";
							}
							if($arrayREQUERIDOS[11]<>"Alaska")
							{
								echo "<option>Alaska</option>";
							}
							if($arrayREQUERIDOS[11]<>"Arizona")
							{
								echo "<option>Arizona</option>";
							}
							if($arrayREQUERIDOS[11]<>"Arkansas")
							{
								echo "<option>Arkansas</option>";
							}
							if($arrayREQUERIDOS[11]<>"California")
							{
								echo "<option>California</option>";
							}
							if($arrayREQUERIDOS[11]<>"Colorado")
							{
								echo "<option>Colorado</option>";
							}
							if($arrayREQUERIDOS[11]<>"Connecticut")
							{
								echo "<option>Connecticut</option>";
							}
							if($arrayREQUERIDOS[11]<>"Delaware")
							{
								echo "<option>Delaware</option>";
							}
							if($arrayREQUERIDOS[11]<>"District of Columbia")
							{
								echo "<option>District of Columbia</option>";
							}
							if($arrayREQUERIDOS[11]<>"Florida")
							{
								echo "<option>Florida</option>";
							}
							if($arrayREQUERIDOS[11]<>"Georgia")
							{
								echo "<option>Georgia</option>";
							}
							if($arrayREQUERIDOS[11]<>"Hawaii")
							{
								echo "<option>Hawaii</option>";
							}
							if($arrayREQUERIDOS[11]<>"Idaho")
							{
								echo "<option>Idaho</option>";
							}
							if($arrayREQUERIDOS[11]<>"Illinois")
							{
								echo "<option>Illinois</option>";
							}
							if($arrayREQUERIDOS[11]<>"Indiana")
							{
								echo "<option>Indiana</option>";
							}
							if($arrayREQUERIDOS[11]<>"Lowa")
							{
								echo "<option>Lowa</option>";
							}
							if($arrayREQUERIDOS[11]<>"Kansas")
							{
								echo "<option>Kansas</option>";
							}
							if($arrayREQUERIDOS[11]<>"Kentucky")
							{
								echo "<option>Kentucky</option>";
							}
							if($arrayREQUERIDOS[11]<>"Lousiana")
							{
								echo "<option>Lousiana</option>";
							}
							if($arrayREQUERIDOS[11]<>"Maine")
							{
								echo "<option>Maine</option>";
							}
							if($arrayREQUERIDOS[11]<>"Marshall Islands")
							{
								echo "<option>Marshall Islands</option>";
							}
							if($arrayREQUERIDOS[11]<>"Maryland")
							{
								echo "<option>Maryland</option>";
							}
							if($arrayREQUERIDOS[11]<>"Massachusetts")
							{
								echo "<option>Massachusetts</option>";
							}
							if($arrayREQUERIDOS[11]<>"Michigan")
							{
								echo "<option>Michigan</option>";
							}
							if($arrayREQUERIDOS[11]<>"Minnesota")
							{
								echo "<option>Minnesota</option>";
							}
							if($arrayREQUERIDOS[11]<>"Mississippi")
							{
								echo "<option>Mississippi</option>";
							}
							if($arrayREQUERIDOS[11]<>"Missouri")
							{
								echo "<option>Missouri</option>";
							}
							if($arrayREQUERIDOS[11]<>"Montana")
							{
								echo "<option>Montana</option>";
							}
							if($arrayREQUERIDOS[11]<>"Nebraska")
							{
								echo "<option>Nebraska</option>";
							}
							if($arrayREQUERIDOS[11]<>"Nevada")
							{
								echo "<option>Nevada</option>";
							}
							if($arrayREQUERIDOS[11]<>"New Hampshire")
							{
								echo "<option>New Hampshire</option>";
							}
							if($arrayREQUERIDOS[11]<>"New Jersey")
							{
								echo "<option>New Jersey</option>";
							}
							if($arrayREQUERIDOS[11]<>"New Mexico")
							{
								echo "<option>New Mexico</option>";
							}
							if($arrayREQUERIDOS[11]<>"New York")
							{
								echo "<option>New York</option>";
							}
							if($arrayREQUERIDOS[11]<>"North Carolina")
							{
								echo "<option>North Carolina</option>";
							}
							if($arrayREQUERIDOS[11]<>"North Dakota")
							{
								echo "<option>North Dakota</option>";
							}
							if($arrayREQUERIDOS[11]<>"Ohio")
							{
								echo "<option>Ohio</option>";
							}
							if($arrayREQUERIDOS[11]<>"Oklahoma")
							{
								echo "<option>Oklahoma</option>";
							}
							if($arrayREQUERIDOS[11]<>"Oregon")
							{
								echo "<option>Oregon</option>";
							}
							if($arrayREQUERIDOS[11]<>"Pennsylvania")
							{
								echo "<option>Pennsylvania</option>";
							}
							if($arrayREQUERIDOS[11]<>"Rhode Island")
							{
								echo "<option>Rhode Island</option>";
							}
							if($arrayREQUERIDOS[11]<>"South Carolina")
							{
								echo "<option>South Carolina</option>";
							}
							if($arrayREQUERIDOS[11]<>"South Dakota")
							{
								echo "<option>South Dakota</option>";
							}
							if($arrayREQUERIDOS[11]<>"Tennessee")
							{
								echo "<option>Tennessee</option>";
							}
							if($arrayREQUERIDOS[11]<>"Texas")
							{
								echo "<option>Texas</option>";
							}
							if($arrayREQUERIDOS[11]<>"Utah")
							{
								echo "<option>Utah</option>";
							}
							if($arrayREQUERIDOS[11]<>"Vermont")
							{
								echo "<option>Vermont</option>";
							}
							if($arrayREQUERIDOS[11]<>"Virginia")
							{
								echo "<option>Virginia</option>";
							}
							if($arrayREQUERIDOS[11]<>"Washintong")
							{
								echo "<option>Washintong</option>";
							}
							if($arrayREQUERIDOS[11]<>"West Virginia")
							{
								echo "<option>West Virginia</option>";
							}
							if($arrayREQUERIDOS[11]<>"Wisconsin")
							{
								echo "<option>Wisconsin</option>";
							}
							if($arrayREQUERIDOS[11]<>"Wyoming")
							{
								echo "<option>Wyoming</option>";
							}
						echo "</select>";
						?>
					</td>
				</tr>
				<tr>
					<th><requerido>* </requerido>Country:</th>
					<td>
						<?php 
							echo "<select class='text' onchange='cambiarstate()' name='country'>";
							echo "<option>".$arrayREQUERIDOS[23]."</option>";
							if($arrayREQUERIDOS[23]<>"Argentina")
							{
								echo "<option>Argentina</option>";
							}
							if($arrayREQUERIDOS[23]<>"Australia")
							{
								echo "<option>Australia</option>";
							}
							if($arrayREQUERIDOS[23]<>"Austria")
							{
								echo "<option>Austria</option>";
							}
							if($arrayREQUERIDOS[23]<>"Belgium")
							{
								echo "<option>Belgium</option>";
							}
							if($arrayREQUERIDOS[23]<>"Bermuda")
							{
								echo "<option>Bermuda</option>";
							}
							if($arrayREQUERIDOS[23]<>"Canada")
							{
								echo "<option>Canada</option>";
							}
							if($arrayREQUERIDOS[23]<>"Denmark")
							{
								echo "<option>Denmark</option>";
							}
							if($arrayREQUERIDOS[23]<>"England")
							{
								echo "<option>England</option>";
							}
							if($arrayREQUERIDOS[23]<>"Finland")
							{
								echo "<option>Finland</option>";
							}
							if($arrayREQUERIDOS[23]<>"Germany")
							{
								echo "<option>Germany</option>";
							}
							if($arrayREQUERIDOS[23]<>"Greece")
							{
								echo "<option>Greece</option>";
							}
							if($arrayREQUERIDOS[23]<>"Hungary")
							{
								echo "<option>Hungary</option>";
							}
							if($arrayREQUERIDOS[23]<>"Ireland")
							{
								echo "<option>Ireland</option>";
							}
							if($arrayREQUERIDOS[23]<>"Italy")
							{
								echo "<option>Italy</option>";
							}
							if($arrayREQUERIDOS[23]<>"Monaco")
							{
								echo "<option>Monaco</option>";
							}
							if($arrayREQUERIDOS[23]<>"Netherlands")
							{
								echo "<option>therlands</option>";
							}
							if($arrayREQUERIDOS[23]<>"Poland")
							{
								echo "<option>Poland</option>";
							}
							if($arrayREQUERIDOS[23]<>"Portugal")
							{
								echo "<option>Portugal</option>";
							}
							if($arrayREQUERIDOS[23]<>"Spain")
							{
								echo "<option>Spain</option>";
							}
							if($arrayREQUERIDOS[23]<>"Sweden")
							{
								echo "<option>Sweden</option>";
							}
							if($arrayREQUERIDOS[23]<>"Switzerland")
							{
								echo "<option>Switzerland</option>";
							}
							if($arrayREQUERIDOS[23]<>"USA")
							{
								echo "<option>USA</option>";
							}
						 ?>
					</td>
				</tr>
				<tr>
					<th><requerido>* </requerido>Zip:</th>
					<td><input class="text" type="text" name="zip" value="<?php echo $arrayREQUERIDOS[12]?>"></td>
				</tr>
				<tr>
					<th>Home Telephone:</th>
					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="home_telephone" value="<?php echo $arrayREQUERIDOS[20]?>"></td>
				</tr>
				<tr>
					<th>Work Telephone:</th>
					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="work_telephone" value="<?php echo $arrayREQUERIDOS[21]?>"></td>
				</tr>
				<tr>
					<th>Fax:</th>
					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="fax" value="<?php echo $arrayREQUERIDOS[22]?>"></td>
					<input class="text" type="hidden" name="email_address" value="<?php echo $arrayREQUERIDOS[13]?>">
				</tr>
				<!--<tr>
					<th><requerido>* </requerido>E-mail Address:</th>
					<td><input class="text" type="text" name="email_address" value="<?php echo $arrayREQUERIDOS[13]?>"></td>
				</tr>-->
	</table>
	<ul class="nav">
        <li>1</li>
        <li><a href="#section2">2</a></li>
        <li><a href="#section3">3</a></li>
        <li><a href="#section4">4</a></li>
    </ul>
</div>



<div class="section white" id="section2">
	<table>
		<tr>
	        <img src="CSS3/statistical_informatio.png" height="53">
		</tr>
		<tr>
			<td>
			<contenido>
			<titulo>Please Note:</titulo> In order to get a more accurate sense of the demographics of our members, where their interests lie, and through which avenues they've come to learn about the NIAF, we require that the following be completed. Please rest assured that the NIAF will not share this information with outside parties. This information is collected and used solely for in-house statistical purposes.
			<br><br>
			If you do not want to provide the following information, we kindly ask that you call 202-387-0600 and we can take your membership information over the phone.	
			</contenido>
			</td>
		</tr>
	</table>
	<table>
				<?php  
			 		require '_passing_values.php';
			 	?>
				<tr>
					<th>YEAR OF BIRTH<requerido>*</requerido></th>
					<?php 
						$anioActual = date('Y');
						$anioInicio = 1900;
						$anioAct = $anioActual + 1;
						echo "<td>
							  <select class='text' name='year_of_birth'>";
							  echo "<option>".$arrayREQUERIDOS[16]."</option>";
						for ($i=$anioInicio; $i <= $anioActual ; $i++) { 	
						$anioAct = $anioAct -1;
							if($arrayREQUERIDOS[16]<>$anioAct){
								echo "
									<option>".$anioAct."</option>
								";
							}
						}
						echo "</select>
							  </td>";
					 ?>
				</tr>
				<tr>
					<th>HIGHEST LEVEL OF EDUCATION RECEIVED<requerido>*</requerido></th>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[17] == "High School"){ echo "checked"; } ?> name="education_received" value="High School"><RC>High School</RC></td>
					<td><input type="radio" <?php if($arrayREQUERIDOS[17] == "Graduates"){ echo "checked"; } ?> name="education_received" value="Graduates"><RC>Graduate</RC></td>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[17] == "Associate Degree"){ echo "checked"; } ?> name="education_received" value="Associate Degree"><RC>Associate Degree</RC></td>
					<td><input type="radio" <?php if($arrayREQUERIDOS[17] == "Doctorate"){ echo "checked";} ?> name="education_received" value="Doctorate"><RC>Doctorate</RC></td>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[17] == "Bachelor's Degree"){ echo "checked"; } ?> name="education_received" value="Bachelor's Degree"><RC>Bachelor's Degree</RC></td>
				</tr>
				<tr>
					<th>HOUSEHOLD INCOME<requerido>*</requerido></th>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[18]=="$75,000 and below"){ echo "checked"; } ?> name="household_income" value="$75,000 and below"><RC>$75,000 and below</RC></td>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[18]=="$75,001 - $150,000"){ echo "checked"; } ?> name="household_income" value="$75,001 - $150,000"><RC>$75,001 - $150,000</RC></td>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[18]=="$150,001 - $300,000"){ echo "checked"; } ?> name="household_income" value="$150,001 - $300,000"><RC>$150,001 - $300,000</RC></td>
				</tr>
				<tr>
					<td><input type="radio" <?php if($arrayREQUERIDOS[18]=="$300,000 and above"){ echo "checked"; } ?> name="household_income" value="$300,000 and above"><RC>$300,000 and above</RC></td>
				</tr>
				<tr>
					<th>INTEREST CATEGORIES</th>
				</tr>
				<?php
						//--------------PRIMER ROW-----------------------
						$parametroADIE = 0; $parametroPPGR = 0;
						echo '<tr>';
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Anti-Defamation/Image Enhancement"){
								echo '<td><input type="checkbox" checked name="Anti_Defamation_Image_Enhancement" value="Anti-Defamation/Image Enhancement"><RC>Anti-Defamation/Image Enhancement</RC></td>';
								$parametroADIE = 1;
							}
							if($interesCategories[$i]=="Public Polcy and Government Relations"){
								echo '<td><input type="checkbox" checked name="Public_Polcy_and_Government_Relations" value="Public Polcy and Government Relations"><RC>Public Polcy and Government Relations</RC></td>';
								$parametroPPGR = 1;
							}
						}
							if($parametroADIE == 0){
								echo '<td><input type="checkbox" name="Anti_Defamation_Image_Enhancement" value="Anti-Defamation/Image Enhancement"><RC>Anti-Defamation/Image Enhancement</RC></td>';
							}
							if($parametroPPGR == 0){
								echo '<td><input type="checkbox" name="Public_Polcy_and_Government_Relations" value="Public Polcy and Government Relations"><RC>Public Polcy and Government Relations</RC></td>';
							}				
						echo '</tr>';
						echo '<tr>';
						//--------------END PRIMER ROW---------------------
						//--------------SEGUNDO ROW------------------------
						$parametroYAE = 0; $parametroSAG = 0;
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Youth and Education"){
								echo '<td><input type="checkbox" checked name="Youth_and_Education" value="Youth and Education"><RC>Youth and Education</RC></td>';
								$parametroYAE = 1;
							}
							
							if($interesCategories[$i]=="Scholarship and Grants"){
								echo '<td><input type="checkbox" checked name="Scholarship_and_Grants" value="Scholarship and Grants"><RC>Scholarship and Grants</RC></td>';
								$parametroSAG = 1;
							}
						}
							if($parametroYAE == 0){
								echo '<td><input type="checkbox" name="Youth_and_Education" value="Youth and Education"><RC>Youth and Education</RC></td>';
							}
							if($parametroSAG == 0){
								echo '<td><input type="checkbox" name="Scholarship_and_Grants" value="Scholarship and Grants"><RC>Scholarship and Grants</RC></td>';
							}
						echo '</tr>';
						echo '<tr>';
						//--------------END SEGUNDO ROW---------------------
						//--------------TERCER ROW--------------------------
						$parametroLAC = 0; $parametroUSIR = 0;
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Language and Culture"){
								echo '<td><input type="checkbox" checked name="Language_and_Culture" value="Language and Culture"><RC>Language and Culture</RC></td>';
								$parametroLAC = 1;
							}
							if($interesCategories[$i]=="U.S./Italy Relations"){
								echo '<td><input type="checkbox" checked name="U_S_Italy_Relations" value="U.S./Italy Relations"><RC>U.S./Italy Relations</RC></td>';
								$parametroUSIR = 1;
							}
						}
							if($parametroLAC == 0){
								echo '<td><input type="checkbox" name="Language_and_Culture" value="Language and Culture"><RC>Language and Culture</RC></td>';
							}
							if($parametroUSIR == 0){
								echo '<td><input type="checkbox" name="U_S_Italy_Relations" value="U.S./Italy Relations"><RC>U.S. Italy Relations</RC></td>';
							}
						echo '</tr>';
						echo '<tr>';
						//--------------END TERCER ROW-----------------------
						//------------------CUARTO ROW-----------------------
						$parametroD = 0; $parametroMAL = 0;
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Discrimination"){
								echo '<td><input type="checkbox" checked name="Discrimination" value="Discrimination"><RC>Discrimination</RC></td>';
								$parametroD = 1;
							}
							if($interesCategories[$i]=="Mentoring and Leadership"){
								echo '<td><input type="checkbox" checked name="Mentoring_and_Leadership" value="Mentoring and Leadership"><RC>Mentoring and Leadership</RC></td>';
								$parametroMAL = 1;
							}
						}
							if($parametroD == 0){
									echo '<td><input type="checkbox" name="Discrimination" value="Discrimination"><RC>Discrimination</RC></td>';
								}
							if($parametroMAL == 0){
									echo '<td><input type="checkbox" name="Mentoring_and_Leadership" value="Mentoring and Leadership"><RC>Mentoring and Leadership</RC></td>';
								}
						echo '</tr>';
						echo '<tr>';
						//--------------END CUARTO ROW-----------------------
						//------------------QUINTO ROW-----------------------
						$parametroPN = 0; $parametroTP = 0; 
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Professional Networking"){
								echo '<td><input type="checkbox" checked name="Professional_Networking" value="Professional Networking"><RC>Professional Networking</RC></td>';
								$parametroPN = 1;
							}
							if($interesCategories[$i]=="Travel Program"){
								echo '<td><input type="checkbox" checked name="Travel_Program" value="Travel Program"><RC>Travel Program</RC></td>';
								$parametroTP = 1;
							}
						}
							if($parametroPN == 0){
									echo '<td><input type="checkbox" name="Professional_Networking" value="Professional Networking"><RC>Professional Networking</RC></td>';
							}
							if($parametroTP == 0){
								echo '<td><input type="checkbox" name="Travel_Program" value="Travel Program"><RC>Travel Program</RC></td>';
							}
						echo '</tr>';
						echo '<tr>';
						//--------------END QUINTO ROW-----------------------
						//--------------SEXTO ROW-----------------------
						$parametroO = 0;
						for($i=0; $i<$tamanio; $i++)
						{
							if($interesCategories[$i]=="Other"){
								echo '<td><input type="checkbox" checked name="Other" value="other"><RC>Other</RC></td>';
								$parametroO = 1;
							}
						}
							if($parametroO == 0){
									echo '<td><input type="checkbox" name="Other" value="other"><RC>Other</RC></td>';
							}
						echo '</tr>';
						//--------------END SEXT ROW-----------------------
				?>
	</table>
	<ul class="nav">
        <li><a href="#section1">1</a></li>
        <li>2</li>
        <li><a href="#section3">3</a></li>
        <li><a href="#section4">4</a></li>
    </ul>
</div>


<div class="section black" id="section3">
<table>
				
				<tr>
                    <img src="CSS3/council_membership.png" height="53">
				</tr>
				<tr>
					<input type="hidden" name="Membership_Exp_Date__c" value="<?php echo $arrayREQUERIDOS[14]?>">
					<input type="hidden" name="id" value="<?php echo $arrayREQUERIDOS[15]?>">
				</tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(25)" checked name="council" value="25">NIAF Student Membership - $25</th>
                </tr>
                <tr></tr><tr></tr><tr></tr><tr></tr>
                <tr>
					<th><input type="radio" onchange="llenarHidden(50)" name="council" value="50">NIAF Associate Membership - $50</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(125)" name="council" value="125">NIAF Sustaining Membership - $125</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(250)" name="council" value="250">NIAF Patron Membership - $250</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(500)" name="council" value="500">NIAF Council Membership - $500</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(1000)" name="council" value="1000">NIAF Business Council Membership - $1,000</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(2500)" name="council" value="2500">Founder's Circle Membership - $2,500</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" onchange="llenarHidden(5000)" name="council" value="5000">Chairman's Circle Membership - $5,000</th>
				</tr>
				<tr>
					<?php 
							echo "<script>
									var num;
									function llenarHidden(num)
									{
										validar_form.valorSeleccionado.value = num;
										if (!validar_form.membership_term.selectedIndex==0)
									     { 
									     	validar_form.total_payment.value = (validar_form.membership_term.value) * (num) ;
									     }
									}
								  </script";
						?>
					<th><input type="hidden" value='25' name="valorSeleccionado"></th>
				</tr>

	</table>
	<ul class="nav">
        <li><a href="#section1">1</a></li>
        <li><a href="#section2">2</a></li>
        <li>3</li>
        <li><a href="#section4">4</a></li>
    </ul>
</div>


<div class="section black" id="section4">
<table>
				<tr>
                    <img src="CSS3/payment_method.png" height="53">
				</tr>
				<tr>
					<th>
						For your convenience, members may select to prepay their membership for multiple years
					</th>
				</tr>
</table>
<table>
						<?php 
							echo "<script>
									function calcular()
									{
										validar_form.total_payment.value = (validar_form.membership_term.value) * (validar_form.valorSeleccionado.value) ;
									}
								  </script";
						?>
				<tr>
					<th>Membership term<requerido>*</requerido></th>
					<td>
						<select class="text" onchange="calcular()" name="membership_term">
							<option value="0">--None--</option>
							<option value="1">1 Year</option>
							<option value="2">2 Years</option>
							<option value="3">3 Years</option>
							<option value="4">4 Years</option>
							<option value="5">5 Years</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Total Payment:</th>
					<td><input class="text" type="text" name="total_payment" value="STU" disabled="disabled"></td>
				</tr>
				<tr>
					<th>Payment Method:</th>
				</tr>
				<tr>
					<th>Card Number<requerido>*</requerido></th>
					<td><input class="text" type="text" value="4111111111111111" name="card_number"></td>
				</tr>
				<tr>
					<th>Expiration Month<requerido>*</requerido></th>
					<td>
						<select class="text" name="expiration_month">
							<option>--None--</option>
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
					</td>
				</tr>
				<tr>
					<th>Expiration Year<requerido>*</requerido></th>
					<td>
						<select class="text" name="expiration_year">
							<option>--None--</option>
							<?php 
								$myYear = date("Y"); 
								for ($y=0; $y <8 ; $y++) { 
									echo "<option>".$myYear."</option>";
									$myYear +=1;
								}
							 ?>
						</select>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<th>
						<?php  
			  				$firstNameP = $arrayREQUERIDOS[1];
							$lastNameP = $arrayREQUERIDOS[3];
							$streetP = $arrayREQUERIDOS[9];
							$cityP = $arrayREQUERIDOS[10];
							$stateP = $arrayREQUERIDOS[11];
							$countryP = $arrayREQUERIDOS[23];
							$zipP = $arrayREQUERIDOS[12];
							echo "<script type='text/javascript'>
									function llenardatos()
									{
										if (document.validar_form.check_this_box.checked)
										{ 
										  validar_form.p_first_name.value = validar_form.first_name.value;
										  validar_form.p_last_name.value = validar_form.last_name.value;
										  validar_form.p_street.value = validar_form.street.value;
										  validar_form.p_state.value = validar_form.state.value;
										  validar_form.p_city.value = validar_form.city.value;
										  validar_form.p_country.value = validar_form.country.value;
										  validar_form.p_zip.value = validar_form.zip.value;
									    }else{ 
									      validar_form.p_first_name.value = '';
										  validar_form.p_last_name.value = '';
										  validar_form.p_street.value = '';
										  validar_form.p_state.selectedIndex=0;
										  validar_form.p_country.selectedIndex=0;
										  validar_form.p_city.value = '';
										  validar_form.p_zip.value = '';
										}
									}
								  </script>";
						?>
						<td><input type="checkbox" onclick="llenardatos()" name="check_this_box"><RC2>Check this box if the credit card billing address is the same as previously entered. If not, please complete the below</RC2></td>
					</th>
				</tr>
			</table>
			<table>
				<tr>
					<th>First Name<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_first_name"></td>
				</tr>
				<tr>
					<th>Last Name<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_last_name"></td>
				</tr>
				<tr>
					<th>Street<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_street"></td>
				</tr>
				<tr>
					<th>City<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_city"></td>
				</tr>
				<tr>
					<th>State:<requerido>*</requerido></th>
					<td>
						<select class="text" name="p_state">
							<option value="">--None--</option>
							<option>Alabama</option>
							<option>Alaska</option>
							<option>Arizona</option>
							<option>Arkansas</option>
							<option>California</option>
							<option>Colorado</option>
							<option>Connecticut</option>
							<option>Delaware</option>
							<option>District of Columbia</option>
							<option>Florida</option>
							<option>Georgia</option>
							<option>Hawaii</option>
							<option>Idaho</option>
							<option>Illinois</option>
							<option>Indiana</option>
							<option>Lowa</option>
							<option>Kansas</option>
							<option>Kentucky</option>
							<option>Lousiana</option>
							<option>Maine</option>
							<option>Maryland</option>
							<option>Massachusetts</option>
							<option>Michigan</option>
							<option>Minnesota</option>
							<option>Mississippi</option>
							<option>Missouri</option>
							<option>Montana</option>
							<option>Nebraska</option>
							<option>Nevada</option>
							<option>New Hampshire</option>
							<option>New Jersey</option>
							<option>New Mexico</option>
							<option>New York</option>
							<option>North Carolina</option>
							<option>North Dakota</option>
							<option>Ohio</option>
							<option>Oklahoma</option>
							<option>Oregon</option>
							<option>Pennsylvania</option>
							<option>Rhode Island</option>
							<option>South Carolina</option>
							<option>South Dakota</option>
							<option>Tennessee</option>
							<option>Texas</option>
							<option>Utah</option>
							<option>Vermont</option>
							<option>Virginia</option>
							<option>Washintong</option>
							<option>West Virginia</option>
							<option>Wisconsin</option>
							<option>Wyoming</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Country<requerido>* </requerido></th>
					<td>
						<select class="text" name="p_country">
							<option  value="">--None--</option>
							<option>Argentina</option>
							<option>Australia</option>
							<option>Austria</option>
							<option>Belgium</option>
							<option>Bermuda</option>
							<option>Canada</option>
							<option>Denmark</option>
							<option>England</option>
							<option>Finland</option>
							<option>Germany</option>
							<option>Greece</option>
							<option>Hungary</option>
							<option>Ireland</option>
							<option>Italy</option>
							<option>Monaco</option>
							<option>Netherlands</option>
							<option>Poland</option>
							<option>Portugal</option>
							<option>Spain</option>
							<option>Sweden</option>
							<option>Switzerland</option>
							<option>USA</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Zip<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_zip"></td>
				</tr>
	</table>
	<ul class="nav">
        <li><a href="#section1">1</a></li>
        <li><a href="#section2">2</a></li>
        <li><a href="#section3">3</a></li>
        <li>4</li>
    </ul><br><br>
	<table align="left">
				<tr>
					<th>
						<input type="hidden" name="task2" value="SUBMIT">
						<input class="button large green" type="button" value="RENEWAL" onClick="validar()">
					</th>
				</tr>
	</table>
	</div>

</form>
<!-- The JavaScript -->
        <script type="text/javascript" src="change_page/jquery.min.js"></script>		
        <script type="text/javascript" src="change_page/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('ul.nav a').bind('click',function(event){
                    var $anchor = $(this);
                    
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500,'easeInOutExpo');
                    /*
                    if you don't want to use the easing effects:
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1000);
                    */
                    event.preventDefault();
                });
            });
        </script>
</body>
</html>
