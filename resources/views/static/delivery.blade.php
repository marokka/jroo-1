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
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Основной сайт', '#', 'fas fa-home'),
                \App\Widgets\Breadcumb\models\Breadcrumb::create('Доставка', '#'),
            ]])
        }}
    <div class="about-us">
        <div class="container">
            <div class="our-story">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="our-story_text">
                            <h1 class="title green-underline">О нашей доставке</h1>
                            <p>Tyna Giang's integrated agro-forestry farming model is the first project in Vietnam to achieve the highest ranking in the "100 projects to combat climate change" by the Ministry of Environment, Energy and Sea. France organized in 2016 ...</p>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Neque porro quisquam est, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <script type="text/javascript" charset="utf-8" async
                                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af79795d31041e3753d776317e3b86ae6a68cf6fbff5bb1f57d65e5cbdca6fb95&amp;width=auto&amp;height=auto&amp;lang=ru_RU&amp;scroll=true&amp;apikey=<67204859-3988-4a79-9725-8c4783ea8019>">
                        </script>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="faq">
        <div class="container">
            <div id="accordion">
                <div class="faq-question"><i class="icon_plus"></i>
                    <h3 class="faq-question">Время доставки?</h3>
                </div>
                <div class="faq-answer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="faq-question"><i class="icon_plus"></i>
                    <h3 class="faq-question">Граници Доставки?</h3>
                </div>
                <div class="faq-answer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="faq-question"><i class="icon_plus"></i>
                    <h3 class="faq-question">Бонусы ?</h3>
                </div>
                <div class="faq-answer">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>


@endsection
