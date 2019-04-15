<form action="<?= APP_BASE_URL ?>/add-shoe" method="post">
    <label for='Name'>Shoe Name</label>
    <input id='Name' type='text' name='name'>

    <label for='Brand'>Brand</label>
    <input id='Brand' type='text' name='brand'>

    <label for='Size'>Size</label>
    <input id='Size' type='text' name='size'>

    <label for='Price'>Price</label>
    <input id='Price' type='number' name='price'>

    <input type='submit' value='Submit'>
</form>