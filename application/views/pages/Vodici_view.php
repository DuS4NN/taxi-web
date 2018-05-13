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
                    <a href="<?php echo site_url('Vodici') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Meno:</label>
                        <?php $row = $vodici[0] ?>
                        <p><?php echo !empty($row['Meno'])?$row['Meno']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Priezvisko:</label>
                        <p><?php echo !empty($row['Priezvisko'])?$row['Priezvisko']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Mesto:</label>
                        <p><?php echo !empty($row['Mesto'])?$row['Mesto']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Ulica:</label>
                        <p><?php echo !empty($row['Ulica'])?$row['Ulica']:''; ?></p>
                    </div>
                    <div class="form group">
                        <label>Rok narodenia:</label>
                        <p><?php echo !empty($row['Rok_narodenia'])?$row['Rok_narodenia']:''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</body>
</html>


