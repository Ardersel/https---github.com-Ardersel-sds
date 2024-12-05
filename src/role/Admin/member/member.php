<div id="content">
<?php
// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// กำหนดค่าเริ่มต้นสำหรับการค้นหา
$searchTerm = '';
$roleFilter = 'all';

if (isset($_POST['search'])) {
    $searchTerm = htmlspecialchars($_POST['search_term']); // ป้องกัน XSS
}

if (isset($_POST['role'])) {
    $roleFilter = $_POST['role'];
}

// สร้างคำสั่ง SQL
$sql = "SELECT * FROM users WHERE (username LIKE ? OR fullname LIKE ? OR email LIKE ?)";
if ($roleFilter !== 'all') {
    $sql .= " AND role = ?";
}

// เตรียมคำสั่ง SQL
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

// Bind Parameters
$searchTermWildcard = "%" . $searchTerm . "%";
if ($roleFilter !== 'all') {
    $stmt->bind_param("ssss", $searchTermWildcard, $searchTermWildcard, $searchTermWildcard, $roleFilter);
} else {
    $stmt->bind_param("sss", $searchTermWildcard, $searchTermWildcard, $searchTermWildcard);
}

// Execute และรับผลลัพธ์
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-5">
  <h1 class="mb-4 text-center">จัดการผู้ใช้งาน</h1>

  <!-- ฟอร์มค้นหาข้อมูล -->
  <form class="mb-4" method="POST" action="">
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="search_term" placeholder="ค้นหาชื่อผู้ใช้งาน, อีเมล หรือบทบาท"
        value="<?php echo htmlspecialchars($searchTerm); ?>">
      <button class="btn btn-primary" type="submit" name="search">ค้นหา</button>
    </div>
    <!-- ตัวเลือกบทบาท -->
    <div class="mb-3">
      <label for="role" class="form-label">เลือกบทบาท:</label>
      <select class="form-select" name="role" id="role">
        <option value="all" <?= $roleFilter == 'all' ? 'selected' : '' ?>>ทั้งหมด</option>
        <option value="admin" <?= $roleFilter == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="user" <?= $roleFilter == 'user' ? 'selected' : '' ?>>User</option>
      </select>
      <button class="btn btn-info mt-2" type="submit">แสดงผล</button>
    </div>
  </form>

  <!-- ปุ่มเพิ่มสมาชิก -->
  <a href="?page=add_member" class="btn btn-success mb-3">เพิ่มสมาชิกใหม่</a>

  <!-- แสดงตารางข้อมูลผู้ใช้ -->
  <table class="table table-bordered table-striped">
    <thead class="thead-dark text-center">
      <tr>
        <th>รหัสผู้ใช้งาน</th>
        <th>ชื่อผู้ใช้งาน</th>
        <th>อีเมล</th>
        <th>บทบาท</th>
        <th colspan="2">จัดการข้อมูลผู้ใช้งาน</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . (isset($row['user_id']) ? htmlspecialchars($row['user_id']) : 'ไม่มีข้อมูล') . "</td>";
            echo "<td>" . (isset($row['username']) ? htmlspecialchars($row['username']) : 'ไม่มีข้อมูล') . "</td>";
            echo "<td>" . (isset($row['email']) ? htmlspecialchars($row['email']) : 'ไม่มีข้อมูล') . "</td>";
            echo "<td>" . (isset($row['role']) ? htmlspecialchars($row['role']) : 'ไม่มีข้อมูล') . "</td>";
            echo "<td class='text-center'><a href='?page=edit_member&id=" . (isset($row['user_id']) ? $row['user_id'] : '') . "' class='btn btn-warning'>แก้ไข</a></td>";
            echo "<td class='text-center'><a href='?page=delete_member&id=" . (isset($row['user_id']) ? $row['user_id'] : '') . "' class='btn btn-danger' onclick='return confirm(\"คุณแน่ใจว่าต้องการลบสมาชิกนี้?\");'>ลบ</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูลผู้ใช้</td></tr>";
    }
    
      ?>
    </tbody>
  </table>
</div>
</div>