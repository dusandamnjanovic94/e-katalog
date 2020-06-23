<div class="grid-item featured-laptops">
    <div class="image-wrap">
        <img class="laptops-image" src="<?php echo Configuration::BASE . $laptop->fotografija[0]->fotografija; ?>" alt=""> 
        <h5 class="laptops-name"><?php echo htmlspecialchars($laptop->naziv_laptopa); ?> </h5>
    </div>
    <div class="laptops-info-wrap">
        <span class="laptops-price"><?php echo htmlspecialchars($laptop->cena); ?> <span class="currency">RSD</span></span>
        <p class="paragraph">
            <?php echo htmlspecialchars($laptop->opis); ?>
        </p>
        <a href="<?php echo Configuration::BASE ?>laptop/<?php echo $laptop->slug;?>" class="btn laptops-btn">Detaljnije &rarr;</a>
    </div>
</div>
  