<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="col-xs-12">
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detail
                    <a href="<?php echo site_url('Jazda') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Počet kilometrov:</label>
                        <?php $row = $jazda[0] ?>
                        <p><?php echo !empty($row['Pocet_KM'])?$row['Pocet_KM']:''; ?></p>
                    </div>
                    <div class="Cena group">
                        <label>Model:</label>
                        <p><?php echo !empty($row['Cena'])?$row['Cena']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Odkiaľ:</label>
                        <p><?php echo !empty($row['Odkial'])?$row['Odkial']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Kam:</label>
                        <p><?php echo !empty($row['Kam'])?$row['Kam']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Čas vyzdvihnutia:</label>
                        <p><?php echo !empty($row['Cas_vyzdvihnutia'])?$row['Cas_vyzdvihnutia']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Čas vysadenia:</label>
                        <p><?php echo !empty($row['Cas_vysadenia'])?$row['Cas_vysadenia']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Číslo zákazníka:</label>
                        <p><?php echo !empty($row['Tel_cislo'])?$row['Tel_cislo']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Meno šoféra:</label>
                        <p><?php echo !empty($row['Meno'])?$row['Meno']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Priezvisko šoféra:</label>
                        <p><?php echo !empty($row['Priezvisko'])?$row['Priezvisko']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Značka auta:</label>
                        <p><?php echo !empty($row['Znacka'])?$row['Znacka']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Model auta:</label>
                        <p><?php echo !empty($row['Model'])?$row['Model']:''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>


