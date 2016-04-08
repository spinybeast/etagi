<?php
/**
 * Created by PhpStorm.
 * User: spiny
 * Date: 07.04.16
 * Time: 16:38
 */

namespace app\controllers;

use Yii;
use app\models\Services;
use app\models\ServiceCategories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ServicesController extends Controller
{
    public function actionIndex()
    {
        Yii::$app->session->removeFlash('activeButton');
        $categories = ServiceCategories::find()->with('services')->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Services::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрошенная страница не найдена.');
        }
    }
}