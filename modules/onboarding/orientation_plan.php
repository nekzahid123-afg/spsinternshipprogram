<?php
$page_title = 'Orientation Plan';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$country = trim((string) ($_GET['country'] ?? 'PK'));
$country = $country !== '' ? $country : 'PK';

$orientation_rows = [
    [
        'module' => 'HR Orientation',
        'content' => [
            ['label' => 'Welcome to SPS', 'text' => 'if onsite then we can book a meeting room at NSTP and arrange a onboarding lunch. if online then we can have a general welcome introduction SPS'],
            ['label' => 'Org Chart', 'text' => 'AI, Cloud, Security, Events, SPL, Sales, OPS'],
            ['label' => 'SPS Website Overview', 'text' => 'About SPS Services, Products, Verticals, Partners, SPL, Activities'],
            ['label' => 'SPS Policies and Benefit Summary', 'text' => 'HR will explain SPS policies, benefit summary, and Employee Handbook to the new hire']
        ],
        'day' => 'Monday',
        'date' => '2024-03-16',
        'duration' => '3 hours'
    ],
    [
        'module' => 'IT Orientation',
        'content' => [
            ['label' => '', 'text' => 'Your Device Access'],
            ['label' => '', 'text' => 'Office 365 account activation'],
            ['label' => '', 'text' => 'Teams account activation and policy'],
            ['label' => '', 'text' => 'Helpdesk Services']
        ],
        'day' => '',
        'date' => '',
        'duration' => ''
    ],
    [
        'module' => 'Accounting Orientation',
        'content' => [
            ['label' => '', 'text' => 'Compensation & Benefits'],
            ['label' => '', 'text' => 'Job Codes'],
            ['label' => '', 'text' => 'Time live'],
            ['label' => '', 'text' => 'Claim Expenses']
        ],
        'day' => '',
        'date' => '',
        'duration' => ''
    ],
    [
        'module' => 'BMS Orientation',
        'content' => [
            ['label' => '', 'text' => 'Sales (Products, Services, Partners, Customers, Contacts,RFP)'],
            ['label' => '', 'text' => 'Marketing'],
            ['label' => '', 'text' => 'Education'],
            ['label' => '', 'text' => 'Spinnlabs']
        ],
        'day' => '',
        'date' => '',
        'duration' => ''
    ],
    [
        'module' => 'Learning & Development',
        'content' => [
            ['label' => '', 'text' => 'KYC - Know Your Company'],
            ['label' => '', 'text' => 'KYB Know Your Business'],
            ['label' => '', 'text' => 'KYR - Know Your Role'],
            ['label' => '', 'text' => 'Partner Management']
        ],
        'day' => '1123',
        'date' => '',
        'duration' => ''
    ]
];
?>

<div class="container-fluid py-3 orientation-plan-page">
    <div class="orientation-plan-card">
        <div class="orientation-plan-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Orientation Plan for
                <?php echo htmlspecialchars($country); ?> Employee</h4>
            <button type="button" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send Email</button>
        </div>

        <div class="table-responsive orientation-plan-table-wrap">
            <table class="table orientation-plan-table mb-0">
                <colgroup>
                    <col class="sr-column">
                    <col class="module-column">
                    <col class="day-column">
                    <col class="date-column">
                    <col class="duration-column">
                    <col class="feedback-column">
                </colgroup>
                <thead>
                    <tr class="plan-section-header">
                        <th colspan="6">Orientation Plan</th>
                    </tr>
                    <tr>
                        <th>Sr No.</th>
                        <th>Training Module <a href="#" class="header-add-icon" title="Add training module"
                                aria-label="Add training module"><i class="fa fa-plus"></i></a></th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orientation_rows as $index => $row): ?>
                        <tr>
                            <td class="sr-cell"><?php echo $index + 1; ?></td>
                            <td class="module-cell">
                                <strong><?php echo htmlspecialchars($row['module']); ?></strong>
                                <div class="module-details">
                                    <?php foreach ($row['content'] as $content): ?>
                                        <?php if ($content['label'] !== ''): ?><span
                                                class="module-subheading"><?php echo htmlspecialchars($content['label']); ?></span><?php endif; ?>
                                        <span><?php echo htmlspecialchars($content['text']); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="module-actions">
                                    <a href="#" class="action-icon action-edit" title="Edit training module"
                                        aria-label="Edit training module"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="action-icon action-delete" title="Delete training module"
                                        aria-label="Delete training module"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                            <td class="field-cell">
                                <input type="text" class="form-control" name="day[]"
                                    value="<?php echo htmlspecialchars($row['day']); ?>"
                                    aria-label="Day for <?php echo htmlspecialchars($row['module']); ?>">
                            </td>
                            <td class="field-cell date-cell">
                                <div class="date-input-wrap">
                                    <input type="date" class="form-control" name="date[]"
                                        value="<?php echo htmlspecialchars($row['date']); ?>"
                                        aria-label="Date for <?php echo htmlspecialchars($row['module']); ?>">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </td>
                            <td class="field-cell">
                                <input type="text" class="form-control" name="duration[]"
                                    value="<?php echo htmlspecialchars($row['duration']); ?>"
                                    aria-label="Duration for <?php echo htmlspecialchars($row['module']); ?>">
                            </td>
                            <td class="feedback-cell">
                                <textarea class="form-control" name="feedback[]" rows="3"
                                    aria-label="Feedback for <?php echo htmlspecialchars($row['module']); ?>"></textarea>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .orientation-plan-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .orientation-plan-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .orientation-plan-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.5rem 1.75rem 0.8rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .orientation-plan-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .orientation-plan-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .orientation-plan-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .orientation-plan-table {
        width: 100%;
        min-width: 1500px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        color: #123d68;
    }

    .orientation-plan-table .sr-column {
        width: 72px;
    }

    .orientation-plan-table .module-column {
        width: 555px;
    }

    .orientation-plan-table .day-column {
        width: 275px;
    }

    .orientation-plan-table .date-column {
        width: 270px;
    }

    .orientation-plan-table .duration-column {
        width: 270px;
    }

    .orientation-plan-table .feedback-column {
        width: 390px;
    }

    .orientation-plan-table th,
    .orientation-plan-table td {
        border-right: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }

    .orientation-plan-table th:last-child,
    .orientation-plan-table td:last-child {
        border-right: 0;
    }

    .orientation-plan-table thead th {
        padding: 0.55rem 0.5rem;
        background: #d9e0e8;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
        text-align: left;
        vertical-align: middle;
    }

    .orientation-plan-table .plan-section-header th {
        padding: 0.45rem;
        background: #c9c9cc;
        text-align: center;
    }

    .orientation-plan-table tbody td {
        padding: 0.48rem 0.6rem;
        background: #eff6ff;
        font-size: 0.86rem;
        line-height: 1.55;
        vertical-align: top;
    }

    .orientation-plan-table tbody tr:hover td {
        background: #e5f0ff;
    }

    .sr-cell {
        color: #1f2937;
    }

    .module-cell {
        color: #123d68;
    }

    .module-cell strong {
        display: block;
        margin-bottom: 0.35rem;
        color: #102f4e;
    }

    .module-details>span {
        display: block;
    }

    .module-subheading {
        margin-top: 0.22rem;
        color: #123d68;
        text-decoration: underline;
    }

    .module-actions {
        margin-top: 0.45rem;
    }

    .module-actions .action-icon {
        margin-right: 0.2rem;
    }

    .header-add-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 22px;
        height: 22px;
        margin-left: 0.25rem;
        border-radius: 5px;
        background: var(--primary-brand, #4f46e5);
        color: #fff;
        text-decoration: none;
        font-size: 0.7rem;
    }

    .header-add-icon:hover {
        background: var(--primary-brand-dark, #4338ca);
        color: #fff;
    }

    .field-cell {
        vertical-align: top !important;
    }

    .field-cell .form-control,
    .feedback-cell .form-control {
        min-height: 38px;
        border-color: #d1d5db;
        border-radius: 3px;
        background: #fff;
        color: #334155;
        font-size: 0.84rem;
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
        color: #1f2937;
        pointer-events: none;
    }

    .feedback-cell .form-control {
        min-height: 76px;
        resize: vertical;
    }

    .field-cell .form-control:focus,
    .feedback-cell .form-control:focus {
        border-color: rgba(79, 70, 229, 0.55);
        box-shadow: 0 0 0 0.15rem rgba(79, 70, 229, 0.12);
    }

    @media (max-width: 767.98px) {
        .orientation-plan-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.15rem 1rem 0.75rem;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>