<?php
/* @var $this yii\web\View */
/* @var $model app\models\Exclusives */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;
sersid\owlcarousel\Asset::register($this);
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
            <?php if (!empty($model->rooms)) { ?>
                <p class="rooms"><b>Количество комнат:</b> <?= $model->rooms ?></p>
            <?php } ?>

            <?php if (!empty($model->address)) { ?>
                <p class="address"><b>Адрес:</b> <?= $model->address ?></p>
            <?php } ?>
            <?php if (!empty($model->properties)) { ?>
                <h3 class="text-uppercase header-exs">Характеристики</h3>
                <table class="table table-responsive">
                    <?php foreach ($model->properties as $property) { ?>
                        <tr>
                            <th><?= $property->name ?></th>
                            <td><?= $property->value ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
            <h3 class="text-uppercase header-exs">Описание</h3>
            <br/>

            <div class="description">
                <?= $model->description ?>
            </div>
        </div>
        <div class="col-md-5">
            <p class="phone"><b>Телефон:</b> <?= $model->phone ?></p>
                <?php
                echo newerton\fancybox\FancyBox::widget([
                    'target' => 'a[rel=fancybox' . $model->id . ']',
                    'helpers' => true,
                    'mouse' => true,
                    'config' => [
                        'maxWidth' => '100%',
                        'maxHeight' => '100%',
                        'playSpeed' => 3000,
                        'padding' => 0,
                        'fitToView' => true,
                        'width' => '100%',
                        'height' => '100%',
                        'closeEffect' => 'elastic',
                        'prevEffect' => 'elastic',
                        'nextEffect' => 'elastic',
                        'closeBtn' => false,
                        'openOpacity' => true,
                        'helpers' => [
                            'buttons' => [],
                            'overlay' => [
                                'css' => [
                                    'background' => 'rgba(0, 0, 0, 0.8)'
                                ]
                            ]
                        ],
                    ]
                ]);
                $images = $model->getImages();
                echo Html::beginTag('div', ['class' => 'carousel']);
                foreach ($images as $image) {
                    echo Html::a(Html::img($image, ['class' => 'img-responsive']), $image, ['rel' => 'fancybox' . $model->id]);
                }
                echo Html::endTag('div');
                ?>

            <p class="text-right price"><?= number_format($model->price, 0, ' ', ' ') ?> руб.</p>
        </div>
    </div>
</div>
<?php $this->registerJs('
    $(".carousel").owlCarousel({
        items: 1,
        loop: true,
        animateOut: \'fadeOut\',
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
    });
'); ?>