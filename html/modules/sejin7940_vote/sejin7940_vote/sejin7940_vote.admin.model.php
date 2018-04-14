<?php
	/**
	 * @class  sejin7940_voteAdminModel
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 AdminModel class
	 **/

	class sejin7940_voteAdminModel extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
			
		}


        function getDocumentMoveAutoList($obj) {
			//MemberModel을 불러옴
			$oMemberModel = &getModel('member');

			//변수정리
            $args->group_srl = Context::get('search_group');
            $search_target = trim(Context::get('search_target'));
            $search_keyword = trim(Context::get('search_keyword'));

            if($search_target && $search_keyword) {
                switch($search_target) {
                    case 'user_id' :
                            if($search_keyword) $search_keyword = str_replace(' ','%',$search_keyword);
                            $args->member_srl = $oMemberModel->getMemberSrlByUserID($search_keyword);
                        break;
                    case 'nick_name' :
                            if($search_keyword) $search_keyword = str_replace(' ','%',$search_keyword);
							$args->member_srl = $oMemberModel->getMemberSrlByNickName($search_keyword);
                        break;
                }
            }

            $sort_index = Context::get('sort_index');
            $sort_order = Context::get('sort_order');
            if($sort_index != 'expire_date') $sort_index = "auto_srl";
            if($sort_order != "asc") $sort_order = "desc";

            $args->sort_index = $sort_index;
            $args->sort_order = $sort_order;
            Context::set('sort_order', $sort_order);
            $args->page = Context::get('page');
            $args->list_count = 15;
            $args->page_count = 10;
            return executeQuery('sejin7940_vote.getDocumentMoveAutoList', $args);
		}


        function deleteDocumentMoveAuto($args) {
			if(!$args) return false;
            return executeQuery('sejin7940_vote.deleteDocumentMoveAuto', $args);
		}



		function getDocumentMoveLog($obj) {
			$args->target_module = $obj->target_module;
			$args->target_category = $obj->target_category;
			$args->move_module = $obj->move_module;
			$args->move_category = $obj->move_category;

            $sort_index = Context::get('sort_index');
            $sort_order = Context::get('sort_order');
            if(!$sort_index) $sort_index = "regdate";
            if(!$sort_order) $sort_order = "desc";

            $args->sort_index = $sort_index;
            $args->sort_order = $sort_order;
            Context::set('sort_order', $sort_order);
            $args->page = Context::get('page');
            $args->list_count = 15;
            $args->page_count = 10;
            return executeQuery('sejin7940_vote.getDocumentMoveLogList', $args);
		}


	}
?>