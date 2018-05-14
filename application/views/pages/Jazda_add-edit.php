<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

</head>
<body>
<div class="container">
    <div class="col-xs-12">
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?>
                    <a href="<?php echo site_url('Jazda') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <form method="post" action="" class="form">

                        <div class="form-group">
                            <label for="title">Počet Kilometrov</label>
                            <input type="text" class="form-control" name="Pocet_KM" placeholder="Pocet_KM" value="<?php echo !empty($data[0]['Pocet_KM'])?$data[0]['Pocet_KM']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Cena</label>
                            <input type="text" class="form-control" name="Cena" placeholder="Cena" value="<?php echo !empty($data[0]['Cena'])?$data[0]['Cena']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Odkiaľ</label>
                            <input type="text" class="form-control" name="Odkial" placeholder="Odkial" value="<?php echo !empty($data[0]['Odkial'])?$data[0]['Odkial']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Kam</label>
                            <input type="text" class="form-control" name="Kam" placeholder="Kam" value="<?php echo !empty($data[0]['Kam'])?$data[0]['Kam']:'' ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Čas vyzdvihnutia</label>
                            <div id="datetimepicker" class="input-append date" >
                                <input type="text" name="Cas_vyzdvihnutia" placeholder="Cas_vyzdvihnutia" value="<?php echo !empty($data[0]['Cas_vyzdvihnutia'])?$data[0]['Cas_vyzdvihnutia']:'' ?>">
                                <span class="add-on" >
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Čas vysadenia</label>
                            <div id="datetimepicker2" class="input-append date">
                                <input type="text" name="Cas_vysadenia" placeholder="Cas_vysadenia" value="<?php echo !empty($data[0]['Cas_vysadenia'])?$data[0]['Cas_vysadenia']:'' ?>">
                                <span class="add-on" >
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                </span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="title">Zákazník</label><br>
                            <select class="form-control" name='Zakaznici_ID' placeholder='Zakaznici_ID'>
                                <?php
                                foreach ($zakaznik as $row){
                                    if($data[0]['Zakaznici_ID']==$row['ID']){
                                        echo "<option value='".$row['ID']."' selected>".$row['Tel_cislo']."</option>";
                                    }else{
                                        echo "<option value='".$row['ID']."'>".$row['Tel_cislo']."</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="title">Smena</label>
                            <select class="form-control" name='Vodici_smena_ID' placeholder='Vodici_smena_ID'>
                                <?php
                                foreach ($smeny as $row){
                                    if($data[0]['Vodici_smena_ID']==$row['ID']){
                                        echo "<option value='".$row['ID']."' selected>".$row['Zaciatok']." ".$row['Koniec']." ".$row['Meno']." ".$row['Priezvisko']." ".$row['Znacka']." ".$row['Model']."</option>";
                                    }else{
                                        echo "<option value='".$row['ID']."' >".$row['Zaciatok']." ".$row['Koniec']." ".$row['Meno']." ".$row['Priezvisko']." ".$row['Znacka']." ".$row['Model']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
<script type="text/javascript"
        src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
</script>
<script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
</script>
<script type="text/javascript"
        src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
</script>
<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss'
    });
</script>

<script type="text/javascript">
    $('#datetimepicker2').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss'
    });
</script>

</body>
</html>

