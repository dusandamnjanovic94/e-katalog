<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E katalog</title>
        
        
        <link href="<?php echo Configuration::BASE;?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Configuration::BASE;?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
         
        <link href="<?php echo Configuration::BASE;?>assets/css/mobile.css" rel="stylesheet">
      
      
        <link rel="stylesheet" href="<?php echo Configuration::BASE;?>assets/css/2035.responsive.css">
    
      
        
        
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo Configuration::BASE;?>assets/js/bootstrap.min.js" ></script>
        
        <script src="<?php echo Configuration::BASE;?>assets/js/laptop_valid.js"></script>
        <script src="<?php echo Configuration::BASE;?>assets/js/kategorija_valid.js"></script>

        </head>
   <body>
    <div class="container">
        <header>
            <nav>
                <?php if (Session::exists('user_id')): ?>
                    <?php include 'app/views/_global/menu-session.php'; ?>
                <?php else: ?>
                    <?php include 'app/views/_global/menu-no-session.php'; ?>
                <?php endif; ?>
            </nav>
        </header>
        <section>
                   
