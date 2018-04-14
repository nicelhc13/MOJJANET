<?php
	/**
	 * @class  sejin7940_voteModel
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 Model class
	 **/

	class sejin7940_voteModel extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
			
		}

		/**
		 * @brief 모듈의 global 설정 구함
		 */
		function getModuleConfig() {
			static $config = null;
			if(is_null($config)) {
				$oModuleModel = &getModel('module');
				$config = $oModuleModel->getModuleConfig('sejin7940_vote');
			}

			 if(!$config->skin) $config->skin = "default";

			return $config;
		}


		
		// 특정회원이 특정그룹에 속하는지 여부
		function isMemberGroup($args) {
			$obj->selected_group_srl = $args->group_srl;
			if($args->member_srl) $obj->member_srls = $args->member_srl;
			if($args->user_id) $obj->s_user_id = $args->user_id;
			if($args->nick_name) $obj->s_nick_name = $args->nick_name;
			if($args->email_address) $obj->s_nick_name = $args->email_address;
			$output_group = executeQuery('sejin7940_vote.getMemberListWithinGroup', $obj);
			$is_group_member = count($output_group->data);
			return $is_group_member;
		}


		function getDocumentMoveAuto($obj) {
			$args->auto_srl = $obj->auto_srl;
			$args->target_module = $obj->target_module;
			$args->target_category = $obj->target_category;
			$args->move_module = $obj->move_module;
			$args->move_category = $obj->move_category;
            return executeQuery('sejin7940_vote.getDocumentMoveAuto',$args);
        }


		function getDocumentMoveCheck($obj) {
			$args->move_voted = $obj->after_point;  // 추천수

			$args->target_module = $obj->module_srl;

			$oDocumentModel = &getModel('document');
			$document_info = $oDocumentModel->getDocument($obj->document_srl);
			$args->target_category = $document_info->get('category_srl');

            $output = executeQueryArray('sejin7940_vote.getDocumentMoveCheck',$args);		

			if(count($output->data)) {	// 추천이동 설정 있는 경우
				foreach($output->data as $key_check => $val_check) {
					if($val_check->move_type == 'move') {
						$check[] = $val_check;
					}
					elseif($val_check->move_type == 'copy') {
						$args_moved->document_srl = $obj->document_srl;
						$args_moved->move_module = $val_check->move_module;
						$args_moved->move_category = $val_check->move_category;
						$args_moved->move_type = $val_check->move_type;
						$output_moved = executeQuery('sejin7940_vote.getDocumentMoveLog',$args_moved);		

						if(!count($output_moved->data)) {  // 이동한 내역이 없는 경우만 
							$check[] = $val_check;
						}
					}
				}
			}
			return $check;
		}



		function getDocumentVotedLog($obj) {
			$args->document_srl = $obj->document_srl;
			$args->member_srl = $obj->member_srl;
			$args->module_srl = $obj->module_srl;
			$args->category_srl = $obj->category_srl;

			$args->sort_index = 'document_voted_log.regdate';
			$args->sort_order = 'desc';
			$args->page = $obj->page;

            return executeQuery('sejin7940_vote.getDocumentVotedLog',$args);
		}


		function getDocumentVotedLogCount($member_srl) {
			$args->member_srl = $member_srl;
			$output = executeQuery('sejin7940_vote.getDocumentVotedLogCount', $args);
			return (int)$output->data->count;
		}

		function getDocumentBlamedLogCount($member_srl) {
			$args->member_srl = $member_srl;
			$output = executeQuery('sejin7940_vote.getDocumentBlamedLogCount', $args);
			return (int)$output->data->count;
		}



	}
?>