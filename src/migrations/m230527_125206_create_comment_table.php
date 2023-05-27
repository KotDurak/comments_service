<?php

use yii\db\Migration;


class m230527_125206_create_comment_table extends Migration
{
    const TABLE_NAME = '{{%comment}}';
    const INDEX_SUBJ_ID = 'idx_comment_subject_id';
    const INDEX_SUBJ = 'idx_comment_subject';
    const INDEX_STATUS = 'idx_comment_status';

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'            => $this->primaryKey()->unsigned(),
            'subject_id'    => $this->integer()->unsigned(),
            'subject'       => $this->string()->notNull(),
            'status'        => $this->tinyInteger()->unsigned(),
            'ip'            => $this->string(),
            'user_agent'    => $this->string(),
            'create_time'   => $this->integer()->unsigned(),
            'username'      => $this->string(),
            'comment'       => $this->text(),
        ]);

        $this->createIndex(self::INDEX_SUBJ_ID, self::TABLE_NAME, 'subject_id');
        $this->createIndex(self::INDEX_SUBJ, self::TABLE_NAME, 'subject');
        $this->createIndex(self::INDEX_STATUS, self::TABLE_NAME, 'status');
    }


    public function safeDown()
    {
        $this->dropIndex(self::INDEX_SUBJ_ID, self::TABLE_NAME);
        $this->dropIndex(self::INDEX_SUBJ, self::TABLE_NAME);
        $this->dropIndex(self::INDEX_STATUS, self::TABLE_NAME);

        $this->dropTable(self::TABLE_NAME);
    }
}
