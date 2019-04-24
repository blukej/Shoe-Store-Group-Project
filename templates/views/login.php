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

<form action="<?= APP_BASE_URL ?>/login" method="post">
    
    <label for='Username'>Username</label>
    <input id='Username' type='text' name='username'>

    <label for='Password'>Password</label>
    <input id='Password' type='password' name='password'>

    <input type='submit' value='Login'>
</form>

<p>If you do not have an account, please register here. <a href="register"> Register </a></p>