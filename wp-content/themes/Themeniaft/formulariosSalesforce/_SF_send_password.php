<?php 
	$para = $_POST['email_address'];

	include_once("email/class.phpmailer.php");
	include_once("email/class.smtp.php");
	include_once("_SF_class.conexion.php");
	//EXTRACTING DATA OF SALESFORCE
	require '_SF_config.php';
	try {
		require_once ('soapclient/SforcePartnerClient.php');

		$mySforceConnection = new SforcePartnerClient();
		$mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
		$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);
			$queryTODOS = "SELECT FirstName, 
									LastName, 
									Website_Login__c
							FROM contact 
							WHERE email = '$para'";

			$responseTODOS = $mySforceConnection->query($queryTODOS);

			foreach ($responseTODOS->records as $recordTODOS) {
				 $datos = $recordTODOS->any;
			}
			//XML FILE PROCESSING
			$datos = str_replace("<sf:FirstName>", "", $datos);
			$datos = str_replace("</sf:FirstName>", "", $datos);
			$datos = str_replace("<sf:LastName>", "|", $datos);
			$datos = str_replace("</sf:LastName>", "", $datos);
			$datos = str_replace("<sf:Website_Login__c>", "|", $datos);
			$datos = str_replace("</sf:Website_Login__c>", "", $datos);
			$matrizSENDPASSWORD = array();
			$matrizSENDPASSWORD = explode("|", $datos);
			if($matrizSENDPASSWORD[0]=='' || $matrizSENDPASSWORD[1]=='' || $matrizSENDPASSWORD[2]=='')//COMPROBAR SI ESTA VACIO LA MATRIZ
			{
				$typeAlert=0;
				header('Location: _SF_forgot_password.php?alertType='.$typeAlert);
			}else{
				//************************PREPARE TO DATA FOR SEND********************
				$datosSTYLE = "<style type='text/css'>
								h1 {
									color: #009;
									font-weight: bold;
									text-align: center;
								}
								h2 {
									font-weight: bold;
									color: #006;
								}
								</style>";
				$datosMESSAGE = $datosSTYLE."<h1>PASSWORD SENT BY NIAF</h1><br>";
				$datosMESSAGE.= "<h2>DATA: </h2>"."<br>";
				$datosMESSAGE.= "<strong>First Name: </strong>".$matrizSENDPASSWORD[0]."<br>";
				$datosMESSAGE.= "<strong>Last Name: </strong>".$matrizSENDPASSWORD[1]."<br>";
				$datosMESSAGE.= "<strong>Your password is: </strong>".$matrizSENDPASSWORD[2]."<br>";

						//************************END PREPARE TO DATA FOR SEND****************
						//************************SEND MAIL TO USER***************************
						$conexion = new BaseDatos();
						$conexion->conexion();

							$query = "SELECT * FROM emailconfig WHERE id = '3'";
							$datos = mysql_query ($query);

							$host = mysql_result($datos,0,"host_NF");
							$port = mysql_result($datos,0,"port_NF");
							$from = mysql_result($datos,0,"from_NF");
							$from_name = mysql_result($datos,0,"from_name_NF");
							$user = mysql_result($datos,0,"user_NF");
							$pass = mysql_result($datos,0,"pass_NF");
							$pass = base64_decode($pass);
							$subject = mysql_result($datos,0,"subject_NF");
							$message = mysql_result($datos,0,"message_NF");

						$mail = new phpmailer();
						$mail->IsSMTP();
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = "ssl";
						$mail->Host = $host;
						$mail->Port = $port;
						$mail->From = $from; 
						$mail->FromName = $from_name;
						$mail->AddAddress($para);
						$mail->Username = $user;
						$mail->Password = $pass;
						$mail->Subject = $subject;
						$mail->Body = $datosMESSAGE;
						$mail->WordWrap = 50;
						$mail->MsgHTML($datosMESSAGE);

						if($mail->Send())
						{
							$typeAlert=1;
							header('Location: _SF_forgot_password.php?alertType='.$typeAlert);
						}else{
							
							echo "<br>";
							echo "ERROR: ". $mail->ErrorInfo;
						}
						//************************END-> SEND MAIL TO USER***********************
			}
			
	}catch (Exception $e) {
	  echo $e->faultstring;
	}
 ?>