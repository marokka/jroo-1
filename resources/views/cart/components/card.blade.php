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
        <div class="number-input d-flex align-items-center text-center">
            <button class="step-button minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" >
                <i class="fas fa-minus"></i>
            </button>
            <input data-id="{{$property->id}}" class="quantity no-round-input text-center" min="0"  value="{{$property->quantity}}" type="number">
            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="step-button plus">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </td>
    <td class="product-total">₽{{$property->sum}}</td>
    <td class="product-clear">
        <button data-property-id="{{$property->id}}" class="remove-item no-round-btn"><i class="icon_close"></i></button>
    </td>
</tr>
