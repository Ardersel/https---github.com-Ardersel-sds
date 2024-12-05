<div id="content">
<?php
include 'connect.php'; // เชื่อมต่อฐานข้อมูล




$result = $con->query("SELECT * FROM course");
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<div class="container my-5">



<h2 class="text-center mb-5">จัดการรายวิชา</h2>
<a href="src/role/Admin/subject/forms.php" class="btn btn-primary btn-sm mb-3" title="เพิ่มรายวิชา">
        <i class="fa fa-plus-circle"></i> เพิ่มรายวิชา
    </a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-info ">
            <tr>
                <th width="130" class="text-center align-middle">รหัสวิชา</th>
                <th class="text-center align-middle">ชื่อวิชา</th>
                <th width="30" class="text-center align-middle">ท.</th>
                <th width="30" class="text-center align-middle">ป.</th>
                <th width="30" class="text-center align-middle">ช.</th>
                <th width="150" class="text-center align-middle">จัดการ</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td class="text-center align-middle"><?php echo $course['courseid']; ?></td>
                    <td class="text-start ps-4"><?php echo $course['coursename']; ?></td>
                    <td class="text-center align-middle"><?php echo $course['theory']; ?></td>
                    <td class="text-center align-middle"><?php echo $course['practice']; ?></td>
                    <td class="text-center align-middle"><?php echo $course['credit']; ?></td>
                    
                    <td class="text-center align-middle">
                    
    <!-- ปุ่มแก้ไข -->
    <a href="update.php?courseid=<?php echo $course['courseid']; ?>" class="btn btn-warning btn-sm" title="แก้ไข">
        <i class="fas fa-edit"></i> <!-- ไอคอนแก้ไข -->
    </a>

    <!-- ปุ่มลบ -->
    <a href="delete.php?courseid=<?php echo $course['courseid']; ?>" class="btn btn-danger btn-sm" title="ลบ"
       onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');">
        <i class="fas fa-trash"></i> <!-- ไอคอนลบ -->
    </a>
</td>




                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
</div>