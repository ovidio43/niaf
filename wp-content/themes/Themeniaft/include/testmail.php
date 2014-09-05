<?php
echo $_SERVER['HTTPS'];
echo "/";
echo $_SERVER['HTTP'];
/*
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

//date_default_timezone_set('Etc/UTC');

//require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Host = "east.exch025.serverdata.net";
$mail->SMTPSecure = "tls";
$mail->Port = 465;
$mail->Username = "info@niaf.org";
$mail->Password = "D3v3l0p3r2014";

$mail->SetFrom("info@niaf.org", "NIAF");
$mail->Subject = "PHPMailer SMTP Testing";
$body = "This is the mail body";
$mail->MsgHTML($body);

$mail->AddAddress("info@niaf.org", "info test");
//$mail->AddAddress("gmileti@niaf.org", "G. mileti");
//$mail->AddAddress("ckorin@niaf.org", "C. Korin");
// Finally Send the Mail
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent Successfully!";
}*/
