<?php

/* @var $this yii\web\View */


$this->registerCssFile('css/home.css', ['depends' => ['yii\bootstrap\BootstrapPluginAsset']]);

$this->title = Yii::$app->name;
?>

<?= $this->render('_banner') ?>

<div class="row">
    <div class="col-xs-12">
        <p>
            <?= Yii::t('home', 'Culture as a social and historical phenomenon determines all individual interpretations and dominates the development of symbolic communication, the ways of communicating information through a system of cultural signs and symbols, through language and writing by Historic societies.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'Ethnographic research shows that such features as bundles of beads, necklaces, and bracelets as well as body art, scarification, tattooing, clothing and hairstyles are perceived by members of traditional societies as means of personal identification, indicating a person’s position within the group or marking the boundaries between the groups and neighboring communities. Other functions of personal ornaments may include gender or age markers, determiners of kinship, prestige or social status or they may be used for information exchange, etc.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The general picture of the Initial and Early Upper Paleolithic in Siberia is a mosaic combination of stone reduction technologies, bone and antler processing, as well as an amazing variety of fossil materials representing various species within the genus Homo. Forms of modern symbolic behavior look rather stable in the archaeological context of the Early Upper Paleolithic of northern Eurasia between 40,000-50,000 years ago. This is especially true of personal ornaments, which constitute symbolic nominal systems.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'The specific features of the Middle to Upper Paleolithic transition in southern Siberia include prolonged survival of Middle Paleolithic forms and convergence with the appearance and evolution of Aurignac-style elements. Forms, raw material, technologies, and types of personal ornaments in Siberian collections are not limited chronologically to the Initial and Early Upper Paleolithic.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'More than 50 archaeological sites dating back to the Initial and Early Upper Paleolithic have been studied in Mongolia, the Altai, the Cis-Baikal and Trans-Baikal, and Arctic Siberia.') ?>
        </p>
        <p>
            <?= Yii::t('home', 'A large collection of personal ornaments was acquired from more than 20 Siberian archaeological sites. Today over 300 objects made of bone, ivory, ostrich eggshell, seashells, and soft stone are present. These complexes date back to 25,000 – 30,000 to 40,000 – 50,000 years BP.') ?>

        </p>
    </div>

    <div class="clearfix"></div>
    <br>
</div>

<?php if (isset($sites) and !empty($sites)): ?>
    <?= $this->render('_map', ['sites' => $sites]) ?>
<?php endif; ?>
