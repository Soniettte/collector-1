<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_collections extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'collections_user_id' => array(
				'type' => 'INT',
				'constraint' => 255,
				
			),
			'collections_coin_id' => array(
				'type' => 'INT',
				'constraint' => 255,
				
			),
			'collections_have' => array(
				'type' => 'BOOL',
				
			),
			'collections_wish' => array(
				'type' => 'INT',
				'constraint' => 2,
				
			),
			'collections_options' => array(
				'type' => 'VARCHAR',
				'constraint' => 4,
				
			),
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('collections');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('collections');

	}

	//--------------------------------------------------------------------

}