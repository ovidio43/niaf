<?php ob_flush(); ?>
<?php 
session_start();

$mail = strtolower($_POST['email']);
$weblogin = $_POST['website_login'];
$remember = $_POST['remember'];
require_once( "../../../../wp-config.php" );
require_once (get_template_directory() . '/formulariosSalesforce/_SF_config.php');

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

		//EXTRACTING MEMBERSHIP_EXP_DATE OF SALESFORCE
		$queryMembership_Exp_Date__c = "SELECT Membership_Exp_Date__c FROM contact WHERE email = '$mail'";
		$responseMembership_Exp_Date__c = $mySforceConnection->query($queryMembership_Exp_Date__c);
		foreach ($responseMembership_Exp_Date__c->records as $recordMembership_Exp_Date__c) {
			 $compareMembership_Exp_Date__c = $recordMembership_Exp_Date__c->any;
		}



		if ($compareWebsite_login<>'' && $compareEmail<>'') {
			$compareWebsite_login = @simplexml_load_string($compareWebsite_login);
			$compareEmail = @simplexml_load_string($compareEmail);
			$compareMembership_Exp_Date__c = @simplexml_load_string($compareMembership_Exp_Date__c);
		}

		$mydate = date("Y-m-d");

		if($compareWebsite_login == $weblogin && $compareEmail == $mail && $mail<>'' && $weblogin<>'') 
		{
			if($mydate<=$compareMembership_Exp_Date__c)
			{
				$query = "SELECT 
								 FirstName, 
								 LastName,
								 Member_ID__c,
								 Membership_Exp_Date__c
								FROM contact 
								WHERE email = '$mail'";

				$responseTODOS = $mySforceConnection->query($query);

				foreach ($responseTODOS->records as $recordTODOS) {
					 $datos = $recordTODOS->any;
				}
				//XML FILE PROCESSING
				$datos = str_replace("<sf:FirstName>", "", $datos);
				$datos = str_replace("</sf:FirstName>", "", $datos);
				$datos = str_replace("<sf:LastName>", "|", $datos);
				$datos = str_replace("</sf:LastName>", "", $datos);
				$datos = str_replace("<sf:Member_ID__c>", "|", $datos);
				$datos = str_replace("</sf:Member_ID__c>", "", $datos);
				$datos = str_replace("<sf:Membership_Exp_Date__c>", "|", $datos);
				$datos = str_replace("</sf:Membership_Exp_Date__c>", "", $datos);				
				$arregloDatos = array();
				$arregloDatos = explode("|", $datos);
				//EXTRACTING EMAIL OF SALESFORCE
				$queryMemberBenefitLevel = "SELECT Member_Benefit_Level__c FROM contact WHERE email = '$mail'";
				$responseMemberBenefitLevel = $mySforceConnection->query($queryMemberBenefitLevel);
				foreach ($responseMemberBenefitLevel->records as $recordMemberBenefitLevel) {
					 $MemberBenefitLevel = $recordMemberBenefitLevel->any;
				}
				$fecha = explode("-", $arregloDatos[3]);
				$fechaDMY = array();

				$fechaDMY[0] = $fecha[1]; //MES
				$fechaDMY[1] = $fecha[2];//DIA
				$fechaDMY[2] = $fecha[0];//ANIO

				$arregloDatos[3] = implode("/", $fechaDMY);

				$MemberBenefitLevel = strip_tags($MemberBenefitLevel);
		        function custom_login($MemberBenefitLevel, $arregloDatos) {
		            $creds = array();
		            $creds['user_login'] = 'category' . strtolower($MemberBenefitLevel);
		            $creds['user_password'] = 'category' . strtoupper($MemberBenefitLevel);
		            $creds['remember'] = $remember;
		            $user = wp_signon($creds, false);
		            if (is_wp_error($user)) {
		                //echo $user->get_error_message();
		                echo "0";
		            } else {
		                echo "1";
		                $_SESSION['firstName']=$arregloDatos[0];
		                $_SESSION['lastName']=$arregloDatos[1];
		                $_SESSION['member_id__c']=$arregloDatos[2];
		                $_SESSION['dateexpiration']= $arregloDatos[3];
		//                $data_to_write = $arregloDatos[0] . "|" . $arregloDatos[1] . "|" . $arregloDatos[2];
		//                $filename = 'temporalfile.txt';
		//                $fp = fopen(TEMPLATEPATH . "/temporalfile.txt", "w");
		//                fputs($fp, $data_to_write);
		//                fclose($fp);
		            }
		        }							
				/*echo "<br>";
				echo $MemberBenefitLevel; echo "<br>";
				echo "TRUE"; echo "<br>";
				echo $arregloDatos[0]; echo "<br>";
				echo $arregloDatos[1]; echo "<br>";
				echo $arregloDatos[2]; echo "<br>";*/
				custom_login($MemberBenefitLevel, $arregloDatos);
			}else{

				$dateArray = date('m/d/Y', strtotime($compareMembership_Exp_Date__c));
				$page = get_page_by_path('join-us');
				echo '<br><br>The section that you are attempting to access is reserved for current members only. Our records indicate that your membership expired on '.$dateArray.'. If you would like to renew your membership, please <a href="' . get_permalink($page->ID) . '">click here</a>';
			}
		}else{ 
			//echo "FALSE";
	        $page = get_page_by_path('forgot-your-password');
	        echo "<br><br><span class='black'>Error: You have entered an invalid email address, password or combination.</span>";
	        echo '<br><br><a href="' . get_permalink($page->ID) . '">Forgot Your Password?</a>';
		}
	}catch (Exception $e) {
	  echo "<br><br>".$e->faultstring;
	}
 ?>
