<?php
if ( !defined( 'ABSPATH' ) ) exit;
/**
Plugin Name: Captcha Garb
Plugin URI: http://webgarb.com/captchagarb
Description: CaptchaGarb is a stylish puzzle captcha for comment to stop spammers.
Version: 1.5
Author: webgarb
Author URI: http://webgarb.com
**/
define("CAPTCHAGARB_VERSION","1.5");
define("CAPTCHAGARB_PATH",plugins_url("",__FILE__));
define("CAPTCHAGARB_DIR",str_replace("\/","/",dirname(__FILE__)) );


require CAPTCHAGARB_DIR."/install.php";
require CAPTCHAGARB_DIR."/functions.php";
require CAPTCHAGARB_DIR."/output_funtions.php";
require CAPTCHAGARB_DIR."/captcha_validate.php";
require CAPTCHAGARB_DIR."/captcha-garb_admin.php";

/*
captcha_garb_enqueue_scripts()
*/
function captcha_garb_enqueue_scripts() {
	wp_enqueue_script(array('jquery'));
}
add_action( 'wp_enqueue_scripts', 'captcha_garb_enqueue_scripts' );
/*
captchagarb_comment_form() @ output_funtions.php
*/
add_action("comment_form","captchagarb_comment_form");
/*
captcha_grab_get_puzzle() @  output_funtions.php
*/
add_action("init","captcha_grab_init_get_puzzle");
add_action("init","captcha_grab_init_get_puzzleimg");
/*
captcha_grab_comment_action() @ captcha_validate.php
*/
add_action("pre_comment_on_post","captcha_grab_comment_action");
?>