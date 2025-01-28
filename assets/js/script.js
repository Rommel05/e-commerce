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

        let cardCart = `
        <div class="cart-card">
            <img src="${image}" alt="${title}">
            <div class="info">
                <h5>${title}</h5>
                <p>Quantity: ${quantity}</p>
                <p>Price: ${price}</p>
            </div>
            <div class="actions">
                <button class="btn btn-outline-danger btn-sm remove-item">
                    <i class="bi bi-trash-fill"></i> Eliminar
                </button>
            </div>
        </div>`;
        $('.offcanvas-body').append(cardCart);
    });

    /* Borrar del carrito */
    /*$.each($('.cart-card'), function (indexInArray, valueOfElement) { 
         $('.remove-item').on('click', function () {
            valueOfElement.remove();
         });
    });*/

    $(document).on('click', '.remove-item', function () {
        $(this).closest('.cart-card').remove(); // Elimina la tarjeta completa
        if($('.cart-card').length == 0) {
            $('.offcanvas-body').append(`<p id="empty-text">Your cart is empty</p>`);
        }
    });
});
