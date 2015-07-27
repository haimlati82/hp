<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package hp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/vendor/animsition.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/common.css">

</head>

<body <?php body_class(); ?>>
<div class="b-wrapper animsition">
<header class="s-header">
    <div class="container">
        <div class="sec-left"><a href="#" class="i-logo">
                <svg data-svg="logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="102px" height="102px" viewbox="0 0 102 102" enable-background="new 0 0 102 102" xml:space="preserve" class="svg">
                <path fill="#1197D4" d="M100.9,51c0-27.6-22.3-49.9-49.9-49.9c-0.8,0-1.5,0-2.2,0.1L38.6,29.2h8.9c5.3,0,8.1,4.1,6.3,9L41.2,72.9 l-10.6,0l13.5-37.1h-7.9L22.7,72.9H12.1L28,29.2h0l9.6-26.3C16.5,8.8,1.1,28.1,1.1,51c0,23.6,16.3,43.3,38.3,48.5l9.3-25.4h0 L65,29.2h19.5c5.3,0,8.1,4.1,6.3,9L79.8,68.6c-0.8,2.3-3.5,4.2-6,4.2h-14l-10.2,28c0.5,0,1,0,1.5,0C78.6,100.9,100.9,78.6,100.9,51 M81.2,35.7h-7.9L62.1,66.3h7.9L81.2,35.7"></path>
              </svg></a></div>
        <div class="sec-right">
            <?php header_menu() ?>
            <form action="" class="f-search">
                <input type="text" placeholder="אני רוצה לחפש..." class="search js-search">
                <button class="i-search js-i-search">
                    <svg version="1.1" viewbox="0 0 18 18" class="svg">
                        <path d="M6.8,13.6c-3.7,0-6.7-3-6.7-6.7c0-3.7,3-6.7,6.7-6.7c3.7,0,6.7,3,6.7,6.7C13.5,10.6,10.5,13.6,6.8,13.6z  M6.8,1.1c-3.2,0-5.8,2.6-5.8,5.8c0,3.2,2.6,5.8,5.8,5.8c3.2,0,5.8-2.6,5.8-5.8C12.6,3.7,10,1.1,6.8,1.1z M3.3,9.4 c0.1-0.1,0.2-0.2,0.2-0.3c0-0.1,0-0.2,0-0.3C3.1,8.2,2.9,7.6,2.9,6.9c0-1.8,1.2-3.3,2.9-3.7C5.9,3.1,6,3.1,6,3 c0.1-0.1,0.1-0.2,0-0.3c0-0.2-0.2-0.3-0.4-0.3l-0.1,0C3.5,2.9,2,4.7,2,6.9c0,0.8,0.2,1.6,0.6,2.4C2.7,9.4,2.9,9.5,3,9.5 C3.1,9.5,3.2,9.5,3.3,9.4z M16.3,18c-0.4,0-0.8-0.1-1-0.4l-3.8-3.8c-0.4-0.4-0.4-1.1,0-1.6l0.7-0.7c0.2-0.2,0.5-0.3,0.8-0.3 c0.3,0,0.6,0.1,0.8,0.3l3.8,3.8c0.4,0.4,0.5,1.1,0.3,1.6l-0.9,0.9C16.7,18,16.5,18,16.3,18z M13,12.1c-0.1,0-0.1,0-0.2,0.1l-0.7,0.7 c-0.1,0.1-0.1,0.2,0,0.3l3.8,3.8c0.1,0.1,0.3,0.1,0.4,0.1c0.1,0,0.1,0,0.1,0l0.6-0.6c0-0.1,0-0.4-0.1-0.5l-3.8-3.8 C13.1,12.1,13.1,12.1,13,12.1z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <?php page_menu(); ?>

</header>
