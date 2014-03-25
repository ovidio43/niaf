<?php
session_start();
require_once (get_template_directory() . '/lib/ezSQL-master/shared/ez_sql_core.php');
require_once (get_template_directory() . '/lib/ezSQL-master/mysqli/ez_sql_mysqli.php');
require_once (get_template_directory() . '/customgalery.php');
//require_once (get_template_directory().'/formulariosSalesforce/_SF_validation_user2.php') ; 


add_action('init', 'setup_niafevents_post');
function setup_niafevents_post() {

    $capabilities = array(
     'publish_posts' => 'publish_niaf_event',
     'edit_posts' => 'edit_niaf_event',
     'edit_others_posts' => 'edit_others_niaf_event',
     'delete_posts' => 'delete_niaf_event',
     'delete_others_posts' => 'delete_others_niaf_event',
     'read_private_posts' => 'read_private_niaf_event',
     'edit_post' => 'edit_niaf_event',
     'delete_post' => 'delete_niaf_event',
     'read_post' => 'read_niaf_event'
    );

    $labels = array(
     'name' => 'Niaf Events Entries',
     'singular_name' => 'Niaf Events Entry',
     'menu_name' => 'Niaf Events Entries',
     'add_new' => 'Add New',
     'add_new_item' => 'Add New Niaf Events Entry',
     'edit' => 'Edit entry',
     'edit_item' => 'Edit Niaf Events Entry',
     'new_item' => 'New Niaf Events Entry',
     'view' => 'View Niaf Events Entry',
     'view_item' => 'View Niaf Events Entry',
     'search_items' => 'Search Niaf Events Entries',
     'not_found' => 'No Niaf Events Entries Found',
     'not_found_in_trash' => 'No Niaf Events Entries Found in Trash',
     'parent' => 'Parent Niaf Events Entry',);

    register_post_type('niaf_event', array(
         'label' => 'Niaf Events Entries',
         'description' => '',
         'public' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'capability_type' => 'niaf_event',
         'capabilities'=>$capabilities,
         'hierarchical' => false,
         'rewrite' => array('slug' => 'niaf_event'),
         'query_var' => true,
         'supports' => array('title','thumbnail','editor'),
         'labels' => $labels,
         )
    );

        flush_rewrite_rules(false);

        /********************** CUSTOM ROLE *****************************/
    add_role('niaf_event_author', 'Niaf Events Helper', array (
         'publish_niaf_event' => true,
         'edit_niaf_event' => true,
         'edit_others_niaf_event' => true,
         'delete_niaf_event' => true,
         'delete_others_niaf_event' => true,
         'read_private_niaf_event' => true,
         'edit_niaf_event' => true,
         'delete_niaf_event' => true,
         'read_niaf_event' => true,
         // more standard capabilities here
        'read' => true,

        )

    );
}


/* cutomized functions for theme niaft */
register_nav_menu('Primary', __('Main Menu', 'themeNiaft'));
register_nav_menu('Secondary', __('Footer Menu', 'themeNiaft'));
register_nav_menu('social_menu', __('Social Menu', 'themeNiaft'));
add_theme_support('post-thumbnails');

function themeNiaft_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'themeNiaft'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'themeNiaft_wp_title', 10, 2);

function themeNiaft_widgets_init() {

    register_sidebar(array(
        'name' => __('Main Sidebar', 'themeNiaft'),
        'id' => 'main_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'themeNiaft_widgets_init');
/* search form */

function custom_search_form($form) {
    $firstvalue = get_search_query();
    if ($firstvalue == "")
        $firstvalue = "Search";
    $svalue = "'Search'";
    $novalue = "''";
    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="wrap-search-form">' .
            '<input type="text" onfocus="if (this.value == ' . $svalue . ') {this.value = ' . $novalue . ';}" onblur="if (this.value == ' . $novalue . ') {this.value = ' . $svalue . ';}" value="' . $firstvalue . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
    </div>
    </form>';
    return $form;
}

add_filter('get_search_form', 'custom_search_form');

/* my new custom widget */

class LoginFormWidget extends WP_Widget {

    function LoginFormWidget() {
        parent::__construct(false, 'Login and search form');
    }

    function widget($args, $instance) {
        global $current_user;
        get_currentuserinfo();

        $redirect = get_permalink(get_the_ID());
        if (is_home()) {
            $redirect = esc_url(home_url('/'));
        }
        ?>
        <aside class="widget widget_loginform" id="loginform" rel="<?php echo $current_user->ID; ?>">          
            <div class="menu-social-menu-container">
                <?php get_search_form();
                ?> 
                <?php
                $pageregister = get_page_by_path('join-us');
                ?>
                <div class="loginform-btb-wrap"> 
                    <?php
                    
                    if ($current_user->ID == null) {
//                        setcookie("first_name", "", 1);
//                        setcookie("last_name", "", 1);
//                        setcookie("id_member", "", 1);
                        unset($_SESSION['firstName']);
                        unset($_SESSION['lastName']);
                        unset($_SESSION['member_id__c']);
                        unset($_SESSION['dateexpiration']);
                        ?>
                        <a href="/memberships/join-the-niaf/" class="btb_blue a-btb alignleft">Join Us</a>
                    <?php } else { ?>
                        <a href="<?php echo wp_logout_url($redirect); ?>" class="btb_blue a-btb alignleft">Log Out</a>
                    <?php } ?>
                    <a href="/support/make-a-charitable-donation/" class="btb_orange a-btb alignright">Donate</a></div>
                <?php if ($current_user->ID == null) { ?>
                    <form name="validar_form" id="validar_form" method="post" action="">

                        <br>Not a member? <a href="/memberships/join-the-niaf/">Register here</a><br><br>
                        <div class="wrap-input-login"><input class="text" type="text" id="email" name="email" onfocus="if (this.value == 'Email Address') {
                                    this.value = '';
                                }" onblur="if (this.value == '') {
                                            this.value = 'Email Address';
                                        }" value="Email Address"> </div>

                        <input class="text" type="text" name="website_login" id="website_login" value="Password">
                        <?php $pageforgot = get_page_by_path('forgot-your-password'); ?>
                        <span><a href="<?php echo get_permalink($pageforgot->ID); ?>">Forgot your password?</a></span><br><br>
                        <!--span><input type="radio" name="remember" id="remember"><label for="remember">Remember me</label> </span><br-->
                        <input class="button btb_blue gradient" id="submit" type="submit" value="Sign In">	
                        <span id="msg"></span>

                    </form>
                <?php } else {
                    ?>

                    <div class="loginform-btb-wrap">
                        <?php
//                        if (($_COOKIE["first_name"] == null) || ($_COOKIE["last_name"] == null)) {
//                            $userlogued = file(TEMPLATEPATH . '/temporalfile.txt');
//                            $userlogued = explode("|", $userlogued[0]);
//                            setcookie("first_name", $userlogued[0], time() + 3600 * 24);
//                            setcookie("last_name", $userlogued[1], time() + 3600 * 24);
//                            setcookie("id_member", $userlogued[2], time() + 3600 * 24);
//                            if (!$userlogued[0]) {
//                                setcookie("first_name", $current_user->user_nicename, time() + 3600 * 24);
//                                setcookie("last_name", $current_user->user_nicename, time() + 3600 * 24);
//                            }
//                            $fp = fopen(TEMPLATEPATH . "/temporalfile.txt", "w");
//                            fputs($fp, "");
//                            fclose($fp);
                        ?>	
            <!--                            <script type="text/javascript">

                                setTimeout(function() {
                                    window.location.href = "<?php echo $redirect; ?>";
                                }, 1000);

                            </script>-->
                        <?php // }
                        ?>
                        <div id="myniaf-logo"><a href="/my-niaf/"> <img src="<?php echo get_template_directory_uri();?>/img/my-NIAF-logo.png"></a></div>
                        <?php $page = get_page_by_path('change-password'); ?>
                        <div class="userlogued">
            <!--                            <span class="userdetail">Welcome<br>
                                <b><?php echo $_COOKIE["first_name"] . " " . $_COOKIE["last_name"]; ?><br><?php echo "Member ID: " . $_COOKIE["id_member"]; ?></b>
                                <a href="<?php echo get_permalink($page->ID); ?>">Change Password </a>
                                <a href="/update-information/">Edit my profile</a>
                            </span>-->
                            <span class="userdetail">
                                <div class="wrap-user-info">
                                    Welcome: <?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?><br>
                                    <?php echo "Member ID: " . $_SESSION['member_id__c']; ?><br>
                                    <?php echo "Membership Expiration: " . $_SESSION['dateexpiration']; ?>
                                </div>
                                <a href="<?php echo get_permalink($page->ID); ?>">Change Password </a>
                                <a href="/update-information/">Edit My Profile</a>
                            </span>
                        </div>
                        <br>					
                        <!--b>Member Area Sections</b> 
                        <?php
                        $taxonomy = 'member-category';
                        $tax_terms = get_terms($taxonomy);
                        ?>
                        <ul class="member-category">
                            <?php
                            foreach ($tax_terms as $tax_term) {
                                if (getCountPost($tax_term->slug) > 0) {
                                    echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf(__("View all posts in %s"), $tax_term->name) . '" ' . '>' . $tax_term->name . '</a></li>';
                                }
                            }
                            ?>
                        </ul-->

                    </div>
                <?php } ?>
            </div>
        </aside>	
        <?php
    }

    function update($new_instance, $old_instance) {
        // Save widget options
    }

    function form($instance) {
        // Output admin widget options form
    }

}

function formplugin_register_widgets() {
    register_widget('LoginFormWidget');
}

add_action('widgets_init', 'formplugin_register_widgets');
/* search post on user logued for catgeory taxonomy */

function getCountPost($term_slug) {
    global $current_user;
    get_currentuserinfo();
    //$term_slug = get_query_var( 'term' );
    $args = array(
        'post_type' => 'member-area',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => "wpcf-level-$current_user->user_lastname",
                'value' => strtoupper($current_user->user_lastname),
                'type' => 'STRING',
                'compare' => '='
            )
        ),
        'tax_query' => array(
            array(
                'taxonomy' => 'member-category',
                'field' => 'slug',
                'terms' => $term_slug
            )
        )
    );
    $c = 0;
    $myposts = new WP_Query($args);
    if ($myposts->have_posts()) :
        $c = 1;
    endif;
    return $c;
}

function get_primary_image($id, $size) {
    $featured = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size, false);
    if ($featured) {
        $childURL = $featured['0'];
    } else {
        $children = get_children(array('post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'numberposts' => 1));
        reset($children);
        $childID = key($children);
        //$childURL = wp_get_attachment_url($childID);
        $childArray = wp_get_attachment_image_src($childID, $size, false);
        $childURL = $childArray['0'];
        if (empty($childURL)) {
            $childURL = "";
        }
    }
    return ($childURL);
}

function xmlFeedNiaft($feed = '', $limit = 5) {
    if ($feed != '') { // if link feed 
        if ($xmlnewsrelease = @simplexml_load_file($feed)) { //check url the site					
            $obfnewsitem = $xmlnewsrelease->channel;  // get conten 'channel' the xml
            $output_ = Array(); // array  save for item the channel
            $i = 0;
            $max = 5;
            if ($limit < 1)
                $limit = 5;

            foreach ($xmlnewsrelease->channel->item as $ele) {

                if ($i + 1 > $limit)
                    break;

                if ($i + 1 > $max)
                    break;


                $title = $ele->title;
                $links = $ele->link;

                $output_[$i]["titulo"] = $title;
                $output_[$i]["link"] = $links;

                $media = $ele->children('http://search.yahoo.com/mrss/');

                $vidThumb = '';
                foreach ($media->content as $image_) {
                    $attrs = $image_->attributes();
                    $thumbnail = $attrs['url'];

                    $pos = strpos($thumbnail, "jpg");
                    if ($pos > 0) {
                        $vidThumb = $thumbnail;
                        //echo '<br>imagen -->'.$thumbnail.'<br>';
                    }
                }
                if ($vidThumb == "") {
                    $vidThumb = get_template_directory_uri() . "/img/pensieri-Italo-americani.jpg";
                }
                $output_[$i]["imagen"] = $vidThumb;
                $i = $i + 1;
            }
            unset($xmlnewsrelease);
            return $output_;
        }
    }
}

function controla_acceso_panel_admin() {
    global $current_user;
    get_currentuserinfo();
    if ($current_user->user_level > 0 and $current_user->user_level < 5) {
        wp_redirect(get_bloginfo('url'));
        exit;
    }
}

add_action('admin_init', 'controla_acceso_panel_admin', 1);

/* add custom field in setting */
$new_general_setting = new new_general_setting();

class new_general_setting {

    function new_general_setting() {
        add_filter('admin_init', array(&$this, 'register_fields'));
    }

    function register_fields() {
        register_setting('general', 'footer_copy', 'esc_attr');
        add_settings_field('fav_buylink', '<h3>footer text</h3><label for="footer_copy">' . __('Put text, display in footer', 'footer_copy') . '</label>', array(&$this, 'fields_html'), 'general');
    }

    function fields_html() {
        $value = get_option('footer_copy', '');
        echo '<textarea id="footer_copy" name="footer_copy" class="large-text code">' . $value . '</textarea>';
    }

}

function mirriad_image_sizes() {
    add_image_size('image-gallery', 150, 150, true);
    add_image_size('image-highlights', 288, 145, true);
    add_image_size('image-featured', 285, 190, true);
    add_image_size('image-slide-banner', 650, 390, true);
}

add_action('init', 'mirriad_image_sizes', 0);

function new_excerpt_more($more) {
    return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read More</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

add_filter('auth_cookie_expiration', 'keep_me_logged_in');

function keep_me_logged_in($expirein) {
    return 3600; // 1 year in seconds
}
