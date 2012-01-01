<h2>Listing Currencies</h2>
<br>
<?php if ($currencies): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Rate</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($currencies as $currency): ?>		<tr>

			<td><?php echo $currency->name; ?></td>
			<td><?php echo $currency->rate; ?></td>
			<td>
				<?php echo Html::anchor('currency/view/'.$currency->id, 'View'); ?> |
				<?php echo Html::anchor('currency/edit/'.$currency->id, 'Edit'); ?> |
				<?php echo Html::anchor('currency/delete/'.$currency->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Currencies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('currency/create', 'Add new Currency', array('class' => 'btn success')); ?>

</p>
