<?php
/* @var $this yii\web\View */
/* @var $model app\models\Exclusives */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
?>
<div class="container exclusive">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= $this->title ?><br/>
            </h1>
        </div>
    </div>
    <div class="item">
        <div class="col-md-7">
            <table class="table table-responsive">
                <?php foreach ($model->properties as $property) {?>
                    <tr>
                        <th><?= $property->name ?></th>
                        <td><?= $property->value ?></td>
                    </tr>
                <?php }?>
            </table>
            <h3 class="text-uppercase">Описание квартиры</h3>
            <br/>
            <div class="description">
                <?= $model->description ?>
            </div>
        </div>
        <div class="col-md-5">
            <p class="phone"><b>Телефон:</b> <?= $model->phone ?></p>
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x550" alt="">
            </a>
            <p class="text-right price"><?= number_format($model->price, 0, ' ', ' ') ?> руб.</p>
        </div>
    </div>
</div>