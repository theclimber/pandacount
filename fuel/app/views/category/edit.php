<h2>Editing Category</h2>
<br>

<?php echo render('category/_form'); ?>
<p>
	<?php echo Html::anchor('category/view/'.$category->id, 'View'); ?> |
	<?php echo Html::anchor('category', 'Back'); ?></p>
