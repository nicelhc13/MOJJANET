<?php
	/**
	 * @class  sejin7940_voteController
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 Controller class
	 **/

	class sejin7940_voteController extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
			
		}


		// 회원 메뉴 쪽에 추가
		function triggerAddMemberMenu(&$obj) {
			if(!Context::get('is_logged')) return new Object();
			$target_srl = Context::get('target_srl');

			$oMemberController = &getController('member');
//			$oMemberController->addMemberMenu('dispSejin7940_voteOwnVote', 'cmd_view_own_vote');
			return new Object();
		}


       /* 자동 글올리기 대상이 있는지 확인하는 trigger 구문 */
		function triggerDocumentMoveAuto(&$obj) {
			$oSejin7940_voteModel = &getModel('sejin7940_vote');
			$check = $oSejin7940_voteModel->getDocumentMoveCheck($obj);

			$oDocumentAdminController = &getAdminController('document');

			foreach($check as $key_check => $val_check) {

				$val_check->document_srl[0] = $obj->document_srl;
				if($val_check->move_type == 'move') {
					$output_move = $oDocumentAdminController->moveDocumentModule($val_check->document_srl,$val_check->move_module,$val_check->move_category);
					if($val_check->change_regdate=='L') {
						$val_move->document_srl = $val_check->document_srl;
						$val_move->list_order = (-1)*getNextSequence();
						$output_regdate =  executeQuery('sejin7940_vote.updateDocumentListOrder', $val_move);
					}
					elseif($val_check->change_regdate=='Y') {
						$val_move->document_srl = $val_check->document_srl;
						$val_move->regdate = date('YmdHis',time());
						$output_regdate =  executeQuery('sejin7940_vote.updateDocumentRegdate', $val_move);
					}
				}
				elseif($val_check->move_type == 'copy') {
					$output_move = $oDocumentAdminController->copyDocumentModule($val_check->document_srl,$val_check->move_module,$val_check->move_category);
					if($val_check->change_regdate=='L') {
						$val_move->document_srl = implode('',$output_move->get('copied_srls'));
						$val_move->list_order = (-1)*getNextSequence();
						$output_regdate =  executeQuery('sejin7940_vote.updateDocumentListOrder', $val_move);
					}
					elseif($val_check->change_regdate=='Y') {
						$val_move->document_srl = implode('',$output_move->get('copied_srls'));
						$val_move->regdate = date('YmdHis',time());
						$output_regdate =  executeQuery('sejin7940_vote.updateDocumentRegdate', $val_move);
					}

					// 복사된 글에 대해서는 변동된 추천수가 적용되지 않은 버그 수정
					$args_count->document_srl = implode('',$output_move->get('copied_srls'));
					if($obj->after_point>0) {
						$args_count->voted_count = $obj->after_point;
						executeQuery('document.updateVotedCount', $args_count);
					}
					elseif($obj->after_point<0) {
						$args_count->blamed_count = $obj->after_point;
						executeQuery('document.updateBlamedCount', $args_count); 
					}


				}

				// 로그 기록 남기기 
				$args->document_srl = $obj->document_srl;
				$args->member_srl = $obj->member_srl;
				$args->target_module = $val_check->target_module;
				$args->target_category = $val_check->target_category;
				$args->move_module = $val_check->move_module;
				$args->move_category = $val_check->move_category;
				$args->move_type = $val_check->move_type;

				$args->regdate = date('YmdHis',time());

				$output =  executeQuery('sejin7940_vote.insertDocumentMoveLog', $args);


				if($val_check->move_module) {
					$oModuleModel = &getModel('module');
					$move_info= $oModuleModel->getModuleInfoByModuleSrl($val_check->move_module); 
				}
			}


//			return new Object(-1,Context::getRequestMethod());
			$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'mid', $move_info->mid, 'category', $val_check->move_category);
			if(!in_array(Context::getRequestMethod(),array('XMLRPC','JSON'))) {
				header('location:'.$returnUrl);
				return;
			}
			else {
				$_SESSION['voted_document'][$args->document_srl] = true;
				if($val_check->move_type=='move') return new Object(0, '추천수가 충족되어 추천게시판으로 글이 이동 되었습니다.');
				elseif($val_check->move_type=='copy') return new Object(0, '추천수가 충족되어 추천게시판으로 글이 복사 되었습니다.');

//					$this->setRedirectUrl($returnUrl);
			}

		}



	}
?>