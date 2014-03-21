<?php

//$dataTitle = array(
//    'question1' => 'How did you hear about the NIAF/Bracco Foundation Scholarship?',
//    'firstName' => 'First Name',
//    'middleName' => 'Middle Name',
//    'lastName' => 'Last Name',
//    'gender' => 'Gender',
//    'address' => 'Address',
//    'address1' => 'Address1',
//    'city' => 'City',
//    'state' => 'State Abbreviation',
//    'zipCode' => 'Zip Code',
//    'phoneNumber' => 'Phone Number',
//    'email' => 'E-mail Address',
//    'confirmEmail' => 'Confirm E-mail Address',
//    'month1' => 'Month',
//    'day1' => 'Day',
//    'year1' => 'Year',
//    'placeBirth' => 'Place of Birth',
//    'parentGuardanName' => 'Parent/Guardian Name',
//    'parentAddress' => 'Parent Address',
//    'parentAddress1' => 'Parent Address2',
//    'parentCity' => 'Parent City',
//    'parentState' => 'Parent State Abbreviation',
//    'parentZipCode' => 'Parent Zip Code',
//    'parentPhone' => 'Parent Pnone',
//    'fatherItalian' => 'Father of Italian Descent?',
//    'motherItalian' => 'Mother of Italian Descent?',
//    'regions' => 'Select the region(s) where your ancestors are from. (To select multiple regions, press the Cntrl key as you click the regions)',
//    'specificInformation' => '(Optional) Enter more specific information (cities, etc...)',
//    'academicNameSchool' => 'Academic  Name of school',
//    'academicState' => 'Academic State abbreviation of school',
//    'major' => 'Major',
//    'degreeQualifications' => 'Degree/Qualifications (PhD/MD/MSc)',
//    'yearGraduation' => 'Year of Graduation',
//    'overall' => 'Overall GPA',
//    'participateNiafPrograms' => 'Have you participated in any NIAF programs or activities in the past, including winning a NIAF scholarship?',
//    'participateNiafProgramsWhen' => 'If yes, list the program(s) and year(s)',
//    'describeKeyAspects' => 'Describe key aspects of your original scientific research. (No less than 650 words)'
//);

if (isset($_POST['submit'])) {
    sendBasicMailAdm($_POST);
    insertToTable($_POST);
    sendBasicMailClient($_POST);
    echo '<h3>Your application was successfully submitted. Thank you for applying to the bracco scholarship.</h3>';
}

function sendBasicMailAdm($data) {
    $body = 'The following individual has just registered for the Bracco Foundation
	Scholarship:<br>'
            . 'Fullname : ' . $data['firstName'] . ' ' . $data['lastName'] . '<br>'
            . 'Email Address : ' . $data['email'];

//    foreach ($data as $key => $value) {
//        if ($key != 'submit') {
//            $body.='<b>' . $dataTitle[$key] . ' : </b>';
//            if (is_array($value)) {
//                $count = count($value);
//                $body.='<br>';
//                for ($i = 0; $i < $count; $i++) {
//                    $body.=' - ' . $value[$i] . '<br>';
//                }
//            } else {
//                $body.=$value . '<br>';
//            }
//        }
//    }
    $subject = 'Bracco Foundation Scholarship - New Applicant';

//    $to = 'jorge.quispe@altra.com.bo';
    $to = 'ckorin@niaf.org,gmileti@niaf.org';
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n"
            . 'From: NIAF <noreply@niaf.net>' . "\r\n";
    mail($to, $subject, $body, $headers);
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
    $subject = 'Bracco Foundation Scholarship';
    $to = $data['email'];
//    $to = 'jorge.quispe@altra.com.bo';
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n"
            . 'From: NIAF <gmileti@niaf.org>' . "\r\n";
    mail($to, $subject, $body, $headers);
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
