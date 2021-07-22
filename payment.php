<?php

    session_start();
    $showAlert = false;
    echo "You logged in under name: ".$_SESSION['username'];
    $username=$_SESSION['username'];
    function getmail($username){  //funtion to get email of logged in user 
        
        require 'partials/dbconnect.php';
        $sql = "Select * from login where username='$username'";
        $result = pg_query($con, $sql);
        $num = pg_num_rows($result);
    
        if ($num==1){
        
            while($row=pg_fetch_array($result)){
            echo "1"; 
                $mail= $row['email'];
                $_SESSION['email']=$mail;
                return $mail;}
            }
        }
        $mail=getmail($username);

    if($_SERVER["REQUEST_METHOD"] == "POST" ){
        require 'partials/dbconnect.php'; //enables database connection 
        
        
        $chname=$_POST["cardname"];
        $cno=$_POST["cardnumber"];
        $expdate=$_POST["expdate"];
        $cvv=$_POST["cvv"];
        
            //write sql insert query 
        $sql = "insert into bank values('$username','$chname',$cno,'$expdate',$cvv);";
        $result = pg_query($con, $sql);
        if($result){
            echo "inserted"; 
            }
        else{
             $showAlert = true;
            }

            $plan=$_SESSION['plan'];
            $sqlclaim = "insert into claim values('$plan','$username','not claimed');";
            $resultclaim = pg_query($con, $sqlclaim);
            if($resultclaim){
                echo "inserted";
                $successPayment=true;
                if($successPayment){
                    include 'E:\xaamp\htdocs\project\mailer\success-purchase.php';
                    echo purchase($mail);
                    header("location: thank.php");
                }
                
            
            }
            else{
                $showAlert = true;
            }
            }
        
  
        
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/payment.css">
    <title>Make Payment</title>
    <!-- <link rel="shortcut icon" href="/project/images/favicon.png" type="image" /> -->
</head>

<body>

    <embed src="partials/step4.html" type="text/html" width="100%" height="160">
    <div class="row">
        <div class="col-75">
            <div class="container">

                <form action="payment.php" method="POST">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                       
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                        <input type="text" id="city" name="city">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" ">
                                </div>
                                <div class=" col-50">
                                <label for="zip">Pincode</label>
                                <input type="text" id="zip" name="pincode" placeholder="10001">
                            </div>
                        </div>
                       
                    </div>

                   
                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Date</label>
                            <input type="text" id="expmonth" name="expdate" placeholder="03/26">
                            <div class="row">

                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                </div>
                <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" value="Make Payment" class="btn">
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="container">
                <h3>Payment for Item</h3>
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>1</b></span>
                </h4>
                <p><a href="#"><?php echo  $_SESSION['pplan']; ?></a> <span class="price">₹ <?php echo $_SESSION['pprice']; ?></span></p>
               
                <hr>
                <p>Total <span class="price" style="color:black"><b>₹<?php echo $_SESSION['pprice']; ?></b></span></p>
            </div>
        </div>
    </div>

   <script>
         window.document.getElementById('fname').value = "<?php echo  $_SESSION['fullname'];?>"
         window.document.getElementById('email').value = "<?php echo $mail;?>"
         window.document.getElementById('adr').value = "<?php echo  $_SESSION['address'];?>"
         window.document.getElementById('city').value = "<?php echo $_SESSION['city'];?>"
         window.document.getElementById('state').value = "<?php echo $_SESSION['state'];?>"
         window.document.getElementById('zip').value = "<?php echo $_SESSION['pincode'];?>"
   </script>
</body>

</html>
