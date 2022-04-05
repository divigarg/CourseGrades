<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var gd_str = '<?php echo $gd_str; ?>';
        var gd = JSON.parse(gd_str);
        console.log(gd);
        var gd_arr = [
            ['Grades', 'Number of Students']
        ];

        for (const [key, value] of Object.entries(gd)) {
            gd_arr.push([key, value]);
        }

        var data = google.visualization.arrayToDataTable(gd_arr);
        var count = data.getNumberOfRows();
        var values = Array(count).fill().map(function(v, i) {
            return data.getValue(i, 1);
        });
        values.forEach(function(v, i) {
            var key = data.getValue(i, 0);
            var val = data.getValue(i, 1);
            data.setFormattedValue(i, 0, key + ' : ' + val + ' Students');
        });

        var options = {
            title: 'Grade Distribution',
            chartArea: {
                width: 400,
                height: 444
            },
            titlePosition: 'none',
            is3D: true,

            legend: {
                alignment: 'center',
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        function resize() {
            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }

        window.onload = resize;
        window.onresize = resize;
    }
</script>

<!-- <div class="container justify-content-center"> -->
<!-- <div class="container"> -->
<div class="container" id="piechart_3d"></div>
<!-- </div> -->
<!-- </div> -->