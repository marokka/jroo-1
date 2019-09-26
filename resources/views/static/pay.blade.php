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



@endsection
