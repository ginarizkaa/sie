<?php
	include "connection.php";

	$query = mysql_query("SELECT tb_jenis.id_jenis_tiket, tb_waktu.tahun as id,
CASE
WHEN tb_waktu.tahun = 2013 AND tb_jenis.id_jenis_tiket = 'AN'
THEN (SELECT SUM(tb_fakta.nilai_tiket) FROM tb_fakta JOIN tb_jenis ON tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='AN' AND tb_waktu.tahun=2013)
WHEN tb_waktu.tahun = 2014 AND tb_jenis.id_jenis_tiket = 'AN'
THEN (SELECT SUM(tb_fakta.nilai_tiket) FROM tb_fakta JOIN tb_jenis ON tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='AN' AND tb_waktu.tahun=2014)
WHEN tb_waktu.tahun = 2015 AND tb_jenis.id_jenis_tiket = 'AN'
THEN (SELECT SUM(tb_fakta.nilai_tiket) FROM tb_fakta JOIN tb_jenis ON tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='AN' AND tb_waktu.tahun=2015)
WHEN tb_waktu.tahun = 2016 AND tb_jenis.id_jenis_tiket = 'AN'
THEN (SELECT SUM(tb_fakta.nilai_tiket) FROM tb_fakta JOIN tb_jenis ON tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='AN' AND tb_waktu.tahun=2016)
END nilai
FROM tb_fakta JOIN tb_jenis ON tb_fakta.id_jenis_tiket=tb_jenis.id_jenis_tiket JOIN tb_waktu ON tb_fakta.id_waktu=tb_waktu.id_waktu
GROUP BY tb_waktu.tahun");

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
                    text: "GRAFIK NILAI TIKET BERDASARKAN JENIS TIKET ANAK 2013 - 2016"
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
	
	