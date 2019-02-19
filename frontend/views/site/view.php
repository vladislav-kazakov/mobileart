<?php

/* @var $this yii\web\View */

/* @var $site Site */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Site;
use common\models\Find;

$this->title = $site->name;

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Regions'), 'url' => ['region/index']],
    ['label' => $site->region->name, 'url' => ['region/view', 'id' => $site->region->id]],
    $this->title,
];


$script = <<< JS

$(document).ready(function() {
    $('.collection').masonry();
})

JS;

$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
$this->registerCssFile('css/site.css?201902191707', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>


<?php if (empty($site->image)): ?>
    <?php if (Yii::$app->user->can('manager')): ?>
        <?= Html::a(Yii::t('app', 'Edit'), ['manager/site-update', 'id' => $site->id], ['class' => 'btn btn-primary pull-right']) ?>
    <?php endif; ?>
    <h1><?= Html::encode($site->name) ?></h1>
    <?= $site->description ?>
<?php else: ?>
    <div class="pull-left poster">
        <?= Html::img('/' . Site::DIR_IMAGE . '/' . $site->image, ['class' => 'img-responsive']) ?>
    </div>
    <?php if (Yii::$app->user->can('manager')): ?>
        <?= Html::a(Yii::t('app', 'Edit'), ['manager/site-update', 'id' => $site->id], ['class' => 'btn btn-primary pull-right']) ?>
    <?php endif; ?>
    <h1><?= Html::encode($site->name) ?></h1>
    <?= $site->description ?>
<?php endif; ?>

<?php if (!empty($site->finds)): ?>
    <h2><?= Yii::t('app', 'Collection') ?></h2>
    <div class="row collection">
        <?php foreach ($site->finds as $find): ?>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <a href="<?= Url::to(['find/view', 'id' => $find->id]) ?>" class="find-item">
                    <?php if (!empty($find->image)): ?>
                        <div class="row">
                            <?= Html::img('/' . Find::DIR_IMAGE . '/' . $find->image, ['class' => 'img-responsive']) ?>
                        </div>
                    <?php endif; ?>
                    <h4>
                        <?= $find->name ?>
                    </h4>
                    <?= $find->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($site->publication)): ?>
    <h3><?= Yii::t('app', 'Publications') ?></h3>
    <?= $site->publication ?>
<?php endif; ?>
