<?php

use DKW\Tracking\Session as Session;


//echo "<pre>"; print_r($_SESSION); echo "</pre>";

    $userdata = $this->show_usersdata;
    $pagepath = $this->pagepath;
    $token = new DKW\Security\Token();
?>

<div class="col-md-9">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h4> <?php echo $lang['USERS_DEFAULT'];?> </h4>
  </div>
  <div class="panel-body">
    <p><?php echo $lang['USERS_INDEX_ALL_CURRENT'];?></p>
    <?php
    if(Session::exsist('danger')){
        echo "<div class='alert alert-danger' role='alert'><p><center><b>";
        echo "<span class='glyphicon glyphicon-exclamation-sign'></span>";
        echo $lang['USERS_INDEX_COOKIES_DANGER_'.Session::get('danger')];
        echo "</b></center></p></div>";
        Session::delete('danger');
    }
    if(Session::exsist('succes')){
        echo "<div class='alert alert-success' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-ok'></span>";
        echo $lang['USERS_INDEX_COOKIES_SUCCES_'.Session::get('succes')];
        echo "</center></p></div>";
        Session::delete('succes');
    }
    if(Session::exsist('warning')){
        echo "<div class='alert alert-warning' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-warning-sign'></span>";
        echo $lang['USERS_INDEX_COOKIES_WARNING_'.Session::get('warning')];
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
            <th><?php echo $lang['USERS_DEFAULT_FIRSTNAME'];?></th>
            <th><?php echo $lang['USERS_DEFAULT_LASTNAME'];?></th>
            <th><?php echo $lang['USERS_DEFAULT_TELEPHONE'];?></th>
            <th><?php echo $lang['USERS_DEFAULT_EMAIL'];?></th>
            <th><?php echo $lang['USERS_DEFAULT_USERNAME'];?></th>
            <th><?php echo $lang['USERS_DEFAULT_USER_TYPE'];?></th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            <?php
                    foreach ($userdata as $key => $value) {
                        switch ($value['login_status']) {
                                case 'first':
                                    $button = "info";
                                    $title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];
                                break;
                                case 'active':
                                    $button = "success";
                                    $title = $lang['USERS_DEFAULT_STATUS_TITLE_ACTIVE'];
                                break;
                                case 'blocked':
                                    $button = "danger";
                                    $title = $lang['USERS_DEFAULT_STATUS_TITLE_BLOCKED'];
                                break;
                                case 'inactive':
                                    $button = "warning";
                                    $title = $lang['USERS_DEFAULT_STATUS_TITLE_INACTIVE'];
                                break;
                                default:
                                    $button = "info";
                                    $title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];
                                break;
                                }
                        echo "<tr>\n";
                        echo "      <td><label><input type='checkbox' name='user' value='". $value['user_id'] ."'></label></td>\n";
                        echo "      <td>". $value['user_firstname']  ."</td>\n";
                        echo "      <td>". $value['user_lastname']  ."</td>\n";
                        echo "      <td>". $value['user_telephone']  ."</td>\n";
                        echo "      <td>". $value['user_email']  ."</td>\n";
                        echo "      <td>". $value['login_name']  ."</td>\n";
                        echo "      <td>". $lang['USERS_DEFAULT_USERTYPE_'.strtoupper ($value['login_usertype'] )]  ."</td>\n";
                        echo "      <td> <div class='btn-group'><button type='button' class='btn btn-$button btn-xs dropdown-toggle glyphicon glyphicon-flag' data-toggle='dropdown' aria-expanded='false' title='$title' alt='$title'></button> \n";
                        if($_SESSION['login_usertype'] == 'owner' || $_SESSION['login_usertype'] == 'admin'){
                            if($_SESSION['login_usertype'] == 'owner'||($_SESSION['login_usertype'] == 'admin' && $value['login_status'] != "blocked")){
                        echo "      <ul class='dropdown-menu' role='menu'>\n";
                                if($value['login_status']!="active"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='". $lang['USERS_INDEX_MODAL_STATUS_MESSAGE_REASON']. $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."' data-status='active'>". $lang['USERS_DEFAULT_STATUS_TITLE_ACTIVE']  ."</a></li>\n";
                               }
                               if($value['login_status']!="inactive"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='". $lang['USERS_INDEX_MODAL_STATUS_MESSAGE_REASON']. $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."'data-status='inactive'>". $lang['USERS_DEFAULT_STATUS_TITLE_INACTIVE']  ."</a></li>\n";
                               }
                            }
                            if($_SESSION['login_usertype'] == 'owner'){
                                if($value['login_status']!="blocked"){
                        echo "        <li><a href='#' data-toggle='modal' data-target='#user_change_status' data-title-message='". $lang['USERS_INDEX_MODAL_STATUS_MESSAGE_REASON']. $value['user_firstname']  ." ". $value['user_lastname']  ." ' data-id='". $value['login_id']."' data-status='blocked'>". $lang['USERS_DEFAULT_STATUS_TITLE_BLOCKED']  ."</a></li>\n";
                                }
                            }
                        echo "     </ul></div>";
                        }
                        echo "      <a class='btn btn-default btn-xs glyphicon glyphicon-user' role='button' href='". URL .$pagepath."details/user/". $value['user_id']  ."' alt='". $lang['USERS_INDEX_USERPROFILE_ALT'] ."' title='". $lang['USERS_INDEX_USERPROFILE_TITLE'] ."'></a> \n";
                            if($_SESSION['login_usertype'] == 'owner' || $_SESSION['login_usertype'] == 'admin'){
                        echo "      <a class='btn btn-primary btn-xs glyphicon glyphicon-edit' role='button' href='". URL .$pagepath."update/user/". $value['user_id']  ."' alt='". $lang['USERS_INDEX_USEREDIT_ALT'] ."' title='". $lang['USERS_INDEX_USEREDIT_TITLE'] ."'></a> \n";
                                if($_SESSION['login_usertype'] == 'owner'){
                        echo "      <a class='btn btn-danger btn-xs glyphicon glyphicon-trash' role='button' href='#' data-toggle='modal' data-target='#confirm-delete'  data-href='". URL .$pagepath."delete/user/". $value['user_id']  ."' data-title='". $lang['USERS_INDEX_MODAL_DELETE_CONFIRM_USER'] . $value['user_firstname']  ." ". $value['user_lastname']  ." 'alt='". $lang['USERS_INDEX_USERDELETE_ALT'] ."' title='". $lang['USERS_INDEX_USERDELETE_TITLE'] ."'></a></td>\n";
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
</div>