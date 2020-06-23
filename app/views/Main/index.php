<?php require_once 'app/views/_global/beforeContent.php'; ?>
     
 
<main>
		<div class="hero">
			<div class="container">
				<div class="main-heading">
					<h1 class="title">E-KATALOG</h1>
					<h2 class="subtitle">najbolji laptopovi</h2>
				</div>
				
			</div>
		</div>
		
		<section class="filters">
			<div class="container">
				<form class="filter-form">
					<div class="input-group">
						<label for="naziv" class="input-label">Naziv</label>
						<input type="text" class="input" id="naziv">
					</div>
					<div class="input-group">
						<label for="operatingsystem" class="input-label">Operativni sistem</label>
						<select class="options" id="operatingsystem">
							<option value="0">Windows</option>
							<option value="0">Linux</option>							
						</select>
					</div>
					<div class="input-group">
						<label for="procesor" class="input-label">Procesor</label>
						<select class="options" id="procesor">
							<option value="0">Intel</option>
							<option value="0">AMD</option>							 
						</select>
					</div>
					<div class="input-group">
						<label for="harddisk" class="input-label">Hard disk</label>
						<select class="options" id="harddisk">
							<option value="0">HDD</option>
							<option value="0">SSD</option>							
						</select>
					</div>
					
					<div class="input-group">
						<label for="ram" class="input-label">RAM</label>
						<select class="options" id="ram">
							<option value="0">4 GB</option>
							<option value="0">8 GB</option>
							<option value="0">16 GB</option>
							<option value="0">32 GB</option> 
						</select>
					</div>
					<button type="submit" class="btn form-btn btn-purple">Pretraži
						<span class="dots"><i class="fas fa-ellipsis-h"></i></span>
					</button>
				</form>
			</div>
		</section>
		 
		<section class="laptops">
			<div class="container">
				<h5 class="section-head">
					<span class="heading">Laptopovi</span>
					<span class="sub-heading">e-katalog</span>
				</h5>
				<div class="grid laptops-grid">
					<?php foreach($DATA['laptop'] as $laptop): ?>
                	<?php require 'app/views/_global/laptop_item.php'; ?>
                	<?php endforeach; ?>
					 
				</div>
			</div>
		</section>
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
					<form method="post" action="post"  class="form contact-form">
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