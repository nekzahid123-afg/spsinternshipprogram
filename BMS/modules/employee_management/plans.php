<?php
$page_title = 'Planning Form';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$employee_name = trim((string) ($_GET['employee'] ?? 'Nek Zahid Khan'));
$employee_name = $employee_name !== '' ? $employee_name : 'Employee';
?>

<div class="container-fluid py-3 plans-page">
    <div class="plans-card">
        <div class="plans-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Planning Form of
                <?php echo htmlspecialchars($employee_name); ?></h4>
            <a class="btn btn-outline-secondary" href="<?php echo $base_url; ?>/modules/employee_management/index.php">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="table-responsive plans-table-wrap">
            <table class="table plans-table mb-0">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Year</th>
                        <th>Quarter</th>
                        <th>Plans</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024</td>
                        <td>Annual</td>
                        <td><a href="#" class="badge bg-primary plan-review">Review</a></td>
                        <td><span class="badge bg-primary">Initiated</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .plans-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .plans-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .plans-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 2.25rem 2rem 2rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .plans-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 600;
    }

    .plans-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .plans-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .plans-table {
        width: 100%;
        min-width: 760px;
        table-layout: fixed;
        text-align: center;
    }

    .plans-table th,
    .plans-table td {
        border-right: 1px solid #fff;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .plans-table th:last-child,
    .plans-table td:last-child {
        border-right: 0;
    }

    .plans-table thead th {
        padding: 0.55rem 0.75rem;
        background: #e9edf0;
        color: #64748b;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .plans-table tbody td {
        padding: 0.72rem 0.75rem;
        background: #fff;
        color: #64748b;
        font-size: 0.88rem;
    }

    .plans-table tbody tr:hover td {
        background: #f8fafc;
    }

    .plans-table .badge {
        border-radius: 3px;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 0.28rem 0.5rem;
        text-decoration: none;
    }

    .plan-review:hover {
        background: var(--primary-brand-dark, #4338ca) !important;
    }

    @media (max-width: 767.98px) {
        .plans-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.25rem 1rem;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>