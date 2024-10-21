<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Pragma: no-cache");

include_once 'db_connection.php';

$class_name = $_GET['darasa'] ?? '';

$class_name = $conn->real_escape_string($class_name);

$sql = "SELECT * FROM classes WHERE class_name = '$class_name'";
$result = $conn->query($sql);

$classDetails = $result->fetch_assoc();
$class_id = $classDetails['class_id'] ?? '';

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
    <style>
        /* Custom styling for dropdown */
        .dropdown {
            position: relative;
            /* Ensure dropdown is positioned relative to its container */
        }

        .dropdown-menu {
            display: none;
            /* Hide dropdown by default */
            position: absolute;
            /* Position it relative to the .dropdown container */
            top: 100%;
            /* Position it below the input field */
            left: 0;
            width: 15%;
            /* Make dropdown as wide as the search input */
            overflow-y: auto;
            /* Scroll if content overflows */
            z-index: 1000;
            /* Ensure dropdown is above other content */
        }

        .dropdown-menu.show {
            display: block;
            /* Show dropdown when needed */
        }

        .dropdown-item {
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #ddd;
        }
    </style>
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
                    <li class="menu-item">
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
                    <li class="menu-item active">
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
                        <?php
                        $sql = "SELECT class_name FROM classes";
                        $result = $conn->query($sql);
                        $classes = [];
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $classes[] = $row['class_name'];
                            }
                        }
                        ?>
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search bx-md"></i>
                                <input
                                    type="text"
                                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                                    placeholder="Search..."
                                    aria-label="Search..."
                                    id="classSearch"
                                    onkeyup="filterClasses()" />
                                <div id="dropdown-content" class="dropdown-menu"></div>
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
                        <?php if ($classDetails): ?>
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
                                                    <h4>Class Name</h4>
                                                    <h4 class="card-title mb-3"><?php echo ($classDetails['class_name']); ?></h4>
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
                                                    <h4>Class Teacher</h4>
                                                    <?php
                                                    $classTeacherQuery = " SELECT teachers.teacher_fullname
                                                                            FROM classes, teachers
                                                                            WHERE teachers.teacher_id = classes.teacher_id 
                                                                            AND classes.class_id = $class_id ";
                                                    $classTeacherQueryResult = $conn->query($classTeacherQuery);
                                                    if (mysqli_num_rows($classTeacherQueryResult) > 0) {
                                                        while ($row = mysqli_fetch_assoc($classTeacherQueryResult)) {
                                                            echo  '<h4 class="card-title mb-3">' . $row['teacher_fullname'] . '</h4>';
                                                        }
                                                    } else {
                                                        echo '<h4 class="card-title mb-3"> No Class Teacher </h4>';
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
                                                    <h4>Students</h4>
                                                    <?php
                                                    $totalStudentsQuery = "SELECT COUNT(students.student_id) AS totalStudents
                                                                            FROM students, classes
                                                                            WHERE students.class_id = classes.class_id 
                                                                            AND students.class_id = $class_id ";
                                                    $totalStudentsQueryResult = $conn->query($totalStudentsQuery);
                                                    if (mysqli_num_rows($totalStudentsQueryResult) > 0) {
                                                        while ($row = mysqli_fetch_assoc($totalStudentsQueryResult)) {
                                                            echo '<h4 class="card-title mb-3">' . $row['totalStudents'] . '</h4>';
                                                        }
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
                                    <h5 class="card-header">Classes</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-dark" id="teachers">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>NO.</th>
                                                    <th>ID</th>
                                                    <th>Full Name</th>
                                                    <th>DOB</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Phone No</th>
                                                    <th>E-mail</th>
                                                    <th>Enrollment Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php
                                                $studentsQuery = "SELECT students.*, classes.class_name  
                                                                FROM students, classes
                                                                WHERE students.class_id = classes.class_id
                                                                AND students.class_id = $class_id
                                                                GROUP BY students.student_id
                                                                ORDER BY students.student_id ASC";
                                                $studentsQueryResults = $conn->query($studentsQuery);
                                                $index = 0;

                                                if ($studentsQueryResults->num_rows > 0) {
                                                    while ($row = mysqli_fetch_array($studentsQueryResults)) {
                                                        $index++;
                                                        $student_id = $row['student_id'];
                                                ?>
                                                        <tr>
                                                            <td><?= $index ?></td>
                                                            <td><?= ($row['student_id']) ?></td>
                                                            <td><?= ($row['student_fullname']) ?></td>
                                                            <td><?= ($row['date_of_birth']) ?></td>
                                                            <?php if ($row['gender'] == "1") : ?>
                                                                <td><span class="badge rounded-pill bg-success">GIRL</span></td>
                                                            <?php endif; ?>
                                                            <?php if ($row['gender'] == "2") : ?>
                                                                <td><span class="badge rounded-pill bg-danger">BOY</span></td>
                                                            <?php endif; ?>
                                                            <td><?= ($row['address']) ?></td>
                                                            <td><?= ($row['phone_number']) ?></td>
                                                            <td><?= ($row['email']) ?></td>
                                                            <td><?= ($row['enrollment_date']) ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" style="width: 10%">
                                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#studentViewModal<?= $student_id ?>"> <i class="bx bx-show me-1"></i>View</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <!-- Modal for Viewing teacher Details -->
                                                        <div class="modal fade" id="classViewModal<?= $class_id ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-6">
                                                                                <label for="nameExLarge" class="form-label">Name</label>
                                                                                <input type="text" id="nameExLarge" class="form-control" placeholder="Enter Name" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-6">
                                                                            <div class="col mb-0">
                                                                                <label for="emailExLarge" class="form-label">Email</label>
                                                                                <input type="email" id="emailExLarge" class="form-control" placeholder="xxxx@xxx.xx" />
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <label for="dobExLarge" class="form-label">DOB</label>
                                                                                <input type="date" id="dobExLarge" class="form-control" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center" id="pagination">

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!--/ Hoverable Table rows -->
                        <?php endif; ?>
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

    <!-- script for Classes -->
    <script>
        // All classes are fetched once and stored in this array
        const classes = <?php echo json_encode($classes); ?>;

        // Function to filter classess based on input
        function filterClasses() {
            const searchQuery = document.getElementById('classSearch').value.toLowerCase();
            const dropdown = document.getElementById('dropdown-content');
            dropdown.innerHTML = ''; // Clear current results

            if (searchQuery.length > 0) {
                const filteredClasses = classes.filter(function(darasa) {
                    return darasa.toLowerCase().includes(searchQuery);
                });

                filteredClasses.forEach(function(darasa) {
                    const div = document.createElement('div');
                    div.classList.add('dropdown-item');
                    div.textContent = darasa;
                    div.onclick = function() {
                        window.location.href = 'classDetails.php?darasa=' + encodeURIComponent(darasa);
                    };
                    dropdown.appendChild(div);
                });

                dropdown.classList.add('show'); // Show dropdown if results are found
            } else {
                dropdown.classList.remove('show'); // Hide dropdown if input is empty
            }
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