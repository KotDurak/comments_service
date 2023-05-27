<?php

use yii\db\Migration;


class m230527_110618_create_product_table extends Migration
{
    const TABLE = '{{%product}}';

    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id'            => $this->primaryKey()->unsigned(),
            'name'          => $this->string()->notNull(),
            'subject'       => $this->string()->notNull(),
            'description'   => $this->text(),
        ]);

        $this->createIndex('idx_product_subject', self::TABLE, 'subject');
    }


    public function safeDown()
    {
        $this->dropIndex('idx_product_subject', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
