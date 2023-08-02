<?php include("connect.php"); 
error_reporting(0);
$id2 = $_GET['id1'];

$query = "SELECT * FROM form where id= '$id2'";

//For Execute
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
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
            Update Details
        </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" value="<?php echo "$result[fname]" ?>" name="fname" required>
            </div>
            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" value="<?php echo "$result[lname]" ?>" name="lname" required>
            </div>
            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select">

                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male" <?php if($result['gender'] == 'Male'){
                        echo "Selected";
                    } ?>>Male</option>
                    <option value="Female" <?php if($result['gender'] == 'Female'){
                        echo "Selected";
                    } ?>>Female</option>
                    <option value="Others" <?php if($result['gender'] == 'Others'){
                        echo "Selected";
                    } ?>>Others</option>
                </select>

                </div>
            </div>
            <div class="input_field" required>
                <label>E-mail Address</label>
                <input type="email" class="input" value="<?php echo "$result[email]" ?>" name="email">
            </div>
            <div class="input_field" required>
                <label>Phone Number</label>
                <input type="text" class="input" value="<?php echo "$result[phone]" ?>" name="phone">
            </div>
            <div class="input_field" required>
                <label>Address</label>
                <textarea class="textarea" name="address">
                <?php echo "$result[address]"; ?>
                </textarea>
            </div>
            <div class="input_field terms">
                <label class="check" required>
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Update" class="btn" name="update">
            </div>
        </div>
</form>
    </div>
</body>
</html>

<?php
    if($_POST['update']){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
            if($fname != "" && $lname !="" && $gender !="" && $email !="" && $phone !="" && $address !=""){

                $checkquery="SELECT * FROM form WHERE email='$email' AND id !='$id2'";
                $result = mysqli_query($conn,$checkquery);
                $present = mysqli_num_rows($result);
                if($present>0){
                    echo "<script>alert('User already exits')</script>";
                }
                else{
                   
                    $query = "UPDATE form SET fname='$fname',lname='$lname',gender='$gender',email ='$email',phone='$phone',address='$address' where id= '$id2'";
                    $data = mysqli_query($conn,$query);
    
                }

                if($data){
                    echo "Data Inserted Successfully";
                }
                else{
                    //echo "Failed";
                }

        if($data){
            //echo "<script>alert('Record Updated')</script>";
            ?>
                <meta http-equiv="refresh" content= "0; url = http://localhost/aadi/display.php"/>
            <?php
        }
    
    }
}
?>