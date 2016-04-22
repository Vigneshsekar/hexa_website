<?php
class Users extends CI_Controller{

  function __construct()
   {
       // this is your constructor
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('url_helper');
   }

  function register() {
    if(!isset($_SESSION['is_loggedin']) || !$_SESSION['is_loggedin']){
        if($_POST)
        {
          $phone_no= $this-> input -> post('phone_no');
          $this->load->model('user');

          $check_num=$this->user->check_num($phone_no);

        if($check_num){
          $_SESSION['num_check']=1;
          redirect(base_url().'users/register2');
        }
        else{
              $_SESSION['num_check']=0;
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $data['error_register1']="Already Registered or Phone Number Not Found";
              $this -> load -> view ('user/register',$data);
             }
        }
        else{
              $_SESSION['num_check']=0;
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $this -> load -> view ('user/register');
        }
    }else{
      redirect(base_url());
    }
  }
  function register2(){

      if(isset($_SESSION['num_check']) && $_SESSION['num_check']==1)
      {
        if ($_POST)
        {
          $userdata= array(
          'name'=>$this-> input ->post('name'),
          'email'=>$this -> input -> post('email'),
          'password'=>"password",
          'is_new' =>1,
          'u_level'=>1
          );
          $this->load->model('user');
          $phone_no= $this-> input ->post('phone_no');
          $val=$this-> user ->register_user($userdata,$phone_no);

          if($val['error'] == false){

              $_SESSION['num_check']=0;
              redirect(base_url().'users/login');
          }
          else{
            $this -> load -> helper('form');
            $data ['message'] = $val ['error_message'];
            $this -> load -> view ('user/register2');
          }
        }
        else{
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $this -> load -> view ('user/register2');
        }
    }
    else{
      redirect('users/register');
    }
}

  function login()
  {
    if (!isset($_SESSION['is_loggedin']) || !$_SESSION['is_loggedin']  )
    {
      $this -> load -> helper('form');
      $data['title'] = 'Login';
      $data['error'] = 0;

      if ($_POST)
      {
        $this -> load -> model('user');
        $phone_number = $this -> input -> post ('phone_number', true);
        $password = $this -> input -> post ('password', true);
        $user = $this -> user -> login ($phone_number, $password);

        if (!$user)
        {
          $data['error'] = 1;
          $_SESSION['is_loggedin'] = FALSE;
          $this -> load -> view ('user/login', $data);
        }

        else
        {
          $_SESSION['num'] = $user['phone_no'];
          $_SESSION['acc_bal'] = $user['acc_bal'];
          $_SESSION['is_loggedin'] = TRUE;
          $_SESSION['first_login'] = $user['is_new'];
          redirect(base_url());
        }
      }
      else
      {
        $this -> load -> view ('user/login', $data);
      }
    }
    else
    {
      $data['title'] = 'Logged In';
      redirect(base_url());
    }

 }
 function rec_trans(){
    //TODO trans record display.

 }
 function c_fund_transfer(){
   if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin']){
     if($_POST){
       $f_num= $this->input->post('friend_number');
       $amt_transfer= $this -> input -> post('amount_transfer');
       $u_number=$_SESSION['num'];
       $ven_id=1001;
       $this->load->model('user');
       $result= $this->user->m_fund_transfer($f_num,$amt_transfer,$u_number);

       if($result){
          $data['trans_status']="SUCCESS";
          $test=$this-> user ->m_trans_cre($_SESSION['acc_bal'],$amt_transfer,$ven_id,$f_num);
          if($test==true){
          $this->load->view('user/c_fund_transfer',$data);
        }else{
          $data['trans_status']="FAILURE";
          $this->load->view('user/c_fund_transfer',$data);
        }
       }else{
          $data['trans_status']="FAILURE";
          $this->load->view('user/c_fund_transfer',$data);
       }

     }else{
           $this -> load -> helper('form');
           $data ['title'] = 'Fund Transfer';
           $this -> load -> view ('user/c_fund_transfer');
     }
   }else{
     redirect(base_url().'users/login');
   }
 }

 function logout ()
 {
   $data['title'] = 'logged out';
   $this -> session -> sess_destroy();
   redirect (base_url());
 }
}
?>
