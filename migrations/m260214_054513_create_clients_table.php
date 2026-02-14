<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%clients}}`.
 */
class m260214_054513_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'id_state' => $this->integer()->null(),
            'status' => $this->boolean()->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clients}}');
    }
}
