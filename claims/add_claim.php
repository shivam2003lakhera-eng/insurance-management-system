<?php include '../db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="../styles.css">

    <title>Add Claim</title>
</head>
<body>

<div class="breadcrumb">

<a href="../index.php">Home</a>

>

<a href="view_claims.php">📋 View Claims</a>

>

<span>➕ Add Claims</span>


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

  <h1>Add New Claim</h1>

<?php

if(isset($_GET['msg']))
{

if($_GET['msg']=='added')
{

echo "<div class='success'>

Claim added successfully

</div>";

}

}

?>


    <form method="POST">
        <label>Policy ID:</label>
        <input type="number" name="policy_id" required><br>
        <label>Claim Date:</label>
        <input type="date" name="claim_date" required><br>
        <label>Claim Amount:</label>
        <input type="number" step="0.01" name="claim_amount" required><br>
        <label>Claim Status:</label>
        <select name="claim_status">
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        </select><br>
       <button class="add-button" name="submit">
Add Claim
</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $policy_id = $_POST['policy_id'];
        $claim_date = $_POST['claim_date'];
        $claim_amount = $_POST['claim_amount'];
        $claim_status = $_POST['claim_status'];

        $sql = "INSERT INTO claims (policy_id, claim_date, claim_amount, claim_status) 
                VALUES ($policy_id, '$claim_date', $claim_amount, '$claim_status')";

       if ($conn->query($sql) === TRUE) {

header("Location: add_claim.php?id=$claim_id&msg=added");

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
