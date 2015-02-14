<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    /**
     * List of defined keywords to use for email
     *  Please check comments
     */

define ('SMTPSERVER', 'smtp.telfort.nl'); // SMTP server name of your ISP
define ('MAILUSER', 'darkknightworks.dev@gmail.com'); // Login for gmail
define ('MAILPW', 'darkknightworks'); // Password for gmail

// MAILFROM and MAILREPLY are most of the time the same
define ('MAILFROM', 'darkknightworks.dev@gmail.com'); // Where did the email come from
define ('MAILFROMNAME', 'Dennis Kuijpers'); // Who did the email come from
define ('MAILREPLY', 'darkknightworks.dev@gmail.com'); // To what email the reply has to be send
define ('MAILREPLYNAME', 'Dennis Kuijpers'); // To whom the reply has to be send

// Set an alternitive body for email
define ('MAILALTBODY', 'To view the message, please use an HTML compatible email viewer!');

// Where to find the content needed to send in email
define ('MAILCONTENTPATH', 'private/mail/'); // Do not use fullpath only folderpath
/** 
 * Change the value to debug
 * Options:
 * - `0` No output
 * - `1` Commands
 * - `2` Data and commands
 * - `3` As 2 plus connection status
 * - `4` Low-level data output
 */
define ('MAILDEBUG', 0);
/**
 * Way of sending email
 * - `1` PHP sendmail // Use sendmail `1` when using mailcatcher
 * = `2` Gmail 
 */
define ('MAILTYPE', 1);

