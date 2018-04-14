<?php
	/**
	 * @class  sejin7940_vote
	 * @author sejin7940 (sejin7940@nate.com)
	 * @brief  sejin7940_vote 모듈의 상위 class
	 **/

	class sejin7940_vote extends ModuleObject {

		/**
		 * @brief 설치시 추가 작업이 필요할시 구현
		 **/
		function moduleInstall() {
            $oModuleController = &getController('module');

			return new Object();
		}

		/**
		 * @brief 설치가 이상이 없는지 체크하는 method
		 **/
		function checkUpdate() {
            $oModuleModel = &getModel('module');
			$oDB = &DB::getInstance();

            if(!$oModuleModel->getTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerDocumentMoveAuto', 'after')) return true;
//            if(!$oModuleModel->getTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerUpdateVotedCount', 'after')) return true;

//			if(!$oDB->isColumnExists('document_move_auto', 'change_regdate' )) return true;

			if(!$oModuleModel->getTrigger('moduleHandler.init', 'sejin7940_vote', 'controller', 'triggerAddMemberMenu', 'after')) return true;

			return false;
		}

		/**
		 * @brief 업데이트 실행
		 **/
		function moduleUpdate() {
            $oModuleModel = &getModel('module');
            $oModuleController = &getController('module');
			$oDB = &DB::getInstance();

            if(!$oModuleModel->getTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerDocumentMoveAuto', 'after')) {
                $oModuleController->insertTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerDocumentMoveAuto', 'after');
            }
/*
            if(!$oModuleModel->getTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerUpdateVotedCount', 'after')) 
                $oModuleController->insertTrigger('document.updateVotedCount', 'sejin7940_vote', 'controller', 'triggerUpdateVotedCount', 'after');

			if(!$oDB->isColumnExists('document_move_auto', 'change_regdate' )) {
				$oDB->addColumn('document_move_auto', 'change_regdate', 'char', 1  );
			}
*/
			if(!$oModuleModel->getTrigger('moduleHandler.init', 'sejin7940_vote', 'controller', 'triggerAddMemberMenu', 'after'))
				$oModuleController->insertTrigger('moduleHandler.init', 'sejin7940_vote', 'controller', 'triggerAddMemberMenu', 'after');

			return new Object(0, 'success_updated');
		}

		/**
		 * @brief 캐시 파일 재생성
		 **/
		function recompileCache() {
			
		}
	}
?>