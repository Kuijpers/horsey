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
     
     'DASH_LANG_DE'             => 'German',
     'DASH_LANG_FR'             => 'French',
     'DASH_LANG_GB'             => 'English',
     'DASH_LANG_NL'             => 'Dutch',
     
     'DASH_SET_LANG'            => 'Please set your language'
     
     
 ]);