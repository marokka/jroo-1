<?php
/**
 * Created by PhpStorm.
 * User: aushev
 * Date: 15.09.2019
 * Time: 15:15
 */

use App\Models\Order\Order;

?>
@extends('layout.frontend')

@section('content')
    {{ Widget::run('breadcumb.breadcumbWidget', ['items' => [
                    \App\Widgets\Breadcumb\models\Breadcrumb::create('Основной сайт', '#', 'fas fa-home'),
                    \App\Widgets\Breadcumb\models\Breadcrumb::create('Корзина', route('cart')),
                    \App\Widgets\Breadcumb\models\Breadcrumb::create('Оформление заказа', '#'),
                ]])
        }}
    <div class="order-step">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="order-step_block">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-4">
                                <div class="step-block step-block--1">
                                    <div class="step">
                                        <h2>Корзина</h2><span>01</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="step-block active">
                                    <div class="step">
                                        <h2>Оформление</h2><span>02</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="step-block">
                                    <div class="step">
                                        <h2>Завершение</h2><span>03</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="shop-checkout">
        <div class="container">
            <form action="{{route('cart.addOrder')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h2 class="form-title">Ваши данные</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Имя*</label>
                                <input class="no-round-input-bg" name="name" type="text" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Телефон*</label>
                                <input class="no-round-input-bg" name="phone" id="phone" type="text" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Кол-во перчаток*</label>
                                <input class="no-round-input-bg" name="name" type="text" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCountry">Размер*</label>
                                <select class="no-round-input-bg" id="inputContry">
                                    <option value="1">S</option>
                                    <option value="2">M</option>
                                    <option value="3">L</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputStreet">Сдача с</label>
                                <input class="no-round-input-bg" id="inputStreet" name="change" type="text" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStreet">Кол-во приборов</label>
                                <input class="no-round-input-bg" id="inputStreet" name="change" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCompanyName">Адрес*</label>
                            <input class="no-round-input-bg" name="address" id="address" type="text">
                        </div>


                        <div class="form-group">
                            <label for="inputNote">Коментарий к заказу (укажите степень прожарки, остроту блюда)</label>
                            <textarea class="textarea-form-bg" id="coment" name="comment" cols="30" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h2 class="form-title">Ваш заказ</h2>
                        <div class="shopping-cart">
                            <div class="form-group">
                                <input type="radio" name="pay_type" id="shipping" value="{{Order::TYPE_CASH}}"
                                       checked="">
                                <label for="shipping">Оплата наличными</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="pay_type" id="paypal" value="{{Order::TYPE_ONLINE}}">
                                <label for="paypal">Онлайн оплата</label>
                            </div>
                            <button type="submit" class="normal-btn submit-btn"> Заказать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
