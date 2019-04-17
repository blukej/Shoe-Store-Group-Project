<?php require_once('Model.php'); ?>
<?php class Shoe {

//private $id;
private $name;
private $brand;
private $size;
private $price;



public function __construct($args) {

    if (!is_array($args)) {
        throw new Exception('Shoe constructor requires an array');
    }

    $this->setID($args['id'] ?? NULL);
    $this->setName($args['name'] ?? NULL);
    $this->setBrand($args['brand'] ?? NULL);
    $this->setSize($args['size'] ?? NULL);
    $this->setPrice($args['price'] ?? NULL);

    $this->id = $args['id']     ?? NULL;
    $this->name = $args['name'] ?? 'Untilted Shoe';
    $this->brand = $args['brand'] ?? 'Untilted Brand';
    $this->size = $args['size'] ?? 'Untilted Size';
    $this->price = $args['price'] ?? 'Untilted Price';
}

public function getID() {
    return $this->id;
}

public function getName() {
    return $this->name;
}

public function getBrand() {
    return $this->brand;
}

public function getSize() {
    return $this->size;
}

public function getPrice() {
    return $this->price;
}

public function setID($id) {
    
    if($id === NULL) {
       $this->id = NULL;
       return;
    }
    
//    if(!Model::isIdValid($id)) {
//        throw new Exception('ID for Shoe object must be positive numeric');
//    }

   $this->id = $id;
}

public function setName($name) {

    if($name === NULL) {
        $this->name = NULL;
        return;
    }

    if(!preg_match('/^[a-z]{3,55}$/i', $name)) {
        throw new Exception('Name for Shoe does not match expected pattern');
    }

    $this->name = $name;
}

public function setBrand($brand) {

    if($brand === NULL) {
        $this->brand = NULL;
        return;
    }

    if(!preg_match('/^[a-z]{3,55}$/i', $brand)) {
        throw new Exception('Brand for Shoe does not match expected pattern');
    }

    $this->brand = $brand;
}

public function setSize($size) {

    if($size === NULL) {
        $this->size = NULL;
        return;
    }

    if(!preg_match('/^\d*\.?\d*[0-9]$/i', $size)) {
        throw new Exception('Size for Shoe does not match expected pattern');
    }

    $this->size = $size;
}

public function setPrice($price) {
    
    if($price === NULL) {
        $this->price = NULL;
        return;
    }
    
    if(!preg_match('/^\d*\.?\d*[0-9]$/i', $price)) {
        throw new Exception('Size for Shoe does not match expected pattern');
    }

    $this->price = $price;
}

public function save(PDO $pdo) {
   
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Shoe save');
        //return;
    }

    //
   
   // if($this->id === NULL) {
        // Insert
        $stt = $pdo->prepare('INSERT INTO shoes (name, brand, size, price) 
        VALUES (:name, :brand, :size, :price)');
        $stt->execute([
            'name' => $this->getName(),
            'brand' => $this->getBrand(),
            'size' => $this->getSize(),
            'price' => $this->getPrice()
        ]);

        $saved = $stt->rowCount() === 1;
        // //$last_id = $saved->lastInsertId();

        // if($saved) {
        //     $this->id = $pdo->lastInsertId();
        // }

        return $saved;
    // }
    // else {
    //     //Update
    //     $stt = $pdo->prepare('UPDATE shoes SET name=:name, brand=:brand, size=:size, price=:price
    //      WHERE id=:id
    //     LIMIT 1');
    //     $stt->execute([
    //         'id'   => $this->getID(),
    //         'name' => $this->getName(),
    //         'brand' => $this->getBrand(),
    //         'size' => $this->getSize(),
    //         'price' => $this->getPrice()
    //     ]);

    //     return $stt->rowCount() == 1;
    // }
}

public function delete($pdo) {
    if(!($pdo instanceof PDO)) {
        throw new Exception('Invalid PDO object for Shoe delete');
        //return;
    }

    if($this->getID() === NULL) {
        throw new Exception('Cannot delete a transient Shoe');
    }

    $stt = $pdo->prepare('DELETE FROM shoes WHERE id=:id LIMIT 1');
    $stt->execute([
        'id' => $this->getID()
    ]);
    
        $deleted = $stt->rowCount() === 1;

        if($deleted) {
            $this->id = getID(NULL);
        }

    return $deleted($pdo);
}

public function findAll($pdo) {
    if (!$pdo instanceof PDO) {
        throw new Exception('Invalid PDO object for Shoe findAll');
    }

    $stt = $pdo->prepare('SELECT id, name, brand, size, price FROM shoes');
    $stt->execute();

    return $stt;
}

public static function findOneById($id, $pdo) {
    //if(!Model::isIdValid($id)) {
    //    throw new Exception('ID for Shoe must be positive numeric');
    //}

    //if (!($pdo instanceof PDO)) {
    //    throw new Exception('Invalid PDO object for Shoe findOneById');
    //}

    $stt = $pdo->prepare('SELECT name, brand, size, price FROM shoes WHERE id = :id LIMIT 1');
    $stt->execute([
        'id' => $id
    ]);

    $row = $stt->fetchAll();

    if ($row === FALSE) {
        return NULL;
    } else {
        new Shoe($row);
    }
    return $row;
}

public function update($id, $pdo) {
    //Update
        $stt = $pdo->prepare('UPDATE shoes SET name=:name, brand=:brand, size=:size, price=:price
        WHERE id=:id
        LIMIT 1');
        $stt->execute([
             'id'   => $id,
             'name' => $this->getName(),
             'brand' => $this->getBrand(),
             'size' => $this->getSize(),
             'price' => $this->getPrice()
        ]);      
}

} ?>