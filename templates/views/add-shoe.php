<form action="<?= APP_BASE_URL ?>/add-shoe" method="post">
    
    <label for='Brand'>Brand</label>
    <input id='Brand' type='text' name='brand'>

    <label for='Name'>Shoe Name</label>
    <input id='Name' type='text' name='name'>

    <label for='Size'>Size</label>
    <input id='Size' type='number' name='size' step='0.1'/>

    <label for='Price'>Price</label>
    <input id='Price' type='number' name='price' step='0.01'/>

    <input type='submit' value='Submit'>
</form>