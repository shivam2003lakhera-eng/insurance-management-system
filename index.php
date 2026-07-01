<?php include 'header.php';

include 'db_config.php';

$c1=mysqli_query($conn,
"SELECT COUNT(*) total
FROM clients");

$clients=mysqli_fetch_assoc($c1)['total'];

$c2=mysqli_query($conn,
"SELECT COUNT(*) total
FROM policies");

$policies=mysqli_fetch_assoc($c2)['total'];

$c3=mysqli_query($conn,
"SELECT COUNT(*) total
FROM claims");

$claims=mysqli_fetch_assoc($c3)['total'];

$c4=mysqli_query($conn,
"SELECT COUNT(*) total
FROM payments");

$payments=mysqli_fetch_assoc($c4)['total']; ?>

<section class="welcome">

<h2>Dashboard</h2>

<p>

<h3>Manage Clients, Policies, Claims and Payments.</h3>

</p>

</section>

<div class="dashboard">

<div class="card">

<h3>👤 Clients</h3>

<p><h4>Manage Clients</h4></p>

<a href="clients/view_clients.php">

Open

</a>

<p><h4>
<?php echo $clients; ?>
 Records </h4></p>

</div>

<div class="card">

<h3>📄 Policies</h3>

<p><h4>Manage Policies</h4></p>

<a href="policies/view_policies.php">

Open

</a>

<p><h4>
<?php echo $policies; ?>
 Records </h4></p>

</div>

<div class="card">

<h3>📋 Claims</h3>


<p><h4>Claim Management</h4></p>

<a href="claims/view_claims.php">

Open

</a>


<p><h4>
<?php echo $claims; ?>
 Records </h4></p>

</div>

<div class="card">

<h3>💳 Payments</h3>

<p><h4>Track Payments</h4></p>

<a href="payments/view_payments.php">

Open

</a>


<p><h4>
<?php echo $payments; ?>
 Records </h4></p>

</div>

</div>

<?php include 'footer.php'; ?>