<?php

session_start();
$showAlert = false;
echo "You logged in under name: ".$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    require 'partials/dbconnect.php'; //enables database connection 
    
    
    $_SESSION['gender']=$_POST["gender"];
    $_SESSION['insure']=$_POST["insure"];
    $_SESSION['pincode']=$_POST["pincode"];
           
    header("location: plan_health.php");
       
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="shortcut icon" href="/project/images/favicon.png" type="image" /> -->
    <title>Tell Us</title>
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <?php  if($showAlert){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Information not inserted try after some time</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
    }
    ?>

    <embed src="partials/step.html" type="text/html" width="100%" height="180">


    <form class="row g-3 container" action="Tellus.php" method="POST">
        <div class="box-fnt">TELL US</div>
        <div class="col-md-12">
            <label class="form-label" for="autoSizingSelect">Gender</label>
            <select class="form-select" id="autoSizingSelect" name="gender">
                <option selected>Choose...</option>
                <option>Male</option>
                <option>Female</option>
                <option>prefer not to say</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Pincode</label>
            <input type="number" class="form-control" id="inputPassword4" name="pincode">
        </div>
        <div class="col-md-12">
            <label class="form-label" for="autoSizingSelect">Who would you like to insure</label>
            <select class="form-select" id="autoSizingSelect" name="insure">
                <option selected>Choose...</option>
                <option>Me</option>
                <option>My Parents</option>
                <option>Me + my wife/Husband </option>
            </select>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Get Quotes</button>
        </div>

    </form>
    <div class="space">
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>