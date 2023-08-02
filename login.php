<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <title>Login</title>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #4ba6b6;
}

.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    background: white;
    border-radius: 5px;
}

.center h1{
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid silver;
}

.form {
    padding-bottom: 15px;
    margin: 0 20px;
    text-align: center;
}

.textfield{
    width: 100%;
    height: 50px;
    font-size: 18px;
    border: 1px solid #4ba6b6;
    border-radius: 5px;
    box-sizing: border-box;
    padding-left: 10px;
    margin: 7px 0;
}

.btn{
    width: 100%;
    height: 50px;
    background-color: #4ba6b6;
    border-radius: 5px;
    font-size: 20px;
    margin: 7px 0;
    color: white;
    border: 0;
    cursor: pointer;
}

.btn:hover{
    background-color: skyblue;
}

.forget{
    font-size: 16px;
    padding: 4px 0;
}

.link{
    text-decoration: none;
    color: skyblue;
}

</style>
<body>

  <div class="center">
    <h1>Login</h1>
    <form action="#" method="POST" autocomplete="off">
    <div class="form">
    <input type="text" placeholder="Enter E-mail" class="textfield" name="email" required>

    <input type="password" placeholder="Enter Password" class="textfield" name="password" required>
    
    <div class="forget">
      <a href="forgot.php" class="link" onclick="message()">Forget Password ?</a></div>
      <input type="submit" class="btn" name="login" value="Login">
      <div class="signup">New Member ?<a href="form.php" class="link">SignUpHere</a></div>
    </div>
  </div>
</form>
<script>
    function message(){
        alert("Password yaad rakhna chaiye");
    }
</script>
</body>
</html>

<?php
include("connect.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd = md5($_POST['password']);

    $query = "SELECT * FROM form WHERE email = '$email' && password = '$pwd' ";
    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);

    if($total == 1){
        $_SESSION['email'] = $email;
        header('location:display.php');

        // Extra method
        //<meta http-equiv = "refresh" content = "1; url = http://localhost/aadi/display.php"/>

    }
    else{
        echo "Login Failed";
    }
}
?>