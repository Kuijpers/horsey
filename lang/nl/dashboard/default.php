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
     
     'DASH_LANG_DE'             => 'Duits',
     'DASH_LANG_FR'             => 'Frans',
     'DASH_LANG_GB'             => 'Engels',
     'DASH_LANG_NL'             => 'Nederlands',
     
     'DASH_SET_LANG'            => 'Stel hier uw taal in'
     
     
 ]);
