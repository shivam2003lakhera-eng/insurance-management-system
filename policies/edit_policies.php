<?php include '../db_config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $policy_id = $_GET['id'];
    $sql = "SELECT * FROM policies WHERE policy_id = $policy_id";
    $result = $conn->query($sql);
    $policy = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $client_id = $_POST['client_id'];
    $policy_type = $_POST['policy_type'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $premium = $_POST['premium'];
    
    $sql = "UPDATE policies SET 
            client_id='$client_id', policy_type='$policy_type', start_date='$start_date', end_date='$end_date', premium='$premium'
                  WHERE policy_id = $policy_id";

    if ($conn->query($sql) === TRUE) {
       header("Location: edit_policies.php?id=$policy_id&msg=updated");
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

    <title>Edit Policies</title>
</head>
<body>

<div class="breadcrumb">
<a href="../index.php">Home</a>
>
<a href="view_policies.php">📄 View Policies</a>
>
<span>Edit Policy</span>
</div>

<div class="form-container">
<div class="action-bar">
<a href="../index.php" class="back-button">
Dashboard
</a>
<a href="view_policies.php" class="add-button">
View Policies
</a>
</div>

<h1>Edit Policy</h1>

<?php
if(isset($_GET['msg']))
{
if($_GET['msg']=='updated')
{
echo "<div class='success'>
Policy updated successfully
</div>";
}
}
?>

    <form method="POST">
        <label>Client ID:</label>
        <input type="number" name="client_id" value="<?php echo $policy['client_id']; ?>" required><br>
        <label>Policy Type:</label>
        <input type="text" name="policy_type" value="<?php echo $policy['policy_type']; ?>" required><br>
        <label>Start Date:</label>
        <input type="date" name="start_date" value="<?php echo $policy['start_date']; ?>" required><br>
        <label>End Date:</label>
        <input type="date" name="end_date" value="<?php echo $policy['end_date']; ?>" required><br>
        <label>Premium:</label>
        <input type="text" name="premium" value="<?php echo $policy['premium']; ?>" required><br>

       <button class="update-btn" name="update">
Update Policy
</button>
    </form>

</div>
</body>
</html>