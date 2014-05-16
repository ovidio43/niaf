<?php
require_once ('AUTHORIZE.NET.php');
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
$results = performTransaction($_SESSION);

if ($results[3] == 'This transaction has been approved.') {
    if (sendMail($_SESSION, $titleData)) {
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
    $subject = ' give a Gift Membership - NEW REGISTRATION';
    $from = 'gmileti@niaf.org, ckorin@niaf.org';
    $headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n"
            . 'From: NIAF <info@niaf.org>'. "\r\n";
    if (mail($from, $subject, $body, $headers)) {
        if (sendMail_client($data)){
            return true;    
        }
        return false;
    } 
    return false;
}
function sendMail_client($data) {
    $subject = ' give a Gift Membership - CONFIRMATION ';
    $from = $data['txtEmail'];
    $name_complete = 'Dear' . ' ' .  $data['txtFirstName'] . ' ' .$data['txtLastName'];
    $headers .= 'Content-type:text/html;charset=UTF-8 '. "\r\n"
            . 'From: NIAF <info@niaf.org>'. "\r\n";
    $body = '';
    $body .= $name_complete.'<br><br>';
    $body .= 'Thank you for registering give a Gift Membership.' .'<br>';
    $body .= '  Your Registration information has been received. '.'<br><br>';
    $body .=' Thank you for your support,' .'<br><br>';
    $body .=' NIAF ';
    if (mail($from, $subject, $body, $headers)) {
        return true;
    } 
    return false;
}
function insertIntoDb($data) {   
    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `_give_the_gift_of_heritage_form`(`txtFirstName`, `txtLastName`, `txtSpouse`, `txtOrganization`,"
            . " `txtTitle`, `strWorkAddr`, `txtAddress1`, `txtAddress2`, `txtCity`, `txtState`, `txtZip`, "
            . "`txtHomePhone`, `txtWorkPhone`, `txtEmail`, `txtFaxPhone`, `nummemberships`, `x_amount`, `x_card_type`, "
            . "`x_card_num`, `x_expiration_month`, `x_expiration_year`, `checkAddressSame`, `x_first_name`, `x_last_name`, "
            . "`x_address`, `x_city`, `x_state`, `x_zip`, `status`, `date`) "
            . "VALUES ('$data[txtFirstName]','$data[txtLastName]','$data[txtSpouse]','$data[txtOrganization]',"
            . "'$data[txtTitle]','$data[strWorkAddr]','$data[txtAddress1]','$data[txtAddress2]','$data[txtCity]','$data[txtState]','$data[txtZip]',"
            . "'$data[txtHomePhone]','$data[txtWorkPhone]','$data[txtEmail]','$data[txtFaxPhone]','$data[nummemberships]','$data[x_amount]',"
            . "'$data[x_card_type]','$data[x_card_num]','$data[x_expiration_month]','$data[x_expiration_year]','$data[checkAddressSame]',"
            . "'$data[x_first_name]','$data[x_last_name]','$data[x_address]','$data[x_city]','$data[x_state]','$data[x_zip]','1','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);
}
