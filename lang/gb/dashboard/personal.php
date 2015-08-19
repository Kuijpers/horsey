<?php

// Personal language list

// DO NOT CHANGE
        // Check if CONSTANT exists
        if(!defined('IN_HORSEY')){
            exit;
        }

        if (empty($lang) || !is_array($lang)){
            $lang = [];
        }
 $lang = array_merge($lang, [
     
     'PERSONAL' => 'Personal',
         'PERSONAL_TITLE' => 'Personal information',
         'PERSONAL_MESSAGE' => 'On this page you will find all personal details as known in our database.',
     
     
     'PERSONAL_PROFILE' => '',
        'PERSONAL_PROFILE_REGISTRATION_TITLE' => 'Registration',
        'PERSONAL_PROFILE_REGISTRATION_MESSAGE' => 'Your registration',
     
        'PERSONAL_PROFILE_EDIT_REGISTRATION_TITLE' => 'Edit registration',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_MESSAGE' => 'Your registration to edit',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_BUTTON' => 'Change your personal information',
     
        'PERSONAL_PROFILE_EDIT_PICTURE_BUTTON' => 'Change your picture',
     
        'PERSONAL_PROFILE_EDIT_USERNAME_BUTTON' => 'Change your username',
     
        'PERSONAL_PROFILE_LOGIN_TITLE' => 'Login',
        'PERSONAL_PROFILE_LOGIN_MESSAGE' => 'Your login details',
     
        'PERSONAL_PROFILE_STATUS_TITLE' => 'Status changes',
        'PERSONAL_PROFILE_STATUS_MESSAGE' => 'Your status overview',
     
        'PERSONAL_PROFILE_USER_ID'               =>  'User ID',
        'PERSONAL_PROFILE_USER_FIRSTNAME'            =>  'Firstname',
        'PERSONAL_PROFILE_USER_LASTNAME'             =>  'Lastname',
        'PERSONAL_PROFILE_USER_NAME'                 =>  'Name',
        'PERSONAL_PROFILE_USER_ADRESS'              =>  'Address',
        'PERSONAL_PROFILE_USER_POSTCODE'             =>  'Postcode',
        'PERSONAL_PROFILE_USER_CITY'                 =>  'City',
        'PERSONAL_PROFILE_USER_POSTCITY'             =>  'Postcode and City',
        'PERSONAL_PROFILE_USER_STATE'                =>  'State / Province',
        'PERSONAL_PROFILE_USER_COUNTRY'              =>  'Country',
        'PERSONAL_PROFILE_USER_TELEPHONE'            =>  'Phone number',
        'PERSONAL_PROFILE_USER_EMAIL'                =>  'Emailaddress',
     
        'PERSONAL_PROFILE_USER_LANGUAGE'             =>  'Language',
        'PERSONAL_PROFILE_USER_CREATION_DATE'        =>  'Creation date',
        'PERSONAL_PROFILE_USER_CREATION_TIME'        =>  'Creation time',
     
     
        'PERSONAL_PROFILE_USER_USER'                 =>  'User',
     
        'PERSONAL_PROFILE_LOGIN_NAME'              =>  'Username',
        'PERSONAL_PROFILE_LOGIN_USERTYPE'          =>  'Usertype',
        'PERSONAL_PROFILE_LOGIN_STATUS'            =>  'Current status',
     
         'PERSONAL_PROFILE_USERTYPE'       => '',
                'PERSONAL_PROFILE_USERTYPE_OWNER'              => 'Owner',     
                'PERSONAL_PROFILE_USERTYPE_ADMIN'              => 'Admin',     
                'PERSONAL_PROFILE_USERTYPE_USER'               => 'User',
     
            'PERSONAL_PROFILE_STATUS_TITLE_ACTIVE'      =>  'Active',
            'PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'     =>  'Blocked',
            'PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'    =>  'Inactive',
     
      /*
  * Related to Cookies
  */        
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_USERNAME'     => 'The status is changed!!',
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_REGISTRATION' => 'Your registration is updated !!',
         
         'PERSONAL_PROFILE_COOKIES_WARNING_GLOBAL'   => '',
         
         'PERSONAL_PROFILE_COOKIES_DANGER_CHANGE'     => '',
     
     
 ]);


