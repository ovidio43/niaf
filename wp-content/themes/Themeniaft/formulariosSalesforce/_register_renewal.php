<?php 
	include_once("_SF_class.conexion.php");
	$conexion = new BaseDatos();
	$conexion->conexion();

	$insertRenewal = "INSERT INTO renewal VALUES(
					  ' ',
					  '".$salutation."',
					  '".$first_name."',
					  '".$middle_name."',
					  '".$last_name."',
					  '".$suffix."',
					  '".$nick_name."',
					  '".$spouse_name."',
					  '".$title."',
					  '".$street."',
					  '".$city."',
					  '".$state."',
					  '".$country."',
					  '".$zip."',
					  '".$home_telephone."',
					  '".$work_telephone."',
					  '".$fax."',

					  '".$council."',

					  '".$year_of_birth."',
					  '".$education_received."',
					  '".$household_income."',
					  '".$interestCategories."',

					  '".$membership_term."',
					  '".$amount."',
					  '".$p_first_name."',
					  '".$p_last_name."',
					  '".$p_street."',
					  '".$p_state."',
					  '".$p_city ."',
					  '".$p_zip ."',
					  '".$membersince."',
					  '".$Membership_Exp_Date__c."',
					  CURRENT_TIMESTAMP
		)";
		mysql_query($insertRenewal);

 ?>