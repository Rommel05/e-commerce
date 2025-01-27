$(document).ready(function () {
    //$('body').css('background', 'red');
    $.each($('.card'), function (indexInArray, valueOfElement) { 
        $(this).on('click', function () {
            let title = $(this).find('.card-title').text();
            let text = $(this).find('.card-text').text();
            let img = $(this).find('img');
            let src = img.attr('src');

            $('#productModalLabel').text(title);
            $('#priceModalLabel').text(text);
            $('#priceModalLabel').css('font-weight', 'bold');
            $('#modalImage').attr('src', src);
        });
    });

    $('#addCart').on('click', function () {
        //$('#priceModalLabel').html('<p>hola</p>');
        if ($('#empty-text').length != 0) {
            $('#empty-text').remove();
        } 

        let title = $('#productModalLabel').text();
        let price = $('#priceModalLabel').text();
        let image = $('#modalImage').attr('src');
        let quantity = $('#number').val();


        $('.offcanvas-body').append("<div class='cart-product'> <img src='"+ image + "'> <p>" + title + "</p> <p>" + price + "</p> <input type='text' value='"+ quantity +"' readonly> <button class='btn btn-outline-danger'><i class='bi bi-trash-fill'></i></button></div>");


    });
});
