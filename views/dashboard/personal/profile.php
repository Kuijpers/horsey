<?php
//echo "<pre>"; print_r($lang); echo "</pre>";
//echo "<pre>"; print_r($_SESSION); echo "</pre>";

    $user_details   = $this->user_details['user_details'];
    $login_info     = $this->user_details['login_info'];
    $user_status    = $this->user_details['status_overview'];
    $pagepath       = $this->pagepath;
    
    
    use DKW\Tracking\Session as Session;
    
    

if(Session::exsist('danger')){
        echo "<div class='alert alert-danger' role='alert'><p><center><b>";
        echo "<span class='glyphicon glyphicon-exclamation-sign'></span>";
        echo $lang['PERSONAL_PROFILE_COOKIES_DANGER_'.Session::get('danger')];
        echo "</b></center></p></div>";
        Session::delete('danger');
    }
    if(Session::exsist('succes')){
        echo "<div class='alert alert-success' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-ok'></span>";
        echo $lang['PERSONAL_PROFILE_COOKIES_SUCCES_'.Session::get('succes')];
        echo "</center></p></div>";
        Session::delete('succes');
    }
    if(Session::exsist('warning')){
        echo "<div class='alert alert-warning' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-warning-sign'></span>";
        echo $lang['PERSONAL_PROFILE_COOKIES_WARNING_'.Session::get('warning')];
        echo "</center></p></div>";
        Session::delete('warning');
    }
    ?>
<div class="col-md-9">
<div class="panel panel-info">
    <div class="panel-heading">
      <h1 class="panel-title"><b><?php echo $lang['PERSONAL_TITLE'];?></b></h1>
      <?php echo $lang['PERSONAL_MESSAGE'];?>
    </div>
    <div class="panel-body">
        <!-- Registration -->
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><b><?php echo $lang['PERSONAL_PROFILE_REGISTRATION_TITLE'];?></b></h3>
              <?php echo $lang['PERSONAL_PROFILE_REGISTRATION_MESSAGE'];?>
          </div>
          <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <table class="table table-striped">
                                    <tbody>
<?php
//echo "<pre>";print_r($user_details);echo "</pre>";
foreach ($user_details[0] as $key => $value) {
    switch ($key) {
        case "user_id":break;
        case "Login_login_id":break;
        case "user_language":
            echo "<tr><td><strong>";
            echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
            echo "</strong></td><td>";
            echo $lang['DASH_LANG_'.strtoupper($value)];
            echo "</td></tr>";
            break;
        case "user_creation_date":
            echo "<tr><td><strong>";
            echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
            echo "</strong></td><td>";
            echo date("d-m-Y", strtotime($value));
            echo "</td></tr>";
            break;
        default:
            echo "<tr><td><strong>";
            echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
            echo "</strong></td><td>";
            echo $value;
            echo "</td></tr>";
    }
}
?>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                Hier komt de foto.
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="<?php echo URL . $pagepath ?>edit_registration/  ">
                                    <?php echo $lang['PERSONAL_PROFILE_EDIT_REGISTRATION_BUTTON'];?>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="#">
                                    <?php echo $lang['PERSONAL_PROFILE_EDIT_PICTURE_BUTTON'];?>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
          </div>
        </div>
        <!-- Login info -->
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><b><?php echo $lang['PERSONAL_PROFILE_LOGIN_TITLE'];?></b></h3>
              <?php echo $lang['PERSONAL_PROFILE_LOGIN_MESSAGE'];?>
          </div>
          <div class="panel-body">
                <table class="table table-striped">
                    <tbody>
<?php
//echo "<pre>";print_r($login_info);echo "</pre>";
foreach ($login_info[0] as $key => $value) {
    switch ($key) {
        case "login_id":break;
        case "login_password":break;
        case "login_firstlog":break;
        case "login_verified":break;
        case "login_verification":break;
        case "login_usertype":
            echo "<tr><td><strong>";
            echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
            echo "</strong></td><td>";
            echo $lang['PERSONAL_PROFILE_USERTYPE_'.strtoupper($value)];
            echo "</td></tr>";
            break;
        case "login_status":
            switch ($value) {
                case 'active':$button = "success"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_ACTIVE']; break;
                case 'blocked':$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
                case 'inactive':$button = "warning"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'];break;
                default:$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
            }
                echo "<tr><td><strong>";
                echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
                echo "</strong></td><td>";
                echo "<button type='button' class='btn btn-$button btn-xs dropdown-toggle glyphicon glyphicon-flag' title='$title' alt='$title'><b>".  ucfirst($value)."</b></button>";
                echo "</td></tr>";
            break;
        default:
            echo "<tr><td><strong>";
            echo $lang['PERSONAL_PROFILE_'.strtoupper($key)];
            echo "</strong></td><td>";
            echo $value;
            echo "</td></tr>";
    }
}
?>
                        <tr>
                            <td colspan="2">
                                <a class="btn btn-primary" href="<?php echo URL . $pagepath ?>edit_username/">
                                    <?php echo $lang['PERSONAL_PROFILE_EDIT_USERNAME_BUTTON'];?>
                                </a>
                            </td>
                        </tr>    
                    </tbody>
                </table>
          </div>
        </div>
        <!-- User status -->
        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><b><?php echo $lang['PERSONAL_PROFILE_STATUS_TITLE'];?></b></h3>
              <?php echo $lang['PERSONAL_PROFILE_STATUS_MESSAGE'];?>
          </div>
          <div class="panel-body">
                <table class="table table-striped">
                    <tbody>
<?php
//echo "<pre>";print_r($user_status);echo "</pre>";
if(empty($user_status)){
    echo "<tr><td>";
    echo $lang['DASH_NO_INFO'];
    echo "</td></tr>";
}else{
    foreach ($user_status as $arraykey => $value) {
        echo "<tr>";
            foreach ($user_status[$arraykey] as $key => $value) {
                switch($key){
                  case "user_status_id": break;
                  case "Login_login_id": break;
                  case "user_status_who": break;
                  case "user_status_previous": 
                    switch ($value) {
                            case 'active':$button = "success"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_ACTIVE']; break;
                            case 'blocked':$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
                            case 'inactive':$button = "warning"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'];break;
                            default:$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
                        }
                        echo "<td>";
                        echo "<button type='button' class='btn btn-$button btn-xs dropdown-toggle glyphicon glyphicon-flag' title='$title' alt='$title'><b>".  ucfirst($value)."</b></button>";
                        echo "</td><td><span class='glyphicon glyphicon-arrow-right'></span></td>";
                    break;
                  case "user_status_new": 
                    switch ($value) {
                            case 'active':$button = "success"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_ACTIVE']; break;
                            case 'blocked':$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
                            case 'inactive':$button = "warning"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_INACTIVE'];break;
                            default:$button = "danger"; $title = $lang['PERSONAL_PROFILE_STATUS_TITLE_BLOCKED'];break;
                        }
                        echo "<td>";
                        echo "<button type='button' class='btn btn-$button btn-xs dropdown-toggle glyphicon glyphicon-flag' title='$title' alt='$title'><b>".  ucfirst($value)."</b></button>";
                        echo "</td>";
                    break;
                  case "user_status_date": 
                        echo "<td>";
                        echo date("d-m-Y", strtotime($value));
                        echo "</td>";
                      break;

                  default:
                        echo "<td>";
                        echo nl2br($value);
                        echo "</td>";
                }
            }
        echo "</tr>";
    }
}


?>
                        
                        
                    </tbody>
                </table>
          </div>
        </div>
    </div>
</div>
</div>

<!--<div class='btn-group'>-->