<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_coins extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'coins_value' => array(
				'type' => 'VARCHAR',
				'constraint' => 1,
				
			),
			'coins_country' => array(
				'type' => 'VARCHAR',
				'constraint' => 2,
				
			),
			'coins_year' => array(
				'type' => 'VARCHAR',
				'constraint' => 4,
				
			),
			'coins_title' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				
			),
			'coins_varient' => array(
				'type' => 'VARCHAR',
				'constraint' => 50,
				
			),
			'coins_national_side' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'coins_common_side' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('coins');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('coins');

	}

	//--------------------------------------------------------------------

}