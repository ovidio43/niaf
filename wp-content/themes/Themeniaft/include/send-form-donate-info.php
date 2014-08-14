<?php
require_once ('AUTHORIZE.NET.php');
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
$results = performTransaction($_SESSION);

if ($results[3] == 'This transaction has been approved.') {
    $_POST['authorizationCode'] = $results[50];
    $_POST['cardType'] = $results[51];
    $_POST['transactionData'] = $results[6];
    if (sendMail($_SESSION, $titleData)) {
        unset($_POST['authorizationCode']);
        unset($_POST['cardType']);
        unset($_POST['transactionData']);
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
    $mail->Subject = "Donate Info Form";
    $mail->MsgHTML($body);
    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("billing@niaf.org", "Billing");
    $mail->AddAddress("websitememership@niaf.org", "Webmaster");
    //$mail->AddAddress("gmileti@niaf.org", "G. Mileti");
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
        $mail->Subject = "NIAF Contribution - Confirmation";
        $mail->SetFrom("info@niaf.org", "NIAF");
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
    $name_complete = 'Dear' . ' ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $body = '';
    $body .= $name_complete . '<br><br>';
    $body .= 'Thank you for your contribution to the National Italian American Foundation. Your information has been received.' . '<br><br>';
    $body .= '  If you have any questions, please email <a href="mailto:donations@niaf.org">donations@niaf.org</a>. ' . '<br><br>';
    $body .= '  Thank you again for your support. ' . '<br><br>';
    $body .='  National Italian American Foundation - <a href="http://www.niaf.org">www.niaf.org</a>';
    return $body;
}

function insertIntoDb($data) {
    $categoryDonation = '';
    foreach ($data['categoryDonation'] as $value) {
        $categoryDonation.=$value . ' , ';
    }
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_donate_info_form`(`txtFirstName`, `txtLastName`, `txtSpouse`, `txtOrganization`, "
            . "`txtTitle`, `strWorkAddr`, `txtAddress1`, `txtAddress2`, `txtCity`, `txtState`, `txtZip`, "
            . "`txtHomePhone`, `txtWorkPhone`, `txtEmail`, `txtFaxPhone`, `categoryDonation`, `numgifts`,"
            . " `DonateAmt`, "
//            . "`x_amount`, `x_expiration_year`, "
//            . " `DonateAmt`, `x_amount`, `x_card_type`, `x_card_num`, `x_expiration_month`, `x_expiration_year`, "
            . "`checkAddressSame`,"
//            . " `x_first_name`, `x_last_name`, `x_address`, `x_city`, `x_state`, `x_zip`,"
            . " `status`,`date`) "
            . "VALUES ('$data[txtFirstName]','$data[txtLastName]','$data[txtSpouse]','$data[txtOrganization]','$data[txtTitle]',"
            . "'$data[strWorkAddr]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]','$data[txtState]',"
            . "'$data[txtZip]','$data[txtHomePhone]','$data[txtWorkPhone]','$data[txtEmail]','$data[txtFaxPhone]',"
            . "'$categoryDonation','$data[numgifts]','$data[DonateAmt]',"
//            . "'$data[x_amount]','$data[x_card_type]',"
            . "'$data[checkAddressSame]',"
//            . "'$data[x_first_name]','$data[x_last_name]',"
//            . "'$data[x_address]','$data[x_city]','$data[x_state]','$data[x_zip]',"
            . "'1','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}
