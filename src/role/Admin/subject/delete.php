<?php
include 'connect.php';


// ตรวจสอบว่ามีการส่ง courseid มาหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['courseid'])) {
    $courseid = $_GET['courseid'];

    // ลบข้อมูลจากฐานข้อมูล
    $stmt = $con->prepare("DELETE FROM course WHERE courseid = ?");
    $stmt->bind_param("s", $courseid);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: display.php"); // เปลี่ยนเส้นทางกลับไปที่ display.php
        exit;
    } else {
        $error = $con->error;
        $stmt->close();
        echo "<script>
                alert('เกิดข้อผิดพลาดในการลบข้อมูล: $error');
                window.location.href='display.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ไม่พบข้อมูลที่ต้องการลบ');
            window.location.href='display.php';
          </script>";
}
?>
