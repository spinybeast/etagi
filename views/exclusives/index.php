<?php
/* @var $this yii\web\View */
/* @var $exclusives app\models\Exclusives[] */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;

$this->title = 'Эксклюзивные квартиры';
?>
<div class="container exclusives">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= Html::encode($this->title) ?><br/>
                <small>Только в нашей компании.</small>
            </h1>
        </div>
    </div>

    <?php if (!empty($exclusives)) {
        $rows = array_chunk($exclusives, 4);
        foreach ($rows as $exclusives) {
            echo Html::beginTag('div', ['class' => 'row']);
            foreach ($exclusives as $key => $item) { ?>
                <div class="col-md-3">
                    <div class="exclusives-item">
                        <div class="img">
                            <?php $images = [];
                            foreach ($item->getImages() as $img) {
                                $images[] = Html::img($img);
                            }
                            if (count($images) > 1) {
                                echo Carousel::widget([
                                    'items' => $images,
                                    'showIndicators' =>false,
                                    'options' => [
                                        'interval' => false,
                                        'pause' => true,
                                        'class' => 'slide',
                                    ]
                                ]);
                            } else {
                                echo current($images);
                            }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <h3 class="title">
                                <a href="<?= Url::to(['exclusives/view', 'id' => $item->id]) ?>"><?= $item->title ?></a>
                            </h3>

                            <p class="address"><?= $item->address ?></p>

                            <p class="text-right price"><?= number_format($item->price, 0, ' ', ' ') ?> руб.</p>

                            <div class="pull-left">
                                <a href="<?= Url::to(['exclusives/view', 'id' => $item->id]) ?>" class="btn btn-danger">Подробнее</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php echo Html::endTag('div');
        } ?>
    <?php } ?>
</div>
<?php $this->registerJs("$(document).ready(function() {
        $('.carousel').carousel({
            pause: true,
            interval: false
        });
    });") ?>