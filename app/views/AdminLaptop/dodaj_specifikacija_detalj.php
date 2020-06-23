<?php require_once 'app/views/_global/beforeContentAdmin.php'; ?>

<header>
    <h2 class="page_title">Dodavanje specifikacije laptop</h2>
</header>
<div class="content-inner newstylekvant">
    <div class="form-wrapper">
        <nav class="well-sm addbtn">
                <p class="btn btn-sm btn-default listing"> 
                    <?php Misc::url('admin/laptop/','spisak laptopova');?>
                </p>
        </nav>

        <form method="post" class="form-horizontal" role="form" >
            <div class="form-group">
            <div class="col-sm-10">
                <table class="table table-condensed table-hover" id="customFields">
                    <tr class="valcss">
                        <th scope="row"><label>Izaberite specifikaciju</label></th>
                        <td>
                            <input id="input" type="text" class="code" value="" placeholder="Pretraga liste" /> <br/>
                            <select  class="form-control addinput" name="laptop_specifikacija_id[]" id="lista" size="5">
                            <?php foreach ($DATA['laptop_specifikacija_id'] as $item): ?>
                                <option value="<?php echo $item->specifikacija_id; ?>">
                                    <?php echo htmlspecialchars($item->naziv_specifikacije); ?>
                                </option>
                             <?php endforeach; ?>
                            </select>
                          
                            <input type="text" class="form-control addinput" name="vrednost" id="vrednost" placeholder="Unesi vrednost" required >
                        </td>
                    </tr>
                </table>
            </div>
               <!-- <div class="col-sm-12">
                <br><a href="javascript:void(0);" class="addCF">Dodaj jos jednu specifikaciju</a>
                </div>-->
            <br> <br>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-default">Dodaj</button>
        </div>
        </div>

        
        </form>
    </div>
</div>
    <script>
   $(document).ready(function(){
        $(".addCF").click(function(){
            $("#customFields").append('<tr valign="top"><th scope="row"><label>Izaberite  detalj</label></th><td><input id="input" type="text" class="code" value="" placeholder="Pretraga liste" /> <br/><select  class="form-control addinput" name="laptop_specifikacija_id[]" id="lista" size="5"><?php foreach ($DATA['laptop_specifikacija_id'] as $item): ?><option value="<?php echo $item->laptop_specifikacija_id; ?>"><?php echo htmlspecialchars($item->naziv_specifikacije); ?></option><?php endforeach; ?></select><input type="text" class="form-control addinput" name="vrednost" id="vrednost" placeholder="Unesi vrednost" required ></td></tr>');
        });
        $("#customFields").on('click','.remCF',function(){
            $(this).parent().parent().remove();
        });
    });
</script>
<!--<script>
$("#lista").change(function(){
    if($(this).val() == 1){
      $("#vrednost").show();
      $("#vrednost2").hide();
    }else if ($(this).val() == 2) {
      $("#vrednost2").show();
      $("#vrednost").hide();
      
    }else{
    $("#vrednost").hide();
    $("#vrednost2").hide();
    }
    
});
</script>-->

    <?php if (@$DATA['message']): ?> 
    <p><?php echo htmlspecialchars($DATA['message']); ?></p>
    <?php endif; ?>
    
     <script src="<?php echo Configuration::BASE;?>assets/js/script-dodajKvantDetalj.js"></script>   

<?php require_once 'app/views/_global/afterContentAdmin.php'; ?>