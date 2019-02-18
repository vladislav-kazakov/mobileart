<?php

namespace frontend\controllers;

use common\models\Region;
use common\models\Site;
use common\models\Find;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
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
    public function actionRegion()
    {
        $regions = Region::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('region_list', ['regions' => $regions]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionRegionCreate()
    {
        $model = new Region();

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/region-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('region_create', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionRegionUpdate($id)
    {
        $model = Region::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('region_update', [
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
    public function actionRegionDelete($id)
    {
        $model = Region::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        if (empty($model->sites)) {
            $model->delete();
        } else {
            \Yii::$app->session->setFlash('error', 'Невозможно удалить данный регион, так как к нему привязаны памятники');
        }

        return $this->redirect(['manager/region']);
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

        $regions = Region::find()->all();
        $data = ArrayHelper::map($regions, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/site-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('site_create', [
            'model' => $model,
            'data' => $data,
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

        $regions = Region::find()->all();
        $data = ArrayHelper::map($regions, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {
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
            'data' => $data,
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

    /**
     * @return string
     */
    public function actionFind()
    {
        $finds = Find::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('find_list', ['finds' => $finds]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionFindCreate()
    {
        $model = new Find();

        $regions = Site::find()->all();
        $data = ArrayHelper::map($regions, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {

            if ($model->save()) {
                $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->redirect(['manager/find-update', 'id' => $model->id]);
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }

        return $this->render('find_create', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionFindUpdate($id)
    {
        $model = Find::find()->multilingual()->where(['id' => $id])->one();

        if (empty($model)) {
            throw new HttpException(500);
        }

        $regions = Site::find()->all();
        $data = ArrayHelper::map($regions, 'id', 'name');

        if ($model->load(\Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->save()) {
                $model->upload();
                \Yii::$app->session->setFlash('success', "Данные внесены");

                return $this->refresh();
            }

            \Yii::$app->session->setFlash('error', "Не удалось сохранить изменения<br>" . print_r($model->errors, true));
        }


        return $this->render('find_update', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws HttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionFindDelete($id)
    {
        $model = Find::findOne($id);

        if (empty($model)) {
            throw new HttpException(500);
        }

        $model->delete();

        return $this->redirect(['manager/find']);
    }
}
