<?php    
    $userdata = $this->show_single_userdata;
    $statusdata = $this->show_single_userstatusoverview;
    $pagepath = $this->pagepath;
    
// Remove slashes for debug    
    //Debug::array_list($userdata, "User data coming from database");
    //Debug::array_list($statusdata, "Status data coming from database");
?>
<ol class="breadcrumb">
  <li><a href="<?php echo URL  ?>dashboard/">Home</a></li>
  <li>Settings</li>
  <li><a href="<?php echo URL  ?>admin_settings/">Admin</a></li>
  <li class="active">User info</li>
</ol>


<div class="panel panel-default">
    <div class="panel-heading">
      <div class="col-md-12">
          <p class="text-right"><a class="btn btn-danger btn-sm glyphicon glyphicon-remove" href='<?php echo URL . $pagepath ?>'><span></span></a></p>
      </div>
        <h1 class="panel-title">Useroverview</h1>
    </div>
    <div class="panel-body">
        <h4>
            All the information belonging to user: <?php echo $userdata[0]['user_firstname'] ." ". $userdata[0]['user_lastname'];  ?>
        </h4>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Personal info</h3>
      </div>
      <div class="panel-body">
        Overzicht met alle persoonlijke informatie over deze gebruiker.
      </div>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <td>
                        Naam
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_firstname'] ." ". $userdata[0]['user_lastname']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Adres
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_adress']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Postcode en Plaats
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_postcode'] ." ". $userdata[0]['user_city']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Staat / Provincie
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_state']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Land
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_country']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefoonnummer
                    </td>
                    <td>
                        <?php echo $userdata[0]['user_telephone']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
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
                        Login naam
                    </td>
                    <td>
                        <?php echo $userdata[0]['login_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Usertype
                    </td>
                    <td>
                        <?php echo ucfirst($userdata[0]['login_usertype']); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Huidige status
                    </td>
                    <td>
                        <?php switch ($userdata[0]['login_status']) {
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
                                } ?>
                        <button class="btn btn-<?php echo $button ?> btn-sm " type="button" >
                            <span class=" glyphicon glyphicon-flag"></span>
                            <?php echo ucfirst($title); ?>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Status changes</h3>
      </div>
      <div class="panel-body">
        Hier komt de overview waarin vermeld wordt wanneer de status veranderd is.
      </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>
                        <h4>Date</h4>
                    </td>
                    <td>
                        <h4>Time</h4>
                    </td>
                    <td>
                        <h4>Previous</h4>
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <h4>New</h4>
                    </td>
                    <td>
                        <h4>Reason</h4>
                    </td>
                    <td>
                        <h4>Who</h4>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($statusdata)){ ?>
                <tr>
                    <td colspan="6">
                        <h3>No information available !!</h3>
                    </td>
                </tr>
                <?php }else{ //echo "<pre>"; print_r($statusdata);echo "</pre>";
                    
                foreach($statusdata as $key => $value){
                    switch ($statusdata[$key]['user_status_previous']) {
                                case 'first':$previous_button = "info";$previous_title = "First log required";break;
                                case 'active':$previous_button = "success";$previous_title = "Active"; break;
                                case 'blocked':$previous_button = "danger";$previous_title = "Blocked";break;
                                case 'inactive':$previous_button = "warning";$previous_title = "Inactive"; break;
                                default: $previous_button = "info";$previous_title = "First log required";break;
                    }
                    switch ($statusdata[$key]['user_status_new']) {
                                case 'first':$new_button = "info";$new_title = "First log required";break;
                                case 'active':$new_button = "success";$new_title = "Active"; break;
                                case 'blocked':$new_button = "danger";$new_title = "Blocked";break;
                                case 'inactive':$new_button = "warning";$new_title = "Inactive"; break;
                                default: $new_button = "info";$new_title = "First log required";break;
                    }
                    echo "<tr>";
                        echo "<td>";
                        echo $statusdata[$key]['user_status_date'];
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
                        echo $statusdata[$key]['who_firstname']. " " .$statusdata[$key]['who_lastname']. " ( " .ucfirst($statusdata[$key]['who_type']). " ) ";
                        echo "</td>";
                    echo "</tr>";
                    }
                    
                } ?>
                
            </tbody>
        </table>
    </div>

</div>