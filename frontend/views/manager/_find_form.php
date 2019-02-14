<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Find */
/* @var $form ActiveForm */
?>
<div class="manager-_find_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'x') ?>
        <?= $form->field($model, 'y') ?>
        <?= $form->field($model, 'annotation') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'publication') ?>
        <?= $form->field($model, 'image') ?>
        <?= $form->field($model, 'fileImage') ?>
        <?= $form->field($model, 'name_en') ?>
        <?= $form->field($model, 'annotation_en') ?>
        <?= $form->field($model, 'description_en') ?>
        <?= $form->field($model, 'publication_en') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- manager-_find_form -->
