<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exclusives */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Exclusives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exclusives-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'typeName',
            'rooms',
            'price',
            'address',
            'description:html',
            'agent',
            'phone',
            'lot_number',
            'rawProperties:html'
        ],
    ]) ?>

</div>
