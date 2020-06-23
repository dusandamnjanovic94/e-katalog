<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>

<header>
        <h2 class="page_title">Dodavanje novog laptopa</h2>
</header>
<div class="content-inner">
    <div class="form-wrapper">
                
        <nav class="well-sm">
            <p class="btn btn-sm btn-default">
                <?php Misc::url('admin/laptop/','spisak laptopova');?>
            </p>
 
        </nav>
        <form class="form-horizontal" role="form" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="naziv" class="col-sm-2 control-label">Naziv</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Naziv" pattern="[A-Z]{1}[a-z]+\ ?[0-9A-za-z]+" required>
                </div>
            </div>                         
            <div class="form-group">
                <label for="laptop_kategorija_id" class="col-sm-2 control-label">Kategorija laptopa</label>
                <div class="col-sm-10">
                    <select class="form-control" name="laptop_kategorija_id" id="laptop_kategorija_id">
                        <?php foreach ($DATA['laptop_kategorija'] as $item): ?>
                            <option value="<?php echo $item->kategorija_id; ?>"><?php echo htmlspecialchars($item->naziv_kategorije); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>    
            <div class="form-group">
                <label for="opis" class="col-sm-2 control-label">Opis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="opis" id="opis" placeholder="opis" required>
                </div>
            </div> 
            <div class="form-group">
                <label for="cena" class="col-sm-2 control-label">Cena</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="cena" pattern="[0-9]{2,}.\" required>
                </div>
            </div> 
            <div class="form-group">
                <label for="slug" class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" pattern="[a-z0-9]{4,}-[a-z0-9]+" required>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Dodaj</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <?php if (@$DATA['message']): ?> 
    <p><?php echo htmlspecialchars($DATA['message']); ?></p>
    <?php endif; ?>
<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>