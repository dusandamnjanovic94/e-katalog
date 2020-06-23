<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>

<header>
        <h2 class="page_title">Dodavanje nove slike</h2>
</header>
<div class="content-inner">
        <div class="form-wrapper">
                
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Izaberite sliku</label>
                                <div class="col-sm-10">
                                        <input type="file" class="form-control" name="fotografija" id="image"  required>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-default">Dodaj sliku</button>
                                </div>
                        </div>
                </form>
        </div>
</div>
    

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>