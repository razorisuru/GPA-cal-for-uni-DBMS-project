<?php
$databaseHost = 'localhost';
$databaseName = 'gpa';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


$maths_query = "SELECT * FROM subjects where s_id=1";               // MATHS
$maths = mysqli_query($mysqli, $maths_query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while ($row = mysqli_fetch_assoc($maths)) {
  $sidMaths = $row['s_id'];
  $snameMaths = $row['s_name'];
  $scdMaths = $row['s_credit'];
}

// echo $snameMaths;
// echo $scdMaths;

$dbsm_query = "SELECT * FROM subjects where s_id=2";               // DBMS
$dbsm = mysqli_query($mysqli, $dbsm_query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while ($row = mysqli_fetch_assoc($dbsm)) {
  $sidDBSM = $row['s_id'];
  $snameDBSM = $row['s_name'];
  $scdDBSM = $row['s_credit'];
}

// echo $snameDBSM;
// echo $scdDBSM;

$web_query = "SELECT * FROM subjects where s_id=3";               // web
$web = mysqli_query($mysqli, $web_query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while ($row = mysqli_fetch_assoc($web)) {
  $sidWeb = $row['s_id'];
  $snameWeb = $row['s_name'];
  $scdDWeb = $row['s_credit'];
}

// echo $snameWeb;
// echo $scdDWeb;

$ethics_query = "SELECT * FROM subjects where s_id=4";               // Ethics
$ethics = mysqli_query($mysqli, $ethics_query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while ($row = mysqli_fetch_assoc($ethics)) {
  $sidEthics = $row['s_id'];
  $snameEthics = $row['s_name'];
  $scdEthics = $row['s_credit'];
}

// echo $snameEthics;
// echo $scdEthics;

$os_query = "SELECT * FROM subjects where s_id=5";               // OS
$os = mysqli_query($mysqli, $os_query);    // sending the query to the database

//  displaying all the data retrieved from the database using while loop
while ($row = mysqli_fetch_assoc($os)) {
  $sidOs = $row['s_id'];
  $snameOs = $row['s_name'];
  $scdOs = $row['s_credit'];
}

// echo $snameOs;
// echo $scdOs;
