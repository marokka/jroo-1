<?php
/**
 * @var \App\Models\Food\Food[] $foods
 */
?>
<div class="shop-products_bottom">
    <div class="row no-gutters-sm">
        @foreach($foods as $food)
            <div class="col-6 col-md-4">
                <div class="product">
                    <div class="product-img_block"><a class="product-img" href="#">
                            <img
                                src="{{$food->img}}" alt="">
                        </a>
                        <button class="quickview no-round-btn smooth">Быстрый просмотр</button>
                    </div>
                    <div class="product-info_block">
                        <h5 class="product-type">{{$food->categoryCache()->name}}</h5>
                        <a class="product-name" href="#">{{$food->name}}</a>
                        <h3 class="product-price">₽{{$food->propertyCache()->price}}
                            @if($food->propertyCache()->old_price)
                                <del>₽{{$food->propertyCache()->old_price}}</del>
                            @endif
                        </h3>
                        <h5 class="product-rated"><i class="icon_star"></i><i
                                class="icon_star"></i><i class="icon_star"></i><i
                                class="icon_star"></i><i
                                class="icon_star-half"></i><span>(5)</span></h5>
                        <p class="product-describe">{{$food->description}}</p>
                        <h5 class="product-avaiable">Выход: <span>350 гр.</span></h5>
                        <button class="add-to-wishlist button-borderless"><i
                                class="icon_heart_alt"></i></button>
                    </div>
                    <div class="product-select">
                        {{--<button class="add-to-wishlist round-icon-btn"><i--}}
                                {{--class="icon_heart_alt"></i></button>--}}
                        <button data-food-property-id="{{$food->property->id}}" class="add-to-cart round-icon-btn"><i class="fas fa-shopping-basket"></i>
                        </button>
                        <button class="quickview round-icon-btn" data-id="{{$food->id}}"><i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="product-select_list">
                        <p class="delivery-status">Быстрая доставка</p>
                        <h3 class="product-price">
                            @if($food->propertyCache()->old_price)
                                <del>₽{{$food->propertyCache()->old_price}}</del>
                            @endif
                            ₽{{$food->propertyCache()->price}}
                        </h3>
                        <button class="add-to-cart normal-btn outline">Добавить в корзину
                        </button>
                        <button class="add-to-compare normal-btn outline">+ Добавить в
                            избранное
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        @if($foods->count() == 0)
            <div class="col-md-12 text-center">
                Ничего не найдено
            </div>
        @endif
    </div>
</div>
