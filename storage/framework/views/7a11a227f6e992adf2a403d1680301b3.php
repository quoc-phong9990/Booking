<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('styles'); ?>
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="<?php echo e(route('admin.index')); ?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo e(url('assets/images/logo-sm.png')); ?> " alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo e(url('assets/images/logo-dark.png')); ?> " alt="" height="17">
                            </span>
                        </a>

                        <a href="<?php echo e(route('admin.index')); ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo e(url('assets/images/logo-sm.png')); ?> " alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo e(url('assets/images/logo-light.png')); ?> " alt="" height="17">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                id="search-close-options"></span>
                        </div>

                    </form>
                </div>

                <div class="d-flex align-items-center">





                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                            class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>



                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="<?php echo e(asset(auth()->user()->avatar)); ?> " alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span
                                        class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e(auth()->user()->name); ?>

                                    </span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Admin</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome <?php echo e(auth()->user()->name); ?></h6>

                            <a class="dropdown-item" href="<?php echo e(route('auth.logout')); ?>"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- removeNotificationModal -->
    <!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="<?php echo e(route('admin.index')); ?>" class="logo logo-dark">
                <span class="logo-sm">
                    <img src=" <?php echo e(url('assets/images/logonew-nobg.png')); ?> " alt="" height="80">
                </span>
                <span class="logo-lg">
                    <img src="<?php echo e(url('assets/images/logonew-nobg.png')); ?> " alt="" height="80">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="<?php echo e(route('admin.index')); ?>" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?php echo e(url('assets/images/logonew-nobg.png')); ?> " alt="" height="80">
                </span>
                <span class="logo-lg">
                    <img src="<?php echo e(url('assets/images/logonew-nobg.png')); ?> " alt="" height="80">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © DEAH.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>



<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH E:\Desktop\laragon\www\DEAH-Booking\resources\views/admin/layout/master.blade.php ENDPATH**/ ?>