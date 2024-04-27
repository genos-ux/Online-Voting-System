<?php
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $lpassword = $_POST['lpassword'];
        $address = $_POST['address'];
        $image = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $role = $_POST['role'];

        if($password == $lpassword){
            move_uploaded_file($tmp_name,"../uploads/$image");

            $insert = mysqli_query($connect, "INSERT INTO user(name,mobile,address,password,photo,role,status,votes) VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)");

            if($insert){
                echo `
                <script>
                    alert("Registration Successful!");
                    window.location = "../";
                </script>

            `;
            }
            else{
                echo `
                <script>
                    alert("Some error occured!");
                    window.location = "../routes/register.html";
                </script>

            `;
            }
        }

        else{
            echo `
                <script>
                    alert("Password and Confirm password does not match");
                    window.location = "../routes/register.html";
                </script>

            `;
        }
    }
?>
