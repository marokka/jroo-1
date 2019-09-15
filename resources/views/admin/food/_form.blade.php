<?php
/**
 * @var \App\Models\Food\Food|null $model
 */
?>
<div class="row">

    <div class="col-md-12">
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Выбрать фото</label>
            <input id="input-b1" name="img" type="file" class="file" data-browse-on-zone-click="true">
        </div>
    </div>
    <div class="col-md-8 add_top_30">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" class="form-control" placeholder="Название"
                           value="{{old('name', $model->name ?? '')}}"
                           name="name">
                </div>
            </div>
        </div>
        <!-- /row-->

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Категория</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{isset($model) && $model->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Статус</label>
                    <select name="status" class="form-control">
                        @foreach($variants as $key => $statusVariant)
                            <option value="{{$key}}" {{isset($model) && $model->status == $statusVariant ? 'selected' : ''}} >{{$statusVariant}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Описание</label>
                    <textarea name="description" style="height:100px;" class="form-control"
                              placeholder="Описание">{{old('description', $model->description ?? '')}}</textarea>
                </div>
            </div>
        </div>
        <!-- /row-->
    </div>


    <div class="col-md-12">
        <div id="react-add-variants" data-foods='@json($foodProperties ?? [])'></div>
    </div>

</div>

