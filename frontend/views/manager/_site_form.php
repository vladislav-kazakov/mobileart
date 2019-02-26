<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\Site;

/* @var $this yii\web\View */
/* @var $model common\models\Site */
/* @var $form ActiveForm */
?>
<div class="manager-_site_form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-xs-6">
            <?= $form->field($model, 'region_id')->dropDownList($data) ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'name_en')->textInput() ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'annotation')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'annotation_en')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'description')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="col-xs-6">
            <?= $form->field($model, 'description_en')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'publication')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="col-xs-6">
            <?= $form->field($model, 'publication_en')->widget(CKEditor::className(),
                [
                    'editorOptions' => [
                        'preset' => 'standard',
                        'inline' => false,
                    ],
                    'options' => [
                        'allowedContent' => true,
                    ],

                ]) ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'fileImage')->fileInput() ?>
        </div>
        <?php if (isset($model->id) and !empty($model->id)): ?>
            <div class="col-xs-6">
                <?= Html::img('/' . Site::DIR_IMAGE . '/' . $model->thumbnailImage, ['class' => 'img-responsive']) ?>
                <br>
            </div>
        <?php endif; ?>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <?= $form->field($model, 'x')->textInput(['id' => 'coord-x']) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'y')->textInput(['id' => 'coord-y']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- manager-_site_form -->