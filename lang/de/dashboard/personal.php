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
     
     'PERSONAL' => 'Persönliches',
         'PERSONAL_TITLE' => 'Persönliche Informationen',
         'PERSONAL_MESSAGE' => 'Auf dieser Seite finden Sie alle persönlichen Daten zu finden, wie in unserer Datenbank bekannt.',
     
     
     'PERSONAL_PROFILE' => '',
        'PERSONAL_PROFILE_REGISTRATION_TITLE' => 'Anmeldung',
        'PERSONAL_PROFILE_REGISTRATION_MESSAGE' => 'Ihre Anmeldung',
     
        'PERSONAL_PROFILE_EDIT_REGISTRATION_TITLE' => 'Anmeldung ändern',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_MESSAGE' => 'Ihre Registrierung zu bearbeiten',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_BUTTON' => 'Ändern Sie Ihre persönlichen Informationen',
     
        'PERSONAL_PROFILE_EDIT_PICTURE_BUTTON' => 'Ändern Sie Ihr Bild',
     
        'PERSONAL_PROFILE_EDIT_USERNAME_BUTTON' => 'Ändern Sie Ihren Benutzernamen',
     
        'PERSONAL_PROFILE_LOGIN_TITLE' => 'Einloggen',
        'PERSONAL_PROFILE_LOGIN_MESSAGE' => 'Ihre Login-Daten',
     
        'PERSONAL_PROFILE_STATUS_TITLE' => 'Statusänderungen',
        'PERSONAL_PROFILE_STATUS_MESSAGE' => 'Ihre Statusübersicht',
     
        'PERSONAL_PROFILE_USER_ID'                  =>  'Benutzer-ID',
        'PERSONAL_PROFILE_USER_FIRSTNAME'            =>  'Vorname',
        'PERSONAL_PROFILE_USER_LASTNAME'             =>  'Nachname',
        'PERSONAL_PROFILE_USER_NAME'                 =>  'Name',
        'PERSONAL_PROFILE_USER_ADRESS'              =>  'Adresse',
        'PERSONAL_PROFILE_USER_POSTCODE'             =>  'PLZ',
        'PERSONAL_PROFILE_USER_CITY'                 =>  'Stadt',
        'PERSONAL_PROFILE_USER_POSTCITY'             =>  'PLZ und Stadt',
        'PERSONAL_PROFILE_USER_STATE'                =>  'Staat / Provinz',
        'PERSONAL_PROFILE_USER_COUNTRY'              =>  'Land',
        'PERSONAL_PROFILE_USER_TELEPHONE'            =>  'Telefonnummer',
        'PERSONAL_PROFILE_USER_EMAIL'                =>  'E-Mail-Adresse',
     
        'PERSONAL_PROFILE_USER_LANGUAGE'             =>  'Sprache',
        'PERSONAL_PROFILE_USER_CREATION_DATE'        =>  'Erstellungsdatum',
        'PERSONAL_PROFILE_USER_CREATION_TIME'        =>  'Erstellungszeit',
     
     
        'PERSONAL_PROFILE_USER_USER'                 =>  'Benutzer',
     
        'PERSONAL_PROFILE_LOGIN_NAME'              =>  'Benutzername',
        'PERSONAL_PROFILE_LOGIN_USERTYPE'          =>  'Benutzertyp',
        'PERSONAL_PROFILE_LOGIN_STATUS'            =>  'Aktueller Status',
     
         'PERSONAL_PROFILE_USERTYPE'       => '',
                'PERSONAL_PROFILE_USERTYPE_OWNER'              => 'Inhaber',     
                'PERSONAL_PROFILE_USERTYPE_ADMIN'              => 'Admin',     
                'PERSONAL_PROFILE_USERTYPE_USER'               => 'Benutzer',
     
            'PERSONAL_PROFILE_STATUS_TITLE_ACTIVE'      =>  'aktiv',
            'PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'     =>  'blockierte',
            'PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'    =>  'inaktiv',
     
      /*
  * Related to Cookies
  */        
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_USERNAME'     => 'Der Status geändert!!',
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_REGISTRATION' => 'Ihre Anmeldung wird aktualisiert !!',
         
         'PERSONAL_PROFILE_COOKIES_WARNING_GLOBAL'   => '',
         
         'PERSONAL_PROFILE_COOKIES_DANGER_CHANGE'     => '',
     
     
 ]);


