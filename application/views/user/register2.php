<?php echo form_open('users/register2','onsubmit="return isValid()"');?>
<?php if (isset($message)) echo $message . '<br>'; ?>

<script>
       function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                document.getElementById("test").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
            else{
              document.getElementById("test").innerHTML="  ";
              return true;
            }

        }
		function isValid(){
			var ph=document.getElementById('mobile_no');
			if(ph.value.length<10||ph.value.length>10){
				document.getElementById("test").innerHTML="Please Enter a 10 Digit Mobile No";
				return false;
		}
		return true;
		}
</script>

<label for ="name"> Name </label>
<input type= "text" name="name" required /> <br/>

<label for = "email"> Email </label>
<input type = "email" name = "email" required/>  <br/>

<label for = "phone_no" required> Mobile Number </label>
<input type = "input" id="phone_no" name = "phone_no" onkeypress="return isNumber(event)"required/>  <br/>
<p id="test"></p>
<input type = "submit" name = "register" value = "Register" />
</form>
