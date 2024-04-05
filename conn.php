<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud4";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    echo "";
    echo "<br>";
}else{
    echo "not connected";

}   



?>