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
         'PERSONAL_TITLE' => 'Persoonlijke informatie',
         'PERSONAL_MESSAGE' => 'Op deze pagina vindt u alle persoonlijke details zoals geregistreerd in onze Database.',
     
     
     'PERSONAL_PROFILE' => '',
        'PERSONAL_PROFILE_REGISTRATION_TITLE' => 'Registratie',
        'PERSONAL_PROFILE_REGISTRATION_MESSAGE' => 'Uw registratie',
     
        'PERSONAL_PROFILE_EDIT_REGISTRATION_TITLE' => 'Registratie aanpassenj',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_MESSAGE' => 'Your registration to edit',
        'PERSONAL_PROFILE_EDIT_REGISTRATION_BUTTON' => 'Pas uw persoonlijke informatie aan.',
     
        'PERSONAL_PROFILE_EDIT_PICTURE_BUTTON' => 'Pas uw foto aan',
     
        'PERSONAL_PROFILE_EDIT_USERNAME_BUTTON' => 'Vernieuw uw gebruikersnaam',
     
        'PERSONAL_PROFILE_LOGIN_TITLE' => 'Login',
        'PERSONAL_PROFILE_LOGIN_MESSAGE' => 'Uw inlog gegevens',
     
        'PERSONAL_PROFILE_STATUS_TITLE' => 'Status veranderingen',
        'PERSONAL_PROFILE_STATUS_MESSAGE' => 'Uw status overzicht',
     
        'PERSONAL_PROFILE_USER_ID'               =>  'User ID',
        'PERSONAL_PROFILE_USER_FIRSTNAME'            =>  'Voornaam',
        'PERSONAL_PROFILE_USER_LASTNAME'             =>  'Achternaam',
        'PERSONAL_PROFILE_USER_NAME'                 =>  'Naam',
        'PERSONAL_PROFILE_USER_ADRESS'              =>  'Adres',
        'PERSONAL_PROFILE_USER_POSTCODE'             =>  'Postcode',
        'PERSONAL_PROFILE_USER_CITY'                 =>  'Woonplaats',
        'PERSONAL_PROFILE_USER_POSTCITY'             =>  'Postcode en Woonplaats',
        'PERSONAL_PROFILE_USER_STATE'                =>  'Staat / Provincie',
        'PERSONAL_PROFILE_USER_COUNTRY'              =>  'Land',
        'PERSONAL_PROFILE_USER_TELEPHONE'            =>  'Telefoonnummer',
        'PERSONAL_PROFILE_USER_EMAIL'                =>  'Emailadres',
     
        'PERSONAL_PROFILE_USER_LANGUAGE'            =>  'Taal',
        'PERSONAL_PROFILE_USER_CREATION_DATE'        =>  'Registratie datum',
        'PERSONAL_PROFILE_USER_CREATION_TIME'        =>  'Registratie tijd',
     
     
        'PERSONAL_PROFILE_USER_USER'                 =>  'GEbruiker',
     
        'PERSONAL_PROFILE_LOGIN_NAME'              =>  'Gebruikersnaam',
        'PERSONAL_PROFILE_LOGIN_USERTYPE'          =>  'Gebruikerstype',
        'PERSONAL_PROFILE_LOGIN_STATUS'            =>  'Huidige status',
     
         'PERSONAL_PROFILE_USERTYPE'       => '',
                'PERSONAL_PROFILE_USERTYPE_OWNER'              => 'Eigenaar',     
                'PERSONAL_PROFILE_USERTYPE_ADMIN'              => 'Admin',     
                'PERSONAL_PROFILE_USERTYPE_USER'               => 'Gebruiker',
     
            'PERSONAL_PROFILE_STATUS_TITLE_ACTIVE'      =>  'Actief',
            'PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'     =>  'Geblokkeerd',
            'PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'    =>  'Inactief',
     
      /*
  * Related to Cookies
  */        
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_USERNAME'     => 'De status is aangepast!!',
         'PERSONAL_PROFILE_COOKIES_SUCCES_UPDATED_REGISTRATION' => 'Uw registratie is aangepast !!',
         
         'PERSONAL_PROFILE_COOKIES_WARNING_GLOBAL'   => '',
         
         'PERSONAL_PROFILE_COOKIES_DANGER_CHANGE'     => '',
     
     
 ]);


