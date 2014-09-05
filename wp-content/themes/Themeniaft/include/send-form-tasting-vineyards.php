<?php

require_once ('AUTHORIZE.NET.php');
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    $_POST['authorizationCode'] = $results[50];
    $_POST['cardType'] = $results[51];
    $_POST['transactionData'] = $results[6];
    if (sendMail($_POST, $titleData)) {
        unset($_POST['authorizationCode']);
        unset($_POST['cardType']);
        unset($_POST['transactionData']);
        insertIntoDb($_POST);
        echo 'Thank you for registering for this event.  Your information has been received and a confirmation email has been sent to the provided email address.';
    } else {
        echo 'An unknown error occurred.';
    }
} else {
    echo $results[3];
}

function insertIntoDb($data) {
    $date = date('Y-m-d');
    $query = "INSERT INTO `_tasting_vineyards_form`(" . "`Salutation`, `txtFirstName`, `txtLastName`,"
            . " `txtOrganization`, `txtAddress1`, `txtAddress2`, `txtCity`, "
            . "`txtState`, `txtZip`, `txtHomePhone`, `txtBizPhone`, "
            . "`txtEmail`, `txtMemberID`, `select_firsttworow`, `firsttworow`, "
            . " `dollarcontribution`, `x_amount`, `status`, `date`) VALUES ("
            . "'$data[Salutation]','$data[txtFirstName]','$data[txtLastName]',"
            . "'$data[txtOrganization]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]',"
            . "'$data[txtState]','$data[txtZip]','$data[txtHomePhone]','$data[txtBizPhone]',"
            . "'$data[txtEmail]','$data[txtMemberID]',$data[select_firsttworow],$data[firsttworow],"
            . "$data[dollarcontribution],$data[x_amount],'0','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
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
            if ($titleData[$key] != '') {
                if ($titleData[$key] == 'Salutation') {
                    $pref = "";
                } else {
                    $pref = ":";
                } $body.='<b>' . $titleData[$key] . $pref . ' </b>';
                if (is_array($value)) {
                    $body.= formatArray($value);
                } else {
                    $body.=$value . '<br>';
                }
            }
        }
    } $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "Tasting in the Vineyards";
    $mail->MsgHTML($body);
    $mail->AddAddress("billing@niaf.org", "Billing");
    $mail->AddAddress("abartlett@niaf.org", "abartlett");
    $mail->AddAddress("ckorin@niaf.org");
    $mail->AddAddress("jorge.quispe@altra.com.bo");
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
        $mail->Subject = "Tasting in the Vineyards"; //confirmation
        $mail->SetFrom("info@niaf.org", "NIAF");
        $body = sendMail_client($data);
        $mail->MsgHTML($body);
        $mail->AddAddress($data['txtEmail'], "info client");
        $mail->AddBCC("ckorin@niaf.org");
        if (!$mail->Send()) {
            return false;
        } return true;
    }
}

function sendMail_client($data) {
    $name_complete = $data['Salutation'] . ' ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $body = '';
    $body .= $name_complete . '<br><br>'
            . "Thank you for registering for NIAF's Tasting in the Vineyards on August, 23, 2014.<br> 
	Your registration information has been received.<br> 
	If you have any questions, please email abartlett@niaf.org or call 202-939-3118.<br> 
	Thank you for your support!<br><br>
	The National Italian American Foundation<br> 
	On the web at www.niaf.org";

    return $body;
}
