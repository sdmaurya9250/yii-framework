<?php

use common\models\Projects;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

<?php
Projects::initialize();

// Access the concatenated value
echo Projects::$total[Projects::xyz]; 
// echo Projects::$total[1];
// $d =new  Projects;
// echo Projects::$total[Projects::xyz];
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Send EMail', ['#'], ['class' => 'btn btn-success','id' => 'send-email-form']) ?>
    </p>
    <?php
    // echo '<pre>';
    //     print_r($model);
    // die;

    ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

   <?= Html::a('Send', ['#'], ['class' => 'btn btn-success']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\Checkbox'],
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                // 'format' => 'raw',
                // 'content' => function ($model, $key, $index, $column) {
                //     return Html::checkbox($column->id, false, [
                //         'value' => $key,
                //         'disabled' => true,
                //     ]);
                // },
            ],
            

            'id',
            'customer_contact',
            'customer_address',
            'uniqueid',
            'project_name',
            // 'title',
            [
                'attribute' => 'posts',
                'value' => 'title'
            ],
            [
             'attribute' => 'created_at',
            'format' => ['date', 'php:d/m/Y'], // Change the format here
            ]
            // 'created_at'
            // JOinin tables Start
            // 'epics.title',
            // JOinin tables Ending



            //'attachement',
            //'desc',
            //'notes',
            //'history',
            //'created_at',
            //'updated_at',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Projects $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
<?php
$this->registerJs('
    $(document).on("click", "#send-email-btn", function() {
        alert(1221)

    });
        ');
        ?>
<!-- 
<script>
    $(document).ready(function() {
    // Handle the click event of the send button
    $('#send-email-btn').click(function() {
        // Get the selected rows
        alert('dsffd')
        // var selectedRows = $('#w0').yiiGridView('getSelectedRows');

        // Send the Ajax request
        // $.ajax({
        //     url: 'index.php?r=site/send-email',
        //     type: 'post',
        //     dataType: 'json',
        //     data: {selectedRows: selectedRows},
        //     success: function(response) {
        //         if (response.success) {
        //             alert('Email sent successfully.');
        //         } else {
        //             alert('Failed to send email.');
        //         }
        //     },
        //     error: function() {
        //         alert('An error occurred while sending the email.');
        //     }
        // });
    });
});

</script> -->