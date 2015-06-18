<?php
// Set the classes

    $this->token = new DKW\Security\Token();
    $this->session = new DKW\Tracking\Session();

    if($this->session->exsist('error')){
        echo "<div class='alert alert-warning' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-warning-sign'></span>";
        echo $this->session->get('error');
        echo "</center></p></div>";
        $this->session->delete('error');
    }
    
    if($this->session->exsist('succes')){
        echo "<div class='alert alert-success' role='alert'><p><center>";
        echo "<span class='glyphicon glyphicon-ok'></span>";
        echo $this->session->get('succes');
        echo "</center></p></div>";
        $this->session->delete('succes');
    }
?>

      <form class="form-signin" action="<?php echo URL ; ?>login/run" name="login" method="POST" >
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <label for="loginname" class="sr-only">Login name</label>
        <input name="loginname" type="text" id="loginname" class="form-control" placeholder="Login name" required autofocus>
        
        <label for="Password" class="sr-only">Password</label>
        <input name="password" type="password" id="Password" class="form-control" placeholder="Password" required>
        
        <div class="checkbox">
          <label>
            <input name="remember" type="checkbox" value="TRUE"> Remember me
          </label>
        </div>
        <div class="checkbox">
            <label>
                <a href="">Wachtwoord vergeten?</a>
            </label>
        </div>
        
        <?php $this->token->input_form() ?>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
