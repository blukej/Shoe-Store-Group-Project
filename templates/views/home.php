<?php session_start(); ?>
<h2>Home</h2>
<?php 
    if($locals['role'] === 'user'){
        echo "<p>Hello User, your username is: " . $locals['username'] . "</p>";
    }
    else if($locals['role'] === 'manager'){
        echo "<p>Hello Manager, your username is: " . $locals['username'] . "</p>";
    }
    else if (!isset($locals['username']) || $locals['username'] == ''){
        echo '<p>You are not logged in, please log in to view the database. <a href='.'login'.'>Login here</a></p>';
    }   
?>
