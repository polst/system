<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Database\Migrations;

class Migration_create_configs_table extends \BasicApp\Core\Migration
{

	public $tableName = 'configs';

	public function up()
	{
		$this->forge->addField([
			'config_id' => $this->primaryColumn(),
			'config_updated_at' => $this->createdColumn(),
			'config_class' => $this->stringColumn([
				'constraint' => 127,
				'null' => false
			]),
			'config_property' => $this->stringColumn([
				'constraint' => 127,
				'null' => false
			]),
			'config_value' => $this->stringColumn()
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