<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="/Users/z/Desktop/CVEOSMS/css/userCss.css"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php 
$currentDate = date("Y-m-d");
$currentDateEC= date_create($currentDate);
$currentDateEC =date_sub($currentDateEC,date_interval_create_from_date_string("7 years 8 month 10 days"));
$currentDateEC = date_format($currentDateEC,"Y-m-d");

define('currentDate' , $currentDate);  
define('currentDateEC' , $currentDateEC); 



?>