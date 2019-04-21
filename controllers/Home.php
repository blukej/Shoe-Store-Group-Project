<?php return function($req, $res) {

  $res->status(501);
  $res->send('<p>You are not logged in, please log in to view the database <a href='.'login'.'>Login</a></p>');

} ?>