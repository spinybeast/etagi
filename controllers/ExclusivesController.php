<?php

namespace app\controllers;

use Yii;
use app\models\Exclusives;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class ExclusivesController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', [
            'exclusives' => Exclusives::find()->all()
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Exclusives model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exclusives the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exclusives::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрошенная страница не найдена.');
        }
    }

}
