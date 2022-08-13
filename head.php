<?php
    session_start();
    $username = $_SESSION['username'];
    $isLoggedIn = $_SESSION['isLoggedIn'];
    $lv = $_SESSION['lv'];

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
    
    #if($lv != 'Staff'){
    #    header('Location: form_daftar_kelas.php');
    #}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tekhno Training Edu Center</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        html {
            height: 100%;
        }

        body {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        footer {
            height: 100px;
            margin-top: auto;
            text-align: center;
            padding: 40px 50px;
        }
        .container {
            max-width: 960px;
        }
    </style>
</head>