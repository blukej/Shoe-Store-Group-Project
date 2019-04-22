<?php return function($req, $res) {

  session_start();

  $res->status(501);

  $role = '';
  if(!empty($_SESSION['ROLE'])) {
    $role = $_SESSION['ROLE'];
  }
  
  $username = '';
  if(!empty($_SESSION['USERNAME'])) {
    $username = $_SESSION['USERNAME'];
  }

  if($role == 'user' || $role == 'manager' || $role == 'employee') {
    $res->send('<p>You are logged in, Welcome ' . $username . '!');
    exit();
  }
  else{
    $res->send('<p>You are logged out');
  }

} ?>