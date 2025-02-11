<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Dashboard</title>
    <base href="<?php echo e(\URL::to('/')); ?>">
    <link href="img/Newlogo.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/ijaboCropTool/ijaboCropTool.min.css')); ?>">
    <!-- Theme style -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/feather/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/ti-icons/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/typicons/typicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/simple-line-icons/css/simple-line-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('js/select.dataTables.min.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styleadmin.css')); ?>">

    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"> </script> -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <div class=" container-scroller sidebar-dark">
        <!-- navbar ข้างบน 
    -->
        <nav class=" navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </div>
            <!-- <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?> -->
            <!-- Left navbar links -->
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text"><?php echo e(trans('message.research_info')); ?> <span
                                class="text-black fw-bold"></span></h1>
                        <h3 class="welcome-sub-text"> </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                    </li> -->
                    <!-- <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="<?php echo e(Auth::user()->picture); ?>"
                                alt="User profile picture">
                        </a>
                    </li> -->
                    <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="<?php echo e(Auth::user()->picture); ?>"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?php echo e(Auth::user()->name); ?></p>
                                <p class="fw-light text-muted mb-0"></p>
                            </div>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
                                Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                                Messages</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
                                Activity</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
                                FAQ</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-translate"></i>
                            <span class="flag-icon flag-icon-<?php echo e(Config::get('languages')[App::getLocale()]['flag-icon']); ?>"></span>
                            <?php echo e(Config::get('languages')[App::getLocale()]['display']); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="navbarDropdownMenuLink">
                            <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($lang != App::getLocale()): ?>
                            <a class="dropdown-item" href="<?php echo e(route('langswitch', $lang)); ?>"><span
                                    class="flag-icon flag-icon-<?php echo e($language['flag-icon']); ?>"></span>
                                <?php echo e($language['display']); ?></a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); 
                        document.getElementById ('logout-form').submit();"> <?php echo e(__('Logout')); ?> <i class="mdi mdi-logout"></i></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
            </div>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>

        </nav>
        <!-- navbar ข้างบน -->
        <div class="container-fluid page-body-wrapper">
            <!-- Main Sidebar Container -->
            <!-- <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="mdi mdi-home"></i></div>
            </div> -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('dashboard*')) ? 'active' : ''); ?>"
                            href="<?php echo e(route('dashboard')); ?>">
                            <i class="menu-icon mdi mdi-grid-large"></i>
                            <span class="menu-title"><?php echo e(trans('message.dashboard')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item nav-category"><?php echo e(trans('message.profile')); ?></li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('admin/profile*')) ? 'active' : ''); ?>"
                            href="<?php echo e(route('profile')); ?>">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.user_profile')); ?></span>

                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('admin/settings*')) ? 'active' : ''); ?>"
                            href="<?php echo e(route('settings')); ?>">
                            <i class="menu-icon mdi mdi mdi-settings-outline"></i>
                            <span class="menu-title">Settings</span>

                        </a>
                    </li> -->
                    <li class="nav-item nav-category"><?php echo e(trans('message.option')); ?></li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('funds-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('funds.index')); ?>">
                            <i class="menu-icon mdi mdi-file-document-box-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.manage_fund')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('researchProjects.index')); ?>">
                            <i class="menu-icon mdi mdi-book-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.research_project')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('groups-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('researchGroups.index')); ?>">
                            <i class="menu-icon mdi mdi-view-dashboard-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.research_group')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('papers-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ManagePublications" aria-expanded="false" aria-controls="ManagePublications">
                            <i class="menu-icon mdi mdi-book-open-page-variant"></i>
                            <span class="menu-title"><?php echo e(trans('message.manage_publications')); ?></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ManagePublications">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('papers.index')); ?>"><?php echo e(trans('message.published_researchs')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="/books"><?php echo e(trans('message.book')); ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="/patents">ผลงานวิชาการอื่นๆ</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('exportfile')); ?>" >
                            <i class="menu-icon mdi mdi-file-export"></i>
                            <span class="menu-title">Export</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                    <li class="nav-item nav-category"><?php echo e(trans('message.admin')); ?></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                            <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.users')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                            <i class="menu-icon mdi mdi-chart-gantt"></i>
                            <span class="menu-title"><?php echo e(trans('message.roles')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('permissions.index')); ?>">
                            <i class="menu-icon mdi mdi-checkbox-marked-circle-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.permission')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('departments.index')); ?>">
                            <i class="menu-icon mdi mdi-animation-outline"></i>
                            <span class="menu-title"><?php echo e(trans('message.departments')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('programs-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('programs.index')); ?>">
                            <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                            <span class="menu-title"><?php echo e(trans('message.manage_programs')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expertises-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('experts.index')); ?>">
                            <i class="menu-icon mdi mdi-buffer"></i>
                            <span class="menu-title"><?php echo e(trans('message.manage_expertise')); ?></span>

                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>

            <!-- Content Wrapper. Contains page content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    </div>
                </footer>
            </div>

        </div>
    </div>
    <!-- plugins:js -->
    <script src="<?php echo e(asset('vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/progressbar.js/progressbar.min.js')); ?>"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('js/Chart.roundedBarCharts.js')); ?>"></script>
    <!-- End custom js for this page-->

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('plugins/ijaboCropTool/ijaboCropTool.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <?php echo $__env->yieldContent('javascript'); ?>


</body>


</html><?php /**PATH /var/www/html/resources/views/dashboards/users/layouts/user-dash-layout.blade.php ENDPATH**/ ?>