<div class="container">
    <div class="col-xs-12">
        <?php
            if(!empty($success_msg)){
                echo '<div class="alert alert-success"'.$success_msg;
            }elseif(!empty($error_msg)){
                echo '<div class="alert alert-danger"'.$error_msg;
            }
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?>
                    <a href="<?php echo site_url('Vodici') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a>
                </div>
                <div class="panel-body">
                    <form method="post" action="" class="form">

                        <div class="form-group">
                            <label for="title">Meno</label>
                            <input type="text" class="form-control" name="Meno" placeholder="Meno" value="<?php echo !empty($data[0]['Meno'])?$data[0]['Meno']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Priezvisko</label>
                            <input type="text" class="form-control" name="Priezvisko" placeholder="Priezvisko" value="<?php echo !empty($data[0]['Priezvisko'])?$data[0]['Priezvisko']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Mesto</label>
                            <input type="text" class="form-control" name="Mesto" placeholder="Mesto" value="<?php echo !empty($data[0]['Mesto'])?$data[0]['Mesto']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Ulica</label>
                            <input type="text" class="form-control" name="Ulica" placeholder="Ulica" value="<?php echo !empty($data[0]['Ulica'])?$data[0]['Ulica']:''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Rok Narodenia</label>
                            <input type="text" class="form-control" name="Rok_narodenia" placeholder="Rok Narodenia" value="<?php echo !empty($data[0]['Rok_narodenia'])?$data[0]['Rok_narodenia']:'' ?>">
                        </div>

                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>