<?php

// Default DASHBOARD language list

// DO NOT CHANGE
        // Check if CONSTANT exists
        if(!defined('IN_HORSEY')){
            exit;
        }

        if (empty($lang) || !is_array($lang)){
            $lang = [];
        }
 $lang = array_merge($lang, [
     
     
     'DASH_OK'                  => 'Ok',
     'DASH_CONFIRM'             => 'Bevestigen',
     'DASH_AGREE'               => 'Akkoord',
     'DASH_CONTINUE'            => 'Verder',
     'DASH_SUBMIT'              => 'Indienen',
     'DASH_CHANGE'              => 'Aanpassen',
     
     'DASH_CANCEL'              => 'Annuleren',
     
     'DASH_DELETE'              => 'Verwijderen',
     
     'DASH_ADD'                 => 'Toevoegen',
     
     'DASH_NEXT'                => 'Volgende',
     'DASH_PREVIOUS'            => 'Vorige',
     'DASH_FIRST'               => 'Eerste',
     'DASH_LAST'                => 'Laatste',
     
     'DASH_DATE'                => 'Datum',
     'DASH_TIME'                => 'Tijd',
     
     'DASH_FROM'                => 'Van',
     'DASH_TO'                  => 'Naar',
     
     'DASH_REASON'              => 'Reden',
     'DASH_WHOS'                => 'Door wie',
     
     
     'DASH_NO_INFO'             => 'Geen informatie beschikbaar!',
     
     
     'DASH_LANG_DE'             => 'Duits',
     'DASH_LANG_FR'             => 'Frans',
     'DASH_LANG_GB'             => 'Engels',
     'DASH_LANG_NL'             => 'Nederlands',
     
     'DASH_SET_LANG'            => 'Stel hier uw taal in'
     
     
 ]);
