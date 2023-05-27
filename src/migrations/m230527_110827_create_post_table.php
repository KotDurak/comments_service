<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m230527_110827_create_post_table extends Migration
{
    const TABLE = '{{%post}}';

    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id'            => $this->primaryKey()->unsigned(),
            'title'          => $this->string()->notNull(),
            'subject'       => $this->string()->notNull(),
            'content'   => $this->text(),
        ]);

        $this->createIndex('idx_post_subject', self::TABLE, 'subject');
    }


    public function safeDown()
    {
        $this->dropIndex('idx_post_subject', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
