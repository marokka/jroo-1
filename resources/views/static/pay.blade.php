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
                            <h1 class="title green-underline">ОПЛАТА НАЛИЧНЫМИ</h1>
                            <p>Наличные — это самый привычный способ оплаты заказа по факту его получения. Если вам потребуется сдача, просто предупредите об этом оператора или оставьте соответствующий комментарий при оформлении заказа онлайн. Курьер привезет сдачу вместе с вашим заказом.</p>
                            <h1 class="title green-underline">ОПЛАТА БАНКОВСКОЙ КАРТОЙ</h1>
                            <p>Нет наличных, а ближайший банкомат находится в трех кварталах? Вы можете оплатить свой заказ банковской картой при оформлении заказа на сайте.
                                После оформления заказа с вами обязательно свяжется оператор для подтверждения в течение 10 минут.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{asset('frontend/images/pay-pay.png')}}" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
