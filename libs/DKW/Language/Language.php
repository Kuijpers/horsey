<?php
namespace DKW\Language ;

/**
 * Description of Language
 *
 * @author Web
 */
class Language {

/**
 *  function __construct will automatically generate when method is called
 */
    public function __construct() {
        // empty for now
    }
/**
 * get_lang_files($selected_language, $subfolder, $files, $lang= [])
 * 
 * This method will return the array with translations for the requested language
 * When language doesn't exist it will use the default language set in DB
 * 
 * @param String $selected_language The language the website owner would like to see for the website
 * @param String $subfolder The subfolder tells for what part the languages are
 * @param Array $files The requested files to use for the translation
 * @param Array $lang Possible Array that already exists with the translations
 * @return Array Array All translated variables
 */
    public static function get_lang_files($selected_language, $subfolder, $files, $lang= []){
           
        // Check what languages can be used from LANG folder
        $available_languages = self::_get_languages();

        // Set the language to use
        $language_folder = self::_set_language($selected_language, $available_languages);

        // Get the language files
          foreach ($files as $file) {
                if(file_exists(''.LANG.$language_folder.'/'. $subfolder .'/'. $file .'.php')){
                    require_once ''.LANG.$language_folder.'/'. $subfolder .'/'. $file .'.php' ;
                }else{
                    echo ''.LANG.$language_folder.'/'. $subfolder .'/'. $file .'.php <b>does not exist!!</b>' ;echo "<br>";die();
                }
            }
        return $lang;
    }
/*
 * _get_languages()
 * 
 * Get the available languages in the LANG folder
 * 
 * @return Array An array with all available languages
 */
    private static function _get_languages(){
        return array_diff(scandir(LANG), array('..', '.'));
    }
/*
 * _set_language($language, $available_languages)
 * 
 * Set the languages to use
 * 
 * @param STRING $language The requested language
 * @param Array $available_languages The languages that are available from the LANG folder
 * 
 * @return sting The language to use on the website
 */
    private static function _set_language($language, $available_languages){
            // Set default language
            $default_language = "gb"; // This has to be taken from MODEL
            //
            // If requested language doesn't exist, in LANG folder, use the default language as language
            if(!in_array($language, $available_languages)){
            $language = $default_language;
            }
            
            return $language;
        
    }
    
} // End of class
