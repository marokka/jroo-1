<?php
/**
 * @var \App\Models\Cart\models\CartPropertyViewModel $property
 */
?>

<tr data-property-id="{{$property->id}}">
    <td class="product-iamge">
        <div class="img-wrapper">
            <img src="{{$property->img}}"
                 title="{{$property->name}}">
        </div>
    </td>
    <td class="product-name">{{$property->name}}</td>
    <td class="product-price">₽{{$property->price}}</td>
    <td class="product-quantity">
        <input class="quantity no-round-input" data-id="{{$property->id}}" type="number" min="1" value="{{$property->quantity}}">
    </td>
    <td class="product-total">₽{{$property->sum}}</td>
    <td class="product-clear">
        <button data-property-id="{{$property->id}}" class="remove-item no-round-btn"><i class="icon_close"></i></button>
    </td>
</tr>
