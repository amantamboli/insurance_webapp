<?php

session_start();
$showAlert = false;
echo "You logged in under name: ".$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    require 'partials/dbconnect.php'; //enables database connection 
 
   
    $username=$_SESSION['username'];
        $plan=$_POST["plan"];
        $_SESSION['plan']=$plan;
        $carname=$_SESSION['carname'];
        $model=$_SESSION['model'];
        $fuel=$_SESSION['fuel'];
        $varient=$_SESSION['varient'];
        $reg_no=$_SESSION['reg_no'];
        
        $sql = "insert into car_detail values('$carname','$model','$reg_no','$username','$varient','$plan');";
       
        $result = pg_query($con, $sql);
        if($result){
            echo "inserted";
            header("location: basic_details.php");
        
        }
        else{
            $showAlert = true;
        }

        switch($plan){
            case "car_silver":
                              $_SESSION['pprice']=4628;
                              $_SESSION['pplan']="Silver Car Insurance";
                              break;
            case "car_gold":
                              $_SESSION['pprice']=5096;
                              $_SESSION['pplan']="Gold Car Insurance";
                              break;
            case "car_premium":
                              $_SESSION['pprice']=6247;
                              $_SESSION['pplan']="Premiun Car Insurance";
                              break;
        }
        
        
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
    <title>card</title>
    <link rel="stylesheet" href="/project/css/stylehealthcard.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Car Policies</title>
  

</head>

<body>
    <embed src="partials/step2.html" type="text/html" width="100%" height="160">

    <form action="plan_car.php" method="POST">
        <div class="container">
            <div class="box">
                Select Your Plan
            </div>
           
            <div class="grid">
                <label class="card">
                    <input name="plan" value="car_silver" class="radio" type="radio" >

                    <span class="plan-details">
                        <span class="plan-type">Silver</span>
                        <span class="plan-cost">₹4,628<span class="slash">/</span><span class="plan-cycle"
                                title="month">month</span></span>
                        <span>IDV:<b>₹5,19,300</b></span>    <!-- IDV insured declared value -->
                        <span>19 Cashless Garages</span>
                        <span> months repair warranty</span>
                    </span>
                </label>
                <label class="card">
                    <input name="plan" value="car_gold" class="radio" type="radio"  checked>
                    <span class="hidden-visually"></span>
                    <span class="plan-details" aria-hidden="true">
                        <span class="plan-type">Gold</span>
                        <span class="plan-cost">₹5,096<span class="slash">/</span><span class="plan-cycle">month</span></span>
                        <span>IDV:<b>₹4,15,440</b></span>
                        <span>19 Cashless Garages</span>
                        <span>Reimbursement within 3 working days</span>
                    </span>
                </label>
                <label class="card">
                    <input name="plan" value="car_premium" class="radio" type="radio">
                    <span class="hidden-visually">Premium </span>
                    <span class="plan-details" aria-hidden="true">
                        <span class="plan-type">Premium</span>
                        <span class="plan-cost">₹6247<span class="slash">/</span><span
                                class="plan-cycle">month</span></span>
                        <span>IDV:<b>₹5,48,943</b></span>
                        <span>34 Calshless Garages</span>
                        <span>Spot Claim upto 30k</span>
                    </span>
                </label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" value="submit">Confirm</button>
            </div>
        </div>
    </form>
        
    <div class="mag">
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