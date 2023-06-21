<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Inquiry;

/**
 * InquirySearch represents the model behind the search form of `common\models\Inquiry`.
 */
class InquirySearch extends Inquiry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // $query = Inquiry::find()->joinWith('student');
        // $query = Inquiry::find()
        // ->leftJoin('student', 'student.id = inquiry.student_id')
        // ->leftJoin('users', 'users.id = student.id');
        // add conditions that should always apply here
        $query = Inquiry::find();
        // ->joinWith(['student', 'student.user']) // Join with 'student' and 'user' tables
        // ->select(['status', 'COUNT(*) AS count'])
       
        // ->groupBy('status');

           // Apply filters
         

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'student_id' => $this->student_id,
        ]);

        $query->andFilterWhere(['status' => 3]); // Filter by status 3

        // Group by status
        $query->groupBy(['CASE WHEN status = 3 THEN status ELSE 0 END']);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
