<?php
class Email {
    static function getEmailAddress() {
        $emailAddr = new IPPEmailAddress();
		$emailAddr->Address = "test@abc.com";
        return $emailAddr;
    }
    
}
?>