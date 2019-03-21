<?php
	// $start_find = $_POST['start_find_val'];
	// $group = $_POST['group_val'];
	// $check_group = $_POST['check_group_val'];
	// $id = $_POST['id_val'];

	//$query2 = mysql_query("SELECT $group as parameter, SUM(tb_fakta.nilai_tiket) as nilai_tiket FROM $check_group, tb_fakta WHERE $group=tb_fakta.$id GROUP BY $group");
	include('connection.php');
	
	$query2 = mysql_query("SELECT tb_jenis.id_jenis_tiket as parameter, SUM(tb_fakta.nilai_tiket) as nilai_tiket FROM tb_jenis, tb_fakta WHERE tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket GROUP BY tb_jenis.id_jenis_tiket");

	$data_points = array();
	while ($row = mysql_fetch_array($query2)) {
		$point = array("A" => $row['parameter'], "B" => $row['nilai_tiket']);
		array_push($data_points, $point);
	}
	echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>