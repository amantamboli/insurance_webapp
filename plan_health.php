<?php

session_start();
$showAlert = false;
echo "You logged in under name: ".$_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    require 'partials/dbconnect.php'; //enables database connection 
   $gender= $_SESSION['gender'];
   $insure= $_SESSION['insure'];
    $_SESSION['pincode'];
    $username=$_SESSION['username'];
        $plan=$_POST["plan"];
        $_SESSION['plan']=$plan;
        
      //write sql insert query 
        $sql = "insert into health_detail values('$gender','$insure','$plan','$username');";
       
        $result = pg_query($con, $sql);
        if($result){
            echo "inserted";
            header("location: basic_details.php");
        
        }
        else{
            $showAlert = true;
        }
        switch($plan){
            case "health_silver":
                              $_SESSION['pprice']=621;
                              $_SESSION['pplan']="Silver Health Insurance";
                              break;
            case "health_gold":
                              $_SESSION['pprice']=968;
                              $_SESSION['pplan']="Gold Health Insurance";
                              break;
            case "health_premium":
                              $_SESSION['pprice']=1660;
                              $_SESSION['pplan']="Premium Health Insurance";
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
    <link rel="shortcut icon" href="/project/images/favicon.png" type="image" />
    <title>Health Policies</title>
    <link rel="stylesheet" href="/project/css/stylehealthcard.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <embed src="partials/step2.html" type="text/html" width="100%" height="160">

    <form action="plan_health.php" method="POST">
        <div class="container">
            <div class="box">
                Select Your Plan
            </div>
            <div class="grid">
                <label class="card">
                    <input name="plan" value="health_silver" class="radio" type="radio" />

                    <span class="plan-details">
                        <span class="plan-type">Silver</span>
                        <span class="plan-cost">₹621<span class="slash">/</span><span class="plan-cycle"
                                title="month">month</span></span>
                        <span>Cover:<b>₹5L</b></span>
                        <span>250 Cashless Hospitals</span>
                        <span>Bonous on no claim</span>
                    </span>
                </label>
                <label class="card">
                    <input name="plan" value="health_gold" class="radio" type="radio" checked />
                    <span class="hidden-visually"></span>
                    <span class="plan-details" aria-hidden="true">
                        <span class="plan-type">Gold</span>
                        <span class="plan-cost">₹968<span class="slash">/</span><span
                                class="plan-cycle">month</span></span>
                        <span>Cover:<b>₹25L</b></span>
                        <span>250 Cashless Hospitals</span>
                        <span>Restoration of cover</span>
                    </span>
                </label>
                <label class="card">
                    <input name="plan" value="health_premium" class="radio" type="radio" />
                    <span class="hidden-visually"></span>
                    <span class="plan-details" aria-hidden="true">
                        <span class="plan-type">Premium</span>
                        <span class="plan-cost">₹1660<span class="slash">/</span><span
                                class="plan-cycle">month</span></span>
                        <span>Cover:<b>₹1Cr</b></span>
                        <span>250 Cashless Hospitals</span>
                        <span>Existing illness waiting Period</span>
                    </span>
                </label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" value="submit">Confirm</button>
            </div>
        </div>
    </form>
   



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