<?php
include 'connect.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีการส่งคำขอแบบ GET เพื่อแสดงข้อมูลสำหรับแก้ไข
if (isset($_GET['courseid'])) {
    $courseid = $_GET['courseid'];

    // ดึงข้อมูลจากฐานข้อมูล
    $stmt = $con->prepare("SELECT * FROM course WHERE courseid = ?");
    $stmt->bind_param("s", $courseid);
    $stmt->execute();
    $result = $stmt->get_result();

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
    } else {
        echo "<script>alert('ไม่พบข้อมูลที่ต้องการแก้ไข'); window.location.href = 'display.php';</script>";
        exit;
    }
    $stmt->close();
}

// ตรวจสอบว่ามีการส่งคำขอแบบ POST เพื่อบันทึกการแก้ไข
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];
    $theory = $_POST['theory'];
    $practice = $_POST['practice'];
    $credit = $_POST['credit'];

    // อัปเดตข้อมูลในฐานข้อมูล
    $stmt = $con->prepare("UPDATE course SET coursename = ?, theory = ?, practice = ?, credit = ? WHERE courseid = ?");
    $stmt->bind_param("siiis", $coursename, $theory, $practice, $credit, $courseid);

    if ($stmt->execute()) {
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ!'); window.location.href = 'display.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลรายวิชา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">แก้ไขข้อมูลรายวิชา</h1>

    <form method="POST" action="">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="courseid" class="form-label">รหัสวิชา</label>
                <input type="text" class="form-control" id="courseid" name="courseid" value="<?php echo $course['courseid']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="coursename" class="form-label">ชื่อวิชา</label>
                <input type="text" class="form-control" id="coursename" name="coursename" value="<?php echo $course['coursename']; ?>" required>
            </div>
            <div class="col-md-1">
                <label for="theory" class="form-label">ท.</label>
                <input type="number" class="form-control" id="theory" name="theory" value="<?php echo $course['theory']; ?>" min="0" required>
            </div>
            <div class="col-md-1">
                <label for="practice" class="form-label">ป.</label>
                <input type="number" class="form-control" id="practice" name="practice" value="<?php echo $course['practice']; ?>" min="0" required>
            </div>
            <div class="col-md-1">
                <label for="credit" class="form-label">ช.</label>
                <input type="number" class="form-control" id="credit" name="credit" value="<?php echo $course['credit']; ?>" min="0" required>
            </div>
        </div>
        <div class="text-end mt-4">
            <button type="submit" name="update" class="btn btn-success btn-sm" title="บันทึกการแก้ไข">
                <i class="bi bi-check2"></i> บันทึกการแก้ไข
            </button>
            <a href="display.php" class="btn btn-secondary btn-sm" title="ยกเลิก">
                <i class="bi bi-arrow-return-right"></i> ยกเลิก
            </a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
