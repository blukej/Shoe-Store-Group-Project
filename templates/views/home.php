<?php session_start(); ?>
<!-- Done with help from: https://v4-alpha.getbootstrap.com/examples/ -->
<?php 
    if($locals['role'] === 'user'){
        echo '<h5 class="text-center">Welcome back ' . $locals['username'] . ', to our website.</h5>
        <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Welcome to the Big Brain Shoe shop</h1>
          <p class="text-center">This website offers shoe products from all of the popular brands such as, Adidas, Nike and more.</p>
          <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>
  
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>About Us</h2>
            <p>We are a group of students that offer a web store that offers products that are up to date with the current trend and brands.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Welcome to the website&raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Products we offer</h2>
            <p>Our store is filled up with shoes from brands known around the world, please make sure to check out products out using the button below. </p>
            <p><a class="btn btn-secondary" href="products" role="button">View products &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2>Reviews</h2>
            <p>Our reviews page allows you to sumbit reviews on products that you have already used. This allows you to give insight to any buyer looking to see what others think of the product before they actually purchase it.</p>
            <p><a class="btn btn-secondary" href="reviews" role="button">View reviews &raquo;</a></p>
          </div>
        </div>
  
        <hr>';
    }
    else if($locals['role'] === 'manager'){
        echo '<h5 class="text-center">Welcome Staff member: ' . $locals['username'] . '</h5>
        <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Welcome to the Big Brain Shoe shop</h1>
          <p class="text-center">This website offers shoe products from all of the popular brands such as, Adidas, Nike and more.</p>
          <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>
  
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>About Us</h2>
            <p>We are a group of students that offer a web store that offers products that are up to date with the current trend and brands.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Welcome to the website&raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Products we offer</h2>
            <p>Our store is filled up with shoes from brands known around the world, please make sure to check out products out using the button below. </p>
            <p><a class="btn btn-secondary" href="products" role="button">View products &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2>Reviews</h2>
            <p>Our reviews page allows you to sumbit reviews on products that you have already used. This allows you to give insight to any buyer looking to see what others think of the product before they actually purchase it.</p>
            <p><a class="btn btn-secondary" href="reviews" role="button">View reviews &raquo;</a></p>
          </div>
        </div>
  
        <hr>';
    }
    else if (!isset($locals['username']) || $locals['username'] == ''){
        echo '<div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Welcome to the Big Brain Shoe shop</h1>
          <p class="text-center">This website offers shoe products from all of the popular brands such as, Adidas, Nike and more.</p>
          <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
      </div>
  
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>About Us</h2>
            <p>We are a group of students that offer a web store that offers products that are up to date with the current trend and brands.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Welcome to the website&raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Products we offer</h2>
            <p>Our store is filled up with shoes from brands known around the world, please make sure to check out products out using the button below. </p>
            <p><a class="btn btn-secondary" href="products" role="button">View products &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2>Reviews</h2>
            <p>Our reviews page allows you to sumbit reviews on products that you have already used. This allows you to give insight to any buyer looking to see what others think of the product before they actually purchase it.</p>
            <p><a class="btn btn-secondary" href="reviews" role="button">View reviews &raquo;</a></p>
          </div>
        </div>
  
        <hr>

        <h5 class="text-center">You are not logged in, please <a href='.'login'.'>login</a> to view the products we have to offer.</h5>
        <h5 class="text-center">If you do not have an account set up, you can register <a href='.'register'.'>here</a>.</h5>';
    }   
?>
