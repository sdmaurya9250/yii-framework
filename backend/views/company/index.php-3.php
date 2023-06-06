<?php

use common\models\Company;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

/** @var yii\web\View $this */
/** @var common\models\CompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   
    
    <?php
//    echo '<pre>';
//         print_r($searchModel);
//         exit;

// Your static data array
// $data = [
//     ['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
//     ['id' => 2, 'name' => 'Jane', 'email' => 'jane@example.com'],
//     ['id' => 3, 'name' => 'David', 'email' => 'david@example.com'],
//     // ...
// ];

$users = [
    ['name' => 'John Doe', 'email' => 'johndoe@example.com', 'status' => 'Active'],
    ['name' => 'Jane Smith', 'email' => 'janesmith@example.com', 'status' => 'Inactive'],
    ['name' => 'Robert Johnson', 'email' => 'robertjohnson@example.com', 'status' => 'Active'],
    // ... more users
];


// $dataProvider = new ArrayDataProvider([
//     // 'allModels' => $data,
//     // 'sort' => [
//     //     'attributes' => ['id', 'name', 'email'],
//     // ],
//     // 'pagination' => [
//     //     'pageSize' => 10,
//     // ],
//     'dataProvider' => $dataProvider,
//     'filterModel' => $searchModel,
//     'columns' => [
//         'name',
//         'email',
//         'status',
//     ],
// ]);
    ?>

<?php

$staticData = [
    ['id' => 1, 'name' => 'John', 'age' => 25],
    ['id' => 2, 'name' => 'Alice', 'age' => 30],
    ['id' => 3, 'name' => 'Bob', 'age' => 28],
    // Add more data rows as needed
];
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        'email',
        'status',
    ],
]); ?>




</div>
