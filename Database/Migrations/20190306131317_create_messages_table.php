<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_messages_table extends Migration
{

	public $tableName = 'messages';

	public function up()
	{
		$this->forge->addField([
			'message_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'message_uid' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => true,
				'null' => true,
				'default' => null
			],
			'message_is_html' => [
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => true,
				'null' => false,
				'default' => 1
			],
			'message_enabled' => [
				'type' => 'TINYINT',
				'constraint' => 1,
				'unsigned' => true,
				'null' => false,
				'default' => 1
			],			
			'message_subject' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'message_body' => [
				'type' => 'TEXT',
				'constraint' => 65535
			]
		]);

		$this->forge->addKey('message_id', true);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}