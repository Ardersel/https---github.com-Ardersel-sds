<?php
// กำหนดค่าการเชื่อมต่อ
$host = "localhost"; // โฮสต์ของฐานข้อมูล (ส่วนใหญ่เป็น localhost)
$user = "root"; // ชื่อผู้ใช้งาน MySQL (ค่าเริ่มต้นคือ root)
$password = ""; // รหัสผ่านของ MySQL (ว่างเปล่าสำหรับค่าเริ่มต้น)
$database = "school_schedule"; // ชื่อฐานข้อมูลที่คุณต้องการเชื่อมต่อ

// สร้างการเชื่อมต่อ
$con = new mysqli($host, $user, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($con->connect_error) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $con->connect_error);
} else {
    // echo "การเชื่อมต่อฐานข้อมูลสำเร็จ!"; // ใช้ตรวจสอบเมื่อทดสอบ
}
?>
