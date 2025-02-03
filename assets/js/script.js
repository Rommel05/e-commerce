$(document).ready(function () {
    //$('body').css('background', 'red');

    /* Validación campo number */
    $('#number').val(1);
    $('#number').attr('min',1);

    /* Añadir dinḿicamente la informaciín del producto a la ventana modal */

    $(document).on('click', '.card', function () {
        let title = $(this).find('.card-title').text();
        let text = $(this).find('.card-text').text();
        let img = $(this).find('img');
        let src = img.attr('src');
    
        $('#productModalLabel').text(title);
        $('#priceModalLabel').text(text);
        $('#priceModalLabel').css('font-weight', 'bold');
        $('#modalImage').attr('src', src);
    });

    /* Añadir al carrito */

    $('#addCart').on('click', function () {
        //$('#priceModalLabel').html('<p>hola</p>');
        if ($('#empty-text').length != 0) {
            $('#empty-text').remove();
        } 

        let title = $('#productModalLabel').text();
        let price = $('#priceModalLabel').text();
        let image = $('#modalImage').attr('src');
        let quantity = $('#number').val();
        let totalPrice = 0;

        totalPrice = parseInt(price) * quantity;

        let cardCart = `
        <div class="cart-card">
            <img src="${image}" alt="${title}">
            <div class="info">
                <h5>${title}</h5>
                <p class="quantity">Quantity: ${quantity}</p>
                <p class="price">Price: ${price}</p>
            </div>
            <div class="actions">
                <button class="btn btn-outline-danger btn-sm remove-item">
                    <i class="bi bi-trash-fill"></i> Eliminar
                </button>
            </div>

        </div>`;

        if ($('#pay').length == 0) {
            $('#pay-container').append(`<a id="pay" href="#">COMPLETE PURCHASE - $${totalPrice}</a>`);
        } else {
            let currentPrice = parseInt($('#pay').text().replace("COMPLETE PURCHASE - $",""));
            //console.log(currentPrice);
            let updatePrice = currentPrice + totalPrice;
            $('#pay').text(`COMPLETE PURCHASE - $${updatePrice}`);
        }

        $('#pay').before(cardCart);

        let counter = parseInt($('#counter').text());
        counter += parseInt(quantity);
        $('#counter').text(counter);
        
    });

    /* Borrar del carrito */
    
    $(document).on('click', '.remove-item', function () {
        $(this).closest('.cart-card').remove();
        if($('.cart-card').length == 0) {
            $('.offcanvas-body').append(`<p id="empty-text">Your cart is empty</p>`);
            $('#pay').remove();
        }


        /* Actualizar botón precio */

        let card = $(this).closest('.cart-card');

        /* PRICE */

        let priceText = $(this).closest('.cart-card').find('.info .price').text();

        let priceSplit = priceText.split(":");

        let priceRemove = parseInt(priceSplit[1].trim());
        //console.log(priceRemove);

        /* QUANTITY */

        let quantityText = $(this).closest('.cart-card').find('.info .quantity').text();

        let quantitySplit = quantityText.split(':');
        
        let quantity = parseInt(quantitySplit[1].trim());
        //console.log(quantity);

        /*ACTUALIZAR PRICE */

        let currentPrice = parseInt($('#pay').text().replace("COMPLETE PURCHASE - $",""));
        //console.log(currentPrice);

        let updatePrice = currentPrice - (priceRemove * quantity);

        $('#pay').text(`COMPLETE PURCHASE - $${updatePrice}`);



        
        /* Actualizar contador de productos */

        let counter = parseInt($('#counter').text());
        counter -= quantity;
        $('#counter').text(counter);

    });
});
