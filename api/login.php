<?php
session_start();

include('connect.php');
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$result = mysqli_query($connect, "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password' AND role = '$role'");

if(mysqli_num_rows($result) > 0){
    $userdata = mysqli_fetch_array($result);
    $groups = mysqli_query($connect,"SELECT * FROM user WHERE role = 1");
    $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupdata'] = $groupsdata;

    echo '
        <script>
            window.location = "../routes/dashboard.php";
        </script>
    ';

}

else{
    echo '
        <script>
            alert("Invalid credentials or User not found");
            window.location = "../";

        </script>

    ';

}

?>
