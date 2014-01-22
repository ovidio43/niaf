<?php
	$mail = $_SESSION['email_address'];
	$consulta = "SELECT 
						Member_ID__c,
						Id
				 FROM contact 
				 WHERE email = '$mail'";

			$rs= $mySforceConnection->query($consulta);
			foreach ($rs->records as $recordmemberid) {
				 $data = $recordmemberid->any;
			}

	//XML FILE PROCESSING
	$data = str_replace("<sf:Member_ID__c>", "", $data);
	$data = str_replace("</sf:Member_ID__c>", "", $data);
	$data = str_replace('<sf:Member_ID__c xsi:nil="true"/>', "|", $data);

	$data = str_replace("<sf:Id>", "|", $data);
	$data = str_replace("</sf:Id>", "", $data);
	$data = str_replace('<sf:Id xsi:nil="true"/>', "|", $data);


	$matrizData = array();
	$matrizData = explode("|", $data);
	$passwordDefault = $_SESSION['last_name'].$matrizData[0];
	$myIDm = $matrizData[1];
	$UPDATEOBJECTID1 = $myIDm;
	$fieldsToUpdate = array (
				    		'Website_Login__c' => $passwordDefault
					  );
	$sObject1 = new SObject();
	$sObject1->fields = $fieldsToUpdate;
	$sObject1->type = 'Contact';
	$sObject1->Id = $UPDATEOBJECTID1;
	$response = $mySforceConnection->update(array ($sObject1));
?>