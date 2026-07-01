<?php include '../db_config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];
    $sql = "SELECT * FROM payments WHERE payment_id = $payment_id";
    $result = $conn->query($sql);
    $payment = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $policy_id = $_POST['policy_id'];
    $payment_date = $_POST['payment_date'];
    $amount = $_POST['amount'];
    $payment_status = $_POST['payment_status'];
    $payment_method = $_POST['payment_method'];
    
    $sql = "UPDATE payments SET 
            policy_id='$policy_id', payment_date='$payment_date', amount='$amount', payment_status='$payment_status', payment_method='$payment_method'
                  WHERE payment_id = $payment_id";

    if ($conn->query($sql) === TRUE) {

header("Location: edit_payments.php?id=$payment_id&msg=updated");

exit();

}

else {

echo "Error: " . $conn->error;

}
}
?>
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>Edit Payments</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_payments.php">👤 View Payment</a>

>

<span>Edit Payment</span>


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

    <h1>Edit Payment</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='updated')
{

echo "<div class='success'>

Payments updated successfully

</div>";

}

}

?>
    <form method="POST">
        <label>Policy ID:</label>
        <input type="number" name="policy_id" value="<?php echo $payment['policy_id']; ?>" required><br>
        <label>Payment Date:</label>
        <input type="date" name="payment_date" value="<?php echo $payment['payment_date']; ?>" required><br>
        <label>Payment Amount:</label>
        <input type="text" name="amount" value="<?php echo $payment['amount']; ?>" required><br>
        <label>Payment Status:</label>
        <select name="payment_status" value="<?php echo $payment['payment_status']; ?>" required>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select><br>
        <label>Payment Method:</label>
        <select name="payment_method" value="<?php echo $payment['payment_method']; ?>" required>
            <option value="Cash">Cash</option>
            <option value="UPI">UPI</option>
            <option value="Bank Transfer">Bank Transfer</option>
        </select><br>


        <button class="update-btn" name="update">
Update Payment
</button>
    </form>

</div>
</body>
</html>