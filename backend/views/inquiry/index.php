<?php

use common\models\Inquiry;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\InquirySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inquiries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inquiry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php
    // echo '<pre>';
    // print_r($dataProvider->getModels());

    // die;


?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'name',
            'status',
            // 'user_created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Inquiry $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>


<!-- [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                ArrayHelper::map(YourModel::find()->select('status')->distinct()->all(), 'status', 'status'),
                ['class' => 'form-control', 'prompt' => 'All']
            ),
            'value' => function ($model) {
                // Display "Active" for all statuses other than 3, and "Reject" for status 3
                return $model->status == 3 ? 'Reject' : 'Active';
            },
        ], -->
