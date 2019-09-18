document.addEventListener("DOMContentLoaded", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getCart();

    $(".add-to-cart").on('click', addToCart);
    $('.remove-item').on('click', function () {
        const elem = $(this);
        const id = elem.data('property-id');
        $.ajax({
            url: '/api/cart/cart-property/' + id,
            type: "DELETE",
            success: function () {
                $('tr[data-property-id="' + id + '"]').remove();
                getCart();
            }
        })
    })

    $('.cart-update').on('click', function () {
        let data = [];
        const quantitiesInfo = $('.quantity[data-id]').each((idx, item) => {
            data.push({id: $(item).data('id'), quantity: $(item).val()});
        });

        $.ajax({
            url: '/api/cart/cart-property',
            method: "PUT",
            data: {quantitiesInfo: data},
            success: function () {
                getCart();
            }
        })


    })
});


function addToCart() {
    const elem = $(this);

    $.ajax({
        url: '/api/cart/add-to-cart',
        method: "POST",
        data: {foodPropertyId: elem.data('food-property-id')},
        success: function () {
            getCart();
        },

        error: function () {
            getCart();
        }
    });


}


function setCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function getCart() {
    $.ajax({
        url: '/api/cart/get',
        method: 'POST',
        success: function (data) {
            const total = null === data.cart ? 0.00 : data.cart.total;
            $('.total').text(`₽ ${total}`);
        }
    });
}

function removeItem(id) {
    const cart = getCart();
    const newCart = cart.filter(item => item.id !== id);

    setCart(newCart);


}
