<?php
class Users extends CI_Controller{

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
          //$this -> load -> view ('templates/header', $data);
          $this -> load -> view ('user/login', $data);
          //$this -> load -> view ('templates/footer');
        }

        else
        {
          $_SESSION['userID'] = $user['house_no'];
          $_SESSION['ulevel'] = $user['u_level'];
          $_SESSION['is_loggedin'] = TRUE;
          $_SESSION['first_login'] = $user['is_new'];
          redirect(base_url());
        }

      }
      else
      {
        //$this -> load -> view ('templates/header', $data);
        $this -> load -> view ('user/login', $data);
        //$this -> load -> view ('templates/footer');
      }

    }

    else
    {

      $data['title'] = 'Logged In';
      //$this -> load -> view ('templates/header', $data);
      $this -> load -> view ('pages/home', $data);
      //$this -> load -> view ('templates/footer');
    }

 }
}
?>
