<?php

namespace app\controllers;

use Yii;
use app\models\Exclusives;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

class ExclusivesController extends Controller
{

    public function actionIndex()
    {
        Yii::$app->session->removeFlash('activeButton');
        $query = Exclusives::find();
        list($pages, $exclusives) = $this->findModels($query);

        return $this->render('index', [
            'exclusives' => $exclusives,
            'pages' => $pages,
        ]);
    }

    public function actionHouse()
    {
        Yii::$app->session->setFlash('activeButton', 'house');
        $query = Exclusives::find()->where(['type' => Exclusives::HOUSE]);
        list($pages, $exclusives) = $this->findModels($query);

        return $this->render('index', [
            'exclusives' => $exclusives,
            'pages' => $pages,

        ]);
    }

    public function actionFlat()
    {
        Yii::$app->session->setFlash('activeButton', 'flat');
        $query = Exclusives::find()->where(['type' => Exclusives::FLAT]);
        list($pages, $exclusives) = $this->findModels($query);

        return $this->render('index', [
            'exclusives' => $exclusives,
            'pages' => $pages,

        ]);
    }

    public function actionRooms($count)
    {
        Yii::$app->session->setFlash('activeButton', 'rooms' . $count);
        $query = Exclusives::find()->where(['rooms' => $count]);
        list($pages, $exclusives) = $this->findModels($query);

        return $this->render('index', [
            'exclusives' => $exclusives,
            'pages' => $pages,

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

    /**
     * @param $query
     * @return array
     */
    private function findModels($query)
    {
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
        $exclusives = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return array($pages, $exclusives);
    }

}
