<!doctype html>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIE Usaha Angkutan Penumpang PT. PELNI</title>

    <link rel="shortcut icon" href="images/favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- dari file yang lama -->
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <!-- sampe sini -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/table_adhoc.js"></script>
    <link rel="stylesheet" href="assets/css/style_custom.css">

</head>
<style type="text/css">
    #tab_adhoc {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #tab_adhoc td, #tab_adhoc th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #tab_adhoc tr:nth-child(even){background-color: #f2f2f2;}

    #tab_adhoc tr:hover {background-color: #ddd;}

    #tab_adhoc th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
</style>
<?php
    include 'connection.php';

    $count_field = 0;
    $field_name = array();
    $n = 0;
    $table_name_id = array();
    $j = 0; //tempat nama tabel
    $table_name = array();
    $k = 0; //tempat id tabel
    $var_query = array(); //tempat tabel dan field
    $m = 0;
    
    if (isset($_POST['submit'])) {
        $_POST['list_tabel'];
        if (isset($_POST['tabel_1'])) {
            $table_name_id[$j] = "tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket";
            $j = $j+1;
            $table_name[$k] = "tb_jenis";
            $k = $k+1;
            foreach ($_POST['tabel_1'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_jenis".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }
        if (isset($_POST['tabel_2'])) {
            $table_name_id[$j] = "tb_kapal.id_kapal=tb_fakta.id_kapal";
            $j = $j+1;
            $table_name[$k] = "tb_kapal";
            $k = $k+1;
            foreach ($_POST['tabel_2'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_kapal".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }
        if (isset($_POST['tabel_3'])) {
            $table_name_id[$j] = "tb_kelas.id_kelas_tiket=tb_fakta.id_kelas_tiket";
            $j = $j+1;
            $table_name[$k] = "tb_kelas";
            $k = $k+1;
            foreach ($_POST['tabel_3'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_kelas".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }
        if (isset($_POST['tabel_4'])) {
            $table_name_id[$j] = "tb_pelabuhan.id_pelabuhan=tb_fakta.id_pel_emb";
            $j = $j+1;
            $table_name[$k] = "tb_pelabuhan";
            $k = $k+1;
            foreach ($_POST['tabel_4'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_pelabuhan".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }
        if (isset($_POST['tabel_5'])) {
            $table_name_id[$j] = "tb_penumpang.id_tiket=tb_fakta.id_tiket";
            $j = $j+1;
            $table_name[$k] = "tb_penumpang";
            $k = $k+1;
            foreach ($_POST['tabel_5'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_penumpang".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }
        if (isset($_POST['tabel_6'])) {
            $table_name_id[$j] = "tb_waktu.id_waktu=tb_fakta.id_waktu";
            $j = $j+1;
            $table_name[$k] = "tb_waktu";
            $k = $k+1;
            foreach ($_POST['tabel_6'] as $selected) {
                $count_field = $count_field+1;
                $var_query[$m] = "tb_waktu".".".$selected;
                $m = $m+1;
                $field_name[$n] = $selected;
                $n = $n+1;
            }
        }

        $check_group = $_POST['tabel_group'];
        if ($check_group == "tb_jenis") {
            $group = "tb_jenis.id_jenis_tiket";
        }elseif($check_group == "tb_kapal"){
            $group = "tb_kapal.id_kapal";
        }elseif ($check_group == "tb_kelas") {
            $group = "tb_kelas.id_kelas_tiket";
        }elseif ($check_group == "tb_pelabuhan") {
            $group = "tb_pelabuhan.id_pelabuhan";
        }elseif ($check_group == "tb_penumpang") {
            $group = "tb_penumpang.id_tiket";
        }elseif ($check_group == "tb_waktu") {
            $group = "tb_waktu.id_waktu";
        }


        $clause_select = implode(", ", $var_query);
        $clause_from = implode(", ", $table_name);
        $clause_where = implode(" AND ", $table_name_id);

        $query = mysql_query("SELECT $clause_select, SUM(tb_fakta.nilai_tiket) as z FROM $clause_from, tb_fakta WHERE $clause_where GROUP BY $group");
        
        $start_find = (strpos($group, ".")+1);
        $id = substr($group, $start_find);

        // $query2 = mysql_query("SELECT $group as parameter, SUM(tb_fakta.nilai_tiket) as nilai_tiket FROM $check_group, tb_fakta WHERE $group=tb_fakta.$id GROUP BY $group");

        $query2 = mysql_query("SELECT tb_jenis.id_jenis_tiket as parameter, SUM(tb_fakta.nilai_tiket) as nilai_tiket FROM tb_jenis, tb_fakta WHERE tb_jenis.id_jenis_tiket=tb_fakta.id_jenis_tiket GROUP BY tb_jenis.id_jenis_tiket");

        $data_points = array();
        while ($row = mysql_fetch_array($query2)) {
            $point = array("A" => $row['parameter'], "B" => $row['nilai_tiket']);
            array_push($data_points, $point);
        }
        json_encode($data_points, JSON_NUMERIC_CHECK);
    }   
?>
<body onload="myFunction()">
    <div id="loader"></div>
    <div style="display: none;" id="myDiv" class="animate-bottom" >
            <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button><br>
                    <a class="navbar-brand" href="./"><img class="bulet" src="images/LOGO_PELNI.jpg" alt="Logo"></a><br>
                    <a class="navbar-brand hidden" href="./"><img src="images/p.png" alt="Logo"></a>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <li>
                            <a href="howtousewebsite.php"> <i class="menu-icon fa fa-exclamation-triangle"></i>How To Use Website </a>
                        </li>
                        <li>
                            <a href="questionlist.php"> <i class="menu-icon fa fa-question"></i>Questions List </a>
                        </li>

                        <h3 class="menu-title"></h3><!-- /.menu-title -->

                        <li>
                            <a href="logout.php"><i class="menu-icon fa fa-sign-out"></i>Logout</a>
                        </li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-9">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">
                            <h6 class="judul">
                            <strong> SISTEM INFORMASI EKSEKUTIF USAHA ANGKUTAN PENUMPANG PT. PELNI</strong></h6> 
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                            </a>

                            <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                    <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                            </div>
                        </div>

                    </div>
                </div>

            </header><!-- /header -->
            <!-- Header-->

            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="col-xl-12">
                <button type="button" class="btn btn-danger" style="float: right;" onclick="location.href='dashboard.php'">BACK</button>
                <br><br>
                    <div class="card">
                        <div class="card-header bg-ungu">
                            <strong>Result Ad-Hoc Table</strong>
                        </div>
                        <div class="card-body">
                <!-- <div id="chartContainer" style="height: 400px; width: 100%;"></div> -->

                            <table id="tab_adhoc">
                                <?php
                                echo "<tr>";
                                foreach ($field_name as $key) {
                                    if ($key == "id_jenis_tiket") {
                                        echo "<th> Kode Tiket </th>";
                                    }elseif ($key == "ket_jenis_tiket") {
                                        echo "<th> Jenis Tiket </th>";
                                    }elseif ($key == "id_kapal") {
                                        echo "<th> Kode Kapal </th>";
                                    }elseif ($key == "nama_kapal") {
                                        echo "<th> Kapal </th>";
                                    }elseif ($key == "tipe_kapal") {
                                        echo "<th> Tipe Kapal </th>";
                                    }elseif ($key == "tahun_operasi") {
                                        echo "<th> Tahun Operasi Kapal </th>";
                                    }elseif ($key == "nama_kapal") {
                                        echo "<th> Kapal </th>";
                                    }elseif ($key == "id_kelas_tiket") {
                                        echo "<th> Kode Kelas Tiket </th>";
                                    }elseif ($key == "ket_kelas") {
                                        echo "<th> Kelas Tiket Kapal </th>";
                                    }elseif ($key == "id_pelabuhan") {
                                        echo "<th> Kode Pelabuhan </th>";
                                    }elseif ($key == "nama_pelabuhan") {
                                        echo "<th> Nama Pelabuhan </th>";
                                    }elseif ($key == "id_tiket") {
                                        echo "<th> Kode Tiket </th>";
                                    }elseif ($key == "nama_penumpang") {
                                        echo "<th> Nama Penumpang </th>";
                                    }elseif ($key == "jenis_kelamin") {
                                        echo "<th> Jenis Kelamin </th>";
                                    }elseif ($key == "id_waktu") {
                                        echo "<th> Kode Waktu </th>";
                                    }elseif ($key == "tanggal") {
                                        echo "<th> Tanggal Keberangkatan </th>";
                                    }elseif ($key == "bulan") {
                                        echo "<th> Bulan Keberangkatan </th>";
                                    }elseif ($key == "tahun") {
                                        echo "<th> Tahun Keberangkatan </th>";
                                    }
                                }
                                echo "<th> Nilai Tiket </th>";
                                echo "</tr>";
                                while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
                                    $i = 0;
                                    echo "<tr>";
                                    foreach ($row as $data => $value) {
                                        echo "<td>";
                                        if($i == $count_field){
                                            echo "Rp. ";   
                                        }
                                        echo $value;
                                        echo "</td>";
                                        //echo "&emsp;";
                                    $i++;
                                    }
                                    // echo "<br>";
                                    echo "</tr>";
                                }


                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- .content -->
        </div><!-- /#right-panel -->
        <!-- Right Panel -->
    </div>
        
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script type="text/javascript">

        // loading page
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 300);
        }

        var dps = [];
        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "VISUAL DATA"
                },
                axisY: {
                    includeZero: true
                },
                axisX: {
                    title: "Nilai"
                },
                data: [{
                    type: "column",
                    dataPoints: dps
                }]
            });

            function dataMain(result){
                for (var q=0; q<result.length; q++) {
                    dps.push({
                        "label": result(q).A,
                        y: result[q].B
                    });
                }
                chart.render();
            }

            $.getJSON("result_adhoc.php", dataMain);
        }
        //sampe sini


    </script>
</body>
</html>
