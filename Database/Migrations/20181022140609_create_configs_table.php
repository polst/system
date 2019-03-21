<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_configs_table extends Migration
{

	public $tableName = 'configs';

	public function up()
	{
		$this->forge->addField([
			'config_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'config_updated_at' => [
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null' => true
			],
			'config_class' => [
				'type' => 'VARCHAR',
				'constraint' => 127,
				'null' => false
			],
			'config_property' => [
				'type' => 'VARCHAR',
				'constraint' => 127,
				'null' => false
			],
			'config_value' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
				'default' => null
			]
		]);

		$this->forge->addKey('config_id', true);

		$this->forge->addKey('config_class');

		$this->forge->addUniqueKey(['config_class', 'config_property']);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName, false);
	}

}