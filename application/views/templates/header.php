<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        <link rel="icon" href="images/favicon.ico">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
<body class="" id="top">
    <div class="main">
        <header>
            <div class="menu_block">
                <div class="container_12">
                    <div class="grid_12">
                        <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                            <ul class="sf-menu">
                                <li><a href="<?php echo site_url('Main')  ?>">Home</a></li>
                                <li <?php if($title=='Drivers')echo 'class="current"';  ?>><a href="<?php echo site_url('Vodici')  ?>">Drivers</a></li>
                                <li <?php if($title=='Cars')echo 'class="current"';  ?>><a href="<?php echo site_url('Auta')  ?>">Cars</a></li>
                                <li <?php if($title=='Rides')echo 'class="current"';  ?>><a href="<?php echo site_url('Jazda')  ?>">Rides</a></li>
                                <li <?php if($title=='Customers')echo 'class="current"';  ?>><a href="<?php echo site_url('Zakaznici')  ?>">Customers</a></li>
                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container_12">
                <div class="grid_12">
                    <h1>
                        <a href="<?php echo site_url('Main')  ?>">
                            <img src="images/logo.png" alt="Your Happy Family">
                        </a>
                    </h1>
                </div>
            </div>
            <div class="clear"></div>
        </header>

