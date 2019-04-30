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
    <p class='<?= $message['class'] ?> text-center'><?= $message['message'] ?></p>
  <?php } ?>
   
<div class="container w-25">
    <form action="<?= APP_BASE_URL ?>/register" method="post" class="form-signin">
    <h2 class="form-signin-heading text-center">Please register</h2>
    <label class="sr-only">Username</label>
    <input id="Username" type="text" name='username' class="form-control" placeholder="Username" autofocus>
    <br>
    <label class="sr-only">Email</label>
    <input id="Email" type="email" name='email' class="form-control" placeholder="Email">
    <br>
    <label class="sr-only">Password</label>
    <input id="Password" type="password" name="password" class="form-control" placeholder="Password">
    <div class="checkbox">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
</div> 

<p class="text-center">If you already have an account, please log in <a href="login">here</a></p>