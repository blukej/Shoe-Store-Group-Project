<h3>Product table:</h3>
<a href="<?= APP_BASE_URL ?>/add-shoe"> Add a shoe: </a>
<table>
	<th>ID:</th>
    <th>Brand:</th>
    <th>Shoe Name:</th>
    <th>Size:</th>
	<th>€ Price:</th>
	<th>Delete / Update:</th>
<?php foreach($locals['displayShoes'] as $display) : ?>
	<tr>	
		<td><?= $display["id"]; ?> </td>
		<td><?= $display["brand"]; ?> </td>
		<td><?= $display["name"]; ?> </td>
        <td><?= $display["size"]; ?> </td>
        <td><?= $display["price"]; ?> </td>
		<td><a href='<?= APP_BASE_URL ?>/delete-shoe?shoe_id=<?=$display['id']?>'> Delete </a>/<a href='<?= APP_BASE_URL ?>/update-shoe?update=<?=$display['id']?>'> Update </a></td>
	</tr>
	<?php endforeach; ?>
</table>
	<br>
