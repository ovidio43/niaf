<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />

	<title></title>
</head>
<body>
	<tituloniaf>Log in to NIAF</tituloniaf>
	<hr>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_SF_validation_user.php">
				<tr>
					<th>E-mail: </th>
					<td><input class="text" type="text" name="email"></td>
				</tr>
				<tr>
					<th>Website Login: </th>
					<td><input class="text" type="password" name="website_login"></td>
				</tr>
				<tr>
					<th></th>
				<td>
					<input class="button large blue" type="submit" value="Enter">
					<input class="button large blue" type="reset" value="Reset">
				</td>
				</tr>	
				<tr>
					<th></th>
				</tr>	
			</form>
	</table>
	</fieldset>
</body>
</html>