<?php include 'app/views/_global/beforeContentAdmin.php'; ?>

<article class="row">
    <header>
        <h1>Izmena kategorije laptopa</h1>
    </header>
    
    <form method="post">
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="naziv">Naziv</label>
            <div class="col-sm-10">
            <input class="form-control" type="text" name="naziv" id="naziv"    value="<?php echo htmlspecialchars($DATA['laptop_kategorija']->naziv_kategorije); ?>"><br>
            </div>
        </div>
                         
        <button type="submit">Izmeni kategoriju </button>
    </form>
    <?php if(@$DATA['message']): ?>
    <p>
        <?php echo htmlspecialchars($DATA['message']); ?>
    </p>
    <?php endif; ?>
</article>

<?php include 'app/views/_global/afterContentAdmin.php'; ?>