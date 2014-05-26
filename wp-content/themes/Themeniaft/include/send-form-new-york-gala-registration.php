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
    $mail = new PHPMailer();
    $mail->IsSMTP();
//    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Host = "east.exch025.serverdata.net";
    $mail->SMTPSecure = "tls";
    $mail->Port = 465;
    $mail->Username = "info@niaf.org";
    $mail->Password = "D3v3l0p3r2014";
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
    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "NIAF NEW YORK SPRING GALA - NEW REGISTRATION";
    $mail->MsgHTML($body);
    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("gmileti@niaf.org", "G. Mileti");
    if (!$mail->Send()) {
        return false;
    } else {
        $mail->Subject = "NIAF New York Spring gala - CONFIRMATION";
        $body = sendMail_client($data);
        $mail->MsgHTML($body);
        $mail->AddAddress($data['txtEmail'], "info test client");
        if (!$mail->Send()) {
            return false;
        }
        return true;
    }

}

function sendMail_client($data) {
    $name_complete = 'Dear' . ' ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $body = '';
    $body .= $name_complete . '<br><br>';
    $body .= 'Thank you for registering for the NIAF New York Spring Golf.' . '<br>';
    $body .= '  Your Registration information has been received. ' . '<br><br>';
    $body .= '  The National Italian American Foundation looks forward to seeing you at the NIAF New York Spring Extravaganza! ' . '<br><br>';
    $body .=' If you have any questions, please don\'t hesitate to email Jerry Jones (<a href="mailto:jerry@niaf.org">jerry@niaf.org</a>), or call 202-939-3102.' . '<br><br>';
    $body .=' Thank you for your support,' . '<br><br>';
    $body .=' NIAF ';
    return $body;
}
