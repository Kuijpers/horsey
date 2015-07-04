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

         'USERS_DEFAULT'    =>  'Gebruikers',
         
         'USERS_DEFAULT_USERID'               =>  'Gebruikersnummer',
         'USERS_DEFAULT_FIRSTNAME'            =>  'Voornaam',
         'USERS_DEFAULT_LASTNAME'             =>  'Achternaam',
         'USERS_DEFAULT_NAME'                 =>  'Naam',
         'USERS_DEFAULT_ADDRESS'              =>  'Adres',
         'USERS_DEFAULT_POSTCODE'             =>  'Postcode',
         'USERS_DEFAULT_CITY'                 =>  'Woonplaats',
         'USERS_DEFAULT_POSTCITY'             =>  'Postcode en Woonplaats',
         'USERS_DEFAULT_STATE'                =>  'Staat / Provincie',
         'USERS_DEFAULT_COUNTRY'              =>  'Land',
         'USERS_DEFAULT_TELEPHONE'            =>  'Telefoonnummer',
         'USERS_DEFAULT_EMAIL'                =>  'Emailadres',
         'USERS_DEFAULT_USER'                 =>  'Gebruiker',
         'USERS_DEFAULT_USERNAME'             =>  'Gebruikersnaam',
         'USERS_DEFAULT_USER_TYPE'            =>  'Type gebruiker',
         
         'USERS_DEFAULT_CHANGEPASS'           =>  'Verander wachtwoord',
            'USERS_DEFAULT_CHANGEPASS_OLD'           =>  'Oud wachtwoord',
            'USERS_DEFAULT_CHANGEPASS_NEW'           =>  'Nieuw wachtwoord',
            'USERS_DEFAULT_CHANGEPASS_REPEAT'           =>  'Herhaal nieuw wachtwoord',
         
         
         
         'USERS_DEFAULT_USERTYPE'       => '',
            'USERS_DEFAULT_USERTYPE_OWNER'              => 'Eigenaar',     
            'USERS_DEFAULT_USERTYPE_ADMIN'              => 'Administratie',     
            'USERS_DEFAULT_USERTYPE_USER'               => 'Gebruiker',
         
         'USERS_DEFAULT_STATUS'       =>  '',
         
            'USERS_DEFAULT_STATUS_TITLE'       =>  '',
                'USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'    =>  'Nog nooit ingelogged',
                'USERS_DEFAULT_STATUS_TITLE_ACTIVE'      =>  'Actief',
                'USERS_DEFAULT_STATUS_TITLE_BLOCKED'     =>  'Geblokkeerd',
                'USERS_DEFAULT_STATUS_TITLE_INACTIVE'    =>  'Niet actief',
         
         
/*
 *  Related to Index page
 */
         
     'USERS_INDEX'                      =>'',
         
         'USERS_INDEX_ADD_TITLE'                   =>  'Nieuwe gebruiker toevoegen',
         
         'USERS_INDEX_ALL'          =>  '',
             'USERS_INDEX_ALL_CURRENT'          =>  'Alle huidige gebruikers',
         
         'USERS_INDEX_USERTYPE'     =>  'Type gebruiker',
            'USERS_INDEX_USERTYPE_OWNER'                =>  'Eigenaar',
            'USERS_INDEX_USERTYPE_ADMIN'                =>  'Administratie',
            'USERS_INDEX_USERTYPE_USER'                 =>  'Gebruiker',
         
         'USER_INDEX_USERPROFILE' => '',
             'USERS_INDEX_USERPROFILE_ALT'      =>  'Ga naar het gebruikers profiel.',
             'USERS_INDEX_USERPROFILE_TITLE'    =>  'Ga naar het gebruikers profiel.',
         
         'USERS_INDEX_USEREDIT'             =>'',
             'USERS_INDEX_USEREDIT_ALT'         =>  'Gebruikersprofiel aanpassen.',
             'USERS_INDEX_USEREDIT_TITLE'       =>  'Gebruikersprofiel aanpassen.',
         
         'USERS_INDEX_USERDELETE'           =>  '',
             'USERS_INDEX_USERDELETE_ALT'       =>  'Gebruiker verwijderen.',
             'USERS_INDEX_USERDELETE_TITLE'     =>  'Gebruiker verwijderen.',
         
/*
 *  Related to Details
 */
         'USERS_DETAILS_TITLE'              =>  'Gebruiker overzicht',
         'USERS_DETAILS_MESSAGE'            =>  'Alle informatie behorende bij gebruiker : ',
         
         'USERS_DETAILS_TITLE2'             =>  'Persoonlijke informatie ',
         'USERS_DETAILS_MESSAGE2'           =>  'Overzicht met alle persoonlijke informatie over deze gebruiker.',
         
         'USERS_DETAILS_CURRENTSTATUS'      =>  'Huidige status',
         
         'USERS_DETAILS_TITLE3'             =>  'Status aanpassingen',
         'USERS_DETAILS_MESSAGE3'           =>  'Hieronder vindt u het overzicht van alle aanpassingen in de status. ',
 
/*
 * Related to Update 
 */
         
         'USERS_UPDATE_TITLE'                =>  'Pas gebruikersinformatie aan',
         
 /*
  * Related to Cookies
  */        
         'USERS_INDEX_COOKIES_SUCCES_ADDED'     => 'Nieuwe gebruiker is toegevoegd!!',
         'USERS_INDEX_COOKIES_SUCCES_CHANGED'   => 'De status is veranderd !!',
         'USERS_INDEX_COOKIES_SUCCES_UPDATED'   => 'Aanpassingen zijn uitgevoerd !!',
         'USERS_INDEX_COOKIES_SUCCES_REMOVED'   => 'Gebruiker is verwijderd !!',
         
         'USERS_INDEX_COOKIES_WARNING_GLOBAL'   => 'Er ging iets verkeerd. Probeert u het nog een keer !!',
         
         'USERS_INDEX_COOKIES_DANGER_OWNER_CHANGE'     => 'De informatie van de eigenaar kan niet aangepast worden !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_DELETE'     => 'De eigenaar kan niet verwijderd worden !!',
         'USERS_INDEX_COOKIES_DANGER_OWNER_OWN_STATUS' => 'Je kunt je eigen status niet aanpassen !!',
         
/*
 * Related to Modal pages
 */         
         'USERS_INDEX_MODAL_STATUS'         =>  '',
            
         'USERS_INDEX_MODAL_STATUS_MESSAGE'         =>  '',
                'USERS_INDEX_MODAL_STATUS_MESSAGE_REASON'     =>  '&nbsp; Geeft u a.u.b. een reden op voor het veranderen van de status van: ',
            
         'USERS_INDEX_MODAL_STATUS_CHANGE'         =>  'Verander de status',
            'USERS_INDEX_MODAL_STATUS_CHANGE_USERID'    =>  'Gebruikers nummer',
            'USERS_INDEX_MODAL_STATUS_CHANGE_STATUS'    =>  'Verander status naar : ',
            'USERS_INDEX_MODAL_STATUS_CHANGE_REASON'    =>  'Reden van de verandering ',
         
         'USERS_INDEX_MODAL_DELETE'         =>  '',
         
             'USERS_INDEX_MODAL_DELETE_TITLE'         =>  'Bevestiging voor het verwijderen van een gebruiker',
         
             'USERS_INDEX_MODAL_DELETE_CONFIRM'         =>  'Bevestig het verwijderen van deze gebruiker.',
                 'USERS_INDEX_MODAL_DELETE_CONFIRM_USER'         =>  'Weet je zeker dat je de volgende gebruiker wilt verwijderen : ',
         
         
         'USERS_INDEX_MODAL_CHANGEPASS'         =>  '',
             'USERS_INDEX_MODAL_CHANGEPASS_TITLE'         =>  'Wachtwoord veranderen',
             'USERS_INDEX_MODAL_CHANGEPASS_MESSAGE'       =>  'Hieronder kunt u uw wachtwoord veranderen.',
        
         
         
         ''=> ''


     ]);