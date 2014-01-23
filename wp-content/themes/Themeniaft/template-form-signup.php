<?php
/**
 * Template name: form sign up
 *
 * @package WordPress
 * @subpackage themeniaft
 * @since theme niaft 1.0
 */
get_header();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-captcha.css">
<script language='javascript' src='http://echo.bluehornet.com/phase2/bhecho_files/smartlists/check_entry.js'></script>
<script language="javascript">
    <!--
        function check_cdfs(form) {
        return true;
    }
  -->
</script><script language='javascript' type='text/javascript'>
<!--
    function doSubmit() {
        if (check_cdfs(document.survey)) {
            window.open('', 'signup', 'resizable=1,scrollbars=0,width=300,height=150');
            return true;
        }
        else {
            return false;
        }
}
-->
</script>

<div class="main-container">
    <div class="main clearfix">
        <div class="primary">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; // end of the loop. ?>
                    
                    <div class="form-signup">
                        <form action="http://echo.bluehornet.com/phase2/bullseye/contactupdate1.php3" method="post" name="bullseye" id="bullseye"    onsubmit="return doSubmit();" target="signup">

                            <div class="row-input">
                                <div class="midinput">
                                    <b>First Name:</b>
                                    <input type='text' name='firstname'>
                                </div>
                                <div class="midinput">
                                    <b>Last Name:</b>
                                    <input type='text' name='lastname'>
                                </div>
                            </div>

                            <div class="row-input">
                                <div class="midinput">
                                    <input type=hidden name="cid" value="8b8dcabdb4cf0d7e3d69910dcd140dfb">
                                    <b>Email :<span class="error">*Required</span></b>
                                    <input type="text" name="email">
                                </div>
                                <div class="midinput">
                                    <b>Address:</b>
                                    <input type='text' name='address'>
                                </div>
                            </div>

                            <div class="row-input">
                                <div class="midinput">
                                    <b>City:</b>
                                    <input type='text' name='city'>
                                </div>
                                <div class="midinput">
                                    <b>State:</b>
                                    <select name='state'>
                                        <OPTION value='' selected>Select One</OPTION>
                                        <option  value='AK'>AK</option>
                                        <option  value='AL'>AL</option>
                                        <option  value='AR'>AR</option>
                                        <option  value='AZ'>AZ</option>
                                        <option  value='CA'>CA</option>
                                        <option  value='CO'>CO</option>
                                        <option  value='CT'>CT</option>
                                        <option  value='DC'>DC</option>
                                        <option  value='DE'>DE</option>
                                        <option  value='FL'>FL</option>
                                        <option  value='GA'>GA</option>
                                        <option  value='HI'>HI</option>
                                        <option  value='IA'>IA</option>
                                        <option  value='ID'>ID</option>
                                        <option  value='IL'>IL</option>
                                        <option  value='IN'>IN</option>
                                        <option  value='KS'>KS</option>
                                        <option  value='KY'>KY</option>
                                        <option  value='LA'>LA</option>
                                        <option  value='MA'>MA</option>
                                        <option  value='MD'>MD</option>
                                        <option  value='ME'>ME</option>
                                        <option  value='MI'>MI</option>
                                        <option  value='MN'>MN</option>
                                        <option  value='MO'>MO</option>
                                        <option  value='MS'>MS</option>
                                        <option  value='MT'>MT</option>
                                        <option  value='NC'>NC</option>
                                        <option  value='ND'>ND</option>
                                        <option  value='NE'>NE</option>
                                        <option  value='NH'>NH</option>
                                        <option  value='NJ'>NJ</option>
                                        <option  value='NM'>NM</option>
                                        <option  value='NV'>NV</option>
                                        <option  value='NY'>NY</option>
                                        <option  value='OH'>OH</option>
                                        <option  value='OK'>OK</option>
                                        <option  value='OR'>OR</option>
                                        <option  value='PA'>PA</option>
                                        <option  value='RI'>RI</option>
                                        <option  value='SC'>SC</option>
                                        <option  value='SD'>SD</option>
                                        <option  value='TN'>TN</option>
                                        <option  value='TX'>TX</option>
                                        <option  value='UT'>UT</option>
                                        <option  value='VA'>VA</option>
                                        <option  value='VT'>VT</option>
                                        <option  value='WA'>WA</option>
                                        <option  value='WI'>WI</option>
                                        <option  value='WV'>WV</option>
                                        <option  value='WY'>WY</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="row-input">
                                <div class="midinput">
                                    <b>Zip Code:</b>
                                    <input type='text' name='postal_code'>
                                </div>
                                <div class="midinput">
                                    <b>Home Phone:</b>
                                    <input type='text' name='phone_hm'>
                                </div>
                            </div>
                            <div class="row-input">
                                <div class="midinput">
                                    <b>Work Phone:</b>
                                    <input type='text' name='phone_wk'>
                                </div>
                                <div class="midinput">
                                    <b>Fax:</b>
                                    <input type='text' name='fax'>
                                </div>
                            </div> 
                            <div class="row-input">
                                <div class="midinput">
                                    <b>Country:</b>
                                    <input type='text' name='country'>
                                </div>
                                <div class="midinput">
                                    <b>Time Zone:</b>
                                    <select name="tz_id" >
                                        <option value="">Please select a Time Zone
                                        <option value="53">(GMT -12) International Date Line West
                                        <option value="54">(GMT -11) Midway Island, Samoa
                                        <option value="55">(GMT -10) Hawaii
                                        <option value="56">(GMT -9) Alaska
                                        <option value="2">(GMT -8) Pacific Time (US & Canada); Tijuana
                                        <option value="5">(GMT -7) Mountain Time (US & Canada)
                                        <option value="4">(GMT -7) Chihuahua, La Paz, Mazatlan
                                        <option value="3">(GMT -7) Arizona
                                        <option value="57">(GMT -6) Saskatchewan
                                        <option value="8">(GMT -6) Guadalajara, Mexico City, Monterrey
                                        <option value="6">(GMT -6) Central America
                                        <option value="7">(GMT -6) Central Time (US & Canada)
                                        <option value="9">(GMT -5) Bogota, Lima, Quito
                                        <option value="10">(GMT -5) Eastern Time (US & Canada)
                                        <option value="11">(GMT -5) Indiana (East)
                                        <option value="13">(GMT -4) Santiago
                                        <option value="12">(GMT -4) Atlantic Time (Canada)
                                        <option value="58">(GMT -3.5) Newfoundland and Labrador
                                        <option value="59">(GMT -3) Greenland
                                        <option value="14">(GMT -3) Brasilia, Buenos Aires, Georgetown
                                        <option value="60">(GMT -2) Mid-Atlantic
                                        <option value="15">(GMT -1) Azores, Cape Verde Is. 
                                        <option value="16">(GMT +0) Casablanca, Monrovia
                                        <option value="17">(GMT +0) Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London
                                        <option value="22">(GMT +1) West Central Africa
                                        <option value="21">(GMT +1) Sarajevo, Skopje, Warsaw, Zagreb
                                        <option value="20">(GMT +1) Brussels, Copenhagen, Madrid, Paris
                                        <option value="19">(GMT +1) Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                        <option value="18">(GMT +1) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                        <option value="26">(GMT +2) Harare, Pretoria
                                        <option value="23">(GMT +2) Athens, Beirut, Istanbul, Minsk
                                        <option value="24">(GMT +2) Bucharest
                                        <option value="28">(GMT +2) Jerusalem
                                        <option value="27">(GMT +2) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius
                                        <option value="25">(GMT +2) Cairo
                                        <option value="30">(GMT +3) Moscow, St. Petersburg, Volgograd
                                        <option value="29">(GMT +3) Baghdad, Kuwait, Riyadh
                                        <option value="31">(GMT +3) Nairobi
                                        <option value="32">(GMT +3.5) Tehran
                                        <option value="33">(GMT +4) Abu Dhabi, Muscat
                                        <option value="34">(GMT +4) Baku, Tbilisi, Yerevan
                                        <option value="35">(GMT +4.5) Kabul
                                        <option value="36">(GMT +5) Islamabad, Karachi, Tashkent
                                        <option value="37">(GMT +5.5) Chennai, Kolkata, Mumbai, New Delhi
                                        <option value="61">(GMT +5.75) Kathmandu
                                        <option value="38">(GMT +6) Novosibirsk, Astana
                                        <option value="39">(GMT +6.5) Rangoon
                                        <option value="40">(GMT +7) Bangkok, Hanoi, Jakarta
                                        <option value="43">(GMT +8) Perth, Taipei
                                        <option value="41">(GMT +8) Beijing, Chongqing, Hong Kong
                                        <option value="42">(GMT +8) Kuala Lumpur, Singapore
                                        <option value="62">(GMT +8) Irkutsk, Ulaanbaatar
                                        <option value="44">(GMT +9) Osaka, Sapporo, Tokyo
                                        <option value="45">(GMT +9) Seoul, Yakutsk
                                        <option value="46">(GMT +9.5) Adelaide, Darwin
                                        <option value="47">(GMT +10) Brisbane, Canberra, Melbourne, Sydney
                                        <option value="52">(GMT +10) Guam, Port Moresby, Hobart
                                        <option value="51">(GMT +11) Magadan, Solomon Islands, New Caledonia
                                        <option value="49">(GMT +12) Fiji, Kamchatka, Marshall Is.
                                        <option value="50">(GMT +12) Auckland, Wellington
                                        <option value="48">(GMT +13) Nuku'alofa
                                    </select>
                                </div>
                            </div> 
                            <div class="row-input">
                                <div class="midinput">
                                    <span class="wpcf7-radio">
                                        <b>Email Format:</b><br>
                                        <input type='radio' name='email_type' value='N' checked>No Preference
                                        <input type='radio' name='email_type' value='H'>HTML
                                        <input type='radio' name='email_type' value='P'>Plain Text
                                    </span>
                                </div> 
                            </div>                             
                            <!-- Captcha HTML Code -->
                            <div class="row-input">
                                <div class="midinput">
                                    <b>Type the characters you see in the image below</b>
                                    <div class="captcha-box">
                                        <img src="<?php echo get_template_directory_uri(); ?>/get_captcha.php" alt="" id="captcha" />
                                    </div>
                                    <div class="text-box">
                                       
                                        <input name="captcha-code" type="text" id="captcha-code">
                                    </div>
                                    <div class="captcha-action">
                                        <img src="<?php echo get_template_directory_uri(); ?>/refresh.jpg"  alt="" id="captcha-refresh" />
                                    </div>
                                    <input type="hidden" value="" id="aux">
                                </div>
                            </div>

                            <!--  Copy and Paste above html in any form and include CSS, get_captcha.php files to show the captcha  -->




                            <div class="row-input">

                                <input type='hidden' name='message' value="Thank you. Your information has been submitted. To ensure delivery of your newsletter(s), please add information@niaf.org to your address book, spam filter whitelist, or tell your company's IT group to allow this address to pass through any filtering software they may have set up.">
                                <center>
                                    <input type="submit" name="SubmitBullsEye" value="Submit" id="SubmitBullsEye">
                                    <input type=hidden name='grp[]' value='782393'>  
                                </center>

                            </div> 
                        </form>
                    </div>
                </div><!-- .entry-content -->
            </article><!-- #post -->        
        </div>
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div> <!-- #main -->
</div> <!-- #main-container -->

<?php get_footer(); ?>
<script type="text/javascript">

        jQuery(document).ready(function() {
            // refresh captcha
            jQuery('img#captcha-refresh').click(function() {
                change_captcha();
            });
            jQuery('#captcha-code').focusout(function() {
                var cod = jQuery('input#captcha-code').val();
                var url = jQuery('body').attr('rel') + '/get_captcha.php';
                query(url, cod);
            });

            jQuery("#SubmitBullsEye").mouseover(function() {
              jQuery("#SubmitBullsEye").focus();
            });            
            jQuery('#SubmitBullsEye').on('click', function() {
                var cod = jQuery('input#captcha-code').val();
                var url = jQuery('body').attr('rel') + '/get_captcha.php';
                query(url, cod);
                if (jQuery('#aux').val() != 'ok') {
                    alert('please Type the characters you see in the image captcha below or fill required fields');
                    change_captcha();
                    return false;
                }else{
                    jQuery("#bullseye").submit();
                }
            });


            function query(url, cod) {
                jQuery.ajax({
                    url: url,
                    data: {cod: cod},
                    type: "POST",
                    beforeSend: function() {
                        //jQuery("#SubmitBullsEye").prop('disabled', true);
                        jQuery('#SubmitBullsEye').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data == 'ok') {
                            jQuery('#aux').val(data);
                        } else {
                            jQuery('#aux').val('no');
                        }
                        //jQuery("#SubmitBullsEye").prop('disabled', false);
                        jQuery('#SubmitBullsEye').attr('disabled', false);
                    }
                })
            }
            function change_captcha() {
                document.getElementById('captcha').src = "<?php echo get_template_directory_uri(); ?>/get_captcha.php?rnd=" + Math.random();
            }
    }
    );

</script>   