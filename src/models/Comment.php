<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property string $subject
 * @property int|null $status
 * @property string|null $ip
 * @property string|null $user_agent
 * @property int|null $create_time
 * @property string|null $username
 * @property string|null $comment
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'status', 'create_time'], 'integer'],
            [['subject', 'comment'], 'required'],
            [['comment'], 'string'],
            [['subject', 'ip', 'user_agent', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'subject' => 'Subject',
            'status' => 'Status',
            'ip' => 'Ip',
            'user_agent' => 'User Agent',
            'create_time' => 'Create Time',
            'username' => 'Username',
            'comment' => 'Comment',
        ];
    }
}
