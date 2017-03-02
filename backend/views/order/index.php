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
    <h1>Казахстан</h1>
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
            'header' => '',
            'value' => "delivery-types_name",
        ],

        [
            'header' => 'Отказ от отправки',
            'value' => 'refusetosend'
        ],

        [
            'header' => 'Отказ от получения',
            'value' => 'refusetoreceive'
        ],
        [
            'header' => 'Посылка вернулась',
            'value' => 'parcelreturned'
        ],

        [
            'header' => 'Отправлять',
            'value' => 'send'
        ],

        [
            'header' => 'Приостановлен',
            'value' => 'stop'
        ],

        [
            'header' => 'Отправлен',
            'value' => 'sent'
        ],
        [
            'header' => 'Товар в точке получения',
            'value' => 'parcelonaplace'
        ],
        [
            'header' => 'Доставлять',
            'value' => 'problem'
        ],
        [
            'header' => 'Требует доработки оператора',
            'value' => 'injob'
        ],
        [
            'header' => 'Товар получен',
            'value' => 'delivered'
        ],
        [
            'header' => 'Деньги получены',
            'value' => 'paid'
        ],


        [
            'header' => 'Общий итог',
            'value' => function ($data){

                return ($data['refusetosend'] + $data['refusetoreceive'] + $data['parcelreturned'] +
                    $data['send'] + $data['stop'] + $data['sent'] +
                    $data['parcelonaplace'] + $data['problem'] + $data['injob'] + $data['delivered'] + $data['paid']);

            }
        ],
        [
            'header' => 'Доставляемость',
            'value' => function ($data){

                return ($data['delivered'] + $data['paid'])/($data['refusetosend'] + $data['refusetoreceive'] +
                    $data['parcelreturned'] +
                    $data['send'] + $data['stop'] + $data['sent'] +
                    $data['parcelonaplace'] + $data['problem'] + $data['injob'] + $data['delivered'] + $data['paid'])*100;

            }
        ],

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
        'rowOptions' => function ($data){
            if ($data["36"] == 'Итого' or $data["36"] == 'КАЗАХСТАН ноябрь 16' or $data["36"] == 'КАЗАХСТАН декабрь 16'
                or $data["36"] == 'КАЗАХСТАН январь 17' or $data["36"] == 'КАЗАХСТАН февраль 17')
                 {
                return ['style' => 'background-color:#2EFEF7;'];}

            
        },
//        'filterModel' => $searchModel,

        'columns' => [
            //['class' => 'yii\grid\SerialColumn','contentOptions' => ['style' => 'width:100px;']],
            [
                'header' => '',
                'value' => "36",
            ],

            [
                'header' => 'Отказ от отправки',
                'value' => 'refusetosend',
                'contentOptions' => function ($data){
                if($data["36"] != 1)
                {$class = 'style';}

                    return [$class => 'background-color:#FA5882;'];}
            ],

            [
                'header' => 'Отказ от получения',
                'value' => 'refusetoreceive',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#FA5882;'];}
            ],
            [
                'header' => 'Посылка вернулась',
                'value' => 'parcelreturned',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#FA5882;'];}
            ],

            [
                'header' => 'Отправлять',
                'value' => 'send',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#F3F781;'];}
            ],

            [
                'header' => 'Приостановлен',
                'value' => 'stop',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#F3F781;'];}
            ],

            [
                'header' => 'Отправлен',
                'value' => 'sent'
            ],
            [
                'header' => 'Товар в точке получения',
                'value' => 'parcelonaplace'
            ],
            [
                'header' => 'Доставлять',
                'value' => 'problem'
            ],
            [
                'header' => 'Требует доработки оператора',
                'value' => 'injob'
            ],
            [
                'header' => 'Товар получен',
                'value' => 'delivered',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#BEF781;'];}
            ],
            [
                'header' => 'Деньги получены',
                'value' => 'paid',
                'contentOptions' => function ($data){
                    if($data["36"] != 1)
                    {$class = 'style';}

                    return [$class => 'background-color:#BEF781;'];}
            ],


            [
                'header' => 'Общий итог',
                'value' => function ($data){

                            return ($data['refusetosend'] + $data['refusetoreceive'] + $data['parcelreturned'] +
                     $data['send'] + $data['stop'] + $data['sent'] +
                     $data['parcelonaplace'] + $data['problem'] + $data['injob'] + $data['delivered'] + $data['paid']);

                        }
            ],
            [
                'header' => 'Доставляемость',
                'value' => function ($data){

                    return round(($data['delivered'] + $data['paid'])/($data['refusetosend'] + $data['refusetoreceive'] +
                        $data['parcelreturned'] +
                        $data['send'] + $data['stop'] + $data['sent'] +
                        $data['parcelonaplace'] + $data['problem'] + $data['injob'] + $data['delivered'] + $data['paid'])*100,2)
                        . '%';

                }
            ],
        ],

    ]); ?>
</div>
