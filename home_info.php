<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-Aman Tamboli</title>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
    <div class="wrapper bgded overlay" style="background-image:url('https://images.unsplash.com/photo-1425321442387-141779fb1e57?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=631&ixid=MnwxfDB8MXxyYW5kb218fHx8fHx8fHwxNjI0Mjc2NDQx&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1950');">
        <div id="pageintro" class="hoc clear"> 
          <!-- ################################################################################################ -->
   <article>
            <p>Welcome To </p>
            <h3 class="heading">D'assurance</h3>
            <p>We Offer valuable Car & Health Insurance </p>
 <?php  
           if(!$loggedin){  echo' <footer>
              <a class="btn" href="/project/partials/sign.php">Create Account <i class="fas fa-angle-right"></i></a>
              <div class="separator">OR</div>
              <a class="btn" href="/project/partials/login.php">SignIn<i class="fas fa-angle-right"></i></a>
            </footer>';
          }
          if($loggedin){ echo  '<footer>
              <a class="btn" href="/project/health_insurance.php">Get Health Insurance <i class="fas fa-angle-right"></i></a>
              <div class="separator">OR</div>
              <a class="btn" href="/project/car_insurance.php">Get Car Insurance <i class="fas fa-angle-right"></i></a>
            </footer>';
          }
            ?>
          </article>
        

         
          <!-- ################################################################################################ -->
        </div>
      </div>

      <div class="wrapper row3">
        <main class="hoc container clear"> 
          <!-- main body -->
          <!-- ################################################################################################ -->
          <div class="sectiontitle">
            <h6 class="heading">Health Insurance Cover</h6>
            <p>help you save money on Health Insurance</p>
          </div>
          <div class="group center btmspace-80">
            <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i class=" fas fa-clipboard-list"></i></a>
              <h6 class="heading">Complete Our Form</h6>
              <p>Ensure quick and hassle-free claims service when your family needs it
                the most. We guarantee one day settlement for all death claims, with interest
                payable for every day of delay beyond one working day.</p>
            </article>
            <hr>
            <br>
            <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class=" fas fa-hands-helping"></i></a>
              <h6 class="heading">Compare Quotes</h6>
              <p>All premiums paid and benefits received are eligible for tax benefits
                under Sections 80D,80C and 10(10D)</p>
            </article>
            <hr>
            <br>
            <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fas fa-ribbon"></i></a>
              <h6 class="heading">Get Covered</h6>
              <p>Get covered against 34 specified critical illnesses such as cancer and
                heart attack. Claim paid out on first diagnosis, no hospital bills needed. Policy
                will continue with the life cover reduced by the extent of the critical illness
                benefit paid.</p>
            </article>
          </div>
          <p class="center"><a class="btn" href="/project/health_insurance.php">GEt HEalth Insurance <i class="fas fa-angle-right"></i></a></p>
          <!-- ################################################################################################ -->
          <!-- / main body -->
          <div class="clear"></div>
        </main>
      </div>

      <div class="wrapper row2">
        <section class="hoc container clear"> 
          <!-- ################################################################################################ -->
          <article class="one_third first">
            <h6 class="heading">Do I need car insurance?</h6>
            <p>Car insurance is a legal requirement if you want to drive on 
              roads. This is true for all drivers,so you'll be able to find car insurance.</p>
            <p class="btmspace-30">You should be able to find car insurance for most types of cars,
              though
              you may need to take out specialised cover for some vehicles.</p>
            <p><a class="btn" href="/project/car_insurance.php">Get Car insurance <i class="fas fa-angle-right"></i></a></p>
          </article>
          <figure class="one_third"><a class="imgover" href="#"><img src="https://images.unsplash.com/photo-1623873015781-9f5ce664e144?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=420&ixlib=rb-1.2.1&q=80&w=348" alt=""></a></figure>
         
          <!-- ################################################################################################ -->
        </section>
      </div>
</body>
</html>