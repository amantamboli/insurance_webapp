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
    <style>
    body {
        font-family: "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto,
            Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        line-height: 1.4;
        color: #333;
        background-color: #fff;
        padding: 0 5vw;
    }
.container{
    width: 100%;
  
    margin: auto;
}
    /* Standard Tables */

    table {
        width: 100%;
        margin: 1em 0;
        border-collapse: collapse;
        border: 0.1em solid #d6d6d6;
    }

    caption {
        text-align: center;
        padding: 0.25em 0.5em 0.5em 0.5em;
        color: rgb(53, 53, 53);
        font-size: 30px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    th,
    td {
        padding: 0.25em 0.5em 0.25em 1em;
        vertical-align: text-top;
        text-align: center;
        text-indent: -0.5em;
       
        
    }

    th {
        vertical-align: bottom;
        background-color: #666;
        color: #fff;
    }

    tr:nth-child(even) th[scope=row] {
        background-color: #f2f2f2;
    }

    tr:nth-child(odd) th[scope=row] {
        background-color: #fff;
    }

    tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    tr:nth-child(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    td:nth-of-type(2) {
        font-style: italic;
    }

    th:nth-of-type(3),
    td:nth-of-type(3) {
        text-align: right;
    }
    

    /* Fixed Headers */

    thead {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    th[scope=row] {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 1;
    }

    th[scope=row] {
        vertical-align: top;
        color: inherit;
        background-color: inherit;
        background: linear-gradient(90deg, transparent 0%, transparent calc(100% - .05em), #d6d6d6 calc(100% - .05em), #d6d6d6 100%);
    }

    table:nth-of-type(2) th:not([scope=row]):first-child {
        left: 0;
        z-index: 3;
        background: linear-gradient(90deg, #666 0%, #666 calc(100% - .05em), #ccc calc(100% - .05em), #ccc 100%);
    }

    /* Strictly for making the scrolling happen. */


    body {
        padding-bottom: 90vh;
    }
    .link{
        margin: auto;
        width: 10vw;
    }
    a{
        text-decoration: none;
        font-size: 22px;
        color: rgb(84, 85, 84);
    }
    a:hover{
        text-decoration: underline;
    }
    table tr:first-child th:last-child,
    table.Info tr:first-child td:last-child {
        border-top-right-radius: 6px;
    }
    
    /* bottom-left border-radius */
    table tr:last-child td:first-child {
        border-bottom-left-radius: 6px;
    }
    
    /* bottom-right border-radius */
    table tr:last-child td:last-child {
        border-bottom-right-radius: 6px;
    }
    </style>
</head>

<body>

    <div class="container">
        <table>
            <caption>Policy Status</caption>
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Username</th>
                    <th>Policy Name</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=1;
            while(($row=pg_fetch_row($result))!=null){
         
            ?>

                <tr>
                    <td><?php echo  $i;?></td>
                    <td><?php echo  $username;?></td>
                    <td><?php echo  $row[0];?></td>
                    <td><?php echo  $row[2];?></td>

                </tr>
                <?php
             $i++;} 
           
            ?>

            </tbody>
        </table>
    </div>
    <div class="link">
        <a href="/project/main.php">Back</a>
    </div>
</body>

</html>