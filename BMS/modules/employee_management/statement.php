<?php
$page_title = 'Consultant Statement';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$employee_name = trim((string) ($_GET['employee'] ?? 'Abdul Hameed'));
$employee_name = $employee_name !== '' ? $employee_name : 'Employee';
$location = trim((string) ($_GET['location'] ?? 'PK')) ?: 'PK';
$status = trim((string) ($_GET['status'] ?? 'Full Time')) ?: 'Full Time';

$empty_row = static function (int $columns): void {
    echo '<tr><td colspan="' . $columns . '" class="statement-empty">No Record Found</td></tr>';
};
?>

<div class="container-fluid py-3 statement-page">
    <div class="statement-card">
        <div class="statement-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Consultant Statement</h4>
            <div class="statement-actions">
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-outline-secondary"
                    href="<?php echo $base_url; ?>/modules/employee_management/index.php"><i
                        class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <div class="statement-content">
            <div class="statement-identity">
                <strong>Name: <a href="#"><?php echo htmlspecialchars($employee_name); ?></a></strong>
                <span>|</span>
                <strong>Location: <a href="#"><?php echo htmlspecialchars($location); ?></a></strong>
                <span>|</span>
                <strong>Status: <a href="#"><?php echo htmlspecialchars($status); ?></a></strong>
            </div>

            <form class="statement-filters" method="get" action="">
                <input type="hidden" name="employee" value="<?php echo htmlspecialchars($employee_name); ?>">
                <label for="statementYear">Year:</label>
                <select id="statementYear" class="form-select" name="year">
                    <option>Year</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
                <label for="statementQuarter">Quarter:</label>
                <select id="statementQuarter" class="form-select" name="quarter">
                    <option>Q2</option>
                    <option>Q1</option>
                    <option>Q3</option>
                    <option>Q4</option>
                </select>
                <label for="statementMonth">Month:</label>
                <select id="statementMonth" class="form-select" name="month">
                    <option>May</option>
                    <option>January</option>
                    <option>June</option>
                    <option>December</option>
                </select>
                <button type="submit" class="btn btn-primary">Show</button>
                <label class="validated-check"><input type="checkbox" name="validated"> Validated</label>
            </form>

            <div class="statement-columns">
                <main class="statement-left">
                    <section class="statement-section">
                        <h5>Gross Margin Contribution from Services Delivery:</h5>
                        <h6>Time &amp; Material SPS Services:</h6>
                        <div class="table-responsive statement-table-wrap">
                            <table class="table statement-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Client/Project/Job</th>
                                        <th>Hours</th>
                                        <th>Customer Rate</th>
                                        <th>Services Rate</th>
                                        <th>Revenue/Costs</th>
                                    </tr>
                                </thead>
                                <tbody><?php $empty_row(5); ?></tbody>
                            </table>
                        </div>
                        <h6>Firm Fixed SPS Services:</h6>
                        <div class="table-responsive statement-table-wrap">
                            <table class="table statement-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Client/Project/Job</th>
                                        <th>Total Hours Clocked</th>
                                        <th>Your Hours</th>
                                        <th>% Contribution Time</th>
                                        <th>Gross Margin Credit</th>
                                    </tr>
                                </thead>
                                <tbody><?php $empty_row(5); ?></tbody>
                            </table>
                        </div>
                    </section>

                    <section class="statement-section">
                        <h5>Gross Margin Contribution From Sales:</h5>
                        <div class="table-responsive statement-table-wrap">
                            <table class="table statement-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Client/Project/Job</th>
                                        <th>Revenue/Costs</th>
                                    </tr>
                                </thead>
                                <tbody><?php $empty_row(2); ?></tbody>
                            </table>
                        </div>
                    </section>

                    <div class="statement-total-row"><strong>Total Gross Margin
                            Contribution</strong><strong>0.00</strong></div>

                    <section class="statement-section cost-section">
                        <h5>Cost:</h5>
                        <h6>Individual Load:</h6>
                        <div class="table-responsive statement-table-wrap">
                            <table class="table statement-table mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Hours</th>
                                        <th>Individual rate</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>0</td>
                                        <td>1.02</td>
                                        <td>0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php foreach (['Travel', 'Training', 'Others'] as $cost_type): ?>
                            <h6><?php echo $cost_type; ?>:</h6>
                            <div class="table-responsive statement-table-wrap">
                                <table class="table statement-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Desc</th>
                                            <th>Expense</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php $empty_row(2); ?></tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                    </section>

                    <div class="statement-total-row"><strong>Total</strong><strong>0.00</strong></div>
                    <div class="statement-gross-margin"><strong>Gross Margin:</strong><strong>0.00</strong></div>
                </main>

                <aside class="statement-right">
                    <section class="bonus-card">
                        <h5>Project Owner Bonus</h5>
                        <div><strong>Total</strong><strong>0.00</strong><strong>0.00</strong></div>
                    </section>
                    <section class="bonus-card">
                        <h5>Project Owner Overhead</h5>
                        <div><strong>Total</strong><strong>0.00</strong><strong>0.00</strong></div>
                    </section>
                    <div class="bonus-total"><strong>Total bonus</strong><strong>0.00</strong><strong>0.00</strong>
                    </div>
                    <div class="multiplier-row"><span>* Conslutant Revenue Benifit
                            Multiplier</span><strong>1.00</strong></div>
                </aside>
            </div>
        </div>
    </div>
</div>

<style>
    .statement-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .statement-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .statement-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.5rem 1.75rem 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .statement-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .statement-heading .page-title .fa {
        margin-right: 0.4rem;
        color: #334155;
    }

    .statement-actions {
        display: flex;
        gap: 0.55rem;
    }

    .statement-content {
        padding: 0.85rem 1rem 1.25rem;
    }

    .statement-identity {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        padding: 0.8rem 0.7rem;
        color: #334155;
        font-size: 0.93rem;
    }

    .statement-identity a,
    .statement-section h5,
    .statement-section h6 {
        color: var(--primary-brand, #4f46e5);
    }

    .statement-identity a {
        text-decoration: none;
    }

    .statement-filters {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.45rem;
        padding: 0.55rem 0.7rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .statement-filters label {
        margin: 0;
        color: #334155;
        font-weight: 600;
        font-size: 0.84rem;
    }

    .statement-filters .form-select {
        width: 110px;
        min-height: 36px;
    }

    .validated-check {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        margin-left: 0.45rem !important;
    }

    .statement-columns {
        display: grid;
        grid-template-columns: minmax(0, 1.55fr) minmax(300px, 0.95fr);
        gap: 1rem;
        margin-top: 0.85rem;
        align-items: start;
    }

    .statement-left,
    .statement-right {
        min-width: 0;
    }

    .statement-section {
        margin-bottom: 0.8rem;
    }

    .statement-section h5,
    .statement-section h6 {
        margin: 0;
        padding: 0.5rem 0.65rem;
        font-weight: 700;
        text-decoration: underline;
    }

    .statement-section h5 {
        font-size: 1rem;
    }

    .statement-section h6 {
        font-size: 0.88rem;
    }

    .statement-table-wrap {
        border: 1px solid #e2e8f0;
        border-radius: 4px;
    }

    .statement-table {
        min-width: 600px;
        table-layout: fixed;
    }

    .statement-table th,
    .statement-table td {
        border-right: 1px solid #dfe3ea;
        border-bottom: 1px solid #dfe3ea;
        padding: 0.55rem 0.45rem;
        font-size: 0.78rem;
    }

    .statement-table th:last-child,
    .statement-table td:last-child {
        border-right: 0;
    }

    .statement-table th {
        background: #e9edf0;
        color: #243447;
        font-weight: 700;
        text-align: center;
    }

    .statement-table td {
        background: #fff;
        color: #334155;
    }

    .statement-table tbody tr:nth-child(even) td {
        background: #f8fafc;
    }

    .statement-table tbody tr:hover td {
        background: #f1f5ff;
    }

    .statement-empty {
        height: 62px;
        color: #64748b !important;
        font-style: italic;
        text-align: center;
    }

    .statement-total-row,
    .statement-gross-margin {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.7rem 0.65rem;
        border: 1px solid #dfe3ea;
        color: var(--primary-brand, #4f46e5);
    }

    .statement-gross-margin {
        margin-top: 0.9rem;
        font-size: 1.15rem;
    }

    .cost-section {
        margin-top: 1.3rem;
    }

    .bonus-card {
        margin-bottom: 0.55rem;
        border: 1px solid #dfe3ea;
        border-radius: 6px;
        overflow: hidden;
    }

    .bonus-card h5 {
        margin: 0;
        padding: 0.55rem 0.7rem;
        color: var(--primary-brand, #4f46e5);
        font-size: 1rem;
        font-weight: 700;
        text-decoration: underline;
    }

    .bonus-card>div,
    .bonus-total,
    .multiplier-row {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 90px 90px;
        gap: 0;
        border-top: 1px solid #dfe3ea;
    }

    .bonus-card>div>*,
    .bonus-total>*,
    .multiplier-row>* {
        padding: 0.62rem 0.55rem;
        border-right: 1px solid #dfe3ea;
        font-size: 0.82rem;
    }

    .bonus-card>div>*:last-child,
    .bonus-total>*:last-child {
        border-right: 0;
        text-align: right;
    }

    .bonus-card>div {
        background: #f1f1f1;
    }

    .bonus-total {
        border: 1px solid #dfe3ea;
        color: var(--primary-brand, #4f46e5);
    }

    .bonus-total>*:not(:first-child),
    .multiplier-row>*:last-child {
        text-align: right;
    }

    .multiplier-row {
        grid-template-columns: minmax(0, 1fr) 90px;
        border: 1px solid #dfe3ea;
        border-top: 0;
    }

    .multiplier-row span {
        font-size: 0.78rem;
    }

    @media (max-width: 900px) {
        .statement-columns {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {
        .statement-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.15rem 1rem 0.75rem;
        }

        .statement-filters {
            align-items: flex-start;
            flex-direction: column;
        }

        .statement-filters .form-select {
            width: 100%;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>