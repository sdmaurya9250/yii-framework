<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Inquiry $model */

$this->title = 'Create Inquiry';
$this->params['breadcrumbs'][] = ['label' => 'Inquiries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inquiry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
