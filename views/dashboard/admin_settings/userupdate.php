<?php
    $userdata = $this->show_single_userdata;
    $enum = $this->show_enum;
    
    //echo "<pre>";print_r($userdata);echo "</pre>";
    
    if($userdata[0]['login_usertype'] == 'owner'){
        Session::set('owner', 'Owner information can\'t be changed');
        header('location:' . URL . 'admin_settings');
    }
    
?>
<h3> Update user information </h3>
<hr />
<form method="POST" action="<?php echo URL ?>admin_settings/userrenew">
  <div class="form-group">
    <label for="user_id">User ID</label>
    <input name="user_id" type="text" class="form-control" id="user_id" value="<?php echo $userdata[0]['user_id'] ;?> " readonly="readonly">
  </div>
  <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input name="user_firstname" type="text" class="form-control" id="user_firstname" value="<?php echo $userdata[0]['user_firstname'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input name="user_lastname" type="text" class="form-control" id="user_lastname" value="<?php echo $userdata[0]['user_lastname'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_adress">Adress</label>
    <input name="user_adress" type="text" class="form-control" id="user_adress" value="<?php echo $userdata[0]['user_adress'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_postcode">Postcode</label>
    <input name="user_postcode" type="text" class="form-control" id="user_postcode" value="<?php echo $userdata[0]['user_postcode'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_city">City</label>
    <input name="user_city" type="text" class="form-control" id="user_city" value="<?php echo $userdata[0]['user_city'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_state">State</label>
    <input name="user_state" type="text" class="form-control" id="user_state" value="<?php echo $userdata[0]['user_state'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_country">Country</label>
    <input name="user_country" type="text" class="form-control" id="user_country" value="<?php echo $userdata[0]['user_country'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_telephone">Telephone</label>
    <input name="user_telephone" type="text" class="form-control" id="user_telephone" value="<?php echo $userdata[0]['user_telephone'] ;?>">
  </div>
  <div class="form-group">
    <label for="user_email">Email</label>
    <input name="user_email" type="text" class="form-control" id="user_email" value="<?php echo $userdata[0]['user_email'] ;?>">
  </div>
  <div class="form-group">
    <label for="login_name">Login name</label>
    <input name="login_name" type="text" class="form-control" id="login_name" value="<?php echo $userdata[0]['login_name'] ;?>">
  </div>
  <div class="form-group">
    <a class="btn btn-default" href="<?php echo URL ?>admin_settings/passchange/<?php echo $userdata[0]['login_id'];?>" role="button">Change password</a>
  </div>
  <div class="form-group">
    <label for="login_usertype">User type</label>
    <select name="login_usertype" >
        <?php
            foreach($enum as $key){
                $selected="";
                if($userdata[0]['login_usertype'] == $key){$selected = "selected=selected";}
                if($key != 'owner'){
                echo '<option value='. $key .' '.$selected.'>'. ucfirst($key) .'</option>';
                }
            }
        ?>
    </select>
     <input name="login_id" type="hidden" class="form-control" id="login_id" value="<?php echo $userdata[0]['login_id'] ;?>">
    <?php Token::input_form() ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
