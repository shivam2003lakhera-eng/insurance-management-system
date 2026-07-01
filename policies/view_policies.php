<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>View Policies</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<span>📄View Policies</span>


</div>
<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="add_policy.php" class="add-button">
+ Add Policy
</a>

</div>

    <h1>Policies List</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='deleted')
{

echo "<div class='success'>

Policies deleted successfully

</div>";

}

}

?>

    <table border="1">
        <tr>
            <th>Policy ID</th>
            <th>Client ID</th>
            <th>Policy Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Premium</th>
            <th>Actions</th>
        </tr>

        <?php
$sql = "SELECT * FROM policies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?>

<tr>

<td><?= $row['policy_id']; ?></td>

<td><?= $row['client_id']; ?></td>

<td><?= $row['policy_type']; ?></td>

<td><?= $row['start_date']; ?></td>

<td><?= $row['end_date']; ?></td>

<td><?= $row['premium']; ?></td>

<td>

<a class="edit-btn"
href="edit_policies.php?id=<?= $row['policy_id']; ?>">

Edit

</a>

<a class="delete-btn"
onclick="return confirm('Delete this record?')"
href="delete_policies.php?id=<?= $row['policy_id']; ?>">

Delete

</a>

</td>

</tr>

<?php
}

} else {

echo "<tr>
<td colspan='7'>No policy found.</td>
</tr>";

}
?>
    </table>
</body>
</html>
