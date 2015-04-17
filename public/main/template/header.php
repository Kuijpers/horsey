<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Le styles -->
    <link href="<?php echo URL ?>public/main/css/bootstrap.min.2.3.1.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/main/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/main/css/navbar.css" rel="stylesheet">
    <link href="<?php echo URL ?>public/main/css/sticky-footer.css" rel="stylesheet">
    
    
    <!-- Added CSS options -->
    <?php
        /*
         *  Use a predefined .css file set in the controller.
         *  @param string $css This is the path set in the controler to the .css file
         */
        if(isset($this->css)){
            foreach($this->css as $css){
                echo '<link rel="stylesheet" type="text/css" href="' .URL. 'public/main/css/'.$css.'"/>';
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
                echo '<script type="text/javascript" src="'.URL.'public/main/js/'.$js.'"></script>';
            }
        }
    ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <!--[if IE 7]>
          <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome-ie7.css" rel="stylesheet">
    <![endif]-->

<title><?=(isset($this->title)) ? $this->title : 'Horsey CMS'; ?></title>

</head>

    <noscript>
        <style type="text/css">
            .container {display:none};
        </style>
        <div class="noscriptmessage">
            This website requires JavaScript to be enabled.
        </div>
    </noscript>

<body>
<div class="container">


