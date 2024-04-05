<?php include 'header.php'; 
          include 'conn.php';
   $id=$_GET['id'];
   $sql ="DELETE FROM student WHERE id=$id";
   $result=mysqli_query($conn,$sql);

   if($result){
      header("location:index.php");
}
    else {
        echo "failed";
    }

    
    ?>

    <h2>Delete Record</h2>
 
       
