<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
 
<header>
    <h2 class="page_title">Spisak slika</h2>
</header>
<div class="content-inner table-responsive">
    <div class="form-wrapper table-responsive ">
            
        <nav class="well-sm">
            <p class="btn btn-sm btn-default btnlist">
                <?php Misc::url('admin/images/laptop/' . $DATA['laptop_id'] . '/add','Dodaj novu sliku za laptop');?>
            </p>
                <p class="btn btn-sm btn-success btnlist">
                    <?php Misc::url('admin/laptop/','spisak laptopova');?>
                </p>
        </nav>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>	
                    <th>ID</th>
                    <th>Image</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($DATA['laptop_fotografija'] as $fotografija): ?>
                <tr>
                    <td><?php echo $fotografija->fotografija_id; ?></td>
                    <td>
                        <img src="<?php echo Configuration::BASE . htmlspecialchars($fotografija->fotografija) ?>" alt="img1" class="small-image">
                    </td>
                    
                    <td><?php Misc::url('admin/images/laptop/' . $DATA['laptop_id'] . '/delete/' . $fotografija->fotografija_id, 'Obriši'); ?></td>
                    
                </tr>
                <?php endforeach; ?>	
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>