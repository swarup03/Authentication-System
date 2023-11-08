<?php
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
        header("location: login.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            body{
                font-family: sans-serif;
                color: #03e9f4;
            }
            img{
            border-radius: 8px;
            width: 500px;
            transform: translate(-50%, -50%);
            position: absolute;
            box-sizing: border-box;
            border-radius: 30px;
            top: 50%;
            left: 50%;
            }
            h3{
                text-align: center;
                padding-top: 130px;
            }
            a:hover{
                color: green;
            }
        </style>
    </head>
    <body class="text-bg-dark text-info">
        <?php
            require "navbar.php";
        ?>
        <div class="container">
            <img src="hb.gif" class="rounded mx-auto d-block" alt="Hello Brother">
            <h3>Click Hear ,<?php echo $_SESSION['uname'] ?> --> <a href="logout.php">click me</a></h3>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
