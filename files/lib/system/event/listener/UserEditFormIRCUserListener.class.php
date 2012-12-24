<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/user/User.class.php');

class UserEditFormIRCUserListener implements EventListener {
	public $user = array();
	
        /**
         * @see EventListener::execute()
         */
        public function execute($eventObj, $className, $eventName) {
        	$qserver = QServerUtil::getInstance();
			$qserver->renameAccount($eventObj->user->username, $eventObj->username);
			$qserver->resetPassword($eventObj->username, $eventObj->password);
			$qserver->setEmail($eventObj->username, $eventObj->email);
        }
}
?>
