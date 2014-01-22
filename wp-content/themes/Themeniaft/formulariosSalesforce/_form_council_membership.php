<?php 
	session_start();
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_council_membership.js"></script>
	<!-- FIN VALIDAR-->	
	<title>Form Council Membership</title>
    	<script type="text/javascript" src="notification/lib/alertify.js"></script>
		<link rel="stylesheet" href="notification/themes/alertify.core.css" />
		<link rel="stylesheet" href="notification/themes/alertify.default.css" />
		<script>
			function ok(){
				alertify.success("The data entered is valid."); 
				return false;
			}
		</script>
</head>
<body>
 <img src="CSS3/council_membership.png" height="53">
<table>

			<form name="validar_form_council" method="post" action="_form_statistical_information.php">
				<?php  
			 		require '_passing_values.php';
			 	?>
				<tr>
					<th><input type="radio" name="council" value="25">NIAF Student Membership - $25</th>
                </tr>
                <tr></tr><tr></tr><tr></tr><tr></tr>
                <tr>
					<th><input type="radio" name="council" value="50">NIAF Associate Membership - $50</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="125">NIAF Sustaining Membership - $125</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="250">NIAF Patron Membership - $250</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="500">NIAF Council Membership - $500</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="1000">NIAF Business Council Membership - $1,000</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="2500">Founder's Circle Membership - $2,500</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th><input type="radio" name="council" value="5000">Chairman's Circle Membership - $5,000</th>
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<th>
						<input type="hidden" name="task" value="Tcouncil">
						<input class="button large green" type="button" value="NEXT" onClick="validar(this)">
					</th>
				</tr>
			</form>
	</table>
</body>
</html>
<?php 
	include"_SF_class.controlSF.php";
	$emailVerify = new controlSF();
	$emailVerify->verifyEmail($_SESSION['email_address']);
?>