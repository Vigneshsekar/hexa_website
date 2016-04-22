<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	 {
			 // this is your constructor
			 parent::__construct();
			 $this->load->helper('form');
			 $this->load->helper('url');
			 $this->load->helper('url_helper');
	 }

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
	function readfile(){

		$trans_file = fopen("file/file1.txt","r")or die("Unable to die");
	  $trans_id=fread($trans_file,filesize("file/file1.txt"));
	  fclose($trans_file);

		if($trans_id=="Unable to die"){
			$data['hello']="failes to open";
		}else{
			$data['hello']=$trans_id;
		}
		$this->load->view('azure',$data);
	}
	function new_num($number){
		$this-> load-> model('user');
		$hello=$this-> user -> check_num2($number);

		 if($hello){
			 echo $hello;
			 echo "hello";
		 }
		 else{
			 echo "null data";
		 }
		 if($hello="NULL"){
			 echo "NULL DATA";
		 }

	}
}
