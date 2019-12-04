</div>
<footer class="main-footer">

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="/resources/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/resources/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/resources/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/resources/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/resources/js/demo.js"></script>
<!-- DatePicker -->
<script src="/resources/js/moment.js"></script>
<script src="/resources/js/bootstrap-datetimepicker.min.js"></script>
<script src="/resources/js/global.js"></script>
<script>
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

    function del_har_add(id){
        $('.specifications').find('#add-spec-name'+id).remove();
        $('.specifications').find('#add-spec'+id).remove();

    }
</script>
</body>
</html>
