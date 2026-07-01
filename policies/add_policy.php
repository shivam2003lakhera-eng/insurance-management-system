<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>Add Policy</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_policies.php">📄 View Policies</a>

>

<span>➕ Add Policies</span>


</div>

<div class="form-container">

<div class="action-bar">

<a href="../index.php"
class="back-button">

Dashboard

</a>

<a href="view_policies.php"
class="add-button">

View Policies

</a>

</div>

<h1>Add New Policy</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='added')
{

echo "<div class='success'>

Policy added successfully

</div>";

}

}

?>

    <form method="POST">
        <label>Client ID:</label>
        <input type="text" name="client_id" required><br>
        <label>Policy Type:</label>
        <input type="text" name="policy_type" required><br>
        <label>Start Date:</label>
        <input type="date" name="start_date" required><br>
        <label>End Date:</label>
        <input type="date" name="end_date" required><br>
        <label>Premium:</label>
        <input type="number" step="0.01" name="premium" required><br>
        <button class="add-button" name="submit">
Add Policy
</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $client_id = $_POST['client_id'];
        $policy_type = $_POST['policy_type'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $premium = $_POST['premium'];

        $sql = "INSERT INTO policies (client_id, policy_type, start_date, end_date, premium) 
                VALUES ('$client_id', '$policy_type', '$start_date', '$end_date', $premium)";

        if ($conn->query($sql) === TRUE) {

header("Location: add_policy.php?id=$policy_id&msg=added");

exit();

}

else {

echo "Error: " . $conn->error;

}
}
?>

</div>
</body>
</html>
