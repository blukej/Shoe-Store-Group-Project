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
            exit();
            
        }
        else if($path === '/register'){
            header('Location: register?message=USERNAME_MISSING');
            $this->userName = NULL;
            exit();
        }
    }

    $this->userName = $userName;
}


public function setEmail($email) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($email == NULL) {
        if($path === '/register'){
        header('Location: register?message=EMAIL_MISSING');
        $this->email = NULL;
        exit(); 
        }
    }

    $this->email = $email;
}

public function setHash($hash) {

    $rapid = new \Rapid\Request;
    $path = $rapid->getLocalPath();

    if($hash == NULL) {
        if($path === '/login'){
            header('Location: login?message=PASSWORD_MISSING');
            $this->hash = NULL;
            exit();
        }
        else if($path === '/register'){
            header('Location: register?message=PASSWORD_MISSING');
            $this->hash = NULL;
            exit();
        }
    }
    
    if($path === '/register'){
        if(strlen($hash) <= '8' || !preg_match("#[0-9]+#",$hash) || !preg_match("#[A-Z]+#",$hash) || !preg_match("#[a-z]+#",$hash)){
            header('Location: register?message=PASSWORD_INVALID');
            $this->hash = NULL;
            exit();
        }
    }

    $this->hash = $hash;
    
}

public function setRole($role) {

    if($role === NULL) {
        $this->role = NULL;
        return;
    }

    $this->role = $role;
}

public function register(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        header('Location: register?message=INVALID_PDO');
    }

    $password = $this->getHash();
    $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    if($this->findOneByUsername($this->getUserName(), $pdo) == TRUE ){
        header('Location: register?message=USERNAME_TAKEN');
        exit();
    }

    if($this->findOneByEmail($this->getEmail(), $pdo) == TRUE ){
        header('Location: register?message=EMAIL_TAKEN');
        exit();
    }

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

public function login(PDO $pdo) {

    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login register');
    }

    $stt = $pdo->prepare('SELECT username, role, hash FROM users WHERE username = :username LIMIT 1');
    $stt->execute([
      'username' => $this->getUserName()
    ]);

    $row = $stt->fetch();

    if ($row === FALSE || password_verify(\Rapid\Request::body('password'), $row['hash']) !== TRUE) {
         header('Location: login?message=BAD_CREDENTIALS');
         exit();
    }

    $_SESSION['USERNAME'] = $row['username'];
    $_SESSION['ROLE'] = $row['role'];

}

public static function findOneByUsername($username, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT username FROM users WHERE username = :username LIMIT 1');
    $stt->execute([
        'username' => $username
    ]);

    if ($stt->rowCount() > 0) {
        $bool = True;
      } else {
         $bool = False;
      }

      return $bool;
}

public static function findOneByEmail($email, $pdo) {

    if (!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Login findOneByUsername');
    }

    $stt = $pdo->prepare('SELECT email FROM users WHERE email = :email LIMIT 1');
    $stt->execute([
        'email' => $email
    ]);

    if ($stt->rowCount() > 0) {
        $bool = True;
      } else {
         $bool = False;
      }

      return $bool;
}

}?>