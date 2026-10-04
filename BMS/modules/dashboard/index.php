<?php
session_start();

$page_title = 'Dashboard';
$body_class = 'dashboard-page';

$admin_name = 'Admin';
foreach (['admin_name', 'name', 'full_name', 'username', 'user_name'] as $key) {
    if (!empty($_SESSION[$key])) {
        $admin_name = $_SESSION[$key];
        break;
    }
}

require_once dirname(__DIR__, 2) . '/includes/header.php';
?>

<div class="container-fluid dashboard-page">
    <div class="dashboard-layout">
        <aside class="dashboard-sidebar sidebar" id="dashboardSidebar">
            <div class="sidebar-toggle-row">
                <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Collapse sidebar"
                    aria-expanded="true">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <nav class="sidebar-nav" aria-label="Dashboard navigation">
                <div class="sidebar-group divider">
                    <div class="sidebar-label section-label">Employee Management</div>
                    <a class="sidebar-link nav-link" href="../employee_management/index.php"><i
                            class="fa fa-users icon-chip"></i><span>HR
                            Listing</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/profile.php"><i
                            class="fa fa-user icon-chip"></i><span>My
                            Profile</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/employee_details.php"><i
                            class="fa fa-id-card icon-chip"></i><span>Employee Detail</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/certs.php"><i
                            class="fa fa-graduation-cap icon-chip"></i><span>Certifications</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/letters.php"><i
                            class="fa fa-file-text-o icon-chip"></i><span>Letters &amp; Documents</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/performance.php"><i
                            class="fa fa-line-chart icon-chip"></i><span>Performance Data</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/plans.php"><i
                            class="fa fa-columns icon-chip"></i><span>Planning Form</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/statement.php"><i
                            class="fa fa-file-text-o icon-chip"></i><span>Consultant Statement</span></a>
                </div>

                <div class="sidebar-group divider">
                    <div class="sidebar-label section-label">Communication</div>
                    <a class="sidebar-link nav-link" href="../employee_management/hr_talk.php"><i
                            class="fa fa-comments-o icon-chip"></i><span>HR Talk</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/blog.php"><i
                            class="fa fa-rss icon-chip"></i><span>Employee Blog</span></a>
                    <a class="sidebar-link nav-link" href="../employee_management/timelive.php"><i
                            class="fa fa-clock-o icon-chip"></i><span>TimeLive Blog</span></a>
                </div>

                <div class="sidebar-group">
                    <div class="sidebar-label section-label">Lifecycle</div>
                    <a class="sidebar-link nav-link" href="../onboarding/checklist.php"><i
                            class="fa fa-check-square-o icon-chip"></i><span>Onboarding Checklist</span></a>
                    <a class="sidebar-link nav-link" href="../onboarding/steps.php"><i
                            class="fa fa-list-ol icon-chip"></i><span>Onboarding
                            Steps</span></a>
                    <a class="sidebar-link nav-link" href="../onboarding/plan.php"><i
                            class="fa fa-list-alt icon-chip"></i><span>Onboarding
                            Plan</span></a>
                    <a class="sidebar-link nav-link" href="../onboarding/orientation_plan.php"><i
                            class="fa fa-calendar icon-chip"></i><span>Orientation Plan</span></a>
                    <a class="sidebar-link nav-link" href="../offboarding/checklist.php"><i
                            class="fa fa-sign-out icon-chip"></i><span>Offboarding Checklist</span></a>
                    <a class="sidebar-link nav-link" href="../offboarding/plan.php"><i
                            class="fa fa-list-alt icon-chip"></i><span>Offboarding Plan</span></a>
                </div>
            </nav>
        </aside>

        <main class="dashboard-main">
            <div class="dashboard-panel">
                <div class="dashboard-header">
                    <div class="dashboard-title-wrap">
                        <i class="fa fa-bars"></i>
                        <span>Welcome to BMS <?php echo htmlspecialchars($admin_name); ?></span>
                    </div>

                    <div class="dashboard-tabs-wrap">
                        <ul class="nav nav-tabs dashboard-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="roles-tab" data-bs-toggle="tab"
                                    data-bs-target="#roles-pane" type="button" role="tab" aria-controls="roles-pane"
                                    aria-selected="true">Roles</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="kpi-tab" data-bs-toggle="tab" data-bs-target="#kpi-pane"
                                    type="button" role="tab" aria-controls="kpi-pane" aria-selected="false">KPI</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="psp-tab" data-bs-toggle="tab" data-bs-target="#psp-pane"
                                    type="button" role="tab" aria-controls="psp-pane" aria-selected="false">PSP</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content dashboard-content">
                    <div class="tab-pane fade show active" id="roles-pane" role="tabpanel" aria-labelledby="roles-tab">
                        <div class="dashboard-goals-grid">
                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C1</span>
                                    <h5>Financial Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-money"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-globe"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>

                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C2</span>
                                    <h5>Customer Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-users"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-building"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>

                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C2</span>
                                    <h5>Partner Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-handshake-o"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-globe"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>

                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C2</span>
                                    <h5>Industry Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-industry"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-building"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>

                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C3</span>
                                    <h5>Competencies Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-certificate"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-globe"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>

                            <div class="dashboard-goal-card">
                                <div class="goal-head">
                                    <span class="goal-badge">C4</span>
                                    <h5>Team Leadership<br>Objectives</h5>
                                </div>
                                <div class="goal-icon"><i class="fa fa-users"></i></div>
                                <div class="goal-links">
                                    <a href="#"><i class="fa fa-building"></i> Corporate Goals</a>
                                    <a href="#"><i class="fa fa-user"></i> My Goals</a>
                                </div>
                                <div class="quarter-row">
                                    <span class="quarter-btn">Q1</span>
                                    <span class="quarter-btn">Q2</span>
                                    <span class="quarter-btn">Q3</span>
                                    <span class="quarter-btn">Q4</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kpi-pane" role="tabpanel" aria-labelledby="kpi-tab">
                        <div class="dashboard-empty-state">
                            <div class="empty-state-box">
                                <i class="fa fa-bar-chart"></i>
                                <p>KPI dashboard coming soon.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="psp-pane" role="tabpanel" aria-labelledby="psp-tab">
                        <div class="dashboard-empty-state">
                            <div class="empty-state-box">
                                <i class="fa fa-file-text"></i>
                                <p>PSP section coming soon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-footer-text">
                Software Productivity Strategists, Inc. © Copyright <?php echo date('Y'); ?> SPS. All rights reserved.
            </div>
        </main>
    </div>
</div>

<style>
    .dashboard-page {
        max-width: 1600px;
        margin: 0 auto;
        padding-top: 0;
        padding-bottom: 1rem;
    }

    .dashboard-layout {
        display: flex;
        align-items: stretch;
        min-height: calc(100vh - 125px);
        gap: 1rem;
    }

    .dashboard-sidebar {
        position: sticky;
        top: 1rem;
        flex: 0 0 240px;
        align-self: flex-start;
        min-height: calc(100vh - 125px);
        overflow: hidden;
        background: #EEF0FA;
        border-right: 1px solid #E2E8F0;
        border-radius: 8px;
        transition: flex-basis 0.2s ease;
    }

    .sidebar-toggle-row {
        display: flex;
        justify-content: flex-end;
        padding: 0.65rem 0.7rem;
        border-bottom: 1px solid #E2E8F0;
    }

    .sidebar-toggle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border: 0;
        border-radius: 6px;
        background: transparent;
        color: #4F46E5;
        font-size: 1rem;
    }

    .sidebar-toggle:hover,
    .sidebar-toggle:focus {
        background: #E0E7FF;
        color: #4338CA;
        outline: none;
    }

    .sidebar-nav {
        padding: 0.7rem 0.55rem 1rem;
    }

    .sidebar-group+.sidebar-group {
        margin-top: 1rem;
    }

    .sidebar-label {
        padding: 0 0.65rem 0.4rem;
        color: #64748B;
        font-size: 0.66rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        min-height: 36px;
        margin: 0.12rem 0;
        padding: 0.45rem 0.65rem;
        border-left: 3px solid transparent;
        border-radius: 0 6px 6px 0;
        color: #475569;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }

    .sidebar-link i {
        width: 1rem;
        color: #64748B;
        text-align: center;
    }

    .sidebar-link:hover,
    .sidebar-link:focus,
    .sidebar-link.active {
        background: #E0E7FF;
        border-left-color: #4F46E5;
        color: #4338CA;
        text-decoration: none;
        outline: none;
    }

    .sidebar-link:hover i,
    .sidebar-link:focus i,
    .sidebar-link.active i {
        color: #4F46E5;
    }

    .dashboard-main {
        flex: 1 1 auto;
        min-width: 0;
    }

    .dashboard-sidebar.is-collapsed {
        flex-basis: 58px;
    }

    .dashboard-sidebar.is-collapsed .sidebar-toggle-row {
        justify-content: center;
    }

    .dashboard-sidebar.is-collapsed .sidebar-label,
    .dashboard-sidebar.is-collapsed .sidebar-link span {
        display: none;
    }

    .dashboard-sidebar.is-collapsed .sidebar-link {
        justify-content: center;
        padding-left: 0.45rem;
        padding-right: 0.45rem;
    }

    .dashboard-panel {
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 0;
        overflow: hidden;
        min-height: 380px;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        padding: 0.7rem 1rem 0.5rem;
        background: #f5f5f5;
        border-bottom: 1px solid #dfe3ea;
    }

    .dashboard-title-wrap {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        color: #2b3a4a;
        font-weight: 700;
        font-size: 1.05rem;
    }

    .dashboard-title-wrap i {
        font-size: 0.9rem;
    }

    .dashboard-tabs {
        border-bottom: none;
        gap: 0.35rem;
        flex-wrap: wrap;
    }

    .dashboard-tabs .nav-link {
        border: 1px solid #dfe3ea;
        border-radius: 0;
        background: #f3f4f6;
        color: #475569;
        padding: 0.45rem 0.8rem;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .dashboard-tabs .nav-link.active {
        background: var(--bms-primary, #4F46E5);
        border-color: var(--bms-primary, #4F46E5);
        color: #fff;
    }

    .dashboard-content {
        padding: 1rem 0.8rem 0.9rem;
    }

    .dashboard-goals-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 0.75rem;
    }

    .dashboard-goal-card {
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 6px;
        padding: 0.7rem 0.6rem 0.6rem;
        min-height: 180px;
    }

    .goal-head {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        margin-bottom: 0.55rem;
    }

    .goal-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 22px;
        height: 22px;
        border-radius: 6px;
        background: #eaecef;
        color: #374151;
        font-size: 0.7rem;
        font-weight: 700;
    }

    .goal-head h5 {
        margin: 0;
        font-size: 0.78rem;
        line-height: 1.35;
        font-weight: 700;
        color: #1f2937;
    }

    .goal-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 7px;
        background: #f8fafc;
        color: #374151;
        font-size: 0.9rem;
        margin-bottom: 0.7rem;
    }

    .goal-links {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.4rem;
        margin-bottom: 0.75rem;
    }

    .goal-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.28rem;
        color: #374151;
        font-size: 0.7rem;
        font-weight: 600;
        text-decoration: none;
        padding: 0.25rem 0.1rem;
    }

    .goal-links a:hover {
        color: var(--bms-primary, #4F46E5);
        text-decoration: none;
    }

    .quarter-row {
        display: flex;
        gap: 0.3rem;
        flex-wrap: wrap;
    }

    .quarter-row span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 30px;
        padding: 0.26rem 0.35rem;
        border-radius: 999px;
        background: var(--bms-success, #10B981);
        color: #fff;
        font-size: 0.63rem;
        font-weight: 700;
        line-height: 1;
    }

    .dashboard-empty-state {
        min-height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #475569;
    }

    .empty-state-box {
        text-align: center;
    }

    .empty-state-box i {
        display: inline-block;
        font-size: 1.5rem;
        color: var(--bms-primary, #4F46E5);
        margin-bottom: 0.45rem;
    }

    .empty-state-box p {
        margin: 0;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .dashboard-footer-text {
        text-align: center;
        color: #6b7280;
        font-size: 0.95rem;
        padding: 1.2rem 1rem 0.3rem;
    }

    .site-footer {
        display: none !important;
    }

    @media (max-width: 1200px) {
        .dashboard-goals-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 991px) {
        .dashboard-goals-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 575px) {
        .dashboard-layout {
            display: block;
        }

        .dashboard-sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            bottom: 0;
            z-index: 1040;
            width: 240px;
            min-height: 0;
            border-radius: 0;
            box-shadow: 0 0.75rem 1.5rem rgba(15, 23, 42, 0.15);
            transform: translateX(-100%);
            transition: transform 0.2s ease;
        }

        .dashboard-sidebar.is-mobile-open {
            transform: translateX(0);
        }

        .dashboard-sidebar.is-collapsed {
            flex-basis: auto;
        }

        .dashboard-sidebar.is-collapsed .sidebar-label,
        .dashboard-sidebar.is-collapsed .sidebar-link span {
            display: block;
        }

        .dashboard-sidebar.is-collapsed .sidebar-link {
            justify-content: flex-start;
            padding-left: 0.65rem;
            padding-right: 0.65rem;
        }

        .dashboard-main {
            width: 100%;
        }

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .dashboard-goals-grid {
            grid-template-columns: 1fr;
        }

        .goal-links {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('dashboardSidebar');
        const toggle = document.getElementById('sidebarToggle');
        const mobileQuery = window.matchMedia('(max-width: 575px)');

        toggle.addEventListener('click', function () {
            if (mobileQuery.matches) {
                sidebar.classList.toggle('is-mobile-open');
                toggle.setAttribute('aria-expanded', String(sidebar.classList.contains('is-mobile-open')));
                toggle.setAttribute('aria-label', sidebar.classList.contains('is-mobile-open') ? 'Close sidebar' : 'Open sidebar');
            } else {
                sidebar.classList.toggle('is-collapsed');
                toggle.setAttribute('aria-expanded', String(!sidebar.classList.contains('is-collapsed')));
                toggle.setAttribute('aria-label', sidebar.classList.contains('is-collapsed') ? 'Expand sidebar' : 'Collapse sidebar');
            }
        });

        document.querySelectorAll('.sidebar-link').forEach(function (link) {
            link.addEventListener('click', function () {
                document.querySelectorAll('.sidebar-link').forEach(function (item) {
                    item.classList.remove('active');
                });
                link.classList.add('active');
                if (mobileQuery.matches) {
                    sidebar.classList.remove('is-mobile-open');
                }
            });
        });
    });
</script>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>