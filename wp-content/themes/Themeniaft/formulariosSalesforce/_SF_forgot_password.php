<?php 
		$typeAlert = $_GET['alertType'];
		if(isset($typeAlert))
		{
			if($typeAlert == 0)
			{
				$ejecutarAlerta =  'onLoad="error()"';
			}elseif($typeAlert == 1)
			{
				$ejecutarAlerta =  'onLoad="ok()"';
			}
		}
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_forgot_password.js"></script>
	<!-- FIN VALIDAR-->
	<!-- ALERT -->
    	<script type="text/javascript" src="notification/lib/alertify.js"></script>
		<link rel="stylesheet" href="notification/themes/alertify.core.css" />
		<link rel="stylesheet" href="notification/themes/alertify.default.css" />
		<script>
			function error(){
				alert("The email address you entered does not exist!!"); 
				return false; 
			}
			function ok(){
				alert("Congratulations your password has been sent correctly."); 
				return false;
			}
		</script>
	<!-- END ALERT -->
	<title>Form email address</title>
</head>
<body <?php echo $ejecutarAlerta; ?>>
	<tituloniaf>NIAF</tituloniaf>
	<hr>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_SF_send_password.php">
				<tr>
                    <img src="CSS3/forgot.png" height="53">
				</tr>
				<tr>
					<tx>If you have Forgot Your Password?</tx>
				</tr>
				<tr>
					<th><requerido>* </requerido>Enter your email Address: </th>
				</tr>	
				<tr>
					<th><input class="text" type="text" name="email_address"></th>
				</tr>
				<tr>
					<th><input class="button large green" type="button" value="SEND" onclick="validar()"></th>
				</tr>
			</form>
	</table>
	</fieldset>
</body>
</html>