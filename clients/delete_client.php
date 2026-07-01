<?php

include '../db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM clients
        WHERE client_id = $id";

if($conn->query($sql))
{

header(
"Location:view_clients.php?msg=deleted");

exit();

}

?>