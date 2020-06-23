<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>

<header>
        <h2 class="page_title">Dodavanje nove kategorije</h2>
</header>
<div class="content-inner">
    <div class="form-wrapper">
                 
        <nav class="well-sm">
            <p class="btn btn-sm btn-default">
                <?php Misc::url('admin/laptop_kategorija/','spisak kategorija');?>
            </p>

        </nav>
        <form class="form-horizontal" role="form" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="naziv_kategorije" class="col-sm-2 control-label">Naziv</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="naziv_kategorije" id="naziv_kategorije" placeholder="Naziv" pattern="[A-Z]{1}[a-z]+\ ?[0-9A-za-z]+" required>
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