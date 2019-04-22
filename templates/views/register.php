<?php 
    $messages = require_once('./messages.php');
    $message  = NULL;

    $query = \Rapid\Request::query('message');

    if (isset($query) && isset($messages[$query])) {
        $message = $messages[$query];
    }
    else if (isset($query)) {
        $message = $messages['UNKNOWN'];
    }
  ?>
<?php if ($message) { ?>
    <p class='<?= $message['class'] ?>'><?= $message['message'] ?></p>
  <?php } ?>
  
<form action="<?= APP_BASE_URL ?>/register" method="post">
    
    <label for='Username'>Username</label>
    <input id='Username' type='text' name='username'>

    <label for='Email'>Email</label>
    <input id='Email' type='email' name='email'/>

    <label for='Password'>Password</label>
    <input id='Password' type='password' name='password'/>

    <input type='submit' value='Register'>
</form>

<p>If you already have account, please log in here. <a href="login"> Login </a></p>