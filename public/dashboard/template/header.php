<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="icon" href="../../favicon.ico">-->

    <title><?=(isset($this->title)) ? $this->title : 'Horsey CMS'; ?></title>
    
    <!-- Core CSS styles -->
    <link href="<?php echo URL ?>public/dashboard/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/dashboard/css/bootstrap-theme.css" rel="stylesheet">
    
    <!-- Theme files -->
    <link href="<?php //echo URL ?>../public/dashboard/css/nav-dropdown.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/dashboard/css/admin-nav.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/dashboard/css/sticky-footer.css" rel="stylesheet">
    
    <!-- Added CSS options -->
    <?php
        /*
         *  Use a predefined .css file set in the controller.
         *  @param string $css This is the path set in the controler to the .css file
         */
        if(isset($this->css)){
            foreach($this->css as $css){
                echo '<link rel="stylesheet" type="text/css" href="' .URL. 'public/dashboard/css/'.$css.'"/>';
            }
        }
    ?>
    
    
    <!-- Added JS options -->
    <?php
        /*
         *  Use a predefined .js file set in the controller.
         *  @param string $js This is the path set in the controler to the .js file
         */
        if(isset($this->js)){
            foreach($this->js as $js){
                echo '<script type="text/javascript" src="'.URL.'public/dashboard/js/'.$js.'"></script>';
            }
        }
    ?>
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

<body>
    <div class="container">


