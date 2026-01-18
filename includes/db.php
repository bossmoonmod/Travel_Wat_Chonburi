<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chonburi_temples";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Fallback: If DB connection fails, we might want to suppress error slightly or handle gracefully
    // But for dev environment, let's show it.
    die("Connection failed: " . $conn->connect_error);
}

// Function to get temples (Switcher between DB and JSON purely for transition safety, 
// but here we aim to use DB primarily once connected)
// Function to get temples with optional search and pagination
function getTemples($conn, $search = '', $limit = 0, $offset = 0) {
    $sql = "SELECT * FROM temples";
    
    // Search condition
    $where = "";
    if (!empty($search)) {
        $search = $conn->real_escape_string($search);
        $where = " WHERE name LIKE '%$search%' OR address LIKE '%$search%'";
        $sql .= $where;
    }
    
    // Pagination
    if ($limit > 0) {
        $sql .= " LIMIT $limit OFFSET $offset";
    }
    
    $result = $conn->query($sql);

    $temples = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $temples[] = $row;
        }
    }
    return $temples;
}

// Function to count total temples for pagination
function getTemplesCount($conn, $search = '') {
    $sql = "SELECT COUNT(*) as total FROM temples";
    
    if (!empty($search)) {
        $search = $conn->real_escape_string($search);
        $sql .= " WHERE name LIKE '%$search%' OR address LIKE '%$search%'";
    }
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}
?>
