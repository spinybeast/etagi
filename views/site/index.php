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
                        <span>Сотрудничайте с лидером рынка! К нам обратилось уже более 5000 клиентов. Большой опыт!</span>
                    </div>
                </div>
                <div class="basic_services_block col-md-4 col-xs-12">
                    <div class="basic_services_block_in">
                        <div class="basic_services_block_title"><p style="height: 24px;">Покупка недвижимости</p></div>
                        <div class="basic_services_block_img" style="background-image:url(img/key2.jpg)"></div>
                        <span>Внимательное отношение к каждому покупателю. Отношения с клиентами построены на принципах взаимного доверия и уважения.</span>
                    </div>
                </div>
                <div class="basic_services_block col-md-4 col-xs-12">
                    <div class="basic_services_block_in">
                        <div class="basic_services_block_title"><p style="height: 24px;">Аренда недвижимости</p></div>
                        <div class="basic_services_block_img" style="background-image:url(img/key3.jpg)"></div>
                        <span>Вы экономите свое время, потому что мы идем в ногу со временем и используем только передовые технологии.</span>
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
            <p><b>1.</b> Наша компания уже более 10 лет работает на рынке города и области!</p>

            <p><b>2.</b> У нас работают профессионалы высочайшего класса, которые смогут воплотить практически
                любую Вашу задумку в жизнь.</p>

            <p><b>3.</b> Проводим предварительную консультацию.</p>

            <p><b>4.</b> Наши цены весьма гибкие и лояльные, мы предлагаем различные сезонные акции, во время
                которых Вы можете получить скидку.</p>

            <p><b>5.</b> Наша работа окончательно убедит Вас в том, что мы — это то, что Вам нужно.</p>
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
                Таганрог
                <b>Телефоны:</b>
                <?= Yii::$app->params['sitePhone'] ?><br>
                <b>Email:</b>
                <a href="mailto:<?= Yii::$app->params['siteEmail'] ?>"><?= Yii::$app->params['siteEmail'] ?></a>
            </div>
            <div class="col-md-8 col-xs-12 map">
                <script type="text/javascript" charset="utf-8"
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=tusZ2XbNQQk2SjWnuAkMLJQzOCFpXpuD&width=100%&height=400&lang=ru_RU&sourceType=constructor"></script>
            </div>
        </div>
    </div>
</section>
