<?php
class Model_Entry extends Model_Crud
{
	protected static $_table_name = 'entries';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('date', 'Date', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('price', 'Price', 'required');
		$val->add_field('category', 'Category', 'required');
		$val->add_field('currency', 'Currency', 'required');
		$val->add_field('account', 'Account', 'required|valid_string[numeric]');

		return $val;
	}

}
