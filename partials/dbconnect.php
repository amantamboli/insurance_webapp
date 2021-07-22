<?php

$host="host=127.0.0.1";
$port="port=5432";
$dbname="dbname=insurance";
$credentials="user=postgres password=7781";
$con = pg_pconnect("$host $port  $dbname $credentials ");
if( !$con ) {
echo 'Connection not  established';
die("Error");
}
else{
    // echo "success f ";
}


?>