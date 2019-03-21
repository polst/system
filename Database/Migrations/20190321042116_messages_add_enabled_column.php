<?php

namespace BasicApp\System\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_messages_add_enabled_column extends Migration
{

    public $tableName = 'messages';

    public function up()
    {
        $this->forge->addColumn($this->tableName, [
            'message_enabled' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'unsigned' => true
            ]
        ]);
    }

    public function down()
    {
       $this->forge->dropColumn($this->tableName, 'message_enabled');
    }

}