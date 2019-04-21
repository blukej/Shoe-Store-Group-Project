<?php return function($req, $res) {
    
    session_start();

    if (isset($_SESSION['USERNAME'])) {
        header('Location: display-shoes');
        exit();
      }

    $res->render('main', 'login', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>