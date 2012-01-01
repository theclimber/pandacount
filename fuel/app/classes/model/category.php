<?php
class Model_Category extends Model_Crud
{
	protected static $_table_name = 'categories';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('parent', 'Parent', 'required');

		return $val;
	}

}
