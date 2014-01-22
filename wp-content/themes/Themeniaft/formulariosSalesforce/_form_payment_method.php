<?php 
	session_start();
?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<!--VALIDAR-->
	<script type="text/javascript" src="js/validar_payment_method.js"></script>
	<!-- FIN VALIDAR-->	
	<title>Form Payment Method</title>
</head>
<body>
<img src="CSS3/payment_method.png" height="53">
<table>
				<tr>
					<th>
						For your convenience, members may select to prepay their membership for multiple years
					</th>
				</tr>
</table>
<table>

			<form name="validar_form" method="post" action="_passing_values.php">
			<?php  
			 	require '_passing_values.php';
			 ?>
			 			<?php 
			 				$councilPM = $_SESSION['council'];
							echo "<script>
									function calcular()
									{
										validar_form.total_payment.value = validar_form.membership_term.value * $councilPM ;
									}
								  </script";
							$totalPayment = $_SESSION['council'] * 2;
						 ?>
				<tr>
					<th>Membership term<requerido>*</requerido></th>
					<td>
						<select class="text" onchange="calcular()" name="membership_term">
							<option value="1">1 Year</option>
							<option value="2" selected>2 Years</option>
							<option value="3">3 Years</option>
							<option value="4">4 Years</option>
							<option value="5">5 Years</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Total Payment:</th>
					<td><input class="text" type="text" name="total_payment" value="<?php echo $totalPayment;?>" disabled="disabled"></td>
				</tr>
				<tr>
					<th>Payment Method:</th>
				</tr>
				<tr>
					<th>Card Number<requerido>*</requerido></th>
					<td><input class="text" type="text" value="4111111111111111" name="card_number"></td>
				</tr>
				<tr>
					<th>Expiration Month<requerido>*</requerido></th>
					<td>
						<select class="text" name="expiration_month">
							<option>--None--</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Expiration Year<requerido>*</requerido></th>
					<td>
						<select class="text" name="expiration_year">
							<option>--None--</option>
							<?php 
								$myYear = date("Y"); 
								for ($y=0; $y <8 ; $y++) { 
									echo "<option>".$myYear."</option>";
									$myYear +=1;
								}
							 ?>
						</select>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<th>
						<?php  
							$namePM = $_SESSION['first_name'];
							$last_namePM = $_SESSION['last_name'];
							$streetPM = $_SESSION['street'];
							$cityPM = $_SESSION['city'];
							$statePM = $_SESSION['state'];
							$countryPM = $_SESSION['country'];
							$zipPM = $_SESSION['zip'];
							echo "<script type='text/javascript'>
									function llenardatos()
									{
										if (document.validar_form.check_this_box.checked)
										{ 
										  validar_form.p_first_name.value = '$namePM';
										  validar_form.p_last_name.value = '$last_namePM';
										  validar_form.p_street.value = '$streetPM';
										  validar_form.p_city.value = '$cityPM';
										  validar_form.p_state.value = '$statePM';
										  validar_form.p_country.value = '$countryPM';
										  validar_form.p_zip.value = '$zipPM';
									    }else{ 
									      validar_form.p_first_name.value = '';
										  validar_form.p_last_name.value = '';
										  validar_form.p_street.value = '';
										  validar_form.p_city.value = '';
										  validar_form.p_state.selectedIndex=0;
										  validar_form.p_country.selectedIndex=0;
										  validar_form.p_zip.value = '';
										}
									}
								  </script>";
						?>
						<td><input type="checkbox" onclick="llenardatos()" name="check_this_box"><RC2>Check this box if the credit card billing address is the same as previously entered. If not, please complete the below</RC2></td>
					</th>
				</tr>
			</table>
			<table>
				<tr>
					<th>First Name<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_first_name"></td>
				</tr>
				<tr>
					<th>Last Name<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_last_name"></td>
				</tr>
				<tr>
					<th>Street<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_street"></td>
				</tr>
				<tr>
					<th>City<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_city"></td>
				</tr>
				<tr>
					<th>State<requerido>*</requerido></th>
					<td>
						<select class="text" name="p_state">
							<option value="">--None--</option>
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
					<th>Country<requerido>* </requerido></th>
					<td>
						<select class="text" name="p_country">
							<option>--None--</option>
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
							<option>USA</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Zip<requerido>*</requerido></th>
					<td><input class="text" type="text" name="p_zip"></td>
				</tr>
				<tr>
					<th>
						<input type="hidden" name="task" value="Tpayment">
						<input type="hidden" name="task2" value="SUBMIT">
						<input class="button large green" type="button" value="SUBMIT" onclick="validar()">
					</th>
				</tr>
			</form>
	</table>
</body>
</html>