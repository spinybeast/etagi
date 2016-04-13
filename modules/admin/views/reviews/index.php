<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'label' => 'Автор',
                'value' => 'author'
            ],
            [
                'label' => 'Отзыв',
                'value' => 'text',
                'format' => 'ntext'
            ],
            [
                'label' => 'Опубликован',
                'value' => function($data){return $data->published ? 'Да' : 'Нет';},
                'format' => 'ntext'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
