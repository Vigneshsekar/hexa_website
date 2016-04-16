<?php echo form_open('users/c_fund_transfer','onsubmit="return isResult()"');?>

<script>
function isResult(){
  var ph="<?php echo $trans_status;?>"

  if(ph="SUCCESS"){
    alert("Amount Transferred");
  }else if(ph="FAILURE"){
    alert("Error Occured While Transferring,")
  }else{
    document.getElementById('test').innerHTML=" ";
  }

}
</script>

<label for="friend_number">Friend's Number</label>
<input type="input" id="friend_number" name="friend_number" required/>

<label for="amount_transfer">Amount To be Transferred</label>
<input type="input" id="amount_transfer" name="amount_transfer" required/>
<p id="test"> </p>

<input type = "submit" name = "submit" value = "Submit"/>

</form>
