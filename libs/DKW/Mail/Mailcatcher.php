<?php

namespace DKW\Mail;

use PHPMailer\PHPMailer as PHPMailer;


/**
 * Description of mailcatcher
 *
 * @author Web
 */
class Mailcatcher extends PHPMailer {

    /**
     * *  function __construct will automatically generate when method is called
     * */
        
    public function __construct($host = '127.0.0.1', $port = 1025, $html = TRUE) {
        parent::__construct(); // Insert __construct method from Class controller
            
        $this->isSMTP();
        $this->Host = $host;
        $this->Port = $port;
        $this-> isHTML($html);
    }

    //put your code here
}
