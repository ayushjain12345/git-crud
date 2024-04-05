<?php
include "session.php";

if(isset($_POST['submit']))
{
  try{
  $name=$_POST['name'];
  $address=$_POST['address'];
  $subject=$_POST['subject'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
  $sql="INSERT INTO `student`(`id`, `name`, `address`, `subject`, `mobile`,`password`) VALUES ('Null','$name','$address','$subject','$mobile','$password')";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    header("Location:ajax1.php");
  }
  else
  {
    echo "not inserted";
  }
}catch(Exception $d) {
  $errors['form'] = "An error display after prossesig the form";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"type="text/css">
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>AJAX Datatable</title>
    <style> 
    </style>
</head>
<body>  
<div class="container">
 <div class="text-center mb-4">
 </div>
 <div class="container d-flex justify-content-center">
<form action="" method="post" class="p-5 rounded shadow ">
  <center><h1>AjaxData Add</ha></center>
    <div class="col-sm-12">
                      <div class="col-sm-12">
                      <label for="form-label"><b style="font-size: 19px;"><i style="color:white;"> Name</i></b></label>
                      <input type="text" class="form-control"name="name"placeholder="Enter Name"id="name">
                    </div>
    <br>
    <div class="col-sm-12">
                      <label class="form-label"><b style="font-size: 19px;"><i style="color:white;">Address</i></b></label>
                      <input type="text" class="form-control"name="address"placeholder="address">
  </div>
  <br>
    <div class="col-sm-12">
                      <label class="form-label"><b style="font-size: 19px;"><i style="color:white;">subject</i></b></label>
                      <input type="text"class="form-control"name="subject"placeholder="subject">
    </div><br>
    <div class="col-sm-12">
                      <label class="form-label"><b style="font-size: 19px;"><i style="color:white;">Contact No</i></b></label>
                      <input type="text"class="form-control"name="mobile"placeholder="contact Number">
    </div><br>
    <div class="col-sm-12">
                      <label class="form-label"><b style="font-size: 19px;"><i style="color:white;">Password</i></b></label>
                      <input type="password"class="form-control"name="password"placeholder="password">
    </div><br>
    <button type="submit"class="btn btn-success"name="submit"value="submit">Submit</button>
    <br>
</form>
</div>
</div><br>

    <center><h1>Ajax Demo Example</h1></center>
    <table class="display dataTable"id="empTable">
        <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Subject</th>
        <th>Contact no</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead> 
  <tr>
  <?php
  	include "conn.php";
  	$select="select * from student";
  	$data=mysqli_query($conn,$select);
  	while($row=mysqli_fetch_array($data))
  	{
  	?>
  	<tr> 
  		<td><?php echo $row['id'];?></td>
  		<td><?php echo $row["name"]; ?></td>
  		<td><?php echo $row["address"];?></td>
  		<td><?php echo $row["subject"];?></td>
  		<td><?php echo $row["mobile"];?></td>
          <td><?php echo $row["password"];?></td>
      <td><a href="update.php?id=<?php echo $row['id'];?>"class="btn btn-info">Update</a></td>
      <td><a href="ajax_delete.php?id=<?php echo $row['id'];?>"class="btn btn-danger"onclick="return checkdel()">Delete</a></td>
  	</tr>
  	<?php
  	}
  	?>
 </tr>
</table>
<!-- <script>
  function checkdel()
  {
    return confirm("are you sure you want to delete this recoreds");
  }
</script> -->
</div>
<script>
 $(document).ready(function(){
   $('#empTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'pageLength': 10,
        
        'ajax': {

        'url':'ajax1file.php'
                },
        'columns': [
        { data:  'id'},
        { data: 'name' },
        { data: 'address'},
        { data: 'subject'},
        { data: 'mobile'},
        { data: 'password'},
        { data: '<a href="ajax_update.php?id=<?php echo $row['id'];?>"class="btn btn-info">Update</a>'},
        { data: '<a href="ajax_delete.php?id=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a>'},
        ]
         });   

         });
         </script>
</body>
 </html> 