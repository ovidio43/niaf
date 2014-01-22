<?php 
		$para = $email_address;//SEND TO NEW MEMBERSHIP
		$cabeceras = "MIME-Version: 1.0\r\n";
		$cabeceras .="Content-type: text/html; charset=iso-8859\r\n";
		$cabeceras .= "Form: $de \r\n";

		include_once("email/class.phpmailer.php");
		include_once("email/class.smtp.php");
		include_once("_SF_class.conexion.php");
		//************************SEND MAIL TO USER***************************
		$conexion = new BaseDatos();
		$conexion->conexion();

			$query = "SELECT * FROM emailconfig WHERE id = '2'";
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
		$mail->Body = $message;
		$mail->WordWrap = 50;
		$mail->MsgHTML($message);

		if($mail->Send())
		{
			$respuesta = "El mensaje ha sido enviado";
		}else{
			
			echo "<br>";
			echo "ERROR: ". $mail->ErrorInfo;
		}
		//************************END-> SEND MAIL TO USER***********************
 ?>