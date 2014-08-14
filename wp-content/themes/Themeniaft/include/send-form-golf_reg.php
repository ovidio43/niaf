<?php

require_once ('AUTHORIZE.NET.php');
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    $_POST['authorizationCode'] = $results[50];
    $_POST['cardType'] = $results[51];
    $_POST['transactionData'] = $results[6];
    if (!sendMail($_POST, $titleData)) {
        echo 'An unknown erro occurred.';
    } else {
        echo 'Your response has been recorded.';
    }
    unset($_POST['authorizationCode']);
    unset($_POST['cardType']);
    unset($_POST['transactionData']);
    insertIntoDb($_POST);
} else {
    echo $results[3];
}

function insertIntoDb($data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_golf_reg_form`(`dollarcorporatestandard`, `dollarcorporatepremium`, `dollarcorporatetitle`, "
//            . "`x_amount`,"
            . " `golfer1`, `golfer2`, `golfer3`, `golfer4`, `Salutation`, "
//            . "`x_first_name`, `x_last_name`, "
            . "`txtOrganization`, "
//            . "`x_address`, "
            . "`txtAddress2`,"
//            . " `x_city`, `x_state`, `x_zip`, "
            . "`txtHomePhone`, "
            . "`txtBizPhone`, `txtEmail`, `status`, `date`) "
            . "VALUES ('$data[dollarcorporatestandard]','$data[dollarcorporatepremium]','$data[dollarcorporatetitle]',"
//            . "'$data[x_amount]',"
            . "'$data[golfer1]','$data[golfer2]','$data[golfer3]','$data[golfer4]',"
            . "'$data[Salutation]',"
//            . "'$data[x_first_name]','$data[x_last_name]',"
            . "'$data[txtOrganization]',"
//            . "'$data[x_address]',"
            . "'$data[txtAddress2]',"
//            . "'$data[x_city]','$data[x_state]','$data[x_zip]',"
            . "'$data[txtHomePhone]','$data[txtBizPhone]',"
            . "'$data[txtEmail]','1','$date')";
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
        $body.='<b>' . $titleData[$key] . ' : </b>';
        if (is_array($value)) {
            $body.= formatArray($value);
        } else {
            if ($titleData[$key] == "Card Number") {
                $body.="********* <br>";
            } else {
                $body.=$value . '<br>';
            }
        }
    }

    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "4th Annual NIAF Golf Tournament - NEW REGISTRATION";
    $mail->MsgHTML($body);
//    $mail->AddAddress("info@niaf.org", "info test");
    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("gmileti@niaf.org", "G. Mileti");
    if (!$mail->Send()) {
        return false;
    } else {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "east.exch025.serverdata.net";
        $mail->SMTPSecure = "tls";
        $mail->Port = 465;
        $mail->Username = "info@niaf.org";
        $mail->Password = "D3v3l0p3r2014";
        $body = sendMail_client($data);
        $mail->MsgHTML($body);
        $mail->AddAddress($data['txtEmail'], "info test client");
        $mail->AddBCC("ckorin@niaf.org");
        if (!$mail->Send()) {
            return false;
        }
        return true;
    }
}

function sendMail_client($data) {
    $name_complete = 'Dear' . ' ' . $data['x_first_name'] . ' ' . $data['x_last_name'];
    $body = '';
    $body .= $name_complete . '<br><br>';
    $body .= 'Thank you for registering for the 4th Annual NIAF Golf Tournament.' . '<br>';
    $body .= '  Your Registration information has been received. ' . '<br><br>';
    $body .=' Thank you for your support,' . '<br><br>';
    $body .=' NIAF ';
    return $body;
}
