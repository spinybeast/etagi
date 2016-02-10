<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $reviews app\models\Reviews[] */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container reviews-index">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= Html::encode($this->title) ?><br/>
                <small>Ваше мнение о нашей компании.</small>
            </h1>
        </div>
    </div>

    <div class="etagi-reviews">
        <?php
        foreach(Yii::$app->session->getAllFlashes() as $key => $message) {
            echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
        }
        ?>
        <?php if (!empty($reviews)) {
            foreach ($reviews as $review) { ?>
                <div class="row">
                    <p class="text">
                        <?= $review->text ?>
                    </p>

                    <p class="text-right">
                        <span class="text-muted"><i><?= $review->author ?></i></span>
                    </p>
                    <hr/>
                </div>
            <?php }
        } else { ?>
            <div class="text-center">
                Отзывов пока нет. Будьте первым!
            </div>
        <?php } ?>
    </div>
    <p>
        <br/><br/>

        <?php echo $this->render('_form', ['model' => new \app\models\Reviews()])?>
    </p>

</div>
