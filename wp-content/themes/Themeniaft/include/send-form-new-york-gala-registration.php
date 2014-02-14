<?php

require_once ('AUTHORIZE.NET.php');
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    if (sendMail($_POST, $titleData)) {
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

function sendMail($data, $titleData) {
    $body = '';
    foreach ($data as $key => $value) {
        if (!isIn($key) && $key != '') {
            $body.='<b>' . $titleData[$key] . ' : </b>';
            if (is_array($value)) {
                $body.= formatArray($value);
            } else {
                $body.=$value . '<br>';
            }
        }
    }
    $subject = 'New York Gala Registration';
    $from = 'jorge.quispe@altra.com.bo';
    $headers .= 'Content-type:text/html;charset=UTF-8 \rn'
            . 'From: Registration <noreply@niaf.net>\rn';
    if (mail($from, $subject, $body, $headers)) {
        if (sendMail_client($data)){
            return true;    
        }
        return false;
    } 
    return false;
}
function sendMail_client($data) {
    $subject = 'NIAF New York Spring gala - CONFIRMATION ';
    $from = $data['txtEmail'];
    $name_complete = 'Dear' . ' ' .  $data['txtFirstName'] . ' ' .$data['txtLastName'];
    $headers .= 'Content-type:text/html;charset=UTF-8 \rn'
            . 'From: Registration <noreply@niaf.net>\rn';
    $body = '';
    $body .= $name_complete.'<br><br>';
    $body .= 'Thank you for registering for the NIAF New York Spring Golf.' .'<br>';
    $body .= '  Your Registration information has been received. '.'<br><br>';
    $body .= '  The National Italian American Foundation looks forward to seeing you at the NIAF New York Spring Extravaganza! '.'<br><br>';
    $body .=' If you have any questions, please don\'t hesitate to email Jerry Jones (jerry@niaf.org), or call 202-939-3102.'.'<br><br>';
    $body .=' Thank you for your support,' .'<br><br>';
    $body .=' NIAF ';
    if (mail($from, $subject, $body, $headers)) {
        return true;
    }
    return false;
}