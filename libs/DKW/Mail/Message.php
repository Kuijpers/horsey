<?php

namespace DKW\Mail;


/**
 * Description of Message
 *
 * @author Web
 */
class Message {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct($mailer) {
        $this->mailer = $mailer;
    }
    
    public function from($from, $fromname) {
        $this->mailer->From($from);
        $this->mailer->Fromname($fromname);
    }
    
    public function to($address, $name = ''){
        $this->mailer->addAddress($address, $name);
    }
    
    public function cc($address, $name = ''){
        $this->mailer->addCC($address, $name);
    }
    
    public function bcc($address, $name = ''){
        $this->mailer->addBCC($address, $name);
    }
    
    public function reply($address, $name = ''){
        $this->mailer->addReplyTo($address, $name);        
    }

    public function subject($subject) {
        $this->mailer->Subject = $subject;
    }
    
    public function body($body) {
        $this->mailer->Body = $body;
    }
    
    public function alt($alt){
        $this->mailer->AltBody = $alt;
    }
    
    public function attachment($location, $namechange=''){
        $this->mailer->addAttachment($location, $namechange);
    }
    
    
}   // End of class
