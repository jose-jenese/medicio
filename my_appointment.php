<?php 

session_start(); 

if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
    exit();
}
include("db_connect.php");
include("header_a.php");

$username = $_SESSION['Username'];
$sql = "SELECT * FROM appointments WHERE username = ? ORDER BY created_at DESC";
$statement = $conn->prepare($sql);
$statement->bind_param("s", $username);
$statement->execute();
$result = $statement->get_result();
?>

<div class="container mt-5">
  <?php echo "<h2 class='mb-4'>My Appointments ( ". $_SESSION['Username'] . " )</h2>"?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Department</th>
        <th>Doctor</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td><?= date("d F Y h:i A", strtotime($row['date'])) ?></td>
        <td><?= htmlspecialchars($row['department']) ?></td>
        <td><?= htmlspecialchars($row['doctor']) ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php 
$statement->close();
$conn->close();
include("footer.php"); 
?>