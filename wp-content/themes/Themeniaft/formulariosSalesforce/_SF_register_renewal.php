<?php 
		  session_start();
		  //PASSIING ID
		  $currentdate = date("Y-m-d");
		  $membersince = $currentdate;
		  $_SESSION['id'] = $id = $_POST['id'];
		  $_SESSION['Membership_Exp_Date__c'] = $Membership_Exp_Date__c = $_POST['Membership_Exp_Date__c'];
		  //PASSING VALUES OF COUNCIL MEMBERSHIP
		  $_SESSION['council'] = $council = $_POST['council'];
		  switch($council)
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
		  //PASSING VALUES OF PAYMENT METHOD multiplicar
		  $_SESSION['membership_term'] = $membership_term = $_POST['membership_term'];
		  $_SESSION['total_payment'] = $total_payment = $_POST['total_payment'];
		  $_SESSION['card_number'] = $card_number = $_POST['card_number'];
		  $_SESSION['expiration_month'] = $expiration_month = $_POST['expiration_month'];
		  $_SESSION['expiration_year'] = $expiration_year = $_POST['expiration_year'];
		  $_SESSION['p_first_name'] = $p_first_name = strtolower($_POST['p_first_name']);
		  $_SESSION['p_last_name'] = $p_last_name = strtolower($_POST['p_last_name']);;
		  $_SESSION['p_street'] = $p_street = strtolower($_POST['p_street']);
		  $_SESSION['p_city'] = $p_city = strtolower($_POST['p_city']);
		  $_SESSION['p_state'] = $p_state = $_POST['p_state'];
		  $_SESSION['p_country'] = $p_state = $_POST['p_country'];
		  $_SESSION['p_zip'] = $p_zip = $_POST['p_zip'];
		  $_SESSION['amount'] = $_SESSION['council'] * $_SESSION['membership_term'];
		  $_SESSION['exp_date'] = $_SESSION['expiration_month'].$_SESSION['expiration_year'];
		  //CONVERT TO TITLE CASE
		  $_SESSION['p_first_name'] = ucwords($_SESSION['p_first_name']);
		  $_SESSION['p_last_name'] = ucwords($_SESSION['p_last_name']);
		  $_SESSION['p_street'] = ucwords($_SESSION['p_street']);
		  $_SESSION['p_city'] = ucwords($_SESSION['p_city']);

		  //IDS FOR IDENTIFY TO USER
		$id_contact = $_POST['id_contact'];
		$id_account = $_POST['id_account'];
		//ORGANIZATION
		//$organization = $_POST['organization'];//COMPANY NAME
		//*****************UPDATE CONTACT INFORMATION********************
		$salutation = $_POST['salutation'];
		$first_name = strtolower($_POST['first_name']);
		$middle_name = strtolower($_POST['middle_name']);
		$last_name = strtolower($_POST['last_name']);
		$suffix = $_POST['suffix'];
		$nick_name = strtolower($_POST['nick_name']);
		$spouse_name = strtolower($_POST['spouse_name']);
		$title = strtolower($_POST['title']);
		$street = strtolower($_POST['street']);
		$city = strtolower($_POST['city']);
		$state = $_POST['state'];
		$country = $_POST['country'];
		$zip = $_POST['zip'];
		$home_telephone = $_POST['home_telephone'];
		$work_telephone = $_POST['work_telephone'];
		$fax = $_POST['fax'];
		$email_address = $_POST['email_address'];
		//CONVERT TO TITLE CASE
		$first_name = ucwords($first_name);
		$middle_name = ucwords($middle_name);
		$last_name = ucwords($last_name);
		$nick_name = ucwords($nick_name);
		$spouse_name = ucwords($spouse_name);
		$title = ucwords($title);
		$street = ucwords($street);
		$city = ucwords($city);
		//CONVERT STATE
		require '_SF_convert_state.php';
		$state2 = state2digits($state);
		//*****************UPDATE STATISTICAL INFORMATION*****************
		$year_of_birth = $_POST['year_of_birth'];
		$education_received = $_POST['education_received'];
		$household_income = $_POST['household_income'];	  
		  
		$Anti_Defamation_Image_Enhancement = $_POST['Anti_Defamation_Image_Enhancement'].";";
		$Public_Polcy_and_Government_Relations = $_POST['Public_Polcy_and_Government_Relations'].";";
		$Youth_and_Education = $_POST['Youth_and_Education'].";";
		$Scholarship_and_Grants = $_POST['Scholarship_and_Grants'].";";
		$Language_and_Culture = $_POST['Language_and_Culture'].";";
		$U_S_Italy_Relations = $_POST['U_S_Italy_Relations'].";";
		$Discrimination = $_POST['Discrimination'].";";
		$Mentoring_and_Leadership = $_POST['Mentoring_and_Leadership'].";";
		$Professional_Networking = $_POST['Professional_Networking'].";";
		$Travel_Program = $_POST['Travel_Program'].";";
		$Other = $_POST['Other'].";";  
		  
		$interestCategories = $Anti_Defamation_Image_Enhancement.
							  $Public_Polcy_and_Government_Relations.
							  $Youth_and_Education.
							  $Scholarship_and_Grants.
							  $Language_and_Culture.
							  $U_S_Italy_Relations.
							  $Discrimination.
							  $Mentoring_and_Leadership.
							  $Professional_Networking.
							  $Travel_Program.
							  $Other;
if($_POST['task2'] == 'SUBMIT')
	  {
		  	$post_url = "https://test.authorize.net/gateway/transact.dll";
			$post_values = array(
				"x_login"			=> "9deXHC55c86",
				"x_tran_key"		=> "9p6xUHUk53E4MY62",

				"x_version"			=> "3.1",
				"x_delim_data"		=> "TRUE",
				"x_delim_char"		=> "|",
				"x_relay_response"	=> "FALSE",

				"x_type"			=> "AUTH_CAPTURE",
				"x_method"			=> "CC",
				"x_card_num"		=> $_SESSION['card_number'],
				"x_exp_date"		=> $_SESSION['exp_date'],

				"x_amount"			=> $_SESSION['amount'],
				"x_description"		=> "Sample Transaction",//BY APPOINTMENT

				"x_first_name"		=> $_SESSION['p_first_name'],
				"x_last_name"		=> $_SESSION['p_last_name'],
				"x_address"			=> $_SESSION['p_street'],
				"x_city"			=> $_SESSION['p_city'],
				"x_state"			=> $_SESSION['p_state'],
				"x_country"			=> $_SESSION['p_country'],
				"x_zip"				=> $_SESSION['p_zip']
			);

			$post_string = "";
			foreach( $post_values as $key => $value )
				{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
			$post_string = rtrim( $post_string, "& " );
			$request = curl_init($post_url); // initiate curl object
				curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
				curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
				curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
				curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
				$post_response = curl_exec($request); // execute curl post and store results in $post_response
			curl_close ($request); // close curl object

			$response_array = explode($post_values["x_delim_char"],$post_response);
			
			if($response_array[3]=="This transaction has been approved.")
			{
		  				require_once '_SF_config.php';
						try {
						              require_once ('soapclient/SforcePartnerClient.php');

						              $mySforceConnection = new SforcePartnerClient();
						              $mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
						              $mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);

						              //CAMBIANDO EL VALOR DEL MEMBERSHIP TERM
									    switch ($_SESSION['membership_term'] ) {
									    	case 1:
									    		$Length_of_Membership = '1 year';
									    	break;
									    	case 2:
									    		$Length_of_Membership = '2 years';
									    	break;
									    	case 3:
									    		$Length_of_Membership = '3 years';
									    	break;
									    	case 4:
									    		$Length_of_Membership = '4 years';
									    	break;
									    	case 5:
									    		$Length_of_Membership = '5 years';
									    	break;
									    }
									  //CALCULANDO LA FECHA DE EXPIRACION DE LA MEMBRECIA
									    //Convertir en array la fecha para hacer
									    $Membership_Exp_Date__c = explode("-", $_SESSION['Membership_Exp_Date__c']);
									    $today = date("Y-m-d");
										//Calcular la diferencia entre fechas
									    $fechainicial = new DateTime($_SESSION['Membership_Exp_Date__c']);
										$fechafinal = new DateTime($today);
										$diferencia = $fechainicial->diff($fechafinal);
										$meses = ( $diferencia->y * 12 ) + $diferencia->m;

									    //Today = Expiration date -> today + one year FIRST REQUIREMENT
									    if($today == $_SESSION['Membership_Exp_Date__c'])
									    {
									    		$Membership_Exp_Date__c = explode("-", $today);
									    		$Membership_Exp_Date__c[0]+=$_SESSION['membership_term'];
									    //Today >= Expiration day  + 6 Meses -> Today + One Year SECOND REQUIREMENT
									    //La membresia ha culminado y le damos 6 meses para que la renueve
									    }elseif($today > $_SESSION['Membership_Exp_Date__c']) {
									    		if($meses<=6)
									    		{
									    			$Membership_Exp_Date__c[0]+=$_SESSION['membership_term'];
									    		}else{
										    		$Membership_Exp_Date__c = explode("-", $today);
										    		$Membership_Exp_Date__c[0]+=$_SESSION['membership_term'];
										    	}
									    //Today < Expiration day + 6 Meses -> Expiration + One Year THIRD REQUIREMENT
										//La membresia no ha culminado, pero se le sumara los anios a la fecha de expiracion
									    }elseif($today<$_SESSION['Membership_Exp_Date__c'])
									    {
									    		$Membership_Exp_Date__c[0]+=$_SESSION['membership_term'];
									    }
									    $Membership_Exp_Date__c = implode("-", $Membership_Exp_Date__c);

									  $UPDATEOBJECTID1 = $_SESSION['id'];
									  $fieldsToUpdate = array (
									  'Membership_Classification__c'=>$_SESSION['councilACRONYMS'],
									  'Length_of_Membership__c' => $Length_of_Membership,
									  'Membership_Exp_Date__c' => $Membership_Exp_Date__c
									  );
									  $sObject1 = new SObject();
									  $sObject1->fields = $fieldsToUpdate;
									  $sObject1->type = 'Contact';
									  $sObject1->Id = $UPDATEOBJECTID1;


									  $response = $mySforceConnection->update(array ($sObject1));

								      require_once("_SF_enviar_mail_renewal.php");//SEND A MAIL OF WELCOME
								      require_once("_SF_enviar_mail_admin_renewal.php");//SEND MAIL TO ADMIN1 AND ADMIN2
									  
								      //////////////UPDATE CONTACT INFORMATIONS///////////////////////
								        $UPDATEOBJECTID2 = $id_contact;
									    $fieldsToUpdate2 = array (
									    						'salutation' => $salutation,
															    'FirstName' => $first_name,  
															    'Middle_Initial__c' => $middle_name, 
															    'LastName' => $last_name,   
															    'Suffix__c' => $suffix, 
															    'Nickname__c' => $nick_name,  
															    'Spouse_First_Name__c' => $spouse_name, 
															    'Title' => $title,    
															    'MailingStreet' => $street,
															    'MailingCity' => $city,
															    'MailingState' => $state2,
															    'MailingCountry' => $country,
															    'MailingPostalCode' => $zip,
															    'HomePhone' => $home_telephone,   
															    'Phone' => $work_telephone,
															    'Fax' => $fax,      
															    //'Email' => $email_address,

															    'Birth_Year__c'=>$year_of_birth,
															    'Degree__c' => $education_received,
															    'Income__c'=> $household_income,
															    'Interests__c'=> $interestCategories
															  );
										$sObject2 = new SObject();
										$sObject2->fields = $fieldsToUpdate2;
										$sObject2->type = 'Contact';
										$sObject2->Id = $UPDATEOBJECTID2;
										$response = $mySforceConnection->update(array ($sObject2));
										require_once("_register_renewal.php");//REGISTER TO DATA IN THE BD innvervel_niafmemb
									session_destroy();
								    $typeAlert=3;
									echo "
										 <script type='text/javascript'>
										 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
										 </script>
										";
					}catch (Exception $e) {
					  $typeAlert=5;
					  echo "
							 <script type='text/javascript'>
							 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
							 </script>
							";
					}
			}else{
				$typeAlert=2;
				echo "
					 <script type='text/javascript'>
					 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
					 </script>
					";
			}
	  	}
 ?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
</head>
</html>