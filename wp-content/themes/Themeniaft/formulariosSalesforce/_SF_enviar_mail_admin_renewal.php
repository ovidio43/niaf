<?php 
		$cabeceras = "MIME-Version: 1.0\r\n";
		$cabeceras .="Content-type: text/html; charset=iso-8859\r\n";
		$cabeceras .= "Form: $de \r\n";

		include_once("email/class.phpmailer.php");
		include_once("email/class.smtp.php");
		include_once("_SF_class.conexion.php");
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
$datosMESSAGE = $datosSTYLE."<h1>RENEWAL USER</h1><br>";
$datosMESSAGE.= "<h2>Contact information: </h2>"."<br>";
$datosMESSAGE.= "<strong>Salutation: </strong>".$salutation."<br>";
$datosMESSAGE.= "<strong>First Name: </strong>".$first_name."<br>";
$datosMESSAGE.= "<strong>Last Name: </strong>".$last_name."<br>";
$datosMESSAGE.= "<strong>Street: </strong>".$street."<br>";
$datosMESSAGE.= "<strong>City: </strong>".$city."<br>";
$datosMESSAGE.= "<strong>State: </strong>".$state."<br>";
$datosMESSAGE.= "<strong>Country: </strong>".$country."<br>";
$datosMESSAGE.= "<strong>Zip: </strong>".$zip."<br>";
$datosMESSAGE.= "<strong>Email: </strong>".$email_address."<br>";

$datosMESSAGE.= "<h2>Your Council Membership: </h2>"."<br>";
$datosMESSAGE.= "<strong>Council: </strong>".$_SESSION['council']."<br>";

$datosMESSAGE.= "<h2>Payment Method: </h2>"."<br>";
$datosMESSAGE.= "<strong>Membership Term: </strong>".$_SESSION['membership_term']."<br>";
$datosMESSAGE.= "<strong>Total Payment: </strong>".$_SESSION['amount']."<br>";


		//************************END PREPARE TO DATA FOR SEND****************
		//************************SEND MAIL TO USER***************************
		$conexion = new BaseDatos();
		$conexion->conexion();

			$query = "SELECT * FROM emailconfigadmin WHERE id = '2'";
			$datos = mysql_query ($query);

			$host = mysql_result($datos,0,"host_NF");
			$port = mysql_result($datos,0,"port_NF");
			$from = mysql_result($datos,0,"from_NF");
			$from_name = mysql_result($datos,0,"from_name_NF");
			$to1 = mysql_result($datos,0,"to1_NF");
			$to2 = mysql_result($datos,0,"to2_NF");
			$user = mysql_result($datos,0,"user_NF");
			$pass = mysql_result($datos,0,"pass_NF");
			$pass = base64_decode($pass);
			$subject = mysql_result($datos,0,"subject_NF");

		$mail = new phpmailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = $host;
		$mail->Port = $port;
		$mail->From = $from; 
		$mail->FromName = $from_name;
		$mail->AddAddress($to1);
		$mail->Username = $user;
		$mail->Password = $pass;
		$mail->Subject = $subject;
		$mail->Body = $datosMESSAGE;
		$mail->WordWrap = 50;
		$mail->MsgHTML($datosMESSAGE);


		if($mail->Send())
		{
			$mail2 = new phpmailer();
			$mail2->IsSMTP();
			$mail2->SMTPAuth = true;
			$mail2->SMTPSecure = "ssl";
			$mail2->Host = $host;
			$mail2->Port = $port;
			$mail2->From = $from; 
			$mail2->FromName = $from_name;
			$mail2->AddAddress($to2);
			$mail2->Username = $user;
			$mail2->Password = $pass;
			$mail2->Subject = $subject;
			$mail2->Body = $datosMESSAGE;
			$mail2->WordWrap = 50;
			$mail2->MsgHTML($datosMESSAGE);
			if($mail2->Send())
			{
				$respuesta = "El mensaje ha sido enviado";
			}else{
			
			echo "<br>";
			echo "ERROR: ". $mail->ErrorInfo;
			}
		}else{
			
			echo "<br>";
			echo "ERROR: ". $mail->ErrorInfo;
		}
		//************************END-> SEND MAIL TO USER***********************
 ?>