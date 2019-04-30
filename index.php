<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');
  //$config = require_once('confing.php');
  define('APP_BASE_URL', '/wp_ca4_christmasScott_browneCorey_bowersLuke');
  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',                'Home');
  $app->GET('/example',         'Example');
  $app->GET('/display-shoes',   'DisplayShoes');
  $app->GET('/add-shoe',        'AddShoe');
  $app->GET('/login',           'Login');
  $app->GET('/logout',          'Logout');
  $app->GET('/register',        'Register'); 
  $app->GET('/update-shoe',     'UpdateShoe');
  $app->GET('/delete-shoe',     'DeleteShoe');
  $app->GET('/products',        'Product');
  $app->GET('/reviews',         'Reviews');
  $app->POST('/add-shoe',       'AddShoeProcess');
  $app->POST('/update-shoe',    'UpdateShoeProcess');
  $app->POST('/login',          'LoginProcess');
  $app->POST('/register',       'RegisterProcess');
  $app->POST('/reviews',        'ReviewProcess');

  

  // Process the request
  $app->dispatch();

?>