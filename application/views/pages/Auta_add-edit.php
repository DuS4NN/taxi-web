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
                <div class="panel-heading"><?php echo $action; ?>
                    <a href="<?php echo site_url('Auta') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <form method="post" action="" class="form">

                        <div class="form-group">
                            <label for="title">Značka</label>
                            <input type="text" class="form-control" name="Znacka" placeholder="Znacka" value="<?php echo !empty($data[0]['Znacka'])?$data[0]['Znacka']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Model</label>
                            <input type="text" class="form-control" name="Model" placeholder="Model" value="<?php echo !empty($data[0]['Model'])?$data[0]['Model']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Rok výroby</label>
                            <input type="text" class="form-control" name="Rok_Vyroby" placeholder="Rok_Vyroby" value="<?php echo !empty($data[0]['Rok_Vyroby'])?$data[0]['Rok_Vyroby']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Rok Narodenia</label>
                            <input type="text" class="form-control" name="SPZ" placeholder="SPZ" value="<?php echo !empty($data[0]['SPZ'])?$data[0]['SPZ']:'' ?>">
                        </div>

                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>