<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>View Claims</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<span>📋 View Claims</span>

</div>

<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="add_claim.php" class="add-button">
+ Add Claim
</a>

</div>

    <h1>Claims List</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='deleted')
{

echo "<div class='success'>

Claim deleted successfully

</div>";

}

}

?>

    <table border="1">
        <tr>
            <th>Claim ID</th>
            <th>Policy ID</th>
            <th>Claim Date</th>
            <th>Claim Amount</th>
            <th>Claim Status</th>
            <th>Actions</th>
        </tr>

        <?php
$sql = "SELECT * FROM claims";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?>

<tr>

<td><?= $row['claim_id']; ?></td>

<td><?= $row['policy_id']; ?></td>

<td><?= $row['claim_date']; ?></td>

<td><?= $row['claim_amount']; ?></td>

<td><?= $row['claim_status']; ?></td>

<td>

<a class="edit-btn"
href="edit_claims.php?id=<?= $row['claim_id']; ?>">

Edit

</a>

<a class="delete-btn"
onclick="return confirm('Delete this record?')"
href="delete_claims.php?id=<?= $row['claim_id']; ?>">

Delete

</a>

</td>

</tr>

<?php
}

} else {

echo "<tr>
<td colspan='7'>No claim found.</td>
</tr>";

}
?>
    </table>
</body>
</html>
