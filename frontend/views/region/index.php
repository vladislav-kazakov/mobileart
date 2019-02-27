<?php

/* @var $this yii\web\View */

/* @var $region \common\models\Site */

use yii\helpers\Html;
use common\models\Site;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Regions');

$this->params['breadcrumbs'] = [
    $this->title,
];

$this->registerCssFile('css/region.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($regions)): ?>
    <div class="list-group">
        <?php foreach ($regions as $region): ?>
            <a class="list-group-item region" href="<?= Url::to(['region/view', 'id' => $region->id]) ?>" id="region-<?= $region->id ?>">
                <?= $region->name ?>
                <span class="badge"><?= Yii::t('app', 'number of sites {n}', ['n' => count($region->sites)])?></span>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (isset(Yii::$app->params['viewMapOnHome']) and Yii::$app->params['viewMapOnHome']): ?>
    <?= $this->render('_map', ['regions' => $regions]) ?>
<?php else: ?>
    <img src="/img/region.png" alt="" class="img-responsive">
<?php endif; ?>