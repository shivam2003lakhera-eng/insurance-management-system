<?php

include '../db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM claims
        WHERE claim_id = $id";

if($conn->query($sql))
{

header(
"Location:view_claims.php?msg=deleted");

exit();

}

?>