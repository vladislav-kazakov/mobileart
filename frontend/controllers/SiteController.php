<?php
namespace frontend\controllers;

use common\models\Site;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Class SiteController
 * @package frontend\controllers
 */
class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $sites = Site::find()->all();

        return $this->render('index', [
            'sites' => $sites,
        ]);
    }

    public function actionView($id)
    {
        $site = Site::findOne($id);

        if (empty($site)) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'site' => $site,
        ]);
    }
}
