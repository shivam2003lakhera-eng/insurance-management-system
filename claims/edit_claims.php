<?php include '../db_config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $claim_id = $_GET['id'];
    $sql = "SELECT * FROM claims WHERE claim_id = $claim_id";
    $result = $conn->query($sql);
    $claim = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $policy_id = $_POST['policy_id'];
    $claim_date = $_POST['claim_date'];
    $claim_amount = $_POST['claim_amount'];
    $claim_status = $_POST['claim_status'];
    
    $sql = "UPDATE claims SET 
            policy_id='$policy_id', claim_date='$claim_date', claim_amount='$claim_amount', claim_status='$claim_status' 
                  WHERE claim_id = $claim_id";

    if ($conn->query($sql) === TRUE) {

header("Location: edit_claims.php?id=$claim_id&msg=updated");

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

    <title>Edit Claims</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_claims.php">📋 View Claims</a>

>

<span>Edit Claim</span>


</div>

<div class="form-container">

<div class="action-bar">

<a href="../index.php" class="back-button">
Dashboard
</a>

<a href="view_claims.php" class="add-button">
View Claims
</a>

</div>

    <h1>Edit Claims</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='updated')
{

echo "<div class='success'>

Claim updated successfully

</div>";

}

}

?>

    <form method="POST">
        <label>Policy ID:</label>
        <input type="number" name="policy_id" value="<?php echo $claim['policy_id']; ?>" required><br>
        <label>claim Date:</label>
        <input type="date" name="claim_date" value="<?php echo $claim['claim_date']; ?>" required><br>
        <label>Claim Amount:</label>
        <input type="text" name="claim_amount" value="<?php echo $claim['claim_amount']; ?>" required><br>
        <label>Claim Status:</label>
        <select name="claim_status" value="<?php echo $claim['claim_status']; ?>" required>
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        </select><br>

        <button class="update-btn" name="update">
Update Claim
</button>
    </form>

</div>
</body>
</html>
