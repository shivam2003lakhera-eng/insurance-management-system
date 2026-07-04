<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../styles.css">


    <title>View Clients</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<span>👤 View Clients</span>

</div>

<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="add_client.php" class="add-button">
+ Add Client
</a>

</div>

    <h1>Clients List</h1>
<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='deleted')
{

echo "<div class='success'>

Client deleted successfully

</div>";

}

}

?>
<div class="table-wrapper">

<table>        <tr>
            <th>Client ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Join Date</th>
            <th>Address</th>
            <th>City</th>
            <th>Nominee</th>
            <th>Nominee Relation</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
?>

<tr>

<td><?= $row['client_id']; ?></td>

<td><?= $row['name']; ?></td>

<td><?= $row['email']; ?></td>

<td><?= $row['phone']; ?></td>

<td><?= $row['dob']; ?></td>

<td><?= $row['join_date']; ?></td>

<td><?= $row['address']; ?></td>

<td><?= $row['city']; ?></td>

<td><?= $row['nominee']; ?></td>

<td><?= $row['nominee_relation']; ?></td>

<td>

<a class="edit-btn"
href="edit_client.php?id=<?= $row['client_id']; ?>">Edit </a>

<a class="delete-btn"

onclick="return confirm('Delete this record?')"

href="delete_client.php?id=<?= $row['client_id']; ?>">

Delete

</a>

</td>

</tr>

<?php
}     
             }else {
           echo "<tr>
            <td colspan='11' class='no-data'>
                No clients found
            </td>
          </tr>";
}
        ?>
    </table>
</div>
</body>
</html>
