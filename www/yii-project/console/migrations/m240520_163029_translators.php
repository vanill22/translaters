<?php

use yii\db\Migration;

/**
 * Class m240520_163029_translators
 */
class m240520_163029_translators extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('translators', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'available_weekdays' => $this->boolean()->defaultValue(true),
            'available_weekends' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('translators');
    }

}
