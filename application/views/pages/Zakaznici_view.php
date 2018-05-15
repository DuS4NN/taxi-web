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
                    <a href="<?php echo site_url('Zakaznici') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Tel. číslo zákazníka:</label>
                        <?php $row = $zakaznici[0] ?>
                        <p><?php echo !empty($row['Tel_cislo'])?$row['Tel_cislo']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Dátum volania:</label>
                        <p><?php echo !empty($row['Datum'])?$row['Datum']:''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>


