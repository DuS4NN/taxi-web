<div class="container">
    <div class="row">
        <div class="panel-heading">Detaily vodiča <a href="<?php echo base_url('Vodici') ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
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