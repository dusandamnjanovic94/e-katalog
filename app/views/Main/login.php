
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E Katalog | Administratorski panel</title>
  
    <link href="<?php echo Configuration::BASE; ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo Configuration::BASE; ?>assets/css/main.css" rel="stylesheet">

</head>
<body>
    
    <div class="container-fluid display-table login-page">
        <div class="row display-table-row">
               
            <div class="col-md-10 col-sm-11 display-table-cell valign-top" >
                <div class="row">
                    <header id="nav-header" class="clearfix login-header">
                        <div class="col-md-12 login-msg">
                            <ul>
                                <li class="hidden-xs log-welcome">Dobrodošli na admin panel e katalog. Molimo Vas da se prijavite.</li>
                            </ul>
                        </div>
                    </header>
                </div>
                <div class="col-md-12 ">
                    <form class="login-form" method="post">
                        <table class="table table-condensed table-hover">
                            <tr>
                                <td>
                                    <label class="login-lable">Korisničko ime</label>
                                </td>
                                <td>
                                    <input type="text" class="login-input" name="username" id="f1_username" required pattern="^[a-z0-9]{4,}$" placeholder="Korisničko ime"> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="login-lable">Šifra</label>
                                </td>
                                <td>
                                    <input class="login-input" type="password" name="password" id="f1_password" required pattern="^.{5,}$" placeholder="Šifra">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Prijavi se</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                    <div class="row">
                        <footer id="admin-footer" class="clearfix login-footer">
                            <div><b>Sva prava zadržana </b>&copy; 2020</div>
                        </footer>
                    </div>
                </div>
        </div>
</div>
 

<!-- /.login-box -->

<script src="<?php echo Configuration::BASE; ?>assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo Configuration::BASE; ?>assets/js/bootstrap.min.js"></script>
<!-- Responsive menu -->
<script src="<?php echo Configuration::BASE; ?>assets/js/default.js"></script>

</body>
</html>
