<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $conn = mysqli_connect($server, $user, $password);
    // if($conn){
    //     echo "Database connected";
    // }else{
    //     echo "Fail to connect";
    // }
    $databse_name = "hr";
    $create = "CREATE DATABASE IF NOT EXISTS $databse_name";
    $check = mysqli_query($conn, $create);
    // if($check){
    //     echo "Database created successfully";
    // }else{
    //     echo "Fail to Create database".mysqli_error($conn);
    // }
    $conn = mysqli_connect($server, $user, $password, $databse_name);
    // if($conn){
    //     echo "Connect and created";
    // }else{
    //     echo "<br> fail : ". mysqli_error($conn)."<br>";
    // }
    $tableapplicant = "CREATE TABLE IF NOT EXISTS applicant(
        id INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(14) NOT NULL,
        gender VARCHAR(14) NOT NULL,
        nationalid TEXT NOT NULL,
        nextofkin VARCHAR(14) NOT NULL,
        bvn VARCHAR(14) NOT NULL,
        address TEXT NOT NULL,
        applicantid VARCHAR(100) NOT NULL,
        reg_date TIMESTAMP
    )";
    // if(mysqli_query($conn, $tableapplicant)){
    //     echo "Table created successfully";
    // }else{
    //     echo "<br>Fail to create". mysqli_error($conn);
    // }
?>