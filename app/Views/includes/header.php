<?php $session = session(); ?>
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
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="assets/img/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-list toggle-sidebar-btn d-block d-sm-none"></i>
                <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center">
                    <img src="assets/img/logo.png" alt="">
                    <span class="">SkillGap</span>
                </a>
            </div>

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item me-3">
                        <a class="btn btn-primary btn-sm" href="<?= base_url(); ?>addpost">
                            <i class="bi bi-plus-circle-dotted"></i> <span class="d-none d-lg-inline">Add Post</span>
                        </a>
                    </li>
                    <li class="nav-item me-1">
                        <a class="nav-link nav-icon" href="<?= base_url(); ?>search">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a>
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

                        </ul>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= base_url(); ?>myaccount">
                            <img src="<?= base_url('uploads/profile/'); ?><?php echo $session->get('image'); ?>" alt="Profile" class="rounded-circle">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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
        
        
    </aside>