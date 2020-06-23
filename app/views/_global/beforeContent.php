<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" 
		  content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	<link rel="stylesheet" href="<?php echo Configuration::BASE;?>assets/css/styles.css" />
	
	<title>E-Katalog</title>
	
	
</head>

<body>
	<header class="header">
		<div class="container">
			<nav class="nav">
				<a href="" class="logo">
					 <img src="<?php echo Configuration::BASE;?>assets/img/logo-katalog.png" alt="e-katalog-logo">
				</a>
				<div class="hamburger-menu">
					<i class="fas fa-bars"></i>
					<i class="fas fa-times"></i>
				</div>
				<ul class="nav-list">
					<li class="nav-item">
                        <div class="nav-link">    
                            <?php Misc::url('', 'Početna'); ?>                     
                        </div>
					</li>
					<li class="nav-item">
                        <div class="nav-link">
                            <?php Misc::url('onama', 'O nama'); ?>
                        </div>
					</li>
					<li class="nav-item">
                        <div class="nav-link">
                            <?php Misc::url('laptop', 'Laptopovi'); ?>
                        </div>
					</li>
					<li class="nav-item">
                        <div class="nav-link">
                             <?php Misc::url('kontakt', 'Kontakt'); ?>
                        </div>
					</li>
				</ul>
			</nav>
		</div>
	</header>


       
				 
