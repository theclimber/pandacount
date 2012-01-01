<h2>Listing Entries</h2>
<br>
<?php if ($entries): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Date</th>
			<th>Description</th>
			<th>Price</th>
			<th>Category</th>
			<th>Currency</th>
			<th>Account</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($entries as $entry): ?>		<tr>

			<td><?php echo $entry->date; ?></td>
			<td><?php echo $entry->description; ?></td>
			<td><?php echo $entry->price; ?></td>
			<td><?php echo $entry->category; ?></td>
			<td><?php echo $entry->currency; ?></td>
			<td><?php echo $entry->account; ?></td>
			<td>
				<?php echo Html::anchor('entry/view/'.$entry->id, 'View'); ?> |
				<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit'); ?> |
				<?php echo Html::anchor('entry/delete/'.$entry->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Entries.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('entry/create', 'Add new Entry', array('class' => 'btn success')); ?>

</p>
