<?php
	include "connection.php";

	$query = mysql_query("SELECT tb_kapal.id_kapal id, sum(tb_fakta.nilai_tiket) as nilai FROM tb_kapal, tb_fakta WHERE tb_kapal.id_kapal=tb_fakta.id_kapal GROUP BY tb_kapal.id_kapal ORDER BY sum(tb_fakta.nilai_tiket) DESC LIMIT 7");

	$baris = mysql_num_rows($query);

?>
<!DOCTYPE html>
<html>
<head>
	
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
    <div id="chartContainer" style="height: 400px; width: auto;"></div>

</body>
	<script type="text/javascript">
		//start load chart
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "GRAFIK KAPAL 2013 - 2016"
                },
                axisY: {
                    includeZero: true
                },
                axisX: {
                    title: "Nilai Tiket"
                },
                data: [{
                    type: "column",
                    dataPoints: 
                        [<?php 
                            $i = 1;
                            while($row = mysql_fetch_array($query)){
                                echo '{"label":"'.$row['id'].'", "y":'.$row['nilai'].'}';
                                if($i != $baris) {
                                    echo ",";
                                }
                                $i++;
                            }
                        ?>]
                }]
            });
            chart.render();
            //end load chart	
	</script>
</html>
	
	