<?php
    $enum = $this->show_enum;

?>
<h3> Add new user </h3>
<hr>

<form method="POST" action="<?php echo URL ?>admin_settings/usercreate">
  <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input name="user_firstname" type="text" class="form-control span6" id="user_firstname" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input name="user_lastname" type="text" class="form-control span6" id="user_lastname" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="user_adress">Adress</label>
    <input name="user_adress" type="text" class="form-control span6" id="user_adress" placeholder="Adress">
  </div>
  <div class="form-group">
    <label for="user_postcode">Postcode</label>
    <input name="user_postcode" type="text" class="form-control span6" id="user_postcode" placeholder="Postcode">
  </div>
  <div class="form-group">
    <label for="user_city">City</label>
    <input name="user_city" type="text" class="form-control span6" id="user_city" placeholder="City">
  </div>
  <div class="form-group">
    <label for="user_state">State</label>
    <input name="user_state" type="text" class="form-control span6" id="user_state" placeholder="State">
  </div>
  <div class="form-group">
    <label for="user_country">Country</label>
    <input name="user_country" type="text" class="form-control span6" id="user_country" placeholder="Country">
  </div>
  <div class="form-group">
    <label for="user_telephone">Telephone</label>
    <input name="user_telephone" type="text" class="form-control span6" id="user_telephone" placeholder="Telephone">
  </div>
  <div class="form-group">
    <label for="user_email">Email</label>
    <input name="user_email" type="email" class="form-control span6" id="user_email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="login_name">Login name</label>
    <input name="login_name" type="text" class="form-control span6" id="login_name" placeholder="Login name">
  </div>
  <div class="form-group">
    <label for="login_pw1">Password</label>
    <input name="login_pw1" type="password" class="form-control span6" id="login_pw1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="login_pw2">Repeat Password</label>
    <input name="login_pw2" type="password" class="form-control span6" id="login_pw2" placeholder="Repeat Password">
  </div>
  <div class="form-group">
    <label for="login_usertype">User type</label>
    <select name="login_usertype" >
        <?php
            foreach($enum as $key){
                if($key != 'owner'){
                echo '<option value='. $key .'>'. ucfirst($key) .'</option>';
                }
            }
        ?>
    </select>
  </div>
    <?php Token::input_form() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>