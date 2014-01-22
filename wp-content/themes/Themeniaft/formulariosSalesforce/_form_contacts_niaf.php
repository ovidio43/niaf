<?php 

	session_start();



		$typeAlert = $_GET['alertType'];

		if(isset($typeAlert))

		{

			if($typeAlert == 0)

			{

				$ejecutarAlerta =  'onLoad="error()"';

			}elseif($typeAlert == 1)

			{

				$ejecutarAlerta =  'onLoad="congratulations()"';

			}elseif($typeAlert == 2)

			{

				$ejecutarAlerta =  'onLoad="declined()"';

			}elseif($typeAlert == 3)

			{

				$ejecutarAlerta =  'onLoad="renewal()"';

			}

			elseif($typeAlert == 4)

			{

				$ejecutarAlerta =  'onLoad="update()"';

			}

			elseif($typeAlert == 5)

			{

				$ejecutarAlerta =  'onLoad="errorSalesForce()"';

			}

			elseif($typeAlert == 6)

			{

				$ejecutarAlerta =  'onLoad="duplicateEmail()"';

			}

		}

?>

<html>

<head>

	<!-- CONFIGURACION PARA LA IMAGEN-->

	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />

	<!-- END CONFIGURACION PARA LA IMAGEN-->

	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />

	<!--VALIDAR-->

	<script type="text/javascript" src="js/validar_contact_information.js"></script>

	<!-- FIN VALIDAR-->	

	<script>

		function ver()

		{

			document.getElementById("tabla1").style.display ="";

			document.getElementById("tabla2").style.display ="";

			document.getElementById("tabla3").style.display ="none";

		}

		function cerrar()

		{

			document.getElementById("tabla1").style.display ="none";

			document.getElementById("tabla2").style.display ="none";

			document.getElementById("tabla3").style.display ="";

		}

	</script>

	<!-- ALERT -->

    	<script type="text/javascript" src="notification/lib/alertify.js"></script>

		<link rel="stylesheet" href="notification/themes/alertify.core.css" />

		<link rel="stylesheet" href="notification/themes/alertify.default.css" />

		<script>

			function error(){

				alert("The data entered is not valid."); 

				window.location.href='_form_contacts_niaf.php';

				return false; 

			}

			function congratulations(){

				alert("Congratulations your transaction was approved, and the data has been registered");

				window.location.href='_form_contacts_niaf.php'; 

				return false;

			}

			function declined(){

				alert("Transaction declined.");

				window.location.href='_form_contacts_niaf.php'; 

				return false;

			}

			function renewal(){

				alert("Congratulations your transaction was approved, and data has been updated successfully.");

				window.location.href='_form_contacts_niaf.php';

				return false;

			}

			function update(){ 

				alert("Contratulations your data are updated successfully.");

				window.location.href='_form_contacts_niaf.php';

				return false;

			}

			function errorSalesForce(){

				alert("An error occurred please try again later.");

				window.location.href='_form_contacts_niaf.php';

				return false;

			}

			function duplicateEmail(){

				alert("The email you have entered is already in use, please enter another email.");

				window.location.href='_form_contacts_niaf.php';

				return false;

			}

		</script>

	<!-- END ALERT -->

	<title>Form contact information</title>

</head>

<body <?php echo $ejecutarAlerta; ?>>

<img src="CSS3/contact.png" height="53">

<table>

				<tr>

					<th><input onClick="javascript:cerrar()" type="radio" checked="checked" name="new_membership">New Membership</th>

				</tr>

				<tr>

					<th><input onClick="javascript:ver()" type="radio" name="new_membership">Renewal</th>

				</tr>

</table>

<table id="tabla1" style="display:none">

	<tr class="renewaltext">

		<th class="renewaltext">

			To renew a current or expired NIAF membership, please enter your

			email address and password. We will load your membership information that

			we have on file. If you have forgotten your password, please click on the

			"Forgot your password" link and it will emailed to you.<br><br>



			Should you experience any problems, please contact our membership

			department for assistance at 202-387-0600. <br> <br>

		</th>

	</tr>

</table>

<table  id="tabla2" style="display:none">

				<form name="validar_form2" method="post" action="_SF_renewal.php">

				<tr colspan="2">

					<th>Email Address:</th>

					<td><input class="renewal" type="text" name="email" value="" onClick="value=''"></td>

					<td>&nbsp</td>

					<td>&nbsp</td>

					<td>&nbsp</td>

					<td rowspan="2"><input class="button large green" type="submit" value="Load"></td>

				</tr>

				<tr>

					<th>Password:</th>

					<td><input class="renewal" type="password" name="website_login" value="" onClick="value=''"></td>	

				</tr>

				</form>

</table>

<table id="tabla3">

				

				<!--<form method="post" action="_register_contacts_niaf.php">-->

			 	<form name="validar_form" method="post" action="_form_council_membership.php">

			 	<!--<form name="validar_form" method="post" action="_passing_values.php">-->

				<tr>

					<th><requerido>* </requerido>Salutation:</th>

					<td>

						<select class="text" name="salutation">

							<option>--SELECT--</option>

							<option>Atty.</option>

							<option>Capt.</option>

							<option>Cav.</option>

							<option>Col.</option>

							<option>Com.</option>

							<option>Deacon.</option>

							<option>Del.</option>

							<option>Dott.</option>

							<option>Dr.</option>

							<option>Fr.</option>

							<option>Gen.</option>

							<option>Hon.</option>

							<option>Judge</option>

							<option>Lt.</option>

							<option>Lt. Col.</option>

							<option>Lt. Comm.</option>

							<option>Maj. Gen.</option>

							<option>Maj.</option>

							<option>Mayor</option>

							<option>Mr.</option>

							<option>Mr. & Mrs.</option>

							<option>Mrs.</option>

							<option>Ms.</option>

							<option>Msgr.</option>

							<option>Prof.</option>

							<option>Rev.</option>

							<option>Rev. Msgr.</option>

							<option>Sen.</option>

							<option>Sgt.</option>

							<option>Sister</option>

						</select>

					</td>

				</tr>

				<tr>

					<th><requerido>* </requerido>First Name:</th>

					<td><input class="text" type="text" name="first_name" value=""></td>

				</tr> 

				<tr>

					<th>Middle Name(or Initial):</th>

					<td><input class="text" type="text" name="middle_name" value=""></td>

				</tr>

				<tr>

					<th><requerido>* </requerido>Last Name:</th>

					<td><input class="text" type="text" name="last_name" value=""></td>

				</tr>

				<tr>

					<th>Suffix - (if applicable):</th>

					<td>

						<select class="text" name="suffix">

							<option></option>

							<option>II</option>

							<option>III</option>

							<option>Esq</option>

							<option>Jr</option>

							<option>MD</option>

							<option>PhD</option>

							<option>Sr</option>

						</select>

					</td>

				</tr>

				<tr>

					<th>Nick Name:</th>

					<td><input class="text" type="text" name="nick_name" value=""></td>

				</tr>

				<tr>

					<th>Spouse Name - (if applicable):</th>

					<td><input class="text" type="text" name="spouse_name" value=""></td>

				</tr>

				<tr>

					<th>Organization:</th>

					<td><input class="text" type="text" name="organization"></td>

				</tr>

				<tr>

					<th>Title:</th>

					<td><input class="text" type="text" name="title"></td>

				</tr>

				<tr>

					<td><RC2><div id="checkboxOrganization">Check if this is a work address:</div></RC2></td>

					<td><input type="checkbox" name="checkOrganization" value="trueORG"></td>

				</tr>

				<tr>

					<th><requerido>* </requerido>Street:</th>

					<td><input class="text" type="text" name="street"></td>

				</tr>

				<tr>

					<th><requerido>* </requerido>City:</th>

					<td><input class="text" type="text" name="city"></td>

				</tr>

				<tr>

					<th><requerido>* </requerido>State:</th>

					<td>

						<select class="text" name="state">

							<option value="">--SELECT--</option>

							<option>Alabama</option>

							<option>Alaska</option>

							<option>Arizona</option>

							<option>Arkansas</option>

							<option>California</option>

							<option>Colorado</option>

							<option>Connecticut</option>

							<option>Delaware</option>

							<option>District of Columbia</option>

							<option>Florida</option>

							<option>Georgia</option>

							<option>Hawaii</option>

							<option>Idaho</option>

							<option>Illinois</option>

							<option>Indiana</option>

							<option>Lowa</option>

							<option>Kansas</option>

							<option>Kentucky</option>

							<option>Lousiana</option>

							<option>Maine</option>

							<option>Marshall Islands</option>

							<option>Maryland</option>

							<option>Massachusetts</option>

							<option>Michigan</option>

							<option>Minnesota</option>

							<option>Mississippi</option>

							<option>Missouri</option>

							<option>Montana</option>

							<option>Nebraska</option>

							<option>Nevada</option>

							<option>New Hampshire</option>

							<option>New Jersey</option>

							<option>New Mexico</option>

							<option>New York</option>

							<option>North Carolina</option>

							<option>North Dakota</option>

							<option>Ohio</option>

							<option>Oklahoma</option>

							<option>Oregon</option>

							<option>Pennsylvania</option>

							<option>Rhode Island</option>

							<option>South Carolina</option>

							<option>South Dakota</option>

							<option>Tennessee</option>

							<option>Texas</option>

							<option>Utah</option>

							<option>Vermont</option>

							<option>Virginia</option>

							<option>Washintong</option>

							<option>West Virginia</option>

							<option>Wisconsin</option>

							<option>Wyoming</option>

						</select>

					</td>

				</tr>

				<tr>

					<th><requerido>* </requerido>Country:</th>

					<td>

						<select class="text" name="country">

							<option>Argentina</option>

							<option>Australia</option>

							<option>Austria</option>

							<option>Belgium</option>

							<option>Bermuda</option>

							<option>Canada</option>

							<option>Denmark</option>

							<option>England</option>

							<option>Finland</option>

							<option>Germany</option>

							<option>Greece</option>

							<option>Hungary</option>

							<option>Ireland</option>

							<option>Italy</option>

							<option>Monaco</option>

							<option>Netherlands</option>

							<option>Poland</option>

							<option>Portugal</option>

							<option>Spain</option>

							<option>Sweden</option>

							<option>Switzerland</option>

							<option selected>USA</option>

						</select>

					</td>

				</tr>

				<tr>

					<th><requerido>* </requerido>Zip:</th>

					<td><input class="text" type="text" name="zip"></td>

				</tr>

				<tr>

					<th>Home Telephone:</th>

					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="home_telephone"></td>

				</tr>

				<tr>

					<th>Work Telephone:</th>

					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="work_telephone"></td>

				</tr>

				<tr>

					<th>Fax:</th>

					<td><input class="text" type="text" onKeyPress="return validarPhone(event)" name="fax"></td>

				</tr>

				<tr>

					<th><requerido>* </requerido>E-mail Address:</th>

					<td><input class="text" type="text" name="email_address" value=""></td>

				</tr>

				<tr>

					<th>

						<input type="hidden" name="task" value="Tcontact">

						<input class="button large green" type="button" value="NEXT" onClick="validar()">

					</th>

				</tr>

			</form>

	</table>

</body>

</html>