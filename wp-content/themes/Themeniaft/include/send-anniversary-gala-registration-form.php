<?php

require_once ('AUTHORIZE.NET.php');
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

//function insertIntoDb($data) {
//    $date = date('Y-m-d');
//    $query = "INSERT INTO `anniversary_gala_registration_form`("
//            . "`Salutation`, `txtFirstName`, `txtLastName`,"
//            . " `txtOrganization`, `txtAddress1`, `txtAddress2`, `txtCity`, "
//            . "`txtState`, `txtZip`, `txtHomePhone`, `txtBizPhone`, "
//            . "`txtEmail`, `txtMemberID`, `select_dollargalapackage`, `dollargalapackage`, "
//            . "`select_dollarnongalapackage`, `dollarnongalapackage`, `select_dollarmemcasino`, `dollarmemcasino`, "
//            . "`select_dollarnonmemcasino`, `dollarnonmemcasino`, `select_dollarvipcasino`, `dollarvipcasino`, "
//            . "`select_dollarnaifnetworking`, `dollarnaifnetworking`, `select_dollarwinetasting`, `dollarwinetasting`, "
//            . "`select_dollarmempremier`, `dollarmempremier`, `select_dollarpremier`, `dollarpremier`, "
//            . "`select_dollarmemprefer`, `dollarmemprefer`, `select_dollarprefer`, `dollarprefer`, "
//            . "`select_dollarmemstandard`, `dollarmemstandard`, `select_dollarstandard`, `dollarstandard`, "
//            . "`select_dollarmemyouthprotickets`, `dollarmemyouthprotickets`, `select_dollaryouthprotickets`, `dollaryouthprotickets`,"
//            . " `dollarcontribution`, `x_amount`, `status`, `date`) VALUES ("
//            . "'$data[Salutation]','$data[txtFirstName]','$data[txtLastName]',"
//            . "'$data[txtOrganization]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]',"
//            . "'$data[txtState]','$data[txtZip]','$data[txtHomePhone]','$data[txtBizPhone]',"
//            . "'$data[txtEmail]','$data[txtMemberID]',$data[select_dollargalapackage],$data[dollargalapackage],"
//            . "$data[select_dollarnongalapackage],$data[dollarnongalapackage],$data[select_dollarmemcasino],$data[dollarmemcasino],"
//            . "$data[select_dollarnonmemcasino],$data[dollarnonmemcasino],$data[select_dollarvipcasino],$data[dollarvipcasino],"
//            . "$data[select_dollarnaifnetworking],$data[dollarnaifnetworking],$data[select_dollarwinetasting],$data[dollarwinetasting],"
//            . "$data[select_dollarmempremier],$data[dollarmempremier],$data[select_dollarpremier],$data[dollarpremier],"
//            . "$data[select_dollarmemprefer],$data[dollarmemprefer],$data[select_dollarprefer],$data[dollarprefer],"
//            . "$data[select_dollarmemstandard],$data[dollarmemstandard],$data[select_dollarstandard],$data[dollarstandard],"
//            . "$data[select_dollarmemyouthprotickets],$data[dollarmemyouthprotickets],$data[select_dollaryouthprotickets],$data[dollaryouthprotickets],"
//            . "$data[dollarcontribution],$data[x_amount],'0','$date')";
//    $db = new ezSQL_mysqli();
//    $db->query($query);
//}

function insertIntoDb($data) {
    $date = date('Y-m-d');
    $query = "INSERT INTO `anniversary_gala_registration_form`("
            . "`Salutation`, `txtFirstName`, `txtLastName`,"
            . " `txtOrganization`, `txtAddress1`, `txtAddress2`, `txtCity`, "
            . "`txtState`, `txtZip`, `txtHomePhone`, `txtBizPhone`, "
            . "`txtEmail`, `txtMemberID`, `select_firsttworow`, `firsttworow`, "
            . "`select_premierseatingdinner`, `premierseatingdinner`, `select_preferredseatingdinner`, `preferredseatingdinner`, "
            . "`select_standardseatingdinner`, `standardseatingdinner`,"
            . " `dollarcontribution`, `x_amount`, `status`, `date`) VALUES ("
            . "'$data[Salutation]','$data[txtFirstName]','$data[txtLastName]',"
            . "'$data[txtOrganization]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]',"
            . "'$data[txtState]','$data[txtZip]','$data[txtHomePhone]','$data[txtBizPhone]',"
            . "'$data[txtEmail]','$data[txtMemberID]',$data[select_firsttworow],$data[firsttworow],"
            . "$data[select_premierseatingdinner],$data[premierseatingdinner],$data[select_preferredseatingdinner],$data[preferredseatingdinner],"
            . "$data[select_standardseatingdinner],$data[standardseatingdinner],"
            . "$data[dollarcontribution],$data[x_amount],'0','$date')";
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

    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "2013 Gala Registration ~ October 26, 2013";
    $mail->MsgHTML($body);
    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("gmileti@niaf.org", "G. Mileti");

    if (!$mail->Send()) {
        return false;
    } else {
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
    $name_complete = $data['Salutation'] . ' : ' . $data['txtFirstName'] . ' ' . $data['txtLastName'];
    $body = '';
    $body .= $name_complete . '<br><br>'
            . 'Thank you for registering for NIAF\'s 39th Anniversary Gala in October.<br>
	Your registration information has been received.<br>
	If you have any questions, please email jerry@niaf.org or call 202-939-3102.<br>
	 Thank you for your support and we look forward to sharing another memorable Gala with you!<br>
	Jerry Jones';
    return $body;
}
