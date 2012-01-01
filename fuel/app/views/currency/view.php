<h2>Viewing #<?php echo $currency->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $currency->name; ?></p>
<p>
	<strong>Rate:</strong>
	<?php echo $currency->rate; ?></p>

<?php echo Html::anchor('currency/edit/'.$currency->id, 'Edit'); ?> |
<?php echo Html::anchor('currency', 'Back'); ?>