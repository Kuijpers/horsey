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
     'DASH_CONFIRM'             => 'Bestätigen',
     'DASH_AGREE'               => 'Zustimmen',
     'DASH_CONTINUE'            => 'Fortsetzen',
     'DASH_SUBMIT'              => 'Einreichen',
     'DASH_CHANGE'              => 'Wechseln',
     
     'DASH_CANCEL'              => 'Stornieren',
     
     'DASH_DELETE'              => 'Löschen',
     
     'DASH_ADD'                 => 'Hinzufügen',
     
     'DASH_NEXT'                => 'Nächster',
     'DASH_PREVIOUS'            => 'Früher',
     'DASH_FIRST'               => 'Erste',
     'DASH_LAST'                => 'Letzte',
     
     'DASH_DATE'                => 'Datum',
     'DASH_TIME'                => 'Zeit',
     
     'DASH_FROM'                => 'Von',
     'DASH_TO'                  => 'Bis',
     
     'DASH_REASON'              => 'Grund',
     'DASH_WHOS'                => 'Durch die',
     
     
     'DASH_NO_INFO'             => 'Keine Information verfügbar !',
     
     
     'DASH_LANG_DE'             => 'Deutsch',
     'DASH_LANG_FR'             => 'Französisch',
     'DASH_LANG_GB'             => 'English',
     'DASH_LANG_NL'             => 'Holländisch',
     
     'DASH_SET_LANG'            => 'Legen Sie Ihre Sprache'
     
     
 ]);
