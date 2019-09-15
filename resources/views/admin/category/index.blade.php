<?php
/**
 * @var \App\Models\Category\Category $category
 */

?>

@extends('admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.index')}}">Доска</a>
                </li>
                <li class="breadcrumb-item active">Категории</li>
            </ol>

            <!-- /cards -->
            <h2></h2>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-fw fa-list"></i>Категории</h2>
                    <div class="pull-right">
                        <a href="{{route('categories.create')}}" class="btn badge-primary">Добавить</a>
                    </div>
                </div>

                <div class="categories">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Действие</th>
                        </tr>

                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a href="{{route('categories.show', ['id' => $category->id])}}"><i
                                            class="fa fa-fw fa-eye"></i></a>
                                    <a href="{{route('categories.edit', ['id' => $category->id])}}"><i
                                            class="fa fa-fw fa-edit"></i></a>
                                    <form style="display: inline" action="{{ route('categories.destroy' , $category->id)}}" method="POST"
                                          class="{{"form-" . $category->id}}">
                                        {!! method_field('DELETE') !!}
                                        @csrf
                                        <button style="border: none; background: none;" type="submit" onclick="return confirm('Вы уверены?')"><a
                                                href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection



