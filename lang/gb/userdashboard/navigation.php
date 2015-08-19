<?php

// Navigation language list

// DO NOT CHANGE
        // Check if CONSTANT exists
        if(!defined('IN_HORSEY')){
            exit;
        }

        if (empty($lang) || !is_array($lang)){
            $lang = [];
        }
 $lang = array_merge($lang, [
     
     'NAV_TOGGLE'             => 'Toggle menu'
     
     ,'NAV_WEBSITE'           => 'Website'
     
     ,'NAV_DASHBOARD'         => 'Dashboard'
     
     ,'NAV_PAGES'             => 'Pages'
         ,'NAV_PAGES_HOME'         => 'Start'
     
         ,'NAV_PAGES_ABOUT'        => 'About us'
     
         ,'NAV_PAGES_HORSES'       => 'Horses'
             ,'NAV_PAGES_HORSES_OVERVIEW'       => 'Overview horses'
             ,'NAV_PAGES_HORSES_OWNED'          => 'Owned'
             ,'NAV_PAGES_HORSES_FRIENDS'        => 'Friends'

         ,'NAV_PAGES_FORSALE'       => 'For sale'
             ,'NAV_PAGES_FORSALE_OVERVIEW'      => 'Overview for sale'
             ,'NAV_PAGES_FORSALE_HORSES'        => 'Horses for sale'
             ,'NAV_PAGES_FORSALE_EQUIPMENT'     => 'Equipment for sale'

         ,'NAV_PAGES_LINKS'        => 'Links'

     ,'NAV_SETTINGS'       => 'Settings'
         ,'NAV_SETTINGS_CONTACT'      => 'Contact'
         ,'NAV_SETTINGS_BREEDING'     => 'Breeding'
         ,'NAV_SETTINGS_FORSALE'      => 'For sale'
     
         ,'NAV_SETTINGS_ADMIN'        => 'Admin'
             ,'NAV_SETTINGS_ADMIN_USERS'      => 'Users'

     ,'NAV_CALENDAR'       => 'Calendar'

     ,'NAV_SEARCH'       => 'Search'
         ,'NAV_SEARCH_PLACEHOLDER'     => 'Search'
         ,'NAV_SEARCH_GO'              => 'Search'

     ,'NAV_MESSAGES'       => 'Messages'
         ,'NAV_MESSAGES_VIEWALL'       => 'Show all'

     ,'NAV_PERSONAL'       => ''     
         ,'NAV_PERSONAL_PROFILE'        => 'Profile'
         ,'NAV_PERSONAL_SETTINGS'       => 'Settings'
         ,'NAV_PERSONAL_HELP'       => 'Help'
         ,'NAV_PERSONAL_USERGUIDE'  => 'Userguide'
         ,'NAV_PERSONAL_LOGOUT'     => 'Logout',
     
         'NAV_USERTYPE'       => '',
            'NAV_USERTYPE_OWNER'              => 'Owner',     
            'NAV_USERTYPE_ADMIN'              => 'Admin',     
            'NAV_USERTYPE_USER'               => 'User'
     
     
     
 ]);
