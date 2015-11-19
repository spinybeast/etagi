<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="header">
        <div class="container header_top">
            <a href="/" class="col-xs-6 col-md-3 vertical-center text-center">
                <div><?= Html::img('img/logo.png', array('class'=>'img-responsive')); ?></div>
            </a>

            <div class="header_info col-xs-6 col-md-3 vertical-center text-center">
                <span>Агентство недвижимости</span>
            </div>
            <div class="header_phone col-xs-6 col-md-3 vertical-center text-center">
                <p>+7 495 342 34 32</p>
            </div>
            <div class="header_email col-xs-6 col-md-3 vertical-center text-center">
                <p>Email:</p>

                <div>
                    <a href="mailto:<?= Yii::$app->params['siteEmail'] ?>"><?= Yii::$app->params['siteEmail'] ?></a>
                </div>
            </div>
        </div>
        <?php
        NavBar::begin([
            'brandLabel' => false,
            'options' => [
                'class' => 'header_bottom',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => ''],
            'items' => [
                ['label' => 'О нас', 'url' => ['/site/index']],
                ['label' => 'Эксклюзивные предложения', 'url' => ['/exclusive']],
                ['label' => 'Услуги', 'url' => ['/services']],
                ['label' => 'Карьера', 'url' => ['/career']],
                ['label' => 'Контакты', 'url' => ['/contact']],
            ],
        ]);
        NavBar::end();
        ?>
    </header>
    <main class="content">
        <?= $content ?>
    </main>
</div>

<footer class="footer">
    <div class="container">
        <div class="copyright">
            Этажи недвижимость, Агентство недвижимости<br>Все права защищены, <?= date('Y') ?>.
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
