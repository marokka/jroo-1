<?php

use App\Models\Food\models\FoodViewModel;

/**
 * @var FoodViewModel $model
 */
?>

<div id="quickview">
    <div class="quickview-box">
        <button class="round-icon-btn" id="quickview-close-btn"><i class="fas fa-times"></i></button>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="shop-detail_img">
                    <button class="round-icon-btn" id="zoom-btn"><i class="icon_zoom-in_alt"></i></button>
                    <div class="big-img big-img_qv">
                        <div class="big-img_block"><img src="{{$model->img}}" alt="product image">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="shop-detail_info"><h5 class="product-type color-type">{{$model->category}}</h5>
                    <a class="product-name"
                       href="javascript:;">{{$model->name}}
                    </a>
                    <div class="price-rate">
                        <h3 class="product-price">
                            @if($model->properties[0]->old_price)
                                <del>₽{{$model->properties[0]->old_price}}</del>
                            @endif
                            ₽{{$model->properties[0]->price}}
                        </h3>
                    </div>
                    <p class="product-describe">{{$model->description}}</p>
                    <h5 class="product-avaiable">Выход: <span>{{$model->foodInfo->weight}} </span></h5>
                    <br>
                    <div class="quantity-select"><label for="quantity">Количество:</label>
                        <input class="no-round-input"
                               id="quantity"
                               data-food-id="{{$model->id}}"
                               type="number" min="0"
                               value="1">
                        <div class="number-input">
                            <button class="step-button minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                            <input class="quantity" min="0" name="quantity" value="1" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                    </div>
                    <div class="product-select">
                        <button class="add-to-cart normal-btn outline"
                                data-food-property-id="{{$model->properties[0]->id}}">Добавить в корзину
                        </button>
                        {{--<button class="add-to-compare normal-btn outline">+ Добавить в избранное</button>--}}
                    </div>
                    <!--
                    <div class="product-share"><h5>Поделиться:</h5><a href=""><i class="fab fa-facebook-f"> </i></a><a
                            href=""><i class="fab fa-twitter"></i></a><a href=""><i class="fab fa-invision"> </i></a><a
                            href=""><i class="fab fa-pinterest-p"></i></a></div>-->
                </div>
            </div>
        </div>
    </div>
</div>
