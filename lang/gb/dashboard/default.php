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
     'DASH_CONFIRM'             => 'Confirm',
     'DASH_AGREE'               => 'Agree',
     'DASH_CONTINUE'            => 'Continue',
     'DASH_SUBMIT'              => 'Submit',
     'DASH_CHANGE'              => 'Change',
     
     'DASH_CANCEL'              => 'Cancel',
     
     'DASH_DELETE'              => 'Delete',
     
     'DASH_ADD'                 => 'Add',
     
     'DASH_UPDATE'              => 'Update',
     
     'DASH_NEXT'                => 'Next',
     'DASH_PREVIOUS'            => 'Previous',
     'DASH_FIRST'               => 'First',
     'DASH_LAST'                => 'Last',
     
     'DASH_DATE'                => 'Date',
     'DASH_TIME'                => 'Time',
     
     'DASH_FROM'                => 'From',
     'DASH_TO'                  => 'To',
     
     'DASH_REASON'              => 'Reason',
     'DASH_WHOS'                => 'By who',
     
     
     'DASH_NO_INFO'             => 'No information available !',
     
     
     'DASH_LANG_'               => 'Default language (English)',
     'DASH_LANG_DE'             => 'German',
     'DASH_LANG_FR'             => 'French',
     'DASH_LANG_GB'             => 'English',
     'DASH_LANG_NL'             => 'Dutch',
     
     'DASH_SET_LANG'            => 'Set your language'
     
     
 ]);
