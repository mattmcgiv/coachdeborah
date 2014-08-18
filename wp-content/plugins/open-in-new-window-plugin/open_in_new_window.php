<?PHP
/*
Plugin Name: Open in New Window Plugin
Plugin URI: http://www.BlogsEye.com/
Description: Opens external links in a new window, keeping your blog page in the browser so you don't lose surfers to another site.
Version: 2.3
Author: Keith P. Graham
Author URI: http://www.BlogsEye.com/

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
// just to be absolutely safe
if (!defined('ABSPATH')) exit;


/************************************************************
* 	kpg_open_in_new_window_fixup()
*	Shows the javascript in the footer so that the links can be adjusted
*
*************************************************************/
function kpg_open_in_new_window_fixup() {
	// this is the open in new window functionality.
	// this is hooked in several places. Remove the hooks the first time anyone gets here
	remove_action( 'wp_footer', 'kpg_open_in_new_window_fixup' );
	remove_action( 'get_footer', 'kpg_open_in_new_window_fixup' );
	$dir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$js = addslashes($dir.'open_in_new_window.js');
	$options=kpg_oinw_get_options();
	extract($options);
	if (empty($checktypes)) $checktypes='false';
	//$checktypes="true"; // perhaps in the next release I'll make this an option.
?>

<!-- added by open in new window plugin -->
<script language="javascript" type="text/javascript">
	var kpg_oinw_checktypes=<?php echo $checktypes; ?>;
	var kpg_oinw_list=new Array(".pdf",".mp3",".jpg",".gif",".tiff",".png",".doc",".rtf",".docx",".xls",".wmv",".mov",".avi",".zip",".rar",".7z",".arc");
</script>
<script language="javascript" type="text/javascript" src="<?php echo $js; ?>"></script>
<!-- end of open in new window plugin -->

<?php
}
function kpg_open_in_new_window_control()  {
	oinw_load_control();
	kpg_open_in_new_window_control_2();

}
function oinw_load_control() {
	require_once('includes/oinw_options.php');
}
// no unistall because I have not created any meta data to delete.
function kpg_open_in_new_window_init() {
   add_options_page('Open in new window', 'Open in new window', 'manage_options','openinnewwindow','kpg_open_in_new_window_control');
}
  // Plugin added to Wordpress plugin architecture
	add_action('admin_menu', 'kpg_open_in_new_window_init');	
	add_action( 'wp_footer', 'kpg_open_in_new_window_fixup' );
	add_action( 'get_footer', 'kpg_open_in_new_window_fixup' );
	
// get options
function kpg_oinw_get_options() {
	// before we begin we need to check if we need to redirect the options to blog 1
	$opts=get_option('kpg_open_in_new_window_options');
	if (empty($opts)||!is_array($opts)) $opts=array();
	$options=array(
		'checktypes'=>'true' 
	);
	$ansa=array_merge($options,$opts);
	if ($ansa['checktypes']!='true') $ansa['checktypes']='false';
	return $ansa;
}// done

?>
