<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin']==TRUE){
				$data['acc_bal']=$_SESSION['acc_bal'];

				$this -> load-> view('welcome_message',$data);
		}
		else {
				redirect(base_url().'users/login');
		}
	}
}
