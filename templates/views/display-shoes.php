	<?session_start();?>
	<h3 class="h3 text-center">Product table:</h3>
	<a href="<?= APP_BASE_URL ?>/add-shoe"> Add a shoe: </a>
	<table class="table table-hover table-bordered table-striped text-center">
		<th>ID:</th>
		<th>Brand:</th>
		<th>Shoe Name:</th>
		<th>Size:</th>
		<th>€ Price:</th>
		<th>Image URL:</th>
		<th>Delete / Update:</th>
	<?php foreach($locals['displayShoes'] as $display) : ?>
		<tr>	
			<td><?= $display["id"]; ?> </td>
			<td><?= $display["brand"]; ?> </td>
			<td><?= $display["name"]; ?> </td>
			<td><?= $display["size"]; ?> </td>
			<td><?= $display["price"]; ?> </td>
			<td><?= $display["url"]; ?> </td>
			<td><a onclick='return confirm("Are you sure you want to delete the shoe with the Brand of <?= $display["brand"]; ?> and a shoe name of <?= $display["name"]; ?> from the database?")' href='<?= APP_BASE_URL?>/delete-shoe?shoe_id=<?=$display['id']?>'> Delete </a>/<a href='<?= APP_BASE_URL?>/update-shoe?update=<?=$display['id']?>'> Update </a></td>
		</tr>
		<?php endforeach; ?>
	</table>
		<br>
		
	<p class="text-center">You are logged in</p>
	<p class="text-center"><a href='logout'>Log out?</a></p>