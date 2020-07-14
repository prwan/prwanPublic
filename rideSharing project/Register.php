<?php 
    $con = mysqli_connect("localhost", "prawnguns", "tjdwls!1214", "prawnguns");
    mysqli_query($con,'SET NAMES utf8');

    $userID = $_POST["userID"];
    $userPassword = $_POST["userPassword"];
    $userName = $_POST["userName"];
    $userAge = $_POST["userAge"];
    $userAddress = $_POST["userAddress"];
    $userNumber = $_POST["userNumber"];
    $userEmail = $_POST["userEmail"];

    $statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "sssisis", $userID, $userPassword, $userName, $userAge, $userAddress, $userNumber, $userEmail);
    mysqli_stmt_execute($statement);


    $response = array();
    $response["success"] = true;
 
   
    echo json_encode($response);



?>