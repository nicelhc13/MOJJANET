<?php
	/**
	 * @class  sejin7940_voteView
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 View class
	 **/

	class sejin7940_voteView extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
            /**
             * 스킨 경로를 미리 template_path 라는 변수로 설정함
             * 스킨이 존재하지 않는다면 xe_board로 변경
             **/
            $template_path = sprintf("%sskins/%s/",$this->module_path, $this->module_info->skin);
            if(!is_dir($template_path)||!$this->module_info->skin) {
                $this->module_info->skin = 'default';
                $template_path = sprintf("%sskins/%s/",$this->module_path, $this->module_info->skin);
            }
            $this->setTemplatePath($template_path);			
		}


		function dispSejin7940_voteOwnVote() {
            $oMemberModel = &getModel('member');
			$oSejin7940_voteModel = &getModel('sejin7940_vote');

            // A message appears if the user is not logged-in
            if(!$oMemberModel->isLogged()) return $this->stop('msg_not_logged');

            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;

            $module_srl = Context::get('module_srl');
            Context::set('module_srl',Context::get('selected_module_srl'));
            Context::set('search_target','member_srl');
            Context::set('search_keyword',$member_srl);

			$obj->order_type = 'desc';
			if(Context::get('module_srl')) $obj->module_srl = Context::get('module_srl');
			if(Context::get('page')) $obj->page = Context::get('page');
			$obj->member_srl = $member_srl;

			$output = $oSejin7940_voteModel->getDocumentVotedLog($obj);

			$voted_list = $output->data;
			
			Context::set('total_count', $output->total_count);
			Context::set('total_page', $output->total_page);
			Context::set('page', $output->page);

			Context::set('voted_list', $voted_list);
			Context::set('page_navigation', $output->page_navigation);


            Context::set('module_srl', $module_srl);
            $this->setTemplateFile('vote_list');
		}


	}
?>