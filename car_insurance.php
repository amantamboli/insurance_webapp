<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Insurance</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <!-- internal css for health page -->
    <!-- <link rel="stylesheet" href="css/health.css"> -->
    <!-- External css for health page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   
    <!-- jquery library -->
   
    <!-- External CSS -->
    <link rel="stylesheet" href="/project/css/styles.css" type="text/css">
    <link rel="shortcut icon" href="/project/images/favicon.png" type="image">
    <link rel="stylesheet" href="css/applynow.css">
    <style>
   
    </style>
</head>

<body>

    <?php include 'partials/navbar.php';
    if($loggedin){  echo '<div class="apply">
        <a href="car_info.php" class="apply-btn">APPLY NOW</a>
    </div>';
    }
    if(!$loggedin){ echo ' <div class="apply">
        <a href="partials/login.php" class="apply-btn">Click to Login</a>
    </div>';
    }
    ?>
    <embed src="/project/partials/carinfo.php" type="text/php" width="100%" height="1500">
    <?php include 'partials/footer.html';?>
   
</body>

</html>