<?php
include_once("db_connection.php");

//Time variable
$time = new DateTime("now", new DateTimeZone("Africa/Dar_es_Salaam"));
$currentTime = $time->format("Y-m-d H:i:s");
$curentDay = $time->format("Y-m-d");
$startMonth = date('Y-m-01');
$startYear = date('Y-01-01');

if (isset($_POST['addTeacher'])) {
  $first_name = $conn->real_escape_string($_POST['teacherFirstname']);
  $last_name = $conn->real_escape_string($_POST['teacherLastname']);
  $full_name = $first_name . ' ' . $last_name;
  $e_mail = $conn->real_escape_string($_POST['teacherEmail']);
  $phone_no = $conn->real_escape_string($_POST['teacherPhone']);
  $department = $conn->real_escape_string($_POST['teacherDepartment']);
  $role = $conn->real_escape_string($_POST['teacherRole']);

  $checkingTeacher = "SELECT * FROM teachers WHERE teachers.teacherEmail = '$e_mail' ";
  $result = $conn->query($checkingTeacher);
  if ($result->num_rows > 0) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Warning!!',
                    text: 'A Teacher already exists',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
              });
         </script>";
  } else {

    $teachersQuery = "INSERT INTO teachers (departmentId, teacherFirstName, teacherLastName, teacherFullName, teacherEmail, teacherPhoneNo, teacherRole, createdDate, updatedDate) 
                VALUES ('$department', '$first_name', '$last_name', '$full_name', '$e_mail', '$phone_no', '$role', '$currentTime', '$currentTime')";

    if ($conn->query($teachersQuery) === TRUE) {
      echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Success!!',
                    text: 'New Teacher added Successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
              });
          </script>";
    } else {
      echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Ooops!!',
                    text: 'There was an error!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              });
          </script>";
    }
  }
}
?>

<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dream School</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Dream School</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-smile"></i>
              <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
          </li>
          <!-- Layouts -->
          <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n="CBWSO">Teachers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate" data-i18n="CBWSO">Students</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps & Pages</span>
          </li>

          <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cog bx-md me-3"></i>
              <div class="text-truncate" data-i18n="DP Data">Settings</div>

            </a>
            <ul class="menu-sub">
              <li class="menu-item active">
                <a href="addTeacher.php" class="menu-link">
                  <div class="text-truncate">Add Teacher</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="addStudent.php" class="menu-link">
                  <div class="text-truncate">Add Students</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="addClass.php" class="menu-link">
                  <div class="text-truncate">Add Class</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div class="text-truncate">Add Teacher</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="bx bx-menu bx-md"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search bx-md"></i>
                <input
                  type="text"
                  class="form-control border-0 shadow-none ps-1 ps-sm-2"
                  placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->


              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a
                  class="nav-link dropdown-toggle hide-arrow p-0"
                  href="javascript:void(0);"
                  data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">John Doe</h6>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card bx-md me-3"></i><span class="flex-grow-1 align-middle">Billing Plan</span>
                        <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="col-xl">
              <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Teacher's Information</h5>
                </div>
                <div class="card-body">
                  <form action="addTeacher.php" method="POST" enctype="multipart/form-data">

                <div class="mb-6">
                  <label class="form-label">First Name</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="teacherFirstname" name="teacherFirstname" placeholder="First Name" oninput="convertToUpperCase(this)" required />
                    </div>
                </div>
                <div class="mb-6">
                  <label class="form-label">Last Name</label>
                    <div class=" input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="teacherLastname" name="teacherLastname" placeholder="Last Name" oninput="convertToUpperCase(this)" required />
                    </div>
                </div>
                <div class="mb-6">
                  <label class="form-label">Email</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input type="email" id="teacherEmail" name="teacherEmail" class="form-control" placeholder="E-mail" required />
                  </div>
                </div>
                <div class="mb-6">
                  <label class="form-label">Phone No</label>
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                    <input type="number" id="teacherPhone" name="teacherPhone" class="form-control phone-mask" placeholder="Phone No" required />
                  </div>
                </div>
                <div class="mb-6">
                  <label class="form-label"">Department</label>
                    <div class=" input-group input-group-merge">
                      <select name="teacherDepartment" id="teacherDepartment" class="form-control">
                      <option value="">Teacher's Department</option>
                      <?php
                      $departmentQuery = "SELECT *
                                          FROM departments";
                      $departmentQueryResult = $conn->query($departmentQuery);
                      if(mysqli_num_rows($departmentQueryResult) > 0) {
                        while($row = mysqli_fetch_assoc($departmentQueryResult)){
                          echo "<option value = '".$row['departmentId']."'>" .$row['departmentName']. "</option>";
                        }
                      }                    
                      ?>
                      </select>
                    </div>
                </div>
                <div class="mb-6">
                  <label class="form-label"">Role</label>
                    <div class=" input-group input-group-merge">
                      <select name="teacherRole" id="teacherRole" class="form-control">
                      <option value="">Teacher's Role</option>
                      <option value="60">Teacher</option>
                      <option value="61">Class Teacher</option>
                      <option value="62">Environments Teacher</option>
                      <option value="63">Head Of Department</option>
                      </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="addTeacher">Submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl">
            <div
              class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
              <div class="text-body">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
              </div>

            </div>
          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script>
    function convertToUpperCase(input) {
      input.value = input.value.toUpperCase();
    }
  </script>
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag before closing body tag for github widget button. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>