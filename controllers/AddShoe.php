<?php return function($req, $res) {
    
    session_start();

    if (($_SESSION['ROLE']) != 'manager') {
        header('Location: home');
        exit();
    }
    
    $res->render('main', 'add-shoe', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>