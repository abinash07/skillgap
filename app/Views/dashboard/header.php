<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Skill Gap</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/dashboard/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Dashboard</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li>

            <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                    <h4>Lorem Ipsum</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>30 min. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                    <h4>Atque rerum nesciunt</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>1 hr. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                    <h4>Sit rerum fuga</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>2 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                    <h4>Dicta reprehenderit</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>4 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
                </li>

            </ul><!-- End Notification Dropdown Items -->

            </li>

            <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                <a href="#">Show all messages</a>
                </li>

            </ul><!-- End Messages Dropdown Items -->

            </li>

            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="<?= base_url(); ?>assets/img/testimonials-2.jpg" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                <h6>Kevin Anderson</h6>
                <span>Web Designer</span>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li>
        </ul>
        </nav>
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">AN</div>
            <div class="user-info">
                <h5>Abinash Nayak</h5>
                <small>employee</small>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="#" class="nav-link2 active" data-section="dashboard">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link2" data-section="assessments">
                    <i class="bi bi-journal-text"></i> Assessments
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link2" data-section="skills-matrix">
                    <i class="bi bi-bullseye"></i> Skills Matrix
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link2" data-section="progress">
                    <i class="bi bi-bar-chart"></i>
                    Progress
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link2" data-section="recommendations">
                    <i class="bi bi-lightbulb"></i>
                    Recommendations
                </a>
            </div>
            <div class="nav-item">
                <a href="#" class="nav-link2" data-section="profile">
                    <i class="bi bi-person"></i>
                    Profile
                </a>
            </div>
        </nav>

        <div style="position: absolute; bottom: 2rem; left: 1.5rem; right: 1.5rem;">
            <p>© Copyright 2025, Skill Gap</p>
        </div>
        
        <!-- <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="components-alerts.html">
                <i class="bi bi-circle"></i><span>Alerts</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                <i class="bi bi-circle"></i><span>Accordion</span>
                </a>
            </li>
            <li>
                <a href="components-badges.html">
                <i class="bi bi-circle"></i><span>Badges</span>
                </a>
            </li>
            <li>
                <a href="components-breadcrumbs.html">
                <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                </a>
            </li>
            <li>
                <a href="components-buttons.html">
                <i class="bi bi-circle"></i><span>Buttons</span>
                </a>
            </li>
            <li>
                <a href="components-cards.html">
                <i class="bi bi-circle"></i><span>Cards</span>
                </a>
            </li>
            <li>
                <a href="components-carousel.html">
                <i class="bi bi-circle"></i><span>Carousel</span>
                </a>
            </li>
            <li>
                <a href="components-list-group.html">
                <i class="bi bi-circle"></i><span>List group</span>
                </a>
            </li>
            <li>
                <a href="components-modal.html">
                <i class="bi bi-circle"></i><span>Modal</span>
                </a>
            </li>
            <li>
                <a href="components-tabs.html">
                <i class="bi bi-circle"></i><span>Tabs</span>
                </a>
            </li>
            <li>
                <a href="components-pagination.html">
                <i class="bi bi-circle"></i><span>Pagination</span>
                </a>
            </li>
            <li>
                <a href="components-progress.html">
                <i class="bi bi-circle"></i><span>Progress</span>
                </a>
            </li>
            <li>
                <a href="components-spinners.html">
                <i class="bi bi-circle"></i><span>Spinners</span>
                </a>
            </li>
            <li>
                <a href="components-tooltips.html">
                <i class="bi bi-circle"></i><span>Tooltips</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
                </a>
            </li>
            <li>
                <a href="forms-layouts.html">
                <i class="bi bi-circle"></i><span>Form Layouts</span>
                </a>
            </li>
            <li>
                <a href="forms-editors.html">
                <i class="bi bi-circle"></i><span>Form Editors</span>
                </a>
            </li>
            <li>
                <a href="forms-validation.html">
                <i class="bi bi-circle"></i><span>Form Validation</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="tables-general.html">
                <i class="bi bi-circle"></i><span>General Tables</span>
                </a>
            </li>
            <li>
                <a href="tables-data.html">
                <i class="bi bi-circle"></i><span>Data Tables</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="charts-chartjs.html">
                <i class="bi bi-circle"></i><span>Chart.js</span>
                </a>
            </li>
            <li>
                <a href="charts-apexcharts.html">
                <i class="bi bi-circle"></i><span>ApexCharts</span>
                </a>
            </li>
            <li>
                <a href="charts-echarts.html">
                <i class="bi bi-circle"></i><span>ECharts</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="icons-bootstrap.html">
                <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-remix.html">
                <i class="bi bi-circle"></i><span>Remix Icons</span>
                </a>
            </li>
            <li>
                <a href="icons-boxicons.html">
                <i class="bi bi-circle"></i><span>Boxicons</span>
                </a>
            </li>
            </ul>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-card-list"></i>
            <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
            <i class="bi bi-dash-circle"></i>
            <span>Error 404</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
            <i class="bi bi-file-earmark"></i>
            <span>Blank</span>
            </a>
        </li>

        </ul> -->
    </aside>