<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Этажи недвижимость';
?>

<section class="services">
    <div class="services_bg"></div>
    <div class="container">
        <div class="services_info">Ваше новоселье - <br/>Наш профессиональный праздник!</div>
    </div>
</section>
<section class="main_form container">

    <div class="main_form_title">Отправьте заявку для получения<br> бесплатной консультации</div>
    <?php if (Yii::$app->session->hasFlash('consultFormSubmitted')): ?>
        <p>Спасибо за Ваше обращение! Мы обязательно Вам перезвоним.</p>
    <?php else: ?>
        <?php $form = ActiveForm::begin([
            'id' => 'consult-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
            ],
        ]); ?>

        <div class="main_form_name">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Иванов Иван']) ?>
        </div>
        <div class="main_form_phone">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => '+7 901 234-56-78']) ?>
        </div>
        <div class="main_form_button">
            <?= Html::submitButton('Отправить', ['name' => 'consult-button']) ?>
        </div>


        <?php ActiveForm::end(); ?>
        <div class="main_form_garant">Гарантируем<br> конфиденциальность</div>
    <?php endif; ?>
</section>
<section class="basic_services">
    <div class="basic_services_bg"></div>
    <div class="container">
        <div class="basic_services_title">Наши основные товары</div>
        <div>
            <div class="row">
                <div class="basic_services_block col-md-4 col-xs-12">
                    <div class="basic_services_block_in">
                        <div class="basic_services_block_title"><p style="height: 24px;">Продажа недвижимости</p></div>
                        <div class="basic_services_block_img" style="background-image:url(img/key1.jpg)"></div>
                        <span>В первую очередь мы представляем и защищаем ваши интересы на рынке. Доверив продажу вашей квартиры, вы сбережете время, выгодно продадите квартиру и получите полный комплекс необходимых услуг.</span>
                    </div>
                </div>
                <div class="basic_services_block col-md-4 col-xs-12">
                    <div class="basic_services_block_in">
                        <div class="basic_services_block_title"><p style="height: 24px;">Покупка недвижимости</p></div>
                        <div class="basic_services_block_img" style="background-image:url(img/key2.jpg)"></div>
                        <span>Обширная база данных и большой опыт работы дает нам возможность удовлетворять самые взыскательные требования наших клиентов. Подача заявок на Ипотеку сразу в несколько Банков-партнеров из офиса агентства.</span>
                    </div>
                </div>
                <div class="basic_services_block col-md-4 col-xs-12">
                    <div class="basic_services_block_in">
                        <div class="basic_services_block_title"><p style="height: 24px;">Аренда недвижимости</p></div>
                        <div class="basic_services_block_img" style="background-image:url(img/key3.jpg)"></div>
                        <span>Мы располагаем уникальной базой данных по типовым и элитным квартирам, предлагаемым внаем. С нами безопасно!</span>
                    </div>
                </div>
            </div>

            </table>
        </div>
</section>
<section class="about">
    <div class="container">
        <div class="about_left col-md-3 col-xs-12">
            <div class="about_title">Почему мы</div>
            <p><b>1.</b> "Этажи недвижимость" лидер рынка  г.Таганрога с высокими стандартами качества.</p>

            <p><b>2.</b> Наши сотрудники постоянно совершенствуют свои навыки. Визитная карточка наших специалистов – оперативность, ответственность и своевременность.</p>

            <p><b>3.</b> Мы дорожим своей репутацией, поэтому действуем в рамках договора, где прописаны права и обязанности сторон. Мы несем полную ответственность по заключаемым сделкам.</p>

            <p><b>4.</b> Стремясь завоевать доверие клиентов, компания «Этажи недвижимость» старается обезопасить их от любого мошенничества, поэтому тщательно проверяем юридическую чистоту сделок с недвижимостью.</p>
        </div>
        <div class="about_right col-md-9 col-xs-12">
            <div class="about_title">О компании</div>
            <p>Мы специализируюмся на оказании высококачественных услуг.</p>

            <p>
                Квалифицированные сотрудники внимательно изучат ваши потребности и предложат наиболее выгодные
                условия обслуживания.</p>

            <p>
                Все специалисты — профессионалы, которые любят свою работу. Вы можете смело довериться нам.</p>

            <p>
                Наша главная задача — воплощение в жизнь идей и пожеланий наших клиентов с максимальным
                исполнительским качеством с использованием новейших технологий.</p>

            <p>Мы работаем, вы отдыхаете!</p>
            <br>

            <div class="about_title">Преимущества</div>
            <div class="advantages">
                <div class="col-md-12">
                    <div class="col-md-6"><p><span class="icon icomoon-thumbs-up-2"></span><b>Высокое качество</b><br>Мы
                            заботимся о наших клиентах и гарантируем лучше качество.</p></div>
                    <div class="col-md-6"><p><span class="icon icomoon-coin"></span><b>Низкая цена</b><br>Мы всегда
                            готовы
                            предложить своим клиентам одни из лучших цен.</p></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6"><p><span class="icon icomoon-history"></span><b>Минимальные сроки</b><br>Постоянно
                            работаем над увеличением скорости выполнения заказов.</p></div>
                    <div class="col-md-6"><p><span class="icon icomoon-cart-checkout"></span><b>Скидки постоянным
                                клиентам</b><br>Приготовим
                            для Вас индивидуальное предложение!</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contacts">
    <div class="container">
        <p class="contacts_title">Контакты</p>

        <div>
            <div class="col-md-4 col-xs-12 address">
                <b>Адрес:</b>
                <?= Yii::$app->params['siteAddress'] ?><br>
                <b>Телефоны:</b>
                <?= Yii::$app->params['sitePhone'] ?><br>
                <b>Email:</b>
                <a href="mailto:<?= Yii::$app->params['siteEmail'] ?>"><?= Yii::$app->params['siteEmail'] ?></a>
            </div>
            <div class="col-md-8 col-xs-12 map">
                <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=14GcH8O8bq4425sxxLXGuGM8jQpUTsv4&width=100%&height=400&lang=ru_RU&sourceType=constructor"></script>
            </div>
        </div>
    </div>
</section>
