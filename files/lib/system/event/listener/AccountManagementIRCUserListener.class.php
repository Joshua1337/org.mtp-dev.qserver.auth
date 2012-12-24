<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

class AccountManagementIRCUserListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
        public function execute($eventObj, $className, $eventName) {
			$qserver = QServerUtil::getInstance();
        	if ($eventObj->canChangeUsername && $eventObj->username != WCF::getUser()->username) {
        		$qserver->renameAccount(WCF::getUser()->username, $eventObj->username);
        	}
        	
        	if(!empty($eventObj->newPassword) || !empty($eventObj->confirmNewPassword)) {
				$qserver->resetPassword($eventObj->username, $eventObj->newPassword);
        	}
        }
}
?>
