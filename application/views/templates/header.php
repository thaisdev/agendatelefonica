<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agenda telefônica</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap plugin -->
        <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Datatables -->
        <link href="<?php echo base_url(); ?>assets/css/plugins/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Fontawesome all plugin -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- My custom style -->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contatos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content page -->
        <div class="container pd-content">