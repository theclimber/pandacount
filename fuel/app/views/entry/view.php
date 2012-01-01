<h2>Viewing #<?php echo $entry->id; ?></h2>

<p>
	<strong>Date:</strong>
	<?php echo $entry->date; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $entry->description; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $entry->price; ?></p>
<p>
	<strong>Category:</strong>
	<?php echo $entry->category; ?></p>
<p>
	<strong>Currency:</strong>
	<?php echo $entry->currency; ?></p>
<p>
	<strong>Account:</strong>
	<?php echo $entry->account; ?></p>

<?php echo Html::anchor('entry/edit/'.$entry->id, 'Edit'); ?> |
<?php echo Html::anchor('entry', 'Back'); ?>