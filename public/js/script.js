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
                items: 8
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
        item:4
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

////////////////////////////////////
function sel_spec() {
    event.preventDefault();
    var spec = $('#add-spec-name').val();

    $.ajax({
        url: 'http://maslo.loc/productadmin/sel_spec',
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
$('.add-spec').on('click',function(){
    var name = $('#add-spec-name').val();
    var prod = $('#pid').val();
    var val = $('#add-spec-val').val();
    $.ajax({
        url: 'http://maslo.loc/productadmin/savehar',
        type: 'post',
        data: {name: name,prod:prod,val:val},
        success: function (html) {

            alert('Характеристика сохранена');
            location.reload();
        },

    })
});
$('#add-har').on('click',function(){

    $.ajax({
        url: 'http://maslo.loc/productadmin/addhar',
        type: 'post',
        dataType:'json',
        success: function (html) {
            var count = $('.cats').length + 1;
            $('.specifications').append('<select name="add-spec-name[]" id="add-spec-name'+count+'" class="cats" onchange="sel_specc('+count+');"><option >Выбрать наименование х-ки</option>');

            for (var i = 0; i < html.id.length; i++) {
                $('#add-spec-name'+count).append("<option value='" + html.id[i] + "'>" + html.name[i] + "</option>");
            }

            $('.specifications').append('</select><select name="add-spec[]" id="add-spec'+count+'" ><option >Выбрать характеристику</option>');
            $('.specifications').append('</select><button type="button" class="close" style="color: #f50202;" aria-label="Close" \n' +
                '                                            onclick="del_har_add('+count+')"><span aria-hidden="true">&times;</span>\n' +
                '                                            </button><br>');

        },

    })

});

function sel_specc(count) {
    event.preventDefault();
    var spec = $('#add-spec-name'+count).val();

    $.ajax({
        url: 'http://maslo.loc/productadmin/sel_spec',
        type: 'post',
        dataType: 'json',
        data: {spec: spec},
        success: function (html) {
            $('#add-spec'+count+' option').remove();
            $('#add-spec'+count).append("<option >Выбрать характеристику</option>");
            for (var i = 0; i < html.length; i++) {
                $('#add-spec'+count).append("<option value='" + html[i].id + "'>" + html[i].val_feature_ru + "</option>");
            }

        },

    })
}

function to_sub_cat() {
    event.preventDefault();
    var spec = $('#category').val();

    $.ajax({
        url: 'http://maslo.loc/productadmin/sel_sub',
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
        url: 'http://maslo.loc/productadmin/sel_sub',
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

function del_har_edit(id_prod,id_name_har){

    $.ajax({
        url: '/productadmin/del_har_edit',
        type: 'post',
        dataType: 'json',
        data: {id_prod:id_prod,id_name_har:id_name_har},
        success: function (html) {

            alert('Характеристика удалена');
            location.reload();

        },

    })

}
function del_val_edit(id_feature){

    $.ajax({
        url: '/feature/del_val',
        type: 'post',
        dataType: 'json',
        data: {id:id_feature},
        success: function (html) {

            alert('Значение характеристики удалено');
            location.reload();

        },

    })

}

function del_har_add(id){
    $('.specifications').find('#add-spec-name'+id).remove();
    $('.specifications').find('#add-spec'+id).remove();

}

$('#add-val').on('click', function(){
    $.ajax({
        url: '/feature/save_val_har',
        type: 'post',
        dataType: 'json',
        data: {ua:$('#val_ua').val(),ru:$('#val_ru').val(),id:$('#id').val()},
        success: function (html) {

            alert('Сохранено');
            location.reload();

        },

    })
});

$('#add-val-field').on('click',function(){

    $('.val-new').append(' <div class="col-md-6">\n' +
        '                        <input type="text" name="val_har_ua[]" value="" class="form-control" id=""/>\n' +
        '                    </div>\n' +
        '                    <div class="col-md-6">\n' +
        '                        <input type="text" name="val_har_ru[]" value="" class="form-control" id=""/>\n' +
        '                    </div>');
});