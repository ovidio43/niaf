<?php

require_once ('AUTHORIZE.NET.php');

$nameFielData = Array(
    'is_member' => 'Is Member?',
    'txtMemberID' => 'NIAF Member ID',
    'select_non_member_ticket' => 'Casino Night - Non-Member Standard Ticket @ $200  (Quote) ',
    'non_member_ticket' => 'Casino Night - Non-Member Standard Ticket @ $200 (total) ',
    'select_member_ticket' => 'Casino Night - Standard Ticket @ $200  (Quote) ',
    'member_ticket' => 'Casino Night - Standard Ticket @ $200  (total) ',
    'select_vip_ticket' => 'Casino Night - VIP Ticket(s) @ $300 (Quote) ',
    'vip_ticket' => 'Casino Night - VIP Ticket(s) @ $300 (total) ',
    'select_young_professional' => 'Young Professional (under 30) @ $125 (Quote) ',
    'young_professional' => 'Young Professional (under 30) @ $125 (total) ',
    'select_wine_tating' => 'Wine Tasting @ $100 per person (Quote) ',
    'wine_tating' => 'Wine Tasting @ $100 per person (total) ',
    'dollarcontribution' => 'Donation Amount',
    'x_amount' => 'TOTAL REMITTED $ ',
    'Salutation' => ' Salutation',
    'txtFirstName' => 'First Name',
    'txtLastName' => 'Last Name',
    'txtOrganization' => 'Firm/Organization',
    'txtAddress1' => 'Address',
    'txtAddress2' => 'Address 2',
    'txtCity' => 'City',
    'txtState' => 'State Abbreviation',
    'txtZip' => 'Zip Code',
    'txtHomePhone' => 'Home Phone',
    'txtBizPhone' => 'Business Phone',
    'txtEmail' => 'Email Address',
    'x_card_type' => 'Card Type',
    'x_card_num' => 'Card Number',
    'x_expiration_month' => 'Expiration Month',
    'x_expiration_year' => 'Expiration Year',
    'x_first_name' => 'First Name',
    'x_last_name' => 'Last Name',
    'x_address' => 'Address',
    'x_city' => 'City',
    'x_state' => 'State',
    'x_zip' => 'Zip',
    'authorizationCode' => 'Authorization Code',
    'cardType' => 'Card Type',
    'transactionData' => 'Transaction Data'
);
$member = Array(
    'select_firsttworow' => 'First Two Rows Dinner Ticket(s) @ $2,000 (Quote)',
    'firsttworow' => 'First Two Rows Dinner Ticket(s) @ $2,000 (total)',
    'select_premierseatingdinner' => 'Premier Seating Dinner Ticket(s) @ $850 (Quote)',
    'premierseatingdinner' => 'Premier Seating Dinner Ticket(s) @ $850 (total) ',
    'select_preferredseatingdinner' => 'Preferred Seating Dinner Ticket(s) @ $500 (Quote)',
    'preferredseatingdinner' => 'Preferred Seating Dinner Ticket(s) @ $500 (total) ',
    'select_standardseatingdinner' => 'Standard Seating Dinner Ticket(s) @ $350 (Quote)',
    'standardseatingdinner' => 'Standard Seating Dinner Ticket(s) @ $350 (total)',
    'select_young_professional2' => 'Young Professional (under 30) @ $250 (Quote)',
    'young_professional2' => 'Young Professional (under 30) @ $250 (total)',
);
$nonMember = Array(
    'select_firsttworow' => 'First Two Rows Dinner Ticket(s) @ $2,500 (Quote)',
    'firsttworow' => 'First Two Rows Dinner Ticket(s) @ $2,500 (total)',
    'select_premierseatingdinner' => 'Premier Seating Dinner Ticket(s) @ $1,000 (Quote)',
    'premierseatingdinner' => 'Premier Seating Dinner Ticket(s) @ $1,000 (total)',
    'select_preferredseatingdinner' => 'Preferred Seating Dinner Ticket(s) @ $600 (Quote)',
    'preferredseatingdinner' => 'Preferred Seating Dinner Ticket(s) @ $600 (total)',
    'select_standardseatingdinner' => 'Standard Seating Dinner Ticket(s) @ $400 (Quote)',
    'standardseatingdinner' => 'Standard Seating Dinner Ticket(s) @ $400 (total)',
    'select_young_professional2' => 'Young Professional (under 30) @ $300 (Quote)',
    'young_professional2' => 'Young Professional (under 30) @ $300 (total)',
);

if (!isset($_POST['is_member'])) {
    $_POST['is_member'] = 'no';
    $nameFielData = array_merge($nameFielData, $nonMember);
} else {
    $nameFielData = array_merge($nameFielData, $member);
}



$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    $_POST['authorizationCode'] = $results[50];
    $_POST['cardType'] = $results[51];
    $_POST['transactionData'] = $results[6];
    if (sendMail($_POST, $nameFielData)) {
        unset($_POST['authorizationCode']);
        unset($_POST['cardType']);
        unset($_POST['transactionData']);
        insertIntoDb($_POST);
        echo 'Your response has been recorded.';
    } else {
        echo 'An unknown error occurred.';
    }
} else {
    echo $results[3];
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
                }
                $body.='<b>' . $titleData[$key] . $pref . ' </b>';
                if (is_array($value)) {
                    $body.= formatArray($value);
                } else {
                    $body.=$value . '<br>';
                }
            }
        }
    }    
    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "October Gala";
    $mail->MsgHTML($body);
    $mail->AddAddress("billing@niaf.org", "Billing");
    $mail->AddAddress("gala@niaf.org", "Gala");
    $mail->AddAddress("ckorin@niaf.org");
//    $mail->AddAddress("jorge.quispe@altra.com.bo", "G. Mileti");
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
        $mail->Subject = "NIAF 2014 Gala Registration - Confirmation";
        $mail->SetFrom("info@niaf.org", "NIAF");
        $body = sendMail_client($data);
        $mail->MsgHTML($body);
        $mail->AddAddress($data['txtEmail'], "info client");
        $mail->AddBCC("ckorin@niaf.org");
        if (!$mail->Send()) {
            return false;
        }
        return true;
    }
}

function sendMail_client($data) {
    $name_complete = $data['Salutation'] . ' ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $body = '';
    $body .= $name_complete . '<br><br>'
            . 'Thank you for registering for NIAF\'s 39th Anniversary Gala in October.<br>
	Your registration information has been received.<br>
	If you have any questions, please email jerry@niaf.org or call 202-939-3102.<br>
	 Thank you for your support and we look forward to sharing another memorable Gala with you!<br><br>
	The National Italian American Foundation';
    return $body;
}

function insertIntoDb($data) {
    $date = date('Y-m-d');

    $query = "INSERT INTO `_anniversary_gala_weekend_registration`"
            . "(`Salutation`, `txtFirstName`, `txtLastName`, `txtOrganization`,"
            . "`txtAddress1`, `txtAddress2`, `txtCity`, `txtState`, `txtZip`,"
            . " `txtHomePhone`, `txtBizPhone`, `txtEmail`, `txtMemberID`, `niaf_casino_niight`,"
            . " `niaf_central_networking`, `select_member_ticket`, `select_non_member_ticket`, `select_vip_ticket`, `select_young_professional`, "
            . "`select_wine_tating`, `select_firsttworow`, `select_premierseatingdinner`, `select_preferredseatingdinner`, `select_young_professional2`, "
            . "`select_standardseatingdinner`, `young_professional2`, `standardseatingdinner`, `premierseatingdinner`, `preferredseatingdinner`, "
            . "`firsttworow`, `wine_tating`, `member_ticket`, `non_member_ticket`, `vip_ticket`,"
            . " `young_professional`, `dollarcontribution`, `x_amount`, `status`, `date`,`is_member`) "
            . "VALUES ('$data[Salutation]','$data[txtFirstName]','$data[txtLastName]','$data[txtOrganization]',"
            . "'$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]','$data[txtState]','$data[txtZip]',"
            . "'$data[txtHomePhone]','$data[txtBizPhone]','$data[txtEmail]','$data[txtMemberID]','$data[niaf_casino_niight]',"
            . "'$data[niaf_central_networking]',$data[select_member_ticket],$data[select_non_member_ticket],$data[select_vip_ticket],$data[select_young_professional],"
            . "$data[select_wine_tating],$data[select_firsttworow],$data[select_premierseatingdinner],$data[select_preferredseatingdinner],$data[select_young_professional2],"
            . "$data[select_standardseatingdinner],$data[young_professional2],$data[standardseatingdinner],$data[premierseatingdinner],$data[preferredseatingdinner],"
            . "$data[firsttworow],$data[wine_tating],$data[member_ticket],$data[non_member_ticket],$data[vip_ticket],"
            . "$data[young_professional],$data[dollarcontribution],$data[x_amount],'0','$date','$data[is_member]')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}
