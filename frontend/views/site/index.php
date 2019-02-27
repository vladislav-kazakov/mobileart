<?php

/* @var $this yii\web\View */

/* @var $site \common\models\Site */

use yii\helpers\Html;
use common\models\Site;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Sites');

$this->params['breadcrumbs'] = [
    $this->title,
];

$script = <<< JS

$(document).ready(function () {
    var container = $('.sites');

    container.imagesLoaded(function () {
        container.masonry();
    });
});

JS;

$this->registerCssFile('css/site.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/imagesloaded.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($sites)): ?>
    <div class="sites row">
        <?php foreach ($sites as $site): ?>
            <div class="col-xs-12 col-sm-6">
                <a href="<?= Url::to(['site/view', 'id' => $site->id]) ?>" class="site-item">
                        <div class="row">
                            <?= Html::img(Site::SRC_IMAGE . '/' . $site->thumbnailImage, ['class' => 'img-responsive']) ?>
                        </div>
                        <h3>
                            <?= $site->name ?>
                        </h3>
                        <?= $site->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
