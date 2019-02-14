<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\CalendarEvent;
use common\models\Document;
use common\models\Internship;
use common\models\Map;
use common\models\MediaReport;
use common\models\MediaReportImage;
use common\models\Site;
use common\models\News;
use common\models\Partner;
use common\models\University;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\UploadedFile;

/**
 * Manager controller
 */
class ManagerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['manager'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionSite()
    {
        $sites = Site::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('site_list', ['sites' => $sites]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionSiteCreate()
    {
        $model = new Site();

        if ($model->load(\Yii::$app->request->post()) and $model->validate()) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->save() and $model->upload()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/site-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('site_create', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionSiteUpdate($id)
    {
        $model = Site::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        if ($model->load(\Yii::$app->request->post()) and $model->validate()) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->save()) {
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('site_update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionSiteDelete($id)
    {
        $model = Site::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $model->delete();

        return $this->redirect(['manager/site']);
    }
}
