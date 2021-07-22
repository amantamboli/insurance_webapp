<?php

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$host="host=127.0.0.1";
$port="port=5432";
$dbname="dbname=insurance";
$credentials="user=postgres password=7781";
$con = pg_pconnect("$host $port  $dbname $credentials ");
if( !$con ) {
echo 'Connection not  established';
die("Error");
}
else{
    // echo "success f ";
}
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from login where username='$username'";
    $result = pg_query($con, $sql);
    $num = pg_num_rows($result);
    // echo var_dump($num);
    if ($num == 1){
        while($row=pg_fetch_array($result)){
            if(password_verify($password,$row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: /project/index.php");
            }
        }
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



 
    <!-- External CSS -->
    <link rel="stylesheet" href="/project/css/loginstyle.css" type="text/css">
    <!-- <link rel="stylesheet" href="/project/css/login2.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <!-- <link rel="shortcut icon" href="/project/images/favicon.png" type="image"> -->
    <style>

    </style>
</head>

<body>
    <?php
    if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are logged in!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Password do not match</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Have an account?</h3>
                        <form action=" " class="login-form" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control rounded-left"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password" required>
                            </div>
                            <a mb-3 href="/project/partials/sign.php">Create account</a>

                            <center>
                                <div class="form-group d-md-flex">
                                    <div class="w-50  text-center ">
                                        <!-- <a href="#">Don't have an account Create account</a> -->
                                    </div>
                                </div>
                            </center>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>