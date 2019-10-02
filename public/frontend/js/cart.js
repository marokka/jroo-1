document.addEventListener("DOMContentLoaded", function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    getCart();

    $(document).on('click', ".add-to-cart", addToCart);
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

    $('a.checkout').on('click', function (e) {
        e.preventDefault();
        const elem = $(this);
        let data = [];
        const quantitiesInfo = $('.quantity[data-id]').each((idx, item) => {
            data.push({id: $(item).data('id'), quantity: $(item).val()});
        });

        $.ajax({
            url: '/api/cart/cart-property',
            method: "PUT",
            data: {quantitiesInfo: data},
            success: function () {
                location.href = elem.attr('href');
            }
        })


    })
});


function addToCart() {
    const elem = $(this);


    $.ajax({
        url: '/api/cart/add-to-cart',
        method: "POST",
        data: {foodPropertyId: elem.data('food-property-id'), quantity: $('input.quantity').val() || 1},
        success: function (html) {
            // var dialog = bootbox.dialog({
            //     title: 'Корзина',
            //     message: "<p><i class='far fa-check-circle'></i> Товар успешно добавлен в корзину.</p>",
            //     size: 'large',
            //     buttons: {
            //         cancel: {
            //             label: "Перейти к корзине",
            //             className: 'btn-danger',
            //             callback: function () {
            //                 location.href = '/cart';
            //             }
            //         },
            //
            //         ok: {
            //             label: "Вернуться к сайту",
            //             className: 'btn-outline-primary',
            //             callback: function () {
            //                 console.log('Custom OK clicked');
            //             }
            //         }
            //     }
            // });
            // bootbox.confirm({
            //     message: "<b>Товар</b> успешно добавлен в корзину! Перейти к оплате?",
            //     buttons: {
            //         confirm: {
            //             label: 'Да',
            //             className: 'btn-success'
            //         },
            //         cancel: {
            //             label: 'Нет',
            //             className: 'btn-danger'
            //         }
            //     },
            //     callback: function (result) {
            //         if (true === result) {
            //             location.href = '/cart';
            //         }
            //     }
            // });

            $('.toast').toast('show');

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
