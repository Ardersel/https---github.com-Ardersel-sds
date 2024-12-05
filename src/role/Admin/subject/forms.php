<?php
include 'connect.php'; // เชื่อมต่อฐานข้อมูล

include "src/HeaderFooter/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // นับจำนวนฟอร์มทั้งหมด
    $totalForms = count($_POST['courseid']);

    for ($i = 0; $i < $totalForms; $i++) {
        // รับข้อมูลจากแต่ละฟอร์ม
        $courseid = $_POST['courseid'][$i];
        $coursename = $_POST['coursename'][$i];
        $theory = $_POST['theory'][$i];
        $practice = $_POST['practice'][$i];
        $credit = $_POST['credit'][$i];

        // ตรวจสอบว่า courseid และ coursename ไม่ว่าง
        if (!empty($courseid) && !empty($coursename)) {
            $stmt = $con->prepare("INSERT INTO course (courseid, coursename, theory, practice, credit) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiii", $courseid, $coursename, $theory, $practice, $credit);

            if (!$stmt->execute()) {
                echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มรหัสวิชา $courseid: " . $con->error . "');</script>";
            }
            $stmt->close();
        }
    }

    echo "<script>alert('เพิ่มข้อมูลสำเร็จ!'); window.location.href = 'display.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการรายวิชา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">จัดการรายวิชา</h1>

    <div class="card">
        <div class="card-header bg-primary text-white">เพิ่มรายวิชา</div>
        <div class="card-body">
            <form method="POST" action="">
                <!-- ฟอร์มชุดที่ 1 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label for="courseid1" class="form-label">รหัสวิชา</label>
                        <input type="text" class="form-control" id="courseid1" name="courseid[]" >
                    </div>
                    <div class="col-md-6">
                        <label for="coursename1" class="form-label">ชื่อวิชา</label>
                        <input type="text" class="form-control" id="coursename1" name="coursename[]" >
                    </div>
                    <div class="col-md-1">
                        <label for="theory1" class="form-label">ท.</label>
                        <input type="number" class="form-control" id="theory1" name="theory[]" min="0" >
                    </div>
                    <div class="col-md-1">
                        <label for="practice1" class="form-label">ป.</label>
                        <input type="number" class="form-control" id="practice1" name="practice[]" min="0" >
                    </div>
                    <div class="col-md-1">
                        <label for="credit1" class="form-label">ช.</label>
                        <input type="number" class="form-control" id="credit1" name="credit[]" min="0" >
                    </div>
                </div>

                <!-- ฟอร์มชุดที่ 2 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label for="courseid2" class="form-label">รหัสวิชา</label>
                        <input type="text" class="form-control" id="courseid2" name="courseid[]">
                    </div>
                    <div class="col-md-6">
                        <label for="coursename2" class="form-label">ชื่อวิชา</label>
                        <input type="text" class="form-control" id="coursename2" name="coursename[]">
                    </div>
                    <div class="col-md-1">
                        <label for="theory2" class="form-label">ท.</label>
                        <input type="number" class="form-control" id="theory2" name="theory[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="practice2" class="form-label">ป.</label>
                        <input type="number" class="form-control" id="practice2" name="practice[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="credit2" class="form-label">ช.</label>
                        <input type="number" class="form-control" id="credit2" name="credit[]" min="0">
                    </div>
                </div>

                <!-- ฟอร์มชุดที่ 3 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label for="courseid3" class="form-label">รหัสวิชา</label>
                        <input type="text" class="form-control" id="courseid3" name="courseid[]">
                    </div>
                    <div class="col-md-6">
                        <label for="coursename3" class="form-label">ชื่อวิชา</label>
                        <input type="text" class="form-control" id="coursename3" name="coursename[]">
                    </div>
                    <div class="col-md-1">
                        <label for="theory3" class="form-label">ท.</label>
                        <input type="number" class="form-control" id="theory3" name="theory[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="practice3" class="form-label">ป.</label>
                        <input type="number" class="form-control" id="practice3" name="practice[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="credit3" class="form-label">ช.</label>
                        <input type="number" class="form-control" id="credit3" name="credit[]" min="0">
                    </div>
                </div>

                <!-- ฟอร์มชุดที่ 4 -->
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label for="courseid4" class="form-label">รหัสวิชา</label>
                        <input type="text" class="form-control" id="courseid4" name="courseid[]">
                    </div>
                    <div class="col-md-6">
                        <label for="coursename4" class="form-label">ชื่อวิชา</label>
                        <input type="text" class="form-control" id="coursename4" name="coursename[]">
                    </div>
                    <div class="col-md-1">
                        <label for="theory4" class="form-label">ท.</label>
                        <input type="number" class="form-control" id="theory4" name="theory[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="practice4" class="form-label">ป.</label>
                        <input type="number" class="form-control" id="practice4" name="practice[]" min="0">
                    </div>
                    <div class="col-md-1">
                        <label for="credit4" class="form-label">ช.</label>
                        <input type="number" class="form-control" id="credit4" name="credit[]" min="0">
                    </div>
                </div>

                <div class="text-end">
                <button type="submit" class="btn btn-success btn-sm" title="เพิ่มรายวิชา">
                <i class="bi bi-check2"></i> เพิ่มรายวิชา
    </button>
                    <a href="display.php" class="btn btn-secondary btn-sm" title="ยกเลิก">
        <i class="bi bi-arrow-return-right"></i> ยกเลิก
    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
