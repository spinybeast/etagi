<?php
/* @var $this yii\web\View */
/* @var $exclusives app\models\Exclusives[] */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use \app\models\Exclusives;
sersid\owlcarousel\Asset::register($this);

$this->title = 'Эксклюзивные предложения';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .owl-theme .owl-controls {
        bottom: 50%;
        margin-bottom: -20px;
    }
</style>
    <div class="container exclusives">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">
                    Эксклюзивные квартиры<br/>
                    <small>Только в нашей компании.</small>
                </h1>
            </div>
        </div>

        <?php if (!empty($exclusives)) {
            $active = Yii::$app->session->getFlash('activeButton');
            $houses = $flats = 0;
            foreach ($exclusives as $item) {
                if ($item->type === Exclusives::HOUSE) {
                    $houses++;
                } elseif ($item->type === Exclusives::FLAT) {
                    $flats++;
                }
            }
            Pjax::begin(['enablePushState' => false]); ?>
            <div class="filter_panel well">
                <?= Html::a('Показать все', ['exclusives/index'], ['class' => 'btn btn-primary']) ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="btn-group" data-toggle="buttons">
                    <?php if ((!$active && $houses > 0) || $active) {
                        echo Html::a('Дом', ['exclusives/house'], ['class' => 'btn btn-default' . ($active === 'house' ? ' active' : '')]);
                    }
                    if ((!$active && $flats > 0) || $active) {
                        echo Html::a('Квартира', ['exclusives/flat'], ['class' => 'btn btn-default' . ($active === 'flat' ? ' active' : '')]);
                    } ?>
                </div>
                <div class="btn-group" data-toggle="buttons">
                    <?php if ($filters = Exclusives::getRoomFilters()) {
                        foreach ($filters as $count) {
                            echo Html::a($count . '-комнатные', ['exclusives/rooms', 'count' => $count], ['class' => 'btn btn-default' . ($active === 'rooms' . $count ? ' active' : '')]);
                        }
                    } ?>
                </div>
            </div>
            <div id="exclusive-items">
            <?php $rows = array_chunk($exclusives, 4);
            foreach ($rows as $exclusives) {
                echo Html::beginTag('div', ['class' => 'row']);
                foreach ($exclusives as $key => $item) { ?>
                    <div class="col-md-3">
                        <div class="exclusives-item">
                            <div class="img">
                                <?php
                                $images = $item->getImages();
                                if (count($images) > 1) {
                                    echo newerton\fancybox\FancyBox::widget([
                                        'target' => 'a[rel=fancybox' . $item->id . ']',
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
                                    echo Html::beginTag('div', ['class' => 'carousel']);
                                    foreach ($images as $image) {
                                        echo Html::a(Html::img($image, ['class' => 'img-responsive']), $image, ['rel' => 'fancybox' . $item->id]);
                                    }
                                    echo Html::endTag('div');
                                } else {
                                    echo Html::img(current($images), ['class' => 'img-responsive']);
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
                                    <a href="<?= Url::to(['exclusives/view', 'id' => $item->id]) ?>"
                                       class="btn btn-danger">Подробнее</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php echo Html::endTag('div');
            }
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);
            Pjax::end(); ?>
        <?php } else {?>
            <h3>Результатов нет</h3>
        <?php } ?>
            </div>
    </div>

<?php $this->registerJs("
$(document).on('ready pjax:success', function(){
    jQuery('.carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: false,
        navText: ['<', '>']
    });
    $.fancybox.init();
    jQuery(document)
      .on('pjax:start', function() { $('#exclusive-items').fadeOut(12000); })
      .on('pjax:end', function() { $('#exclusive-items').fadeIn(12000); });
});"); ?>
