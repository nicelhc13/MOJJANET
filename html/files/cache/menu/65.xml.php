<?php define('__XE__', true); require_once('/home/laundary/html/config/config.inc.php'); $oContext = Context::getInstance(); $oContext->init(); header("Content-Type: text/xml; charset=UTF-8"); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); header("Cache-Control: no-store, no-cache, must-revalidate"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); $lang_type = Context::getLangType(); $is_logged = Context::get('is_logged'); $logged_info = Context::get('logged_info'); $site_srl = 0;$site_admin = false;if($site_srl) { $oModuleModel = getModel('module');$site_module_info = $oModuleModel->getSiteInfo($site_srl); if($site_module_info) Context::set('site_module_info',$site_module_info);else $site_module_info = Context::get('site_module_info');$grant = $oModuleModel->getGrant($site_module_info, $logged_info); if($grant->manager ==1) $site_admin = true;}if($is_logged) {if($logged_info->is_admin=="Y") $is_admin = true; else $is_admin = false; $group_srls = array_keys($logged_info->group_list); } else { $is_admin = false; $group_srls = array(); } $oContext->close(); ?><root><node node_srl="67" parent_srl="0" menu_name_key='Welcome Page' text="<?php if(true) { $_names = array("en"=>'Welcome Page',"ko"=>'Welcome Page',"jp"=>'Welcome Page',"zh-CN"=>'Welcome Page',"zh-TW"=>'Welcome Page',"fr"=>'Welcome Page',"de"=>'Welcome Page',"ru"=>'Welcome Page',"es"=>'Welcome Page',"tr"=>'Welcome Page',"vi"=>'Welcome Page',"mn"=>'Welcome Page',); print $_names[$lang_type]; }?>" url="<?php print(true?'index':"")?>" href="<?php print(true?getSiteUrl('', '','mid','index'):"")?>" is_shortcut='N' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="133" parent_srl="0" menu_name_key='게시판' text="<?php if(true) { $_names = array("en"=>'Welcome Page',"ko"=>'Welcome Page',"jp"=>'Welcome Page',"zh-CN"=>'Welcome Page',"zh-TW"=>'Welcome Page',"fr"=>'Welcome Page',"de"=>'Welcome Page',"ru"=>'Welcome Page',"es"=>'Welcome Page',"tr"=>'Welcome Page',"vi"=>'Welcome Page',"mn"=>'Welcome Page',"en"=>'게시판',"ko"=>'게시판',"jp"=>'게시판',"zh-CN"=>'게시판',"zh-TW"=>'게시판',"fr"=>'게시판',"de"=>'게시판',"ru"=>'게시판',"es"=>'게시판',"tr"=>'게시판',"vi"=>'게시판',"mn"=>'게시판',); print $_names[$lang_type]; }?>" url="<?php print(true?'#':"")?>" href="<?php print(true?'#':"")?>" is_shortcut='Y' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>"><node node_srl="135" parent_srl="133" menu_name_key='꿀잼' text="<?php if(true) { $_names = array("en"=>'꿀잼',"ko"=>'꿀잼',"jp"=>'꿀잼',"zh-CN"=>'꿀잼',"zh-TW"=>'꿀잼',"fr"=>'꿀잼',"de"=>'꿀잼',"ru"=>'꿀잼',"es"=>'꿀잼',"tr"=>'꿀잼',"vi"=>'꿀잼',"mn"=>'꿀잼',); print $_names[$lang_type]; }?>" url="<?php print(true?'honey':"")?>" href="<?php print(true?getSiteUrl('', '','mid','honey'):"")?>" is_shortcut='N' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /><node node_srl="137" parent_srl="133" menu_name_key='개꿀잼' text="<?php if(true) { $_names = array("en"=>'꿀잼',"ko"=>'꿀잼',"jp"=>'꿀잼',"zh-CN"=>'꿀잼',"zh-TW"=>'꿀잼',"fr"=>'꿀잼',"de"=>'꿀잼',"ru"=>'꿀잼',"es"=>'꿀잼',"tr"=>'꿀잼',"vi"=>'꿀잼',"mn"=>'꿀잼',"en"=>'개꿀잼',"ko"=>'개꿀잼',"jp"=>'개꿀잼',"zh-CN"=>'개꿀잼',"zh-TW"=>'개꿀잼',"fr"=>'개꿀잼',"de"=>'개꿀잼',"ru"=>'개꿀잼',"es"=>'개꿀잼',"tr"=>'개꿀잼',"vi"=>'개꿀잼',"mn"=>'개꿀잼',); print $_names[$lang_type]; }?>" url="<?php print(true?'superhoney':"")?>" href="<?php print(true?getSiteUrl('', '','mid','superhoney'):"")?>" is_shortcut='N' desc='' open_window='N' expand='N' normal_btn='' hover_btn='' active_btn='' link="<?php if(true) {?><?php print $_names[$lang_type]; ?><?php }?>" /></node></root>