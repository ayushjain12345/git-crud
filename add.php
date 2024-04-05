<?php include 'header.php' ;
include "conn.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $subject=$_POST['subject'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];


    $sql = "INSERT INTO `student` (`name`,`address`,`subject`,`mobile`,`password`) 
    values ('" . $name . "','" . $address . "','" .$subject. "','" . $mobile . "','".$password."')";

    // INSERT INTO `student` (`id`, `name`, `address`, `subject`, `mobile`, `password`) VALUES (NULL, 'awefsd', 'dfsfdsdsffds', 'sdfdsfds', '234565432', 'wqefds');
  
    // $sql = "INSERT INTO `student` (`name`, `address`, `subject`, `mobile`, `password`) VALUES ( '$name', '$address', '$subject', '$mobile', '$password')";
//   if($conn->query($sql)=== TRUE) {

//      echo "data inserted " ;
//   } else {
//     echo " data not inserted";
//   }

    $data = mysqli_query($conn, $sql);
    if ($data) {
        // echo '<pre>';
        // print_r($data);
        // die;
        header("location:login.php") ;
    } else {
        echo "data doesn't added";
    }
}


// $name = $address = $subject = $mobile = $password = "";


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     $name = test_input($_POST['name']);
//     $address = test_input($_POST['address']);
//     $subject = test_input($_POST['subject']);
//     $mobile = test_input($_POST['mobile']);
//     $password = test_input($_POST['password']);


// }


// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }



?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" />
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="mobile" />
        </div>
        <div class='form-group'>
            <label>Password</label>
            <input type="password" name="password"> 
        </div>
        <input class="submit" type="submit" name="submit" value="submit"  />
    </form>
</div>
</div>
</body>
</html>
