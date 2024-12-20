<nav class="navbar navbar-expand-lg" style="background-color: #800000">
  <div class="d-flex align-items-center">
    <!-- Toggle Sidebar Button -->
    <button id="toggleSidebar" class="toggle-btn me-2">
      <i class="bi bi-list"></i>
    </button>
    <!-- Logo -->
    <img src="src/logo/logo.png" alt="Logo" class="logo">
    <!-- <a href="https://sds.tkc.ac.th/" class="navbar-brand text-white  ms-3"> -->
    <a href="<?php BASE_URL ?>index.php?page=home" class="navbar-brand text-white  ms-3">
      <!-- System Name -->
      ระบบสนับสนุนการตัดสินใจในการจัดตารางเรียน
    </a>
  </div>

  <div id="user-section" class="d-flex align-items-center">
      <div class="dropdown">
        <a class="nav-link dropdown-toggle border border-white rounded px-3 py-2 text-white" href="#" id="userDropdown"
          role="button" data-bs-toggle="dropdown" aria-expanded="false">admin
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin" class="dropdown-item">แผงควบคุม</a></li>
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin-member" class="dropdown-item">จัดการผู้ใช้งาน</a></li>
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin-course" class="dropdown-item">จัดการหลักสูตร</a></li>
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin-subject" class="dropdown-item">จัดการรายวิชา</a></li>
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin-menu-schedule"
                class="dropdown-item">จัดการตารางเรียน</a>
            </li>
            <li><a href="<?php echo BASE_URL; ?>index.php?page=admin-report" class="dropdown-item">ดูรายงาน</a></li>
          
          <li><a href="<?php echo BASE_URL; ?>src/Controller/logout.php" class="dropdown-item">ออกจากระบบ</a></li>
        </ul>
      </div>

      <!-- <div class="auth-links"> -->
        <!-- <a href="<?php echo BASE_URL; ?>index.php?page=login" class="btn btn-outline-light">admin</a> -->
      <!-- </div> -->

  </div>

</nav>

</nav>
<div class="d-flex">
  <div class="row h-100">
    <!-- Sidebar -->
    <div id="sidebar" class="col-12 col-md-3 bg-dark p-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link text-white btn btn-outline-info" href="?page=home">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?page=schedule">ตารางเรียน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?page=teaching">ตารางสอน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?page=room">ตารางห้อง</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?page=studyplan">แผนการเรียน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?page=course">หลักสูตร</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- User Section -->