<?php return function($req, $res) {
    
    session_start();

    if (($_SESSION['ROLE']) != 'manager') {
        header('Location: home');
        exit();
    }

    $role = '';
    if(!empty($_SESSION['ROLE'])) {
        $role = $_SESSION['ROLE'];
    }
  
    $username = '';
    if(!empty($_SESSION['USERNAME'])) {
        $username = $_SESSION['USERNAME'];
    }
    
    $res->render('main', 'add-shoe', [
        'username' => $username,
        'role'     => $role,
        'message'  => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>