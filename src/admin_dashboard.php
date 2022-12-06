<?php 
    require 'config.php';
    include_once('controller/tb_file/get.php');
    $tb_file_chart = new tb_file();
    $dataPoints = $tb_file_chart->chart(); 
    foreach($dataPoints as $row){
        $x[] = $row['x'];
        $y[] = $row['y'];
    }
    $tb_file_total = new tb_file();
    $list_file = $tb_file_total->rankFile(); 
?>
    <div class="chart-js" style="height: 350px; ">
        <canvas id="myChart" style=" height: 350px; width: 100%;"></canvas>
    </div>
    <div class="row mt-3" style="padding: 8px;">
        <label for="">Ranking File List</label>
        <div class="col-6 " style="border: 1px solid darkgray; border-radius: 10px; padding: 5px; text-align: center;">
            <table class="table table-borderless" id="dtBasicExample" >
                <thead>
                    <tr>
                        <th scope="col">#ranking</th>
                        <th scope="col">File Type</th>
                        <th scope="col">Total File</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php
                        $index = 1;
                        foreach($list_file as $row){ 
                    ?>
                        <tr>
                            <th><?php echo $index++ ?></th>
                            <td><?php echo $row['file_type'] ?></td>
                            <td><?php echo $row['totalFile'] ?></td>
                        </tr>
                    <?php  }  ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const data = {
            labels: <?php echo json_encode($x); ?>,
            datasets: [{
                label: 'Chart All Files',
                data: <?php echo json_encode($y); ?>,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ], borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
