<?php
session_start();
if(isset($_SESSION['loginspk'])){
    header('location:index.php');
    exit;
}

require 'library.php';

if(isset($_POST['login'])){
    $username = strtolower(htmlspecialchars($_POST['username']));
    $pass = strtolower(htmlspecialchars($_POST['password']));

    $user_hash = hash('ripemd160',$username);
    $pass_hash = hash('ripemd160',$pass);

    //ambil data db
    $query = mysqli_query($con,"SELECT * FROM login WHERE username = '$user_hash'");
    $data = mysqli_fetch_assoc($query);
    
    if($data['password'] == $pass_hash){
        $_SESSION['loginspk'] = true;
        header('location:index.php');
        exit;
    }else{
        $error = true;
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" href="img/hmf.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        ul li{
            list-style-type:none;
            margin-bottom:10px;
        }
        .body{
            background-image: url(img/pimpinan.jpeg);
            background-repeat: no-repeat;
            position: fixed;
            width: 100%;
            height: 100%;
            background-size: 100%;
            filter: blur(5px);
        }
        .login{
            position:absolute;
            border:3px solid;
            width:26%;
            margin-left:40%;
            padding-left:30px;
            padding:10px;
            margin-top:120px;
            background-color:white;
        }
        h1{
            margin-left:30%;
            margin-bottom:10px;
        }
        img{
            width:90px;
            height:90px;
            margin-left:30%;
        }
        #password{
            margin-left:0px;
        }
        button{
            width:120px;
            height:40px;
            margin-left:0px;
            margin-top:10px;
            
        }

        .copy h1{
            position:absolute;
            margin-top:550px;
            font-size:18px;
            font-style:italic;
            margin-left:38%;
            color:white;
        }
    </style>
</head>
<body>
<?php if(isset($error)) : ?>
<div class="container">
    <div class="alert alert-danger" role="alert">
            Username & Password Salah
    </div>
</div>
<?php endif;?>
<div class="body"></div>
<div class="login">
<img src="img/hmf.png" alt="">
<h1>Login</h1>
    <form method="post">
        <ul>
            <li>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" required autofocus>
            </li>
            <li>
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" required>
            </li>
            <button class="btn btn-primary"type="submit" name="login">Login</button>
        </ul>
    </form>
</div>

<div class="copy">
    <h1>Copyright &copy;2020 Nofrisdan Sitopu-ALL Rights Reserved</h1>
</div>
    
</body>
</html>