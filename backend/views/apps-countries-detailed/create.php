<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AppsCountriesDetailed $model */

$this->title = 'Create Apps Countries Detailed';
$this->params['breadcrumbs'][] = ['label' => 'Apps Countries Detaileds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apps-countries-detailed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
