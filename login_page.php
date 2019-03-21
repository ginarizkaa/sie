
<?php include_once "connection.php"; 
    session_start();
    session_destroy();
    $_SESSION['status'] = "logout";
?>
<html>
<head>
    <title>Login Form SIE Usaha Angkutan Penumpang Laut PT.PELNI</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- animsition.css -->
    <link rel="stylesheet" href="assets/animsition/dist/css/animsition.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- animsition.js -->
    <script src="assets/animsition/dist/js/animsition.min.js"></script>
    
    <style type="text/css">
        body{
            background-color: #f1f2f7;
            font-family:"Bahnschrift";
        }
        .oey{
            width: 450px;
            height: 500px;
            text-align: center;
            margin-top: 70px;
            background-color: #282726;
            border-radius: 3%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.5), 0 12px 29px 0 rgba(0, 0, 0, 0.22);
            color: white;
        }
        .login-logo{
            position: relative;
            margin-left: -155.5%;
        }
        .login-logo img{
            position: absolute;
            width: 20%;
            background-color: #e74c3c /*#5270ff*/ /*#f05837*/;
            margin-top: 19%;
            border-radius: 50%/*4.5rem*/;
            padding: 5%;
        }
        .on-oey{
            margin: 20px;
        }
        .btn-submit{
            font-weight: 600;
            width: 50%;/*
            color: #282726;
            background-color: lightblue;
            border: none;*/
            border-radius: 1.5rem;
            padding: 2%;
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }
        .btn-submit:hover{
            background-color: #008CBA;
            color: white;
        }
        .judul{
            font-weight: 700;
            text-align: right;
            color: white;
        }
    </style>
</head>
<body>
    <div class="animsition">
        <div class="d-flex justify-content-center">
            <div class="p-2 oey">
                <div class="login-logo">
                    <img src="images/ship-icon.png" alt=""/>
                </div>
                <div class="on-oey">
                    <form method="post" action="">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="uname" class="form-control" placeholder="username" autofocus="true" required>
                        </div>
                        <br><br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" name="pw" class="form-control" placeholder="password" required>
                        </div>
                        <br><br>
                        <button type="submit" name="submit" class="btn-submit">Login</button>
                    </form>
                    <br><br><br><br><br><br><br>
                    <div class="judul">
                        <h4>
                        SISTEM INFORMASI EKSEKUTIF<br><br>
                        USAHA ANGKUTAN PENUMPANG<br><br>
                        PT. PELAYARAN NASIONAL INDONESIA</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['uname'];
            $pw = md5($_POST['pw']);

            $cek = mysql_query("SELECT id, pw FROM tb_user WHERE id = '$id' AND pw = '$pw'");

            $num_row = mysql_num_rows($cek);
            $result = mysql_fetch_array($cek);

            if ($num_row > 0) {
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['status'] = "login";
                header("location: dashboard.php");
            }
            else{
                header("location:login_page.php");
            }
        }
    ?>
    <script>
        $(document).ready(function() {
          $(".animsition").animsition({
            inClass: 'fade-in-down-lg',
            inDuration: 1500,
            loadingInner: '', // e.g '<img src="loading.svg" />'
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: [ 'animation-duration', '-webkit-animation-duration'],
            overlay : false,
            overlayClass : 'animsition-overlay-slide',
            overlayParentElement : 'body',
            transition: function(url){ window.location.href = url; }
          });
        });
    </script>
</body>
</html>