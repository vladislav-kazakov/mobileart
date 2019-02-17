<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Region */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Редактирование региона';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Регионы', 'url' => ['/manager/region']],
    $this->title,
];

$coord = '';

if (is_numeric($model->x) and is_numeric($model->y)) {
    $coord = 'var x = ' . $model->x . ', y = ' . $model->y . ';';
}

$script = <<< JS


    $(document).ready(function () {
        $coord
        var map = $('#wrap-map'),
            pointW = 30,
            pointH = 30;
        
        map.css('max-width', map.children().width());
        drawPoint(map, x, y);
        
        map.click(function (e) {              
            var posX = $(this).offset().left,
                posY = $(this).offset().top;
            x = (e.pageX - posX - pointW / 2) / $(this).width(),
            y = (e.pageY - posY - pointH / 2) / $(this).height();
            
            $('#coord-x').val(x);
            $('#coord-y').val(y);
                      
            $('.point').remove();
            
            drawPoint($(this), x, y);
            
            return false;
        });
        
        function drawPoint(map, x, y) {
            if (map && x && y) {
                map.append($('<div class="point"></div>').css('left', map.width() * x).css('top', map.height() * y));
                return {'w': map.width() * x, 'h': map.height() * y};
            }   
            return false;
        }
        
        $(window).resize(function () {
            $('.point').remove();
            drawPoint(map, x, y);
        });
        
        $(function () {
        })
        
        // todo: z-index hover
        
    });  

JS;

$this->registerJs($script, yii\web\View::POS_READY);


?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="clearfix">
        <?= Html::a('Просмотр', ['region/view', 'id' => $model->id]) ?>
        <div class="pull-right">
            <?= Html::a('Удалить', [
                'manager/region-delete',
                'id' => $model->id
            ], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <br>

    <?= $this->render('_region_form', ['model' => $model]) ?>
</div>

<div class="form-group">
    <div id="wrap-map">
        <img src="/img/map.jpg" alt="map" class="img-responsive" id="map">
    </div>
</div>

<style>
    #wrap-map {
        position: relative;
    }

    .point {
        position: absolute;
        width: 30px;
        height: 30px;
        background: url(/img/marker-region.png);
    }
</style>