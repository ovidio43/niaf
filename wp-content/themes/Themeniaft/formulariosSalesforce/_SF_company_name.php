<?php
		session_start();
		require_once ('soapclient/SforcePartnerClient.php');
		$companyName = '';

		$mySforceConnection = new SforcePartnerClient();
		$mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
		$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);
		$organization = $_SESSION['organization'];
		$checkORG = $_SESSION['checkOrganization'];

		$organization = strtolower($organization);
		$organization = ucwords($organization);

		if($checkORG<>'' && $organization<>'')// check == true && organization == true
		{
			$queryidcompany = "SELECT Id FROM Account WHERE name='$organization'";

			$response = $mySforceConnection->query($queryidcompany);
			$idcompanyname = array();$i = 0;
			$filas = 0;
			foreach ($response->records as $record) {
				$idcompanyname[$i] = ($record->Id[$i]);	$i = $i + 1;
				$filas = $filas + 1;

			}
			$idcompany = $idcompanyname[0];
			if($idcompany =='')//ESA ORGANIZACION NO EXISTE, Y POR LO TANTO TENEMOS QUE CREEARLA
			{
				$fields = array (
					      'name' => $organization
					    );
					    $sObject = new SObject();
					    $sObject->fields = $fields;
					    $sObject->type = 'Account';

					    $createResponse = $mySforceConnection->create(array($sObject));

					    $ids = array();
					    foreach ($createResponse as $createResult) {
					      array_push($ids, $createResult->id);
					    }
				$idcompany = $ids[0];
			}else{	//ESA ORGANIZACION EXISTE, SACAR EL ID DE ESA ORGANIZATION
				$idcompany = $idcompanyname[0];
			}
		}else{
			$idcompany = "001Z000000eN9YgIAK";//DEFAULT 001Z000000eN9Yg 
		}
?>