<?php 
	session_start();
	  if ($_POST['task']=='Tcontact') {
		  $currentdate = date("Y-m-d");
		  $_SESSION['membersince'] = $currentdate;
		  //PASSING VALUES OF CONTACTS INFORMATION
		  $_SESSION['salutation'] = $salutation = $_POST['salutation'];
		  $_SESSION['first_name'] = $first_name = strtolower($_POST['first_name']);
		  $_SESSION['middle_name'] = $middle_name = strtolower($_POST['middle_name']);
		  $_SESSION['last_name'] = $last_name = strtolower($_POST['last_name']);
		  $_SESSION['suffix'] = $suffix = $_POST['suffix'];
		  $_SESSION['nick_name'] = $nick_name = strtolower($_POST['nick_name']);
		  $_SESSION['spouse_name'] = $spouse_name = strtolower($_POST['spouse_name']);
		  $_SESSION['organization'] = $organization = $_POST['organization'];//COMPANY NAME
		  $_SESSION['title'] = $title = strtolower($_POST['title']);
		  $_SESSION['checkOrganization'] = $checkOrganization = $_POST['checkOrganization'];
		  $_SESSION['street'] = $street = strtolower($_POST['street']);
		  $_SESSION['city'] = $city = strtolower($_POST['city']);
		  $_SESSION['state'] = $state = $_POST['state'];
		  $_SESSION['country'] = $_POST['country'];
		  $_SESSION['zip'] = $zip = $_POST['zip'];
		  $_SESSION['home_telephone'] = $home_telephone = $_POST['home_telephone'];
		  $_SESSION['work_telephone'] = $work_telephone = $_POST['work_telephone'];
		  $_SESSION['fax'] = $fax = $_POST['fax'];
		  $_SESSION['email_address'] = $email_address = $_POST['email_address'];
		  //CONVERT TO TITLE CASE
		  $_SESSION['first_name'] = ucwords($_SESSION['first_name']);
		  $_SESSION['middle_name'] = ucwords($_SESSION['middle_name']);
		  $_SESSION['last_name'] = ucwords($_SESSION['last_name']);
		  $_SESSION['nick_name'] = ucwords($_SESSION['nick_name']);
		  $_SESSION['spouse_name'] = ucwords($_SESSION['spouse_name']);
		  $_SESSION['title'] = ucwords($_SESSION['title']);
		  $_SESSION['street'] = ucwords($_SESSION['street']);
		  $_SESSION['city'] = ucwords($_SESSION['city']);
	  }elseif ($_POST['task'] == 'Tcouncil') {
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
	  }elseif ($_POST['task'] == 'Tstatistical') {
	  	  //PASSING VALUES OF STATISTICAL INFORMATION
		  $_SESSION['year_of_birth'] = $year_of_birth = $_POST['year_of_birth'];
		  $_SESSION['education_received'] = $education_received = stripslashes($_POST['education_received']);
		  $_SESSION['household_income'] = $household_income = $_POST['household_income'];	  
		  
		  $_SESSION['Anti_Defamation_Image_Enhancement'] = $Anti_Defamation_Image_Enhancement = $_POST['Anti_Defamation_Image_Enhancement'].";";
		  $_SESSION['Public_Polcy_and_Government_Relations'] = $Public_Polcy_and_Government_Relations = $_POST['Public_Polcy_and_Government_Relations'].";";
		  $_SESSION['Youth_and_Education'] = $Youth_and_Education = $_POST['Youth_and_Education'].";";
		  $_SESSION['Scholarship_and_Grants'] = $Scholarship_and_Grants = $_POST['Scholarship_and_Grants'].";";
		  $_SESSION['Language_and_Culture'] = $Language_and_Culture = $_POST['Language_and_Culture'].";";
		  $_SESSION['U_S_Italy_Relations'] = $U_S_Italy_Relations = $_POST['U_S_Italy_Relations'].";";
		  $_SESSION['Discrimination'] = $Discrimination = $_POST['Discrimination'].";";
		  $_SESSION['Mentoring_and_Leadership'] = $Mentoring_and_Leadership = $_POST['Mentoring_and_Leadership'].";";
		  $_SESSION['Professional_Networking'] = $Professional_Networking = $_POST['Professional_Networking'].";";
		  $_SESSION['Travel_Program'] = $Travel_Program = $_POST['Travel_Program'].";";
		  $_SESSION['Other'] = $Other = $_POST['Other'].";";  
		  
		  $_SESSION['interestCategories'] = $interestCategories = $_SESSION['Anti_Defamation_Image_Enhancement'].
																  $_SESSION['Public_Polcy_and_Government_Relations'].
																  $_SESSION['Youth_and_Education'].
																  $_SESSION['Scholarship_and_Grants'].
																  $_SESSION['Language_and_Culture'].
																  $_SESSION['U_S_Italy_Relations'].
																  $_SESSION['Discrimination'].
																  $_SESSION['Mentoring_and_Leadership'].
																  $_SESSION['Professional_Networking'].
																  $_SESSION['Travel_Program'].
																  $_SESSION['Other'];
	  }elseif ($_POST['task'] == 'Tpayment') {
	  	  //PASSING VALUES OF PAYMENT METHOD multiplicar
		  $_SESSION['membership_term'] = $membership_term = $_POST['membership_term'];
		  $_SESSION['total_payment'] = $total_payment = $_POST['total_payment'];
		  $_SESSION['payment_method'] = $payment_method = $_POST['payment_method'];
		  //$_SESSION['card_type'] = $card_type = $_POST['card_type'];
		  $_SESSION['card_number'] = $card_number = $_POST['card_number'];
		  $_SESSION['expiration_month'] = $expiration_month = $_POST['expiration_month'];
		  $_SESSION['expiration_year'] = $expiration_year = $_POST['expiration_year'];
		  $_SESSION['p_first_name'] = $p_first_name = strtolower($_POST['p_first_name']);
		  $_SESSION['p_last_name'] = $p_last_name = strtolower($_POST['p_last_name']);
		  $_SESSION['p_street'] = $p_street = strtolower($_POST['p_street']);
		  $_SESSION['p_city'] = $p_city = strtolower($_POST['p_city']);
		  $_SESSION['p_state'] = $p_state = $_POST['p_state'];
		  $_SESSION['p_country'] = $p_country = $_POST['p_country'];
		  $_SESSION['p_zip'] = $p_zip = $_POST['p_zip'];
		  $_SESSION['amount'] = $_SESSION['council'] * $_SESSION['membership_term'];
		  $_SESSION['exp_date'] = $_SESSION['expiration_month'].$_SESSION['expiration_year'];
		  //CONVERT TO TITLE CASE
		  $_SESSION['p_first_name'] = ucwords($_SESSION['p_first_name']);
		  $_SESSION['p_last_name'] = ucwords($_SESSION['p_last_name']);
		  $_SESSION['p_street'] = ucwords($_SESSION['p_street']);
		  $_SESSION['p_city'] = ucwords($_SESSION['p_city']);
	  }

	  if($_POST['task2'] == 'SUBMIT')
	  {
		  	$post_url = "https://test.authorize.net/gateway/transact.dll";
			$post_values = array(
				//"x_login"			=> "4C8X6ueE64u",
				//"x_tran_key"		=> "523ZLWbf92FEDj2p",
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

			//TRANSACTION DATA
			$cardType = $response_array[51];
			$authorizationCode = $response_array[4];
			$transactionId = $response_array[6];
			
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
					    $anioderegistro = date('Y');
					    $aniodeexpiracion = $anioderegistro + $_SESSION['membership_term'];
					    $membership_exp_date = date($aniodeexpiracion.'-m-d');
					    //PASSWORD POR DEFAULT
					    $passwordDefault = $_SESSION['first_name'].$_SESSION['last_name'];
					   	//REMOVING TO IDCOMPANYNAME
					   	require '_SF_company_name.php'; 
					   	//REMOVING TO STATE
					   	require '_SF_convert_state.php';
					   	$_SESSION['state2'] = state2digits($_SESSION['state']);
					    $fields = array (
					      //DATOS PARA REGISTRAR DE EL PRIMER FORMULARIO _form_contacts_niaf.php
					      'salutation' => $_SESSION['salutation'], //DONE
					      'FirstName' => $_SESSION['first_name'],  //DONE
					      'Middle_Initial__c' => $_SESSION['middle_name'], //DONE
					      'LastName' => $_SESSION['last_name'],   //DONE
					      'Suffix__c' => $_SESSION['suffix'], //DONE
					      'Nickname__c' => $_SESSION['nick_name'],  //DONE
					      'Spouse_First_Name__c' => $_SESSION['spouse_name'], //DONE
					      //'Organization__c' => $organization,   AccountId
					      'AccountId' => $idcompany,
					      'Title' => $_SESSION['title'],    //DONE
					      // 'Street__c' => $street,Current_Mailing_Street__c
					      'MailingStreet' => $_SESSION['street'],
					      //'City__c' => $city, Current_Mailing_City__c
					      'MailingCity' => $_SESSION['city'],
					      //'state__c' => $state,Current_Mailing_State__c
					      'MailingState' => $_SESSION['state2'],
					      //'country__c' => $country,Current_Mailing_Country__c
					      'MailingCountry' => $_SESSION['country'],
					      //'Zip__c' => $zip,Current_Mailing_Zip__c
					      'MailingPostalCode' => $_SESSION['zip'],
					      'HomePhone' => $_SESSION['home_telephone'],   //DONE
					      'Phone' => $_SESSION['work_telephone'],
					      'Member_Since__c' => $_SESSION['membersince'],
					      'Fax' => $_SESSION['fax'],      //DONE
					      'Email' => $_SESSION['email_address'],
						  //DATOS PARA REGISTRAR DEL SEGUNDO FORMULARIO
						  'Membership_Classification__c'=>$_SESSION['councilACRONYMS'],
						  // DATOS PARA REGISTRAR DEL TERCER FORMULARIO
						  'Birth_Year__c'=>$_SESSION['year_of_birth'],
						  'Degree__c' => $_SESSION['education_received'],
						  'Income__c'=> $_SESSION['household_income'],
						  'Interests__c'=> $_SESSION['interestCategories'],
						  //DATOS PARA REGISTRAR DEL CUARTO FORMULARIO
						  'Length_of_Membership__c' => $Length_of_Membership,
						  //REGISTRAR LA FECHA DE EXPIRACION DEL CONTACTO
						  'Membership_Exp_Date__c' => $membership_exp_date,
						  'Website_Login__c' => $passwordDefault
						  
					    );
					    $sObject = new SObject();
					    $sObject->fields = $fields;
					    $sObject->type = 'Contact';

					    $createResponse = $mySforceConnection->create(array($sObject));

					    $ids = array();
					    foreach ($createResponse as $createResult) {
					      array_push($ids, $createResult->id);
					    }
					    require_once("_SF_password_default.php");//SEND A MAIL OF WELCOME
					    //require_once("_SF_enviar_mail.php");//SEND A MAIL OF WELCOME
					    require_once("_SF_enviar_mail_admin.php");//SEND MAIL TO ADMIN1 AND ADMIN2
					    require_once("_register_membership.php");//REGISTER TO DATA IN THE BD innvervel_niafmemb
					    session_destroy(); //DESTROY SESSION AND DATA
					    //ENVIAR UN MENSAJE DE FELICITACIONES Y VOLVER AL FORMULARIO INICIAL
						echo "
							 <script type='text/javascript'>
							 	window.location.href='_SF_congratulations.php';
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