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

<div class="container">
    <form action="<?= APP_BASE_URL ?>/login" method="post" class="form-signin">
    <h2 class="form-signin-heading text-center">Please sign in</h2>
    <label class="sr-only">Username</label>
    <input id="Username" type="text" name='username' class="form-control" placeholder="Username" required autofocus>
    <label class="sr-only">Password</label>
    <input id="Password" type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div> 
<p class="text-center">If you do not have an account, please register <a href="register"> here </a></p>