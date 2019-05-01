<script>
    $(document).ready(function(){
        $("form").submit(function(event){
            event.preventDefault();
            var brand   = $("#Shoe-Brand").val();
            var name    = $("#Shoe-Name").val();
            var size    = $("#Shoe-Size").val();
            var price   = $("#Shoe-Price").val();
            var url     = $("#Shoe-Url").val();
            var submit  = $("#Shoe-Submit").val();

            $(".form-message").load("<?= APP_BASE_URL ?>/add-shoe", {
                brand:  brand,
                name:   name,
                size:   size,
                price:  price,
                url:    url,
                submit: submit
            });
        });
    });
</script>

<form action="<?= APP_BASE_URL ?>/add-shoe" method="post">
<div class="container w-50"> 
    <div class="form-group col-sm-10">
    <label for='Brand'>Brand</label>
    <input id='Shoe-Brand' class="form-control"  type='text' name='brand'>
    </div>

    <div class="form-group col-sm-10">
    <label for='Name'>Shoe Name</label>
    <input id='Shoe-Name' class="form-control"  type='text' name='name'>
    </div>

    <div class="form-group col-sm-10">
    <label for='Size'>Size</label>
    <input id='Shoe-Size' class="form-control"  type='text' name='size' step='0.1'/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Price'>Price</label>
    <input id='Shoe-Price' class="form-control"  type='text' name='price' step='0.01'/>
    </div>

    <div class="form-group col-sm-10">
    <label for='Image Url'>Image Url</label>
    <input id='Shoe-Url' class="form-control"  type='text' name='url'>
    </div>

    <div class="col-sm-10">
    <input id='Shoe-Submit' type='submit' class="btn btn-primary" value='Submit'>
    <p class="form-message"></p>
    </div>
</div>
</form>