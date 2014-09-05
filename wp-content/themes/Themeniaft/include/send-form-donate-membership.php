<?php
require_once ('AUTHORIZE.NET.php');
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
$results = performTransaction($_SESSION);

if ($results[3] == 'This transaction has been approved.') {
//    $_POST['authorizationCode'] = $results[50];
//    $_POST['cardType'] = $results[51];
//    $_POST['transactionData'] = $results[6];
    if (sendMail($_SESSION, $titleData)) {
//        unset($_POST['authorizationCode']);
//        unset($_POST['cardType']);
//        unset($_POST['transactionData']);
        insertIntoDb($_SESSION);
        echo 'Your response has been recorded.';
    } else {
        echo 'An unknown erro occurred.';
    }
} else {
    echo $results[3];
    ?>    
    <form method="post" action="" id="formBack">
        <input type="hidden" name="step" value="3">   
        <input type="submit" value=" << BACK">&nbsp; &nbsp;
    </form>
    <?php
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
    $mail->Subject = "give a Gift Membership - NEW REGISTRATION";
    $mail->MsgHTML($body);
//    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("member@niaf.org", "Member");
//    $mail->AddAddress("gmileti@niaf.org", "G. Mileti");
    $mail->AddAddress("billing@niaf.org", "Billing");

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
        $mail->SetFrom("info@niaf.org", "NIAF");
        $mail->Subject = "give a Gift Membership - CONFIRMATION";
        $body = sendMail_client($data);
        $mail->MsgHTML($body);
        $mail->AddAddress($data['txtEmail'], $data['txtFirstName'] . ' ' . $data['txtLastName']);
        $mail->AddBCC("ckorin@niaf.org");
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
    $body .= 'Thank you for registering give a Gift Membership.' . '<br>';
    $body .= '  Your Registration information has been received. ' . '<br><br>';
    $body .=' Thank you for your support,' . '<br><br>';
    $body .=' NIAF ';
    return $body;
}

function insertIntoDb($data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_give_the_gift_of_heritage_form`(`txtFirstName`, `txtLastName`, `txtSpouse`, `txtOrganization`,"
            . " `txtTitle`, `strWorkAddr`, `txtAddress1`, `txtAddress2`, `txtCity`, `txtState`, `txtZip`, "
            . "`txtHomePhone`, `txtWorkPhone`, `txtEmail`, `txtFaxPhone`, `nummemberships`, "
//            . "`x_amount`, `x_card_type`, "
//            . "`x_card_num`, `x_expiration_month`, `x_expiration_year`,"
            . " `checkAddressSame`, "
//            . "`x_first_name`, `x_last_name`, "
//            . "`x_first_name`, `x_last_name`, "
//            . "`x_address`, `x_city`, `x_state`, `x_zip`,"
            . " `status`, `date`) "
            . "VALUES ('$data[txtFirstName]','$data[txtLastName]','$data[txtSpouse]','$data[txtOrganization]',"
            . "'$data[txtTitle]','$data[strWorkAddr]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]','$data[txtState]','$data[txtZip]',"
            . "'$data[txtHomePhone]','$data[txtWorkPhone]','$data[txtEmail]','$data[txtFaxPhone]','$data[nummemberships]',"
//            . "'$data[x_amount]',"
//            . "'$data[x_card_type]',"
            . "'$data[checkAddressSame]',"
//            . "'$data[x_first_name]','$data[x_last_name]','$data[x_address]','$data[x_city]','$data[x_state]','$data[x_zip]',"
            . "'1','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}
