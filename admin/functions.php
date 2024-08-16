<?php 
include('../include/db.php');
if(isset($_POST['id']) && isset($_POST['status']) && isset($_POST['type']) && $_POST['type'] == "approve price") {
    $id = intval($_POST['id']); // Get the ID and convert it to an integer
    $status = intval($_POST['status']); // Get the status and convert it to an integer
  
    // Prepare an SQL statement to update the status
    $sql = "UPDATE 005_fuelprices_prices SET status = ? WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL query
        $stmt->bind_param("ii", $status, $id);
  
        // Execute the statement
        if ($stmt->execute()) {
            echo "Approved successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
  
        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}