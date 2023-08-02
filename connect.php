<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiveform3";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn){
    //echo "Connection Successfully";
}
else{
    echo "Connection Unsuccessfull" . mysqli_connect_error();
}
?>