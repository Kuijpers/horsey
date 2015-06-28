    <?php

    // Default USERS language list

    // DO NOT CHANGE
            // Check if CONSTANT exists
            if(!defined('IN_HORSEY')){
                exit;
            }

            if (empty($lang) || !is_array($lang)){
                $lang = [];
            }


     $lang = array_merge($lang, [

         'USERS_DEFAULT' =>'Gebruikers',
         
         
         
         'USERS_DEFAULT_USERTYPE'       => '',
            'USERS_DEFAULT_USERTYPE_OWNER'       => 'Eigenaar',     
            'USERS_DEFAULT_USERTYPE_ADMIN'       => 'Administratie',     
            'USERS_DEFAULT_USERTYPE_USER'       => 'Gebruiker',
         
         
         
         
         'USERS_INDEX' =>'',
         
         'USERS_INDEX_ALL_CURRENT'  =>  'Alle huidige gebruikers',
         
         'USERS_INDEX_FIRSTNAME'    =>  'Voornaam',
         'USERS_INDEX_LASTNAME'     =>  'Achternaam',
         'USERS_INDEX_TELEPHONE'    =>  'Telefoonnummer',
         'USERS_INDEX_EMAIL'        =>  'Emailadres',
         'USERS_INDEX_USERNAME'     =>  'Gebruikersnaam',
         'USERS_INDEX_USERNAME'     =>  'Gebruikersnaam',
         
         'USERS_INDEX_USERTYPE'     =>  'Type gebruiker',
            'USERS_INDEX_USERTYPE_OWNER'     =>  'Eigenaar',
            'USERS_INDEX_USERTYPE_ADMIN'     =>  'Administratie',
            'USERS_INDEX_USERTYPE_USER'      =>  'Gebruiker',
         
         'USERS_INDEX_STATUS'       =>  '',
         
            'USERS_INDEX_STATUS_TITLE'       =>  '',
                'USERS_INDEX_STATUS_TITLE_FIRSTLOG'    =>  'Nog nooit ingelogged',
                'USERS_INDEX_STATUS_TITLE_ACTIVE'      =>  'Actief',
                'USERS_INDEX_STATUS_TITLE_BLOCKED'     =>  'Geblokkeerd',
                'USERS_INDEX_STATUS_TITLE_INACTIVE'    =>  'Niet actief',
         
         'USERS_INDEX_MODAL_STATUS'       =>  '',
            'USERS_INDEX_MODAL_STATUS_MESSAGE'         =>  '',
                'USERS_INDEX_MODAL_STATUS_MESSAGE_REASON'         =>  '&nbsp; Geeft u a.u.b. een reden op voor het veranderen van de status van: ',
         'USERS_INDEX_MODAL_STATUS'       =>  '',
         
         'USERS_DELETE'             => 'Delete de gebruiker'


     ]);