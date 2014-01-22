<?php 
  require_once( "../../../../wp-config.php" );
  echo "<link rel='stylesheet' type='text/css' href='CSS3/form.css' />";

  $salutation = $_POST['salutation'];
  $firstName = $_POST['first_name'];
  $middleName = $_POST['middle_name'];
  $lastName = $_POST['last_name'];
  $suffix = $_POST['suffix'];
  $nickName = $_POST['nick_name'];
  $spouseName = $_POST['spouse_name'];
  $organization = $_POST['organization'];
  $title = $_POST['title'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $zip = $_POST['zip'];
  $homeTelephone = $_POST['home_telephone'];
  $workTelephone = $_POST['work_telephone'];
  $fax = $_POST['fax'];
  $emailAddress = $_POST['email_address'];


  // Crear la instancia para la conexion a salesForce.com
  define("USERNAME", "knt_277@outlook.com");
  define("PASSWORD", "knt12345678");
  define("SECURITY_TOKEN", "MSZTyVzZ3Z719MJZ2CyAsyux");

  define("SOAP_CLIENT_BASEDIR", "../../soapclient");


try {
    require_once (get_template_directory().'/formulariosSalesforce/soapclient/SforcePartnerClient.php');

    $mySforceConnection = new SforcePartnerClient();
    $mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
    $mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);


    //SANDBOX
    /*LOS QUE NO TENGO EN EL SANDBOX
      'Organization__c' => $organization,
      'Street__c' => $street,
      'City__c' => $city,
      'state__c' => $state,
      'country__c' => $country,
      'Zip__c' => $zip,
      'Work_Telephone__c' => $workTelephone,

      ,
      'work_Email__c' => $emailAddress
    */
    /*
    $fields = array (
      'salutation' => $salutation,
      'FirstName' => $firstName,
      'Middle_Initial__c' => $middleName,
      'LastName' => $lastName,
      'Suffix__c' => $suffix,
      'Nickname__c' => $nickName,
      'Spouse_First_Name__c' => $spouseName,
      
      'Title' => $title,
      
      
      
      
      
      'HomePhone' => $homeTelephone,
      
      'Fax' => $fax
    );
    */
    //LIVE
    $fields = array (
      'salutation' => $salutation,
      'FirstName' => $firstName,
      'Middle_Name_or_Initial__c' => $middleName,
      'LastName' => $lastName,
      'Suffix_if_applicable__c' => $suffix,
      'Nick_Name__c' => $nickName,
      'Spouse_Name_if_applicable__c' => $spouseName,
      'Organization__c' => $organization,
      'Title' => $title,
      'Street__c' => $street,
      'City__c' => $city,
      'state__c' => $state,
      'country__c' => $country,
      'Zip__c' => $zip,
      'Home_Telephone__c' => $homeTelephone,
      'Work_Telephone__c' => $workTelephone,
      'Fax' => $fax,
      'work_Email__c' => $emailAddress
    );

    $sObject = new SObject();
    $sObject->fields = $fields;
    $sObject->type = 'Contact';

    //$sObject2 = new SObject();
    //$sObject2->fields = $fields;
    //$sObject2->type = 'Contact';

    //echo "**** Creating the following:\r\n";
    $createResponse = $mySforceConnection->create(array($sObject));

    //print_r($createResponse);

    $ids = array();
    foreach ($createResponse as $createResult) {
      //print_r($createResult);
      array_push($ids, $createResult->id);
    }

    echo "<label>The data has been successfully registered.</label>";
    ?>
    <html>
<head>
  <title>FORM AIM</title>
  <link rel='stylesheet' type='text/css' href='CSS3/form.css' />
  <link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
</head>
<body>
  <table>
  <form method="post" action="_register_AIM.php">
    <tr>
      <th>1.- First Name:</th>
      <td>
        <input class="text" type="text" name="first_name"/>
      </td>
    </tr>
    <tr>
      <th>2.- Last Name:</th>
      <td>
        <input class="text" type="text" name="last_name"/>
      </td>
    </tr>
    <tr>
      <th>3.- Amount:</th>
      <td>
        <input class="text" type="text" name="amount"  value="9.99"/> 
      </td>
    </tr>
    <tr>
      <th>4.- Card Number:</th>
      <td>
        <input class="text" type="text" name="car_num" value="4111111111111111" /> 
      </td>
    </tr>
    <tr>
      <th>5.- Expiration Date:</th>
      <td>
        <input class="text" type="text" name="exp_date" value="10/16" /> 
      </td>
    </tr>
    <tr>
      <th>
        <input class="button medium green" type="submit" value="DONATE">
      </th>
    </tr>
  </form>
  </table>
</body>
</html>
<?php
} catch (Exception $e) {
  echo $mySforceConnection->getLastRequest();
  echo $e->faultstring;
}
?>