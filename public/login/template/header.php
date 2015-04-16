
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL ?>public/login/css/bootstrap.min.2.3.1.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo URL ?>public/login/css/login.css" rel="stylesheet">
    
    <!-- Added CSS options -->
    <?php
        /*
         *  Use a predefined .css file set in the controller.
         *  @param string $css This is the path set in the controler to the .css file
         */
        if(isset($this->css)){
            foreach($this->css as $css){
                echo '<link rel="stylesheet" type="text/css" href="' .URL. 'public/login/css/'.$css.'"/>';
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
                echo '<script type="text/javascript" src="'.URL.'public/login/js/'.$js.'"></script>';
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

