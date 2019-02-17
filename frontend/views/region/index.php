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

$script = <<< JS

$(document).ready(function() {
    $('.regions').masonry();
})

JS;

$this->registerCssFile('css/region.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);
$this->registerJs($script, yii\web\View::POS_READY);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (!empty($regions)): ?>
    <div class="regions row">
        <?php foreach ($regions as $region): ?>
            <div class="col-xs-12 col-sm-6">
                <a href="<?= Url::to(['region/view', 'id' => $region->id]) ?>" class="region-item">
                        <h3>
                            <?= $region->name ?>
                        </h3>
                        <?= $region->annotation ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
