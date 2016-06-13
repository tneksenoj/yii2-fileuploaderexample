<?php

use yii\db\Migration;

/**
 * Handles the creation for table `file_table`.
 */
class m160613_161113_create_file_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('file', [
            'id' => $this->primaryKey(),
            'location' => 'varchar(2056) NOT NULL',
            'orig_name' => 'varchar(2056) NOT NULL',
            'alias_name' => 'varchar(2056) NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('file');
    }
}
