<?php
$showAlert = false;
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
    // echo "success  ";
}
    $username = $_POST["username"];
    $password = $_POST[ "password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $to = $_POST["email"];
    $exists=false;
    $existSql="select * from login where username='$username';";
    $result = pg_query($con,$existSql);
    $rowExists=pg_num_rows($result);
    if($rowExists>0){
        $exists=true;
        $showError = " username is alerady exists";
    }
    else{
        // $exists==false;
        if(($password == $cpassword &&  $exists==false)){
            $hash= password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into login values('$username','$email','$hash');";
            $result = pg_query($con,$sql);
            if ($result){
              
                $showAlert = true;
             
                
            }
        }
        else{
            $showError = "Password and confirm password do not match";
        }
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="/project/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="/project/bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="/project/bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->

    <style>

    </style>
    <title>Insurance</title>
    <link rel="stylesheet" href="/project/css/signup.css" type="text/css">
    <link rel="shortcut icon" href="/project/images/favicon.png" type="image">
</head>


<body>

    <?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Your account has been created now you can login 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  
    include 'E:\xaamp\htdocs\project\mailer\signup_confirm.php';
    echo confirm($to,$username);
   
    
    }


    if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

 

    <div class="signup-form ">
        <form action="" method="post" class="form-horizontal">
            <div class="col-xs-8 col-xs-offset-4">
                <h2>Sign Up</h2>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-4">Username</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="username" required="required" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-4">Email Address</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="email" required="required" placeholder="User ID">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-4">Password</label>
                <div class="col-xs-8">
                    <input type="password" class="form-control" name="password" required="required"
                        placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-4">Confirm Password</label>
                <div class="col-xs-8">
                    <input type="password" class="form-control" name="cpassword" required="required"
                        placeholder="Confirm Password">
                    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8 col-xs-offset-4">
                    <p><label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a
                                href="#">Terms
                                of Use</a> &amp; <a href="#">Privacy Policy</a>.</label></p>
                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                </div>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="/project/partials/login.php">Login here</a></div>
    </div>

</body>

</html>
