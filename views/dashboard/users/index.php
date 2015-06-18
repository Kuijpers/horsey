<?php

use DKW\Tracking\Session as Session;


 //echo "<pre>"; print_r($_SESSION); echo "</pre>";

    $userdata = $this->show_usersdata;
    $pagepath = $this->pagepath;
    $token = new DKW\Security\Token();
?>

<ol class="breadcrumb">
  <li><a href="<?php echo URL  ?>dashboard/">Home</a></li>
  <li>Settings</li>
  <li> <a href="<?php echo URL ?>admin_settings">Admin</a></li>
  <li class="active">Users</li>
</ol>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h4> Users </h4>
  </div>
  <div class="panel-body">
    <p>All current users</p>
    <?php
    if(Session::exsist('danger')){
        echo "<div class='alert alert-danger' role='alert'><p><center><b>";
        echo "<span class='glyphicon glyphicon-exclamation-sign'></span>";
        echo Session::get('danger');
        echo "</b></center></p></div>";
        Session::delete('danger');
    }
    if(Session::exsist('succes')){
        echo "<div class='alert alert-success' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-ok'></span>";
        echo Session::get('succes');
        echo "</center></p></div>";
        Session::delete('succes');
    }
    if(Session::exsist('warning')){
        echo "<div class='alert alert-warning' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-warning-sign'></span>";
        echo Session::get('warning');
        echo "</center></p></div>";
        Session::delete('warning');
    }
    // Remove slashes for debug
       //Debug::array_list($userdata);
?>
  </div>
  <?php
  if($_SESSION['login_usertype'] == 'owner'){
    require_once('public/dashboard/template/modals/user_delete_confirm.php');
  }
  if($_SESSION['login_usertype'] == 'owner' || $_SESSION['login_usertype'] == 'admin'){
      require_once('public/dashboard/template/modals/user_change_status.php');
  }
  ?>
    <table class="table table-striped">
        <thead>
            <th><label><input type="checkbox"></label></th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Username</th>
            <th>Usertype</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            <?php
                    foreach ($userdata as $key => $value) {
                        switch ($value['login_status']) {
                                case 'first':
                                    $button = "info";
                                    $title = "First log required";
                                break;
                                case 'active':
                                    $button = "success";
                                    $title = "Active";
                                break;
                                case 'blocked':
                                    $button = "danger";
                                    $title = "Blocked";
                                break;
                                case 'inactive':
                                    $button = "warning";
                                    $title = "Inactive";
                                break;
                                default:
                                    $button = "info";
                                    $title = "First log required";
                                break;
                                }
                        echo "<tr>\n";
                        echo "      <td><label><input type='checkbox' name='user' value='". $value['user_id'] ."'></label></td>\n";
                        echo "      <td>". $value['user_firstname']  ."</td>\n";
                        echo "      <td>". $value['user_lastname']  ."</td>\n";
                        echo "      <td>". $value['user_telephone']  ."</td>\n";
                        echo "      <td>". $value['user_email']  ."</td>\n";
                        echo "      <td>". $value['login_name']  ."</td>\n";
                        echo "      <td>". ucfirst($value['login_usertype'])  ."</td>\n";
                        echo "      <td> <div class='btn-group'><button type='button' class='btn btn-$button btn-xs dropdown-toggle glyphicon glyphicon-flag' data-toggle='dropdown' aria-expanded='false' title='$title' alt='$title'></button> \n";
                        if($_SESSION['login_usertype'] == 'owner' || $_SESSION['login_usertype'] == 'admin'){
                            if($_SESSION['login_usertype'] == 'owner'||($_SESSION['login_usertype'] == 'admin' && $value['login_status'] != "blocked")){
                        echo "      <ul class='dropdown-menu' role='menu'>\n";
                                if($value['login_status']!="active"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='&nbsp; Please give a reason for changing the status of: ". $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."' data-status='active'>Active Status</a></li>\n";
                               }
                               if($value['login_status']!="inactive"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='&nbsp; Please give a reason for changing the status of: ". $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."'data-status='inactive'>Inactive Status</a></li>\n";
                               }
                            }
                            if($_SESSION['login_usertype'] == 'owner'){
                                if($value['login_status']!="blocked"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='&nbsp; Please give a reason for changing the status of: ". $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."' data-status='blocked'>Blocked Status</a></li>\n";
                                }
                            }
                        echo "     </ul></div>";
                        }
                        echo "      <a class='btn btn-default btn-xs glyphicon glyphicon-user' role='button' href='". URL .$pagepath."details/user/". $value['user_id']  ."'></a> \n";
                            if($_SESSION['login_usertype'] == 'owner' || $_SESSION['login_usertype'] == 'admin'){
                        echo "      <a class='btn btn-primary btn-xs glyphicon glyphicon-edit' role='button' href='". URL .$pagepath."update/user/". $value['user_id']  ."'></a> \n";
                                if($_SESSION['login_usertype'] == 'owner'){
                        echo "      <a class='btn btn-danger btn-xs glyphicon glyphicon-trash' role='button' href='#' data-toggle='modal' data-target='#confirm-delete'  data-href='". URL .$pagepath."delete/user/". $value['user_id']  ."' data-title='Do you realy want to delete user:". $value['user_firstname']  ." ". $value['user_lastname']  ." '></a></td>\n";
                                }
                            }
                        echo "</tr>\n";
                       }
               ?>
            <tr>
                <td colspan="4">
                    <select class="form-control">
                          <option>What to do with selected ?</option>
                          <option>Delete All</option>
                          <option>Show all in detail</option>
                          <option>Activate</option>
                          <option>Deactivate</option>
                          <option>Block</option>
                    </select>
                </td>
                <td colspan="4">
                  <div class="form-group">
                    <div class=" col-sm-10">
                      <button type="submit" class="btn btn-default">Select</button>
                    </div>  
                  </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <a class="btn btn-default btn-lg glyphicon glyphicon-plus" href="<?php echo URL . $pagepath ?>add" role="button"><b></b></a>
                </td>
                <td colspan="7">
                    &nbsp;
                </td>
            </tr>

        </tbody> 
    </table>
</div>