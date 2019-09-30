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
                    \App\Widgets\Breadcumb\models\Breadcrumb::create('Главная', '/', 'fas fa-home'),
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
                                <label for="inputFirstName">Размер</label>
                                <label for="inputFirstName">S</label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Количество</label>
                                <input class="no-round-input-bg" name="phone" id="phone" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Размер</label>
                                <label for="inputFirstName">M</label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Количество</label>
                                <input class="no-round-input-bg" name="phone" id="phone" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">Размер</label>
                                <label for="inputFirstName">L</label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Количество</label>
                                <input class="no-round-input-bg" name="phone" id="phone" type="text">
                            </div>
                        </div>
                        <!--
                       <div class="gloves">
                           <div class="form-row align-items-center">


                              <div class="form-group col-md-6">
                                  <label for="inputFirstName">Кол-во перчаток</label>
                                  <input class="no-round-input-bg" name="glovesCount[]" type="text" required="">
                              </div>


                              <div class="form-group col-md-5">
                                  <label for="inputCountry">Размер</label>
                                  <select class="no-round-input-bg" name="glovesSize[]" id="inputContry">
                                      <option value="1">S</option>
                                      <option value="2">M</option>
                                      <option value="3">L</option>
                                  </select>
                              </div>


                              <div class="form-group col-md-2 text-center">
                                  <button type="button" class="btn btn-primary mt-3 gloves-add" style="background: #662c00; border: none;">+
                                  </button>
                              </div>

                            </div>
                        </div>
                        -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputStreet">Сдача с*</label>
                                <input class="no-round-input-bg" id="inputStreet" name="change" type="text" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStreet">Кол-во приборов</label>
                                <input class="no-round-input-bg" id="inputStreet" name="change" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCompanyName">Город*</label>
                                <input class="no-round-input-bg" name="city" id="hide-pickup" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCompanyName">Улица*</label>
                                <input class="no-round-input-bg" name="street" id="hide-pickup" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCompanyName">Дом*</label>
                                <input class="no-round-input-bg" name="house" id="hide-pickup" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputCompanyName">Подъезд*</label>
                                <input class="no-round-input-bg" name="entrance" id="hide-pickup" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCompanyName">Корпус*</label>
                                <input class="no-round-input-bg" name="building" id="hide-pickup" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCompanyName">Квартира*</label>
                                <input class="no-round-input-bg" name="apartment" id="hide-pickup" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputCompanyName">Домофон*</label>
                                <input class="no-round-input-bg" name="intercom" id="hide-pickup" type="text">
                            </div>
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
