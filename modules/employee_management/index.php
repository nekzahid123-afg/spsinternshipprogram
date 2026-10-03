<?php
$page_title = 'Human Resource Management';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$hours_distribution_tree = [
    [
        'label' => 'Sales',
        'children' => [
            [
                'label' => 'Public Sector',
                'children' => [
                    ['label' => 'County Government'],
                    ['label' => 'SLED-VA'],
                    ['label' => 'SLED-MD'],
                    ['label' => 'IAM-RFPs'],
                    ['label' => 'Healthcare - Mid Atl'],
                    ['label' => 'Government'],
                    ['label' => 'Public Safety']
                ]
            ],
            [
                'label' => 'Commercial',
                'children' => [
                    ['label' => 'Commercial Accounts'],
                    ['label' => 'Strategic Accounts']
                ]
            ]
        ]
    ],
    [
        'label' => 'Technical',
        'children' => [
            [
                'label' => 'Technology',
                'children' => [
                    ['label' => 'Infrastructure'],
                    ['label' => 'Applications'],
                    ['label' => 'Security']
                ]
            ]
        ]
    ],
    [
        'label' => 'Operations',
        'children' => [
            [
                'label' => 'Delivery',
                'children' => [
                    ['label' => 'Client Delivery'],
                    ['label' => 'Quality Assurance']
                ]
            ]
        ]
    ],
    [
        'label' => 'Corporate',
        'children' => [
            [
                'label' => 'Administration',
                'children' => [
                    ['label' => 'Human Resources'],
                    ['label' => 'Finance']
                ]
            ]
        ]
    ]
];

$render_hours_tree = static function (array $nodes, int $depth = 0, string $parent_id = '') use (&$render_hours_tree): void {
    static $node_counter = 0;

    foreach ($nodes as $index => $node) {
        $node_counter++;
        $node_id = 'hours-node-' . $node_counter;
        $has_children = !empty($node['children']);
        $parent_class = $parent_id !== '' ? ' tree-child tree-parent-' . $parent_id : '';
        $indent = $depth * 20;
        ?>
        <tr class="hours-tree-row<?php echo $parent_class; ?>" <?php echo $parent_id !== '' ? ' hidden' : ''; ?>>
            <td>
                <div class="hours-tree-label" style="padding-left: <?php echo $indent; ?>px;">
                    <?php if ($has_children): ?>
                        <button type="button" class="hours-tree-toggle" data-tree-target="<?php echo $node_id; ?>"
                            aria-expanded="false" aria-label="Expand <?php echo htmlspecialchars($node['label']); ?>">
                            <i class="fa fa-plus"></i>
                        </button>
                    <?php else: ?>
                        <span class="hours-tree-spacer"></span>
                    <?php endif; ?>
                    <span><?php echo htmlspecialchars($node['label']); ?></span>
                </div>
            </td>
            <td>
                <?php if (!$has_children): ?>
                    <input type="number" class="form-control hours-input" min="0" step="0.25"
                        aria-label="Hours for <?php echo htmlspecialchars($node['label']); ?>">
                <?php endif; ?>
            </td>
        </tr>
        <?php if ($has_children): ?>
            <?php $render_hours_tree($node['children'], $depth + 1, $node_id); ?>
        <?php endif; ?>
    <?php
    }
};

$render_action_menu = static function (string $employee_name) use ($base_url): void {
    $employee_query = urlencode($employee_name);
    ?>
    <ul class="dropdown-menu action-dropdown-menu">
        <li><a class="dropdown-item" href="#hoursDistributionModal" data-bs-toggle="modal"><i
                    class="fa fa-clock-o"></i>Hours Distribution</a></li>
        <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/employee_management/hr_talk.php"><i
                    class="fa fa-comments-o"></i>HR Talk</a></li>
        <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/employee_management/blog.php"><i
                    class="fa fa-rss"></i>Blog</a></li>
        <li><a class="dropdown-item"
                href="<?php echo $base_url; ?>/modules/dashboard/index.php?employee=<?php echo $employee_query; ?>"><i
                    class="fa fa-user"></i>Dashboard</a></li>
        <li><a class="dropdown-item"
                href="<?php echo $base_url; ?>/modules/employee_management/profile.php?employee=<?php echo $employee_query; ?>"><i
                    class="fa fa-user"></i>Profile</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i>Experience Certificate</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i>Role and Responsibility</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i>Appointment Letter</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-comment-o"></i>Form-A</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-comment-o"></i>Form-B</a></li>
        <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/employee_management/certs.php"><i
                    class="fa fa-comment-o"></i>1 (Certs)</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>Active</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-bars"></i>Statement</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-columns"></i>Plans</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-line-chart"></i>Performance</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-info-circle"></i>Demand</a></li>
        <li><a class="dropdown-item"
                href="<?php echo $base_url; ?>/modules/employee_management/timelive.php?employee=<?php echo $employee_query; ?>"><i
                    class="fa fa-list-alt"></i>TimeLive</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-line-chart"></i>Weekly Performance</a></li>
        <li class="dropend">
            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-files-o"></i>Onboarding</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/onboarding/checklist.php">Checklist</a>
                </li>
            </ul>
        </li>
        <li class="dropend">
            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-files-o"></i>Offboarding</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/offboarding/checklist.php">Checklist</a>
                </li>
                <li><a class="dropdown-item" href="<?php echo $base_url; ?>/modules/offboarding/plan.php">Plan</a></li>
            </ul>
        </li>
    </ul>
    <?php
};
?>

<div class="container-fluid py-3">
    <div class="page-title-wrap">
        <h4 class="page-title"><i class="fa fa-list"></i> Human Resource Management</h4>
        <div class="toggle-links">
            <a href="#" class="active">Show All</a>
            <span>|</span>
            <a href="#">Active Only</a>
        </div>
    </div>

    <div class="card employee-card">
        <div class="card-body">
            <div class="filter-card-toolbar">
                <button type="button" class="btn btn-outline-primary filters-toggle" id="filtersToggle"
                    aria-expanded="false" aria-controls="employeeFilters">
                    <i class="fa fa-filter"></i> Filters
                </button>
                <div class="search-wrap">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search employees">
                </div>
            </div>

            <div class="filter-panel is-collapsed" id="employeeFilters">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Department">
                            <option selected>Select Department</option>
                            <option value="1">Engineering</option>
                            <option value="2">Finance</option>
                            <option value="3">Operations</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Group">
                            <option selected>Select Group</option>
                            <option value="1">Group A</option>
                            <option value="2">Group B</option>
                            <option value="3">Group C</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Practice">
                            <option selected>Select Practice</option>
                            <option value="1">Cloud</option>
                            <option value="2">Data</option>
                            <option value="3">Security</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Gender">
                            <option selected>Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Location">
                            <option selected>Select Location</option>
                            <option value="1">Lahore</option>
                            <option value="2">Karachi</option>
                            <option value="3">Islamabad</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Type of HR">
                            <option selected>Select Type of HR</option>
                            <option value="1">Technical</option>
                            <option value="2">General</option>
                            <option value="3">Executive</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <select class="form-select" aria-label="Select Work Status">
                            <option selected>Select Work Status</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                            <option value="3">Intern</option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-4">
                        <button type="button" class="btn btn-primary filter-button w-100"><i class="fa fa-filter"></i>
                            Show</button>
                    </div>
                </div>
            </div>

            <div class="row g-3 align-items-center mb-3">
                <div class="col-md-2">
                    <select class="form-select" aria-label="Year">
                        <option selected>Year</option>
                        <option value="1">2026</option>
                        <option value="2">2025</option>
                        <option value="3">2024</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Period">
                        <option selected>Annual</option>
                        <option value="1">Semi Annual</option>
                        <option value="2">Quarterly</option>
                    </select>
                </div>
                <div class="col-md-8 text-end">
                    <button type="button" class="btn btn-primary primary-action-btn"><i class="fa fa-paper-plane"></i>
                        Send Planning Form to Employees</button>
                </div>
            </div>

            <div class="toolbar-row">
                <div class="toolbar-left">
                    <button type="button" class="btn btn-outline-primary"><i class="fa fa-download"></i> Export
                        CSV</button>
                    <button type="button" class="btn btn-outline-success"><i class="fa fa-file-excel-o"></i> Export
                        Excel</button>
                </div>

            </div>

            <div class="active-filter-chips" id="activeFilterChips" aria-live="polite"></div>

            <ul class="nav nav-tabs employee-tabs" role="tablist" aria-label="Employee table views">
                <li class="nav-item"><button type="button" class="nav-link active employee-tab" data-view="overview"
                        role="tab" aria-selected="true">Overview</button></li>
                <li class="nav-item"><button type="button" class="nav-link employee-tab" data-view="organization"
                        role="tab" aria-selected="false">Organization</button></li>
                <li class="nav-item"><button type="button" class="nav-link employee-tab" data-view="contact" role="tab"
                        aria-selected="false">Contact
                        &amp; Access</button></li>
            </ul>

            <div class="table-responsive mt-3">
                <table class="table employee-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th data-group="always" class="select-column" style="width: 52px;"><input
                                    class="form-check-input" type="checkbox" aria-label="Select all"></th>
                            <th data-group="always" class="name-column">Name</th>
                            <th data-group="overview">Type</th>
                            <th data-group="overview">Job Status</th>
                            <th data-group="overview">Manager</th>
                            <th data-group="organization">Company</th>
                            <th data-group="organization">Team</th>
                            <th data-group="organization">Group</th>
                            <th data-group="organization">Practice</th>
                            <th data-group="organization">Location</th>
                            <th data-group="contact">Mobile No</th>
                            <th data-group="contact">Email</th>
                            <th data-group="contact">BMS Access</th>
                            <th data-group="contact">Staff</th>
                            <th data-group="overview">Status</th>
                            <th data-group="always">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Nek Zahid Khan</span></td>
                            <td>Permanent</td>
                            <td><span class="badge bg-success">Full time</span></td>
                            <td>Rida Qureshi</td>
                            <td>BMS</td>
                            <td>Operations</td>
                            <td>Group A</td>
                            <td>Cloud</td>
                            <td>Lahore</td>
                            <td>+923214755764</td>
                            <td>nekzahid123@gmail.com</td>
                            <td><span class="badge bg-success">Yes</span></td>
                            <td>Staff</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Nek Zahid Khan'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Usman Tariq</span></td>
                            <td>Contract</td>
                            <td><span class="badge bg-warning">Part time</span></td>
                            <td>Maryam Qureshi</td>
                            <td>BMS</td>
                            <td>Engineering</td>
                            <td>Group B</td>
                            <td>Security</td>
                            <td>Karachi</td>
                            <td>+92 321 7654321</td>
                            <td>usman.tariq@bms.com</td>
                            <td><span class="badge bg-danger">No</span></td>
                            <td>Senior</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Usman Tariq'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Zainab Ahmed</span></td>
                            <td>Permanent</td>
                            <td><span class="badge bg-success">Full time</span></td>
                            <td>Ali Raza</td>
                            <td>BMS</td>
                            <td>Support</td>
                            <td>Group C</td>
                            <td>Data</td>
                            <td>Islamabad</td>
                            <td>+92 333 9988776</td>
                            <td>zainab.ahmed@bms.com</td>
                            <td><span class="badge bg-success">Yes</span></td>
                            <td>Manager</td>
                            <td><span class="badge bg-warning">Dormant</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Zainab Ahmed'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Naveed Iqbal</span></td>
                            <td>Intern</td>
                            <td><span class="badge bg-warning">Intern</span></td>
                            <td>Hina Siddiqui</td>
                            <td>BMS</td>
                            <td>HR</td>
                            <td>Group A</td>
                            <td>Cloud</td>
                            <td>Multan</td>
                            <td>+92 312 4455667</td>
                            <td>naveed.iqbal@bms.com</td>
                            <td><span class="badge bg-danger">No</span></td>
                            <td>Junior</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Naveed Iqbal'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Hina Siddiqui</span></td>
                            <td>Permanent</td>
                            <td><span class="badge bg-success">Full time</span></td>
                            <td>Imran Khan</td>
                            <td>BMS</td>
                            <td>Finance</td>
                            <td>Group B</td>
                            <td>Data</td>
                            <td>Islamabad</td>
                            <td>+92 334 6677889</td>
                            <td>hina.siddiqui@bms.com</td>
                            <td><span class="badge bg-success">Yes</span></td>
                            <td>Lead</td>
                            <td><span class="badge bg-warning">Dormant</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Hina Siddiqui'); ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox" aria-label="Select row"></td>
                            <td><span class="employee-name">Imran Khan</span></td>
                            <td>Permanent</td>
                            <td><span class="badge bg-success">Full time</span></td>
                            <td>Hassan Ali</td>
                            <td>BMS</td>
                            <td>Engineering</td>
                            <td>Group C</td>
                            <td>Security</td>
                            <td>Karachi</td>
                            <td>+92 311 2233445</td>
                            <td>imran.khan@bms.com</td>
                            <td><span class="badge bg-success">Yes</span></td>
                            <td>Staff</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <div class="table-actions dropdown">
                                    <button class="btn action-menu dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="Action menu">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <?php $render_action_menu('Imran Khan'); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-footer">
                <div>Showing 1 to 6 of 57 entries</div>
                <div class="pagination-controls">
                    <button type="button" class="btn btn-light" disabled>Previous</button>
                    <button type="button" class="btn btn-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hoursDistributionModal" tabindex="-1" aria-labelledby="hoursDistributionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content hours-distribution-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="hoursDistributionModalLabel">Hours Distribution</h5>
                <button type="button" class="btn-close hours-modal-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="hours-tree-scroll">
                    <table class="table hours-tree-table mb-0">
                        <thead>
                            <tr>
                                <th>Department / Group / Practice</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $render_hours_tree($hours_distribution_tree); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .hours-distribution-modal {
        overflow: hidden;
        border: 0;
        border-radius: 6px;
    }

    .hours-distribution-modal .modal-header {
        min-height: 88px;
        padding: 1.2rem 1.25rem;
        background: var(--primary-brand, #4F46E5);
        color: #fff;
        border-bottom: 0;
    }

    .hours-distribution-modal .modal-title {
        font-size: 1.45rem;
        font-weight: 500;
    }

    .hours-modal-close {
        opacity: 1;
        filter: brightness(0) invert(1);
    }

    .hours-distribution-modal .modal-body {
        padding: 1.25rem;
        background: #fff;
    }

    .hours-tree-scroll {
        max-height: min(560px, calc(100vh - 260px));
        overflow: auto;
        padding: 0.8rem;
        border: 1px solid #dfe3ea;
        border-radius: 6px;
        background: linear-gradient(90deg, #fff 0, #f8fafc 50%, #fff 100%);
    }

    .hours-tree-table {
        min-width: 650px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
    }

    .hours-tree-table th,
    .hours-tree-table td {
        border-right: 1px solid #dfe3ea;
        border-bottom: 1px solid #dfe3ea;
    }

    .hours-tree-table th:last-child,
    .hours-tree-table td:last-child {
        border-right: 0;
    }

    .hours-tree-table th {
        padding: 0.45rem 0.5rem;
        background: #e2e8f0;
        color: #1f2937;
        font-size: 0.86rem;
        font-weight: 700;
    }

    .hours-tree-table th:first-child {
        width: 68%;
    }

    .hours-tree-table th:last-child {
        width: 32%;
    }

    .hours-tree-table td {
        height: 38px;
        padding: 0.25rem 0.5rem;
        background: #fff;
        color: #123d68;
        font-size: 0.86rem;
        vertical-align: middle;
    }

    .hours-tree-table tbody tr:nth-child(even) td {
        background: #f1f5f9;
    }

    .hours-tree-row[hidden] {
        display: none;
    }

    .hours-tree-label {
        display: flex;
        align-items: center;
        min-height: 30px;
        white-space: nowrap;
    }

    .hours-tree-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 18px;
        height: 18px;
        margin-right: 0.25rem;
        padding: 0;
        border: 0;
        background: transparent;
        color: var(--primary-brand, #4F46E5);
        font-size: 0.72rem;
    }

    .hours-tree-toggle:hover,
    .hours-tree-toggle:focus {
        color: var(--primary-brand-dark, #4338CA);
        outline: none;
    }

    .hours-tree-spacer {
        display: inline-block;
        width: 18px;
        margin-right: 0.25rem;
    }

    .hours-input {
        width: min(100%, 245px);
        min-height: 31px;
        border-color: #cbd5e1;
        border-radius: 4px;
        font-size: 0.84rem;
    }

    .hours-input:focus {
        border-color: rgba(79, 70, 229, 0.55);
        box-shadow: 0 0 0 0.15rem rgba(79, 70, 229, 0.12);
    }

    .hours-distribution-modal .modal-footer {
        justify-content: flex-end;
        padding: 0.75rem 1.25rem;
        background: #f5f5f5;
        border-top: 1px solid #dfe3ea;
    }

    .employee-tabs {
        margin-bottom: 0;
    }

    .employee-tab {
        white-space: nowrap;
    }

    .employee-tabs+.table-responsive.mt-3 {
        margin-top: 0.35rem !important;
    }

    .employee-table {
        min-width: 1450px;
        table-layout: auto;
    }

    .employee-table thead th {
        padding: 0.55rem 0.65rem;
        white-space: nowrap;
    }

    .employee-table thead th:nth-child(1) {
        min-width: 52px;
    }

    .employee-table thead th:nth-child(2) {
        min-width: 150px;
    }

    .employee-table thead th:nth-child(3) {
        min-width: 105px;
    }

    .employee-table thead th:nth-child(4) {
        min-width: 115px;
    }

    .employee-table thead th:nth-child(5) {
        min-width: 125px;
    }

    .employee-table thead th:nth-child(6) {
        min-width: 100px;
    }

    .employee-table thead th:nth-child(7) {
        min-width: 110px;
    }

    .employee-table thead th:nth-child(8) {
        min-width: 95px;
    }

    .employee-table thead th:nth-child(9) {
        min-width: 105px;
    }

    .employee-table thead th:nth-child(10) {
        min-width: 110px;
    }

    .employee-table thead th:nth-child(11) {
        min-width: 125px;
    }

    .employee-table thead th:nth-child(12) {
        min-width: 190px;
    }

    .employee-table thead th:nth-child(13) {
        min-width: 105px;
    }

    .employee-table thead th:nth-child(14) {
        min-width: 85px;
    }

    .employee-table thead th:nth-child(15) {
        min-width: 95px;
    }

    .employee-table thead th:nth-child(16) {
        min-width: 72px;
    }

    .employee-table tbody td {
        padding: 0.62rem 0.65rem;
        white-space: nowrap;
    }

    .employee-table thead th:nth-child(11),
    .employee-table tbody td:nth-child(11) {
        min-width: 125px;
    }

    .employee-table thead th:nth-child(12),
    .employee-table tbody td:nth-child(12) {
        min-width: 190px;
    }

    .employee-table thead th:nth-child(13),
    .employee-table tbody td:nth-child(13) {
        min-width: 105px;
    }

    .employee-table thead th:nth-child(14),
    .employee-table tbody td:nth-child(14) {
        min-width: 85px;
    }

    .employee-table thead th:nth-child(15),
    .employee-table tbody td:nth-child(15) {
        min-width: 95px;
    }

    .employee-table thead th:nth-child(16),
    .employee-table tbody td:nth-child(16) {
        min-width: 72px;
    }

    .employee-table .badge {
        white-space: nowrap;
    }

    .action-dropdown-menu {
        min-width: 250px;
        max-height: min(520px, calc(100vh - 32px));
        overflow-y: auto;
        padding: 0.2rem 0;
        border: 1px solid #334155;
        border-radius: 0.35rem;
        background: #fff;
        box-shadow: 0 0.5rem 1rem rgba(15, 23, 42, 0.14);
    }

    .action-dropdown-menu .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        min-height: 27px;
        padding: 0.24rem 0.65rem;
        color: #1f2937;
        font-size: 0.84rem;
        white-space: nowrap;
    }

    .action-dropdown-menu .dropdown-item i {
        width: 1rem;
        color: #111827;
        text-align: center;
    }

    .action-dropdown-menu .dropdown-item:hover,
    .action-dropdown-menu .dropdown-item:focus,
    .action-dropdown-menu .dropend.show>.dropdown-item {
        background: #F1F5F9;
        color: var(--primary-brand, #4F46E5);
    }

    .action-dropdown-menu .dropdown-item:hover i,
    .action-dropdown-menu .dropdown-item:focus i,
    .action-dropdown-menu .dropend.show>.dropdown-item i {
        color: var(--primary-brand, #4F46E5);
    }

    .action-dropdown-menu>.dropend {
        position: relative;
    }

    .action-dropdown-menu>.dropend>.dropdown-menu {
        top: -0.2rem;
        left: 100%;
        margin-top: 0;
        margin-left: 0.1rem;
        min-width: 150px;
        padding: 0.2rem 0;
        border: 1px solid #dfe3ea;
        border-radius: 0.35rem;
        background: #fff;
        box-shadow: 0 0.5rem 1rem rgba(15, 23, 42, 0.14);
    }

    .action-dropdown-menu>.dropend>.dropdown-menu.show {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterPanel = document.getElementById('employeeFilters');
        const filtersToggle = document.getElementById('filtersToggle');
        const filterChips = document.getElementById('activeFilterChips');
        const filterButton = document.querySelector('.filter-button');
        const filterSelects = Array.from(filterPanel.querySelectorAll('select'));
        const tabs = Array.from(document.querySelectorAll('.employee-tab'));
        const table = document.querySelector('.employee-table');
        const columnGroups = ['always', 'always', 'overview', 'overview', 'overview', 'organization', 'organization', 'organization', 'organization', 'organization', 'contact', 'contact', 'contact', 'contact', 'overview', 'always'];
        const views = {
            overview: ['Type', 'Job Status', 'Manager', 'Status'],
            organization: ['Company', 'Team', 'Group', 'Practice', 'Location'],
            contact: ['Mobile No', 'Email', 'BMS Access', 'Staff']
        };

        function collapseHoursBranch(nodeId) {
            document.querySelectorAll('.tree-parent-' + nodeId).forEach(function (row) {
                row.hidden = true;
                const childToggle = row.querySelector('.hours-tree-toggle');
                if (childToggle) {
                    childToggle.setAttribute('aria-expanded', 'false');
                    childToggle.setAttribute('aria-label', 'Expand ' + row.textContent.trim());
                    childToggle.innerHTML = '<i class="fa fa-plus"></i>';
                    collapseHoursBranch(childToggle.getAttribute('data-tree-target'));
                }
            });
        }

        document.querySelectorAll('.hours-tree-toggle').forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const targetId = toggle.getAttribute('data-tree-target');
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                const childRows = document.querySelectorAll('.tree-parent-' + targetId);

                toggle.setAttribute('aria-expanded', String(!isExpanded));
                toggle.setAttribute('aria-label', (isExpanded ? 'Expand ' : 'Collapse ') + toggle.parentElement.textContent.trim());
                toggle.innerHTML = '<i class="fa fa-' + (isExpanded ? 'plus' : 'minus') + '"></i>';

                childRows.forEach(function (row) {
                    row.hidden = isExpanded;
                });

                if (isExpanded) {
                    collapseHoursBranch(targetId);
                }
            });
        });

        document.querySelectorAll('.action-dropdown-menu .dropend > .dropdown-toggle').forEach(function (toggle) {
            toggle.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();

                const submenu = toggle.nextElementSibling;
                const menu = toggle.closest('.action-dropdown-menu');
                menu.querySelectorAll('.dropend > .dropdown-menu.show').forEach(function (openMenu) {
                    if (openMenu !== submenu) {
                        openMenu.classList.remove('show');
                        openMenu.parentElement.classList.remove('show');
                    }
                });

                submenu.classList.toggle('show');
                toggle.parentElement.classList.toggle('show', submenu.classList.contains('show'));
            });
        });

        document.querySelectorAll('.table-actions.dropdown').forEach(function (action) {
            action.addEventListener('hidden.bs.dropdown', function () {
                action.querySelectorAll('.dropend > .dropdown-menu.show').forEach(function (submenu) {
                    submenu.classList.remove('show');
                    submenu.parentElement.classList.remove('show');
                });
            });
        });

        filtersToggle.addEventListener('click', function () {
            const isCollapsed = filterPanel.classList.toggle('is-collapsed');
            filtersToggle.setAttribute('aria-expanded', String(!isCollapsed));
        });

        function renderFilterChips() {
            filterChips.innerHTML = '';
            filterSelects.forEach(function (select) {
                if (select.selectedIndex > 0 && select.value !== select.options[0].text) {
                    const chip = document.createElement('span');
                    chip.className = 'filter-chip';
                    chip.innerHTML = '<span>' + select.getAttribute('aria-label').replace('Select ', '') + ': ' + select.options[select.selectedIndex].text + '</span>';
                    const remove = document.createElement('button');
                    remove.type = 'button';
                    remove.className = 'filter-chip-remove';
                    remove.setAttribute('aria-label', 'Remove ' + select.getAttribute('aria-label') + ' filter');
                    remove.innerHTML = '<i class="fa fa-times"></i>';
                    remove.addEventListener('click', function () {
                        select.selectedIndex = 0;
                        renderFilterChips();
                    });
                    chip.appendChild(remove);
                    filterChips.appendChild(chip);
                }
            });
        }

        filterButton.addEventListener('click', function () {
            renderFilterChips();
            filterPanel.classList.add('is-collapsed');
            filtersToggle.setAttribute('aria-expanded', 'false');
        });

        function setColumnVisibility(viewName) {
            const headers = Array.from(table.querySelectorAll('thead th'));
            headers.forEach(function (header, index) {
                const group = header.getAttribute('data-group') || columnGroups[index];
                const show = group === 'always' || group === viewName;
                table.querySelectorAll('tr').forEach(function (row) {
                    if (row.children[index]) {
                        row.children[index].style.display = show ? '' : 'none';
                        row.children[index].setAttribute('data-group', group);
                    }
                });
            });
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (item) {
                    const active = item === tab;
                    item.classList.toggle('active', active);
                    item.setAttribute('aria-selected', String(active));
                });
                setColumnVisibility(tab.getAttribute('data-view'));
            });
        });

        setColumnVisibility('overview');
    });
</script>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>