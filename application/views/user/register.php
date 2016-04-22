<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stud COPS | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/bootstrap/css/bootstrap.min.css'; ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/dist/css/AdminLTE.min.css';?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/plugins/iCheck/square/blue.css'?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?php echo base_url(); ?>"><b>Stud</b>COPS</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register for web Portal Access</p>
         <?php echo form_open('users/register','onsubmit="return isValid()"');?>
          <div class="form-group has-feedback">
            <input type="input" id="phone_no" name = "phone_no" onkeypress="return isNumber(event)" class="form-control" placeholder="Mobile Number"  required>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
          <div class="row">
            <div class="col-xs-8">
              <p><?php if (isset($error_register1)) echo $error_register1 . '<br>'; ?></p>
              <p id="test"></p>
            </div>
          </div>

        </form>



        <a href="<?php echo base_url().'users/login'; ?>" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().'assests/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().'assests/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url().'assests/plugins/iCheck/icheck.min.js'; ?>"></script>
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
    			var ph=document.getElementById('phone_no');
    			if(ph.value.length<10||ph.value.length>10){
    				document.getElementById("test").innerHTML="Please Enter a 10 Digit Mobile No";
    				return false;
    		}
    		return true;
    		}
    </script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
