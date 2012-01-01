<h2>Viewing #<?php echo $category->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $category->name; ?></p>
<p>
	<strong>Parent:</strong>
	<?php echo $category->parent; ?></p>

<?php echo Html::anchor('category/edit/'.$category->id, 'Edit'); ?> |
<?php echo Html::anchor('category', 'Back'); ?>