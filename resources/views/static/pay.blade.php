<?php
/**
 * Created by PhpStorm.
 * User: aushev
 * Date: 10.09.2019
 * Time: 20:40
 */
?>
@extends('layout.frontend')

@section('content')
    {{ Widget::run('breadcumb.breadcumbWidget', ['items' => [
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Главная', '/', 'fas fa-home'),
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Оплата', '#'),
            ]])
        }}
    <div class="about-us">
        <div class="container">
            <div class="our-story">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="our-story_text">
                            <h1 class="title green-underline">Удобная оплата и быстрая доставка.</h1>
                            <p>Курьеры привезут горячие и очень аппетитные блюда в течение часа, а в некоторые районы города в течение полутора часов. Блюда остаются горячими, благодаря использованию специальных термосумок. Чтобы вы ни заказали — пиццу, бургер, или десерт, быстро обрабатываем заказы и привозим по указанному адресу. Позвоните нам по телефону <a href="tel:+79780873337" style="color: #0b0b0b">+7 (978) 087 33 37.</a> или оставьте заказ на сайте.</p>
                            <h3 class="title green-underline">ОПЛАТА НАЛИЧНЫМИ</h3>
                            <p>Наличные — это самый привычный способ оплаты заказа по факту его получения. Если вам потребуется сдача, просто предупредите об этом оператора или оставьте соответствующий комментарий при оформлении заказа онлайн. Курьер привезет сдачу вместе с вашим заказом.</p>
                            <h3 class="title green-underline">ОПЛАТА БАНКОВСКОЙ КАРТОЙ</h3>
                            <p>Нет наличных, а ближайший банкомат находится в трех кварталах? Вы можете оплатить свой заказ банковской картой при оформлении заказа на сайте.
                                После оформления заказа с вами обязательно свяжется оператор для подтверждения в течение 10 минут.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <script type="text/javascript" charset="utf-8" async
                                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af79795d31041e3753d776317e3b86ae6a68cf6fbff5bb1f57d65e5cbdca6fb95&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true">
                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
