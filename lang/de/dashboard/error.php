<?php

// Error language list

// DO NOT CHANGE
        // Check if CONSTANT exists
        if(!defined('IN_HORSEY')){
            exit;
        }

        if (empty($lang) || !is_array($lang)){
            $lang = [];
        }
 $lang = array_merge($lang, [
     
       'BREADCRUMB_NOTSET'                  => 'No breadcrumbs are set !',   
     
     
 ]);

