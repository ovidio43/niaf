<?php

$titleData = Array(
    'level' => ' Choose Your Package',
    'x_amount' => 'TOTAL REMITTED $',
    'guest1' => 'NIAF Membership #',
    'Salutation' => ' Salutation',
    'txtFirstName' => 'First Name',
    'txtLastName' => 'Last Name',
    'txtSpouse' => 'Spouse Name - if applicable',
    'txtOrganization' => 'Firm/Organization',
    'txtTitle' => 'Title',
    'txtAddress1' => 'Address',
    'txtAddress2' => 'Address 2',
    'txtCity' => 'City',
    'txtState' => 'State Abbreviation',
    'txtWorkPhone' => 'Work Telephone',
    'txtZip' => 'Zip Code',
    'txtHomePhone' => 'Home Phone',
    'txtFaxPhone' => 'Fax',
    'txtBizPhone' => 'Business Phone',
    'txtEmail' => 'Email Address',
    'dollarcorporatestandard' => 'Standard Level Sponsorship - $2,500',
    'dollarcorporatepremium' => 'Premium Level Sponsorship - $5,000',
    'dollarcorporatetitle' => 'Title Level Sponsorship - $10,000',
    'golfer1' => 'Golfer 1',
    'golfer2' => 'Golfer 2',
    'golfer3' => 'Golfer 3',
    'golfer4' => 'Golfer 4',
    'x_first_name' => 'First Name',
    "x_last_name" => 'Last Name',
    "x_address" => 'Address',
    "x_city" => 'City',
    "x_state" => 'State',
    "x_zip" => 'Zip',
    "x_card_type" => 'Card Type',
    "x_card_type" => 'Card Number',
    "x_expiration_month" => 'Expiration Month',
    "x_expiration_year" => 'Expiration Year',
    "categoryDonation" => 'Category of Donation',
    "numgifts" => 'Recipient(s)',
    "DonateAmt" => 'Donation Amount',
    "checkAddressSame" => 'Check this box if the credit card billing address is the same as previously entered. If not, please complete the below',
);

function performTransaction($data) {
    $post_url = "https://test.authorize.net/gateway/transact.dll";
    $post_values = array(
        "x_login" => "3yzLVa8H8CN",
        "x_tran_key" => "5tTJWc776FE7vj6d",
        "x_version" => "3.1",
        "x_delim_data" => "TRUE",
        "x_delim_char" => "|",
        "x_relay_response" => "FALSE",
        "x_type" => "AUTH_CAPTURE",
        "x_method" => "CC",
        "x_card_num" => $data['x_card_num'],
        "x_exp_date" => $data['x_expiration_month'] . $data['x_expiration_year'],
        "x_amount" => $data['x_amount'],
        "x_first_name" => $data['x_first_name'],
        "x_last_name" => $data['x_last_name'],
        "x_address" => $data['x_address'],
        "x_city" => $data['x_city'],
        "x_state" => $data['x_state'],
        "x_zip" => $data['x_zip'],
        "x_card_type" => $data['x_card_type']
    );

    $post_string = "";
    foreach ($post_values as $key => $value) {
        $post_string .= "$key=" . urlencode($value) . "&";
    }
    $post_string = rtrim($post_string, "& ");

    $request = curl_init($post_url); // initiate curl object
    curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    $post_response = curl_exec($request); // execute curl post and store results in $post_response

    $response_array = explode($post_values["x_delim_char"], $post_response);
    return $response_array;
}



function formatArray($array) {
    $content = '';
    foreach ($array as $value) {
        $content.=$value . '<br>';
    }
    return $content;
}

function isIn($key) {
    $titleData = Array(
        'x_card_type' => 'Payment Method : Credit Card',
        'x_card_num' => 'Payment Method : Credit Card Number',
        'x_expiration_month' => 'Payment Method : Credit Card Expiration Month',
        'x_expiration_year' => 'Payment Method : Credit Card Expiration Year',
        'x_first_name' => 'Payment Method : First Name',
        'x_last_name' => 'Payment Method : Last Name',
        'x_address' => 'Payment Method : Street',
        'x_city' => 'Payment Method : City',
        'x_state' => 'Payment Method : State',
        'x_zip' => 'Payment Method : Zip'
    );
    if (array_key_exists($key, $titleData)) {
        return true;
    } else {
        return false;
    }
}
