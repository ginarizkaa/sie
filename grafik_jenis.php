<?php
	include "connection.php";

    //$jenis = $_GET['jenis'];
    $jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';

    if ($jenis=="") {    
        $query = mysql_query("SELECT tb_jenis.ket_jenis_tiket x, sum(tb_fakta.nilai_tiket) as y FROM tb_jenis, tb_fakta  WHERE tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket GROUP BY tb_jenis.id_jenis_tiket ORDER BY sum(tb_fakta.nilai_tiket) ASC");
        $judul = "NILAI TIKET BERDASARKAN JENIS TIKET";
    }
    elseif ($jenis=="AN") {
        $query = mysql_query("SELECT tb_waktu.tahun x, SUM(tb_fakta.nilai_tiket) y FROM tb_fakta JOIN tb_jenis ON tb_fakta.id_jenis_tiket=tb_jenis.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='AN' GROUP BY tb_jenis.id_jenis_tiket, tb_waktu.tahun ");
        $judul = "DRILLDOWN NILAI TIKET BERDASARKAN JENIS TIKET ANAK";
    }
    elseif ($jenis=="DWS") {
        $query = mysql_query("SELECT tb_waktu.tahun x, SUM(tb_fakta.nilai_tiket) y FROM tb_fakta JOIN tb_jenis ON tb_fakta.id_jenis_tiket=tb_jenis.id_jenis_tiket JOIN tb_waktu ON tb_waktu.id_waktu=tb_fakta.id_waktu WHERE tb_jenis.id_jenis_tiket='DWS' GROUP BY tb_jenis.id_jenis_tiket, tb_waktu.tahun ");   
        $judul = "DRILLDOWN NILAI TIKET BERDASARKAN JENIS TIKET DEWASA";
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
                    text: "<?php echo $judul ?>"
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
	
	