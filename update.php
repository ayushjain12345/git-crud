<?php include 'header.php'; 
include "conn.php";
include "session.php";


$id=$_GET['id'];
if(isset($_POST['submit']))
{
    
    $name=$_POST['name'];
   $address=$_POST['address'];
   $subject=$_POST['subject'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    //update query
    $sql="UPDATE `student` SET `name`='$name',`address`='$address',`subject`='$subject',`mobile`='$mobile',`password`='$password' WHERE id='$id'";

    $data=mysqli_query($conn,$sql);
    // print_r($sql);
    // die;

    //data check    
    if($data)
    {
        header("location:ajax1.php");
    }
    else {
        echo "unsuccessful";
    }   
}

$message="";
$id=$_GET['id'];
if(isset($_POST['submit']))
{  
  $name=$row['name'];
  $address=$row['address'];
  $subject=$row['subject'];
  $mobile=$row['mobile'];
  $password=$row['password'];
}
else{
  $name='';
  $address='';
  $subject='';
  $mobile='';
  $password='';
}


  $sql="SELECT * from student where id='$id'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
?>






<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="" method="post">
        
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo$row['name'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" value="<?php echo$row['address'];?>" />
        </div>
        <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" value="<?php echo$row['subject'];?>" >
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?php echo$row['mobile'];?>" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo$row['password'];?>" />
        </div>
    <input class="submit" type="submit" name="submit" value="Update"  />
    </form>
</div>
</div>
</body>
</html>
