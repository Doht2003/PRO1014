<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contry', 'VNĐ'],
                <?php
                $tongdm = count($bieude_doanhthu);
                $i = 1;
                foreach ($bieude_doanhthu as $value) {
                    extract($value);
                    if ($i == $tongdm) $dauphay = "";
                    else $dauphay = ",";
                    echo "['" . $value['ngay'] . "', " . $value['tongdoanhthu'] . "]" . $dauphay;
                    $i++;
                }

                ?>
            ]);

            var options = {
                title: 'Biểu đồ doanh thu'
            };

            var chart = new google.visualization.BarChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>