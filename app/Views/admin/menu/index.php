<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menu Listing</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('menu/add'); ?>" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
            <div class="row ">
                <div class="col-1"></div>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Родитель</th>
                        <th>Наименование Ru</th>
                        <th>Наименование Ua</th>
                        <th></th>
                    </tr>
                    <?php
                    echo $mmm;
                    ?>
                </table>

            </div>
        </div>
    </div>
</div>


