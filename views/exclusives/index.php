<?php
/* @var $this yii\web\View */
/* @var $exclusives app\models\Exclusives[] */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Carousel;
use yii\widgets\Pjax;
use \app\models\Exclusives;

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
            Pjax::begin(['enablePushState' => false]); ?>
            <div class="filter_panel well">
                <?= Html::a('Показать все', ['exclusives/index'], ['class' => 'btn btn-primary']) ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="btn-group" data-toggle="buttons">
                    <?= Html::a('Дом', ['exclusives/house'], ['class' => 'btn btn-default']) ?>
                    <?= Html::a('Квартира', ['exclusives/flat'], ['class' => 'btn btn-default']) ?>
                </div>
                <div class="btn-group" data-toggle="buttons">
                    <?php if ($filters = Exclusives::getRoomFilters()) {
                        foreach ($filters as $count) {
                            echo Html::a($count . '-комнатные', ['exclusives/rooms', 'count' => $count], ['class' => 'btn btn-default']);
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
                                <?php $images = [];
                                foreach ($item->getImages() as $img) {
                                    $images[] = Html::img($img);
                                }
                                if (count($images) > 1) {
                                    echo Carousel::widget([
                                        'items' => $images,
                                        'showIndicators' => false,
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
            Pjax::end(); ?>
        <?php } ?>
            </div>
    </div>
<?php $this->registerJs("$(document).ready(function() {
    $('.carousel').carousel({
        pause: true,
        interval: false
    });
    $(document)
      .on('pjax:start', function() { $('#exclusive-items').fadeOut(12000); })
      .on('pjax:end', function() { $('#exclusive-items').fadeIn(12000); })
    });"
); ?>