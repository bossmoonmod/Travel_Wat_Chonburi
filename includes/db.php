<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ตรวจสอบว่ารันบนเครื่องตัวเอง (Localhost) หรือบนโฮสต์จริง
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') {
    // การตั้งค่าสำหรับเครื่องตัวเอง (XAMPP)
    $servername = "localhost";
    $username = "root";       
    $password = "";           
    $dbname = "chonburi_temples";          
} else {
    $servername = "";
    $username = "";
    $password = "";      
    $dbname = "";  
}

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตั้งค่าภาษาไทย
$conn->set_charset("utf8");

// ==========================================
// ส่วนฟังก์ชั่นดึงข้อมูล (Functions)
// *ต้องนำกลับมาวางที่นี่เพราะไฟล์เดิมถูกทับ*
// ==========================================

function getTemples($conn, $search = '', $limit = 1000, $offset = 0) {
    $sql = "SELECT * FROM temples";
    
    // ถ้ามีการค้นหา
    if (!empty($search)) {
        $search = $conn->real_escape_string($search);
        $sql .= " WHERE name LIKE '%$search%' OR address LIKE '%$search%'";
    }
    
    // การแบ่งหน้า
    $sql .= " LIMIT $limit OFFSET $offset";
    
    $result = $conn->query($sql);
    
    $temples = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $temples[] = $row;
        }
    }
    return $temples;
}

function getTemplesCount($conn, $search = '') {
    $sql = "SELECT COUNT(*) as total FROM temples";
    
    if (!empty($search)) {
        $search = $conn->real_escape_string($search);
        $sql .= " WHERE name LIKE '%$search%' OR address LIKE '%$search%'";
    }
    
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    return 0;
}
?>
