<?php
class Model_Currency extends Model_Crud
{
	protected static $_table_name = 'currencies';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('rate', 'Rate', 'required');

		return $val;
	}

}
