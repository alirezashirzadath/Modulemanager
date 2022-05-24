<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pagetitle')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/modules/modulemanager/media/image/favicon.png">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="/modules/modulemanager/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="/modules/modulemanager/css/app.css" type="text/css">
</head>

<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->


<!-- begin::navigation -->
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="داشبورد">
                <a href="#navigationDashboards" title="داشبورد">
                    <i class="icon ti-pie-chart"></i>

                </a>
            </li>
        </ul>
        <ul>

            <li data-toggle="tooltip" title="بازگشت">
                <a href="#" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="navigationDashboards" class="navigation-active">
            <li class="navigation-divider">مدیریت ماژول ها</li>
            <li>
                <a href="#">ماژول ها</a>
            </li>
        </ul>
    </div>
</div>
<!-- end::navigation -->

<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="#">
            <h1>Module Manager</h1>
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">@yield('bodytitle')</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">@yield('bodytitle')</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">

@yield('content')

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="/modules/modulemanager/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="/modules/modulemanager/js/app.js"></script>

<script>

    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    }
    toastr.success('@yield('toast')');
</script>
@include('sweetalert::alert')
@yield('scripts')
</body>

</html>
