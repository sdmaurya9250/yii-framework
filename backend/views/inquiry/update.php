<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Inquiry $model */

$this->title = 'Update Inquiry: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Inquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inquiry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
