<?php 
		$para = $_SESSION['email_address'];//SEND TO NEW MEMBERSHIP
		$cabeceras = "MIME-Version: 1.0\r\n";
		$cabeceras .="Content-type: text/html; charset=iso-8859\r\n";
		$cabeceras .= "Form: $de \r\n";

		include_once("email/class.phpmailer.php");
		include_once("email/class.smtp.php");
		include_once("_SF_class.conexion.php");
		//************************SEND MAIL TO USER***************************
		$conexion = new BaseDatos();
		$conexion->conexion();

			$query = "SELECT * FROM emailconfig WHERE id = '1'";
			$datos = mysql_query ($query);

			$host = mysql_result($datos,0,"host_NF");
			$port = mysql_result($datos,0,"port_NF");
			$from = mysql_result($datos,0,"from_NF");
			$from_name = mysql_result($datos,0,"from_name_NF");
			$user = mysql_result($datos,0,"user_NF");
			$pass = mysql_result($datos,0,"pass_NF");
			$pass = base64_decode($pass);
			$subject = mysql_result($datos,0,"subject_NF");
			$title = mysql_result($datos,0,"title_NF");
			$message = mysql_result($datos,0,"message_NF");

			$datosSTYLE = "<style type='text/css'>
								h1 {
									color: #009;
									font-weight: bold;
									text-align: center;
								}
								h2 {
									color: #036;
									font-family: 'Arial Black', Gadget, sans-serif;
									font-size: 18px;
									text-align:center;
								}
								h3 {
									color: #000;
									font-family: 'arial,sans-serif!important';
									font-size: 16px;
								}
								</style>";

			$datosMESSAGE = $datosSTYLE;
			$datosMESSAGE.=	"<h2>".$title."</h2>"."<br>";
			$datosMESSAGE.=	"<h3>"."Dear ".$_SESSION['first_name']." ".$_SESSION['last_name']."</h3>"."<br>";
			$datosMESSAGE.=	"<h3>".$message."</h3>"."<br>";
			$datosMESSAGE.= "<strong>Your password is: </strong>".$passwordDefault."<br>";

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
			$respuesta = "El mensaje ha sido enviado";
		}else{
			
			echo "<br>";
			echo "ERROR: ". $mail->ErrorInfo;
		}
		//************************END-> SEND MAIL TO USER***********************
 ?>