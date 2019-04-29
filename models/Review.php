<?php class Review {

private $reviewID;
private $userName;
private $review;

public function __construct($args) {

    if(!is_array($args)) {
        throw new Exception('Review constructor requires an array');
    }

    $this->setReviewID($args['reviewID'] ?? NULL);
    $this->setUserName($args['userName'] ?? NULL);
    $this->setReview($args['review'] ?? NULL);
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
    
    if($review === NULL) {
       $this->review = NULL;
       return;
    }

   $this->review = $review;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Review save');
    }

        $stt = $pdo->prepare('INSERT INTO reviews (userName, review) 
        VALUES (:userName, :review)');
        $stt->execute([
            'userName' => $this->getUserName(),
            'review' => $this->getReview()
        ]);

        $saved = $stt->rowCount() === 1;

        return $saved;
}

}?>