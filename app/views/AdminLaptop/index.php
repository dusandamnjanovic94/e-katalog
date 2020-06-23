<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
<article class="row">
    <header>
        <h1>Spisak laptopova   </h1>
    </header>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <td colspan="4" class="align-right">
                    <?php Misc::url('admin/laptop/add/', 'Dodaj novi laptop'); ?>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                    <th>Naziv</th>
                    <th>Kategorija</th>
                    <th>Opis</th>
                    <th>Cena</th>                    
                    <th>Opcije</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($DATA['laptop'] as $laptop): ?>
                <tr>
                    <td><?php echo $laptop->laptop_id; ?></td>
                    <td><?php echo htmlspecialchars($laptop->naziv_laptopa); ?></td>
                    
                    <td><?php echo htmlspecialchars($laptop->kat); ?></td>
                    <td><?php echo htmlspecialchars($laptop->opis); ?></td>
                    <td><?php echo htmlspecialchars($laptop->cena); ?></td>
		
                    
                    
                    
                    
                    <td><?php Misc::url('admin/laptop/detalji/' . $laptop->laptop_id, 'Detalji'); ?></td>
                    <td><?php Misc::url('admin/images/laptop/' . $laptop->laptop_id, 'Slika'); ?></td>
                    <td><?php Misc::url('admin/laptop/edit/' . $laptop->laptop_id, 'Izmeni'); ?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</article> 

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>