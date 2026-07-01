<?php include '../db_config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $client_id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE client_id = $client_id";
    $result = $conn->query($sql);
    $client = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $join_date = $_POST['join_date'];
    $nominee = $_POST['nominee'];
    $nominee_relation = $_POST['nominee_relation'];
    $city = $_POST['city'];

    $sql = "UPDATE clients SET 
            name='$name', email='$email', phone='$phone', address='$address', 
            dob='$dob', join_date='$join_date', nominee='$nominee', 
            nominee_relation='$nominee_relation', city='$city' 
            WHERE client_id = $client_id";

    if ($conn->query($sql) === TRUE) {

header("Location: edit_client.php?id=$client_id&msg=updated");

exit();

}

else {

echo "Error: " . $conn->error;

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>Edit Client</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_clients.php">👤 View Clients</a>

>

<span>Edit Client</span>


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

    <h1>Edit Client</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='updated')
{

echo "<div class='success'>

Client updated successfully

</div>";

}

}

?>

    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $client['name']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $client['email']; ?>" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $client['phone']; ?>" required><br>
        <label>Address:</label>
        <textarea name="address"><?php echo $client['address']; ?></textarea><br>
        <label>DOB:</label>
        <input type="date" name="dob" value="<?php echo $client['dob']; ?>" required><br>
        <label>Join Date:</label>
        <input type="date" name="join_date" value="<?php echo $client['join_date']; ?>" required><br>
        <label>Nominee:</label>
        <input type="text" name="nominee" value="<?php echo $client['nominee']; ?>"><br>
        <label>Nominee Relation:</label>
        <input type="text" name="nominee_relation" value="<?php echo $client['nominee_relation']; ?>"><br>
        <label>City:</label>
        <input type="text" name="city" value="<?php echo $client['city']; ?>"><br>
        <button class="update-btn" name="update">
Update Client
</button>
    </form>

</div>
</body>
</html>
