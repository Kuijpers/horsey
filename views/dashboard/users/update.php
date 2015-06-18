<?php
 //echo "<pre>"; print_r($_SESSION); echo "</pre>";
?>

<?php
    $userdata = $this->show_update_info;
    $enum = $this->show_enum;
    $mainpage = $this->mainpage;
    $token = new DKW\Security\Token();
    
    //echo "<pre>";print_r($userdata);echo "</pre>";
    
?>
<ol class="breadcrumb">
  <li><a href="<?php echo URL  ?>dashboard/">Home</a></li>
  <li>Settings</li>
  <li><a href="<?php echo URL  ?>admin_settings/">Admin</a></li>
  <li class="active">Update user</li>
</ol>

  <?php
  if($_SESSION['login_usertype'] == 'owner'){
        require_once('public/dashboard/template/change_pass.php');
  }
  ?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
      <div class="col-md-12">
          <p class="text-right"><a class="btn btn-danger btn-sm glyphicon glyphicon-remove" href='<?php echo URL . $mainpage ?>'><span></span></a></p>
      </div>
      <h4><b> Update user information </b></h4>
  </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo URL . $mainpage ?>update/userrenew">
            <div class="form-group col-md-12">
              <div class="form-group col-md-2">
                <label for="user_id">User ID</label>
                <input name="user_id" type="text" class="form-control span6" id="user_id" value="<?php echo $userdata[0]['user_id'] ;?> " readonly="readonly">
              </div>
              <div class="form-group col-md-11">&nbsp;</div>
              <div class="form-group col-md-6">
                <label for="user_firstname">First Name</label>
                <input name="user_firstname" type="text" class="form-control span6" id="user_firstname" value="<?php echo $userdata[0]['user_firstname'] ;?>">
              </div>
              <div class="form-group col-md-6">
                <label for="user_lastname">Last Name</label>
                <input name="user_lastname" type="text" class="form-control span6" id="user_lastname" value="<?php echo $userdata[0]['user_lastname'] ;?>">
              </div>
              <div class="form-group col-md-12">
                <label for="user_adress">Adress</label>
                <input name="user_adress" type="text" class="form-control span6" id="user_adress" value="<?php echo $userdata[0]['user_adress'] ;?>">
              </div>
              <div class="form-group col-md-4">
                <label for="user_postcode">Postcode</label>
                <input name="user_postcode" type="text" class="form-control span6" id="user_postcode" value="<?php echo $userdata[0]['user_postcode'] ;?>">
              </div>
              <div class="form-group col-md-8">
                <label for="user_city">City</label>
                <input name="user_city" type="text" class="form-control span6" id="user_city" value="<?php echo $userdata[0]['user_city'] ;?>">
              </div>
              <div class="form-group col-md-4">
                <label for="user_state">State</label>
                <input name="user_state" type="text" class="form-control span6" id="user_state" value="<?php echo $userdata[0]['user_state'] ;?>">
              </div>
              <div class="form-group col-md-8">
                <label for="user_country">Country</label>
                <input name="user_country" type="text" class="form-control span6" id="user_country" value="<?php echo $userdata[0]['user_country'] ;?>">
              </div>
              <div class="form-group col-md-6">
                <label for="user_telephone">Telephone</label>
                <input name="user_telephone" type="text" class="form-control span6" id="user_telephone" value="<?php echo $userdata[0]['user_telephone'] ;?>">
              </div>
              <div class="form-group col-md-8">
                <label for="user_email">Email</label>
                <input name="user_email" type="text" class="form-control span6" id="user_email" value="<?php echo $userdata[0]['user_email'] ;?>">
              </div>
              <div class="form-group col-md-7">
                <label for="login_name">Login name</label>
                <input name="login_name" type="text" class="form-control span6" id="login_name" value="<?php echo $userdata[0]['login_name'] ;?>">
              </div>

              <div class="form-group col-md-10">
                <label>User type</label>
                <select name="login_usertype" >
                    <?php
                        foreach($enum as $key){
                                $selected="";
                            if($_SESSION['login_usertype'] == 'owner'){
                                if($userdata[0]['login_usertype'] == $key){$selected = "selected=selected";}
                                echo '<option value='. $key .' '.$selected.'>'. ucfirst($key) .'</option>';
                            }else{
                                if($userdata[0]['login_usertype'] == $key){$selected = "selected=selected";}
                                if($key != 'owner' && $key != 'admin'){
                                echo '<option value='. $key .' '.$selected.'>'. ucfirst($key) .'</option>';
                                }
                            }
                        }
                    ?>
                </select>
              </div>
        <?php
            if($_SESSION['login_usertype'] == 'owner'){
                
        ?>
              <div class="form-group col-md-12">
                <a class='btn btn-default' role='button' href='#' data-toggle='modal' data-target='#change_pass'>Change password</a>
              </div>
        <?php
            }
        ?>
                <input name="login_id" type="hidden" class="form-control span6" id="login_id" value="<?php echo $userdata[0]['login_id'] ;?>">
                
        <?php $token->input_form() ?>
              <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </div>
        </form>
    </div>
</div>
