<?php
session_start();
$showAlert = false;
echo "You logged in under name: ".$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    require 'partials/dbconnect.php'; //enables database connection 
    $username=$_SESSION['username'];
    $_SESSION['carname']=$_POST["carname"];
    $_SESSION['model']=$_POST["model"];
    $_SESSION['fuel']=$_POST["fuel"];
    $_SESSION['varient']=$_POST["varient"];
    $_SESSION['reg_no']=$_POST["reg_no"];
    header("location: plan_car.php");     
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
    <title>Car Detail</title>
    <link rel="shortcut icon" href="/project/images/favicon.png" type="image" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <embed src="partials/step.html" type="text/html" width="100%" height="120">


    <form class="row g-3 container" action="car_info.php" method="POST">
        <div class="box-fnt">CAR DETAILS</div>
        <div class="col-md-12 ">
            <label for="reg_no" class="form-label">Car Reg. Number</label>
            <input type="text" class="form-control" id="reg_no" placeholder="MH 12 DR 6423" name="reg_no">
        </div>
        <!-- pattern="^[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{3,4}$" -->

        <div class="col-md-12">
            <label for="carname" class="form-label">Car Name</label>
            <input type="text" class="form-control" id="carname" name="carname">
        </div>
        <div class="col-md-12">
            <label for="model" class="form-label">Model Name</label>
            <input type="text" class="form-control" id="model" name="model">
        </div>
        <div class="col-md-12">
            <label class="form-label" for="autoSizingSelect">Select Car Fuel Type</label>
            <select class="form-select" id="autoSizingSelect" name="fuel">
                <option selected>Choose...</option>
                <option>Disel</option>
                <option>Petrol</option>
                <option>CNG</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="varient" class="form-label">Enter Varient</label>
            <input type="text" class="form-control" id="varient" placeholder="1200cc" name="varient">
        </div>

        <div>
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