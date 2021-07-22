<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- <script src="/bootstrap/js/bootstrap.min.js"></script> -->
    <!--  -->
    <!-- <link rel="stylesheet" href="css/styles.css" type="text/css" /> -->
    <title>D'assurance</title>
    <link rel="shortcut icon" href="/project/images/favicon.png" type="image" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet" />
   
    <link rel="stylesheet" href="/project/css/main.css" />
    <style></style>
</head>

<body>
    <?php include 'partials/navbar.php';?>
    <?php
      
        if(isset($_SESSION['loggedin'])){
        echo "logged in under name: ".$_SESSION['username'];
         }
?>

    <!-- <embed src="home_info.php" type="text/php" width="100%" height="1550" /> -->
    
    <?php require 'home_info.php';?>
    <?php include 'partials/footer.html';?>





</body>

</html>