<?php  if ($error == 1) {?>
  <p> Incorrect phone number or password </p>
<?php } ?>

<?php echo form_open('users/login');?>

<label for = "phone_number"> Phone Number </label>
<input type = "input" name = "phone_number" id="phone_number" required/>  <br/>

<label for = "password"> Password </label>
<input type = "password" name = "password" id="password" required/>  <br/>

<input type = "submit" name = "login" value = "Login"/>
</form>
