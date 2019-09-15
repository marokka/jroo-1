<?php

use App\Models\Food\Food;
use App\Http\Controllers\Admin\FoodController as Controller;

/**
 * @var Food $model
 */
?>
@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route(Controller::ROUTE_INDEX)}}">{{Controller::TITLE}}</a>
                </li>

                <li class="breadcrumb-item active">{{$model->name}}</li>
            </ol>

            <!-- /cards -->
            <h2></h2>

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-book"></i>Детали</h2>
                    <div class="float-right">
                        <a href="{{route(Controller::ROUTE_EDIT, $model->id)}}" class="btn btn-info">Изменить</a>

                        <a class="btn btn-danger"
                           href="{{route(Controller::ROUTE_DESTROY, $model->id)}}" title="Удалить" aria-label="Удалить"
                           data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="delete"
                           data-redirect="{{route(Controller::ROUTE_INDEX)}}">Удалить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Изображение</label>
                            <div>
                                <img src="{{$model->img}}" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 add_top_30">
                        <table class="table">
                            <tr>
                                <th>Название</th>
                                <td>{{$model->name}}</td>
                            </tr>
                            <tr>
                                <th>Описание</th>
                                <td>
                                    {{$model->description}}
                                </td>
                            </tr>

                            <tr>
                                <th>Категория</th>
                                <td>
                                    {{$model->categoryCache()['name']}}
                                </td>
                            </tr>

                            <tr>
                                <th>Статус</th>
                                <td>
                                    <span class="badge badge-primary">{{$model->status}}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid-->
    </div>
@endsection



