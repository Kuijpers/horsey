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

         'USERS_DEFAULT'            => 'Users',
         'USERS_CREATE_NEW'         => 'Create a new user',
         'USERS_DELETE'             => 'Delete this user',

         'USERS_NAME'               => 'Name'


     ]);