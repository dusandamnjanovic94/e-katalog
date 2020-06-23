<?php require_once 'app/views/_global/beforeContent.php'; ?>
<main>
        <div class="pdp">
                <div class="sectionhero">
                        <div class="onehalf">
                        <?php foreach ($DATA['laptop_fotografija'] as $fotografija): ?>
                                <img src='<?php echo Configuration::BASE . $fotografija->fotografija; ?>' alt="<?php echo htmlspecialchars($DATA['laptop']->slug); ?>" class="logo-image">
                        <?php endforeach; ?>
                                
                        </div>
                        <div class="onehalf">
                                <h1><?php echo htmlspecialchars($DATA['laptop']->naziv_laptopa); ?></h1>
                                                          
                                <p class="price"><?php echo htmlspecialchars($DATA['laptop']->cena); ?> RSD </p>
                                <p class="freeship">+ Besplatna dostava</p>
                        </div>
                </div>
                <div class="pdpdescription">
                        <p>Opis</p>
                        <p><?php echo $DATA['laptop']->opis; ?></p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="pdptableholder">
                        <p>Specifikacija</p>
                        <div class="pdptable">
                                <div class="pdpcol">
                                        <?php foreach($DATA['laptop_specifikacije_detalji'] as $laptop_specifikacije_detalji): ?>
                                                <p> <?php echo htmlspecialchars($laptop_specifikacije_detalji->naziv_specifikacije); ?></p>                                                                                               
                                        <?php endforeach; ?>                                                                              
                                </div>
                                <div class="pdpcol">
                                <?php foreach($DATA['laptop_specifikacije_detalji'] as $laptop_specifikacije_detalji): ?>
                                        <p> 
                                                <?php echo htmlspecialchars($laptop_specifikacije_detalji->vrednost); ?>
                                        </p>                                                                                               
                                <?php endforeach; ?>                                       
                                </div>                        
                        </div>
                </div>
        </div>
</main>
 
<?php require_once 'app/views/_global/afterContent.php'; ?>
