<?php
session_start();
$username = $_SESSION['username'];
include 'dbconnect.php';


$sql = "Select * from claim where username='$username'";
$result = pg_query($con, $sql);
$num = pg_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <style>
        .link{ 
		text-decoration: none;
		font-size: 23px;
	}
	.link:hover{
		text-decoration: underline;
	}
    .title{
        width: 100%;
        margin: auto;
        font-size: 28px;
    }
</style>

</head>
<body>
   
		<div class="container-table100">
			<div class="wrap-table100">
                <div class="title">
                    Your All Policies Details
                   </div>
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
                            
							<thead>
								<tr class="row100 head">
								<th class="cell100 column2">Sr no</th>
									<th class="cell100 column1">Customer Name</th>
									<th class="cell100">Policy Name</th>
									<th class="cell100">Status</th>
									
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php $i=1;
            while(($row=pg_fetch_row($result))!=null){
         
            ?>

                <tr>
                    <td class="cell100 column2"><?php echo  $i;?></td>
                    <td class="cell100 column1"><?php echo  $username;?></td>
                    <td class="cell100 "><?php echo  $row[0];?></td>
                    <td class="cell100 "><?php echo  $row[2];?></td>

                </tr>
                <?php
             $i++;} 
           
            ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="link">
                    <a href="/project/main.php">&#60&#60 Go To Home Page</a>
                </div>
</body>
</html>