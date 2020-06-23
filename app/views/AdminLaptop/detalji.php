<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
 
<header>
    <h2 class="page_title">Pregled detalja</h2>
</header>
<div class="content-inner table-responsive details-resp">
    <div class="form-wrapper"> 
        <nav class="well-sm">
            <p class="btn btn-sm btn-default" >
                <?php Misc::url('admin/laptop/', 'spisak laptopova'); ?>
            </p>                
            <p class="btn btn-sm btn-success">
                <?php Misc::url('admin/laptop/detalji/dodaj_specifikacija_detalj/' . $DATA['laptop']->laptop_id, 'Dodaj specifikaciju  '); ?>
            </p>
        </nav>
        <div class="col-sm-12">
            <table class="table table-condensed table-hover centarInfo">
                <tr>
                    <td><label  class="col-sm-6 control-label">Naziv laptopa</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['laptop']->naziv_laptopa); ?></td>
                </tr>  
                <tr>
                    <td><label  class="col-sm-6 control-label">Naziv kategorije</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['laptop']->kat); ?></td>
                </tr>
                <tr>
                    <td><label  class="col-sm-6 control-label">Opis laptopa</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['laptop']->opis); ?></td>
                </tr>
                <tr>
                    <td><label  class="col-sm-6 control-label">Cena</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['laptop']->cena); ?></td>
                </tr>
                <tr>
                    <td><label  class="col-sm-6 control-label">Slug</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['laptop']->slug); ?></td>
                </tr>                
            </table> 
        </div>
        <div class="form-wrapper">
      
            <h3 class="naslov">Specifikacija laptopa</h3>
            <table class="table table-condensed table-hover centarInfo">
                <thead>
                    <tr>	
                        <th>Specifikacija</th>
                        <th>Vrednost</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($DATA['laptop_specifikacije_detalji'] as $laptop_specifikacije_detalji): ?>
                <tr>
                    <td><?php echo htmlspecialchars($laptop_specifikacije_detalji->naziv_specifikacije); ?></td>
                    <td><?php echo htmlspecialchars($laptop_specifikacije_detalji->vrednost); ?></td>
                </tr>
                <?php endforeach; ?>	
            </tbody>
            </table>
        </div>
    </div>                               
</div>
 
<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>