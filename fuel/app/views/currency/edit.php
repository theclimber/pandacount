<h2>Editing Currency</h2>
<br>

<?php echo render('currency/_form'); ?>
<p>
	<?php echo Html::anchor('currency/view/'.$currency->id, 'View'); ?> |
	<?php echo Html::anchor('currency', 'Back'); ?></p>
