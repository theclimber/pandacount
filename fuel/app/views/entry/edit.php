<h2>Editing Entry</h2>
<br>

<?php echo render('entry/_form'); ?>
<p>
	<?php echo Html::anchor('entry/view/'.$entry->id, 'View'); ?> |
	<?php echo Html::anchor('entry', 'Back'); ?></p>
