<?php

use yii\helpers\Html;

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
            $items = [];
            foreach ($categories as $category) {
                echo Html::beginTag('div', ['class' => 'well']);
                $services = [];
                foreach ($category->services as $service) {
                    $services[] = [
                        'label' => $service->title,
                        'url' => ['view', 'id' => $service->id]
                    ];
                }
                $items[] = [
                    'label' => $category->name,
                    'url' => '#',
                    'items' => $services
                ];
            }
            echo yii\widgets\Menu::widget(['items' => $items]);
            echo Html::endTag('div');
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
