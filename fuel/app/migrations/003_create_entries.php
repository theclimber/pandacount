<?php

namespace Fuel\Migrations;

class Create_entries
{
	public function up()
	{
		\DBUtil::create_table('entries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'date' => array('type' => 'datetime'),
			'description' => array('type' => 'text'),
			'price' => array('type' => 'float'),
			'category' => array('type' => 'int'),
			'currency' => array('type' => 'int'),
			'account' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('entries');
	}
}
