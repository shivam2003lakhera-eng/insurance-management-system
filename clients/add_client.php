<?php include '../db_config.php'; 
$message = "";  ?>

 <?php
    if (isset($_POST['submit']))
{

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$join_date = $_POST['join_date'];
$nominee = $_POST['nominee'];
$nominee_relation = $_POST['nominee_relation'];
$city = $_POST['city'];

$check = "SELECT client_id
          FROM clients
          WHERE email='$email'";

$result = $conn->query($check);

if($result->num_rows > 0)
{

$message = "<div class='error'>

Email already exists.

</div>";

}

else
{

$sql = "INSERT INTO clients
(name,email,phone,address,dob,
join_date,nominee,
nominee_relation,city)

VALUES

('$name','$email','$phone',
'$address','$dob',
'$join_date','$nominee',
'$nominee_relation','$city')";

if($conn->query($sql))
{

$message = "<div class='success'>

Client added successfully.

</div>";

}

}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../styles.css">


    <title>Add Client</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_clients.php">👤 View Clients</a>

>

<span>➕ Add Clients</span>


</div>

<div class="form-container">

<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="view_clients.php" class="add-button">
View Clients
</a>
</div>

    <h1>Add New Client</h1>


<?php echo $message; ?>

    <form action="add_client.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Phone:</label>
        <input type="text" name="phone" required>
        <br>
        <label>Address:</label>
        <textarea name="address"></textarea>
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="dob" required>
        <br>
        <label>Join Date:</label>
        <input type="date" name="join_date" required>
        <br>
        <label>Nominee:</label>
        <input type="text" name="nominee">
        <br>
        <label>Nominee Relation:</label>
        <input type="text" name="nominee_relation">
        <br>
        <label>City:</label>
        <input type="text" name="city">
        <br>
        <button class="add-button" name="submit">
Add Client
</button>


    </form>
</div>
</body>
</html>
