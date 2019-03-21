<?php
	include "connection.php";

    $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

    if ($kelas=="") {
    	$query = mysql_query("SELECT tb_kelas.ket_kelas x, sum(tb_fakta.nilai_tiket) y FROM tb_kelas, tb_fakta WHERE tb_kelas.id_kelas_tiket=tb_fakta.id_kelas_tiket GROUP BY tb_kelas.id_kelas_tiket ORDER BY sum(tb_fakta.nilai_tiket) DESC");
    }
    elseif ($kelas=="1A") {
        $query = mysql_query("SELECT tb_waktu.tahun x, SUM(tb_fakta.nilai_tiket) y FROM tb_fakta JOIN tb_kelas ON tb_fakta.id_kelas_tiket=tb_kelas.id_kelas_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_kelas.id_kelas_tiket='1A' GROUP BY tb_kelas.id_kelas_tiket, tb_waktu.tahun");
    }elseif ($kelas=="2A") {
        $query = mysql_query("SELECT tb_waktu.tahun x, SUM(tb_fakta.nilai_tiket) y FROM tb_fakta JOIN tb_kelas ON tb_fakta.id_kelas_tiket=tb_kelas.id_kelas_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_kelas.id_kelas_tiket='2A' GROUP BY tb_kelas.id_kelas_tiket, tb_waktu.tahun");
    }elseif ($kelas=="EK") {
        $query = mysql_query("SELECT tb_waktu.tahun x, SUM(tb_fakta.nilai_tiket) y FROM tb_fakta JOIN tb_kelas ON tb_fakta.id_kelas_tiket=tb_kelas.id_kelas_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_kelas.id_kelas_tiket='EK' GROUP BY tb_kelas.id_kelas_tiket, tb_waktu.tahun");
    }
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
                    text: "GRAFIK NILAI TIKET BERDASARKAN JENIS TIKET 2013 - 2016"
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
                                echo '{"label":"'.$row['x'].'", "y":'.$row['y'].'}';
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
	
	