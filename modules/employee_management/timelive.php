<?php
$page_title = 'TimeLive Blog';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$employee_name = trim((string) ($_GET['employee'] ?? 'Nek Zahid Khan'));
$employee_name = $employee_name !== '' ? $employee_name : 'Employee';
?>

<div class="container-fluid py-3 timelive-page">
    <div class="timelive-heading">
        <h4 class="page-title"><i class="fa fa-clock-o"></i> <?php echo htmlspecialchars($employee_name); ?> TimeLive
            Blog</h4>
    </div>

    <form class="timelive-filter" method="get" action="">
        <input type="hidden" name="employee" value="<?php echo htmlspecialchars($employee_name); ?>">
        <div class="timelive-date-field">
            <label for="startDate">Start Date</label>
            <div class="date-input-wrap">
                <input id="startDate" class="form-control" type="date" name="start_date">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        <div class="timelive-date-field">
            <label for="endDate">End Date</label>
            <div class="date-input-wrap">
                <input id="endDate" class="form-control" type="date" name="end_date">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-primary timelive-show"><i class="fa fa-search"></i> Show</button>
    </form>

    <section class="timelive-section">
        <div class="timelive-section-heading">TimeLive Blog</div>
        <div class="timelive-section-body">
            <div class="datatable-toolbar">
                <label>Show
                    <select class="form-select form-select-sm" aria-label="Entries per page">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    entries
                </label>
                <label class="timelive-search">Search:
                    <input class="form-control form-control-sm" type="search" aria-label="Search TimeLive entries">
                </label>
            </div>

            <div class="table-responsive timelive-table-wrap">
                <table class="table timelive-table mb-0">
                    <thead>
                        <tr>
                            <th>Sr No. <i class="fa fa-sort"></i></th>
                            <th>Date <i class="fa fa-sort"></i></th>
                            <th>Client Name <i class="fa fa-sort"></i></th>
                            <th>Project Name <i class="fa fa-sort"></i></th>
                            <th>Task Name <i class="fa fa-sort"></i></th>
                            <th>Task Description <i class="fa fa-sort"></i></th>
                            <th>Hours <i class="fa fa-sort"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="timelive-empty">No data available in table</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="timelive-table-footer">
                <span>Showing 0 to 0 of 0 entries</span>
                <div class="timelive-pagination">
                    <button type="button" class="btn btn-light" disabled>Previous</button>
                    <button type="button" class="btn btn-light" disabled>Next</button>
                </div>
            </div>
        </div>
    </section>

    <section class="timelive-section">
        <div class="timelive-section-heading">Customer Blog</div>
        <div class="timelive-section-body timelive-placeholder"></div>
    </section>

    <section class="timelive-section">
        <div class="timelive-section-heading">Customer Contact Blog</div>
        <div class="timelive-section-body timelive-empty-section">No Record Found!</div>
    </section>

    <section class="timelive-section">
        <div class="timelive-section-heading">Partner Blog</div>
        <div class="timelive-section-body timelive-empty-section">No Record Found!</div>
    </section>
</div>

<style>
    .timelive-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .timelive-heading {
        padding: 1rem 1.1rem 0.65rem;
    }

    .timelive-heading .page-title {
        margin: 0;
        color: #334155;
        font-size: clamp(1.45rem, 2.3vw, 2rem);
        font-weight: 500;
    }

    .timelive-heading .page-title .fa {
        margin-right: 0.35rem;
        color: #64748b;
    }

    .timelive-filter {
        display: flex;
        align-items: flex-end;
        gap: 1rem;
        padding: 0.8rem 1.1rem 1rem;
    }

    .timelive-date-field {
        width: 240px;
    }

    .timelive-date-field label {
        display: block;
        margin-bottom: 0.35rem;
        color: #334155;
        font-size: 0.84rem;
        font-weight: 600;
    }

    .date-input-wrap {
        position: relative;
    }

    .date-input-wrap .form-control {
        padding-right: 2rem;
    }

    .date-input-wrap .fa-calendar {
        position: absolute;
        top: 50%;
        right: 0.65rem;
        transform: translateY(-50%);
        color: #64748b;
        pointer-events: none;
    }

    .timelive-show {
        min-width: 82px;
    }

    .timelive-section {
        margin: 0 0 1rem;
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .timelive-section-heading {
        padding: 0.72rem 1rem;
        background: var(--primary-brand, #4f46e5);
        color: #fff;
        font-size: 1rem;
        font-weight: 600;
    }

    .timelive-section-body {
        padding: 0.85rem 1rem 0.75rem;
    }

    .datatable-toolbar,
    .timelive-table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        color: #64748b;
        font-size: 0.82rem;
    }

    .datatable-toolbar {
        margin-bottom: 0.75rem;
    }

    .datatable-toolbar label {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        margin: 0;
    }

    .datatable-toolbar .form-select {
        width: 68px;
    }

    .timelive-search .form-control {
        width: 190px;
        margin-left: 0.25rem;
    }

    .timelive-table-wrap {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
    }

    .timelive-table {
        min-width: 1050px;
        table-layout: fixed;
    }

    .timelive-table th,
    .timelive-table td {
        border-right: 1px solid #e2e8f0;
    }

    .timelive-table th:last-child,
    .timelive-table td:last-child {
        border-right: 0;
    }

    .timelive-table th {
        padding: 0.65rem 0.55rem;
        background: #f1f5f9;
        color: #334155;
        font-size: 0.78rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .timelive-table th i {
        float: right;
        color: #94a3b8;
        font-size: 0.72rem;
    }

    .timelive-table td {
        padding: 1.1rem 0.65rem;
        color: #64748b;
        font-size: 0.84rem;
    }

    .timelive-table tbody tr:hover td {
        background: #f8fafc;
    }

    .timelive-empty {
        height: 140px;
        color: #64748b !important;
        text-align: center;
    }

    .timelive-table-footer {
        padding-top: 0.75rem;
    }

    .timelive-pagination {
        display: flex;
        gap: 0.35rem;
    }

    .timelive-pagination .btn {
        border: 1px solid #dfe3ea;
        color: #94a3b8;
        font-size: 0.78rem;
    }

    .timelive-placeholder {
        min-height: 100px;
    }

    .timelive-empty-section {
        min-height: 105px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 0.9rem;
    }

    @media (max-width: 767.98px) {
        .timelive-filter {
            align-items: stretch;
            flex-direction: column;
        }

        .timelive-date-field {
            width: 100%;
        }

        .datatable-toolbar,
        .timelive-table-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>