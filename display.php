<?php
session_start();
?>
<html>
    <head>
        <title>Display</title>
        <style>
            .update, .delete, .add, .change{
                background-color: #4ba6b6;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 35px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
            } 
            .add{
                position: relative;
                bottom: 32px;
                left: 100px;
                margin: 20px;
                padding: 10px;
                text-decoration: none;
            }
            .change{ 
                position: relative;
                left: 950px;
                bottom: 32px;
                margin: 20px;
                padding: 10px;
                text-decoration: none;
            }
        </style>
    </head>
</html>
<?php
include("connect.php");
error_reporting(0);

$userprofile = $_SESSION['email'];

if($userprofile == true){

}
else{
    header('location:login.php');
}

$query = "SELECT * FROM form";

//For Execute
$data = mysqli_query($conn,$query);

//Count line of data
$total = mysqli_num_rows($data);


//echo $total;

if($total > 0){
    ?>
    <h2 align=center>Display All Records</h2>
    <a href="form.php" class='add'>Add</a>
    <a href="change.php?id=$result[id] &email=$result[email]" class="change">Change Password</a>
    <center><table border="2px" cellspacing="7" width="100%">
        <tr>
        <th width="5%">ID</th>
        <th width="8%">First Name</th>
        <th width="8%">Last Name</th>
        <th width="10%">Gender</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="24%">Address</th>
        <th width="15%">Operations</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>". "$result[id]" ."</td>
        <td>". "$result[fname]" ."</td>
        <td>". "$result[lname]" ."</td>
        <td>". "$result[gender]" ."</td>
        <td>". "$result[email]" ."</td>
        <td>". "$result[phone]" ."</td>
        <td>". "$result[address]" ."</td>

        <td><a href='update_design.php?id1=$result[id]'><input type='submit' value='Update' class='update'></a>
        <a href='delete.php?id1=$result[id]'><input type='submit' value='Delete' class='delete'></a></td>
        </tr>";
    }
}
else{
    echo "Not Record Found";
}
?>
    </table>
<a href="logout.php"><input type="submit" name="" value="LogOut" style="background:#4ba6b6; color:white; height:35px; width=100px; margin-top: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer; "></a>
</center>