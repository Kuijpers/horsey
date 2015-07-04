    <?php

    // Default USERS language list
    
    // Deutsch
    
    // Translated from English using Google Translate

    // DO NOT CHANGE
            // Check if CONSTANT exists
            if(!defined('IN_HORSEY')){
                exit;
            }

            if (empty($lang) || !is_array($lang)){
                $lang = [];
            }


     $lang = array_merge($lang, [

         'USERS_DEFAULT'    =>  'Users',
         
         'USERS_DEFAULT_USERID'               =>  'Benutzer-ID',
         'USERS_DEFAULT_FIRSTNAME'            =>  'Vorname',
         'USERS_DEFAULT_LASTNAME'             =>  'Nachname',
         'USERS_DEFAULT_NAME'                 =>  'Name',
         'USERS_DEFAULT_ADDRESS'              =>  'Adresse',
         'USERS_DEFAULT_POSTCODE'             =>  'PLZ',
         'USERS_DEFAULT_CITY'                 =>  'Stadt',
         'USERS_DEFAULT_POSTCITY'             =>  'PLZ und Stadt',
         'USERS_DEFAULT_STATE'                =>  'Staat / Provinz',
         'USERS_DEFAULT_COUNTRY'              =>  'Land',
         'USERS_DEFAULT_TELEPHONE'            =>  'Telefonnummer',
         'USERS_DEFAULT_EMAIL'                =>  'E-Mail-Adresse',
         'USERS_DEFAULT_USER'                 =>  'Benutzer',
         'USERS_DEFAULT_USERNAME'             =>  'Benutzername',
         'USERS_DEFAULT_USER_TYPE'            =>  'Benutzertyp',
         
         'USERS_DEFAULT_CHANGEPASS'           =>  'Kennwort ändern',
            'USERS_DEFAULT_CHANGEPASS_OLD'           =>  'Altes Passwort',
            'USERS_DEFAULT_CHANGEPASS_NEW'           =>  'Neues Passwort',
            'USERS_DEFAULT_CHANGEPASS_REPEAT'           =>  'Neues Passwort wiederholen',
         
         
         
         'USERS_DEFAULT_USERTYPE'       => '',
            'USERS_DEFAULT_USERTYPE_OWNER'              => 'Eigentümer',     
            'USERS_DEFAULT_USERTYPE_ADMIN'              => 'Admin',     
            'USERS_DEFAULT_USERTYPE_USER'               => 'Benutzer',
         
         'USERS_DEFAULT_STATUS'       =>  '',
         
            'USERS_DEFAULT_STATUS_TITLE'       =>  '',
                'USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'    =>  'Erste Protokoll erforderlich',
                'USERS_DEFAULT_STATUS_TITLE_ACTIVE'      =>  'Aktiv',
                'USERS_DEFAULT_STATUS_TITLE_BLOCKED'     =>  'Verstopft',
                'USERS_DEFAULT_STATUS_TITLE_INACTIVE'    =>  'inaktiv',
         
         
/*
 *  Related to Index page
 */
         
     'USERS_INDEX'                      =>'',
         
         'USERS_INDEX_ADD_TITLE'                   =>  'Neuen Benutzer hinzufügen',
         
         'USERS_INDEX_ALL'          =>  '',
             'USERS_INDEX_ALL_CURRENT'          =>  'Alle aktuellen Benutzer',
         
         'USERS_INDEX_USERTYPE'     =>  'Benutzertyp',
            'USERS_INDEX_USERTYPE_OWNER'                =>  'Eigentümer',
            'USERS_INDEX_USERTYPE_ADMIN'                =>  'Admin',
            'USERS_INDEX_USERTYPE_USER'                 =>  'Benutzer',
         
         'USER_INDEX_USERPROFILE' => '',
             'USERS_INDEX_USERPROFILE_ALT'      =>  'Zum benutzerprofil.',
             'USERS_INDEX_USERPROFILE_TITLE'    =>  'Zum benutzerprofil.',
         
         'USERS_INDEX_USEREDIT'             =>'',
             'USERS_INDEX_USEREDIT_ALT'         =>  'Benutzerprofil ändern.',
             'USERS_INDEX_USEREDIT_TITLE'       =>  'Benutzerprofil ändern.',
         
         'USERS_INDEX_USERDELETE'           =>  '',
             'USERS_INDEX_USERDELETE_ALT'       =>  'Benutzer löschen.',
             'USERS_INDEX_USERDELETE_TITLE'     =>  'Benutzer löschen.',
         
/*
 *  Related to Details
 */
         'USERS_DETAILS_TITLE'              =>  'Benutzerübersicht.',
         'USERS_DETAILS_MESSAGE'            =>  'Alle Informationen zum Benutzer gehör : ',
         
         'USERS_DETAILS_TITLE2'             =>  'Persönliche Informationen',
         'USERS_DETAILS_MESSAGE2'           =>  'Übersicht über alle Daten für diesen Benutzer.',
         
         'USERS_DETAILS_CURRENTSTATUS'      =>  'Aktueller Status',
         
         'USERS_DETAILS_TITLE3'             =>  'Statusänderung',
         'USERS_DETAILS_MESSAGE3'           =>  'Nachfolgend finden Sie eine Übersicht über alle statuschanges für diesen Benutzer. ',
 
/*
 * Related to Update 
 */
         
         'USERS_UPDATE_TITLE'                =>  'Userinformation ändern.',
         
 /*
  * Related to Cookies
  */        
         'USERS_INDEX_COOKIES_SUCCES_ADDED'     => 'Als neuer Benutzer hinzugefügt wird!!',
         'USERS_INDEX_COOKIES_SUCCES_CHANGED'   => 'De -Status geändert!!',
         'USERS_INDEX_COOKIES_SUCCES_UPDATED'   => 'Updates verarbeitet!!',
         'USERS_INDEX_COOKIES_SUCCES_REMOVED'   => 'Benutzer gelöscht !!',
         
         'USERS_INDEX_COOKIES_WARNING_GLOBAL'   => 'Etwas ist schief gelaufen. Bitte versuche es erneut !!',
         
         'USERS_INDEX_COOKIES_DANGER_OWNER_CHANGE'     => 'Eigentümerinformation kann nicht chenged werden !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_DELETE'     => 'Der Besitzer kann nicht gelöscht werden !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_OWN_STATUS' => 'Es ist nicht möglich, ändern Sie Ihren Status !!',
         
/*
 * Related to Modal pages
 */         
         'USERS_INDEX_MODAL_STATUS'         =>  '',
            
         'USERS_INDEX_MODAL_STATUS_MESSAGE'         =>  '',
                'USERS_INDEX_MODAL_STATUS_MESSAGE_REASON'     =>  '&nbsp; Bitte geben Sie einen Grund für die Änderung des Status von : ',
            
         'USERS_INDEX_MODAL_STATUS_CHANGE'         =>  'Statusänderung',
            'USERS_INDEX_MODAL_STATUS_CHANGE_USERID'    =>  'Benutzer-ID',
            'USERS_INDEX_MODAL_STATUS_CHANGE_STATUS'    =>  'Wechselt in den Status : ',
            'USERS_INDEX_MODAL_STATUS_CHANGE_REASON'    =>  'Der Grund für diese Statusänderung ',
         
         'USERS_INDEX_MODAL_DELETE'         =>  '',
         
             'USERS_INDEX_MODAL_DELETE_TITLE'         =>  'Bestätigen Sie das Löschen eines Benutzer.',
         
             'USERS_INDEX_MODAL_DELETE_CONFIRM'         =>  'Bestätigen Sie das Löschen dieses Benutzers.',
                 'USERS_INDEX_MODAL_DELETE_CONFIRM_USER'         =>  'Sind Sie sicher, dass Sie löschen möchten : ',
         
         
         'USERS_INDEX_MODAL_CHANGEPASS'         =>  '',
             'USERS_INDEX_MODAL_CHANGEPASS_TITLE'         =>  'Kennwort ändern',
             'USERS_INDEX_MODAL_CHANGEPASS_MESSAGE'       =>  'Hier können Sie Ihr Passwort ändern.',
        
         
         
         'USERS_'=> ''


     ]);