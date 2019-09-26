@extends('layout.frontend')

@section('content')
    {{ Widget::run('breadcumb.breadcumbWidget', ['items' => [
                       \App\Widgets\Breadcumb\models\Breadcrumb::create('Главная', '/', 'fas fa-home'),
                       \App\Widgets\Breadcumb\models\Breadcrumb::create('Корзина', route('cart')),
                       \App\Widgets\Breadcumb\models\Breadcrumb::create('Оформление заказа', route('checkout')),
                        \App\Widgets\Breadcumb\models\Breadcrumb::create('Завершение', '#'),
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
                                <div class="step-block">
                                    <div class="step">
                                        <h2>Оформление</h2><span>02</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="step-block active">
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
            <div class="alert alert-success">
                Спасибо за заказ! <br> <br>
                В ближайщее время с Вами свяжется на оператор, чтобы уточнить заказ :)
            </div>
        </div>
    </div>
@endsection
