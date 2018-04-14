<?php
	/**
	 * @class  sejin7940_voteAdminController
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 AdminController class
	 **/

	class sejin7940_voteAdminController extends sejin7940_vote {

		/**
		 * @brief Initialization
		 **/
		function init() {
			
		}


		function procSejin7940_voteAdminMoveInsert() {

            $args = Context::getRequestVars();
			if($args->auto_srl) {
				$oSejin7940_voteModel = &getModel('sejin7940_vote');
				$args_auto->auto_srl = $args->auto_srl;
				$output = $oSejin7940_voteModel->getDocumentMoveAuto($args_auto);
				$move_info = $output->data;
			}

			if(!$args->target_module) return new Object(-1, '대상모듈을 반드시 선택해주세요');
			$args->target_category = Context::get('target_category');
			$args->move_module = Context::get('target_module2');
			if(!$args->move_module) return new Object(-1, '이동할 모듈을 반드시 선택해주세요');
			$args->move_category = Context::get('target_category2');

			if(!$args->auto_srl) {
				$oSejin7940_voteModel = &getModel('sejin7940_vote');
				$output = $oSejin7940_voteModel->getDocumentMoveAuto($args);
				$move_info = $output->data;
			}

			if($move_info->auto_srl) {
				//일치하는 글이 있다면 수정

				$args->auto_srl = $move_info->auto_srl;
				$output =  executeQuery('sejin7940_vote.updateDocumentMoveAuto', $args);
				if(!$output->toBool()) return $output;
			} else {
				$args->auto_srl = getNextSequence();
				$output =  executeQuery('sejin7940_vote.insertDocumentMoveAuto', $args);
				if(!$output->toBool()) return $output;
				//쪽지 발송
//				$oGroupexpireAdminModel->sendMessage($args, "write");
			}

			if(!in_array(Context::getRequestMethod(),array('XMLRPC','JSON'))) {
				$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispSejin7940_voteAdminMoveList');
				header('location:'.$returnUrl);
				return;
			}
		}



        function procSejin7940_voteAdminMoveDelete() {
            $auto_srl = Context::get('target_srl');
			if(!$auto_srl) return new Object(-1, 'msg_invalid_request');

			$oSejin7940_voteAdminModel = &getAdminModel('sejin7940_vote');

			$args->auto_srl = $auto_srl;
            $output = $oSejin7940_voteAdminModel->deleteDocumentMoveAuto($args);
            if(!$output->toBool()) return $output;

            $this->add('page',Context::get('page'));
			$this->setMessage("success_deleted");
        }




	}
?>