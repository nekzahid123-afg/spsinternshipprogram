<?php
$page_title = 'Offboarding Plan';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$country = trim((string) ($_GET['country'] ?? 'PK'));
$country = $country !== '' ? $country : 'PK';

$offboarding_rows = [
    [
        'task' => 'Resignation from Employee',
        'details' => [],
        'module' => ''
    ],
    [
        'task' => 'Completion of Notice Period',
        'details' => [],
        'module' => ''
    ],
    [
        'task' => 'Offboarding - Voluntary Termination',
        'details' => [],
        'module' => ''
    ],
    [
        'task' => 'Email to IT',
        'details' => [
            'Email to Helpdesk for ID Deconfiguration',
            'Disable IT Assets',
            'Remove from PKFT Groups',
            'Deactivate Servers and drive access',
            'IT Clearance'
        ],
        'module' => ''
    ],
    [
        'task' => 'Email to Accounting',
        'details' => [
            'To Deactivate TimeLive',
            'Check Insurance Policy/PTO Benefits/Loan etc',
            'Accounting Clearance'
        ],
        'module' => 'Offboarding - Voluntary Termination'
    ],
    [
        'task' => 'Email to BMS',
        'details' => [
            'Deactivate BMS Account',
            'Remove Employee from Org Chart >> Manage Employees',
            'HR will update reason of leaving in BMS'
        ],
        'module' => 'Offboarding - Voluntary Termination'
    ],
    [
        'task' => 'Partner Portal',
        'details' => [
            'Partner Manager will remove the ex-employees from all the partner portals (IBM, KnowB4, Kaspersky, Sophos etc..)'
        ],
        'module' => 'Offboarding - Voluntary Termination'
    ],
    [
        'task' => 'Final Documentation',
        'details' => [
            'HR will send Official Document to Employee',
            'HR will schedule Exit Interview with Employee and will draft a report and will send it to PKHR',
            'HR will update all the documents in BMS and HR Server'
        ],
        'module' => 'Offboarding - Voluntary Termination'
    ]
];

$offboarding_reasons = [
    'Career advancement',
    'Dissatisfaction with the job or workplace',
    'Work-life balance',
    'Personal reasons',
    'Dissatisfaction with compensation and benefits',
    'Lack of alignment with company culture or values',
    'Burnout or stress'
];
?>

<div class="container-fluid py-3 offboarding-page">
    <div class="offboarding-card">
        <div class="offboarding-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Offboarding Plan for
                <?php echo htmlspecialchars($country); ?> Employee
            </h4>
            <button type="button" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send Email</button>
        </div>

        <div class="table-responsive offboarding-table-wrap">
            <table class="table offboarding-table mb-0">
                <colgroup>
                    <col class="sr-column">
                    <col class="module-column">
                    <col class="task-column">
                    <col class="responsible-column">
                </colgroup>
                <thead>
                    <tr class="plan-section-header">
                        <th colspan="4">HR Offboarding</th>
                    </tr>
                    <tr>
                        <th>Sr No.</th>
                        <th>Module</th>
                        <th>Task</th>
                        <th>Responsible Party</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offboarding_rows as $index => $row): ?>
                        <tr>
                            <td class="sr-cell"><?php echo $index + 1; ?></td>
                            <?php if ($index === 0): ?>
                                <td class="module-cell" rowspan="4"></td>
                            <?php elseif ($index === 4): ?>
                                <td class="module-cell" rowspan="4">Offboarding - Voluntary Termination</td>
                            <?php endif; ?>

                            <td class="task-cell">
                                <strong><?php echo htmlspecialchars($row['task']); ?></strong>
                                <?php if ($index === 2): ?>
                                    <button type="button" class="btn btn-link reason-link" data-bs-toggle="modal"
                                        data-bs-target="#offboardingReasonsModal">Reasons</button>
                                <?php endif; ?>
                                <?php foreach ($row['details'] as $detail): ?>
                                    <span class="task-detail"><?php echo htmlspecialchars($detail); ?></span>
                                <?php endforeach; ?>
                                <span class="task-actions">
                                    <a href="#" class="action-icon action-edit" title="Edit" aria-label="Edit task"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="#" class="action-icon action-delete" title="Delete" aria-label="Delete task"><i
                                            class="fa fa-trash"></i></a>
                                </span>
                            </td>
                            <td class="responsible-cell">
                                <select class="form-select" name="responsible_party[]"
                                    aria-label="Responsible party for <?php echo htmlspecialchars($row['task']); ?>">
                                    <option selected>Select Employee</option>
                                    <option>Hasnain Zahid</option>
                                    <option>Hina Siddiqui</option>
                                    <option>Maryam Qureshi</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="offboardingReasonsModal" tabindex="-1" aria-labelledby="offboardingReasonsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content offboarding-reasons-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="offboardingReasonsModalLabel">Offboarding Reasons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive reasons-table-wrap">
                    <table class="table reasons-table mb-0">
                        <thead>
                            <tr>
                                <th class="reason-check-column"></th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($offboarding_reasons as $reason): ?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" name="reasons[]"
                                            value="<?php echo htmlspecialchars($reason); ?>"
                                            aria-label="<?php echo htmlspecialchars($reason); ?>"></td>
                                    <td><?php echo htmlspecialchars($reason); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .offboarding-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .offboarding-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .offboarding-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.5rem 1.75rem 0.8rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .offboarding-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .offboarding-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .offboarding-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .offboarding-table {
        width: 100%;
        min-width: 1120px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        color: #123d68;
    }

    .offboarding-table .sr-column {
        width: 72px;
    }

    .offboarding-table .module-column {
        width: 370px;
    }

    .offboarding-table .task-column {
        width: auto;
    }

    .offboarding-table .responsible-column {
        width: 215px;
    }

    .offboarding-table th,
    .offboarding-table td {
        border-right: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }

    .offboarding-table th:last-child,
    .offboarding-table td:last-child {
        border-right: 0;
    }

    .offboarding-table thead th {
        padding: 0.55rem 0.5rem;
        background: #d9d9d9;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
        text-align: left;
        vertical-align: middle;
    }

    .offboarding-table .plan-section-header th {
        padding: 0.45rem;
        background: #bfdbf4;
        color: #1e293b;
        text-align: center;
    }

    .offboarding-table tbody td {
        padding: 0.48rem 0.6rem;
        background: #ecfdf5;
        font-size: 0.86rem;
        vertical-align: top;
    }

    .offboarding-table tbody tr:hover td {
        background: #e2f8ec;
    }

    .sr-cell {
        color: #1f2937;
        vertical-align: top !important;
    }

    .sr-secondary {
        padding-top: 0.48rem !important;
    }

    .module-cell {
        vertical-align: middle !important;
        color: #123d68;
        font-size: 0.86rem;
    }

    .task-cell {
        color: #123d68;
        line-height: 1.55;
    }

    .task-cell strong {
        display: block;
        margin-bottom: 0.2rem;
        color: #102f4e;
    }

    .task-detail {
        display: block;
    }

    .task-actions {
        display: block;
        margin-top: 0.35rem;
    }

    .task-actions .action-icon {
        margin-right: 0.2rem;
    }

    .reason-link {
        padding: 0;
        margin-left: 0.3rem;
        color: var(--primary-brand, #4f46e5);
        font-size: 0.78rem;
        vertical-align: baseline;
    }

    .reason-link:hover {
        color: var(--primary-brand-dark, #4338ca);
    }

    .responsible-cell {
        vertical-align: top !important;
    }

    .responsible-cell .form-select {
        min-width: 180px;
        min-height: 38px;
        border-color: #d1d5db;
        border-radius: 3px;
        background-color: #fff;
        color: #334155;
        font-size: 0.84rem;
    }

    .responsible-cell .form-select:focus {
        border-color: rgba(79, 70, 229, 0.55);
        box-shadow: 0 0 0 0.15rem rgba(79, 70, 229, 0.12);
    }

    .offboarding-reasons-modal .modal-header {
        background: #3f9bbd;
        color: #fff;
        border-bottom: 0;
    }

    .offboarding-reasons-modal .modal-title {
        font-size: 1.25rem;
        font-weight: 500;
    }

    .offboarding-reasons-modal .btn-close {
        filter: brightness(0) invert(1);
    }

    .reasons-table-wrap {
        border-radius: 8px;
    }

    .reasons-table th,
    .reasons-table td {
        border-color: #dfe3e7;
        padding: 0.42rem 0.6rem;
        color: #123d68;
    }

    .reasons-table th {
        background: #e9edf0;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .reasons-table td:first-child,
    .reason-check-column {
        width: 50px;
        text-align: center;
    }

    .reasons-table tbody tr:nth-child(even) td {
        background: #fafafa;
    }

    .reasons-table .form-check-input {
        margin: 0;
        cursor: pointer;
    }

    @media (max-width: 767.98px) {
        .offboarding-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.15rem 1rem 0.75rem;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>