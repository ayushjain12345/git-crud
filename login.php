<?php 
include "session.php" ;
session_start();
if(isset($_SESSION['name']))
{
  header("location:welcome.php");
  exit();
}


if(isset($_POST['submit'])){
    if(!empty($_POST['name'])  && !empty($_POST['password'])  ) 
     {
       
        $conn=mysqli_connect("localhost","root","","crud4") or die(mysqli_error($conn));

        $username=$_POST['name'];
        $password=$_POST['password'];
        
        $qry="SELECT * FROM student WHERE name='".$username."' and password='".$password."'";
        $result=mysqli_query($conn,$qry);
        $numrows=mysqli_num_rows($result);


        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $user=$row['name'];
                $dbpassword=$row['password'];
              
            }
        
    
        
        
            if ($username==$user && $password==$dbpassword) {
                session_start();
                 $_SESSION['name'] = $user;
                 header("Location:welcome.php");
                 exit();
             }  
             else
             {
             echo "Invalid password";
             }
            } else
            {
            echo "Required";
            }
            
        }else {
        echo "Required fields are empty";
    }
        
       
        
        }
        
    










?>


<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous"referrerpolicy="no-referrer" />
    <style type="text/css">
      body{
           background-image: url('IMAGE/Bulding (2).jpg');
           background-size: 100%;
        }
      form{ 
         opacity: 1;
      }
      p{
        color:black;
        font-size:22px;
      }
    </style>
</head>
<body>
  <div class="containe p-3">
<div class="text-center mb-4">
</div>
<div class="container d-flex justify-content-center">
  <form action="" method="POST"class="p-5 rounded shadow">
    <center><h1 style="color:current;padding: 30px;border: 1px solid primary;border-radius: 30px;">LOGIN FORM</h1></center><br>
   <div class="col-sm-12">
                     <div class="col-sm-12">
                     <i class="fa-solid fa-user"style="font-size: 20px;color: black;"></i>
                     <label class="form-label"><b><i style="color:black;">Username</i></b></label><br>
                     <input type="text" class="form-control"name="name"placeholder="enter username"style="border: 1px solid white;border-radius: 15px;"id="validationDefault01">
  </div><br>
   <div class="col-sm-12">
                     <i class="fa-sharp fa-solid fa-lock"style="font-size: 20px;color: black;"></i>
                     <label class="form-label"><b><i style="color:black;">password</i></b></label>
                     <input type="password" class="form-control"name="password"placeholder="enter password"style="border: 1px solid white;border-radius: 15px;">
  </div><br>
  <div class="col-sm-12">
                     <button type="submit"class="btn btn-info"name="submit"style="border: 1px solid success;border-radius: 10px;">Login</button>
                     
  </div>
</div>
</div>
</form>
</body>
</html>  