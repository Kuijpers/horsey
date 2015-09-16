<?php    
    $userdata = $this->show_single_userdata;
    $statusdata = $this->show_single_userstatusoverview;
    $pagepath = $this->pagepath;
    
// Remove slashes for debug    
    //Debug::array_list($userdata, "User data coming from database");
    //Debug::array_list($statusdata, "Status data coming from database");
?>
<div class="col-md-9">
<div class="panel panel-default">
    <div class="panel-heading">
      <div class="col-md-12">
          <p class="text-right"><a class="btn btn-danger btn-sm glyphicon glyphicon-remove" href='<?php echo URL . $pagepath ?>'><span></span></a></p>
      </div>
        <h1 class="panel-title"><b><?php echo $lang['USERS_DETAILS_TITLE'];?></b></h1>
    </div>
    <div class="panel-body">
        <h5>
            <?php echo $lang['USERS_DETAILS_MESSAGE'] . $userdata[0]['user_firstname'] ." ". $userdata[0]['user_lastname'];  ?>
        </h5>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><b><?php echo $lang['USERS_DETAILS_TITLE2'];?></b></h3>
      </div>
      <div class="panel-body">
        <?php echo $lang['USERS_DETAILS_MESSAGE2'];?>
      </div>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_NAME'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_firstname'] ." ". $userdata[0]['user_lastname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_ADDRESS'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_adress']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_POSTCITY'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_postcode'] ." ". $userdata[0]['user_city']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_STATE'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_state']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_COUNTRY'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_country']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_TELEPHONE'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_telephone']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_EMAIL'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_email']; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_USERNAME'];?>
                    </td>
                    <td>
                        <?php echo $userdata[0]['login_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_USER_TYPE'];?>
                    </td>
                    <td>
                        <?php echo $lang['USERS_DEFAULT_USERTYPE_'.strtoupper ($userdata[0]['login_usertype'] )]; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $lang['USERS_DETAILS_CURRENTSTATUS'];?>
                    </td>
                    <td>
                        <?php switch ($userdata[0]['login_status']) {
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
                                } ?>
                        <button class="btn btn-<?php echo $button ?> btn-sm " type="button" >
                            <span class=" glyphicon glyphicon-flag"></span>
                            <?php echo $title; ?>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title"><b><?php echo $lang['USERS_DETAILS_TITLE3'];?></b></h3>
      </div>
      <div class="panel-body">
        <?php echo $lang['USERS_DETAILS_MESSAGE3'];?>
      </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>
                        <h5><b><?php echo $lang['DASH_DATE'];?></b></h5>
                    </td>
                    <td>
                        <h5><b><?php echo $lang['DASH_TIME'];?></b></h5>
                    </td>
                    <td>
                        <h5><b><?php echo $lang['DASH_FROM'];?></b></h5>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <h5><b><?php echo $lang['DASH_TO'];?></b></h5>
                    </td>
                    <td>
                        <h5><b><?php echo $lang['DASH_REASON'];?></b></h5>
                    </td>
                    <td>
                        <h5><b><?php echo $lang['DASH_WHOS'];?></b></h5>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($statusdata)){ ?>
                <tr>
                    <td colspan="6">
                        <h3><?php echo $lang['DASH_NO_INFO'];?></h3>
                    </td>
                </tr>
                <?php }else{ //echo "<pre>"; print_r($statusdata);echo "</pre>";
                    
                foreach($statusdata as $key => $value){
                    switch ($statusdata[$key]['user_status_previous']) {
                                case 'first':$previous_button = "info";$previous_title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];break;
                                case 'active':$previous_button = "success";$previous_title = $lang['USERS_DEFAULT_STATUS_TITLE_ACTIVE']; break;
                                case 'blocked':$previous_button = "danger";$previous_title = $lang['USERS_DEFAULT_STATUS_TITLE_BLOCKED'];break;
                                case 'inactive':$previous_button = "warning";$previous_title = $lang['USERS_DEFAULT_STATUS_TITLE_INACTIVE']; break;
                                default: $previous_button = "info";$previous_title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];break;
                    }
                    switch ($statusdata[$key]['user_status_new']) {
                                case 'first':$new_button = "info";$new_title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];break;
                                case 'active':$new_button = "success";$new_title = $lang['USERS_DEFAULT_STATUS_TITLE_ACTIVE']; break;
                                case 'blocked':$new_button = "danger";$new_title = $lang['USERS_DEFAULT_STATUS_TITLE_BLOCKED'];break;
                                case 'inactive':$new_button = "warning";$new_title = $lang['USERS_DEFAULT_STATUS_TITLE_INACTIVE']; break;
                                default: $new_button = "info";$new_title = $lang['USERS_DEFAULT_STATUS_TITLE_FIRSTLOG'];break;
                    }
                    echo "<tr>";
                        echo "<td>";
                        echo date("d-m-Y", strtotime($statusdata[$key]['user_status_date']));
                        echo "</td>";
                        echo "<td>";
                        echo $statusdata[$key]['user_status_time'];
                        echo "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-$previous_button btn-sm' type='button' >
                            <span class=' glyphicon glyphicon-flag'></span>
                            ". ucfirst($previous_title). " 
                        </button>";
                        echo "</td>";
                        echo "<td>";
                        echo "<span class='glyphicon glyphicon-arrow-right'></span>";
                        echo "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-$new_button btn-sm' type='button' >
                            <span class=' glyphicon glyphicon-flag'></span>
                            ". ucfirst($new_title). " 
                        </button>";;
                        echo "</td>";
                        echo "<td>";
                        echo nl2br($statusdata[$key]['user_status_reason']);
                        echo "</td>";
                        echo "<td>";
                        echo $statusdata[$key]['who_firstname']. " " .$statusdata[$key]['who_lastname']. " <br />( " .$lang['USERS_DEFAULT_USERTYPE_'.strtoupper ($statusdata[$key]['who_type'])]. " ) ";
                        echo "</td>";
                    echo "</tr>";
                    }
                    
                } ?>
                
            </tbody>
        </table>
    </div>

</div>
</div>