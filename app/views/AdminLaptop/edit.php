<?php include 'app/views/_global/beforeContentAdmin.php'; ?>

<article class="row">
    <header>
        <h1>Izmena laptopa</h1>
    </header>
    
    <form method="post">
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="naziv">Naziv</label>
            <div class="col-sm-10">
            <input class="form-control" type="text" name="naziv" id="naziv"    value="<?php echo htmlspecialchars($DATA['laptop']->naziv_laptopa); ?>"><br>
            </div>
        </div>
        <div class="form-group">
            <label for="laptop_kategorija_id" class="col-sm-2 control-label">Laptop kategorija</label>
            <div class="col-sm-10">
                <select class="form-control addinput" name="laptop_kategorija_id" id="laptop_kategorija_id" >
                    <?php foreach ($DATA['laptop_kategorija'] as $item): ?>
                        <option value="<?php echo $item->kategorija_id; ?>"><?php echo htmlspecialchars($item->naziv_kategorije); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="opis">Opis</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="opis" id="opis"    value="<?php echo htmlspecialchars($DATA['laptop']->opis); ?>"><br>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cena">Cena</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="cena" id="cena"    value="<?php echo htmlspecialchars($DATA['laptop']->cena); ?>"><br>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="slug">Slug</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="slug" id="slug"    value="<?php echo htmlspecialchars($DATA['laptop']->slug); ?>"><br>
            </div>
        </div>                 
        <button type="submit">Izmeni laptop </button>
    </form>
    <?php if(@$DATA['message']): ?>
        <p>
            <?php echo htmlspecialchars($DATA['message']); ?>
        </p>
    <?php endif; ?>
</article>

<?php include 'app/views/_global/afterContentAdmin.php'; ?>