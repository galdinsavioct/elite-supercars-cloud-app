<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

$message = "";

if(isset($_POST['add_car'])){

    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../uploads/".$image);

    $insert = mysqli_query($conn, "INSERT INTO cars(car_name, model, price, image, description)
    VALUES('$car_name', '$model', '$price', '$image', '$description')");

    if($insert){
        $message = "Car Added Successfully!";
    }else{
        $message = "Failed to Add Car!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Car - Elite Supercars</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header class="topbar">
    <div class="brand">
        <div class="car-line">⌁</div>
        <h2>ELITE SUPERCARS ADMIN</h2>
    </div>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_cars.php">Manage Cars</a>
        <a href="bookings.php">Bookings</a>
        <a href="../logout.php" class="login-btn">Logout</a>
    </nav>
</header>

<div class="form-container">

    <h2>Add Supercar</h2>

    <p class="message"><?php echo $message; ?></p>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" name="car_name" placeholder="Car Name" required>
        </div>

        <div class="form-group">
            <input type="text" name="model" placeholder="Model" required>
        </div>

        <div class="form-group">
            <input type="text" name="price" placeholder="Price" required>
        </div>

        <div class="form-group">
            <input type="file" name="image" required>
        </div>

        <div class="form-group">
            <textarea name="description" placeholder="Car Description" required></textarea>
        </div>

        <button type="submit" name="add_car" class="form-btn">Add Car</button>

    </form>

</div>

</body>
</html>