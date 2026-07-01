<?php

include '../db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM payments
        WHERE payment_id = $id";

if($conn->query($sql))
{

header(
"Location:view_payments.php?msg=deleted");

exit();

}

?>