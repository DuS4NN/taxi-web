<div class="container">
    <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg;
                ?></div>
        </div>
    <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"> <?php echo $error_msg; ?> </div>
        </div>
    <?php } ?>

    <div class="row">
        <h1>Zoznam vodičov</h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Vodici <a href="<?php echo base_url('Vodici/add') ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                    <table class="table table-striped">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Meno</th>
                                <th width="20%">Priezvisko</th>
                                <th width="20%">Mesto</th>
                                <th width="25%">Ulica</th>
                                <th width="10%">Rok narodenia</th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                                <th width="5%"></th>
                            </tr>

                            <?php
                            if(!empty($vodici)){
                                foreach ($vodici as $key => $value){
                                    echo '<tr>';
                                    echo '<td>'.$value->ID .'</td>';
                                    echo '<td>'.$value->Meno .'</td>';
                                    echo '<td>'.$value->Priezvisko .'</td>';
                                    echo '<td>'.$value->Mesto .'</td>';
                                    echo '<td>'.$value->Ulica .'</td>';
                                    echo '<td>'.$value->Rok_narodenia .'</td>';

                                    echo '<td> <a href="'.base_url('Vodici/view/'.$value->ID).'" class="glyphicon glyphicon-eye-open" ></a></td>';
                                    echo '<td> <a href="'.base_url('Vodici/edit/'.$value->ID).'" class="glyphicon glyphicon-edit" ></a></td>';
                                    echo '<td> <a href="'.base_url('Vodici/delete/'.$value->ID).'"  class="glyphicon glyphicon-trash" onclick="return confirm(\'Naozaj chcete vymazať túto položku?\')"></a></td>';

                                    echo '</tr>';
                                }
                            }else{
                                echo '<tr><td colspan="4">Vodici sa nenasli</td></tr>';
                            }
                            ?>

                    </table>
                </div>
            <div id="pagination" style="align-content: center">
                <ul class="pagination">
                    <?php foreach ($links as $link) {
                        echo "<li class=\"page-item\">". $link."</li>";
                    } ?>
            </div>
            </div>
        </div>
    </div>
</div>


