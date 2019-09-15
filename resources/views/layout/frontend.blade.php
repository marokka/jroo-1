<!DOCTYPE html>
<html>

<head>
    <title>JROO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="keywords"
          content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
    <meta name="author" content="MARTECH | Deer Creative Theme">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom_bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/elegant.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/scroll.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="shortcut icon" href="{{asset('frontend/images/JBS_Logo.png')}}')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?162"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v4.0">
    </script>
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
                                    src="https://img.icons8.com/bubbles/50/000000/map-marker.png" style="width: 3em">Крым,
                                г. Ялта,
                                ул.
                                Игнатенко дом 3</p>
                            <p class="d-flex align-items-center"><img
                                    src="https://img.icons8.com/bubbles/50/000000/phone.png" style="width: 3em">+7(978)087-33-37
                            </p>
                            <p class="d-flex align-items-center"><img
                                    src="https://img.icons8.com/bubbles/50/000000/time-machine.png" style="width: 3em">с
                                9:00 до 23:30</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div
                            class="header-right d-flex flex-column flex-md-row justify-content-md-end justify-content-center align-items-center">
                            <div class="social-link d-flex"><a href=""><img
                                        src="https://img.icons8.com/bubbles/50/000000/vk-com.png"
                                        style="width: 3em"> </a><a
                                    href="">
                                    <img src="https://img.icons8.com/bubbles/50/000000/facebook-new.png"
                                         style="width: 3em"></a><a href=""><img
                                        src="https://img.icons8.com/bubbles/50/000000/instagram.png" style="width: 3em">
                                </a>
                            </div>
                            <div class="login d-flex"><a href="login.php"><img
                                        src="https://img.icons8.com/bubbles/50/000000/gender-neutral-user.png"
                                        style="width: 3em">Вход</a></div>
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
                                <li class="toggleable"><a class="menu-item active"
                                                          href="shop_grid+list_3col.html">Меню
                                        <i class="fas fa-caret-down"></i></a>
                                    <ul class="sub-menu shop d-flex">
                                        <div class="nav-column">
                                            <li><a href="shop_grid+list_fullwidth.html">Меню кухни</a></li>
                                            <li><a href="shop_grid+list_fullwidth.html">Меню напитков б/а</a></li>
                                        </div>
                                    </ul>
                                </li>
                                <li class="toggleable"><a class="menu-item" href="{{route('pay')}}">Оплата</a>
                                </li>
                                <li class="toggleable"><a class="menu-item" href="{{route('delivery')}}">Доставка</a></li>
                                <li class="toggleable"><a class="menu-item" href="{{route('contact')}}">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="product-function d-flex align-items-center justify-content-end">
                            <div id="cart"><a class="function-icon " style="font-size: 1.6em" href="{{route('cart')}}"><i
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
                                                                  href="index.php"><img
                                                    src="https://img.icons8.com/dusk/64/000000/restaurant-menu.png"
                                                    style="width: 30px; margin-right: 5px;">Меню</a><span
                                                class="sub-menu--expander"><i class="icon_plus"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="index.php">Меню Кухни</a></li>
                                                <li><a href="index.php">Меню Напитков Б/А</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="toggleable"><a class="menu-item"
                                                                  href="#"><img
                                                    src="https://img.icons8.com/bubbles/50/000000/money.png"
                                                    style="width: 30px; margin-right: 5px;">Оплата</a>

                                        </li>
                                        <li class="toggleable"><a class="menu-item" href="#"><img
                                                    src="https://img.icons8.com/cotton/64/000000/delivery.png"
                                                    style="width: 30px; margin-right: 5px;">Доставка</a>

                                        </li>
                                        <li class="toggleable"><a class="menu-item" href="contact.php"><img
                                                    src="https://img.icons8.com/bubbles/50/000000/contact-card.png"
                                                    style="width: 30px; margin-right: 5px;">Контакты</a>

                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-login">
                                    <h2>Личный кабинет</h2><a href="login.php"><img
                                            src="https://img.icons8.com/bubbles/50/000000/gender-neutral-user.png"
                                            style="width: 30px; margin-right: 5px;">Вход</a><a
                                        href="register.php"><img
                                            src="https://img.icons8.com/clouds/100/000000/add-user-male.png"
                                            style="width: 30px; margin-right: 5px;">Регистрация</a>
                                </div>
                                <div class="mobile-social"><a href=""><img
                                            src="https://img.icons8.com/bubbles/50/000000/vk-com.png"></a><a
                                        href=""><img
                                            src="https://img.icons8.com/bubbles/50/000000/facebook-new.png"></a><a
                                        href=""><img
                                            src="https://img.icons8.com/bubbles/50/000000/instagram-new.png"></a>
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
                                            <i class="fas fa-phone" style="margin-right: 10px;"></i>+7(978)087-33-37
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
                            <a href="index.php"><img src="{{asset('frontend/images/JBS_Logo.png')}}" style="width: 90%"
                                                     alt=""></a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-product_function d-flex align-items-center justify-content-end"><a
                                class="function-icon" href="cart.php"><i class="fas fa-shopping-basket"
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
                            <div class="department-dropdown-menu">
                                <ul>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="https://img.icons8.com/color/48/000000/steak-medium.png"
                                                 style="width: 35px;">Стейк (на выбор) + <img
                                                src="https://img.icons8.com/dusk/64/000000/porridge.png"
                                                style="width: 35px;">гарнир (на выбор) + <img
                                                src="https://img.icons8.com/color/96/000000/sauce.png"
                                                style="width: 35px;">соус (на выбор)</a></li>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="https://img.icons8.com/plasticine/100/000000/hamburger.png"
                                                 style="width: 35px;">Бургер (на выбор) + <img
                                                src="https://img.icons8.com/plasticine/100/000000/french-fries.png"
                                                style="width: 35px;">фри + <img
                                                src="https://img.icons8.com/color/96/000000/sauce.png"
                                                style="width: 35px;">(соус на выбор)</a></li>
                                    <li><a class="department-link" href="shop_grid+list_3col.html">
                                            <img src="https://img.icons8.com/plasticine/100/000000/hamburger.png"
                                                 style="width: 35px;">Бургер (на выбор) + <img
                                                src="https://img.icons8.com/office/30/000000/sweet-potato.png"
                                                style="width: 35px;">картофельные дольки + <img
                                                src="https://img.icons8.com/color/96/000000/sauce.png"
                                                style="width: 35px;">(соус на выбор)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 col-xl-9 order-1 order-md-2">
                        <form action="{{route('food.by-search')}}">
                            <div class="website-search">
                                <div class="row no-gutters">
                                    <div class="col-0 col-md-0 col-lg-4 col-xl-3">
                                        <div class="filter-search">
                                            <div
                                                class="categories-select d-flex align-items-center justify-content-around">
                                                <span>Все категории</span><i class="arrow_carrot-down"></i></div>
                                            <div class="categories-select_box">
                                                <ul>
                                                    <li>Категория 1</li>
                                                    <li>Категория 2</li>
                                                    <li>Категория 3</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-5 col-xl-7">
                                        <div class="search-input">
                                            <input name="name" value="{{request('name')}}" required class="no-round-input no-border" type="text"
                                                   placeholder="Поиск по блюдам">
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3 col-xl-2">
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
                    <p>Телефон: +7 (978) 087-33-37</p>
                    <p>Email: jroo@site.com</p>
                </div>
                <div class="footer-social text-center"><a class="round-icon-btn" href=""><i
                            class="fab fa-facebook-f"> </i></a><a class="round-icon-btn" href=""><i
                            class="fab fa-instagram"></i></a><a class="round-icon-btn" href=""><i
                            class="fab fa-vk"> </i></a></div>
            </div>

            @include("components.social_network")
        </div>
    </div>
    <div class="newletter">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-7">
                    <div class="newletter_text text-center text-md-left">
                        <h5>Наша подписка</h5>
                        <p>Подписаться на Email рассылку</p>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="newletter_input">
                        <input class="round-input" type="text" placeholder="Введите ваш email">
                        <button>Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-credit">
        <div class="container">
            <div
                class="footer-creadit_block d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-baseline align-items-md-center">
                <p class="author">Copyright © 2019 Jroo</p><img class="payment-method"
                                                                src="{{asset('frontend/images/money.jpg')}}"
                                                                style="width: 50%" alt="">
            </div>
        </div>
    </div>
</footer>
<!-- End footer-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('frontend/js/parallax.js')}}"></script>
<script src="{{asset('frontend/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('frontend/js/numscroller-1.0.js')}}"></script>
<script src="{{asset('frontend/js/vanilla-tilt.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('frontend/js/cart.js')}}"></script>


<script src="{{asset('admin_assets/js/bootbox.all.min.js')}}"></script>

<script src="{{ asset('admin_assets/js/custom.js')}}"></script>


<script>
    //Код jQuery, установливающий маску для ввода телефона элементу input
    //1. После загрузки страницы,  когда все элементы будут доступны выполнить...
    $(function () {
        //2. Получить элемент, к которому необходимо добавить маску
        $("#phone").mask("+7(999) 999-99-99");
    });
</script>
</body>
</html>
