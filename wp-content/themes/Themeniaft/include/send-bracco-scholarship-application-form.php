<?php

$dataTitle = array(
    'question1' => 'How did you hear about the NIAF/Bracco Foundation Scholarship?',
    'firstName' => 'First Name',
    'middleName' => 'Middle Name',
    'lastName' => 'Last Name',
    'gender' => 'Gender',
    'address' => 'Address',
    'address1' => 'Address1',
    'city' => 'City',
    'state' => 'State Abbreviation',
    'zipCode' => 'Zip Code',
    'phoneNumber' => 'Phone Number',
    'email' => 'E-mail Address',
    'confirmEmail' => 'Confirm E-mail Address',
    'month1' => 'Month',
    'day1' => 'Day',
    'year1' => 'Year',
    'placeBirth' => 'Place of Birth',
    'parentGuardanName' => 'Parent/Guardian Name',
    'parentAddress' => 'Parent Address',
    'parentAddress1' => 'Parent Address2',
    'parentCity' => 'Parent City',
    'parentState' => 'Parent State Abbreviation',
    'parentZipCode' => 'Parent Zip Code',
    'parentPhone' => 'Parent Pnone',
    'fatherItalian' => 'Father of Italian Descent?',
    'motherItalian' => 'Mother of Italian Descent?',
    'regions' => 'Select the region(s) where your ancestors are from. (To select multiple regions, press the Cntrl key as you click the regions)',
    'specificInformation' => '(Optional) Enter more specific information (cities, etc...)',
    'academicNameSchool' => 'Academic  Name of school',
    'academicState' => 'Academic State abbreviation of school',
    'major' => 'Major',
    'degreeQualifications' => 'Degree/Qualifications (PhD/MD/MSc)',
    'yearGraduation' => 'Year of Graduation',
    'overall' => 'Overall GPA',
    'participateNiafPrograms' => 'Have you participated in any NIAF programs or activities in the past, including winning a NIAF scholarship?',
    'participateNiafProgramsWhen' => 'If yes, list the program(s) and year(s)',
    'describeKeyAspects' => 'Describe key aspects of your original scientific research. (No less than 650 words)'
);

if (isset($_POST['submit'])) {
    sendBasicMail($_POST, $dataTitle);
    insertToTable($_POST);
}

function sendBasicMail($data, $dataTitle) {
    $body = '';
    foreach ($data as $key => $value) {
        if ($key != 'submit') {
            $body.='<b>' . $dataTitle[$key] . ' : </b>';
            if (is_array($value)) {
                $count = count($value);
                $body.='<br>';
                for ($i = 0; $i < $count; $i++) {
                    $body.=' - ' . $value[$i] . '<br>';
                }
            } else {
                $body.=$value . '<br>';
            }
        }
    }
    $subject = 'Bracco scholarship application form - NEW REGISTRATION';
//    $from = 'altra@omnilogic.us';
    $to = 'jorge.quispe@altra.com.bo';
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n"
            . 'From: NIAF <noreply@niaf.net>' . "\r\n";
    mail($to, $subject, $body, $headers);
}

function insertToTable($data) {
    $date = date('Y-m-d');
    $query = "INSERT INTO `bracco_scholarship_application_form`"
            . "(`question1`, `firstName`, `middleName`, `lastName`, `gender`,"
            . " `address`, `address1`, `city`, `state`, "
            . "`zipCode`, `phoneNumber`, `email`, `confirmEmail`, "
            . "`month`, `day`, `year`, `placeBirth`,"
            . " `parentGuardanName`, `parentAddress`, `parentAddress1`, `parentCity`,"
            . " `checkAddressSame`, `parentState`, `parentZipCode`, `parentPhone`, "
            . "`fatherItalian`, `motherItalian`, `regions`, `specificInformation`,"
            . " `academicNameSchool`, `academicState`, `major`, `degreeQualifications`, "
            . "`yearGraduation`, `overall`, `participateNiafPrograms`, `participateNiafProgramsWhen`, "
            . "`describeKeyAspects`, `date`) "
            . "VALUES ('$data[question1]','$data[firstName]','$data[middleName]','$data[lastName]','$data[gender]',"
            . "'$data[address]','$data[address1]','$data[city]','$data[state]',"
            . "'$data[zipCode]','$data[phoneNumber]','$data[email]','$data[confirmEmail]',"
            . "'$data[month1]','$data[day1]','$data[year1]','$data[placeBirth]',"
            . "'$data[parentGuardanName]','$data[parentAddress]','$data[parentAddress1]','$data[parentCity]',"
            . "'$data[checkAddressSame]','$data[parentState]','$data[parentZipCode]','$data[parentPhone]',"
            . "'$data[fatherItalian]','$data[motherItalian]','$data[regions]','$data[specificInformation]',"
            . "'$data[academicNameSchool]','$data[academicState]','$data[major]','$data[degreeQualifications]',"
            . "'$data[yearGraduation]','$data[overall]','$data[participateNiafPrograms]','$data[participateNiafProgramsWhen]',"
            . "'$data[describeKeyAspects]','$date')";
    $db = new ezSQL_mysqli();
    $db->query($query);    
}
