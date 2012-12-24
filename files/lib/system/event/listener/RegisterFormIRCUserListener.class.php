<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

class RegisterFormIRCUserListener implements EventListener {
        /**
         * @see EventListener::execute()
         */
        public function execute($eventObj, $className, $eventName) {
        	$qserver = QServerUtil::getInstance();
        	$qserver->addUser($eventObj->username, $eventObj->password, $eventObj->email);
        }
}
?>
