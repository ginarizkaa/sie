<?php
header("Content-Type: application/json; charset=UTF-8");

$json = file_get_contents('php://input');

$input = json_decode($json, true);
$cari = $input["result"]["parameters"]["tabel"];
$ktg = $input["result"]["parameters"]["kategori"];


if ($cari == "kapal") {

	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_kapal.php",
		"displayText" => "test",
		"contextOut" => array());

	echo json_encode($output);
}
if ($cari == "jenis") {
    if($ktg == ""){
        $jenis = "";
    }
    elseif($ktg=="anak"){
        $jenis = "AN";
    }
    elseif ($ktg=="dewasa") {
    	$jenis = "DWS";
    }
	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_jenis.php?jenis=".$jenis,
		"displayText" => "test",
		"contextOut" => array()
	);
	echo json_encode($output);	
	
}
if ($cari == "kelas") {
	if ($ktg=="") {
		$kelas = "";
	}
	elseif ($ktg=="kelas 1" || $ktg=="kelas satu") {
		$kelas = "1A";
	}
	elseif($ktg=="kelas 2" || $ktg=="kelas dua"){
		$kelas = "2A";
	}
	elseif($ktg=="ekonomi"){
		$kelas = "EK";
	}
	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_kelas.php?kelas=".$kelas,
		"displayText" => "test",
		"contextOut" => array());

	echo json_encode($output);
}
if ($cari == "pelabuhan") {
	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_pelabuhan.php",
		"displayText" => "test",
		"contextOut" => array());

	echo json_encode($output);
}
if ($cari == "penumpang") {
	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_penumpang.php",
		"displayText" => "test",
		"contextOut" => array());

	echo json_encode($output);
}
if ($cari == "tahun") {
	$output = array(
		"source" => "webhook",
		"speech" => "grafiknya adalah sebagai berikut,grafik_waktu.php",
		"displayText" => "test",
		"contextOut" => array());

	echo json_encode($output);
}

?>