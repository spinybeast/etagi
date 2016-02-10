<?php
/* @var $this yii\web\View */
/* @var $model app\models\Exclusives */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;

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
            <?php if (!empty($model->address)) {?>
                <p class="address"><b>Адрес:</b> <?= $model->address ?></p>
            <?php } ?>
            <?php if (!empty($model->properties)) {?>
                <table class="table table-responsive">
                    <?php foreach ($model->properties as $property) {?>
                        <tr>
                            <th><?= $property->name ?></th>
                            <td><?= $property->value ?></td>
                        </tr>
                    <?php }?>
                </table>
            <?php } ?>
            <h3 class="text-uppercase">Описание квартиры</h3>
            <br/>
            <div class="description">
                <?= $model->description ?>
            </div>
        </div>
        <div class="col-md-5">
            <p class="phone"><b>Телефон:</b> <?= $model->phone ?></p>
            <a href="#">
                <?php
                $images = [];
                foreach ($model->getImages() as $img) {
                    $images[] = Html::img($img);
                }
                echo Carousel::widget([
                    'items' => $images,
                    'options' => [
                        'interval' => 2000,
                        'class' => 'slide',
                    ]
                ]);
                    ?>
            </a>
            <p class="text-right price"><?= number_format($model->price, 0, ' ', ' ') ?> руб.</p>
        </div>
    </div>
</div>