<?php

foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
$results = performTransaction();

if ($results[3] == 'This transaction has been approved.') {
    sendEmail();
} else {
    echo $results[3];
}

function performTransaction() {
    $post_url = "https://test.authorize.net/gateway/transact.dll";
    $post_values = array(
        // the API Login ID and Transaction Key must be replaced with valid values
        "x_login" => "3yzLVa8H8CN",
        "x_tran_key" => "5tTJWc776FE7vj6d",
        "x_version" => "3.1",
        "x_delim_data" => "TRUE",
        "x_delim_char" => "|",
        "x_relay_response" => "FALSE",
        "x_type" => "AUTH_CAPTURE",
        "x_method" => "CC",
        "x_card_num" => $_SESSION['x_card_num'],
        "x_exp_date" => $_SESSION['x_expiration_month'] . $_SESSION['x_expiration_year'],
        "x_amount" => $_SESSION['x_amount'],
        "x_first_name" => $_SESSION['x_first_name'],
        "x_last_name" => $_SESSION['x_last_name'],
        "x_address" => $_SESSION['x_address'],
        "x_city" => $_SESSION['x_city'],
        "x_state" => $_SESSION['x_state'],
        "x_zip" => $_SESSION['x_zip'],
        "x_card_type" => $_SESSION['x_card_type']
            // Additional fields can be added here as outlined in the AIM integration
            // guide at: http://developer.authorize.net
    );

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
    $post_string = "";
    foreach ($post_values as $key => $value) {
        $post_string .= "$key=" . urlencode($value) . "&";
    }
    $post_string = rtrim($post_string, "& ");

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
    /*
      $line_items = array(
      "item1<|>golf balls<|><|>2<|>18.95<|>Y",
      "item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
      "item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");

      foreach( $line_items as $value )
      { $post_string .= "&x_line_item=" . urlencode( $value ); }
     */

// This sample code uses the CURL library for php to establish a connection,
// submit the post, and record the response.
// If you receive an error, you may want to ensure that you have the curl
// library enabled in your php configuration
    $request = curl_init($post_url); // initiate curl object
    curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
    $post_response = curl_exec($request); // execute curl post and store results in $post_response
// additional options may be required depending upon your server configuration
// you can find documentation on curl options at http://www.php.net/curl_setopt
    curl_close($request); // close curl object
// This line takes the response and breaks it into an array using the specified delimiting character
    $response_array = explode($post_values["x_delim_char"], $post_response);
    return $response_array;
// The results are output to the screen in the form of an html numbered list.
//    echo "<OL>\n";
//    foreach ($response_array as $value) {
//        echo "<LI>" . $value . "&nbsp;</LI>\n";
//    }
//    echo "</OL>\n";
// individual elements of the array could be accessed to read certain response
// fields.  For example, response_array[0] would return the Response Code,
// response_array[2] would return the Response Reason Code.
// for a list of response fields, please review the AIM Implementation Guide
}

function sendEmail() {
    $nameAttr = Array(
        'txtFirstName' => 'step 1 : First Name',
        'txtLastName' => 'step 1 : Last Name',
        'txtSpouse' => 'step 1 : Spouse Name - if applicable',
        'txtOrganization' => 'step 1 : Organization',
        'txtTitle' => 'step 1 : Title',
        'strWorkAddrRef' => 'step 1 :  Check if this is a work address',
        'txtAddress1' => 'step 1 :  Street',
        'txtAddress2' => 'step 1 :  Street 2',
        'txtCity' => 'step 1 :  City',
        'txtState' => 'step 1 :  State',
        'txtZip' => 'step 1 :  Zip',
        'txtHomePhone' => 'step 1 :  Home Telephone',
        'txtWorkPhone' => 'step 1 :  Work Telephone',
        'txtEmail' => 'step 1 :  E-mail',
        'txtFaxPhone' => 'step 1 :  Fax',
        'categoryDonation' => 'step 1 :  Category of Donation',
        'numgifts' => 'step 1 :  Recipient(s)',
        'DonateAmt' => 'step 1 :  Donation Amount',
        'RFirstName1' => 'step 2 :  First Name',
        'RLastName1' => 'step 2 :  Last Name',
        'RAddress11' => 'step 2 :  Street',
        'RAddress21' => 'step 2 :  Street 2',
        'RCity1' => 'step 2 :  City',
        'RState1' => 'step 2 :  State',
        'RZip1' => 'step 2 :  Zip',
        'RFirstName2' => 'step 2 Recipient 2:  First Name',
        'RLastName2' => 'step 2 Recipient 2:  Last Name',
        'RAddress12' => 'step 2 Recipient 2:  Street',
        'RAddress22' => 'step 2 Recipient 2:  Street',
        'RCity2' => 'step 2 Recipient 2:  City',
        'RState2' => 'step 2 Recipient 2:  State',
        'RZip2' => 'step 2 Recipient 2:  Zip',
        'DonateAmtConfirm' => 'step 3 : Entered Donation Amount',
        'cboCardType' => 'step 3 : Card Type',
        'txtCardNumber' => 'step 3 : Card Number',
        'cboCardMonth' => 'step 3 : Expiration Month ',
        'cboCardYear' => 'step 3 : Expiration Year ',
        'txtCCChkAddress' => 'step 3 : Check this box if the credit card billing address is the same as previously entered. If not, please complete the below ',
        'txtCCFirstName' => 'step 3 : First Name',
        'txtCCLastName' => 'step 3 : Last Name',
        'txtCCAddress1' => 'step 3 : Street',
        'txtCCCity' => 'step 3 : City',
        'txtCCState' => 'step 3 : State',
        'txtCCZip' => 'step 3 : Zip'
    );
    $destinatario = "jorge.quispe@altra.com.bo";
//    $destinatario = "altra@omnilogic.us";
//$destinatario = "droman@innervel.com";
    $asunto = "Donate Info Form";

    $cuerpo = '';
    foreach ($_SESSION as $key => $value) {

        if (is_array($value)) {
            $cuerpo.= "---------------------------------------------------\r\n ";
            $cuerpo.="[" . $nameAttr[$key] . " :] \r\n ";
            foreach ($value as $val) {
                $cuerpo.= $val . " \r\n";
            }
        } else {
            $cuerpo.= "---------------------------------------------------\r\n ";
            $cuerpo.="[" . $nameAttr[$key] . "] \r\n";
            $cuerpo.= $value . " \r\n";
        }
    }
    $headers = "MIME-Version: 1.0\r\n";

    $headers .= "From: NIAF <noreply@mommyhotspot.com>\r\n";
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo '<h1>Tahnk..</h1>';
//        session_destroy();
    } else {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#btn-previous').on('click', function() {
                    jQuery('#formBack').submit();
                });
            });

        </script>
        <button id="btn-previous" type="button">PREVIOUS</button>&nbsp; &nbsp;
        <form action="" id="formBack" method="post">
            <input type="hidden" name="step" value="3">
        </form>
        <?php

    }
}
