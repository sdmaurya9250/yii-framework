<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php

// echo Video::$details;

// print_r(Video::$details);
// echo Yii::$app->session->get('message')

?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModels,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'video_id',
            'title',
            // 'status',
            // [
            //     'attribute' => 'status',
            //     'value' => function ($model) {
            //         switch ($model->status) {
            //             case 1:
            //                 return 'Reject';
            //             case 2:
            //                 return 'Selected';
            //             case 3:
            //                 return 'Applied';
            //             default:
            //                 return 'Unknown';
            //         }
            //     },
            //     'format' => 'html',
            //     'filter' => [
            //         1 => 'Reject',
            //         2 => 'Selected',
            //         3 => 'Applied',
            //     ],
            // ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status) {
                        case Video::STATUS_APPLIED:
                            return '<span class="label label-success">Applied</span>';
                        case Video::STATUS_SELECTED:
                            return '<span class="label label-primary">Selected</span>';
                        case Video::STATUS_REJECTED:
                            return '<span class="label label-danger">Rejected</span>';
                        default:
                            return '';
                    }
                },
                'filter' => Html::activeDropDownList(
                    $searchModels,
                    'status',
                    [
                        '' => 'All',
                        Video::STATUS_APPLIED => 'Applied',
                        Video::STATUS_SELECTED => 'Selected',
                        Video::STATUS_REJECTED => 'Rejected',
                    ],
                    ['class' => 'form-control', 'prompt' => 'Select Status']
                ),
            ],
    
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
