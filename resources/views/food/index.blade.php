<?php
/**
 * @var \App\Models\Category\Category[] $categories
 * @var \App\Models\Category\Category $category
 * @var \App\Models\Food\Food[] $model
 */
?>
@extends('layout.frontend')

@section('content')
    {{ Widget::run('breadcumb.breadcumbWidget', ['items' => [
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Основной сайт', '#', 'fas fa-home'),
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Категории', route('home')),
                \App\Widgets\Breadcumb\models\Breadcrumb::create($breadcumb, '#'),
            ]])
    }}

    <!-- End breadcrumb-->
    <div class="shop-layout">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="shop-sidebar">
                        <button class="no-round-btn" id="filter-sidebar--closebtn">Закрыть</button>
                        @widget('category.categoryWidget')
                        <div class="shop-sidebar_price-filter">
                            <div class="price-filter_top mini-tab-title underline">
                                <h2 class="title">Фильтр стоимости</h2>
                            </div>
                            <div class="price-filter_bottom">
                                <p>
                                    <label for="amount">По цене:</label>
                                <div class="filter-group">
                                    <input id="amount" type="text" readonly="">
                                    <button class="normal-btn filter">Показать</button>
                                </div>
                                </p>
                                <div id="slider-range"></div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-sidebar--background" style="display: none"></div>
                </div>
                <div class="col-xl-9">
                    <div class="shop-grid-list">
                        <div class="shop-products">
                            <div class="shop-products_top mini-tab-title underline">
                                <div class="row align-items-center">
                                    <div class="col-6 col-xl-4">
                                        <h2 class="title">Список блюд</h2>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div id="show-filter-sidebar">
                                            <h5><i class="fas fa-bars"></i>Показать Категории</h5>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-8">
                                        <div class="product-option">
                                            <div class="product-filter">

                                            </div>
                                            <div class="view-method">
                                                <p class="active" id="grid-view"><i class="fas fa-th-large"></i></p>
                                                <p id="list-view"><i class="fas fa-list"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Using column-->
                            </div>
                            @include('food.list._listFoods', ['foods' => $model])
                            <div class="shop-pagination">
                                {{$model->links('components.paginate')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End shop layout-->

@endsection
