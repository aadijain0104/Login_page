<?php include("connect.php"); 
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
            Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" required>
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="conepassword" required>
            </div>
            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
                </div>
            </div>
            <div class="input_field" required>
                <label>E-mail Address</label>
                <input type="email" class="input" name="email">
            </div>
            <div class="input_field" required>
                <label>Phone Number</label>
                <input type="text" class="input" name="phone">
            </div>
            <div class="input_field" required>
                <label>Address</label>
                <textarea class="textarea" name="address"></textarea>
            </div>
            <div class="input_field terms">
                <label class="check" required>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Register" class="btn" name="register">
            </div>
        </div>
</form>
    </div>
</body>
</html>

<?php
    if($_POST['register']){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pwd = md5($_POST['password']);
        $cpwd = md5($_POST['conepassword']);
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($pwd === $cpwd) {
            if($fname != "" && $lname !="" && $pwd !="" && $cpwd !="" && $gender !="" && $email !="" && $phone !="" && $address !=""){

                $sql="SELECT * FROM form where email='$email'";
                $result = mysqli_query($conn,$sql);
                $present = mysqli_num_rows($result);
                if($present>0){
                    echo "<script>alert('User already exits')</script>";
                }
                else{
                    //echo "Insert data into database";
                    $query = "INSERT INTO form (fname,lname,password,gender,email,phone,address) VALUES('$fname','$lname','$pwd','$gender','$email','$phone','$address')";
                    $data = mysqli_query($conn,$query);
    
                }

                if($data){
                    echo "Data Inserted Successfully";
                }
                else{
                    echo "Failed";
                }
            }  
        } 
        else {
            echo "Error: Passwords do not match. Please try again.";
            exit;
        }
    }
?>