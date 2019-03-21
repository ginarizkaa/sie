<?php
	include 'connection.php';

	$count_table = 0; //penghitung jumlah tabel
	$count_field = 0; //penghitung jumlah field
	$table_name = array();
	$j = 0; //tempat nama tabel
	$table_id = array();
	$k = 0; //tempat id tabel
	$var_query = array(); //tempat tabel dan field
	$m = 0;
	if (isset($_POST['submit'])) {
		if (isset($_POST['tabel_1'])) {
			$count_c1 = count($_POST['tabel_1']); //tabel jenis
			$count_table = $count_table+1;
			$table_name[$j] = "tb_jenis";
			$j = $j+1;
			$table_id[$k] = "id_jenis_tiket";
			$k = $k+1;
			foreach ($_POST['tabel_1'] as $selected) {
				$count_field = $count_field+1;
				$var_query[$m] = "tb_jenis".".".$selected;
				$m = $m+1;
			}
		}
		if (isset($_POST['tabel_2'])) {
			$count_c2 = count($_POST['tabel_2']); //tabel kapal
			if($count_c2 != 0){
				$count_table = $count_table+1;
				$table_name[$j] = "tb_kapal";
				$j = $j+1;
				$table_id[$k] = "id_kapal";
				$k = $k+1;
				foreach ($_POST['tabel_2'] as $selected) {
					$count_field = $count_field+1;
					$var_query[$m] = "tb_kapal".".".$selected;
					$m = $m+1;
				}
			}
		}
		// $count_c3 = count($_POST['tabel_3']); // tabel kelas
		// $count_c4 = count($_POST['tabel_4']); //tabel pelabuhan
		// $count_c5 = count($_POST['tabel_5']); //tabel penumpang
		// $count_c6 = count($_POST['tabel_6']); //tabel waktu
		// $count_cg = count($_POST['tabel_g']); //tabel group

		if ($count_table == 1) {
			if ($count_field == 1) {
				$query = mysql_query("SELECT $var_query[0] as a, SUM(tb_fakta.nilai_tiket) as z FROM $table_name[0], tb_fakta WHERE $var_query[0]=tb_fakta.$table_id[0] GROUP BY $table_name[0].$table_id[0]");

				while ($data = mysql_fetch_array($query)) {
					echo $data['a'];
					echo "&emsp;&emsp;";
					echo $data['z'];
					echo "<br>";
				}	
			}
			elseif ($count_field == 2) {

				$query = mysql_query("SELECT $var_query[0] as a, $var_query[1] as b, SUM(tb_fakta.nilai_tiket) as z FROM $table_name[0], tb_fakta WHERE $var_query[0]=tb_fakta.$table_id[0] GROUP BY $table_name[0].$table_id[0]");

				while ($data = mysql_fetch_array($query)) {
					echo $data['a'];
					echo "&emsp;&emsp;";
					echo $data['b'];
					echo "&emsp;&emsp;";
					echo $data['z'];
					echo "<br>";
				}	
			}
			elseif($count_field == 3){
				$query = mysql_query("SELECT $var_query[0] as a, $var_query[1] as b, $var_query[2] as c, SUM(tb_fakta.nilai_tiket) as z FROM $table_name[0], tb_fakta WHERE $var_query[0]=tb_fakta.$table_id[0] GROUP BY $table_name[0].$table_id[0]");

				while ($data = mysql_fetch_array($query)) {
					echo $data['a'];
					echo "&emsp;&emsp;";
					echo $data['b'];
					echo "&emsp;&emsp;";
					echo $data['c'];
					echo "&emsp;&emsp;";
					echo $data['z'];
					echo "<br>";
				}
			}
		}
		elseif($count_table == 2){
			if ($count_field == 2) {
				$query = mysql_query("SELECT $var_query[0] as a, $var_query[1] as b, SUM(tb_fakta.nilai_tiket) as z 
					FROM $table_name[0], $table_name[1], tb_fakta 
					WHERE $table_name[0].$table_id[0]=tb_fakta.$table_id[0] AND $table_name[1].$table_id[1]=tb_fakta.$table_id[1] GROUP BY $table_name[0].$table_id[0]");

				while ($data = mysql_fetch_array($query)) {
					echo $data['a'];
					echo "&emsp;&emsp;";
					echo $data['b'];
					echo "&emsp;&emsp;";
					echo $data['z'];
					echo "<br>";
				}	
			}elseif($count_field == 3){
				$query = mysql_query("SELECT $var_query[0] as a, $var_query[1] as b, $var_query[2] as c, SUM(tb_fakta.nilai_tiket) as z FROM $table_name[0], $table_name[1], tb_fakta WHERE $table_name[0].$table_id[0]=tb_fakta.$table_id[0] AND $table_name[1].$table_id[1]=tb_fakta.$table_id[1] GROUP BY $table_name[0].$table_id[0]");

				while ($data = mysql_fetch_array($query)) {
					echo $data['a'];
					echo "&emsp;&emsp;";
					echo $data['b'];
					echo "&emsp;&emsp;";
					echo $data['c'];
					echo "&emsp;&emsp;";
					echo $data['z'];
					echo "<br>";
				}
			}
		}
	}	
?>