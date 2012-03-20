<?php
	
include_once('./config/config.php');												                                       // Include Configuration
include_once(ROOT_DIR_PATH.'connection/dbConnection.php');				                   				   // Include Database Connection
include_once(ROOT_DIR_PATH.'classes/common/template_reader.class.php');		          				 // Include Templates Reading Class
include_once(ROOT_DIR_PATH.'classes/user/user_authentication.class.php');               // Include UserAuthentication Class

$btfb_obj_authentication      = new UserAuthentication();
$btfb_obj_template            = new TemplateReader;		

$btfb_array_value             = array_merge($btfb_array_value,$btfb_site_language_label);
	   
if(isset($_POST['account']))
{
	$btfb_response               = $btfb_obj_authentication -> sendAccountReactivationRequest();
	$btfb_array_value['center']  = $btfb_response; 		
}
else 
{
  if($_SESSION['System_Language']=="serbian")
  $btfb_array_value['center'] = $btfb_obj_template->showRegForm(ROOT_LANG_TEMPLATE_PATH."serbian/account_reactivation.html",$btfb_array_value);		
  else 
  $btfb_array_value['center'] = $btfb_obj_template->showRegForm(ROOT_LANG_TEMPLATE_PATH."english/account_reactivation.html",$btfb_array_value);		
	
}


$btfb_array_value['top']      = $btfb_obj_template->showRegForm(ROOT_TEMPLATE_PATH."user/index_topnotlogged.html",$btfb_array_value);		
$btfb_array_value['bottom']   = $btfb_obj_template->showRegForm(ROOT_TEMPLATE_PATH."user/index_bottomnotlogged.html",$btfb_array_value);		


echo $btfb_obj_template->showRegForm(ROOT_TEMPLATE_PATH."user/user_template_nologin.html",$btfb_array_value);

?>