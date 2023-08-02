<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="video-form">

    <?php
        //  $token = Yii::$app->request->getCsrfToken();
    ?>

    <?php $form = ActiveForm::begin([
    'id' => 'my-form',
]);
 ?>

    <?= $form->field($model, 'video_id')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'check')->checkbox(['label' => 'Custom Label', 'class' => 'custom-class']); ?>
    <div class="form-group">
        <?=Html::submitButton('Submit', ['class' => 'btn btn-primary', 'id' => 'submit-button']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
//  $this->registerJs("
//     $('#my-form').on('beforeSubmit', function () {
//         $('#submit-button').attr('disabled', true); // Disable the submit button
//         $('#submit-button').html('Submitting...'); // Update button text to indicate loading
//     });
// ");
 ?>



<script>
// This code is working
//     $(document).ready(function() {
//   $('#submit-button').click(function() {
//     var $btn = $(this);
//     if (!$btn.hasClass('disabled')) {
//       $btn.addClass('disabled');
//       $btn.attr('disabled', 'disabled');
//       $btn.val('Submitting...');
//       $('form').submit();
//     }
//   });
// });

// Try next things

$(document).ready(function() {
  $('#my-form').on('submit', function() {
    if ($(this).data('submitted')) {
      return false; // Prevent multiple submissions
    }
    $(this).data('submitted', true);
    $('input[type="submit"]').val('Submitting...').prop('disabled', true);
  });
});


</script>