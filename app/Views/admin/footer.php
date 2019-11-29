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
                $('#add-spec').append("<option >Выбрать характеристику</option>");
                for (var i = 0; i < html.length; i++) {
                    $('#add-spec').append("<option value='" + html[i].id + "'>" + html[i].val_feature_ru + "</option>");
                }

            },

        })
    }
    $('.add-spec').on('click',function(){
        var name = $('#add-spec').val();
        var prod = $('#pid').val();
        $.ajax({
            url: 'http://maslo.loc/productadmin/savehar',
            type: 'post',
            data: {name: name,prod:prod},
            success: function (html) {

                alert('Характеристика сохранена');
                location.reload();
            },

        })
    });
</script>
</body>
</html>
