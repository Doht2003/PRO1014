<div class="nen">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="myChart" style="width:100%; max-width:600px; height:500px; background:none;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
           
            var data = google.visualization.arrayToDataTable([
                ['danhmuc', 'sosanpham'],
                <?php
                $tongdm = count($cate_bieude);
                $i = 1;
                foreach ($cate_bieude as $value) {
                    extract($value);
                    if ($i == $tongdm) $dauphay = "";
                    else $dauphay = ",";
                    echo "['" . $value['cate_name'] . "', " . $value['soluong'] . "]" . $dauphay;         
                    $i++;
                }

                ?>

            ]);

            var options = {
                title: 'Biểu đồ cơ cấu danh mục'
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
        </script>
</div>
