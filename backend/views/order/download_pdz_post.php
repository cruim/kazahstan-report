<?php


use yii\grid\GridView;
use kartik\export\ExportMenu;
use backend\models\OrderItems;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Казахстан';

$this->params['breadcrumbs'][] = $this->title;


?>

<div class="order-index">
    <h1>ПДЗ Почта</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="width: 80%; margin: 0 auto; text-align: center;"><br>
        <?php $form = ActiveForm::begin(['id' => 'check', 'method' => 'GET',]) ?>
        <input type="hidden" value="1" name="check">

        <div class="form-group" style="float:left;" >
            <?= Html::submitButton('Ключевые показатели', ['class' => 'btn btn-primary', 'name' => 'check',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php $form1 = ActiveForm::begin(['id' => 'storage', 'method' => 'GET']); ?>
        <input type="hidden" value="2" name="storage" >

        <div class="form-group" style="float:left; margin-left: 5px;">
            <?= Html::submitButton('Работа склада', ['class' => 'btn btn-primary', 'name' => 'storage',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end();?>

        <?php $form1 = ActiveForm::begin(['id' => 'save_post', 'method' => 'GET']); ?>
        <input type="hidden" value="3" name="save_post" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('Работа спасения<br>(Почта)', ['class' => 'btn btn-primary', 'name' => 'save_post',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'pdz_post', 'method' => 'GET']); ?>
        <input type="hidden" value="4" name="pdz_post" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('ПДЗ(Почта)', ['class' => 'btn btn-primary', 'name' => 'pdz_post',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'download_storage', 'method' => 'GET']); ?>
        <input type="hidden" value="11" name="download_storage" >

        <div class="form-group" style="float:left;margin-left: 190px;">
            <?= Html::submitButton('Номера склад', ['class' => 'btn btn-primary', 'name' => 'download_storage',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'download_post_courier', 'method' => 'GET']); ?>
        <input type="hidden" value="10" name="download_post_courier" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('Номера спасения(Почта)', ['class' => 'btn btn-primary', 'name' => 'download_post_courier',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'download_pdz_post', 'method' => 'GET']); ?>
        <input type="hidden" value="8" name="download_pdz_post" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('Номера ПДЗ(Почта)', ['class' => 'btn btn-primary', 'name' => 'download_pdz_post',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>





        <?php $form1 = ActiveForm::begin(['id' => 'save_courier', 'method' => 'GET']); ?>
        <input type="hidden" value="6" name="save_courier" >

        <div class="form-group" style="float:left;margin-left: 380px;">
            <?= Html::submitButton('Работа спасения<br>(Курьеры)', ['class' => 'btn btn-primary', 'name' => 'save_courier',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'pdz_courier', 'method' => 'GET']); ?>
        <input type="hidden" value="5" name="pdz_courier" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('ПДЗ(Курьеры)', ['class' => 'btn btn-primary', 'name' => 'pdz_courier',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php $form1 = ActiveForm::begin(['id' => 'download_safe_courier', 'method' => 'GET']); ?>
        <input type="hidden" value="9" name="download_safe_courier" >

        <div class="form-group" style="float:left;margin-left: 380px;">
            <?= Html::submitButton('Номера спасение<br>(Курьеры)', ['class' => 'btn btn-primary', 'name' => 'download_safe_courier',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php $form1 = ActiveForm::begin(['id' => 'download_pdz_courier', 'method' => 'GET']); ?>
        <input type="hidden" value="7" name="download_pdz_courier" >

        <div class="form-group" style="float:left;margin-left: 5px;">
            <?= Html::submitButton('Номера ПДЗ(Курьеры)', ['class' => 'btn btn-primary', 'name' => 'download_pdz_courier',
                'style'=>"width:185px;height:60px;"]) ?>
        </div>
        <div style="clear:both;"></div>
        <?php ActiveForm::end(); ?>
    </div>

</div>


<?php
$gridColumns = [

    [
        'value' => 'order_t1',
        'header' => 'от 0 до 3 дней'
    ],
    [
        'value' => 'order_t2',
        'header' => 'от 4 до 7 дней'
    ],
    [
        'value' => 'order_t3',
        'header' => '8 дней и более'
    ],
    [
        'value' => 'order_delivery_data_name',
        'header' => 'Тип'
    ],
    [
        'header' => 'Статус',
        'value' => 'order_status_name'
    ]

];

echo ExportMenu::widget([
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '0'],
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);
?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
//        'filterModel' => $searchModel,

    'columns' => [
        [
            'value' => 'order_t1',
            'header' => 'от 0 до 3 дней'
        ],
        [
            'value' => 'order_t2',
            'header' => 'от 4 до 7 дней'
        ],
        [
            'value' => 'order_t3',
            'header' => '8 дней и более'
        ],
        [
            'value' => 'order_delivery_data_name',
            'header' => 'Тип'
        ],
        [
            'header' => 'Статус',
            'value' => 'order_status_name'
        ]
    ],

]); ?>
</div>
