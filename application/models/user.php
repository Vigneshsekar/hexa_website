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
      $where= array(
        'phone_no'=>$number
      );
      $this-> db -> select() -> from('users') -> where($where);
      $query = $this -> db ->get ();
      $is_new_check= $query -> first_row('array')['is_new'];
      $sam = $query -> first_row('array')['phone_no'];

      if($sam && $is_new_check==0){
        return true;
      }else{
        return false;
      }
  }
  /*function check_num2($number){
    $where= array(
      'phone_no'=>$number
    );
    $this-> db -> select() -> from('users') -> where($where);
    $query = $this -> db ->get ();
    $is_new_check= $query -> first_row('array')['is_new'];
    $sam = $query -> first_row('array')['phone_no'];

    if($sam && $is_new_check==0){
      return true;
    }else{
      return false;
    }
  }*/
  
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
  function m_fund_transfer($f_num,$amt_transfer,$u_num){

    $where = array(
      'phone_no' => $u_num
    );

    $this -> db -> select () -> from('users') -> where ($where);
    $query = $this-> db ->get();

    $amt_eva= $query -> first_row('array')['acc_bal'];
    $amt_deduct=$amt_eva-$amt_transfer;

    $userdata= array(
      'acc_bal'=> $amt_deduct
    );

    $this->db->where('phone_no', $u_num);
    $res1=$this-> db ->update('users', $userdata);

    if($res1){
      $_SESSION['acc_bal']=$amt_deduct;
    }else{
      $_SESSION['acc_bal']=$amt_eva;
      return FALSE;
    }

    $where2= array(
      'phone_no' => $f_num
    );
    $this-> db -> select() -> from('users') -> where($where2);
    $query1= $this -> db ->get();

    $amt_neva= $query1-> first_row('array')['acc_bal'];
    $amt_add=$amt_transfer+$amt_neva;

    $userdata1 = array(
      'acc_bal' => $amt_add
    );

    $this->db->where('phone_no',$f_num);
    $res2=$this-> db ->update('users', $userdata1);

    if($res2 && $res1){
      return TRUE;
    }else{
      return FALSE;
    }
  }

function m_trans_cre($acc_bal,$amt,$ven_id,$f_num)
{
  $trans_file = fopen("file/file1.txt","r+")or die("Unable to die");
  $trans_id=fread($trans_file,filesize("file/file1.txt"));
  fclose($trans_file);

  $trans_id_new=++$trans_id;


  if($trans_id=="Unable to die"){
    return false;
  }else{
    $userdata= array(
      'trans_id' => $trans_id_new,
      'trans_type' =>1,
      'phone_no' => $_SESSION['num'],
      'f_phone_no' => $f_num,
      'ven_id'=>$ven_id,
      'date'=>date("Y/m/d"),
      'time'=>date("h:i:sa"),
      'amount'=>$amt,
      'acc_bal_rem'=>$acc_bal
    );

    $trans_file1 = fopen("file/file1.txt","w") or die("Unable to die");
    fwrite($trans_file1,$trans_id_new);
    fclose($trans_file1);

    $query=$this -> db -> insert('trans',$userdata);

    if($query){
      return true;
    }else{
      return false;
    }

  }



}

}

?>
