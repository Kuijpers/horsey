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
     
     'NAV_TOGGLE'             => 'Toggle -Menü'
     
     ,'NAV_WEBSITE'           => 'Webseite'
     
     ,'NAV_DASHBOARD'         => 'Armaturenbrett'
     
     ,'NAV_PAGES'             => 'Seiten'
         ,'NAV_PAGES_HOME'         => 'Start'
     
         ,'NAV_PAGES_ABOUT'        => 'Uber uns'
     
         ,'NAV_PAGES_HORSES'       => 'Pferde'
             ,'NAV_PAGES_HORSES_OVERVIEW'       => 'Übersicht Pferde'
             ,'NAV_PAGES_HORSES_OWNED'          => 'Besitz'
             ,'NAV_PAGES_HORSES_FRIENDS'        => 'Freunde'

         ,'NAV_PAGES_FORSALE'       => 'Zu verkaufen'
             ,'NAV_PAGES_FORSALE_OVERVIEW'      => 'Übersicht zum Verkauf'
             ,'NAV_PAGES_FORSALE_HORSES'        => 'Pferde zum Verkauf'
             ,'NAV_PAGES_FORSALE_EQUIPMENT'     => 'Geräte zum Verkauf'

         ,'NAV_PAGES_LINKS'        => 'Links'

     ,'NAV_SETTINGS'       => 'Einstellungen'
         ,'NAV_SETTINGS_CONTACT'      => 'Kontakt'
         ,'NAV_SETTINGS_BREEDING'     => 'Zucht'
         ,'NAV_SETTINGS_FORSALE'      => 'Zu verkaufen'
     
         ,'NAV_SETTINGS_ADMIN'        => 'Admin'
             ,'NAV_SETTINGS_ADMIN_USERS'      => 'Benutzer'
             ,'NAV_SETTINGS_ADMIN_ADDUSER'      => 'Benutzer hinzufügen'
             ,'NAV_SETTINGS_ADMIN_USERINFO'      => 'Benutzerinfo'
             ,'NAV_SETTINGS_ADMIN_UPDATEUSER'      => 'Benutzer aktualisieren'

     ,'NAV_CALENDAR'       => 'Kalender'

     ,'NAV_SEARCH'       => 'Suche'
         ,'NAV_SEARCH_PLACEHOLDER'     => 'Suche'
         ,'NAV_SEARCH_GO'              => 'Suche'

     ,'NAV_MESSAGES'       => 'Nachrichten'
         ,'NAV_MESSAGES_VIEWALL'       => 'Zeige alles'

     ,'NAV_PERSONAL'       => ''     
         ,'NAV_PERSONAL_PROFILE'        => 'Profil'
         ,'NAV_PERSONAL_SETTINGS'       => 'Einstellungen'
         ,'NAV_PERSONAL_HELP'       => 'Hilfe'
         ,'NAV_PERSONAL_USERGUIDE'  => 'Benutzerhandbuch'
         ,'NAV_PERSONAL_LOGOUT'     => 'Abmelden',
     
         'NAV_USERTYPE'       => '',
            'NAV_USERTYPE_OWNER'              => 'Eigentümer',     
            'NAV_USERTYPE_ADMIN'              => 'Admin',     
            'NAV_USERTYPE_USER'               => 'Benutzer'
     
     
     
 ]);
