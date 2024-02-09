<?php
include("connect.php");
?>

<?php
if(isset($_POST['searchdata'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM form WHERE emp_id = '$search' ";
    $data = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($data);    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Software Development</title>
</head>
<body>
    <div class="center">
        <form action="#" method="POST">
        <h1>Employee Entry Data Automation Software</h1>
        <div class="form">
            <input type="text" name="search" class="textfield" placeholder="Search ID" 
            value="<?php if(isset($_POST['searchdata'])){echo $result['emp_id'];} ?>">

            <input type="text" name="name" class="textfield" placeholder="Employee Name"
            value="<?php if(isset($_POST['searchdata'])){echo $result['emp_name'];} ?>">
            <select class="textfield" name="gender">
                <option value="Not Selected">Select Gender</option>
                <option value="Male"
                <?php
                if($result['emp_gender'] == 'Male'){
                    echo "Selected";
                }
                ?>
                >Male</option>
                <option value="Female"
                <?php
                if($result['emp_gender'] == 'Female'){
                    echo "Selected";
                }
                ?>
                >Female</option>
                <option value="Other"
                <?php
                if($result['emp_gender'] == 'Other'){
                    echo "Selected";
                }
                ?>
                >Other</option>
            </select>

            <input type="text" name="email" class="textfield" placeholder="Email address"
            value="<?php if(isset($_POST['searchdata'])){echo $result['emp_email'];} ?>">
            <select class="textfield" name="department">
                <option value="Not Selected">Select Department</option>
                <option value="IT"
                <?php
                if($result['emp_dept'] == 'IT'){
                    echo "Selected";
                }
                ?>
                >IT</option>
                <option value="Accounts"
                <?php
                if($result['emp_dept'] == 'Accounts'){
                    echo "Selected";
                }
                ?>
                >Accounts</option>
                <option value="Business Development"
                <?php
                if($result['emp_dept'] == 'Business Development'){
                    echo "Selected";
                }
                ?>
                >Business Development</option>
                <option value="Sales"
                <?php
                if($result['emp_dept'] == 'Sales'){
                    echo "Selected";
                }
                ?>
                >Sales</option>
                <option value="HR"
                <?php
                if($result['emp_dept'] == 'HR'){
                    echo "Selected";
                }
                ?>
                >HR</option>
                <option value="Marketing"
                <?php
                if($result['emp_dept'] == 'Marketing'){
                    echo "Selected";
                }
                ?>
                >Marketing</option>
                <option value="Teaching"
                <?php
                if($result['emp_dept'] == 'Teaching'){
                    echo "Selected";
                }
                ?>
                >Teaching</option>
            </select>        
            <textarea placeholder="Address" name="address"><?php if(isset($_POST['searchdata'])){echo $result['emp_address'];} ?>
        </textarea>
            <input type="submit" value="Submit" name="searchdata" class="btn" style="background-color: grey;">
            <input type="submit" value="Save" name="save" class="btn" style="background-color: green;">
            <input type="submit" value="Update" name="update" class="btn" style="background-color: orange;">
            <input type="submit" value="Delete" name="delete" class="btn" style="background-color: red;" onclick="return checkdelete()">
            <input type="reset" value="Clear" name="" class="btn" style="background-color: blue;">
        </div>
    </form>
</div>
</body>
</html>

<script>
    function checkdelete(){
        return confirm('Are you sure you want to delete this record?');
    }
</script>

<?php
if(isset($_POST['save'])){
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "INSERT INTO form (emp_name, emp_gender, emp_email, emp_dept, emp_address) VALUES ('$name','$gender','$email','$department','$address')";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "<script> alert('Data inserted') </script>";
    }
    else{
        echo "<script> alert('Data not inserted') </script>";
    }
}
?>

<?php
if(isset($_POST['delete'])){
    $id = $_POST['search'];
    //echo $id;

    $query = "DELETE FROM form where emp_id = '$id' ";
    $data = mysqli_query($conn, $query);

    if($data){
        echo "<script> alert('Record deleted') </script>";
    }
    else{
        echo "<script> alert('Failed to delete') </script>";
    }
}
?>

<?php
if(isset($_POST['update'])){
    $id         = $_POST['search'];
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "UPDATE form SET emp_name = '$name',emp_gender = '$gender',emp_email = '$email',emp_dept = '$department',emp_address = '$address' WHERE emp_id = '$id' ";

    $data = mysqli_query($conn, $query);

    if($data){
        echo "<script> alert('Record Updated') </script>";
    }
    else{
        echo "<script> alert('Failed to update') </script>";
    }
}
?>

