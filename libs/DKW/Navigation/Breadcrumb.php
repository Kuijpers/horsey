<?php
namespace DKW\Navigation ;


/**
 * Description of Breadcrumb
 *
 * @author Web
 */
class Breadcrumb {

    /**
     * *  function __construct will automatically generate when method is called
     * */
    public function __construct() {
        // empty for now
    }

    public static function init($breadcrumblist = [], $class, $active){
        if(empty($breadcrumblist)){
            return '<div class="panel panel-warning">
                    <div class="panel-heading ">
                    <center>
                    <b>
                    <span class="glyphicon glyphicon-alert"></span>
                    No breadcrumbs are set !  
                    <span class="glyphicon glyphicon-alert"></span>
                    </b>
                    </center>
                    </div>
                    </div>';
        }
        $breadcrumb = "";
        $breadcrumb = "\n<ol class='$class'>\n";
        foreach ($breadcrumblist as $key => $value) {
                if(empty($value) && $key != $active){
                   $breadcrumb = $breadcrumb . "   <li> " . $key . " </li>\n";
                }
                elseif ($key == $active) {
                    $breadcrumb = $breadcrumb .  "   <li class='active'> " . $key . " </li>\n";
                }
                else{
                    $breadcrumb = $breadcrumb .  "   <li><a href='". URL . $value ."'> ". $key ." </a></li>\n";
                }
            }
        $breadcrumb = $breadcrumb .  "</ol>\n";
        return $breadcrumb;
    }
    
} // End of class
