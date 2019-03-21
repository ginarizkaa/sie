<!doctype html>
<?php
    include_once "connection.php";

    session_start();

    if ($_SESSION['status'] != "login") {
        header("location:login_page.php");
    }
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIE Usaha Angkutan Penumpang PT. PELNI</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css3/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- dari file yang lama -->
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- sampe sini -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <style type="text/css">
        .judul{
            padding-top: 10px;
        }
        .bulet{
            border-radius: 50%;
            height: 90px;
            width: 90px;
        }
        .bulet img:hover{
            color: #333333;
        }
        .btn-rec{
            background-color: transparent;
            border: none;
        }
        .bg-ungu{
            background-color: #5270ff;
        }


        /*animate loading*/

        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-right: 16px solid green;
            border-bottom: 16px solid red;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 1s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 } 
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom { 
            from{ bottom:-100px; opacity:0 } 
            to{ bottom:0; opacity:1 }
        }

        #myDiv {
            display: none;
        }

        /*sampe sini*/
    </style>

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
                        <li>
                            <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <li>
                            <a href="howtousewebsite.php"> <i class="menu-icon fa fa-exclamation-triangle"></i>How To Use Website </a>
                        </li>
                        <li class="active">
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

                                <textarea id="response" class="form-control" rows="10"></textarea>
                                <br>
                                <button id="clearButton" class="btn btn-success">Clear</button>
                            </center>
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
            var $textarea = $("#response");
            $textarea.scrollTop($textarea[0].scrollHeight);

            $("#clearButton").click(function(){
                $("#response").text('');
                conversation = [];
                $("#input").val();
                $("#grafik").hide();
            });
        });

        var accessToken = "916c1b6732a4479b8dc5f41490260bbb";
        var baseUrl = "https://api.api.ai/v1/";

        $(document).ready(function(){
            $("#input").keypress(function(event){
                if(event.which == 13){
                    event.preventDefault();
                    send();
                }
            });
        });

        var langs = [['Bahasa Indonesia', ['id-ID']]];

        for (var i = 0; i < langs.length; i++){
            select_language.options[i] = new Option(langs[i][0], i);
        }

        select_language.selectedIndex = 0;
        updateCountry();
        select_dialect.selectedIndex = 0;

        function updateCountry(){
            for (var i = select_dialect.options.length - 1; i>=0; i--){
                select_dialect.remove(i);
            }

            var list = langs[select_language.selectedIndex];
            for (var i = 1; i < list.length; i++){
                select_dialect.options.add(new Option(list[i][1], list[i][0]));
            }

            select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
        }

        var text = '';
        var recognizing = false;
        var ignore_onend;
        var start_timestamSp;

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

            recognition.onerror = function(){
                if (event.error == 'no-speech') {
                    start_img.src = 'images/mic.png';
                    ignore_onend = true;
                }
                if (event.error == 'audio-capture') {
                    start_img.src = 'images/mic.png';
                    ignore_onend = true;
                }
                if (event.error == 'not allowed') {
                    if (event.timesStamp - start_timestamSp < 100) {

                    }else{

                    }
                    ignore_onend = true;
                }
            };

            recognition.onend = function(){
                recognizing = false;
                if (ignore_onend) {
                    return;
                }
                start_img.src = 'images/mic.png';
                if (!text) {
                    return;
                }
                if (window.getSelection) {
                    window.getSelection().removeAllRanges();
                    var range = document.createRange();
                    range.selectNode(document.getElementbyId('final_span'));
                    window.getSelection().addRange(range);
                }
            };

            recognition.onresult = function(){
                var interim_transcript = '';
                for (var i = event.resultIndex; i < event.results.length; i++){
                    if (event.results[i].isFinal) {
                        text =+ event.results[i][0].transcript;
                    }else{
                        interim_transcript += event.results[i][0].transcript;
                    }
                }
                text = capitalize(text);
                final_span.innerHTML = linebreak(text);
                interim_span.innerHTML = linebreak(interim_transcript);
                if (text || interim_transcript) {
                    showButtons('inline-block');
                }
                if (text && text.length > 0) {
                    setInput(text);
                }
            };
        }

        var conversation = [];

        function setInput(text){
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
                    var grafik = respText.slice(0,24);

                    if (grafik == "grafiknya adalah berikut") {
                        responsiveVoice.speak(grafik, "Indonesian Female", {pitch : 1, volume : 1});
                        setResponse(grafik);
                        var grafik2 = respText.slice(25);
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
            $("#grafik").show();
            $("#grafik").load(val);
        }

        function upgrade(){
            start_button.style.visibility = "hidden";
        }

        var two_line = /\n\n/g;
        var one_line = /\n/g;

        function linebreak(s){
            return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
        }

        var first_char = /\S/;

        function capitalize(s){
            return s.replace(first_char, function(m){ return m.toUpperCase(); });
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
        }

        var current_style;

        function showButtons(style){
            if (style == current_style) {
                return;
            }
            current_style = style;
        }
    </script>
</body>
</html>
