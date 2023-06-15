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
   
    // how to add filter in Yii2 framework?

    <!-- // how to connect  -->


    
<?php


// Your data array
$data = [
    ['id' => 1, 'name' => 'John', 'age' => 25],
    ['id' => 2, 'name' => 'Jane', 'age' => 30],
    ['id' => 3, 'name' => 'Alice', 'age' => 28],
    ['id' => 4, 'name' => 'Bob', 'age' => 35],
];

// Filter options
$filterOptions = [
    '25' => '25 and below',
    '30' => '30 and below',
    '35' => '35 and below',
    '36' => 'Above 35',
];

echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => $data,
        'pagination' => false, // Disable pagination
    ]),
    'filterModel' => null, // Disable default filtering
    'columns' => [
        'id',
        'name',
        'age',
    ],
]);
?>

?>




</div>
