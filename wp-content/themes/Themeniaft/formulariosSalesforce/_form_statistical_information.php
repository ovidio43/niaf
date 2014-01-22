<?php 
	session_start();
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_statistical_information.js"></script>
	<!-- FIN VALIDAR-->
	<title>Form Statistical Information</title>
	<?php
		if ($_POST['task'] == 'Tcouncil') {
			$_SESSION['councilparameter'] = $_POST['council'];
		}
		switch($_SESSION['councilparameter'])
	 	{
			case 25:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'STU';
				break;
			case 1000;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'BCM';
				break;
			case 50;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'AS';
				break;	
			case 2500;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'FCM';
				break;
			case 125;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NSM';
				break;
			case 5000:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'CCM';
				break;
			case 250:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NPM';
				break;
			case 500;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NCM';
				break;
	  	}
		echo "
			<script type='text/javascript' src='notification/lib/alertify.js'></script>
				<link rel='stylesheet' href='notification/themes/alertify.core.css' />
				<link rel='stylesheet' href='notification/themes/alertify.default.css' />
				<script>
					function selection(){
						alertify.success('$councilparameter'); 
						return false;
					}
			</script>
		";
	?>
</head>
<img src="CSS3/statistical_informatio.png" height="53">
<body>
	<tituloniaf>Join the NIAF</tituloniaf>
	<hr>
	<table>
		<tr>
			<td>
			<contenido>
			<titulo>Please Note:</titulo> In order to get a more accurate sense of the demographics of our members, where their interests lie, and through which avenues they've come to learn about the NIAF, we require that the following be completed. Please rest assured that the NIAF will not share this information with outside parties. This information is collected and used solely for in-house statistical purposes.
			<br><br>
			If you do not want to provide the following information, we kindly ask that you call 202-387-0600 and we can take your membership information over the phone.	
			</contenido>
			</td>
		</tr>
	</table>
	<table>
			<form name="validar_form_stadistical" method="post" action="_form_payment_method.php">
				<?php  
			 		require '_passing_values.php';
			 	?>
				<tr>
					<th>YEAR OF BIRTH<requerido>*</requerido></th>
					<?php 
						$anioActual = date('Y');
						$anioInicio = 1900;
						$anioAct = $anioActual + 1;
						echo "<td>
							  <select class='text' name='year_of_birth'>";
						for ($i=$anioInicio; $i <= $anioActual ; $i++) { 	
						$anioAct = $anioAct -1;
							echo "
								<option>".$anioAct."</option>
							";
						}
						echo "</select>
							  </td>";
					 ?>
				</tr>
				<tr>
					<th>HIGHEST LEVEL OF EDUCATION RECEIVED<requerido>*</requerido></th>
				</tr>
				<tr>
					<td><input type="radio" name="education_received" value="High School"><RC>High School</RC></td>
					<td><input type="radio" name="education_received" value="Graduates"><RC>Graduate</RC></td>
				</tr>
				<tr>
					<td><input type="radio" name="education_received" value="Associate Degree"><RC>Associate Degree</RC></td>
					<td><input type="radio" name="education_received" value="Doctorate"><RC>Doctorate</RC></td>
				</tr>
				<tr>
					<td><input type="radio" name="education_received" value="Bachelor's Degree"><RC>Bachelor's Degree</RC></td>
				</tr>
				<tr>
					<th>HOUSEHOLD INCOME<requerido>*</requerido></th>
				</tr>
				<tr>
					<td><input type="radio" name="household_income" value="$75,000 and below"><RC>$75,000 and below</RC></td>
				</tr>
				<tr>
					<td><input type="radio" name="household_income" value="$75,001 - $150,000"><RC>$75,001 - $150,000</RC></td>
				</tr>
				<tr>
					<td><input type="radio" name="household_income" value="$150,001 - $300,000"><RC>$150,001 - $300,000</RC></td>
				</tr>
				<tr>
					<td><input type="radio" name="household_income" value="$300,000 and above"><RC>$300,000 and above</RC></td>
				</tr>
				<tr>
					<th>INTEREST CATEGORIES</th>
				</tr>
				<tr>
					<td><input type="checkbox" name="Anti_Defamation_Image_Enhancement" value="Anti-Defamation/Image Enhancement"><RC>Anti-Defamation/Image Enhancement</RC></td>
					<td><input type="checkbox" name="Public_Polcy_and_Government_Relations" value="Public Polcy and Government Relations"><RC>Public Polcy and Government Relations</RC></td>
				</tr>	
				<tr>
					<td><input type="checkbox" name="Youth_and_Education" value="Youth and Education"><RC>Youth and Education</RC></td>
					<td><input type="checkbox" name="Scholarship_and_Grants" value="Scholarship and Grants"><RC>Scholarship and Grants</RC></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="Language_and_Culture" value="Language and Culture"><RC>Language and Culture</RC></td>
					<td><input type="checkbox" name="U_S_Italy_Relations" value="U.S./Italy Relations"><RC>U.S./Italy Relations</RC></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="Discrimination" value="Discrimination"><RC>Discrimination</RC></td>
					<td><input type="checkbox" name="Mentoring_and_Leadership" value="Mentoring and Leadership"><RC>Mentoring and Leadership</RC></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="Professional_Networking" value="Professional Networking"><RC>Professional Networking</RC></td>
					<td><input type="checkbox" name="Travel_Program" value="Travel Program"><RC>Travel Program</RC></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="Other" value="Other"><RC>Other</RC></td>
				</tr>
				<tr>
					<th>
						<input type="hidden" name="task" value="Tstatistical">
						<input class="button large green" type="button" value="NEXT"  onClick="validar(this)">
					</th>
				</tr>
			</form>
	</table>
</body>
</html>