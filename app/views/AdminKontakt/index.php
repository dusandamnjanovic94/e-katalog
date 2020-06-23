<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
<article class="row">
    <header>
        <h1>Spisak  poruka</h1>
    </header>
    <table class="table table-hover table-condensed">
        <thead>
            
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Email</th>               
                <th>Naslov poruke</th>               

                <th>Opcije</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($DATA['kontakt'] as $kontakt): ?>
                <tr>
                    <td><?php echo $kontakt->kontakt_id; ?></td>
                    <td><?php echo htmlspecialchars($kontakt->ime); ?></td>
                    <td><?php echo htmlspecialchars($kontakt->email); ?></td>
                    <td><?php echo htmlspecialchars($kontakt->naslov_poruke); ?></td>                   		                                                            
                                        
                    <td><?php Misc::url('admin/kontakt/delete/' . $kontakt->kontakt_id, 'Ukloni'); ?></td>
                    <td><?php Misc::url('admin/kontakt/detalji/' . $kontakt->kontakt_id, 'Detalji'); ?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</article> 

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>