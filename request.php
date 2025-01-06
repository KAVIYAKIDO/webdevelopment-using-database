<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>document</title>
  <link rel="stylesheet" href="request.css">
</head>
<body>
<?php 
include 'connection.php';

session_start(); 
echo $_SESSION["userid"];

echo $sql="select name, unit ,division from login where username='".$_SESSION['userid']."'";
$result=mysqli_query(mysql:$conn,query:$sql);
$row=mysqli_fetch_assoc(result:$result);

?>

<!-- Request Form -->
  <div id="requestForm" class="section">
    <h2>Request Form</h2>
    <form id="form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $row["name"];?>" required>

      <label for="unit">Unit:</label>
      <input type="text" id="unit" name="unit" value="<?php echo $row["unit"];?>" required>

      <label for="division">Division:</label>
      <input type="text" id="name"name="division" value="<?php echo $row["division"];?>"required>
        

      <label for="cartridge">Select Printer Cartridge:</label>
      <select id="cartridge" name="cartridge" required>
        <option value="hp_laserjet">HP LaserJet</option>
        <option value="epson_lq1150">Epson LQ1150</option>
        <option value="brother_tn3448">Brother TN-3448</option>
        <option value="hp_laserjet_1020">HP LaserJet 1020 Plus</option>
      </select>
      <label>Quantity:</label>
      <input type="number" id="quantity" name="quantity" value="1" min="1">

      <button type="button" onclick="submitRequest()">Submit</button>
    </form>
  </div>

  <!-- Approval Form -->
  <div id="approvalForm" class="section hidden">
    <h2>Approval Form</h2>
    <p id="approvalDetails"></p>
    <button onclick="approveRequest()">Approve</button>
    <button onclick="cancelRequest()">Cancel</button>
  </div>

  

  <script>
    // Global variable to store form data
    let requestData = {};

    // Function to handle form submission
    function submitRequest() {
      requestData.name = document.getElementById("name").value;
      requestData.unit = document.getElementById("unit").value;
      requestData.division = document.getElementById("division").value;
      requestData.cartridge = document.getElementById("cartridge").value;
      requestData.quantity = document.getElementById("quantity").value;

      if (!requestData.name || !requestData.unit) {
        alert("Please fill in all required fields.");
        return;
      }

      alert("Request submitted and Approval pending.");
      document.getElementById("requestForm").classList.add("hidden");
      document.getElementById("approvalForm").classList.remove("hidden");

      document.getElementById("approvalDetails").innerText = `
        Name: ${requestData.name}, Unit: ${requestData.unit}, Division: ${requestData.division}, 
        Cartridge: ${requestData.cartridge}, Quantity: ${requestData.quantity}
      `;
    }

    // Function to handle approval
    function approveRequest() {
      alert("Approval successful.");
      document.getElementById("approvalForm").classList.add("hidden");
      document.getElementById("stockMaster").classList.remove("hidden");
    }

    // Function to handle cancellation
    function cancelRequest() {
      alert("Approval cancelled.");
      document.getElementById("approvalForm").classList.add("hidden");
      document.getElementById("requestForm").classList.remove("hidden");
    }
  </script>
</body>
</html>
<?php

echo"REQUEST FORM";

IF(isset($_POST['name'])){
    echo $name=$_POST['name'];
    echo $unit=$_POST['unit'];
    echo $division=$_POST['division'];
    echo $selectPrintercartridge=$_POST['Printer Cartridge'];
    echo $quantity =$_POST['quantity'];
}
?>