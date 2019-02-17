<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\Region */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\News;
use mihaildev\ckeditor\CKEditor;

$this->title = 'Добавление региона';
$this->params['breadcrumbs'] = [
    ['label' => 'Управление контентом', 'url' => ['/manager/index']],
    ['label' => 'Регионы', 'url' => ['/manager/region']],
    $this->title,
];


$script = <<< JS


    $(document).ready(function () {
        var pointW = 30,
            pointH = 30;

        $('#wrap-map').click(function (e) {
            $('.point').remove();
            var posX = $(this).offset().left,
                posY = $(this).offset().top,
                left = e.pageX - posX - pointW / 2,
                top = e.pageY - posY - pointH / 2;
            $(this).append($('<div class="point"></div>').css('left', left).css('top', top));
            $('#coord-x').val(left / $(this).width());
            $('#coord-y').val(top / $(this).height());
            return false;
        });
    })   

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_region_form', ['model' => $model]) ?>


<div class="form-group">
    <div id="wrap-map">
        <img src="/img/map.jpg" alt="map" class="img-responsive" id="map">
    </div>
</div>

<style>
    #wrap-map {
        position: relative;
        display: inline-block;
    }

    .point {
        position: absolute;
        width: 30px;
        height: 30px;
        background: url(/img/marker-region.png);
    }
</style>
