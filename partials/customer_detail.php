<?php
session_start();
$username = $_SESSION['username'];
include 'dbconnect.php';


$sql = "Select * from customer where username='$username'";
$result = pg_query($con, $sql);
$num = pg_num_rows($result);

if ($num){
   
    while($row=pg_fetch_array($result)){
        $full_name= $row["full_name"];
        $dob= $row['dob'];
        $city= $row['city'];
        $state= $row['state'];
        // $email= $row['email'];
        $address= $row['address'];
        $adhar= $row['adhar'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Customer Detail</title>

    <style>
    .box {
        margin: auto;
        background-color: #f2f2f2;
        margin-top: 25px;
        width: 30vw;
        border-radius: 9px;
        height: 50vh;

    }

    .box-fnt {
        margin: auto;
        font-size: 30px;
        text-align: center;

    }


    .main-container {
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: transparent;
    }

    .button {

        position: relative;
        background-color: transparent;
        padding: 5px 10px;
        color: #000000;
        border: none;
        font-size: 18px;
        transform: none;
        cursor: pointer;
        border-radius: 5px;
        text-decoration: none;
    }

    .button:after {
        content: "";
        height: 100%;
        width: calc(100% + 0px);
        position: absolute;
        top: 0px;
        left: 0px;
        border-top: 2px solid rgb(0, 0, 0);
        border-bottom: 2px solid rgb(0, 0, 0);
        transition: 1s;
        border-radius: 5px;
        color: #000000;
    }

    .button:before {
        content: "";
        height: calc(100% + 0px);
        width: 100%;
        position: absolute;
        top: 0px;
        left: 0px;
        border-left: 2px solid rgb(0, 0, 0);
        border-right: 2px solid rgb(0, 0, 0);
        transition: 1s;
        border-radius: 5px;
    }

    .button:hover:before {
        transform: rotateY(180deg);
    }

    .button:hover:after {
        transform: rotateX(180deg);
    }

    .ddr {
        margin: auto;
        padding: 10px;
        /* border: 2px solid red; */

    }

    .column {
        float: left;
        width: auto;
        margin-left: 70px;
        padding: 10px;
        height: auto;
        /* text-align: right; */
        /* Should be removed. Only for demonstration */
    }

 

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    @media (max-width: 800px) {
        .box {
       
        width: 100%;
    
    }
   
    }
    </style>

</head>

<body>


    <div class="box">
        <div class="box-fnt">Customer Detail</div>
        <div class="ddr">
            <div class="row">
                <div class="column">

                    <div><i class="fa fa-user">Full Name:</i> <?php echo  $full_name;?></div>
                    <div><i class="fa fa-id-card">Adhar No:</i><?php echo $adhar; ?></div>
                    <div><i class="fa fa-address-card">Address:</i><?php echo '    '.$address; ?></div>
                    <div><i class="fa fa-birthday-cake">BirthDate:</i><?php echo  '  '.$dob; ?></div>
                    <div><i class="fa fa-building">City:</i><?php echo '     '.$city; ?> </div>
                    <div><i class="fa fa-home">State:</i><?php echo '    '.$state; ?></div>

                </div>

            </div>

        </div>
        <div class="main-container">
            <a href="/project/main.php" class="btn button">CONTINUE</a>
        </div>
    </div>
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