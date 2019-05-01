<?php return function($req, $res) { require_once('./models/Shoe.php'); 

$db = \Rapid\Database::getPDO();

$name   =    $req->body('name');
$brand  =    $req->body('brand');
$size   =    $req->body('size');
$price  =    $req->body('price');
$url    =    $req->body('url');

$errorEmpty       = false;
$errorNotNumber   = false;
$errormessage = "";

    if(empty($name) || empty($brand) || empty($size) || empty($price) || empty($url)) {
        $res->send("<span class='form-error'>Fill in all fields!</span>");
        $errorEmpty  = true;
    }
    elseif(!is_numeric($size) || !is_numeric($price))
    {
        $res->send("<span class='form-error'>Size & Price fields must be numeric!</span>");
        $errorNotNumber = true;
    }
    else {
        $res->send("<span class='form-success'>Entry was added to the database!</span>");
    
        $shoe = new Shoe([
            'name' => $name,
            'brand' => $brand,
            'size' => $size,
            'price' => $price,
            'url' => $url
        ]);
        
        $shoe->save($db);
        
        //$res->redirect("/display-shoes");
        exit();
    }
}?>

<script>
    var errorEmpty     = "<?php $res->send($errorEmpty);?>";
    var errorNotNumber = "<?php $res->send($errorNotNumber);?>";

    if(errorEmpty == true) {
        $("#Shoe-Brand, #Shoe-Name, #Shoe-Size, #Shoe-Price, #Shoe-Url").addClass("form-message");
    }
    if(errorNotNumber == true) {
        $("#Shoe-Size, #Shoe-Price").addClass("form-message");  
    }
    if(errorEmpty == false && errorNotNumber == false) {
        $("#Shoe-Brand, #Shoe-Name, #Shoe-Size, #Shoe-Price, #Shoe-Url").val("");
       }
</script>