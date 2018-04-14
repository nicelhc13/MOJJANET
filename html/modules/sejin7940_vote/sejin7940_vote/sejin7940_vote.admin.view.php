<?php
	/**
	 * @class  sejin7940_voteAdminView
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 AdminView class
	 **/

	class sejin7940_voteAdminView extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
            // Get teh configuration information
            $oModuleModel = &getModel('module');
            $config = $oModuleModel->getModuleConfig('sejin7940_vote');
            // Set the configuration variable
            Context::set('config', $config);				


			// 템플릿 폴더 지정
			$this->setTemplatePath($this->module_path.'tpl');				
		}



		function dispSejin7940_voteAdminMoveList() {

			$args->page = Context::get('page');
			$oSejin7940_voteAdminModel = &getAdminModel('sejin7940_vote');
			$output = $oSejin7940_voteAdminModel->getDocumentMoveAutoList($args);
            if(!$output->toBool()) return $output;

			// 템플릿에 쓰기 위해서 context::set
			$oMemberModel = &getModel('member');
			Context::set('oMemberModel', $oMemberModel);
			Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('move_list', $output->data);
            Context::set('page_navigation', $output->page_navigation);

            $group_list = $oMemberModel->getGroups();
            Context::set('group_list', $group_list);

			// 템플릿 세팅
			$this->setTemplatePath($this->module_path.'tpl');
			$this->setTemplateFile('move_list');
		}


        /**
         * @brief 추천시 글 이동/삭제 등록화면
         **/
        function dispSejin7940_voteAdminMoveInsert() {
			$this->setTemplateFile('move_insert');
        }



        /**
         * @brief 자동글올리기 수정화면
         **/
        function dispSejin7940_voteAdminMoveModify() {

            $args->auto_srl = $auto_srl = Context::get('auto_srl');

			$oSejin7940_voteModel = &getModel('sejin7940_vote');
			$output = $oSejin7940_voteModel->getDocumentMoveAuto($args);

	    	$val = $output->data;
			//$groupexpire_srl변수가 존재하지 않거나 groupexpire_srl에 맞는 데이터가 존재하지 않으면 오류 발생
			if(!$val || !$auto_srl) return $this->stop('선택된 자동 이동/복사 데이터가 없습니다.');
            if($val->auto_srl == $auto_srl) Context::set('val', $val);

			// 템플릿 파일 지정
			$this->setTemplateFile('move_modify');
        }





		// 추천 글 내역 ( sejin7940 )
		function dispSejin7940_voteAdminVotedLog() {

			$search_target = Context::get('search_target');
			$search_keyword = Context::get('search_keyword');

			if($search_target=='member_srl' && $search_keyword) $args->member_srl = $search_keyword;
			elseif($search_target=='user_id' && $search_keyword) {
				$oMemberModel = &getModel('member');
				$args->member_srl = $oMemberModel->getMemberSrlByUserID($search_keyword);
				if(!$args->member_srl) $args->member_srl=0;
			}
			elseif($search_target=='email_address' && $search_keyword) {
				$oMemberModel = &getModel('member');
				$args->member_srl = $oMemberModel->getMemberSrlEmailAddress($search_keyword);
				if(!$args->member_srl) $args->member_srl=0;
			}
			elseif($search_target=='nick_name' && $search_keyword) {
				$oMemberModel = &getModel('member');
				$args->member_srl = $oMemberModel->getMemberSrlByNickName($search_keyword);
				if(!$args->member_srl) $args->member_srl=0;
			}

			$search_target2 = Context::get('search_target2');
			$search_keyword2 = Context::get('search_keyword2');
			if($search_target2=='module_srl' && $search_keyword2) $args->module_srl = $search_keyword2;
			elseif($search_target2=='document_srl' && $search_keyword2) $args->document_srl = $search_keyword2;
			elseif($search_target2=='category_srl' && $search_keyword2) $args->category_srl = $search_keyword2;



			$args->page = Context::get('page');
			$oSejin7940_voteModel = &getModel('sejin7940_vote');
			$output = $oSejin7940_voteModel->getDocumentVotedLog($args);

            if(!$output->toBool()) return $output;

			// 템플릿에 쓰기 위해서 context::set
			$oMemberModel = &getModel('member');
			Context::set('oMemberModel', $oMemberModel);
			Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('voted_log', $output->data);
            Context::set('page_navigation', $output->page_navigation);
/*
            $group_list = $oMemberModel->getGroups();
            Context::set('group_list', $group_list);
*/
            // 템플릿 파일 지정
            $this->setTemplateFile('voted_log');
		}




		// 추천 이동 내역 ( sejin7940 )
		function dispSejin7940_voteAdminMoveLog() {

			$search_target = Context::get('search_target');
			$search_keyword = Context::get('search_keyword');
			if($search_target=='target_module' && $search_keyword) $args->target_module = $search_keyword;
			elseif($search_target=='target_category' && $search_keyword) $args->target_category = $search_keyword;
			elseif($search_target=='move_module' && $search_keyword) $args->move_module = $search_keyword;
			elseif($search_target=='move_category' && $search_keyword) $args->move_category = $search_keyword;

			$args->page = Context::get('page');
			$oSejin7940_voteAdminModel = &getAdminModel('sejin7940_vote');
			$output = $oSejin7940_voteAdminModel->getDocumentMoveLog($args);
            if(!$output->toBool()) return $output;



            if(!$output->toBool()) return $output;

			// 템플릿에 쓰기 위해서 context::set
			Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('voted_log', $output->data);
            Context::set('page_navigation', $output->page_navigation);

            // 템플릿 파일 지정
            $this->setTemplateFile('move_log');
		}


	}
?>