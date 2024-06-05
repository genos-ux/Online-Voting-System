<?php
session_start();
// if(isset($_SESSION['userdata'])){
//     header('location: ../');
// }
$userdata = $_SESSION['userdata'];

// if(isset($_SESSION['groupdata']))
// {
//     $groupdata = $_SESSION['groupdata'];

// }
$groupdata = $_SESSION['groupdata'];

// if($userdata['status'] == 0)
// {
//     $status = `<b style="color:red">Not voted</b>`;
// }

// else
// {
//     $status = `<b style="color:green">Voted</b>`;
// }
$status = $userdata['status'] == 0 ? "<b style='color:red'>Not voted</b>" : "<b style='color:green'>Voted</b>";

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
            border: none;
            cursor: pointer;
            margin: 10px;
        }

        #logoutbtn{
            padding: 10px;
            border-radius: 5px;
            background-color: #48dbfb;
            color: white;
            border: none;
            font-size: 15px;
            float: right;
            cursor: pointer;
            margin: 10px;
        }

        #Profile {
            background: white;
            width: 30%;
            padding: 10px;
            float: left;
        }

        #Group
        {
            background: white;
            width: 64%;
            padding: 10px;
            float: right;
        }

        #votebtn {
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: #48dbfb;
            border-radius: 5px;

            border: none;
            cursor: pointer;

        }

        #mainSection
        {
            padding : 10px;
        }

        #mainpanel
        {
            padding : 10px;
        }


    </style>
</head>
<body>
    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn">Back</button></a>
                <!-- <button id="logoutbtn"><a href="logout.php"></a>Logout</button> -->
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                <h1>Online Voting System</h1>
            </div>

        </center>
        <hr>

        <div id="mainpanel">
            <div id="Profile" style="float:left;text-align:justify;">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="150" width="150" alt="sitting down"><br><br></center>

                <b>Name:</b> <?php echo $userdata['name'] ?><br><br>
                <b>Mobile:</b> <?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b> <?php echo $userdata['address'] ?><br><br>
                <b>Status:</b> <?php echo $status  ?> <br><br>

            </div>
            <div id="Group">
                <?php
                    if($_SESSION["groupdata"])
                    {
                        for($i = 0; $i < count($groupdata); $i++){
                            ?>
                            <div>
                                <img style="float: right" src="../uploads/<?php echo $groupdata[$i]['photo'] ?>" alt="" width = "100" height="100">

                                <b>Candidate Name: <?php echo $groupdata[$i]['name'] ?> </b><br><br>
                                <b>Votes: <?php echo $groupdata[$i]['votes'] ?></b> <br><br>
                                <form action="../api/vote.php" method = "POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
                                    <input type="submit" name="votebtn" value="vote" id="votebtn">
                                </form>

                                <hr>
                            </div>
                            <?php
                        }

                    }
                    else
                    {

                    }

                ?>

            </div>

        </div>



    </div>


</body>
</html>
