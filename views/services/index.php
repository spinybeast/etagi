<?php

use yii\helpers\Html;
use \rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $categories app\models\ServiceCategories[] */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container reviews-index">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                <?= Html::encode($this->title) ?><br/>
                <small>Мы предоставляем для клиентов.</small>
            </h1>
        </div>
    </div>

    <div class="etagi-services">

        <?php if (!empty($categories)) {
            foreach ($categories as $category) {
                $services = $items = [];

                foreach ($category->services as $service) {
                    $services[] = [
                        'label' => $service->title,
                        'url' => ['view', 'id' => $service->id]
                    ];
                }
                $items[] = [
                    'label' => Html::tag('span', FA::icon('minus-square'), ['class' => 'plus']) . ' ' . $category->name,
                    'url' => '#',
                    'items' => $services
                ];
                echo Html::beginTag('div', ['class' => 'services well']);
                echo yii\widgets\Menu::widget(['items' => $items, 'encodeLabels' => false]);
                echo Html::endTag('div');
            }
        } else { ?>
            <div class="text-center">
                Страница находится на оформлении
            </div>
        <?php } ?>
    </div>
    <p>
        <br/><br/>

    </p>

</div>

