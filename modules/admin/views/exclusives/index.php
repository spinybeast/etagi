<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exclusives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exclusives-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Exclusives', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'price',
            'typeName',
            'rooms',
            'address',
            'description:html',
            'agent',
            'phone',
            'lot_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
