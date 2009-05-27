<?php
/*
Plugin Name: Easy Comment Uploads
Plugin URI: http://wiki.langtreeshout.org/plugins/commentuploads
Description: Allow your users to easily upload images in their comments.
Author: Tom Wright
Version: 0.10
Author URI: http://langtreeshout.org/
*/
//echo "test";
if( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
//$upload_dir =  get_option('upload_path') . '/comments/';
$upload_dir =  WP_CONTENT_DIR . '/upload/';
//$upload_url = get_option('siteurl') . '/wp-content/uploads/comments/';
$upload_url = get_option('siteurl') . '/wp-content/upload/';

$plugin_dir = dirname(__FILE__) . '/';

// Replaces [img] tags in comments with linked images (with lightbox support)
// Accepts either [img]image.png[/img] or [img=image.png]
// Thanks to Trevor Fitzgerald (http://) for providing an invaluable example for
// this regualar expersions code.
function insert_links($content){
$content = preg_replace('/\[img=?\]*(.*?)(\[\/img)?\]/e', '"<a href=\"$1\" rel=\"lightbox[comments]\"> <img src=\"$1\" style=\"max-width: 100%\" alt\"" . basename("$1") . "\" /></a>"', $content);
$content = preg_replace('/\[file=?\]*(.*?)(\[\/file)?\]/e', '"<a href=\"$1\">$1</a>"', $content);
return $content;
}

// Inserts an iframe below the comment upload form which allows users to upload
// files and returns a [img] link.
function comment_upload_form(){
		global $plugin_dir;
		echo $plugin_dir . "form.php";
    @require ($plugin_dir . "form.php");
}

function comment_upload_init() {
    wp_enqueue_script('swfupload');
}

function comment_upload_deactivate() {
	/* Deprecated */
}

// Register code with wordpress
//register_deactivation_hook( __FILE__, 'comment_upload_deactivate' );
add_filter('comment_text', 'insert_links');
add_action('comment_form', 'comment_upload_form');
add_action('init', comment_upload_init);

?>
