<?php
    if(!defined("__ZBXE__")) exit();

    /**
     * @file sejin7940_addvote.addon.php
     * @source sol (ngleader@gmail.com)
     * @author sejin7940 (sejin7940@nate.com)
     * @brief 추천 버튼 노출 애드온
     **/

    if($called_position == 'after_module_proc' && Context::getResponseMethod()!="XMLRPC") {
		$document_srl = Context::get('document_srl');
		if($document_srl){
			$oDocumentModel = &getModel('document');
			$oDocument = $oDocumentModel->getDocument($document_srl);
			
			$var->blamed_count = $oDocument->get('blamed_count');
			$var->voted_count = $oDocument->get('voted_count');

			if($addon_info->display_declared=='Y') {
				$args_declared->document_srl = $document_srl;
				$output = executeQuery('document.getDocumentDeclaredLogInfo', $args_declared);
				$var->declared_count = (int)$output->data->count;
			}
			
			$var->document_srl = $document_srl;
			Context::set('var',$var);
			$oTemplate_ = &TemplateHandler::getInstance();

			$output_ = $oTemplate_->compile('./addons/sejin7940_addvote/tpl','addvote');

			Context::addHtmlHeader(sprintf("<script type=\"text/javascript\"> var addon_addvote_var='%s';var addon_addvote_logged=%s;xe.lang.msg_not_logged='%s';xe.lang.success_voted = '%s';xe.lang.success_blamed = '%s'; xe.lang.success_declared = '%s'; </script>", trim($output_),(Context::get('logged_info')?'true':'false'), Context::getLang('msg_not_logged'),Context::getLang('success_voted'),Context::getLang('success_blamed'),Context::getLang('success_declared')));


			if($addon_info->use_confirm=='Y') {
				Context::addJsFile('./addons/sejin7940_addvote/addvote_confirm.js');
			}
			else {
				Context::addJsFile('./addons/sejin7940_addvote/addvote.js');
			}

			Context::addCSSFile('./addons/sejin7940_addvote/tpl/addvote.css');
	
			if($addon_info->display_voted=='N') Context::addHtmlFooter("<script type=\"text/javascript\"> jQuery(document).ready(function() { jQuery('.btn_voted').parent().css('display','none'); });</script>");
			if($addon_info->display_blamed=='N') Context::addHtmlFooter("<script type=\"text/javascript\"> jQuery(document).ready(function() { jQuery('.btn_blamed').parent().css('display','none'); });</script>");
			if($addon_info->display_declared!='Y') Context::addHtmlFooter("<script type=\"text/javascript\"> jQuery(document).ready(function() { jQuery('.btn_declared').parent().css('display','none'); });</script>");
			if($addon_info->display_scrap!='Y') Context::addHtmlFooter("<script type=\"text/javascript\"> jQuery(document).ready(function() { jQuery('.btn_scrap').parent().css('display','none'); });</script>");

			$con = Context::getInstance();
			unset($oDocument,$var,$output_);
		}
    }
?>
