<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>

    <?php 
          $conn = mysqli_connect("localhost","root","","crud4") or die("Connection Failed");

          $sql = "SELECT * from student ";
// JOIN studentclass WHERE student.class = studentclass.id";
          $result =  mysqli_query($conn,$sql) or die("Query unsuccessful.");

          if(mysqli_num_rows($result) > 0 )  {

          
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Mobile</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php 
              $counter = 1;              
             while($row = mysqli_fetch_assoc($result))  {
            ?> 
            <tr>
                <td><?php echo $counter++ ;?></td> 
                <!-- <td><?php #echo $row['id'];?></td> -->
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['subject'];?></td>
                <td><?php echo $row['mobile'];?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']?>"> Delete </a>
                </td>
            </tr>
        
            
            <?php 
                } 

              ?>
            
        </tbody>
    </table>

    <?php } else {
                echo "<h2>No record found </h2>";
            } 
             mysqli_close($conn);
    
    ?>
</div>
</div>
</body>
</html>
