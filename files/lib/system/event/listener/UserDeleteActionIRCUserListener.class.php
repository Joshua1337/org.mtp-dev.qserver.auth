<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/user/User.class.php');

class UserDeleteActionIRCUserListener implements EventListener {
	public $user = array();
	
        /**
         * @see EventListener::execute()
         */
        public function execute($eventObj, $className, $eventName) {
        	if($eventName == 'execute') {
			if ($eventObj->userID !== 0) {
				$userIDs[] = $eventObj->userID;
			} else {
				$userIDs[] = $eventObj->userIDs;
			}
			foreach($userIDs AS $userID) {
				$user = new User($userID);
				$this->user[] = $user->username;
			}
        	} elseif($eventName == 'executed') {
        		$qserver = QServerUtil::getInstance();
        		foreach($this->user AS $userItem) {
        			$qserver->deleteUser($userItem);
        		}
        	}
        }
}
?>
