<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container service-view">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= Html::encode($this->title) ?><br/>
            </h1>
        </div>
    </div>

    <div class="etagi-services">

        <?php if (!empty($model)) {
            echo Html::tag('div', $model->text, ['class' => 'text']);
        } else { ?>
            <div class="text-center">
                Страница находится на оформлении
            </div>
        <?php } ?>
    </div>
    <p>
        <br/><br/>
    </p>

</div>
