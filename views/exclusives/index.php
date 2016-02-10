<?php
/* @var $this yii\web\View */
/* @var $exclusives app\models\Exclusives[] */

use yii\helpers\Html;
use yii\helpers\Url;

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
                        <a href="#">
                            <img class="img-responsive" src="http://placehold.it/700x550" alt="">
                        </a>
                        <div class="col-md-12">
                            <h3 class="title">
                                <a href="<?= Url::to(['exclusives/view', 'id' => $item->id])?>"><?= $item->title ?></a>
                            </h3>

                            <p class="address"><?= $item->address ?></p>
                            <p class="text-right price"><?= number_format($item->price, 0, ' ', ' ') ?> руб.</p>
                            <div class="pull-left">
                                <a href="<?= Url::to(['exclusives/view', 'id' => $item->id])?>" class="btn btn-danger">Подробнее</a>
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