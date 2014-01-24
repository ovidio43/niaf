<?php
//var_dump($_POST);

$body .="<b>Choose Your Package: level</b><br>";
$body .="<b>TOTAL REMITTED $ </b>".$_POST["dollartotal"]."<br>";
$body .="<b>TOTAL REMITTED $ </b>".$_POST["dollartotal2"]."<br>";
$body .="<b>NIAF Membership # </b>".$_POST["guest1"]."<br>";
$body .="<b>Salutation: </b>".$_POST["Salutation"]."<br>";
$body .="<b>First Name: </b>".$_POST["txtFirstName"]."<br>";
$body .="<b>Last Name: </b>".$_POST["txtLastName"]."<br>";
$body .="<b>Firm/Organization: </b>".$_POST["txtOrganization"]."<br>";
$body .="<b>Address: </b>".$_POST["txtAddress1"]." -- ".$_POST["txtAddress2"]."<br>";
$body .="<b>City: </b>".$_POST["txtCity"]."<br>";
$body .="<b>State Abbreviation: </b>".$_POST["txtState"]."<br>";
$body .="<b>Zip Code: </b>".$_POST["txtZip"]."<br>";
$body .="<b>Home Phone: </b>".$_POST["txtHomePhone"]."<br>";
$body .="<b>Business Phone: </b>".$_POST["txtBizPhone"]."<br>";
$body .="<b>mail Address: </b>".$_POST["txtEmail"]."<br><br>";

$body .="<b>Payment Method</b><br>";
$body .="<b>Credit Card: </b>".$_POST["CardType"]."<br>";
$body .="<b>Credit Card Number: </b>".$_POST["txtCCNumber"]."<br>";
$body .="<b>Credit Card Expiration Month: </b>".$_POST["CardExpMonth"]."<br>";
$body .="<b>Credit Card Expiration Year: </b>".$_POST["CardExpYear"]."<br><br>";

$body .="<b>Check this box if the credit card billing address</b><br>";
$body .="<b>First Name </b>".$_POST["txtCCFirstName"]."<br>";
$body .="<b>Last Name </b>".$_POST["txtCCLastName"]."<br>";
$body .="<b>Street </b>".$_POST["txtCCAddress1"]."<br>";
$body .="<b>City </b>".$_POST["txtCCCity"]."<br>";
$body .="<b>State </b>".$_POST["txtCCState"]."<br>";
$body .="<b>Zip </b>".$_POST["txtCCZip"]."<br>";

if (!empty($_POST["txtFirstName"]) && !empty($_POST["txtLastName"]) && !empty($_POST["txtAddress1"]) && !empty($_POST["txtEmail"])&& !empty($_POST["txtState"])) {
//        if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($paypal, FILTER_VALIDATE_EMAIL)) {
    $from = "altra@omnilogic.us";
    $subject = "New York Gala Registration";
    $body = $body;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";    
    $headers .= "From: Registration <noreply@niaf.net>\r\n";
    if (mail($from, $subject, $body, $headers)){
        echo 'Your response has been recorded.';
    }else{
        echo "Error. Please try again.";
    }
           
} else {
    echo 'Looks like you have a question or two that still needs to be filled out.';
}

?>