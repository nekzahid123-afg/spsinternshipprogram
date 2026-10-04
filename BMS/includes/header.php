<?php
$request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$base_url = $request_path === '/Mysites/BMS' || strpos($request_path, '/Mysites/BMS/') === 0
    ? '/Mysites/BMS'
    : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - SPS-BMS' : 'SPS-BMS'; ?></title>

    <script src="<?php echo $base_url; ?>/assets/js/velzon/layout.js"></script>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/velzon/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/velzon/app.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/velzon/custom.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/custom.css?v=20260922-3">
</head>

<body class="<?php echo isset($body_class) ? htmlspecialchars($body_class) : ''; ?>">

    <nav class="navbar navbar-expand-lg navbar-dark hr-topbar">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-semibold" href="<?php echo $base_url; ?>/index.php">SPS-BMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active"
                            href="<?php echo $base_url; ?>/modules/dashboard/index.php"><i class="fa fa-home"></i>
                            Home</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo $base_url; ?>/modules/employee_management/index.php"><i
                                class="fa fa-users"></i> HR</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-money"></i> Accounting</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-balance-scale"></i> Legal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-desktop"></i> IT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-cogs"></i> Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-graduation-cap"></i> Education</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-line-chart"></i> Sales</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-bullhorn"></i> Marketing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-flask"></i> Spinnlabs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-briefcase"></i> Jobcode</a></li>
                </ul>
                <span class="navbar-text text-white d-flex align-items-center gap-2">
                    <i class="fa fa-user-circle"></i>
                    <span>Welcome, Admin</span>
                </span>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4 page-shell">