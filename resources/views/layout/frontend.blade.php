<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', "Jroo - Доставка еды")</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="stylesheet" href="{{mix('frontend/css/all.css')}}">
    <link rel="shortcut icon" href="{{asset('frontend/images/JBS_Logo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div id="main">
    <header>
        <div class="header-block d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="header-left d-flex flex-column flex-md-row align-items-center">
                            <p class="d-flex align-items-center"><img
                                    src="{{asset('frontend/images/icon/map-marker.png')}}" style="width: 3em">Крым,
                                г. Ялта,
                                ул.
                                Игнатенко дом 3</p>
                            <p class="d-flex align-items-center"><img
                                    src="{{asset('frontend/images/icon/phone.png')}}" style="width: 3em"><a href="tel:+79780873337" style="color: #0b0b0b"> +7 (978) 087-33-37</a>
                            </p>
                            <p class="d-flex align-items-center"><img
                                    src="{{asset('frontend/images/icon/time-machine.png')}}" style="width: 3em">с
                                10:00 до 23:30</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div
                            class="header-right d-flex justify-content-around">
                            <div class="social-link d-flex">
                                <a href="https://vk.com/club136274972" target="_blank"><img src="{{asset('frontend/images/icon/vk-com.png')}}" style="width: 3em"> </a>
                                <a href="https://www.facebook.com/jrooburgersteak/" target="_blank"><img src="{{asset('frontend/images/icon/facebook-new.png')}}" style="width: 3em"></a>
                                <a href="https://www.instagram.com/jroo_burger_steak/" target="_blank"><img src="{{asset('frontend/images/icon/instagram.png')}}" style="width: 3em"></a>
                                <a href="https://www.tripadvisor.ru/UserReviewEdit-g295378-d13001575-Jroo_Burger_Steak-Yalta.html" target="_blank"><img src="{{asset('frontend/images/icon/tripadvisor.png')}}" style="width: 3em"></a>
                            </div>

                            @guest
                                <div class="login d-flex">
                                    <a href="{{route('login')}}">
                                        <img src="{{asset('frontend/images/icon/gender-neutral-user.png')}}"
                                             style="width: 3em">
                                    </a>
                                    <a href="{{route('register')}}">
                                        <img src="{{asset('frontend/images/icon/add-user-male.png')}}"
                                             style="width: 3em">
                                    </a>
                                </div>
                            @else
                                <div class="login d-flex">
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <img src="{{asset('frontend/images/icon/gender-neutral-user.png')}}"
                                                 style="width: 3em">
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Главная</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Настройки</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i>Выход</a>
                                        </div>
                                    </div>
                                </div>
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-2"><a class="logo" href="/"><img src="{{asset('frontend/images/JBS_Logo.png')}}"
                                                                     alt=""
                                                                     style="width: 75%; margin-left: 40%"></a></div>
                    <div class="col-8">
                        <div class="navgition-menu d-flex align-items-center justify-content-center">
                            <ul class="mb-0">
                                <li class="toggleable">
                                    <a class="menu-item {{request()->is('/') ? 'active' : ''}}"
                                       href="/">Меню</a>
                                </li>
                                <li class="toggleable">
                                    <a class="menu-item {{request()->is('pay') ? 'active' : ''}}"
                                       href="{{route('pay')}}">Оплата</a>
                                </li>
                                <li class="toggleable">
                                    <a
                                        class="menu-item {{request()->is('delivery') ? 'active' : ''}}"
                                        href="{{route('delivery')}}">Доставка</a>
                                </li>
                                <li class="toggleable">
                                    <a class="menu-item {{request()->is('contact') ? 'active' : ''}}"
                                       href="{{route('contact')}}">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="product-function d-flex align-items-center justify-content-end">
                            <div id="cart"><a class="function-icon " style="font-size: 1.6em"
                                              href="{{route('cart')}}"><i
                                        class="fas fa-shopping-basket"></i><span
                                        style="font-size: 1em" class="total">₽ 0.00</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="mobile-menu">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="mobile-menu_block d-flex align-items-center"><a class="mobile-menu--control"
                                                                                    href="#"><i class="fas fa-bars"
                                                                                                style="font-size: 1.8em;"></i></a>
                            <div id="ogami-mobile-menu">
                                <button class="no-round-btn" id="mobile-menu--closebtn">Закрыть</button>
                                <div class="mobile-menu_items">
                                    <ul class="mb-0 d-flex flex-column">
                                        <li class="toggleable"><a class="menu-item"
                                                                  href="/"><img
                                                    src="{{asset('frontend/images/icon/restaurant-menu.png')}}"
                                                    style="width: 30px; margin-right: 5px;">Меню</a><span
                                                class="sub-menu--expander"><i class="icon_plus"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="/">Категории</a></li>
                                            </ul>
                                        </li>

                                        <li class="toggleable"><a class="menu-item"
                                                                  href="{{route('pay')}}"><img
                                                    src="{{asset('frontend/images/icon/money.png')}}"
                                                    style="width: 30px; margin-right: 5px;">Оплата</a>

                                        </li>
                                        <li class="toggleable"><a class="menu-item" href="{{route('delivery')}}"><img
                                                    src="{{asset('frontend/images/icon/delivery.png')}}"
                                                    style="width: 30px; margin-right: 5px;">Доставка</a>

                                        </li>
                                        <li class="toggleable"><a class="menu-item" href="{{route('contact')}}"><img
                                                    src="{{asset('frontend/images/icon/contact-card.png')}}"
                                                    style="width: 30px; margin-right: 5px;">Контакты</a>

                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-login">
                                    <h2>Личный кабинет</h2><a href="login.php"><img
                                            src="{{asset('frontend/images/icon/gender-neutral-user.png')}}"
                                            style="width: 30px; margin-right: 5px;">Вход</a><a
                                        href="register.php"><img
                                            src="{{asset('frontend/images/icon/add-user-male.png')}}"
                                            style="width: 30px; margin-right: 5px;">Регистрация</a>
                                </div>
                                <div class="mobile-social"><a href="https://vk.com/club136274972" target="_blank"><img
                                            src="{{asset('frontend/images/icon/vk-com.png')}}"
                                            style="width: 40px; margin-right: 5px;"></a><a
                                        href="https://www.facebook.com/jrooburgersteak/" target="_blank"><img
                                            src="{{asset('frontend/images/icon/facebook-new.png')}}"
                                            style="width: 40px; margin-right: 5px;"></a><a
                                        href="https://www.instagram.com/jroo_burger_steak/" target="_blank"><img
                                            src="{{asset('frontend/images/icon/instagram.png')}}"
                                            style="width: 40px; margin-right: 5px;"></a>
                                </div>


                                <div class="mobile-login" style="margin-top: 15px;">

                                    <a href="">
                                        <p class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i>
                                            Крым,
                                            г. Ялта, ул.
                                            Игнатенко дом 3
                                        </p>
                                    </a>
                                    <a href="">
                                        <p class="d-flex align-items-center">
                                            <i class="fas fa-phone" style="margin-right: 10px;"></i><a href="tel:+79780873337" style="color: #0b0b0b"> +7 (978) 087-33-37</a>
                                        </p>
                                    </a>
                                    <a href="">
                                        <p class="d-flex align-items-center">
                                            <i class="far fa-clock"
                                               style="margin-right: 10px;"></i>
                                            с 9:00 до 23:30
                                        </p>
                                    </a>

                                </div>
                            </div>
                            <div class="ogamin-mobile-menu_bg"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mobile-menu_logo text-center d-flex justify-content-center align-items-center">
                            <a href="/"><img src="{{asset('frontend/images/JBS_Logo.png')}}" style="width: 90%"
                                             alt=""></a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-product_function d-flex align-items-center justify-content-end"><a
                                class="function-icon" href="{{route('cart')}}"><i class="fas fa-shopping-basket"
                                                                                  style="font-size: 2.9em"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation-filter">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4 col-xl-3 order-2 order-md-1">
                        <div class="department-menu_block">
                            <div class="department-menu d-flex justify-content-between align-items-center"><i
                                    class="fas fa-bars"></i>Рекомендуем наборы<span><i
                                        class="arrow_carrot-down"></i></span></div>
                            <div class="department-dropdown-menu" style="display: none;">
                                <ul>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="{{asset('frontend/images/icon/steak-medium.png')}}"
                                                 style="width: 35px;">Стейк (на выбор) + <img
                                                src="{{asset('frontend/images/icon/porridge.png')}}"
                                                style="width: 35px;">гарнир (на выбор) + <img
                                                src="{{asset('frontend/images/icon/sauce.png')}}"
                                                style="width: 35px;">соус (на выбор)</a></li>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="{{asset('frontend/images/icon/beefburger.png')}}"
                                                 style="width: 35px;">Бургер (на выбор) + <img
                                                src="{{asset('frontend/images/icon/french-fries.png')}}"
                                                style="width: 35px;">фри + <img
                                                src="{{asset('frontend/images/icon/sauce.png')}}"
                                                style="width: 35px;">(соус на выбор)</a></li>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="{{asset('frontend/images/icon/beefburger.png')}}"
                                                 style="width: 35px;">Бургер (на выбор) + <img
                                                src="{{asset('frontend/images/icon/sweet-patato.png')}}"
                                                style="width: 35px;">картофельные дольки + <img
                                                src="{{asset('frontend/images/icon/sauce.png')}}"
                                                style="width: 35px;">(соус на выбор)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 col-xl-9 order-1 order-md-2">
                        <form action="{{route('food.by-search')}}">
                            <div class="website-search">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="search-input">
                                            <input name="name" value="{{request('name')}}" required
                                                   class="no-round-input no-border" type="text"
                                                   placeholder="Поиск по блюдам">
                                        </div>
                                    </div>
                                    <div>
                                        <button class="no-round-btn">Поиск</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

@yield('content')
<!-- End header-->
    @include('components.partners')
</div>
<!-- End partner-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 text-sm-center text-md-left">
                <div class="footer-logo text-center"><img src="{{asset('frontend/images/JBS_Logo.png')}}" alt=""
                                                          style="width: 40%"></div>
                <div class="footer-contact text-center">
                    <p>Адрес: Крым, г. Ялта, ул. Игнатенко дом 3, </p>
                    <p>Телефон: <a href="tel:+79780873337" style="color: #0b0b0b"> +7 (978) 087-33-37</a></p>
                    <p>Email: <a href="mailto:jroo90@mail.ru" style="color: #0b0b0b">jroo90@mail.ru</a></p>
                </div>
                <div class="footer-social text-center"><a class="round-icon-btn"
                                                          href="https://www.facebook.com/jrooburgersteak/"
                                                          target="_blank"><i
                            class="fab fa-facebook-f"> </i></a><a class="round-icon-btn"
                                                                  href="https://www.instagram.com/jroo_burger_steak/"
                                                                  target="_blank"><i
                            class="fab fa-instagram"></i></a><a class="round-icon-btn"
                                                                href="https://vk.com/club136274972" target="_blank"><i
                            class="fab fa-vk"> </i></a></div>
            </div>

            @include("components.social_network")
        </div>
    </div>
{{--    <div class="newletter">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-between align-items-center">--}}
{{--                <div class="col-12 col-md-7">--}}
{{--                    <div class="newletter_text text-center text-md-left">--}}
{{--                        <h5>Наша подписка</h5>--}}
{{--                        <p>Подписаться на Email рассылку</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-5">--}}
{{--                    <div class="newletter_input">--}}
{{--                        <input class="round-input" type="text" placeholder="Введите ваш email">--}}
{{--                        <button>Отправить</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="footer-credit" style="background-color: #dcb070;">
        <div class="container">
            <div
                class="footer-creadit_block d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-baseline align-items-md-center">
                <p class="author">Copyright © 2019 Jroo</p><img class="payment-method"
                                                                src="{{asset('frontend/images/money.jpg')}}"
                                                                style="width: 50% ;border-radius: 10px" alt="">
            </div>
        </div>
    </div>
</footer>
<!-- End footer-->
</div>
<script defer src="{{mix('frontend/js/all.js')}}"></script>

<script src="{{ asset('admin_assets/js/custom.js')}}"></script>
{!!  GoogleReCaptchaV3::init() !!}

</body>
</html>
