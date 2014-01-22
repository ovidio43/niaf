<?php 
		$typeAlert = $_GET['alertType'];
		if(isset($typeAlert))
		{
			if($typeAlert == 0)
			{
				$ejecutarAlerta =  'onLoad="error()"';
			}elseif($typeAlert == 1)
			{
				$ejecutarAlerta =  'onLoad="errorSalesForce()"';
			}elseif($typeAlert == 2)
			{
				$ejecutarAlerta =  'onLoad="update()"';
			}
		}
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!-- ALERT -->
		<script>
			function error(){
				alert("The data entered is not valid.");
				window.location.href='_SF_form_update.php'; 
				return false; 
			}
			function errorSalesForce(){
				alert("An error occurred please try again later."); 
				window.location.href='_SF_form_update.php';
				return false;
			}
			function update(){
				alert("Congratulations your data are updated successfully."); 
				window.location.href='_SF_form_update.php';
				return false;
			}
		</script>
	<!-- END ALERT -->
	<title></title>
</head>
<body <?php echo $ejecutarAlerta; ?>>
	<tituloniaf>UPDATE NIAF</tituloniaf>
	<hr>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_SF_updating_data.php">
				<tr>
					<form name="validar_form2" method="post" action="_SF_renewal.php">
					<th>
						Username:
						<input class="renewal" type="text" name="email" value="" onClick="value=''">
					</th>
					<th>
						Password:
						<input class="renewal" type="password" name="website_login" value="" onClick="value=''">
						<input type="hidden" name="task3" value="LOAD3">	
					</th>
					<td><input class="button small green" type="submit" value="Load"></td>
					</form>
				</tr>	
			</form>
	</table>
	</fieldset>
</body>
</html>