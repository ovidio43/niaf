<?php 
	session_start();
	  if ($_POST['task']=='Tcontact') {
		  $currentdate = date("Y-m-d");
		  $_SESSION['membersince'] = $currentdate;
		  //PASSING VALUES OF CONTACTS INFORMATION
		  $_SESSION['salutation'] = $salutation = $_POST['salutation'];
		  $_SESSION['first_name'] = $first_name = $_POST['first_name'];
		  $_SESSION['middle_name'] = $middle_name = $_POST['middle_name'];
		  $_SESSION['last_name'] = $last_name = $_POST['last_name'];
		  $_SESSION['suffix'] = $suffix = $_POST['suffix'];
		  $_SESSION['nick_name'] = $nick_name = $_POST['nick_name'];
		  $_SESSION['spouse_name'] = $spouse_name = $_POST['spouse_name'];
		  $_SESSION['organization'] = $organization = $_POST['organization'];//COMPANY NAME
		  $_SESSION['title'] = $title = $_POST['title'];
		  $_SESSION['street'] = $street = $_POST['street'];
		  $_SESSION['city'] = $city = $_POST['city'];
		  $_SESSION['state'] = $state = $_POST['state'];
		  $_SESSION['country'] = $country = $_POST['country'];
		  $_SESSION['zip'] = $zip = $_POST['zip'];
		  $_SESSION['home_telephone'] = $home_telephone = $_POST['home_telephone'];
		  $_SESSION['work_telephone'] = $work_telephone = $_POST['work_telephone'];
		  $_SESSION['fax'] = $fax = $_POST['fax'];
		  $_SESSION['email_address'] = $email_address = $_POST['email_address'];
	  }elseif ($_POST['task'] == 'Tcouncil') {
	      //PASSING VALUES OF COUNCIL MEMBERSHIP
		  $_SESSION['council'] = $council = $_POST['council'];
		  switch($council)
		  {
			case 25:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NSM';
				break;
			case 1000;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'BCM';
				break;
			case 2500;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'FCM';
				break;
			case 5000:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'CCM';
				break;
			case 250:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NPM';
				break;
			case 10000:
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'MSM';
				break;
			case 500;
				$_SESSION['councilACRONYMS'] = $councilACRONYMS = 'NCM';
				break;
		  }
	  }elseif ($_POST['task'] == 'Tstatistical') {
	  	  //PASSING VALUES OF STATISTICAL INFORMATION
		  $_SESSION['year_of_birth'] = $year_of_birth = $_POST['year_of_birth'];
		  $_SESSION['education_received'] = $education_received = $_POST['education_received'];
		  $_SESSION['household_income'] = $household_income = $_POST['household_income'];	  
		  
		  $_SESSION['scholorships_and_grants'] = $scholorships_and_grants = $_POST['scholorships_and_grants'].";";	  
		  $_SESSION['anti_defamation_issues'] = $anti_defamation_issues = $_POST['anti_defamation_issues']	.";";	 
		  $_SESSION['youth_and_education'] = $youth_and_education = $_POST['youth_and_education'].";";	
		  $_SESSION['travel_program'] = $travel_program = $_POST['travel_program'].";";	
		  $_SESSION['languaje_and_culture'] = $languaje_and_culture = $_POST['languaje_and_culture'].";";	
		  $_SESSION['mentoring_and_leadership'] = $mentoring_and_leadership = $_POST['mentoring_and_leadership'].";";	
		  $_SESSION['italy_relations'] = $italy_relations = $_POST['italy_relations'].";";	
		  $_SESSION['professional_networking'] = $professional_networking = $_POST['professional_networking'].";";	
		  $_SESSION['political_advocacy'] = $political_advocacy = $_POST['political_advocacy'].";";	
		  
		  $_SESSION['interestCategories'] = $interestCategories = $_SESSION['scholorships_and_grants'].
																  $_SESSION['anti_defamation_issues'].
																  $_SESSION['youth_and_education'].
																  $_SESSION['travel_program'].
																  $_SESSION['languaje_and_culture'].
																  $_SESSION['mentoring_and_leadership'].
																  $_SESSION['italy_relations'].
																  $_SESSION['professional_networking'].
																  $_SESSION['political_advocacy'];
	  }elseif ($_POST['task'] == 'Tpayment') {
	  	  //PASSING VALUES OF PAYMENT METHOD multiplicar
		  $_SESSION['membership_term'] = $membership_term = $_POST['membership_term'];
		  $_SESSION['total_payment'] = $total_payment = $_POST['total_payment'];
		  $_SESSION['payment_method'] = $payment_method = $_POST['payment_method'];
		  $_SESSION['card_type'] = $card_type = $_POST['card_type'];
		  $_SESSION['card_number'] = $card_number = $_POST['card_number'];
		  $_SESSION['expiration_month'] = $expiration_month = $_POST['expiration_month'];
		  $_SESSION['expiration_year'] = $expiration_year = $_POST['expiration_year'];
		  $_SESSION['p_first_name'] = $p_first_name = $_POST['p_first_name'];
		  $_SESSION['p_last_name'] = $p_last_name = $_POST['p_last_name'];
		  $_SESSION['p_street'] = $p_street = $_POST['p_street'];
		  $_SESSION['p_state'] = $p_state = $_POST['p_state'];
		  $_SESSION['p_city'] = $p_city = $_POST['p_city'];
		  $_SESSION['p_zip'] = $p_zip = $_POST['p_zip'];
		  $_SESSION['amount'] = $_SESSION['council'] * $_SESSION['membership_term'];
		  $_SESSION['exp_date'] = $_SESSION['expiration_month'].$_SESSION['expiration_year'];
	  }

	  if($_POST['task2'] == 'SUBMIT')
	  {
		  	$post_url = "https://test.authorize.net/gateway/transact.dll";
			$post_values = array(
				"x_login"			=> "4C8X6ueE64u",
				"x_tran_key"		=> "523ZLWbf92FEDj2p",

				"x_version"			=> "3.1",
				"x_delim_data"		=> "TRUE",
				"x_delim_char"		=> "|",
				"x_relay_response"	=> "FALSE",

				"x_type"			=> "AUTH_CAPTURE",
				"x_method"			=> $_SESSION['payment_method'],
				"x_card_num"		=> $_SESSION['card_number'],
				"x_exp_date"		=> $_SESSION['exp_date'],

				"x_amount"			=> $_SESSION['amount'],
				"x_description"		=> "Sample Transaction",//BY APPOINTMENT

				"x_first_name"		=> $_SESSION['p_first_name'],
				"x_last_name"		=> $_SESSION['p_last_name'],
				"x_address"			=> $_SESSION['p_street'],
				"x_state"			=> $_SESSION['p_state'],
				"x_city"			=> $_SESSION['p_city'],
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
					  echo "CONGRATULATIONS YOUR TRANSACTION WAS APPROVED";

		  			require '_SF_config.php';
					try {
					    require_once ('soapclient/SforcePartnerClient.php');

					    $mySforceConnection = new SforcePartnerClient();
					    $mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
					    $mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);
					    //CALCULANDO LA FECHA DE EXPIRACION DE LA MEMBRECIA
					    $anioderegistro = date('Y');
					    $aniodeexpiracion = $anioderegistro + $_SESSION['membership_term'];
					    $membership_exp_date = date($aniodeexpiracion.'-m-d');

					   	//REMOVING TO IDCOMPANYNAME
					   	require '_SF_company_name.php'; 
					   	//REMOVING TO STATE
					   	require '_SF_convert_state.php';
					   	$_SESSION['state2'] = state2digits($_SESSION['state']);
					    $fields = array (
					      //DATOS PARA REGISTRAR DE EL PRIMER FORMULARIO _form_countacts_niaf.php
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
					      //'Work_Telephone__c' => $work_telephone,
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
						  'Length_of_Membership__c' => $_SESSION['membership_term'],
						  //REGISTRAR LA FECHA DE EXPIRACION DEL CONTACTO
						  'Membership_Exp_Date__c' => $membership_exp_date
						  
					    );
					    $sObject = new SObject();
					    $sObject->fields = $fields;
					    $sObject->type = 'Contact';

					    $createResponse = $mySforceConnection->create(array($sObject));

					    $ids = array();
					    foreach ($createResponse as $createResult) {
					      array_push($ids, $createResult->id);
					    }
					    require_once("_SF_enviar_mail.php");//SEND A MAIL OF WELCOME
					    require_once("_SF_enviar_mail_admin.php");//SEND MAIL TO ADMIN1 AND ADMIN2
					    require_once("_register_contact.php");//REGISTER TO DATA IN THE BD innvervel_niafmemb
					    session_destroy(); //DESTROY SESSION AND DATA
					    echo "<label>, AND THE DATA HAS BEEN REGISTERED...</label>";
					}catch (Exception $e) {
					  echo $mySforceConnection->getLastRequest();
					  echo $e->faultstring;
					}
			}else{
				echo "TRANSACTION DECLINED.";
			}
	  	}	 
 ?>
<!--PASSING VALUES OF CONTACT INFORMATION-->
<input type="hidden" value="<?php echo $_SESSION['salutation'];?>" name="salutation">
<input type="hidden" value="<?php echo $_SESSION['first_name'];?>" name="first_name">
<input type="hidden" value="<?php echo $_SESSION['middle_name'];?>" name="middle_name">
<input type="hidden" value="<?php echo $_SESSION['last_name'];?>" name="last_name">
<input type="hidden" value="<?php echo $_SESSION['suffix'];?>" name="suffix">
<input type="hidden" value="<?php echo $_SESSION['nick_name'];?>" name="nick_name">
<input type="hidden" value="<?php echo $_SESSION['spouse_name'];?>" name="spouse_name">
<input type="hidden" value="<?php echo $_SESSION['organization'];?>" name="organization">
<input type="hidden" value="<?php echo $_SESSION['title'];?>" name="title">
<input type="hidden" value="<?php echo $_SESSION['street'];?>" name="street">
<input type="hidden" value="<?php echo $_SESSION['city'];?>" name="city">
<input type="hidden" value="<?php echo $_SESSION['state'];?>" name="state">
<input type="hidden" value="<?php echo $_SESSION['country'];?>" name="country">
<input type="hidden" value="<?php echo $_SESSION['zip'];?>" name="zip">
<input type="hidden" value="<?php echo $_SESSION['home_telephone'];?>" name="home_telephone">
<input type="hidden" value="<?php echo $_SESSION['work_telephone'];?>" name="work_telephone">
<input type="hidden" value="<?php echo $_SESSION['fax'];?>" name="fax">
<input type="hidden" value="<?php echo $_SESSION['email_address'];?>" name="email_address">
<!--END PASSING VALUES OF CONTACT INFORMATION-->

<!--PASSING VALUES OF COUNCIL MEMBERSHIP-->
<input type="hidden" value="<?php echo $_SESSION['council'];?>" name="council">
<!--END PASSING VALUES OF COUNCIL MEMBERSHIP-->

<!--PASSING VALUES OF STATISTICAL INFORMATION-->
<input type="hidden" value="<?php echo $_SESSION['year_of_birth'];?>" name="year_of_birth">
<input type="hidden" value="<?php echo $_SESSION['education_received'];?>" name="education_received">
<input type="hidden" value="<?php echo $_SESSION['household_income'];?>" name="household_income">
<input type="hidden" value="<?php echo $_SESSION['scholorships_and_grants'];?>" name="scholorships_and_grants">
<input type="hidden" value="<?php echo $_SESSION['anti_defamation_issues'];?>" name="anti_defamation_issues">
<input type="hidden" value="<?php echo $_SESSION['youth_and_education'];?>" name="youth_and_education">
<input type="hidden" value="<?php echo $_SESSION['travel_program'];?>" name="travel_program">
<input type="hidden" value="<?php echo $_SESSION['languaje_and_culture'];?>" name="languaje_and_culture">
<input type="hidden" value="<?php echo $_SESSION['mentoring_and_leadership'];?>" name="mentoring_and_leadership">
<input type="hidden" value="<?php echo $_SESSION['italy_relations'];?>" name="italy_relations">
<input type="hidden" value="<?php echo $_SESSION['professional_networking'];?>" name="professional_networking">
<input type="hidden" value="<?php echo $_SESSION['political_advocacy'];?>" name="political_advocacy">
<input type="hidden" value="<?php echo $_SESSION['a_friend'];?>" name="a_friend">
<input type="hidden" value="<?php echo $_SESSION['mailing'];?>" name="mailing">
<input type="hidden" value="<?php echo $_SESSION['business_contact'];?>" name="business_contact">
<input type="hidden" value="<?php echo $_SESSION['internet'];?>" name="internet">
<input type="hidden" value="<?php echo $_SESSION['niaf_event'];?>" name="niaf_event">
<input type="hidden" value="<?php echo $_SESSION['perillo_tours'];?>" name="perillo_tours">
<input type="hidden" value="<?php echo $_SESSION['media'];?>" name="media">
<!--END PASSING VALUES OF STATISTICAL INFORMATIO-->