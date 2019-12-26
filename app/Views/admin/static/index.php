<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Статические страницы</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped" style="font-size:14px">
                    <tr>
                        <th>Keywords Stat Ua</th>
                        <th>Keywords Stat Ru</th>
                        <th>Description Stat Ua</th>
                        <th>Description Stat Ru</th>
                        <th>Название страницы Ua</th>
                        <th>Название страницы Ru</th>
                        <th>Содержимое страницы Ua</th>
                        <th>Содержимое страницы Ru</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($static as $s) { ?>
                        <tr>
                            <td><?php echo $s['id_stat']; ?></td>
                            <td><?php echo $s['keywords_stat_ua']; ?></td>
                            <td><?php echo $s['keywords_stat_ru']; ?></td>
                            <td><?php echo $s['description_stat_ua']; ?></td>
                            <td><?php echo $s['description_stat_ru']; ?></td>
                            <td><?php echo $s['title_stat_ua']; ?></td>
                            <td><?php echo $s['title_stat_ru']; ?></td>
                            <td><?php echo mb_strimwidth($s['text_stat_ua'],0,50,'...', 'UTF-8'); ?></td>
                            <td><?php echo mb_strimwidth($s['text_stat_ru'],0,50,'...', 'UTF-8'); ?> </td>
                            <td>
                                <a href="<?php echo site_url('staticadmin/edit/' . $s['id_stat']); ?>"
                                   class="btn btn-info btn-xs">Edit</a>

                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
