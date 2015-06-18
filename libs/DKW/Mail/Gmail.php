<?php

namespace DKW\Mail;

use PHPMailer\PHPMailer as PHPMailer;

/**
 * Description of Gmail
 *
 * @author Web
 */
class Gmail extends PHPMailer {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct($user, $password, $mailfrom, $html = TRUE) {
        parent::__construct(); // Insert __construct method from Class controller
        
        $this -> isSMTP();
        $this -> Host = 'smtp.gmail.com';
        $this -> SMTPAuth = TRUE;
        $this -> SMTPSecure = 'tls';
        $this -> Port = 587;
        $this -> Username = $user;
        $this -> Password = $password;
        $this -> From = $mailfrom;
        $this -> isHTML($html);
    }

    //put your code here
}
