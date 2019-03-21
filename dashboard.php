<!doctype html>
<?php
    include_once "connection.php";

    session_start();

    if ($_SESSION['status'] != "login") {
        header("location:login_page.php");
    }
?>
<html>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('form').submit(function(){
                if ($('input:checkbox').filter(':checked').length <1 ) {
                    alert("tentukan pilihanmu");
                    return false;
                }
                if ($("#field_group input[type='checkbox']").filter(':checked').length <1) {
                    alert("tentukan pilihan grup tabel");
                    return false;

                }
            });

            var $checkboxes = $('#field_group input[type="checkbox"]');

            $checkboxes.change(function(){
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                // if (countCheckedCheckboxes == 0) {
                //     alert("belom di ceklis grup nya");
                // }
                if (countCheckedCheckboxes > 1) {
                    alert("ceklis satu aja");
                    this.checked = false;
                }
            });
        });
    </script>
</head>

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

                <!-- <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                      <span class="badge badge-pill badge-success">Success</span> &emsp;You successfully login to this website! Welcome <?php  echo $_SESSION['id']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div> -->
            <?php
            $query = mysql_query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = 'dwo_sie'");
            $query1 = mysql_query('select * from tb_fakta');
            $query2 = mysql_query('select * from tb_kapal');
            $query3 = mysql_query('select * from tb_penumpang');
            $query4 = mysql_query('select * from tb_pelabuhan');
            $query5 = mysql_query('select * from tb_waktu');
            $query6 = mysql_query('select * from tb_kelas');
            $query7 = mysql_query('select * from tb_jenis');

            function mysql_field_array($query) {
                $field = mysql_num_fields($query);
                for ( $i = 0; $i < $field; $i++ ) {
                    $names[] = mysql_field_name($query, $i );
                }
                return $names;
            }

            $fields1 = mysql_field_array($query1);
            $fields2 = mysql_field_array($query2);
            $fields3 = mysql_field_array($query3);
            $fields4 = mysql_field_array($query4);
            $fields5 = mysql_field_array($query5);
            $fields6 = mysql_field_array($query6);
            $fields7 = mysql_field_array($query7);

            $tabel_1 = array();
            $tabel_2 = array();
            ?>

                <div class="col-xl-3">
                    <div class="card">
                    	<div class="card-header bg-ungu">
                    		<strong>Tabel Ad-Hoc</strong>
                    	</div>
                        <form method="POST" action="result_adhoc.php">
                            <div class="card-body">
                                <div id="tabel_parent">
                                    
                                <?php
                                    while ($nama_tabel = mysql_fetch_assoc($query)) {
                                ?>
                                        <input type="checkbox" name="list_tabel[]" id="<?php echo $nama_tabel['TABLE_NAME'] ?>" value="<?php echo $nama_tabel['TABLE_NAME'] ?>"   >
                                        <?php 
                                        if ($nama_tabel['TABLE_NAME'] == 'tb_fakta') { ?>
                                            
                                        <?php }
                                        elseif($nama_tabel['TABLE_NAME'] == 'tb_user'){ ?>    
                                        
                                        <?php    
                                        }else{ ?> &nbsp;
                                        <?php
                                            echo $nama_tabel['TABLE_NAME']?></input><br> 
                                        <?php    
                                        }
                                        ?>    
                                 <?php
                                    }
                                 ?>
                                </div>

                                <div id="field_jenis">
                                    <hr>
                                    <p>Tabel Jenis</p>
                                    <input id="<?php echo $fields7[0] ?>" type="checkbox" name="tabel_1[]" value="<?php echo $fields7[0] ?>">
                                    <input type="checkbox" name="tabel_1[]" value="<?php echo $fields7[1] ?>">&emsp;<?php echo $fields7[1]?><br>
                                </div>
                                <div id="field_kapal">
                                    <hr>
                                    <p>Tabel Kapal</p>
                                    <input id="<?php echo $fields2[0] ?>" type="checkbox" name="tabel_2[]" value="<?php echo $fields2[0] ?>">
                                    <input type="checkbox" name="tabel_2[]" value="<?php echo $fields2[1] ?>">&emsp;<?php echo $fields2[1]?><br>
                                    <input type="checkbox" name="tabel_2[]" value="<?php echo $fields2[2] ?>">&emsp;<?php echo $fields2[2]?><br>
                                    <input type="checkbox" name="tabel_2[]" value="<?php echo $fields2[3] ?>">&emsp;<?php echo $fields2[3]?><br>
                                </div>
                                <div id="field_kelas">
                                    <hr>
                                    <p>Tabel Kelas</p>
                                    <input id="<?php echo $fields6[0] ?>" type="checkbox" name="tabel_3[]" value="<?php echo $fields6[0] ?>">
                                    <input type="checkbox" name="tabel_3[]" value="<?php echo $fields6[1] ?>">&emsp;<?php echo $fields6[1]?><br>
                                </div>
                                <div id="field_pelabuhan">
                                    <hr>
                                    <p>Tabel Pelabuhan</p>
                                    <input id="<?php echo $fields4[0] ?>" type="checkbox" name="tabel_4[]" value="<?php echo $fields4[0] ?>">
                                    <input type="checkbox" name="tabel_4[]" value="<?php echo $fields4[1] ?>">&emsp;<?php echo $fields4[1]?><br>
                                </div>
                                <div id="field_penumpang">
                                    <hr>
                                    <p>Tabel Penumpang</p>
                                    <input id="<?php echo $fields3[0] ?>" type="checkbox" name="tabel_5[]" value="<?php echo $fields3[0] ?>">
                                    <input type="checkbox" name="tabel_5[]" value="<?php echo $fields3[1] ?>">&emsp;<?php echo $fields3[1]?><br>
                                    <input type="checkbox" name="tabel_5[]" value="<?php echo $fields3[2] ?>">&emsp;<?php echo $fields3[2]?><br>
                                </div>
                                <div id="field_waktu">
                                    <hr>
                                    <p>Tabel Waktu</p>
                                    <input id="<?php echo $fields5[0] ?>" type="checkbox" name="tabel_6[]" value="<?php echo $fields5[0] ?>">
                                    <input type="checkbox" name="tabel_6[]" value="<?php echo $fields5[1] ?>">&emsp;<?php echo $fields5[1]?><br>
                                    <input type="checkbox" name="tabel_6[]" value="<?php echo $fields5[2] ?>">&emsp;<?php echo $fields5[2]?><br>
                                    <input type="checkbox" name="tabel_6[]" value="<?php echo $fields5[3] ?>">&emsp;<?php echo $fields5[3]?><br>
                                </div>
                                <div id="field_group">
                                    <hr>
                                    <p>Tabel Group By</p>
                                    <div id="g_jenis">
                                        <input type="checkbox" name="tabel_group" value="tb_jenis">&emsp;<?php echo $fields7[0] ?><br>
                                    </div>
                                    <div id="g_kapal">
                                        <input type="checkbox" name="tabel_group" value="tb_kapal">&emsp;<?php echo $fields2[0] ?><br>
                                    </div>
                                    <div id="g_kelas"> 
                                        <input type="checkbox" name="tabel_group" value="tb_kelas">&emsp;<?php echo $fields6[0] ?><br>
                                    </div>
                                    <div id="g_pelabuhan">
                                        <input type="checkbox" name="tabel_group" value="tb_pelabuhan">&emsp;<?php echo $fields4[0] ?><br>
                                    </div>
                                    <div id="g_penumpang">
                                        <input type="checkbox" name="tabel_group" value="tb_penumpang">&emsp;<?php echo $fields3[0] ?><br>
                                    </div>
                                    <div id="g_waktu">
                                        <input type="checkbox" name="tabel_group" value="tb_waktu">&emsp;<?php echo $fields5[0] ?><br>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <center>
                                <input type="submit" class="btn btn-success" name="submit">
                            </center>
                        </form>
                            <br>
                    </div>
                </div>

                <div class="col-xl-9">
                	<div class="card">
    	            	<div class="card-header bg-ungu">
    	            		<strong class="card-title">SIE Assistant</strong>
    	            	</div>	
    	            	<div class="card-body">	

    		            	<center>
    		            		<button class="btn-rec" id="start_button" onclick="startButton(event)">
    		            			<img class="bulet" src="images/mic.png" alt="Start" id="start_img">
    		            		</button>
    		            		<br><br>
    		            		<input type="text" id="input" autofocus="true" class="form-control">
    		            		<div class="input">
    		            			<span id="final_span" class="final" style="visibility: hidden;"></span>
    		            			<span id="interim_span" class="interim"></span>
    		            		</div>

    		            		<div id="div_language">
    		            			<select style="visibility: hidden;" id="select_language" onchange="updateCountry()"></select>
    		            			&nbsp;&nbsp;
    		            			<select style="visibility: hidden;" id="select_dialect"></select>
    		            		</div>

    		            		<textarea id="response" class="form-control" rows="8"></textarea>
    		            		<br>
    		            		<button id="clearButton" class="btn btn-success">Clear</button>
    		            	</center>
    	            	</div>
                	</div>
                </div>

                <div id="bagan_grafik">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">DATA VISUAL</strong>
                            </div>  
                            <div class="card-body"> 
                                <div id="grafik">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- .content -->
        </div><!-- /#right-panel -->
        <!-- Right Panel -->
    </div>
        <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">

        // loading page
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 300);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
        //sampe sini

        $(document).ready(function(){
            $("#grafik").load("grafik.php");
            $("#grafik").hide();
            $('#bagan_grafik').hide();
            var $textarea = $("#response");
            $textarea.scrollTop($textarea[0].scrollHeight);

            $("#clearButton").click(function(){
                //$("html, body").animate({scrollTop:0}, 1000);
                $("#response").text('');
                conversation = [];
                $("#input").val();
                $("#bagan_grafik").hide();
                $("#grafik").hide();
                $("#input").focus();
            });
        });

        var accessToken = "916c1b6732a4479b8dc5f41490260bbb";
        var baseUrl = "https://api.api.ai/v1/";

        $(document).ready(function() {
            $("#input").keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    send();
                }
            });
        });

        var langs = [['Bahasa Indonesia',['id-ID']]];

        for (var i = 0; i < langs.length; i++) {
            select_language.options[i] = new Option(langs[i][0], i);
        }
        select_language.selectedIndex = 0;
        updateCountry();
        select_dialect.selectedIndex = 0;

        function updateCountry() {
            for (var i = select_dialect.options.length - 1; i >= 0; i--) {
                select_dialect.remove(i);
            }
            var list = langs[select_language.selectedIndex];
            for (var i = 1; i < list.length; i++) {
                select_dialect.options.add(new Option(list[i][1], list[i][0]));
            }
            select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
        }

        var text = '';
        var recognizing = false;
        var ignore_onend;
        var start_timestamp;

        if (!('webkitSpeechRecognition' in window)) {
            upgrade();
        }else{
            start_button.style.display = 'inline-block';
            var recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;

            recognition.onstart = function(){
                recognizing = true;
                start_img.src = 'images/mic-animate.gif';
            };

            recognition.onerror = function(event){
                if (event.error == 'no-speech'){
                    start_img.src = 'images/mic.png';
                    ignore_onend = true;
                }
                if (event.error == 'audio-capture'){
                    start_img.src = 'images/mic.png';
                    ignore_onend = true;
                }
                if (event.error == 'not-allowed'){
                    if (event.timeStamp - start_timestamp < 100) {}else{}
                    ignore_onend = true;
                }
            };

            recognition.onend = function(){
                recognizing = false;
                if (ignore_onend) {
                    return;
                }
                start_img.src = 'images/mic.png';
                if(!text){
                    return;
                }
                if (window.getSelection) {
                    window.getSelection().removeAllRanges();
                    var range = document.createRange();
                    range.selectNode(document.getElementById("final_span"));
                    window.getSelection().addRange(range);
                }
            };

            recognition.onresult = function(event){
                var interim_transcript = '';
                for (var i = event.resultIndex; i < event.results.length; ++i){
                    if (event.results[i].isFinal){
                        text += event.results[i][0].transcript;
                    }else{
                        interim_transcript += event.results[i][0].transcript;
                    }
                }

                text = capitalize(text);
                final_span.innerHTML = linebreak(text);
                interim_span.innerHTML = linebreak(interim_transcript);
                if (text || interim_transcript){
                    showButtons('inline-block');
                }
                if (text && text.length > 0) {
                    setInput(text);
                }
            };
        }

        var conversation = [];

        function setInput(text) {
            $("#input").val(text);
            send();
        }

        function send(){
            var text = $("#input").val();
            conversation.push("Me   :   "+text+ "\r\n");
            $.ajax({
                type : "POST",
                url : baseUrl + "query?v=20150910",
                contentType : "application/json; charset=utf-8",
                dataType : "json",
                headers: {
                    "Authorization": "Bearer " + accessToken
                },
                data : JSON.stringify({query : text, lang : "Indonesian", sessionId : "sesuatu"}),
                success : function(data){
                    var respText = data.result.fulfillment.speech;
                    var grafik = respText.split(",");
                    var text = grafik[0];

                    if (text == "grafiknya adalah sebagai berikut") {
                        responsiveVoice.speak(text, "Indonesian Female", {pitch : 1, volume : 1});
                        setResponse(text);
                        var grafik2 = grafik[1];
                        setGrafik(grafik2);
                    }else{
                        responsiveVoice.speak(respText, "Indonesian Female", {pitch : 1, volume : 1});
                        setResponse(respText);
                    }
                }
            });
        }

        function setResponse(val) {
            conversation.push("AI     :   "+val+ "\r\n");
            $("#response").text(val);
            $("#response").text(conversation.join("")).scrollTop($("#response")[0].scrollHeight);
            $("#input").val("");
        }

        function setGrafik(val){
            $("#bagan_grafik").show();
            $("#grafik").load(val);
            $("#grafik").show();
            //alert(val);
            $("html, body").animate({
                scrollTop: $('html, body').get(0).scrollHeight
            }, 3000);
        }

        function upgrade() {
            start_button.style.visibility = 'hidden';
        }

        var two_line = /\n\n/g;
        var one_line = /\n/g;
        function linebreak(s) {
            return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
        }

        var first_char = /\S/;
        function capitalize(s) {
            return s.replace(first_char, function(m) { return m.toUpperCase(); });
        }

        function startButton(event) {
            if (recognizing) {
                recognition.stop();
                return;
            }
            text = '';
            recognition.lang = select_dialect.value;
            recognition.start();
            ignore_onend = false;
            final_span.innerHTML = '';
            interim_span.innerHTML = '';
            start_img.src = 'images/mic.png';
            showButtons('none');
            start_timestamp = event.timeStamp;
        }

        var current_style;
        function showButtons(style) {
            if (style == current_style) {
                return;
            }
            current_style = style;
        }
    </script>
</body>
</html>
