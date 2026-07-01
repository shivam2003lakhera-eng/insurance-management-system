<?php

include '../db_config.php';

$id = $_GET['id'];

$sql = "DELETE FROM policies
        WHERE policy_id = $id";

if($conn->query($sql))
{

header(
"Location:view_policies.php?msg=deleted");

exit();

}

?>