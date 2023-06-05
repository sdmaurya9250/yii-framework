<?php

use common\models\AppsCountriesDetailed;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
// use yii\common\AppsCountriesDetailed;

/** @var yii\web\View $this */
/** @var common\models\AppsCountriesDetailedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Apps Countries Detaileds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apps-countries-detailed-index">
<?php

// $model =   AppsCountriesDetailed::find()->asArray()->all();

// echo '<pre>';
// print_r($model);

?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apps Countries Detailed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'countryCode',
            'countryName',
            'currencyCode',
            'fipsCode',
            //'isoNumeric',
            //'north',
            //'south',
            //'east',
            //'west',
            //'capital',
            //'continentName',
            //'continent',
            //'languages',
            //'isoAlpha3',
            //'geonameId',
            //'telephonePrefix',
            [
                'attribute' => 'created_at',
                'label' => 'Action',
                'value' => function ( AppsCountriesDetailed $model, $key, $index, $column) {
                    return Yii::$app->formatter->asDate($model->time, 'MMM yyyy');
                 }
            ],
        ],
    ]); ?>


</div>
