<?php

require_once ('AUTHORIZE.NET.php');
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {

    $titleData = Array(
        'level' => ' Choose Your Package',
        'x_amount' => 'TOTAL REMITTED $',
        'guest1' => 'NIAF Membership #',
        'Salutation' => ' Salutation',
        'txtFirstName' => 'First Name',
        'txtLastName' => 'Last Name',
        'txtOrganization' => 'Firm/Organization',
        'txtAddress1' => 'Address',
        'txtAddress2' => 'Address',
        'txtCity' => 'City',
        'txtState' => 'State Abbreviation',
        'txtZip' => 'Zip Code',
        'txtHomePhone' => 'Home Phone',
        'txtBizPhone' => 'Business Phone',
        'txtEmail' => 'Email Address'
    );
    if (sendMail($_POST, $titleData,'New York Gala Registration')) {
        insertIntoDb($_POST);
        echo 'Your response has been recorded.';
    } else {
        echo 'An unknown erro occurred.';
    }
} else {
    echo $results[3];
}

function insertIntoDb($data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_new_york_gala_registration`("
            . "`level`, `guest1`, `Salutation`, `txtFirstName`, `txtLastName`, `txtOrganization`, "
            . "`txtAddress1`, `txtAddress2`, `txtCity`, `txtState`, `txtZip`, `txtHomePhone`, `txtBizPhone`, "
            . "`txtEmail`, `status`,`date`) "
            . "VALUES ('$data[level]','$data[guest1]','$data[Salutation]','$data[txtFirstName]',"
            . "'$data[txtLastName]','$data[txtOrganization]',"
            . "'$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]',"
            . "'$data[txtState]','$data[txtZip]','$data[txtHomePhone]','$data[txtBizPhone]','$data[txtEmail]','1','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}
