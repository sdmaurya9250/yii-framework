<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AppsCountriesDetailed $model */

$this->title = 'Update Apps Countries Detailed: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apps Countries Detaileds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apps-countries-detailed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
