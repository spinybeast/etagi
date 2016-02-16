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

    public function actionHouse()
    {
        return $this->render('index', [
            'exclusives' => Exclusives::findAll(['type' => Exclusives::HOUSE])
        ]);
    }

    public function actionFlat()
    {
        return $this->render('index', [
            'exclusives' => Exclusives::findAll(['type' => Exclusives::FLAT])
        ]);
    }

    public function actionRooms($count)
    {
        return $this->render('index', [
            'exclusives' => Exclusives::findAll(['rooms' => $count])
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
        if (($model = Exclusives::find()->with('properties')->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрошенная страница не найдена.');
        }
    }

}
