<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css?201903111605', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner', ['bannerImages' => $bannerImages]) ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'Culture as a social and historical phenomenon determines all individual interpretations and dominates the development of symbolic communication, the ways of transferring information through a system of cultural signs and symbols, through language and writing in the later historic societies.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Ethnographic research shows that such elements as bunches of beads, necklaces, and bracelets as well as body art, scarification, tattooing, clothing etc. are considered by traditional societies members as means of personal identification, indicating the person’s position within the group or marking the boundaries between the groups and neighboring communities. Other functions of personal ornaments may include gender or age markers, determiners of kinship, prestige or social status or they may be used for information exchange, etc.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The general picture of the Siberian Paleolithic is a mosaic combination of stone knapping technologies, bone and antler treatment, as well as the amazing variety of anthropological materials representing various species including the genus Homo. Forms of modern symbolic behavior look rather stable in the archaeological context of the Early Upper Paleolithic of northern Eurasia between 40,000 and 50,000 years ago. This context is especially true for personal ornaments which constitute symbolic nominal systems.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'More than 50 archaeological sites dating back to the Initial and Early Upper Paleolithic have been studied in Mongolia, the Altai, the Cis-Baikal and Trans-Baikal, and Arctic Siberia. Today over 500 items made of bone, ivory, ostrich eggshell, seashells, and soft stone are represented in the Siberian and Far Eastern collections.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Fundamental changes are taking place in the stylistics, technology and artistic images of ancient art due to the widespread dissemination of new materials - clay, metals in the Neolithic, Bronze and early Iron Age. The social function of the art objects is expanding. New meanings, concepts and mythology ideas appear.') ?>
        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>

<?php if (isset(Yii::$app->params['viewMapOnHome']) and Yii::$app->params['viewMapOnHome']): ?>
    <?= $this->render('_map', ['regions' => $regions]) ?>
<?php else: ?>
    <img src="/img/region.png" alt="" class="img-responsive">
<?php endif; ?>
