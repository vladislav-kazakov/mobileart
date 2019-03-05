<?php/** * @var $bannerImage common\models\BannerImage */use yii\helpers\Html;use kv4nt\owlcarousel\OwlCarouselWidget;use common\models\BannerImage;?></div><div class="banner">    <div class="container">        <div class="row">            <div class="col-xs-12 col-sm-6">                <div class="plate">                    <h1><?= Yii::t('home', 'Prehistoric art of Siberia and Far East') ?></h1>                    <p>                        <?= Yii::t('app', 'Information System of Mobile Art. Stone Age') ?>                    </p>                </div>            </div>            <div class="col-xs-12 col-sm-6">                <?php if (!empty($bannerImages)): ?>                    <div id="list-banner-image">                        <?php OwlCarouselWidget::begin([                            'container' => 'div',                            'containerOptions' => [                                'id' => 'container-banner-image-id',                                'class' => 'owl-carousel'                            ],                            'pluginOptions' => [                                'items' => 1,                                'loop' => true,                                'margin' => 10,                                'autoplay' => true,                                'autoplayTimeout' => 4500,                            ]                        ]); ?>                        <?php                        $j = 0;                        ?>                        <?php foreach ($bannerImages as $bannerImage): ?>                            <div class="item">                                <?= Html::img(BannerImage::SRC_IMAGE . '/' . $bannerImage->thumbnailImage, ['class' => 'img-responsive']) ?>                            </div>                        <?php endforeach; ?>                        <?php OwlCarouselWidget::end(); ?>                    </div>                <?php endif; ?>            </div>        </div>    </div></div><div class="container">