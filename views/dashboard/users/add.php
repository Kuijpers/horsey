<?php
 //echo "<pre>"; print_r($_SESSION); echo "</pre>";
?>

<?php
    
    $enum = $this->show_enum;
    $pagepath = $this->pagepath;
    $token = new DKW\Security\Token();

?>
<ol class="breadcrumb">
  <li><a href="<?php echo URL  ?>dashboard/">Home</a></li>
  <li>Settings</li>
  <li><a href="<?php echo URL  ?>admin_settings/">Admin</a></li>
  <li class="active">Add user</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
      <div class="col-md-12">
          <p class="text-right"><a class="btn btn-danger btn-sm glyphicon glyphicon-remove" href='<?php echo URL . $pagepath ?>'><span></span></a></p>
      </div>
      <h4><b>  Add new user</b></h4>
  </div>
  <div class="panel-body">
<form method="POST" action="<?php echo URL . $pagepath ?>add/usercreate">
    <div class="form-group col-md-12">
      <div class="form-group col-md-6">
        <label for="user_firstname">First Name</label>
        <input name="user_firstname" type="text" class="form-control" id="user_firstname" placeholder="First Name">
      </div>
      <div class="form-group col-md-6">
        <label for="user_lastname">Last Name</label>
        <input name="user_lastname" type="text" class="form-control" id="user_lastname" placeholder="Last Name">
      </div>
      <div class="form-group col-md-12">
        <label for="user_adress">Adress</label>
        <input name="user_adress" type="text" class="form-control" id="user_adress" placeholder="Adress">
      </div>
      <div class="form-group col-md-4">
        <label for="user_postcode">Postcode</label>
        <input name="user_postcode" type="text" class="form-control" id="user_postcode" placeholder="Postcode">
      </div>
      <div class="form-group col-md-8">
        <label for="user_city">City</label>
        <input name="user_city" type="text" class="form-control" id="user_city" placeholder="City">
      </div>
      <div class="form-group col-md-4">
        <label for="user_state">State</label>
        <input name="user_state" type="text" class="form-control" id="user_state" placeholder="State">
      </div>
      <div class="form-group col-md-8">
        <label for="user_country">Country</label>
        <input name="user_country" type="text" class="form-control" id="user_country" placeholder="Country">
      </div>
      <div class="form-group col-md-6">
        <label for="user_telephone">Telephone</label>
        <input name="user_telephone" type="text" class="form-control" id="user_telephone" placeholder="Telephone">
      </div>
      <div class="form-group col-md-8">
        <label for="user_email">Email</label>
        <input name="user_email" type="email" class="form-control" id="user_email" placeholder="Email">
      </div>
      <div class="form-group col-md-7">
        <label for="login_name">Login name</label>
        <input name="login_name" type="text" class="form-control" id="login_name" placeholder="Login name">
      </div>
      <div class="form-group col-md-10">
        <label for="login_usertype">User type</label>
        <select id='login_usertype' name="login_usertype" >
            <?php
                foreach($enum as $key){
                    if($_SESSION['login_usertype'] == 'owner'){
                      echo '<option value='. $key .'>'. ucfirst($key) .'</option>';  
                    }else{
                        if($key != 'owner' && $key != 'admin'){
                            echo '<option value='. $key .'>'. ucfirst($key) .'</option>';
                        }
                    }
                }
            ?>
        </select>
      </div>
        <?php $token->input_form() ?>
      <div class="form-group col-md-10">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</form>
</div>
</div>