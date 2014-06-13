<?php
if ( !defined( 'ABSPATH' ) ) exit;


if(!function_exists("captchagarb_comment_form")):

function captchagarb_comment_form($postID) {

if(get_option("cgarb_enable") != "yes"){
	return false;
}
if(get_option("cgarb_off4_loginin") == "yes") {
if(is_user_logged_in()) {
	return false;
}
}

$out = '
<div class="captchagarb" id="captchagarb">
<span class="puzit">Drag it to solve it</span>
<img src="'.CAPTCHAGARB_PATH.'/loader.gif" style="display:none;" class="loader"/>
<div class="puz_container">

</div>
<a href="javascript:load_puzzle()" class="refr"> Refresh </a>
</div>
<input type="hidden" id="captchagarb_code_comment" name="captchagarb_code_comment"/>
<input type="hidden" id="captchagarb_coupon" name="captchagarb_coupon"/>
';
$out = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$out), "\0..\37'\\"))); 

echo '
<style type="text/css">
'.get_option("cgarb_css").'
</style>
<script type="text/javascript">
<!--
	
function load_puzzle() {
	var is_mnousedown = "0";
	jQuery("#captchagarb").find(".loader").css("display","block");
	jQuery.post("?captchagrab=get_puzzle", {postID: "'.$postID.'",captchagarb_coupon:jQuery("#captchagarb_coupon").val()},
 	function(d) {
	jQuery("#captchagarb").find(".loader").hide();
    jQuery.globalEval(d);
	
	jQuery("#captchagarb").find(".puz_container").find("ul").find("li").each(function() {
	
	jQuery(this).bind("mousedown",function(e) {
	is_mnousedown = "1";
	e.preventDefault();
	jQuery("#captchagarb").data("last_left",e.pageX).data("last_top",e.pageY).data("last_puz",jQuery(this));
	}); //jQuery(this).bind("touchmove"
	
	jQuery(this).bind("mouseup",function(e) {
	is_mnousedown = "0";
	currid = jQuery(this).attr("id");
	lastid = jQuery(jQuery("#captchagarb").data("last_puz")).attr("id");
	//change curr ID to LAST
	jQuery(this).attr("id",lastid);
	//change last id to curr
	jQuery(jQuery("#captchagarb").data("last_puz")).attr("id",currid);
	
	jQuery(this).parent().find("li").each(function() {
		jQuery(this).stop().css({"opacity":"","cursor":""});
	});
	captchagarb_recode();
	});
	
	jQuery(this).bind("hover",function() {
	if(is_mnousedown == "0") {
		return true;
	}
	currid = jQuery(this).attr("id");
	lastid = jQuery(jQuery("#captchagarb").data("last_puz")).attr("id");
	if(!lastid|| lastid.lendth == 0) {
		return true;
	}
	if(currid != lastid) {
		jQuery(this).css({"cursor":"crosshair"}).stop().animate({"opacity":"0.5"});
	}	
	});
	
	jQuery(this).bind("mouseout",function() {
		jQuery(this).stop().css({"opacity":"","cursor":""});
	});
	
	}); 	
	});
	
	function captchagarb_recode() {
		code_var = "";
	jQuery("#captchagarb").find("li").each(function() {
	if(code_var == ""){
		code_var = jQuery(this).attr("id");
	} else {
		code_var = code_var+"|"+jQuery(this).attr("id");
	}
	});
	jQuery("#captchagarb_code_comment").val(code_var);
	
	}
	
}

jQuery("document").ready(function() { 
	jQuery("#captchagarb").remove();
	jQuery("textarea[name=\'comment\']").first().after("'.$out.'");
 	load_puzzle(); 
	jQuery("#captchagarb_ver").hide(); 
 });

//-->
</script>
<p style="font-size:2px;color:gray;" id="captchagarb_ver">Captcha Garb ('.CAPTCHAGARB_VERSION.')</p>
';				

}

endif; //if(!function_exists("captchagarb_comment_form")):


if(!function_exists("captcha_grab_init_get_puzzle")):	
	
	function captcha_grab_init_get_puzzle() {
	
		if(get_option("cgarb_enable") != "yes"){
		return false;
		}

		if (!session_id()){
				session_start();
		}
	
		if(!isset($_GET["captchagrab"])) {
			return false;
		}
		
		if($_GET["captchagrab"] == "get_puzzle") { 
		
		if(cgarb_post("postID") == "") {
			echo 'alert("Unexpected Error");';
			exit;
		}
		if(!is_numeric(cgarb_post("postID"))) {
			echo 'alert("Unexpected Error");';
			exit;
		}
		$_lastcoupon = cgarb_post("captchagarb_coupon");
		$postID = cgarb_post("postID");
		
		@ delete_transient($_lastcoupon.'_'.$postID.'_cgarb'); //delete old coupon transient if any
		
		$captcha_key = array(arand().uniqid(),arand().uniqid(),arand().uniqid(),arand().uniqid());
		
		$puzzle[$captcha_key[0]] = 'background-position:0px 0px;';		
		$puzzle[$captcha_key[1]] = 'background-position:75px 0px;';		
		$puzzle[$captcha_key[2]] = 'background-position:0px 75px;';		
		$puzzle[$captcha_key[3]] = 'background-position:75px 75px;';	
		
		$_code = implode("|",$captcha_key);
		$_coupon = arand().uniqid();
		
		set_transient( $_coupon.'_'.$postID.'_cgarb', $_code, 60*60*1 ); //Exire after one hour.
		
		$puzzle = shuffle_the_puzzle($puzzle); //lets mix up
		
		$out = '<style type="text/css">
		.captchagarb .puz_container ul { overflow:hidden;list-style:none; }
		.captchagarb .puz_container ul li { display:block; background-image:url(?captchagrab=puzimg&i='.uniqid().');  float:left; width:75px; height:75px; overflow:hidden; margin:0px; padding:0px; clear:none; }';
		foreach($puzzle as $key => $css) {
			$out .= ' #'.$key.' { '.$css.' }';
		}		
		$out .= '</style>';
		$out .= '<ul>';
		foreach($puzzle as $class => $css) {
		$out .= '<li id="'.$class.'"></li>';
		}
		$out .= '</ul>';
		$out = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$out), "\0..\37'\\"))); 
		echo 'jQuery(".captchagarb").find(".puz_container").html("").append("'.$out.'"); jQuery("#captchagarb_coupon").val("'.$_coupon.'");';
			exit;
		}
		
	}
	
endif; //if(!function_exists("captcha_grab_init_get_puzzle")):

if(!function_exists("captcha_grab_init_get_puzzleimg")):

function captcha_grab_init_get_puzzleimg() {
	
	if(!isset($_GET["captchagrab"])) {
			return false;
		}
		
		if($_GET["captchagrab"] == "puzimg") { 
		
		$puzzle_images = array_diff(scandir(CAPTCHAGARB_DIR."/puzzle/"), array('..', '.'));
		shuffle($puzzle_images);
		$rand_key = array_rand($puzzle_images,1);
		$get_img = file_get_contents(CAPTCHAGARB_DIR."/puzzle/".$puzzle_images[$rand_key]);
		header('Content-type: image/jpg');
		echo $get_img;
		exit;
		}
	
	
}

endif;  //if(!function_exists("captcha_grab_init_get_puzzleimg")):

?>