<?php  if ($error == 1) {?>
  <p> Incorrect username or password </p>
<?php } ?>

<?php echo form_open();?>

<label for = "phone_number"> Phone Number </label>
<input type = "input" name = "phone_number" required/>  <br/>

<label for = "password"> Password </label>
<input type = "password" name = "password" required/>  <br/>

<input type = "submit" name = "login" value = "Login"/>
</form>
