<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Vodiči</h1>

            <table id="book-table" class="display" style="width:100%">
                <thead>
                <tr><td>ID</td><td>Meno</td><td>Priezvisko</td><td>Mesto</td><td>Ulica</td><td>Rok narodenia</td><td>Operácie</td></tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div id="chart_div" class="container">

</div>

<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {


        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Vek');
        data.addColumn('number', 'Počet');
        data.addRows([

            <?php
                foreach ($result as $value){
                    echo "['".$value['age']."',".$value['number']."],";
                }
            ?>
        ]);



        var options = {'title':'Pomer vekových skupín vodičov',
            'width':600,
            'height':500};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>


</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#book-table').DataTable({
            "ajax": {
                url : "<?php echo site_url("Vodici/books_page") ?>",
                type : 'GET'
            },

            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Pridať',
                    action: function ( e, dt, node, config ) {
                        window.location = ' <?php echo base_url('Vodici/add') ?>';
                    }
                }
                ,'csv','excel','pdf','print']
        } );
    } );
</script>

<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
