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
			}elseif($typeAlert == 2)
			{
				$ejecutarAlerta =  'onLoad="error2()"';
			}
		}
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_change_password.js"></script>
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
				alert("Your password was successfully changed."); 
				return false;
			}
			function error2(){
				alert("The password you entered is incorrect!!"); 
				return false; 
			}
		</script>
	<!-- END ALERT -->
	<title>Form email address</title>
</head>
<body <?php echo $ejecutarAlerta; ?>>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_SF_register_new_password.php">
				<tr>
                    <img src="CSS3/change_password.png" height="53">
				</tr>
				<tr>
					<th><requerido>* </requerido>Enter your email Address: </th>
				</tr>	
				<tr>
					<th><input class="text" type="text" name="email_address"></th>
				</tr>
				<tr>
					<th><requerido>* </requerido>Current password: </th>
				</tr>	
				<tr>
					<th><input class="text" type="password" name="current_password"></th>
				</tr>
				<tr>
					<th><requerido>* </requerido>New password: </th>
				</tr>	
				<tr>
					<th><input class="text" type="password" name="new_password"></th>
				</tr>
				<tr>
					<th><requerido>* </requerido>Repeat new password: </th>
				</tr>	
				<tr>
					<th><input class="text" type="password" name="repeat_password"></th>
				</tr>
				<tr>
					<th><input class="button large green" type="button" value="SEND AND CHANGE PASSWORD" onclick="validar()"></th>
				</tr>
			</form>
	</table>
	</fieldset>
</body>
</html>