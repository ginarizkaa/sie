<?php 
include 'connection.php';

if(isset($_POST['submit'])){
	//count sum table
	$checked_count = count($_POST['list_tabel']);
	echo "tabel yang dipilih : ".$checked_count."<br><br>";
	$tabel = array();
	$i = 0;
	foreach($_POST['list_tabel'] as $selected) {
		echo $tabel[$i] = $selected;
		echo "<br>";
		$i++;
	}
	
	//count sum field
	$count_field = count($_POST['check_list']);
	echo "field yang dipilih : ".$count_field."<br><br>";
	$field = array();
	$i = 0;
	if($checked_count == 1) {
		//memanggil field
		foreach($_POST['check_list'] as $selected) {
			$field[$i] = $selected;
			// if ($field[$i] == "id_pelabuhan") {
			// 	$field[$i] = "id_pelabuhan";
			// 	$field[$i] = $selected;
			// }
			$i++;
		} 
		if($count_field == 1){
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 2) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");


			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 3) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, $tabel[0].$field[2] as c, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['c'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}
//----------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------//
	}elseif($checked_count == 2){
		//memanggil field
		foreach($_POST['check_list'] as $selected) {
			echo $field[$i] = $selected;
			echo "<br>";
			$i++;
		}

		if ($count_field == 2) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[1].$field[1] as b, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tabel[1], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 3) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, $tabel[0].$field[2] as c, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['c'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 4) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, $tabel[0].$field[2] as c, $tabel[0].$field[3] as d, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['c'];
				echo "  ";
				echo $data['d'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 5) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, $tabel[0].$field[2] as c, $tabel[0].$field[3] as d, $tabel[0].$field[4] as e, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['c'];
				echo "  ";
				echo $data['d'];
				echo "  ";
				echo $data['e'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}elseif ($count_field == 6) {
			$query = mysql_query("SELECT $tabel[0].$field[0] as a, $tabel[0].$field[1] as b, $tabel[0].$field[2] as c, $tabel[0].$field[3] as d, $tabel[0].$field[4] as e, $tabel[0].$field[5] as f, SUM(tb_fakta.nilai_tiket) as z 
				FROM $tabel[0], tb_fakta
				WHERE $tabel[0].$field[0]=tb_fakta.$field[0] GROUP BY $tabel[0].$field[0]");

			while ($data = mysql_fetch_array($query)) {
				echo $data['a'];
				echo "  ";
				echo $data['b'];
				echo "  ";
				echo $data['c'];
				echo "  ";
				echo $data['d'];
				echo "  ";
				echo $data['e'];
				echo "  ";
				echo $data['f'];
				echo "  ";
				echo $data['z'];
				echo "<br>";
			}
		}

	}elseif($checked_count == 3){
		$t1 = $_POST['check_list'][0];
		$t2 = $_POST['check_list'][1];
		$t3 = $_POST['check_list'][2];
	}elseif($checked_count == 4){
		$t1 = $_POST['check_list'][0];
		$t2 = $_POST['check_list'][1];
		$t3 = $_POST['check_list'][2];
		$t4 = $_POST['check_list'][3];
	}elseif($checked_count == 5){
		$t1 = $_POST['check_list'][0];
		$t2 = $_POST['check_list'][1];
		$t3 = $_POST['check_list'][2];
		$t4 = $_POST['check_list'][3];
		$t5 = $_POST['check_list'][4];
	}elseif($checked_count == 6){
		$t1 = $_POST['check_list'][0];
		$t2 = $_POST['check_list'][1];
		$t3 = $_POST['check_list'][2];
		$t4 = $_POST['check_list'][3];
		$t5 = $_POST['check_list'][4];
		$t6 = $_POST['check_list'][5];
	}

}

?>