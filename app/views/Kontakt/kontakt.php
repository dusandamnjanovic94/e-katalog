<?php require_once 'app/views/_global/beforeContent.php'; ?>
     
 
<main>			 
	<section class="contact">
		<div class="container">
			<h5 class="section-head">
				<span class="heading">Kontakt</span>
				<span class="sub-heading">stupite u kontakt sa nama</span>
			</h5>
			<div class="contact-content">
				<div class="traveler-wrap">
					<img src="<?php echo Configuration::BASE;?>assets/img/traveler.png" alt="">
				</div>
				<form method="post" class="form contact-form">
					<div class="input-group-wrap">
						<div class="input-group">
							<input type="text" class="input" name="ime" placeholder="Ime" required>
							<span class="bar"></span>
						</div>
						<div class="input-group">
							<input type="email" class="input" name="email" placeholder="Email" required>
							<span class="bar"></span>
						</div>
					</div>
						<div class="input-group">
							<input type="text" class="input" name="naslov_poruke" placeholder="Naslov Poruke" required>
							<span class="bar"></span>
						</div>
						<div class="input-group">
							<textarea  class="input" cols="30" rows="8" name="poruka" placeholder="Poruka" required></textarea>
							<span class="bar"></span>
						</div>
					<button type="submit" class="btn form-btn btn-purple">Pošalji
						<span class="dots"><i class="fas fa-ellipsis-h"></i></span>
					</button>
				</form>
			</div>
		</div>
	</section>
</main>	 

 
<?php require_once 'app/views/_global/afterContent.php'; ?>