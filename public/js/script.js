$(document).ready(function () {
    $('.rekomms').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 3000,
        animateOut: "slideOutLeft",
        animateIn: "slideInDown",
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    })
});

$(".owl-nav").hide();


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
        wrap: true,
        item: 4
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
        url: '/product/inCart',
        type: 'post',
        //dataType:'json',
        data: {id: prod_id, count: $('#kolvo').val()},
        success: function (html) {
            console.log(html);
            $('#tovar').text(html);
            
        },

    })
}

function delProduct(prod_id, user) {
    event.preventDefault();

    $.ajax({
        url: '/product/delCart',
        type: 'post',
        dataType: 'json',
        data: {prod_id: prod_id, user: user},
        success: function (html) {

            alert('Product deleted');
            location.reload();
        },

    })
}

////////////////////////////////////
function sel_spec() {
    event.preventDefault();
    var spec = $('#add-spec-name').val();

    $.ajax({
        url: '/productadmin/sel_spec',
        type: 'post',
        dataType: 'json',
        data: {spec: spec},
        success: function (html) {
            $('#add-spec option').remove();
            $('#add-spec0').append("<option >Выбрать характеристику</option>");
            for (var i = 0; i < html.length; i++) {
                $('#add-spec-val').append("<option value='" + html[i].id + "'>" + html[i].val_feature_ru + "</option>");
            }

        },

    })
}

$('.add-spec').on('click', function () {
    var name = $('#add-spec-name').val();
    var prod = $('#pid').val();
    var val = $('#add-spec-val').val();
    $.ajax({
        url: '/productadmin/savehar',
        type: 'post',
        data: {name: name, prod: prod, val: val},
        success: function (html) {

            alert('Характеристика сохранена');
            location.reload();
        },

    })
});
$('#add-har').on('click', function () {

    $.ajax({
        url: '/productadmin/addhar',
        type: 'post',
        dataType: 'json',
        success: function (html) {
            var count = $('.cats').length + 1;
            $('.specifications').append('<select name="add-spec-name[]" id="add-spec-name' + count + '" class="cats" onchange="sel_specc(' + count + ');"><option >Выбрать наименование х-ки</option>');

            for (var i = 0; i < html.id.length; i++) {
                $('#add-spec-name' + count).append("<option value='" + html.id[i] + "'>" + html.name[i] + "</option>");
            }

            $('.specifications').append('</select><select name="add-spec[]" id="add-spec' + count + '" ><option >Выбрать характеристику</option>');
            $('.specifications').append('</select><button type="button" class="close" style="color: #f50202;" aria-label="Close" \n' +
                '                                            onclick="del_har_add(' + count + ')"><span aria-hidden="true">&times;</span>\n' +
                '                                            </button><br>');

        },

    })

});

function sel_specc(count) {
    event.preventDefault();
    var spec = $('#add-spec-name' + count).val();

    $.ajax({
        url: '/productadmin/sel_spec',
        type: 'post',
        dataType: 'json',
        data: {spec: spec},
        success: function (html) {
            $('#add-spec' + count + ' option').remove();
            $('#add-spec' + count).append("<option >Выбрать характеристику</option>");
            for (var i = 0; i < html.length; i++) {
                $('#add-spec' + count).append("<option value='" + html[i].id + "'>" + html[i].val_feature_ru + "</option>");
            }

        },

    })
}

function to_sub_cat() {
    event.preventDefault();
    var spec = $('#category').val();

    $.ajax({
        url: '/productadmin/sel_sub',
        type: 'post',
        dataType: 'json',
        data: {spec: spec},
        success: function (html) {
            $('#sub_cat option').remove();
            $('#sub_cat').append("<option >Выбрать подкатегорию</option>");
            for (var i = 0; i < html.length; i++) {
                $('#sub_cat').append("<option value='" + html[i].id + "'>" + html[i].name_ru + "</option>");
            }

        },

    })
}

function to_sub_sub_cat() {
    event.preventDefault();
    var spec = $('#sub_cat').val();

    $.ajax({
        url: '/productadmin/sel_sub',
        type: 'post',
        dataType: 'json',
        data: {spec: spec},
        success: function (html) {
            $('#sub_sub_cat option').remove();

            for (var i = 0; i < html.length; i++) {
                $('#sub_sub_cat').append("<option value='" + html[i].id + "'>" + html[i].name_ru + "</option>");
            }

        },

    })
}

function del_har_edit(id_prod, id_name_har) {

    $.ajax({
        url: '/productadmin/del_har_edit',
        type: 'post',
        dataType: 'json',
        data: {id_prod: id_prod, id_name_har: id_name_har},
        success: function (html) {

            alert('Характеристика удалена');
            location.reload();

        },

    })

}

function del_val_edit(id_feature) {

    $.ajax({
        url: '/feature/del_val',
        type: 'post',
        dataType: 'json',
        data: {id: id_feature},
        success: function (html) {

            alert('Значение характеристики удалено');
            location.reload();

        },

    })

}

function del_har_add(id) {
    $('.specifications').find('#add-spec-name' + id).remove();
    $('.specifications').find('#add-spec' + id).remove();

}

$('#add-val').on('click', function () {
    $.ajax({
        url: '/feature/save_val_har',
        type: 'post',
        dataType: 'json',
        data: {ua: $('#val_ua').val(), ru: $('#val_ru').val(), id: $('#id').val()},
        success: function (html) {

            alert('Сохранено');
            location.reload();

        },

    })
});

$('#add-val-field').on('click', function () {

    $('.val-new').append(' <div class="col-md-6">\n' +
        '                        <input type="text" name="val_har_ua[]" value="" class="form-control" id=""/>\n' +
        '                    </div>\n' +
        '                    <div class="col-md-6">\n' +
        '                        <input type="text" name="val_har_ru[]" value="" class="form-control" id=""/>\n' +
        '                    </div>');
});

$('#search-filtr').on('click', function () {
    $.ajax({
        url: '/catalog/search_filtr',
        type: 'post',
        dataType: 'json',
        data: $('#filtr').serialize(),
        success: function (html) {
            console.log(html);


        },

    })
});

function sorts(lang) {
    var sort = $('#sort').val();
    var onpage = $('#onpage').val();
    $.ajax({
        url: '/catalog/sort',
        type: 'post',
        dataType: 'json',
        data: {sort: sort, onpage: onpage},
        success: function (html) {
            $('body').find('.sort-section').empty();

            for (var i = 0; i < html.length; i++) {
                if (lang === 'ua') {
                    var prod = html[i].product_name_ua;
                } else {
                    var prod = html[i].product_name_ru;
                }
                $('.sort-section').append('<div class="col-md-4">\n' +
                    '                    <a href="/' + lang + '/product/' + html[i].product_id + '">\n' +
                    '                    <div class="prod">\n' +
                    '                    <img src="' + html[i].img + '" width="100%">\n' +
                    prod + ',' + html[i].price + 'грн\n' +
                    '                    </div>\n' +
                    '                    </a>\n' +
                    '                    </div>');
            }

        },

    })
}

function getrayon() {
    var id = $('#region').val();
    $.ajax({
        url: '/cabinet/search_rayon',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (html) {
            $('#rayon').html('<select name="rayon" id="rayons"class="form-control" onchange="getcity()">');
            for (var i = 0; i < html.length; i++) {
                $('#rayons').append('<option value="' + html[i].id_rayon + '">' + html[i].rayon + '</option>');
            }
            $('#rayon').append('</select>');

        },

    })
}

function getcity() {
    var id = $('#rayons').val();
    $.ajax({
        url: '/cabinet/search_city',
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (html) {
            $('#city').html('<select name="city" id="citys"class="form-control">');
            for (var i = 0; i < html.length; i++) {
                $('#citys').append('<option value="' + html[i].city_name + '">' + html[i].city_name + '</option>');
            }
            $('#city').append('</select>');

        },

    })
}

$('#searcher').on('click', function () {
    var tags = $('#tags').val();
    $.ajax({
        url: '/catalog/search',
        type: 'post',
        dataType: 'json',
        data: {id: tags},
        success: function (html) {
            $(location).attr('href',html);

        },

    })
});

function changeStat(){
    var statru = $('#status_ru').val();
    $('#status_ua').val(statru);
}

$(function(){
  $('.minimized').click(function(event) {
    var i_path = $(this).attr('src');
    $('body').append('<div id="overlay"></div><div id="magnify"><img src="'+i_path+'"><div id="close-popup"><i></i></div></div>');
    $('#magnify').css({
	    left: ($(document).width() - $('#magnify').outerWidth())/2,
	    // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
            top: ($(window).height() - $('#magnify').outerHeight())/2
	  });
    $('#overlay, #magnify').fadeIn('fast');
  });
  
  $('body').on('click', '#close-popup, #overlay', function(event) {
    event.preventDefault();
 
    $('#overlay, #magnify').fadeOut('fast', function() {
      $('#close-popup, #magnify, #overlay').remove();
    });
  });
});