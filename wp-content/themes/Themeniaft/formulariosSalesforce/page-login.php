<?php 
	$weblogin = $_POST['website_login'];
	$mail = $_POST['email'];
	$remember = $_POST['remember'];
	require_once (get_template_directory().'/formulariosSalesforce/_SF_config.php');
	//require '_SF_config.php';
	try {
		//require_once ('soapclient/SforcePartnerClient.php');
		require_once (get_template_directory().'/formulariosSalesforce/soapclient/SforcePartnerClient.php');
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
			$query = "SELECT 
							 FirstName, 
							 LastName,
							 Member_ID__c
							FROM contact 
							WHERE email = '$mail'";

			$responseTODOS = $mySforceConnection->query($query);

			foreach ($responseTODOS->records as $recordTODOS) {
				 $datos = $recordTODOS->any;
			}


			//$datos = strip_tags($datos);
			//echo $datos;
			//XML FILE PROCESSING
			$datos = str_replace("sf:FirstName", "b", $datos);
			//$datos = str_replace("</sf:FirstName>", "", $datos);
			$datos = str_replace("sf:LastName", "b", $datos);
			//$datos = str_replace("</sf:LastName>", "", $datos);
			$datos = str_replace("sf:Member_ID__c", "b", $datos);
			//$datos = str_replace("</sf:Member_ID__c>", "", $datos);
			$datos = str_replace("</b>", "|", $datos);
			$datos = str_replace("<b>", "", $datos);
			//$datos = strip_tags($datos);			
			$arregloDatos = array();
			$arregloDatos = explode("|", $datos);		
			//EXTRACTING EMAIL OF SALESFORCE
			$queryMemberBenefitLevel = "SELECT Member_Benefit_Level__c FROM contact WHERE email = '$mail'";
			$responseMemberBenefitLevel = $mySforceConnection->query($queryMemberBenefitLevel);
			foreach ($responseMemberBenefitLevel->records as $recordMemberBenefitLevel) {
				 $MemberBenefitLevel = $recordMemberBenefitLevel->any;
			}			
			$MemberBenefitLevel = strip_tags($MemberBenefitLevel);
			function custom_login($MemberBenefitLevel, $arregloDatos) {
				$creds = array();
				$creds['user_login'] = 'category'.strtolower($MemberBenefitLevel);
				$creds['user_password'] = 'category'.strtoupper($MemberBenefitLevel);
				$creds['remember'] = $remember;
				$user = wp_signon( $creds, false );
				if ( is_wp_error($user) ){
					//echo $user->get_error_message();
					echo "0";
				}
				else{
					echo "1";				
				}
			}
			// run it before the headers and cookies are sent
			custom_login($MemberBenefitLevel, $arregloDatos);	
			function get_info_login($MemberBenefitLevel, $arregloDatos) {
				$creds = array();
				$creds['user_login'] = 'category'.strtolower($MemberBenefitLevel);
				$creds['user_password'] = 'category'.strtoupper($MemberBenefitLevel);
				$creds['remember'] = $remember;
				$user = wp_signon( $creds, false );
				if ( is_wp_error($user) ){
					//echo $user->get_error_message();
					echo "";
				}
				else{
					echo "1";
					echo "<br>";
					echo $MemberBenefitLevel; echo "<br>";
					echo "TRUE"; echo "<br>";
					echo $arregloDatos[0]; echo "<br>";
					echo $arregloDatos[1]; echo "<br>";
					echo $arregloDatos[2]; echo "<br>";					
				}
			}
		}else{
			$page = get_page_by_path('forgot-your-password');	
			echo "<br><br>ERROR: Invalid username.";
			echo '<br><a href="'.get_permalink($page->ID).'">If you have Forgot Your Password?</a>';
		}
	}catch (Exception $e) {
	  echo $e->faultstring;
	}
 ?>
