<?php

    session_start();
    $showAlert = false;
    echo "You logged in under name: ".$_SESSION['username'];
    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        require 'partials/dbconnect.php'; //enables database connection 
        
            $username=$_SESSION['username'];
            $pincode=$_SESSION['pincode'];
            $pincode=$_POST["pincode"];
            $_SESSION['pincode']=$pincode;
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $fullname = $fname . ' ' . $lname;
            $_SESSION['fullname']=$fullname;
            $adharno=$_POST["adhar"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            $_SESSION['address']=$address;
            $city=$_POST["city"];
            $_SESSION['city']=$city;
            $state=$_POST["state"];
            $_SESSION['state']=$state;
            $DOB = date('Y-m-d', strtotime($_POST['DOB']));
            $bname=$_POST["bname"];
            $acc_no=$_POST["acc_no"];
            $brname=$_POST["brname"];
            //sql query for insertion in customer table
            $sql = "insert into customer values('$fullname',$adharno,'$address','$DOB','$city',$phone,'$state', $pincode,'$username');";
            $result = pg_query($con, $sql);
                    if($result){
                        echo "inserted";
                        header("location: /project/payment.php");
                    
                    }
                    else{
                        $showAlert = true;
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
    <title>Basic Detail</title>
    <!-- <link rel="shortcut icon" href="/project/images/favicon.png" type="image" /> -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php 
            if($showAlert){
                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Information not inserted try after some time</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
            }
    ?>

    <embed src="partials/step3.html" type="text/html" width="100%" height="180">


    <form class="row g-3 container" method="POST" action="basic_details.php">
        <div class="box-fnt">DETAILS</div>
        <div class="col-md-6 ">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname">
        </div>
        <div class="col-md-6">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control form-control-sm" id="lname" name="lname">
        </div>
        <div class="col-md-6">
            <label for="adhar" class="form-label">Adhar-Card No</label>
            <input type="number" class="form-control" id="adhar" name="adhar">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone">
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" placeholder="1234 Main St" id="address" name="address">
        </div>
        </div>
        <div class="col-md-6">
            <label for="ad2" class="form-labell">Address 2</label>
            <input type="text" class="form-control" placeholder="Apartment, studio, or floor" id="ad2" name="add">
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select" name="state">
                <option selected>Choose...</option>
                <option value="Andhra pradesh">Andhra pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="">Assam</option>
                <option value="">Bihar</option>
                <option value="">Chhattisgarh</option>
                <option value="">Goa</option>
                <option value="">Gujarat</option>
                <option value="">Jammu and Kashmir</option>
                <option value="">Jharkhand</option>
                <option value="">West Bengal</option>
                <option value="">Karnataka</option>
                <option value="">Kerla</option>
                <option value="">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="">Manipur</option>
                <option value="">Meghalaya</option>
                <option value="">Mizoram</option>
                <option value="">Nagaland</option>
                <option value="">Orissa</option>
            </select>
            </select>
        </div>
        <div class="col-md-6">
            <label for="DOB" class="form-label">Birth Date:</label>
            <input type="date" class="form-control" id="DOB" name="DOB">
        </div>
        <div class="col-md-6">
            <label for="pincode" class="form-label">pincode</label>
            <input type="number" class="form-control" id="pincode" name="pincode">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">CONFIRM</button>
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