<?php 
if(isset($this->error_call)){
$error = $this->error_call; 
}

?>


<form class="form-signin" role="form"  action="<?php echo URL ; ?>login/run" name="login" method="POST" >
    <h2 class="form-signin-heading">Inloggen</h2>
<?php if(!empty($this->error_call)){  ?>
    <div class="checkbox">
        <p class="bg-danger">
            <label>
                <?php echo $error[0]['error_description']; ?>
                <br />
                <?php if($error[0]['error_call']== "LE1001"){ ?>
                <a href="<?php echo URL;echo $error[0]['error_link'] ?>"> Verstuur validatie opnieuw.</a>
                <?php  }; ?>
            </label>
        </p>
    </div>
<?php  } ?>
    
    <input name="loginname" type="text" class="form-control" placeholder="Gebruikersnaam" required autofocus />
    
    <input name="password" type="password" class="form-control" placeholder="Wachtwoord" required />
    
       
    <?php Token::input_form();  ?>
    
    <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="TRUE" /> Remember me
        </label>
    </div>
    <div class="checkbox">
        <label>
            <a href="">Wachtwoord vergeten?</a>
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
</form>
