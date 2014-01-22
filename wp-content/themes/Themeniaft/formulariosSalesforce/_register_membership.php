<?php 
	include_once("_SF_class.conexion.php");
	$conexion = new BaseDatos();
	$conexion->conexion();

	$queryCONTACTS = "INSERT INTO membership VALUES(
					  ' ',
					  '".$_SESSION['salutation']."',
					  '".$_SESSION['first_name']."',
					  '".$_SESSION['middle_name']."',
					  '".$_SESSION['last_name']."',
					  '".$_SESSION['suffix']."',
					  '".$_SESSION['nick_name']."',
					  '".$_SESSION['spouse_name']."',
					  '".$idcompany."',
					  '".$_SESSION['title']."',
					  '".$_SESSION['street']."',
					  '".$_SESSION['city']."',
					  '".$_SESSION['state']."',
					  '".$_SESSION['country']."',
					  '".$_SESSION['zip']."',
					  '".$_SESSION['home_telephone']."',
					  '".$_SESSION['work_telephone']."',
					  '".$_SESSION['fax']."',
					  '".$_SESSION['email_address']."',

					  '".$_SESSION['council']."',

					  '".$_SESSION['year_of_birth']."',
					  '".$_SESSION['education_received']."',
					  '".$_SESSION['household_income']."',
					  '".$_SESSION['interestCategories']."',

					  '".$_SESSION['membership_term']."',
					  '".$_SESSION['amount']."',
					  '".$_SESSION['p_first_name']."',
					  '".$_SESSION['p_last_name']."',
					  '".$_SESSION['p_street']."',
					  '".$_SESSION['p_state']."',
					  '".$_SESSION['p_city'] ."',
					  '".$_SESSION['p_zip'] ."',
					  '".$_SESSION['membersince']."',
					  '".$membership_exp_date."',
					  CURRENT_TIMESTAMP
		)";
		mysql_query($queryCONTACTS);

 ?>