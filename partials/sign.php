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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/sign-style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
    $mailsent=true;
    if($mailsent){
        header("location: login.php");
    }
   
    
    }


    if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container right-panel-active" id="container">
        <div class="form-container sign-up-container">
            <form  action="sign.php" method="post">
                <h1>Sign Up</h1>
               
                <span>or use your email for registration</span>
                <input type="text" name="username" placeholder="Username" required="required"/>
                <input type="email" placeholder="Email" name="email" required="required"/>
                <input type="password" placeholder="Password"  name="password" required="required"/>
                <input type="password" placeholder="Confirm Password" name="cpassword" required="required"/>
                <button type="submit" >Sign Up</button>
            </form>
        </div>
       
        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-left">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button  class="ghost" id="signUp">Fill the form below</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById("signUp");
        const signInButton = document.getElementById("signIn");
        const container = document.getElementById("container");

        signUpButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });

       
function login() {
  location.replace("login.php")
}

    </script>

</body>

</html>