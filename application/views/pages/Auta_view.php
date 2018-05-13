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
                    <a href="<?php echo site_url('Auta') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Značka:</label>
                        <?php $row = $auta[0] ?>
                        <p><?php echo !empty($row['Znacka'])?$row['Znacka']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Model:</label>
                        <p><?php echo !empty($row['Model'])?$row['Model']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Rok výroby:</label>
                        <p><?php echo !empty($row['Rok_Vyroby'])?$row['Rok_Vyroby']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>SPZ:</label>
                        <p><?php echo !empty($row['SPZ'])?$row['SPZ']:''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>


