<?php
/**
 * Created by PhpStorm.
 * User: Inbal
 * Date: 23/07/2015
 * Time: 15:07
 */
add_action( 'wp_ajax_send_birthday_mail', 'send_birthday_mail' );
add_action( 'wp_ajax_nopriv_send_birthday_mail', 'send_birthday_mail' );
function send_birthday_mail(){
    $employee_mail = $_POST['employee_mail'];
    $from_name = $_POST['from_name'];
    $from_mail = $_POST['from_mail'];
    $free_text = $_POST['free_text'];
    $image = $_POST['image'];
    $image = str_replace(WP_CONTENT_URL , WP_CONTENT_DIR , $image);
    $text = $_POST['text'];
    $to = $employee_mail;
    $subject = $text;
    $body = $free_text;
    $attachments = array($image);
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers , $attachments  );

	die();
}