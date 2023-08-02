<?php
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Change Password
        </div>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
        <div class="form">
        <div class="input_field">
        <label>Old Password</label>
                <input type="password" class="input" name="opassword">
</div>
<div class="input_field">
                <label>New Password</label>
                <input type="password" class="input" name="npassword">
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="cpassword">
            </div>
            <div class="input_field">
                <input type="submit" value="Change Password" class="btn" name="update">
            </div>
        </div>
</form>
    </div>
</body>
</html>

<?php
include("connect.php");
$email=$_SESSION['email'];
if(isset($_POST['update'])){
$oldpassword = $_POST['opassword'];
$password = $_POST['password'];
$confirmnewpassword = $_POST['cpassword'];

                 $sql = "SELECT password FROM form WHERE email = '$email'";
             $res = mysqli_query($conn,$sql);
             $row = mysqli_fetch_assoc($res);
             if(password_verify($oldpassword,$row['password'])){
                if($confirmnewpassword == ''){
                    $error[] = 'Please Confirm The Password.';
                }
                if($password != $confirmnewpassword){
                    $error[] = 'Password do not Match.';
                }
             }
             if(!isset($error)){
                $password = password_hash($password ,PASSWORD_BCRYPT);
                $result = mysqli_query($conn, "UPDATE form SET password = $password WHERE email='$email'");
                if($result){
                    header("Location:login.php");
                }
                else{
                    $error[]='something went wrong';
                }
             }
             else{
                $error[]= 'Current Password does not match';
             }
}

?>