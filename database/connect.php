<?php
    error_reporting(0);
    $dblocal="localhost:3307";
    $dbuser="vtca";
    $dbpass="vtcacademy";
    $dbname="vu_ban";
    $conn=mysqli_connect($dblocal,$dbuser,$dbpass,$dbname);
    // $conn=mysqli_connect('localhost:3000', 'root', '', 'project_2');
    if($conn){
        mysqli_query($conn,"SET NAMES 'UTF8'");
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
    }else{
        echo "Kết nối thất bại!".mysqli_connect_error();
    }
