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
    @include('components.story')
    <!-- End shop layout-->
@endsection
