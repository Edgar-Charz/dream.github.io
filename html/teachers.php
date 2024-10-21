<?php
include_once("db_connection.php");

//Time variable
$time = new DateTime("now", new DateTimeZone("Africa/Dar_es_Salaam"));
$currentTime = $time->format("Y-m-d H:i:s");
$curentDay = $time->format("Y-m-d");
$startMonth = date('Y-m-01');
$startYear = date('Y-01-01');

if (isset($_POST['addTeacher'])) {
  $first_name = $conn->real_escape_string($_POST['teacher_firstname']);
  $last_name = $conn->real_escape_string($_POST['teacher_lastname']);
  $full_name = $first_name . ' ' . $last_name;
  $dob = $conn->real_escape_string($_POST['teacher_dob']);
  $gender = $conn->real_escape_string($_POST['teacher_gender']);
  $subject = $conn->real_escape_string($_POST['teacher_subject']);
  $phone_no = $conn->real_escape_string($_POST['teacher_phone']);
  $e_mail = $conn->real_escape_string($_POST['teacher_email']);
  $address = $conn->real_escape_string($_POST['teacher_address']);

  $checkingTeacher = "SELECT * FROM teachers WHERE teachers.teacher_email = '$e_mail' ";
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

    $teachersQuery = "INSERT INTO teachers(`teacher_first`, `teacher_last`, `teacher_fullname`, `date_of_birth`, `gender`, `subject_id`, `teacher_phone`, `teacher_email`, `address`, `hire_date`, `created_at`, updated_at)
                VALUES ('$first_name', '$last_name', '$full_name', '$dob', '$gender', '$subject', '$phone_no', '$e_mail', '$address', '$currentTime', '$currentTime', '$currentTime')";

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
          <li class="menu-item active">
            <a href="teachers.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate">Teachers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="students.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate">Students</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="subjects.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate">Subjects</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="classes.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div class="text-truncate">Classes</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps & Pages</span>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cog bx-md me-3"></i>
              <div class="text-truncate">Settings</div>

            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="addTeacher.php" class="menu-link">
                  <div class="text-truncate">Add Teachers</div>
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
            <div class="row">
              <div class="col-lg-12 col-md-6 order-1">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-6 mb-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                          <div class="avatar flex-shrink-0">
                            <img
                              src="../assets/img/icons/unicons/chart-success.png"
                              alt="chart success"
                              class="rounded" />
                          </div>
                        </div>
                        <h4>Teachers</h4>
                        <?php
                        $totalTeachersQuery = "SELECT * 
                          FROM teachers";
                        $totalTeachersQueryResults = $conn->query($totalTeachersQuery);
                        if ($totalTeachers = mysqli_num_rows($totalTeachersQueryResults)) {
                          echo '<h4 class="card-title mb-3">' . $totalTeachers . '</h4> ';
                        } else {
                          echo '<h4 class="card-title mb-3"> 0 </h4> ';
                        }
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-6 mb-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                          <div class="avatar flex-shrink-0">
                            <img
                              src="../assets/img/icons/unicons/chart-success.png"
                              alt="chart success"
                              class="rounded" />
                          </div>
                        </div>
                        <h4>Classes</h4>
                        <?php
                        $totalClassesQuery = "SELECT COUNT(*) AS totalClasses 
                                                                      FROM classes";
                        $totalClassesQueryResult = $conn->query($totalClassesQuery);
                        if (mysqli_num_rows($totalClassesQueryResult) > 0) {
                          while ($row = mysqli_fetch_assoc($totalClassesQueryResult)) {
                            echo  '<h4 class="card-title mb-3">' . $row['totalClasses'] . '</h4>';
                          }
                        } else {
                          echo '<h4 class="card-title mb-3"> 0 </h4>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-6 mb-6">
                    <div class="card h-100">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                          <div class="avatar flex-shrink-0">
                            <img
                              src="../assets/img/icons/unicons/chart-success.png"
                              alt="chart success"
                              class="rounded" />
                          </div>
                        </div>
                        <h4>Subjects</h4>
                        <?php
                        $totalSubjectsQuery = "SELECT *
                                                    FROM subjects";
                        $totalSubjectsQueryResult = $conn->query($totalSubjectsQuery);
                        if ($totalSubjects = mysqli_num_rows($totalSubjectsQueryResult) > 0) {
                          echo '<h4 class="card-title mb-3">' . $totalSubjects . '</h4>';
                        } else {
                          echo '<h4 class="card-title mb-3"> 0 </h4>';
                        }
                        ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row">
              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Teachers</h5>
                <div class="table-responsive text-nowrap">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addTeacherModal">
                    Add Teacher
                  </button>
                  <table class="table table-dark" id="teachers">
                    <thead class="table-light">
                      <tr>
                        <th>NO.</th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Subject Name</th>
                        <th>Phone No</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Hire Date</th>
                        <!-- <th>Status</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $totalTeachersQuery = "SELECT teachers.*, subjects.subject_name  
                            FROM teachers, subjects
                            WHERE teachers.subject_id = subjects.subject_id
                            GROUP BY teachers.teacher_id
                            ORDER BY teachers.teacher_id ASC";
                      $totalTeachersQueryResults = $conn->query($totalTeachersQuery);
                      $index = 0;

                      if ($totalTeachersQueryResults->num_rows > 0) {
                        while ($row = mysqli_fetch_array($totalTeachersQueryResults)) {
                          $index++;
                          $teacher_id = $row['teacher_id'];
                      ?>
                          <tr>
                            <td><?= $index ?></td>
                            <td><?= ($row['teacher_id']) ?></td>
                            <td><?= ($row['teacher_fullname']) ?></td>
                            <td><?= ($row['date_of_birth']) ?></td>
                            <?php if ($row['gender'] == "1") : ?>
                              <td><span class="badge rounded-pill bg-success">FEMALE</span></td>
                            <?php endif; ?>
                            <?php if ($row['gender'] == "2") : ?>
                              <td><span class="badge rounded-pill bg-danger">MALE</span></td>
                            <?php endif; ?>
                            <td><?= ($row['subject_name']) ?></td>
                            <td><?= ($row['teacher_phone']) ?></td>
                            <td><?= ($row['teacher_email']) ?></td>
                            <td><?= ($row['address']) ?></td>
                            <td><?= ($row['hire_date']) ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="width: 10%">
                                  <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#teacherViewModal<?= $teacher_id ?>"> <i class="bx bx-show me-1"></i>View</button>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <!-- Modal for Viewing teacher Details -->


                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                  <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel4">Teacher's Information</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="teachers.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i class="bx bx-user"></i></span>
                                  <input type="text" class="form-control" id="teacher_firstname" name="teacher_firstname" placeholder="First Name" oninput="convertToUpperCase(this)" required />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <div class=" input-group input-group-merge">
                                  <span class="input-group-text"><i class="bx bx-user"></i></span>
                                  <input type="text" class="form-control" id="teacher_lastname" name="teacher_lastname" placeholder="Last Name" oninput="convertToUpperCase(this)" required />
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row g-6">
                              <div class="col mb-0">
                                <label class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="teacher_dob" name="teacher_dob" required />
                              </div>
                              <div class="col mb-0">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="teacher_gender" id="teacher_gender" required>
                                  <option value="">--- Select Gender ---</option>
                                  <option value="1">Female</option>
                                  <option value="2">Male</option>
                                </select>
                              </div>
                            </div>
                            <br>
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <select class="form-control" name="teacher_subject" id="teacher_subject">
                                  <option value="">--- Select Teaching Subject ---</option>
                                  <?php
                                  require_once 'db_connection.php';
                                  $subjectQuery = "SELECT * FROM subjects";
                                  $subjectQueryResult = $conn->query($subjectQuery);
                                  if (mysqli_num_rows($subjectQueryResult) > 0) {
                                    while ($subject = mysqli_fetch_assoc($subjectQueryResult)) {
                                      echo "<option value='" . $subject['subject_id'] . "'>" . $subject['subject_name'] . "</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                  <input type="number" class="form-control" id="teacher_phone" name="teacher_phone" placeholder="Phone Number" required>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                  <input type="email" id="teacher_email" name="teacher_email" class="form-control" placeholder="E-mail" required />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label class="form-label">Home Address</label>
                                <input type="text" class="form-control" id="teacher_address" name="teacher_address" placeholder="Home Address" oninput="convertToUpperCase(this)" required>
                              </div>
                            </div>
                            <br>
                            <!-- <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label">Hire Date</label>
                                <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                              </div>
                            </div> -->
                            <br>
                            <button type="submit" class="btn btn-primary" name="addTeacher">Submit</button>
                          </form>
                        </div>
                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="submit" class="btn btn-primary" name="addTeacher">Submit</button>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center" id="pagination">

                  </ul>
                </nav>
              </div>
            </div>
            <!--/ Hoverable Table rows -->



          </div> <!-- / Content -->

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