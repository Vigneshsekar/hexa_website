<?php
class User extends CI_Model
{
  public function __construct()
  {
    $this -> load -> database();
  }

  function register_user ($userdata,$number)
  {
    // TODO implement conflicts. -- Done
    $this->db->where('phone_no', $number);
    $res1=$this->db->update('users', $userdata);


    if(!$res1){
      $error = $this -> db -> error();
      $val = array('error' => TRUE, 'error_message' => $error['message'],'res1'=> $res1);
      return $val;
    }
    else{
      $val = array ('error' => FALSE);
      return $val;
    }
  }
  function check_num($number){
      //$query= $this-> db -> select ('phone_no','is_new') -> from('users') -> where($number);
      //$is_new_check=$query -> first_row('array')['is_new'];
      $where = array(
        'phone_no' => $number
      );

      $this -> db -> select () -> from('users') -> where ($where);
      $query = $this -> db -> get ();
      $is_new_check=$query -> first_row('array')['is_new'];

      if($query && $is_new_check==0){
        return true;
      }
      else{
        return false;
      }
  }
  function login($phone_number, $password)
  {
    $where = array(
      'phone_no' => $phone_number
    );

    $this -> db -> select () -> from('users') -> where ($where);
    $query = $this -> db -> get ();
    $password1=$query -> first_row('array')['password'];
    if ($password1 == $password)
      return $query -> first_row('array');

  }



}

?>
