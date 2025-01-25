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
            $('#modalImage').attr('src', src);
        });
    });
});