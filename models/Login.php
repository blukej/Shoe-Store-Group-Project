<?php class Login {

private $userID;
private $username;
private $email;
private $hash;
private $role;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Login constructor requires an array');
    }

    $this->setUserID($args['userID'] ?? NULL);
    $this->setUserName($args['userName'] ?? NULL);
    $this->setEmail($args['email'] ?? NULL);
    $this->setHash($args['hash'] ?? NULL);
    $this->setRole($args['role'] ?? NULL);

    $this->userID = $args['userID']     ?? NULL;
    $this->userName = $args['userName'] ?? 'Untilted userName';
    $this->email = $args['email'] ?? 'Untilted Email';
   // $this->hash = $args['hash'] ?? 'Untilted Hash';
   // $this->role = $args['role'] ?? 'Untilted Role';
}

public function getUserID() {
    return $this->userID;
}

public function getUserName() {
    return $this->userName;
}

public function getEmail() {
    return $this->email;
}

public function getHash() {
    return $this->hash;
}

public function getRole() {
    return $this->role;
}

public function setUserID($userID) {
    
    if($userID === NULL) {
       $this->userID = NULL;
       return;
    }

   $this->userID = $userID;
}

public function setUserName($userName) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($userName == NULL) {
        if($path === '/login'){
            header('Location: login?message=USERNAME_MISSING');
            $this->userName = NULL;
            return;
            
        }
        else{
            header('Location: register?message=USERNAME_MISSING');
            $this->userName = NULL;
            return;
        }
    }

    // if($userName == NULL) {
    //    throw new Exception('User Name for registering does not match expected pattern');
    // }

    $this->userName = $userName;
}


public function setEmail($email) {

    if($email === NULL) {
        $this->email = NULL;
        return;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       throw new Exception('Email for registering does not match expected pattern');
    }

    $this->email = $email;
}

public function setHash($hash) {

    if($hash === NULL) {
        $this->hash = NULL;
        return;
    }

    //if(!preg_match('/^[a-z]{3,55}$/i', $hash)) {
    //    throw new Exception('Hash for Login does not match expected pattern');
    //}

    $this->hash = $hash;
}

public function setRole($role) {

    if($role === NULL) {
        $this->role = NULL;
        return;
    }

    //if(!preg_match('/^[a-z]{3,55}$/i', $role)) {
    //    throw new Exception('Role for Login does not match expected pattern');
    //}

    $this->role = $role;
}

public function register(PDO $pdo,$password) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Shoe save');
        //return;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $stt = $pdo->prepare('INSERT INTO users (userName, email, hash, role) 
    VALUES (:userName, :email, :hash, :role)');
    $stt->execute([
        'userName' => $this->getUserName(),
        'email' => $this->getEmail(),
        'hash' => $hash,
        'role' => 'user'
    ]);

    $saved = $stt->rowCount() === 1;

    return $saved;
}

public function login(PDO $pdo,$password) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login register');
        //return;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $stt = $pdo->prepare('SELECT username, role, hash FROM users WHERE username = :username LIMIT 1');
    $stt->execute([
      'username' => $this->getUserName()
    ]);

    $row = $stt->fetch();

    if ($row === FALSE || password_verify($_POST['password'], $row['hash']) !== TRUE) {
        header('Location: login?message=BAD_CREDENTIALS');
        exit();
    }

    $_SESSION['USERNAME'] = $row['username'];
    $_SESSION['ROLE'] = $row['role'];

}

}?>