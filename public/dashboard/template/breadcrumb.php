<?php
if(isset($this->arrBreadcrumb)){
    $arrBreadcrumb = [];
    $arrBreadcrumb[0] = [];
    $arrBreadcrumb[1] = $this->arrBreadcrumb[1];
    $arrBreadcrumb[2] = $lang[$this->arrBreadcrumb[2]];
    
    foreach ($this->arrBreadcrumb[0] as $key => $value) {
        $arrStack = [$lang[$key] => $value] ;
        $arrBreadcrumb[0] = array_merge($arrBreadcrumb[0], $arrStack);  
    }
}


if(empty($this->arrBreadcrumb)){
   echo '<div class="panel panel-warning">
                    <div class="panel-heading ">
                    <center>
                    <b>
                    <span class="glyphicon glyphicon-alert"></span>
                    '.$lang['BREADCRUMB_NOTSET'].'   
                    <span class="glyphicon glyphicon-alert"></span>
                    </b>
                    </center>
                    </div>
                    </div>'; 
}else{
  echo DKW\Navigation\Breadcrumb::init($arrBreadcrumb[0], $arrBreadcrumb[1], $arrBreadcrumb[2]);  
}

