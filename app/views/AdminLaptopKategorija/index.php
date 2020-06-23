<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
<article class="row">
    <header>
        <h1>Spisak  kategorija laptopova</h1>
    </header>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <td colspan="4" class="align-right">
                    <?php Misc::url('admin/laptop_kategorija/add/', 'Dodaj novu laptop kategoriju'); ?>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                    <th>Naziv</th>               
                    <th>Opcije</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($DATA['laptop_kategorija'] as $laptop_kategorija): ?>
                <tr>
                    <td><?php echo $laptop_kategorija->kategorija_id; ?></td>
                    <td><?php echo htmlspecialchars($laptop_kategorija->naziv_kategorije); ?></td>                    		                                                            
                    
                    <td><?php Misc::url('admin/laptop_kategorija/edit/' . $laptop_kategorija->kategorija_id, 'Izmeni'); ?></td>
                    <td><?php Misc::url('admin/laptop_kategorija/delete/' . $laptop_kategorija->kategorija_id, 'Ukloni'); ?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</article> 

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>