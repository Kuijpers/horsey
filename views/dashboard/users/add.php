<?php
 //echo "<pre>"; print_r($_SESSION); echo "</pre>";
?>

<?php
    
    $enum = $this->show_enum;
    $pagepath = $this->pagepath;
    $token = new DKW\Security\Token();

?>

<div class="col-md-9">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
      <div class="col-md-12">
          <p class="text-right"><a class="btn btn-danger btn-sm glyphicon glyphicon-remove" href='<?php echo URL . $pagepath ?>'><span></span></a></p>
      </div>
      <h4><b><?php echo $lang['USERS_INDEX_ADD_TITLE'];?></b></h4>
  </div>
  <div class="panel-body">
<form method="POST" action="<?php echo URL . $pagepath ?>add/usercreate">
    <div class="form-group col-md-12">
      <div class="form-group col-md-6">
        <label for="user_firstname"><?php echo $lang['USERS_DEFAULT_FIRSTNAME'];?></label>
        <input name="user_firstname" type="text" class="form-control" id="user_firstname" placeholder="<?php echo $lang['USERS_DEFAULT_FIRSTNAME'];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="user_lastname"><?php echo $lang['USERS_DEFAULT_LASTNAME'];?></label>
        <input name="user_lastname" type="text" class="form-control" id="user_lastname" placeholder="<?php echo $lang['USERS_DEFAULT_LASTNAME'];?>">
      </div>
      <div class="form-group col-md-12">
        <label for="user_adress"><?php echo $lang['USERS_DEFAULT_ADDRESS'];?></label>
        <input name="user_adress" type="text" class="form-control" id="user_adress" placeholder="<?php echo $lang['USERS_DEFAULT_ADDRESS'];?>">
      </div>
      <div class="form-group col-md-4">
        <label for="user_postcode"><?php echo $lang['USERS_DEFAULT_POSTCODE'];?></label>
        <input name="user_postcode" type="text" class="form-control" id="user_postcode" placeholder="<?php echo $lang['USERS_DEFAULT_POSTCODE'];?>">
      </div>
      <div class="form-group col-md-8">
        <label for="user_city"><?php echo $lang['USERS_DEFAULT_CITY'];?></label>
        <input name="user_city" type="text" class="form-control" id="user_city" placeholder="<?php echo $lang['USERS_DEFAULT_CITY'];?>">
      </div>
      <div class="form-group col-md-4">
        <label for="user_state"><?php echo $lang['USERS_DEFAULT_STATE'];?></label>
        <input name="user_state" type="text" class="form-control" id="user_state" placeholder="<?php echo $lang['USERS_DEFAULT_STATE'];?>">
      </div>
      <div class="form-group col-md-8">
        <label for="user_country"><?php echo $lang['USERS_DEFAULT_COUNTRY'];?></label>
        <input name="user_country" type="text" class="form-control" id="user_country" placeholder="<?php echo $lang['USERS_DEFAULT_COUNTRY'];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="user_telephone"><?php echo $lang['USERS_DEFAULT_TELEPHONE'];?></label>
        <input name="user_telephone" type="text" class="form-control" id="user_telephone" placeholder="<?php echo $lang['USERS_DEFAULT_TELEPHONE'];?>">
      </div>
      <div class="form-group col-md-8">
        <label for="user_email"><?php echo $lang['USERS_DEFAULT_EMAIL'];?></label>
        <input name="user_email" type="email" class="form-control" id="user_email" placeholder="<?php echo $lang['USERS_DEFAULT_EMAIL'];?>">
      </div>
      <div class="form-group col-md-7">
        <label for="login_name"><?php echo $lang['USERS_DEFAULT_USERNAME'];?></label>
        <input name="login_name" type="text" class="form-control" id="login_name" placeholder="<?php echo $lang['USERS_DEFAULT_USERNAME'];?>">
      </div>
      <div class="form-group col-md-10">
        <label for="login_usertype"><?php echo $lang['USERS_DEFAULT_USERTYPE'];?></label>
        <select id='login_usertype' name="login_usertype" >
            <?php
                foreach($enum as $key){
                    if($_SESSION['login_usertype'] == 'owner'){
                      echo '<option value='. $key .'>'. $lang['USERS_DEFAULT_USERTYPE_'.strtoupper ($key )] .'</option>';  
                    }else{
                        if($key != 'owner' && $key != 'admin'){
                            echo '<option value='. $key .'>'. $lang['USERS_DEFAULT_USERTYPE_'.strtoupper ($key )] .'</option>';
                        }
                    }
                }
            ?>
        </select>
      </div>
        <?php $token->input_form() ?>
      <div class="form-group col-md-10">
      <button type="submit" class="btn btn-primary"><?php echo $lang['DASH_SUBMIT'];?></button>
      </div>
    </div>
</form>
</div>
</div>
</div>