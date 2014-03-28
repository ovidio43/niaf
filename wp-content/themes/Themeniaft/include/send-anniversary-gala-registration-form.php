<?php

require_once ('AUTHORIZE.NET.php');
 insertIntoDb($_POST);
 exit();
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    if (sendMail($_POST, $titleData)) {
        insertIntoDb($_POST);
        echo 'Your response has been recorded.';
    } else {
        echo 'An unknown error occurred.';
    }
} else {
    echo $results[3];
}

function insertIntoDb($data) {
    $date = date('Y-m-d');
    $query = "INSERT INTO `anniversary_gala_registration_form`("
            . "`Salutation`, `txtFirstName`, `txtLastName`,"
            . " `txtOrganization`, `txtAddress1`, `txtAddress2`, `txtCity`, "
            . "`txtState`, `txtZip`, `txtHomePhone`, `txtBizPhone`, "
            . "`txtEmail`, `txtMemberID`, `select_dollargalapackage`, `dollargalapackage`, "
            . "`select_dollarnongalapackage`, `dollarnongalapackage`, `select_dollarmemcasino`, `dollarmemcasino`, "
            . "`select_dollarnonmemcasino`, `dollarnonmemcasino`, `select_dollarvipcasino`, `dollarvipcasino`, "
            . "`select_dollarnaifnetworking`, `dollarnaifnetworking`, `select_dollarwinetasting`, `dollarwinetasting`, "
            . "`select_dollarmempremier`, `dollarmempremier`, `select_dollarpremier`, `dollarpremier`, "
            . "`select_dollarmemprefer`, `dollarmemprefer`, `select_dollarprefer`, `dollarprefer`, "
            . "`select_dollarmemstandard`, `dollarmemstandard`, `select_dollarstandard`, `dollarstandard`, "
            . "`select_dollarmemyouthprotickets`, `dollarmemyouthprotickets`, `select_dollaryouthprotickets`, `dollaryouthprotickets`,"
            . " `dollarcontribution`, `x_amount`, `status`, `date`) VALUES ("
            . "'$data[Salutation]','$data[txtFirstName]','$data[txtLastName]',"
            . "'$data[txtOrganization]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]',"
            . "'$data[txtState]','$data[txtZip]','$data[txtHomePhone]','$data[txtBizPhone]',"
            . "'$data[txtEmail]','$data[txtMemberID]',$data[select_dollargalapackage],$data[dollargalapackage],"
            . "$data[select_dollarnongalapackage],$data[dollarnongalapackage],$data[select_dollarmemcasino],$data[dollarmemcasino],"
            . "$data[select_dollarnonmemcasino],$data[dollarnonmemcasino],$data[select_dollarvipcasino],$data[dollarvipcasino],"
            . "$data[select_dollarnaifnetworking],$data[dollarnaifnetworking],$data[select_dollarwinetasting],$data[dollarwinetasting],"
            . "$data[select_dollarmempremier],$data[dollarmempremier],$data[select_dollarpremier],$data[dollarpremier],"
            . "$data[select_dollarmemprefer],$data[dollarmemprefer],$data[select_dollarprefer],$data[dollarprefer],"
            . "$data[select_dollarmemstandard],$data[dollarmemstandard],$data[select_dollarstandard],$data[dollarstandard],"
            . "$data[select_dollarmemyouthprotickets],$data[dollarmemyouthprotickets],$data[select_dollaryouthprotickets],$data[dollaryouthprotickets],"
            . "$data[dollarcontribution],$data[x_amount],'0','$date')";
    echo $query;
    $db = new ezSQL_mysqli();
//    $db->query($query);
//    $db->debug($db->query('select * from anniversary_gala_registration_form'));
}

function sendMail($data, $titleData) {
    $body = '';
    foreach ($data as $key => $value) {
        if (!isIn($key) && $key != '') {
            if ($titleData[$key] != '') {
                $body.='<b>' . $titleData[$key] . ' : </b>';
                if (is_array($value)) {
                    $body.= formatArray($value);
                } else {
                    $body.=$value . '<br>';
                }
            }
        }
    }
    $subject = 'Anniversary Gala Registration - NEW REGISTRATION';
//    $from = 'altra@omnilogic.us';
    $from = 'jorge.quispe@altra.com.bo';
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n"
            . 'From: NIAF <information@niaf.org>' . "\r\n";
    if (mail($from, $subject, $body, $headers)) {
//        if (sendMail_client($data)) {
//            return true;
//        } else {
//            return false;
//        }
        return true;
    } else {
        return false;
    }
}

function sendMail_client($data) {
    $subject = 'NIAF New York Spring gala - CONFIRMATION ';
    $from = $data['txtEmail'];
    $name_complete = 'Dear' . ' ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n"
            . 'From: NIAF <information@niaf.org>' . "\r\n";
    $body = '';
    $body .= $name_complete . '<br><br>';
    $body .= 'Thank you for registering for the NIAF New York Spring Golf.' . '<br>';
    $body .= '  Your Registration information has been received. ' . '<br><br>';
    $body .= '  The National Italian American Foundation looks forward to seeing you at the NIAF New York Spring Extravaganza! ' . '<br><br>';
    $body .=' If you have any questions, please don\'t hesitate to email Jerry Jones (<a href="mailto:jerry@niaf.org">jerry@niaf.org</a>), or call 202-939-3102.' . '<br><br>';
    $body .=' Thank you for your support,' . '<br><br>';
    $body .=' NIAF ';
    if (mail($from, $subject, $body, $headers)) {
        return true;
    }
    return false;
}
