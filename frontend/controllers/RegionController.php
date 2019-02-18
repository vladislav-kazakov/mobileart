<?php
namespace frontend\controllers;

use common\models\Region;
use yii\web\Controller;

/**
 * Class RegionController
 * @package frontend\controllers
 */
class RegionController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $regions = Region::find()->all();

        return $this->render('index', [
            'regions' => $regions,
        ]);
    }

    public function actionView($id)
    {
        $region = Region::findOne($id);

        if (empty($region)) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'region' => $region,
        ]);
    }
}
