<?php
if ( !defined( 'ABSPATH' ) ) exit;

if(!function_exists("captcha_grab_comment_action")):
	
	function captcha_grab_comment_action($postID) {
		
		if(get_option("cgarb_enable") != "yes"){
		return false;
		}
		
		if(get_option("cgarb_off4_loginin") == "yes"){ //if disabled for loggedin users.
		if(is_user_logged_in()) {
			return false;
		}
		}
				
		$_coupon = cgarb_post("captchagarb_coupon");
		
		$post_code = cgarb_post("captchagarb_code_comment");
		if($post_code == "") {
			@ delete_transient($_coupon.'_'.$postID.'_cgarb'); //delete old coupon transient if any
			wp_die( __('<strong>ERROR</strong>: Please solve the puzzle correctly to post comment.') );
		}

		$session_code = get_transient($_coupon."_".$postID."_cgarb");
		if($post_code != $session_code) {
			wp_die( __('<strong>ERROR</strong>: Please solve the puzzle correctly to post comment.') );
		}
		@ delete_transient($_coupon.'_'.$postID.'_cgarb'); //delete old coupon transient if any	
		return true;		
	}
	
endif; //if(!function_exists("captcha_grab_comment_action")):
?>