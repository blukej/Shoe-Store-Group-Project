<?php return function($req, $res) {
    
    $res->render('main', 'add-shoe', [
        'message' => $req->query('success')? 'Successful!': ''   
    ]);
    
} ?>