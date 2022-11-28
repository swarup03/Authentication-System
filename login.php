<?php
$succ = false;
$error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "database.php";
        $uname = $_POST["uname"];
        $password = $_POST["password"];
            $sql = "SELECT * FROM `users` WHERE `uname` ='$uname'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($password, $row['password'])){
                        $succ = true;
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['uname'] = $uname;
                        header("location: welcome.php");
                    }else{
                        $error = true;
                    }
                }
            }
            else{
                $error = true;
            }
        
    }
?>
<!doctype html>  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f2eee3;
            font-family: sans-serif;
            color: #03e9f4;
        }
        
        .box {
            color: #03e9f4;
            background: rgba(0, 0, 0, .6);
            box-shadow: 0 15px 15px rgba(0, 0, 0, .6);
            border-radius: 8px;
            padding: 40px;
            width: 400px;
            transform: translate(-50%, -50%);
            position: absolute;
            box-sizing: border-box;
            border-radius: 10px;
            top: 50%;
            left: 50%;
        }
        
        .box h2 {
            margin: 0 0 30px;
            padding: 0;
            color:  #fff;
            text-align: center;
        }
        
        h2:hover {
            letter-spacing: 5px;
            transition: 1s;
        }
        
        .in {
            position: relative;
        }
        
        .in input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }
        
        .in:hover {
            letter-spacing: 3px;
            transition: 1s;
        }
        
        .bt {
            padding: 12px;
            color: #03e9f4;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        
        .bt:hover {
            letter-spacing: 3px;
            transition: 1s;
        }
        
        .box form div input:hover {
            background-color: #03e9f4;
            color: #fff;
            border-radius: 5px;
            transition: 1s;
            box-shadow:  0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 100px #03e9f4;
        }
    </style>
  </head>
  <body>
    <?php
        require "navbar.php";
    ?>
    <?php
    if ($succ) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> successfully logined in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }    
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> you have writen wrong password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }    
    ?>
    <div class="box">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="in">
                User Name:<input type="text" name="uname" maxlength="25" required>
            </div>
            <div class="in">
                Password:<input type="password" name="password" maxlength="23" required>
            </div>
            <div>
                <input class="bt" type="submit" value="Submit">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>