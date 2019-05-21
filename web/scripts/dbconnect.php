<?php
//connect to mysql database
$con = mysqli_connect("localhost", "root", "", "u798788797_loop") or die("Error " . mysqli_error($con));
date_default_timezone_set('Asia/Kolkata');
$timeNow = date("Y-m-d H:i:s");

//Site Details Section
$siteName = "L L";
$siteNameFull = "Local Loop";
$tagline = "Your Offline Shopping Reviewed!";
$siteLink = "";

//OG Links and Twitter Cards
$metaTag1 = '';
$metaTag2 = '';


//Copyright Section

$copyrightText = "Crafted with &hearts; by <a href=\"http://mindwebs.org\" target=\"_blank\" >MinD Webs Team</a> | Confidential Copyrights &copy; 2018-2025";
$ourMail = "contact@mindwebs.org";
$versionID = "1.0.14";

//Adwords Section

$addInsert1 = '';
$addInsert2 = '';
$addInsert3 = '';
$addInsert4 = '';
$addInsert5 = '';

?>