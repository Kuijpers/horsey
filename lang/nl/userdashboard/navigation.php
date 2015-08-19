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
     
     'NAV_TOGGLE'             => 'Wissel menu'
     
     ,'NAV_WEBSITE'           => 'Website'
     
     ,'NAV_DASHBOARD'         => 'Dashboard'
     
     ,'NAV_PAGES'             => 'Pagina\'s'
         ,'NAV_PAGES_HOME'         => 'Start'
     
         ,'NAV_PAGES_ABOUT'        => 'Over ons'
     
         ,'NAV_PAGES_HORSES'       => 'Paarden'
             ,'NAV_PAGES_HORSES_OVERVIEW'       => 'Overzicht paarden'
             ,'NAV_PAGES_HORSES_OWNED'          => 'In eigendom'
             ,'NAV_PAGES_HORSES_FRIENDS'        => 'Van vrienden'

         ,'NAV_PAGES_FORSALE'       => 'Te koop'
             ,'NAV_PAGES_FORSALE_OVERVIEW'      => 'Overzicht te koop'
             ,'NAV_PAGES_FORSALE_HORSES'        => 'Paarden te koop'
             ,'NAV_PAGES_FORSALE_EQUIPMENT'     => 'Materiaal te koop'

         ,'NAV_PAGES_LINKS'        => 'Links'

     ,'NAV_SETTINGS'       => 'Instellingen'
         ,'NAV_SETTINGS_CONTACT'      => 'Contact'
         ,'NAV_SETTINGS_BREEDING'     => 'Fokkerij'
         ,'NAV_SETTINGS_FORSALE'      => 'Te koop'
     
         ,'NAV_SETTINGS_ADMIN'        => 'Administratief'
             ,'NAV_SETTINGS_ADMIN_USERS'      => 'Gebruikers'

     ,'NAV_CALENDAR'       => 'Kalender'

     ,'NAV_SEARCH'       => 'Zoeken'
         ,'NAV_SEARCH_PLACEHOLDER'     => 'Zoeken'
         ,'NAV_SEARCH_GO'              => 'Zoek'

     ,'NAV_MESSAGES'       => 'Berichten'
         ,'NAV_MESSAGES_VIEWALL'       => 'Bekijk ze allemaal'

     ,'NAV_PERSONAL'       => ''     
         ,'NAV_PERSONAL_PROFILE'        => 'Profiel'
         ,'NAV_PERSONAL_SETTINGS'       => 'Instellingen'
         ,'NAV_PERSONAL_HELP'       => 'Hulp'
         ,'NAV_PERSONAL_USERGUIDE'  => 'Handleiding'
         ,'NAV_PERSONAL_LOGOUT'     => 'Uitloggen',
     
     'NAV_USERTYPE'       => '',
            'NAV_USERTYPE_OWNER'              => 'Eigenaar',     
            'NAV_USERTYPE_ADMIN'              => 'Administratie',     
            'NAV_USERTYPE_USER'               => 'Gebruiker'
     
     
     
 ]);
