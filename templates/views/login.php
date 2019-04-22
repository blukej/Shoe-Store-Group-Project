<form action="<?= APP_BASE_URL ?>/login" method="post">
    
    <label for='Username'>Username</label>
    <input id='Username' type='text' name='username'>

    <label for='Email'>Email</label>
    <input id='Email' type='email' name='email'>

    <label for='Password'>Password</label>
    <input id='Password' type='password' name='password'>

    <input type='submit' value='Login'>
</form>

<p>If you do not have an account, please register here. <a href="register"> Register </a></p>