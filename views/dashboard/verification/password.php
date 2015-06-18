<?php
// Set the classes

    $token = new DKW\Security\Token();
    $session = new DKW\Tracking\Session();
?>

      <form class="form-signin" action="<?php echo URL ; ?>dashboard/verification/newuser/update/" name="login" method="POST" >
        <h3 class="form-signin-heading">Please add a password.</h3>
        
        <label for="pw1" class="sr-only">Login name</label>
        <input name="pw1" type="password" id="pw1" class="form-control" placeholder="Password" required autofocus>
        
        <label for="pw2" class="sr-only">Login name</label>
        <input name="pw2" type="password" id="pw2" class="form-control" placeholder="Repeat password" required>
        
        
        <?php $token->input_form() ?>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>