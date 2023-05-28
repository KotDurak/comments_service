<?php


namespace app\models\search;


use app\models\Comment;
use yii\data\ActiveDataProvider;

class CommentSearch extends Comment
{
    public $date_from;
    public $date_to;
    public $subject;
    public $username;
    public $subject_id;


    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'safe'],
            [['subject', 'username'], 'string'],
            ['subject_id', 'integer'],
        ];
    }

    public function search(array $params = [], $formName = null): ActiveDataProvider
    {
        $this->load($params, $formName);

        $query = Comment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['subject' => $this->subject]);

        if (!empty($this->date_from)) {
            $query->andWhere(['>=', 'create_time', strtotime($this->date_from)]);
        }

        if (!empty($this->date_to)) {
            $query->andWhere(['<=', 'create_time', strtotime($this->date_to)]);
        }

        //dd($query->createCommand()->getRawSql());

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere([
                'subject_id' => $this->subject_id,
                'subject'    => $this->subject,
            ]);


        return $dataProvider;
    }
}