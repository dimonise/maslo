$(function () {
    $('#carousel').carousel({
        interval: 10000,
        keyboard: false,
        pause: 'hover',
        ride: 'carousel',
        wrap: true
    });
});

$(function () {
    $('.rekomm').carousel({
        interval: 1100,
        keyboard: false,
        pause: 'hover',
        ride: 'carousel',
        wrap: true
    });
});

$(function () {
    $('.new').carousel({
        interval: 1200,
        keyboard: false,
        pause: 'hover',
        ride: 'carousel',
        wrap: true
    });
});

$(function () {
    $('.sale').carousel({
        interval: 1300,
        keyboard: false,
        pause: 'hover',
        ride: 'carousel',
        wrap: true
    });
});

function inCart(prod_id) {
    event.preventDefault();

    $.ajax({
        url: 'http://maslo.loc/product/inCart',
        type: 'post',
        //dataType:'json',
        data: {id: prod_id,count:$('#kolvo').val()},
        success: function (html) {
            console.log(html);
            alert(html+' in cart');
        },

    })
}

function delProduct(prod_id,user) {
    event.preventDefault();

    $.ajax({
        url: 'http://maslo.loc/product/delCart',
        type: 'post',
        dataType:'json',
        data: {prod_id: prod_id,user:user},
        success: function (html) {

            alert('Product deleted');
            location.reload();
        },

    })
}