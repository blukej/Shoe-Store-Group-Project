<?php return function($req, $res) { require_once('./models/Login.php'); 

    session_start();

    $db = \Rapid\Database::getPDO();

    $password = $req->body('password');

    $user = new Login([
        'userName' => $req->body('username'),
        'email' => $req->body('email')
    ]);

    $user->register($db, $password);

    $res->redirect("/display-shoes");

}?>