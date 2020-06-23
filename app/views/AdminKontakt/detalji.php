<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>
 
<header>
    <h2 class="page_title">Pregled detalja kontakta</h2>
</header>
<div class="content-inner table-responsive details-resp">
    <div class="form-wrapper"> 
        <nav class="well-sm">
            <p class="btn btn-sm btn-default" >
                <?php Misc::url('admin/kontakt/', 'spisak poruka'); ?>
            </p>                
            
        </nav>
        <div class="col-sm-12">
            <table class="table table-condensed table-hover centarInfo">
                <tr>
                    <td><label  class="col-sm-6 control-label">Ime</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['kontakt']->ime); ?></td>
                </tr>  
                <tr>
                    <td><label  class="col-sm-6 control-label">Email</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['kontakt']->email); ?></td>
                </tr>
                <tr>
                    <td><label  class="col-sm-6 control-label">Naslov poruke</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['kontakt']->naslov_poruke); ?></td>
                </tr>
                <tr>
                    <td><label  class="col-sm-6 control-label">Poruka</label> </td>
                    <td><?php echo htmlspecialchars(@$DATA['kontakt']->poruka); ?></td>
                </tr>
                              
            </table> 
        </div>
         
    </div>                               
</div>
 
<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>