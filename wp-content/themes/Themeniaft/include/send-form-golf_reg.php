<?php

require_once ('AUTHORIZE.NET.php');
$results = performTransaction($_POST);
if ($results[3] == 'This transaction has been approved.') {
    if (!sendMail($_POST, $titleData)) {
        echo 'An unknown erro occurred.';
    } else {
        echo 'Your response has been recorded.';
    }
    insertIntoDb($_POST);
} else {
    echo $results[3];
}

function insertIntoDb($data) {
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_golf_reg_form`(`dollarcorporatestandard`, `dollarcorporatepremium`, `dollarcorporatetitle`, "
            . "`x_amount`, `golfer1`, `golfer2`, `golfer3`, `golfer4`, `Salutation`, `x_first_name`, `x_last_name`, "
            . "`txtOrganization`, `x_address`, `txtAddress2`, `x_city`, `x_state`, `x_zip`, `txtHomePhone`, "
            . "`txtBizPhone`, `txtEmail`, `status`, `date`) "
            . "VALUES ('$data[dollarcorporatestandard]','$data[dollarcorporatepremium]','$data[dollarcorporatetitle]',"
            . "'$data[x_amount]','$data[golfer1]','$data[golfer2]','$data[golfer3]','$data[golfer4]',"
            . "'$data[Salutation]','$data[x_first_name]','$data[x_last_name]','$data[txtOrganization]','$data[x_address]',"
            . "'$data[txtAddress2]','$data[x_city]','$data[x_state]','$data[x_zip]','$data[txtHomePhone]','$data[txtBizPhone]',"
            . "'$data[txtEmail]','1','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}

function sendMail($data, $titleData) {
    $body = '';
    foreach ($data as $key => $value) {
        $body.='<b>' . $titleData[$key] . ' : </b>';
        if (is_array($value)) {
            $body.= formatArray($value);                
        } else {
            if($titleData[$key]=="Card Number"){
                $body.="********* <br>";
            }else{
                $body.=$value . '<br>';               
            }
            
        }
    }
    $subject = '4th Annual NIAF Golf Tournament - NEW REGISTRATION';
    $from = 'altra@omnilogic.us';
    $headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n"
            . 'From: NIAF <noreply@niaf.org>'. "\r\n";
    if (mail($from, $subject, $body, $headers)) {
       if (sendMail_client($data)){
            return true;    
        }
        return false;
    } 
    return false;
}

function sendMail_client($data) {
    $subject = '4th Annual NIAF Golf Tournament - CONFIRMATION';
    $from = $data['txtEmail'];
    $name_complete = 'Dear' . ' ' .  $data['x_first_name'] . ' ' .$data['x_last_name'];
    $headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n"
            . 'From: NIAF <noreply@niaf.org>'. "\r\n";
    $body = '';
    $body .= $name_complete.'<br><br>';
    $body .= 'Thank you for registering for the 4th Annual NIAF Golf Tournament.' .'<br>';
    $body .= '  Your Registration information has been received. '.'<br><br>';
    $body .=' Thank you for your support,' .'<br><br>';
    $body .=' NIAF ';
    if (mail($from, $subject, $body, $headers)) {
        return true;
    }
    return false;
}
