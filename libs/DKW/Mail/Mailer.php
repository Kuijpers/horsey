<?php

namespace DKW\Mail;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Mailer{
    protected $mailer;
    public function __construct($mailer) {
        $this->mailer = $mailer;
    }
    
    public function send($template, $data, $callback) {
        
        $message = new Message($this->mailer);
        
        extract($data);
        
        ob_start();
        require $template;
        $template = ob_get_clean();
        ob_end_clean();
        
        $message->body($template);
        
        call_user_func($callback, $message);
        
        if (!$this->mailer->send()) {
            echo "Mailer Error: " . $this->mailer->ErrorInfo;
        } else {
            echo "Message sent!";
        }

            }
        }