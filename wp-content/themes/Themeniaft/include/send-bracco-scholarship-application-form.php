<?php


if (isset($_POST['submit'])) {
    sendBasicMailAdm($_POST);
    insertToTable($_POST);
    echo 'Your application was successfully submitted. Thank you for applying to the Bracco Scholarship.';
}

function sendBasicMailAdm($data) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "east.exch025.serverdata.net";
    $mail->SMTPSecure = "tls";
    $mail->Port = 465;
    $mail->Username = "info@niaf.org";
    $mail->Password = "D3v3l0p3r2014";
    $body = 'The following individual has just registered for the Bracco Foundation
	Scholarship:<br>'
            . 'Fullname : ' . $data['firstName'] . ' ' . $data['lastName'] . '<br>'
            . 'Email Address : ' . $data['email'];

    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "Bracco Foundation Scholarship - New Applicant";
    $mail->MsgHTML($body);
    $mail->AddAddress("ckorin@niaf.org", "C. Korin");
    $mail->AddAddress("gmileti@niaf.org", "G. Mileti");
//    $mail->AddAddress("iprojimoi@gmail.com", "jorge luis");
    $mail->Send();

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "east.exch025.serverdata.net";
    $mail->SMTPSecure = "tls";
    $mail->Port = 465;
    $mail->Username = "info@niaf.org";
    $mail->Password = "D3v3l0p3r2014";
    $body = sendBasicMailClient($data);
    $mail->MsgHTML($body);
    $mail->AddAddress($data['email'], "info test client");
    $mail->SetFrom("info@niaf.org", "NIAF");
    $mail->Subject = "Bracco Foundation Scholarship";
    $mail->AddBCC("ckorin@niaf.org");
    $mail->Send();
}

function sendBasicMailClient($data) {
    $body = "Thank you for submitting your Bracco Foundation Scholarship application.<br> 
	Your information has been received.  Please note that your application is not yet complete. <br>
	 
	To complete the application process, you must send the following documents via email to bracco@niaf.org, no later than June 30, 2014. <br>
	 
	- A detailed curriculum vitae (including photograph, address, telephone number, e-mail address)<br>
	- A scan of the candidate's degree certificate and/or doctoral certificate with marks awarded for individual intermediate examinations and final examination;<br>
	- An electronic file of any publications and/or patent applications; <br><br>
	 
	Thank you, <br>
	 
	Gabriella Mileti<br>
	Director of Programs <br>
	 
	The National Italian American Foundation (NIAF) 1860 19th Street NW Washington, DC 20009 <br>
	 
	Direct: 202-939-3116<br>
	Main: 202-387-0600<br>
	Fax: 202-387-0800<br>
	E-mail: gmileti@niaf.org<br>
	On the web at www.niaf.org";
    return $body;
}

function insertToTable($data) {
    $date = date('Y-m-d');
    $region = '';
    $count = count($data['regions']);
    $i = 0;
    for ($i = 0; $i < $count; $i++) {
        $region.= $data['regions'][$i] . ', ';
    }

    $query = "INSERT INTO `bracco_scholarship_application_form`"
            . "(`question1`, `firstName`, `middleName`, `lastName`, `gender`,"
            . " `address`, `address1`, `city`, `state`, "
            . "`zipCode`, `phoneNumber`, `email`, `confirmEmail`, "
            . "`month`, `day`, `year`, `placeBirth`,"
            . " `parentGuardanName`, `parentAddress`, `parentAddress1`, `parentCity`,"
            . " `parentState`, `parentZipCode`, `parentPhone`, "
            . "`fatherItalian`, `motherItalian`, `regions`, `specificInformation`,"
            . " `academicNameSchool`, `academicState`, `major`, `degreeQualifications`, "
            . "`yearGraduation`, `overall`, `participateNiafPrograms`, `participateNiafProgramsWhen`, "
            . "`describeKeyAspects`, `date`) "
            . "VALUES ('$data[question1]','$data[firstName]','$data[middleName]','$data[lastName]','$data[gender]',"
            . "'$data[address]','$data[address1]','$data[city]','$data[state]',"
            . "'$data[zipCode]','$data[phoneNumber]','$data[email]','$data[confirmEmail]',"
            . "'$data[month1]','$data[day1]','$data[year1]','$data[placeBirth]',"
            . "'$data[parentGuardanName]','$data[parentAddress]','$data[parentAddress1]','$data[parentCity]',"
            . "'$data[parentState]','$data[parentZipCode]','$data[parentPhone]',"
            . "'$data[fatherItalian]','$data[motherItalian]','$region','$data[specificInformation]',"
            . "'$data[academicNameSchool]','$data[academicState]','$data[major]','$data[degreeQualifications]',"
            . "'$data[yearGraduation]','$data[overall]','$data[participateNiafPrograms]','$data[participateNiafProgramsWhen]',"
            . "'$data[describeKeyAspects]','$date')";

    $db = new ezSQL_mysqli();
    $db->query($query);
}
