<?php
include_once("db_connection.php");

if (isset($_POST['addSubject'])) {
    $subjectName = trim($_POST['subjectName']);
    $description = trim($_POST['subjectDescription']);

    $checkSubject = "SELECT * 
                     FROM subjects 
                     WHERE subject_name = '$subjectName'";
    $checkSubjectResult = $conn->query($checkSubject);
    if (mysqli_num_rows($checkSubjectResult) > 0) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Warning!!',
                    text: 'A Subject already exists',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
              });
         </script>";
    } else {
        $addSubjectQuery = "INSERT INTO subjects (subject_name, subject_description)
                            VALUES ('$subjectName','$description')";
        if ($conn->query($addSubjectQuery) === TRUE) {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Success!!',
                    text: 'New Subject added successfully',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
              });
         </script>";
        } else {
            echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
         Swal.fire({
                    title: 'Ooops!',
                    text: 'There was an error',
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
                    <li class="menu-item">
                        <a href="teachers.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div class="text-truncate">Teachers</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="students.php" class="menu-link menu">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div class="text-truncate">Students</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="subjects.php" class="menu-link menu">
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
                                    <div class="col-lg-3 col-md-3 col-6 mb-6">
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
                                    <div class="col-lg-3 col-md-3 col-6 mb-6">
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
                                                $totalStudentsQuery = "SELECT * 
                          FROM students";
                                                $totalStudentsQueryResults = $conn->query($totalStudentsQuery);
                                                if ($totalStudents = mysqli_num_rows($totalStudentsQueryResults)) {
                                                    echo '<h4 class="card-title mb-3">' . $totalStudents . '</h4> ';
                                                } else {
                                                    echo '<h4 class="card-title mb-3"> 0 </h4> ';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 mb-6">
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
                                                $totalClassesQuery = "SELECT * 
                                                FROM classes";
                                                $totalClassesQueryResult = $conn->query($totalClassesQuery);
                                                if ($totalClasses = mysqli_num_rows($totalClassesQueryResult) > 0) {
                                                    echo  '<h4 class="card-title mb-3">' . $totalClasses . '</h4>';
                                                } else {
                                                    echo '<h4 class="card-title mb-3"> 0 </h4>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 mb-6">
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
                            <!-- Order Statistics -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">Top Classes With Most Students</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-6">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <?php
                                                $topClassStudentsCountQuery = "SELECT SUM(totalStudents) AS studentsCount
                                                          FROM 
                                                          ( SELECT classes.class_id, classes.class_name, COUNT(student_id) AS totalStudents
                                                          FROM classes, students 
                                                          WHERE classes.class_id = students.class_id
                                                          GROUP BY classes.class_id, classes.class_name
                                                          ORDER BY totalStudents DESC
                                                          LIMIT 4) AS topClassStudents";
                                                $topClassStudentsCountQueryResult = $conn->query($topClassStudentsCountQuery);
                                                if (mysqli_num_rows($topClassStudentsCountQueryResult) > 0) {
                                                    while ($row = mysqli_fetch_array($topClassStudentsCountQueryResult)) {
                                                        echo '<h3 class="mb-1">' . $row['studentsCount'] . '</h3>';
                                                        echo '<small>Total Students</small>';
                                                    }
                                                } else {
                                                    echo '<h3 class="mb-1"> 0 </h3>';
                                                    echo '<small>No Students</small>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-center mb-5">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-mobile-alt"></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <?php
                                                    $topClassWithMostStudentsQuery = "SELECT classes.class_id, classes.class_name, COUNT(students.student_id) AS totalStudents
                                                          FROM classes, students 
                                                          WHERE classes.class_id = students.class_id
                                                          GROUP BY classes.class_id, classes.class_name
                                                          ORDER BY totalStudents DESC
                                                          LIMIT 4";
                                                    $topClassWithMostStudentsQueryResult = $conn->query($topClassWithMostStudentsQuery);
                                                    if (mysqli_num_rows($topClassWithMostStudentsQueryResult) > 0) {
                                                        $index = 0;
                                                        while ($row = mysqli_fetch_assoc($topClassWithMostStudentsQueryResult)) {
                                                            echo '<div class="me-2"><h6 class="mb-0">' . $row['class_name'] . '</h6>';
                                                            echo '<small>' . $row['class_id'] . '</small>';
                                                            echo '</div>';
                                                            echo '<div class="user-progress"><h6 class="mb-0">' . $row['totalStudents'] . '</h6></div>';
                                                            $index++;
                                                        }
                                                    } else {
                                                        echo '<div class="me-2"><h6 class="mb-0"> 0 </h6></div>';
                                                        echo '<div class="user-progress"><h6 class="mb-0"> No Classes </h6></div>';
                                                    }
                                                    echo '</div>';
                                                    echo '</li>';
                                                    ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Order Statistics -->

                            <!-- Expense Overview -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">Top Subjects With Most Teachers</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-6">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <?php
                                                $topSubjectsTeachersCountQuery = "SELECT SUM(totalTeachers) AS teachersCount
                                                        FROM ( SELECT subjects.subject_id, subjects.subject_name, COUNT(teachers.teacher_id) AS totalTeachers
                                                              FROM subjects, teachers 
                                                              WHERE subjects.subject_id = teachers.subject_id
                                                              GROUP BY subjects.subject_id, subjects.subject_name
                                                              ORDER BY totalTeachers DESC
                                                              LIMIT 4) AS topClassStudents";
                                                $topSubjectTeachersCountQueryResult = $conn->query($topSubjectsTeachersCountQuery);
                                                if (mysqli_num_rows($topSubjectTeachersCountQueryResult) > 0) {
                                                    while ($row = mysqli_fetch_array($topSubjectTeachersCountQueryResult)) {
                                                        echo '<h3 class="mb-1">' . $row['teachersCount'] . '</h3>';
                                                        echo '<small>Total Teachers</small>';
                                                    }
                                                } else {
                                                    echo '<h3 class="mb-1"> 0 </h3>';
                                                    echo '<small>No Students</small>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-center mb-5">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <?php
                                                    $topSubjectWithMostTeachersQuery = "SELECT subjects.subject_id, subjects.subject_name, COUNT(teachers.teacher_id) AS totalTeachers
                                                              FROM subjects, teachers 
                                                              WHERE subjects.subject_id = teachers.subject_id
                                                              GROUP BY subjects.subject_id, subjects.subject_name
                                                              ORDER BY totalTeachers DESC
                                                              LIMIT 4";
                                                    $topSubjectWithMostTeachersQueryResult = $conn->query($topSubjectWithMostTeachersQuery);
                                                    if (mysqli_num_rows($topSubjectWithMostTeachersQueryResult) > 0) {
                                                        $index = 0;
                                                        while ($row = mysqli_fetch_assoc($topSubjectWithMostTeachersQueryResult)) {
                                                            echo '<div class="me-2"><h6 class="mb-0">' . $row['subject_name'] . '</h6>';
                                                            echo '<small>' . $row['subject_id'] . '</small>';
                                                            echo '</div>';
                                                            echo '<div class="user-progress"><h6 class="mb-0">' . $row['totalTeachers'] . '</h6></div>';
                                                            $index++;
                                                        }
                                                    } else {
                                                        echo '<div class="me-2"><h6 class="mb-0"> 0 </h6></div>';
                                                        echo '<div class="user-progress"><h6 class="mb-0"> No Subjects </h6></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Expense Overview -->

                            <!-- Transactions -->
                            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-1 me-2">Top Classes With Most Students</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-6">
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <?php
                                                $topClassesStudentsCountQuery = "SELECT SUM(totalStudents) AS studentsCount
                                                          FROM (
                                                                SELECT classes.class_id, classes.class_name, COUNT(students.student_id) AS totalStudents
                                                                   FROM students, classes
                                                                   WHERE classes.class_id = students.class_id
                                                                   GROUP BY classes.class_id, classes.class_name
                                                                   ORDER BY totalStudents DESC
                                                                   LIMIT 4) AS topClassStudents";
                                                $topClassesStudentsCountQueryResult = $conn->query($topClassesStudentsCountQuery);
                                                if (mysqli_num_rows($topClassesStudentsCountQueryResult) > 0) {
                                                    while ($row = mysqli_fetch_array($topClassesStudentsCountQueryResult)) {
                                                        echo '<h3 class="mb-1">' . $row['studentsCount'] . '</h3>';
                                                        echo '<small>Total Students</small>';
                                                    }
                                                } else {
                                                    echo '<h3 class="mb-1"> 0 </h3>';
                                                    echo '<small>No Students</small>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-center mb-5">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <?php
                                                    $topClassesWithMostStudentsCountQuery = "SELECT classes.class_id, classes.class_name, COUNT(students.student_id) AS totalStudents
                                                                   FROM students, classes
                                                                   WHERE classes.class_id = students.class_id
                                                                   GROUP BY classes.class_id, classes.class_name
                                                                   ORDER BY totalStudents DESC
                                                                   LIMIT 4";

                                                    $topClassesWithMostStudentsCountQueryResult = $conn->query($topClassesWithMostStudentsCountQuery);
                                                    if (mysqli_num_rows($topClassesWithMostStudentsCountQueryResult) > 0) {
                                                        $index = 0;
                                                        while ($row = mysqli_fetch_array($topClassesWithMostStudentsCountQueryResult)) {
                                                            echo '<div class="me-2"><h6 class="mb-0">' . $row['class_name'] . '</h6>';
                                                            echo '<small>' . $row['class_id'] . '</small>';
                                                            echo '</div>';
                                                            echo '<div class="user-progress"><h6 class="mb-0">' . $row['totalStudents'] . '</h6></div>';
                                                        }
                                                    } else {
                                                        echo '<div class="me-2"><h6 class="mb-0"> 0 </h6></div>';
                                                        echo '<div class="user-progress"><h6 class="mb-0">No Classes</h6></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Transactions -->
                        </div>
                        <div class="row">
                            <!-- Hoverable Table rows -->
                            <div class="card">
                                <h5 class="card-header">Subjects</h5>
                                <div class="table-responsive text-nowrap">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addSubjectModal">
                                        Add Subject
                                    </button>
                                    <table class="table table-dark" id="teachers">
                                        <thead class="table-light">
                                            <tr>
                                                <th>NO.</th>
                                                <th>Subject ID</th>
                                                <th>Subject Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php
                                            $subjectsQuery = "SELECT * 
                                                             FROM subjects";
                                            $subjectsQueryResults = $conn->query($subjectsQuery);
                                            $index = 0;

                                            if ($subjectsQueryResults->num_rows > 0) {
                                                while ($row = mysqli_fetch_array($subjectsQueryResults)) {
                                                    $index++;
                                                    $subject_id = $row['subject_id'];
                                            ?>
                                                    <tr>
                                                        <td><?= $index ?></td>
                                                        <td><?= $row['subject_id'] ?></td>
                                                        <td><?= $row['subject_name'] ?></td>
                                                        <td><?= $row['subject_description'] ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="width: 10%">
                                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#subjectViewModal<?= $subject_id ?>"> <i class="bx bx-show me-1"></i>View</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal for Viewing teacher Details -->
                                                    <div class="modal fade" id="subjectViewModal<?= $subject_id ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" justify-content-center><u><span class="badge rounded-pill bg-primary"><?= ($row['subject_name']) ?></span></u></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Fetch and display data based on teacherId -->
                                                                    <?php
                                                                    $subjectDetailsQuery = "SELECT *
                                                                                            FROM subjects                                                                                           
                                                                                            WHERE subject_id = '$subject_id'";

                                                                    $subjectDetailsQueryResult = $conn->query($subjectDetailsQuery);

                                                                    if ($subjectDetailsQueryResult->num_rows > 0) {
                                                                        $subject = $subjectDetailsQueryResult->fetch_assoc();
                                                                    ?>

                                                                        <form role="form">
                                                                            <h5><span class="badge bg-label-primary">SUBJECT DETAILS:</span></h5>

                                                                            <div class="row g-6">
                                                                                <div class="col-md-6">
                                                                                    <label class="control-label">Name:</label>
                                                                                    <p class="form-control"><?= ($subject['subject_name']) ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="control-label">ID:</label>
                                                                                    <p class="form-control"><?= ($subject['subject_id']) ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    <?php
                                                                    } else {
                                                                        echo "No Teacher details found.";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
                                    <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered"" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel4">Subject Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="subjects.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row g-6">
                                                            <div class="col mb-0">
                                                                <label class="form-label">Subject Name</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                                    <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="Subject Name" oninput="convertToUpperCase(this)" required />
                                                                </div>
                                                            </div>
                                                            <div class="row g-6">
                                                                <div class="col mb-0">
                                                                    <label class="form-label">Description</label>
                                                                    <div class=" input-group input-group-merge">
                                                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                                        <input type="text" class="form-control" id="subjectDescription" name="subjectDescription" placeholder="Description" oninput="convertToUpperCase(this)" required />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary" name="addSubject">Submit</button>
                                                    </form>
                                                </div>
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