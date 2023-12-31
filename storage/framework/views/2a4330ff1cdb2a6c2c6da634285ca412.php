

<table class="table" id="dataTable" style="display: none;">
    <thead>
    <th>Year</th>
    <th>Temp</th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $logData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($item->updated_at); ?></td>
        <td><?php echo e($item->temp); ?></td>
        <td></td>
        <td></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


<div class="chart">
    <canvas id="myChart" style=" height: 50vh"></canvas>
</div>

<script>
    function BuildChart(labels, values, chartTitle) {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Our labels
                datasets: [{
                    label: chartTitle, // Name the series
                    data: values, // Our values
                    backgroundColor: [ // Specify custom colors
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [ // Add custom color borders
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1 // Specify bar border width
                }]
            },
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
            }

        });
        return myChart;
    }


    // HTML To JSON Script
    // *Forked* from https://johndyer.name/html-table-to-json/
    var table = document.getElementById('dataTable');
    var json = []; // first row needs to be headers
    var headers = [];
    for (var i = 0; i < table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
    }
    // go through cells
    for (var i = 1; i < table.rows.length; i++) {
        var tableRow = table.rows[i];
        var rowData = {};
        for (var j = 0; j < tableRow.cells.length; j++) {
            rowData[headers[j]] = tableRow.cells[j].innerHTML;
        }
        json.push(rowData);
    }
    console.log(json);
    // Map json values back to label array
    var labels = json.map(function (e) {
        return e.year;
    });
    console.log(labels);
    // Map json values back to values array
    var values = json.map(function (e) {
        return e.temp;
    });
    console.log(values);
    var chart = BuildChart(labels, values, "Temperature");
</script>
<?php /**PATH X:\BFT\Project\Laravel\project_x\resources\views/admin/devices/dataset_chart.blade.php ENDPATH**/ ?>