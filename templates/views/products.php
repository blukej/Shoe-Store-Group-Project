<div class="bg-dark">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators text-dark">
      <li data-target="#carouselExampleCaptions" class="bg-secondary" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" class="bg-secondary" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" class="bg-secondary" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner ">
      <div class="carousel-item active text-center">
        <img src="assets/images/SoulCal Canvas Low Mens Trainers.jpg" class="img-fluid" alt="1">
        <div class="carousel-caption d-none d-md-block .text-secondary">
          <p class="text-dark">SoulCal Canvas Low Mens Trainers</p>
        </div>
      </div>
      <div class="carousel-item text-center">
        <img src="assets/images/Firetrap Bodie Mens Boots.jpg" class="img-fluid" alt="2">
        <div class="carousel-caption d-none d-md-block">
        <p class="text-dark">Bodie Mens Boots</p>
        </div>
      </div>
      <div class="carousel-item text-center">
        <img src="assets/images/Nike Downshifter 9.jpg" class="img-fluid" alt="3">
        <div class="carousel-caption d-none d-md-block">
        <p class="text-dark">Downshifter 9</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Reference from: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_store&stacked=h -->

<?php foreach($locals['displayShoes'] as $display) : ?>
<?php $count++; ?>
<div class="container text-center w-25">
  <div class="row">
    <div class="col- w-100">
  
      <div class="panel-body"><img src="assets/images/<?= $display["url"]; ?>" class="img-responsive" style="width:40%" alt="Image1"></div>
      <div class="panel-heading h2"><?= $display["name"]; ?></div>
      <div class="panel-footer h2">€<?= $display["price"]; ?></div>
      <div class="panel-footer h2">Sizes: <?= $display["size"]; ?></div>
        
  <input type='submit' class="btn btn-primary panel-footer h2" value='Add to cart'>    
</div>
</div>
</div><br>
<?php endforeach; ?>