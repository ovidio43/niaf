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
    'txtAddress1' => 'step 1 : Street',
    'txtAddress2' => 'step 1 : Street 2',
    'txtCity' => 'step 1 : City ',
    'txtState' => 'step 1 : State',
    'txtZip' => 'step 1 : Zip',
    'txtHomePhone' => 'step 1 : Home Telephone',
    'txtWorkPhone' => 'step 1 : Work Telephone',
    'txtEmail' => 'step 1 : E-mail',
    'txtFaxPhone' => 'step 1 : Fax',
    'nummemberships' => 'step 1 : Gift Memberships',
    'txtMemberID' => 'step 2 : (Enter Member ID if known)',
    'DropDownSalutation' => 'step 2 : Salutation',
    'optNewMember' => 'New Membership',
    'txtFirstName2' => 'step 2 : First Name',
    'txtMiddleName' => 'step 2 : Middle Name(or Initial)',
    'txtLastName2' => 'step 2 : Last Name',
    'DropDownSuffix' => 'step 2 : Suffix - (if applicable)',
    'txtNickName' => 'step 2 : Nick Name',
    'txtSpouse2' => 'step 2 : Spouse Name - (if applicable)',
    'txtOrganization2' => 'step 2 : Organization',
    'txtTitle2' => 'step 2 :  Title',
    'strWorkAddr2Ref' => 'step 2 :  Check if this is a work address',
    'txtAddress12' => 'step 2 : Street',
    'txtAddress22' => 'step 2 : Street 2',
    'txtCity2' => 'step 2 : City',
    'txtState2' => 'step 2 : State',
    'txtCountry' => 'step 2 : Country:  (For Non-USA residents only) ',
    'txtZip2' => 'step 2 : Zip',
    'txtHomePhone2' => 'step 2 : Home Telephone',
    'txtWorkPhone2' => 'step 2 : Work Telephone',
    'txtFaxPhone2' => 'step 2 : Fax',
    'txtEmail2' => 'step 2 : E-mail Address',
    'level' => 'step 2 : Choose Your Council Membership',
    'DropDownDOB' => 'step 2 : YEAR OF BIRTH ',
    'education' => 'step 2 : HIGHEST LEVEL OFEDUCATION RECEIVED',
    'income' => 'step 2 : HOUSEHOLD INCOME',
    'inttrestCategories' => 'step 2 : INTEREST CATEGORIES',
    'heardAbout' => 'step 2 : I HEARD ABOUT THENIAF THROUGH',
    'memberterm' => 'step 2 : Membership term',
    'GrandTotal' => 'step 2 : Total Payment',
    'cboCardType' => 'step 2 : Card Type',
    'txtCardNumber' => 'step 2 : Card Number',
    'cboCardMonth' => 'step 2 : Expiration Month ',
    'cboCardYear' => 'step 2 : Expiration Year ',
    'txtCCChkAddressRef' => 'step 2 : Check this box if the credit card billing address is the same as previously entered. If not, please complete the below ',
    'txtCCFirstName' => 'step 2 : First Name ',
    'txtCCLastName' => 'step 2 : Last Name',
    'txtCCAddress1' => 'step 2 : Street',
    'txtCCCity' => 'step 2 : City ',
    'txtCCState' => 'step 2 : State',
    'txtCCZip' => 'step 2 : Zip',
    'DonateAmtConfirm' => 'step 3 : Entered Donation Amount ',
    'cboCardType2' => 'step 3 : Card Type ',
    'txtCardNumber2' => 'step 3 : Entered Donation Amount ',
    'cboCardMonth2' => 'step 3 : Expiration Month ',
    'cboCardYear2' => 'step 3 : Expiration Year',
    'txtCCChkAddress2' => 'step 3 : Check this box if the credit card billing address is the same as previously entered. If not, please complete the below',
    'txtCCFirstName2' => 'step 3 : First Name',
    'txtCCLastName2' => 'step 3 : Last Name',
    'txtCCAddress12' => 'step 3 : Street ',
    'txtCCCity2' => 'step 3 : City  ',
    'txtCCState2' => 'step 3 : State',
    'txtCCZip2' => 'step 3 : Zip'
);
//$destinatario = "jorge.quispe@altra.com.bo";
$destinatario = "altra@omnilogic.us";
//$destinatario = "droman@innervel.com";
$asunto = "asunto:NIAF";

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
