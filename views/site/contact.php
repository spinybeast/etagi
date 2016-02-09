<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $managers app\models\Managers[] */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Наши специалисты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= Html::encode($this->title) ?><br/>
                <small>Рады работать с Вами.</small>
            </h1>
        </div>
    </div>
    <div class="managers">
        <?php if (!empty($managers)): ?>
            <?php foreach ($managers as $manager): ?>
                <div class="row">
                    <div class="col-xs-3">
                        <?= Html::img($manager->getThumbUploadUrl('photo'), ['class' => 'img-responsive img-thumbnail', 'alt' => $manager->name]) ?>
                    </div>
                    <div class="col-xs-9">
                        <h3 class="text-uppercase"><b><?= $manager->name ?></b></h3>
                        <br/>

                        <p>
                            <?= $manager->description ?>
                        </p>
                    </div>
                </div>
                <hr/>
            <?php endforeach; ?>
        <?php else: ?>
        <?php endif; ?>
    </div>
</div>
