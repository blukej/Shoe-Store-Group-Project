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

<div class="container w-15">
    <form id="frm-comment" action="<?= APP_BASE_URL ?>/reviews" method="post" style="margin-top: 25px;">       
        <input id='userName' type='hidden' name='userName' value="<?php echo $locals['userName']?>">

        <select class="form-control" name='shoes' style="margin-bottom: 10px;">
            <?php foreach($locals['displayShoes'] as $shoe) : ?>
                <?php 
                    $shoes = $shoe["brand"] . '' . $shoe["name"];       
                    echo "<option value='$shoes'>$shoes</option>";   
                ?>
            <?php endforeach; ?>  
        </select>
            
        <textarea class="form-control" type="text" name="review_content" id ="review_content" placeholder="Enter Review" rows="3"></textarea>
         
        <input class="btn btn-lg btn-primary btn-block" type='submit' value='Submit Review' style="margin-top: 10px;">
    </form>
</div>  

<?php foreach($locals['displayReviews'] as $review) : ?>
<div class="container w-15" style="margin-top: 55px;">
    <div class="card">
        <h5 class="card-header">
         <?='Review on '. $review["shoe"] . ' by - '. $review["userName"];?>
         </h5>   
         <div class="card-body">
         <?=$review["review"];?>
         </div> 
        </div>     
    </div>
</div>  
<?php endforeach; ?> 

	
