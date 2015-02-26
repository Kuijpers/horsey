<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    /**
     * List of defined keywords to use for login.
     *  Please check comments
     */

// Choose whether to use cookies or sessions to be set after login.
/**
 *  - `1` Cookies
 *  - `2` Session
 */
define('LOGIN_TYPE', 1);

// Name for the login cookie
define('COOKIE_LOG_NAME', $personal['COOKIE_LOG_NAME']);