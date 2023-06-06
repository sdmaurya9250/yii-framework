<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;
use common\models\JobOpenings;
use common\models\JobStudents;
use yii\data\ArrayDataProvider;
/**
 * CompanySearch represents the model behind the search form of `common\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * {@inheritdoc}
     */
    // public function rules()
    // {
    //     return [
    //         [['id'], 'integer'],
    //         [['name', 'created_at', 'updated_at'], 'safe'],
    //     ];
    // }

    // public $status;
    // public $title;
    // public $total;

    // public function rules()
    // {
    //     return [
    //         [['status', 'title','total'], 'safe'],
    //     ];
    // }
    public $name;
    public $email;
    public $status;

    

    public function search($params)
    {
        $query =  [
            ['name' => 'John Doe', 'email' => 'johndoe@example.com', 'status' => 'Active'],
            ['name' => 'Jane Smith', 'email' => 'janesmith@example.com', 'status' => 'Inactive'],
            ['name' => 'Robert Johnson', 'email' => 'robertjohnson@example.com', 'status' => 'Active'],
            // ... more users
        ];
        

        $dataProvider = new ArrayDataProvider([
            'allModels' => $query,
            'sort' => [
                'attributes' => ['name', 'email', 'status'],
                // 'attributes' => ['name', 'email', 'status'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        $query = array_filter($query, function ($user) {
            $nameMatch = strpos(strtolower($user['name']), strtolower($this->name)) !== false;
            $emailMatch = strpos(strtolower($user['email']), strtolower($this->email)) !== false;
            $statusMatch = $user['status'] === $this->status;
            return $nameMatch && $emailMatch && $statusMatch;
        });

        $dataProvider->allModels = $query;

        return $dataProvider;
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

     public static function getStatusOptions()
{
    return [
        'Java' => 'Yes',
        'Python' => 'No',
    ];
}
    // public function search($params)
    // {
    //     $query = JobOpenings::find()
    //         ->select([
    //             // 'CASE WHEN job_openings.status = "1" THEN "Active" ELSE "Closed" END AS status',
    //             "(CASE WHEN job_openings.status = '1' THEN 'Active' ELSE 'Closed' END) AS Status",
    //             'job_openings.title',
    //             'COUNT(job_students.job_id) AS total',
    //         ])
    //         ->leftJoin('job_students', 'job_students.job_id = job_openings.id')
    //         ->where(['job_openings.company_id' => 1])
    //         ->groupBy('job_students.job_id');

    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     $this->load($params);

    //     if (!$this->validate()) {
    //         return $dataProvider;
    //     }

    //     $query->andFilterWhere(['like', 'status', $this->status])
    //         ->andFilterWhere(['like', 'title', $this->title]);
    //         // ->andFilterWhere(['like', 'total', $this->total]);

    //     return $dataProvider;
    // }
    // public function search($params)
    // {
    //     $query = Company::find();

    //     // add conditions that should always apply here

    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     $this->load($params);

    //     if (!$this->validate()) {
    //         // uncomment the following line if you do not want to return any records when validation fails
    //         // $query->where('0=1');
    //         return $dataProvider;
    //     }

    //     // grid filtering conditions
    //     $query->andFilterWhere([
    //         'id' => $this->id,
    //         'created_at' => $this->created_at,
    //         'updated_at' => $this->updated_at,
    //     ]);

    //     $query->andFilterWhere(['like', 'name', $this->name]);

    //     return $dataProvider;
    // }
}
