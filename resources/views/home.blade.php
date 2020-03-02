<?php

/**
 * @var \App\Models\Category\Category[] $categories
 */
?>
@extends('layout.frontend')

@section('content')
    {{ Widget::run('breadcumb.breadcumbWidget', ['items' => [
            \App\Widgets\Breadcumb\models\Breadcrumb::create('Главная', '/', 'fas fa-home'),
            \App\Widgets\Breadcumb\models\Breadcrumb::create('Категории', '#'),
        ]])
    }}
    <div class="shop-layout">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert {{Session::get('message')['class']}}">
                    {{Session::get('message')['message']}}
                </div>
            @endif
            <div class="ogami-container-fluid">
                <div class="slider-banner">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-6 col-sm-4 col-lg-3">
                                <a href="{{route('food.by-category-slug', $category->slug)}}">
                                    <img class="img-fluid" src="{{$category->img}}"
                                         alt="{{$category->name}}" style="margin-bottom: 8%; border-radius: 14px;"
                                         title="{{$category->name}}">
                                </a>
                            </div>
                        @endforeach

{{--                        <div class="col-12 col-sm-4 col-lg-4">--}}
{{--                            <a href="{{route('foods.index')}}">--}}
{{--                                <img class="img-fluid"--}}
{{--                                     src="{{asset('frontend/images/categories/other.jpg')}}"--}}
{{--                                     alt="Все блюда" style="margin-bottom: 8%; border-radius: 14px;" title="Все блюда">--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container feature-products feature-products_v2">
        <div class="ogami-container-fluid">
            @foreach($categoriesWithFoods as $categoryViewModel)
                <div class="row align-items-center align-content-center">
                    <div class="col-6">
                        <h1 class="title mx-auto">{{$categoryViewModel->name}}</h1>
                    </div>
                    <div class="col-6 text-right" style="margin-bottom: 30px;">
                        <a href="{{route('food.by-category-slug', ['slug' => $categoryViewModel->slug])}}" target="_blank" style="font-weight: bold;font-family: Gussi;font-size: 18px;color: white;padding: 4px 20px;border-radius: 10px;background-color: black;"><i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach($categoryViewModel->foodProperties as $index => $foodViewModel)
                                @if($index <= 2)
                                    <div class="col-12 col-md-4 col-lg-4 col-xxl-4" style="margin-bottom: 30px;margin-top: 2%;">
                                        @component('food.list._cardFood', ['food' => $foodViewModel])@endcomponent
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @include('components.story')
    <!-- End shop layout-->


{{--<div class="coming-soon">--}}
{{--    <div class="container">--}}
{{--        <div class="coming-soon_block" style="padding: 10px; background: #2C150C; border-radius: 10px;">--}}
{{--            <h1 class="title" style="color: white;">Технические работы на сайте</h1>--}}
{{--            <h5 class="subtitle" style="color: white; margin-bottom: 20px !important;">На данный момент на сайте проводяться технические работы. Связанные с обновлением меню. </h5>--}}
{{--            <button type="button" class="btn btn-secondary" style="margin-bottom: 10px;"><a href="http://jroo.cafe/#menu" target="_blank" style="color: white;">Ознакомиться с новым меню</a></button>--}}
{{--            <div class="follow-us">--}}
{{--                <h5 style="color: white;">Вы можете посмотреть на нас в соц. сетях</h5>--}}
{{--                <div class="social"><a class="round-icon-btn" href="https://www.facebook.com/jrooburgersteak/" target="_blank"><i class="fab fa-facebook-f"> </i></a><a class="round-icon-btn" href="https://vk.com/club136274972" target="_blank"><i class="fab fa-vk"> </i></a><a class="round-icon-btn" href="https://www.instagram.com/jroo_burger_steak/" target="_blank"><i class="fab fa-instagram"></i></a></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
