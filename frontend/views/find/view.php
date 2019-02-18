<?php

/* @var $this yii\web\View */

/* @var $find Find */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Find;
use yii\bootstrap\Tabs;

$this->title = $find->name;

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Regions'), 'url' => ['region/index']],
    ['label' => $find->site->region->name, 'url' => ['region/view', 'id' => $find->site->region->id]],
    ['label' => $find->site->name, 'url' => ['site/view', 'id' => $find->site->id]],
    $this->title,
];

$this->registerCssFile('css/find.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$tabs = [];

if (!empty($find->technique)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Manufacturing technique'),
        'content' => $this->render('_find_tab', ['content' => $find->technique]),
    ];
}

if (!empty($find->traces_disposal)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Traces of disposal'),
        'content' => $this->render('_find_tab', ['content' => $find->traces_disposal]),
    ];
}

if (!empty($find->storage_location)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Storage location'),
        'content' => $this->render('_find_tab', ['content' => $find->storage_location]),
    ];
}

if (!empty($find->inventory_number)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Inventory number'),
        'content' => $this->render('_find_tab', ['content' => $find->inventory_number]),
    ];
}

if (!empty($find->museum_kamis)) {
    $tabs[] = [
        'label' => Yii::t('find', 'The Museum KAMIS'),
        'content' => $this->render('_find_tab', ['content' => $find->museum_kamis]),
    ];
}

if (!empty($find->size)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Size'),
        'content' => $this->render('_find_tab', ['content' => $find->size]),
    ];
}

if (!empty($find->material)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Material'),
        'content' => $this->render('_find_tab', ['content' => $find->material]),
    ];
}

if (!empty($find->dating)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Dating'),
        'content' => $this->render('_find_tab', ['content' => $find->dating]),
    ];
}

if (!empty($find->culture)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Culture'),
        'content' => $this->render('_find_tab', ['content' => $find->culture]),
    ];
}

if (!empty($find->author_excavation)) {
    $tabs[] = [
        'label' => Yii::t('find', 'The author of the excavations'),
        'content' => $this->render('_find_tab', ['content' => $find->author_excavation . (!empty($find->year) ? '<br>' . $find->year : null)]),
    ];
}

if (!empty($find->link)) {
    $tabs[] = [
        'label' => Yii::t('find', 'Links'),
        'content' => $this->render('_find_tab', ['content' => $find->link]),
    ];
}

?>

    <?php if (empty($find->image)): ?>
        <div class="col-xs-12">
            <div class="row">
            <?php if (Yii::$app->user->can('manager')): ?>
                <?= Html::a(Yii::t('app', 'Edit'), ['manager/find-update', 'id' => $find->id], ['class' => 'btn btn-primary pull-right']) ?>
            <?php endif; ?>
            <h1><?= Html::encode($find->name) ?></h1>
            <?= $find->description ?>
        </div>
        </div>
    <?php else: ?>
        <div class="col-xs-12 col-sm-6">
            <?= Html::img('/' . Find::DIR_IMAGE . '/' . $find->image, ['class' => 'img-responsive']) ?>
            <br>
        </div>
<!--        <div class="col-xs-12 col-sm-6">-->
            <?php if (Yii::$app->user->can('manager')): ?>
                <?= Html::a(Yii::t('app', 'Edit'), ['manager/find-update', 'id' => $find->id], ['class' => 'btn btn-primary pull-right']) ?>
            <?php endif; ?>

            <h1><?= Html::encode($find->name) ?></h1>

            <?= $find->description ?>

<!--            --><?php //if (!empty($find->technique)): ?>
<!--                <b>--><?//= Yii::t('find', 'Manufacturing technique') ?><!--</b>-->
<!--                --><?//= $find->technique ?>
<!--            --><?php //endif; ?>

<!--            --><?php //if (!empty($find->traces_disposal)): ?>
<!--                <b>--><?//= Yii::t('find', 'Traces of disposal') ?><!--</b>-->
<!--                --><?//= $find->traces_disposal ?>
<!--            --><?php //endif; ?>
<!--        </div>-->
    <?php endif; ?>

<div class="clearfix"></div>

<br>

<?php if (!empty($tabs)): ?>
    <?= Tabs::widget(['items' => $tabs]) ?>
<?php endif; ?>
