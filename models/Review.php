<?php class Review {

private $reviewID;
private $userName;
private $review;
private $shoe;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Review constructor requires an array');
    }

    $this->setReviewID($args['reviewID'] ?? NULL);
    $this->setUserName($args['userName'] ?? NULL);
    $this->setReview($args['review'] ?? NULL);
    $this->setShoe($args['shoe'] ?? NULL);
}

public function getReviewID() {
    return $this->reviewID;
}

public function getUserName() {
    return $this->userName;
}

public function getReview() {
    return $this->review;
}

public function getShoe() {
    return $this->shoe;
}

public function setReviewID($reviewID) {
    
    if($reviewID === NULL) {
       $this->reviewID = NULL;
       return;
    }

   $this->reviewID = $reviewID;
}

public function setUserName($userName) {
    
    if($userName === NULL) {
       $this->userName = NULL;
       return;
    }

   $this->userName = $userName;
}

public function setReview($review) {

    $review = htmlentities($review, ENT_QUOTES, 'UTF-8');
    
    if($review == NULL) {
        header('Location:reviews?message=REVIEW_MISSING');
        $this->review = NULL;
        exit;
    }

   $this->review = $review;
}

public function setShoe($shoe) {
    
    if($shoe === NULL) {
       $this->shoe = NULL;
       return;
    }

   $this->shoe = $shoe;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Review save');
    }

        $stt = $pdo->prepare('INSERT INTO reviews (userName, review, shoe) 
        VALUES (:userName, :review, :shoe)');
        $stt->execute([
            'userName' => $this->getUserName(),
            'review' => $this->getReview(),
            'shoe' => $this->getShoe()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}

public function findAll($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Review findAll');
    }

    $stt = $pdo->prepare('SELECT userName, review, shoe FROM reviews');
    $stt->execute();

    return $stt;
}

}?>