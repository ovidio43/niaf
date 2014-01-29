<?php

foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
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
//$destinatario = "jorge.quispe@altra.com.bo";
$destinatario = "altra@omnilogic.us";
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
    session_destroy();
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
        <input type="hidden" name="step" value="6">
    </form>
    <?php

}

