<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Site;

$this->title = $site->name;

$this->registerCssFile('css/site.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>


<h1><?= Html::encode($site->name) ?></h1>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <?= Html::img('/' . Site::DIR_IMAGE . '/' . $site->image, ['class' => 'img-responsive']) ?>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php if (Yii::$app->user->can('manager')): ?>
            <?= Html::a(Yii::t('app', 'Edit'), ['manager/site-update', 'id' => $site->id], ['class' => 'btn btn-primary pull-right']) ?>
        <?php endif; ?>
        <?= $site->description ?>
    </div>
</div>

<?php if (!empty($finds)): ?>
    <?php foreach ($finds as $find): ?>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <a href="<?= Url::to(['find/view', 'id' => $find->id]) ?>" class="find-item">
                <div class="row">
                    <?= Html::img('/' . Site::DIR_IMAGE . '/' . $find->image, ['class' => 'img-responsive']) ?>
                </div>
                <h3>
                    <?= $find->name ?>
                </h3>
                <?= $find->annotation ?>
            </a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($site->description)): ?>
    <h3><?= Yii::t('site', 'Publications') ?></h3>
    <?= $site->description ?>
<?php endif; ?>
