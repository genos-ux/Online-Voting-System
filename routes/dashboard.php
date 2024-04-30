<?php
session_start();

if(isset($_SESSION['userdata'])){
    header('location: ../');
}

$userdata = $_SESSION['userdata'];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        #backbtn{
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: #48dbfb;
            border-radius: 5px;
            float: left;
        }

        #logoutbtn{
            padding: 10px;
            border-radius: 5px;
            background-color: #48dbfb;
            color: white;
            border: none;
            font-size: 15px;
            float: right;
        }
    </style>
</head>
<body>
    <div id="mainSection">
        <center>
            <div id="headerSection">
                <button id="backbtn">Back</button>
                <button id="logoutbtn">Logout</button>
            </div>
            <h1>Online Voting System</h1>
        </center>
        <hr>

        <div id="Profile">
            <img src="../uploads/ <?php echo $userdata['photo'] ?>" height="200" width="200" alt="">

            <b>Name:</b> <?php echo $userdata['name'] ?><br><br>
            <b>Mobile:</b> <?php echo $userdata['mobile'] ?><br><br>
            <b>Address:</b> <?php echo $userdata['address'] ?><br><br>
            <b>Status:</b> <?php echo $userdata['status'] ?><br><br>

        </div>
        <div id="Group">

        </div>

    </div>


</body>
</html>
