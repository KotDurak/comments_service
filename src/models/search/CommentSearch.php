<?php


namespace app\models\search;


use app\models\Comment;
use yii\data\ActiveDataProvider;

class CommentSearch extends Comment
{
    public $first_time;
    public $last_time;
    public $subject;

    public function rules()
    {
        return [
            [['first_time', 'last_time'], 'safe'],
            [['subject'], 'string']
        ];
    }

    public function search(array $params = []): ActiveDataProvider
    {
        $this->load($params);

        $query = Comment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['subject' => $this->subject]);

        if (!empty($this->first_time)) {
            $query->andWhere(['>=', 'create_time', $this->first_time]);
        }

        if (!empty($this->last_time)) {
            $query->andWhere(['<=', 'create_time', $this->last_time]);
        }


        return $dataProvider;
    }
}