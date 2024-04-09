<?php 
include 'header.php';
include 'conn.php';

$errors = array(); // Initialize an empty array to store validation errors

if (isset($_POST['submit'])) {
    // Validate Name
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } else {
        $name = $_POST['name'];
    }

    // Validate Address
    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required';
    } else {
        $address = $_POST['address'];
    }

    // Validate Subject
    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Subject is required';
    } else {
        $subject = $_POST['subject'];
    }

    // Validate Mobile
    if (empty($_POST['mobile'])) {
        $errors['mobile'] = 'Mobile is required';
    } elseif (!preg_match('/^\d{10}$/', $_POST['mobile'])) {
        $errors['mobile'] = 'Invalid mobile number';
    } else {
        $mobile = $_POST['mobile'];
    }

    // Validate Password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } else {
        $password = $_POST['password'];
    }

    // Validate Confirm Password
    if (empty($_POST['confirm_password'])) {
        $errors['confirm_password'] = 'Confirm Password is required';
    } elseif ($_POST['confirm_password'] !== $_POST['password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    } else {
        $confirm_password = $_POST['confirm_password'];
    }

    // If there are no validation errors, proceed with inserting data
    if (empty($errors)) {
        $sql = "INSERT INTO `student` (`name`,`address`,`subject`,`mobile`,`password`) 
        VALUES ('$name', '$address', '$subject', '$mobile', '$password')";
        
        $data = mysqli_query($conn, $sql);
        if ($data) {
            header("location:login.php");
        } else {
            echo "Data couldn't be added to the database";
        }
    }
}

?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" />
            <?php if(isset($errors['name'])) { echo '<span class="error">'.$errors['name'].'</span>'; } ?>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" />
            <?php if(isset($errors['address'])) { echo '<span class="error">'.$errors['address'].'</span>'; } ?>
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject">
            <?php if(isset($errors['subject'])) { echo '<span class="error">'.$errors['subject'].'</span>'; } ?>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="mobile" />
            <?php if(isset($errors['mobile'])) { echo '<span class="error">'.$errors['mobile'].'</span>'; } ?>
        </div>
        <div class='form-group'>
            <label>Password</label>
            <input type="password" name="password"> 
            <?php if(isset($errors['password'])) { echo '<span class="error">'.$errors['password'].'</span>'; } ?>
        </div>
        <div class='form-group'>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password"> 
            <?php if(isset($errors['confirm_password'])) { echo '<span class="error">'.$errors['confirm_password'].'</span>'; } ?>
        </div>
        <input class="submit" type="submit" name="submit" value="Submit"  />
    </form>
</div>
</div>
</body>
</html>
