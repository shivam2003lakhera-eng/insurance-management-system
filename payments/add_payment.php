<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Add Payment</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_payments.php">💳 View Payments</a>

>

<span>➕ Add Payments</span>


</div>

<div class="form-container">

<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="view_payments.php" class="add-button">
View Payments
</a>
</div>

    <h1>Add New Payment</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='added')
{

echo "<div class='success'>

Payment added successfully.

</div>";

}

}

?>


    <form method="POST">
        <label>Policy ID:</label>
        <input type="number" name="policy_id" required><br>
        <label>Payment Date:</label>
        <input type="date" name="payment_date" required><br>
        <label>Amount:</label>
        <input type="number" step="0.01" name="amount" required><br>
        <label>Payment Status:</label>
        <select name="payment_status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
        <select name="payment_method">
            <option value="Cash">Cash</option>
            <option value="UPI">UPI</option>
            <option value="Bank Transfer">Bank Transfer</option>
        </select><br>
      <button class="add-button" name="submit">
Add Payment
</button>

    <?php
    if (isset($_POST['submit'])) {
        $policy_id = $_POST['policy_id'];
        $payment_date = $_POST['payment_date'];
        $amount = $_POST['amount'];
        $payment_status = $_POST['payment_status'];
        $payment_method = $_POST['payment_method'];

        $sql = "INSERT INTO payments (policy_id, payment_date, amount, payment_status, payment_method) 
                VALUES ($policy_id, '$payment_date', $amount, '$payment_status','$payment_method')";

        if ($conn->query($sql) === TRUE) {

header("Location: add_payment.php?id=$payment_id&msg=added");

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
