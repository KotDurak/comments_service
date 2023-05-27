<?php

use yii\db\Migration;


class m230527_105323_create_seller_table extends Migration
{
    const TABLE = '{{%seller}}';

    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey()->unsigned(),
            'name'  => $this->string()->notNull(),
            'subject'   => $this->string()->notNull()
        ]);

        $this->createIndex('idx_seller_subject', self::TABLE, 'subject');
    }


    public function safeDown()
    {
        $this->dropIndex('idx_seller_subject', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
