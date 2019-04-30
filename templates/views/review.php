<form action="<?= APP_BASE_URL ?>/reviews" method="post">
    
    <input id='userName' type='hidden' name='userName' value="<?php echo $locals['userName']?>">

    <textarea name="review_content" id ="review_content" placeholder="Enter Review" rows="3"></textarea>

    <input type='submit' value='Submit Review'>
</form>

<?php foreach($locals['displayReviews'] as $review) : ?>
    <?= $review["userName"]; ?>
    <?= $review["review"]; ?>
<?php endforeach; ?>    