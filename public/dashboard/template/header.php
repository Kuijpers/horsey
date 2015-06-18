<?php
use DKW\Tracking\Logged as Logged;
use DKW\Tracking\Session as Session;

        /**
         * Check if user is already logged in. If not redirect to loginpage.
         *
         */
        if(Logged::check_logged()){ 
            if(! Session::exsist('login_id')){
                $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
                $query ="SELECT User.*,  Login.*
                                FROM Login
                                JOIN User ON 
                                Login.login_id = User.Login_login_id
                                and 
                                Login.login_id = :login_id "; 
                $array = [ ':login_id' => $_COOKIE[COOKIE_LOG_NAME]];
                // Get the information
                $data = $this->db->read($query, $array);
                
                // Remove slashes for debug. After removal logout and login again
                    //echo "<pre>";print_r($data);echo "</pre>"; die();
                
                Session::set('login_id', $data[0]['login_id']);
                Session::set('login_usertype', $data[0]['login_usertype']);
                Session::set('login_status', $data[0]['login_status']);
                Session::set('user_firstname', $data[0]['user_firstname']);
                Session::set('user_lastname', $data[0]['user_lastname']);
                Session::set('user_email', $data[0]['user_email']);
            }
        }
?>

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
    <!-- Core JS styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo URL ?>public/dashboard/js/bootstrap.js"></script>
    
    <!-- Theme files -->
    <link href="<?php echo URL ?>public/dashboard/css/nav-dropdown.css" rel="stylesheet">
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


