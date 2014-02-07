<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--> 
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">		
        <meta name="viewport" content="width=device-width">		
        <title><?php wp_title('|', true, 'right'); ?></title>        
		<link rel="profile" href="http://gmpg.org/xfn/11">        
                <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">		
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicon.png" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css?<?php echo date('ymdhis'); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/fancyapp/jquery.fancybox.css?<?php echo date('ymdhis'); ?>">	
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css?<?php echo date('ymdhis'); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/calendar.css?<?php echo date('ymdhis'); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/jquery.bxslider/jquery.bxslider.css?<?php echo date('ymdhis'); ?>">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/js/jquery.ad-gallery/jquery.ad-gallery.css?<?php echo date('ymdhis'); ?>">
        	
        <script src="<?php echo get_template_directory_uri();?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>		
        <?php wp_head(); ?>
		
    </head>
<?php 
    $redirect = get_permalink( get_the_ID());
    if(is_home())
    $redirect = esc_url( home_url( '/' ) );
global $current_user;
    get_currentuserinfo();
     
  

?>
<body <?php body_class(); ?> rel="<?php echo get_template_directory_uri(); ?>">
<!--div id="preloader">
  <div id="status">&nbsp;</div>
</div-->
<div id="main-wrapper" class="wrapper shadow-box bg-white main-container-full" rel="<?php echo $redirect;?>" >
	<header class="header-container" rel="<?php bloginfo('url'); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo"><img src="<?php echo get_template_directory_uri();?>/img/logo.png"> </a>
        <div class="header-title">THE NATIONAL ITALIAN AMERICAN FOUNDATION</div>
        <nav class="header-nav">
            <?php 

$defaults = array(
    'theme_location'  => 'Primary',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
);
wp_nav_menu( $defaults );
            ?>
        </nav>
    </header>
		

