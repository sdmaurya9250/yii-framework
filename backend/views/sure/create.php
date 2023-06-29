<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Sure $model */

$this->title = 'Create Sure';
$this->params['breadcrumbs'][] = ['label' => 'Sures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
