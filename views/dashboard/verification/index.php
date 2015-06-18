<?php
// Set the classes

    $token = new DKW\Security\Token();
    $session = new DKW\Tracking\Session();

?>

      <form class="form-signin" action="<?php echo URL ; ?>dashboard/verification/newuser/password/" name="login" method="POST" >
        <h3 class="form-signin-heading">Please fill in your email.</h3>
        
         <?php $token->input_form() ?>
        
        <label for="email" class="sr-only">Login name</label>
        <input name="email" type="text" id="email" class="form-control" placeholder="Email address" required autofocus>
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>