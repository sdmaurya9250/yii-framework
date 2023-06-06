<?php

use common\models\Company;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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
    ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'status',
            'value' => function ($model) {
                return $model->status === '1' ? 'Active' : 'Closed';
            },
            'filter' => Html::activeDropDownList($searchModel, 'status', [
                '1' => 'Active',
                '0' => 'Closed',
            ], ['prompt' => 'Select Status']),
        ],
        'title',
        
        'getJobStudents.total',
    ],
]); ?>



</div>
