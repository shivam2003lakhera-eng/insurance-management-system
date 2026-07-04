<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="../styles.css">
    <title>View Payments</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<span>💳 View Payments</span>


</div>
<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="add_payment.php" class="add-button">
+ Add Payment
</a>

</div>

    <h1>Payments List</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='deleted')
{

echo "<div class='success'>

Payment deleted successfully

</div>";

}

}

?>

   <div class="table-wrapper">

<table>
        <tr>
            <th>Payment ID</th>
            <th>Policy ID</th>
            <th>Payment Date</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Payment Method</th>
            <th>Actions</th>
        </tr>

        <?php
$sql = "SELECT * FROM payments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?>

<tr>

<td><?= $row['payment_id']; ?></td>

<td><?= $row['policy_id']; ?></td>

<td><?= $row['payment_date']; ?></td>

<td><?= $row['amount']; ?></td>

<td><?= $row['payment_status']; ?></td>

<td><?= $row['payment_method']; ?></td>

<td>

<a class="edit-btn"
href="edit_payments.php?id=<?= $row['payment_id']; ?>">

Edit

</a>

<a class="delete-btn"
onclick="return confirm('Delete this record?')"
href="delete_payments.php?id=<?= $row['payment_id']; ?>">

Delete

</a>

</td>

</tr>

<?php
}

} else {

echo "<tr>
<td colspan='7'>No payments found.</td>
</tr>";

}
?> </table>
</div>
  
</body>
</html>
