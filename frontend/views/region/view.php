<?php

/* @var $this yii\web\View */

/* @var $region Region */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Region;
use common\models\Site;

$this->title = $region->name;

$this->params['breadcrumbs'] = [
    ['label' => Yii::t('app', 'Regions'), 'url' => ['region/index']],
    $this->title,
];

$this->registerCssFile('css/region.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>


<h1><?= Html::encode($region->name) ?></h1>

<?php if (Yii::$app->user->can('manager')): ?>
    <?= Html::a(Yii::t('app', 'Edit'), ['manager/region-update', 'id' => $region->id], ['class' => 'btn btn-primary pull-right']) ?>
<?php endif; ?>

<?= $region->annotation ?>

<?php if (!empty($region->sites)): ?>
    <h2><?= Yii::t('region', 'Sites') ?></h2>
    <div class="row">
        <?php foreach ($region->sites as $site): ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="<?= Url::to(['site/view', 'id' => $site->id]) ?>" class="site-item">
                    <?php if (!empty($site->image)): ?>
                        <div class="row">
                            <?= Html::img('/' . Site::DIR_IMAGE . '/' . $site->image, ['class' => 'img-responsive']) ?>
                        </div>
                    <?php endif; ?>
                    <h3>
                        <?= $site->name ?>
                    </h3>
                    <?= $site->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>
