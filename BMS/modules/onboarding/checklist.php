<?php
$page_title = 'OnBoarding Checklist';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$country = trim((string) ($_GET['country'] ?? 'PK'));
$country = $country !== '' ? $country : 'PK';

$checklist_sections = [
    'Employee Documents' => [
        'Resume',
        'Offer Letter',
        'Job Description',
        'SPS Employee Service Agreement',
        'Employee Confidential and Proprietary Information and Non-Disclosure Agreement',
        'Background check Consent Letter',
        'Personal Information Form',
        'Emergency Contact Form',
        'Direct Deposit Form',
        'Employees Latest Degree/Photographs and copy of CNIC',
        'Experience letter',
        'Email Configuration request to help desk',
        'Time-Live configuration request to Accounting',
        'BMS Email Configuration request to BMS-Dev',
        'Reference Check Report'
    ],
    'Orientation' => [
        'Email accounting for Time-Live Orientation',
        'Email IT department for IT orientation',
        '101 - SPS Overview',
        '110 - Working at SPS - Part One',
        '120 - Working at SPS - Part Two',
        '130 - Working at SPS - Part Three',
        '130-01 - Guidelines to Social Computing',
        '140 - Succeeding at SPS',
        'BMS Orientation',
        'Send SPS Orientation Feed back form'
    ],
    'Administrative' => [
        'Welcome to SPS Team! Email to PKFT',
        'Set up in TimeLive system',
        'Getting Started with SPS! Email to Employee',
        'Asset Management form',
        'Office Key Assigned (if applicable)',
        'Desk Key (if applicable)',
        'Access Card Assigned',
        'Background Check report',
        'Payroll Information Form',
        'SPS Corporate Credit Card',
        'Add in PKFT/PKPT groups',
        'Add in sharepoint',
        'Add in IBM Partner World',
        'Send On boarding Feedback form',
        'Update Employee data on HR server',
        'Files'
    ]
];
?>

<div class="container-fluid py-3 onboarding-page">
    <div class="onboarding-card">
        <div class="onboarding-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> OnBoarding Checklist for
                <?php echo htmlspecialchars($country); ?> Employee</h4>
        </div>

        <form method="post" action="">
            <div class="table-responsive onboarding-table-wrap">
                <table class="table onboarding-table mb-0">
                    <colgroup>
                        <col class="sr-column">
                        <col class="name-column">
                        <col class="radio-column">
                        <col class="radio-column">
                        <col class="notes-column">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Sr<br>No.</th>
                            <th>Name</th>
                            <th>Applicable</th>
                            <th>Not Applicable</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($checklist_sections as $section_name => $items): ?>
                            <tr class="section-divider">
                                <td colspan="5"><?php echo htmlspecialchars($section_name); ?></td>
                            </tr>
                            <?php foreach ($items as $index => $item):
                                $item_id = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $section_name . '-' . $index));
                                ?>
                                <tr>
                                    <td class="sr-cell"><?php echo $index + 1; ?></td>
                                    <td class="item-cell"><?php echo htmlspecialchars($item); ?></td>
                                    <td class="radio-cell">
                                        <input class="form-check-input" type="radio" name="checklist[<?php echo $item_id; ?>]"
                                            value="applicable"
                                            aria-label="Applicable for <?php echo htmlspecialchars($item); ?>">
                                    </td>
                                    <td class="radio-cell">
                                        <input class="form-check-input" type="radio" name="checklist[<?php echo $item_id; ?>]"
                                            value="not_applicable"
                                            aria-label="Not applicable for <?php echo htmlspecialchars($item); ?>">
                                    </td>
                                    <td class="notes-cell">
                                        <textarea class="form-control" name="notes[<?php echo $item_id; ?>]" rows="2"
                                            aria-label="Notes for <?php echo htmlspecialchars($item); ?>"></textarea>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary onboarding-save"><i class="fa fa-save"></i> Save
                Checklist</button>
        </form>
    </div>
</div>

<style>
    .onboarding-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .onboarding-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .onboarding-heading {
        padding: 1.5rem 1.75rem 0.8rem;
        background: #fff;
        border-bottom: 1px solid #e2e8f0;
    }

    .onboarding-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .onboarding-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .onboarding-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .onboarding-table {
        width: 100%;
        min-width: 1120px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        color: #123d68;
    }

    .onboarding-table .sr-column {
        width: 54px;
    }

    .onboarding-table .name-column {
        width: 370px;
    }

    .onboarding-table .radio-column {
        width: 96px;
    }

    .onboarding-table .notes-column {
        width: auto;
    }

    .onboarding-table th,
    .onboarding-table td {
        border-right: 1px solid #e4e7eb;
        border-bottom: 1px solid #e1e5e9;
    }

    .onboarding-table th:last-child,
    .onboarding-table td:last-child {
        border-right: 0;
    }

    .onboarding-table thead th {
        padding: 0.55rem 0.5rem;
        background: #e9edf0;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
        line-height: 1.25;
        text-align: left;
        vertical-align: middle;
    }

    .onboarding-table thead th:nth-child(3),
    .onboarding-table thead th:nth-child(4) {
        text-align: center;
    }

    .onboarding-table tbody td {
        min-height: 72px;
        padding: 0.38rem 0.6rem;
        background: #fff;
        font-size: 0.86rem;
        vertical-align: top;
    }

    .onboarding-table tbody tr:not(.section-divider):hover td {
        background: #f8fafc;
    }

    .section-divider td {
        padding: 0.42rem 0.6rem;
        background: #eef0fa !important;
        color: #4338ca;
        font-size: 0.9rem;
        font-weight: 700;
        text-align: center;
    }

    .sr-cell {
        color: #1f2937;
    }

    .item-cell {
        color: #123d68;
        line-height: 1.45;
    }

    .radio-cell {
        text-align: center;
        vertical-align: middle !important;
    }

    .radio-cell .form-check-input {
        width: 1rem;
        height: 1rem;
        margin: 0;
        cursor: pointer;
    }

    .notes-cell {
        padding: 0.25rem 0.4rem !important;
        vertical-align: middle !important;
    }

    .notes-cell .form-control {
        min-height: 58px;
        resize: vertical;
        border-color: #d1d5db;
        border-radius: 3px;
        background: #fff;
        font-size: 0.84rem;
    }

    .notes-cell .form-control:focus {
        border-color: rgba(79, 70, 229, 0.55);
        box-shadow: 0 0 0 0.15rem rgba(79, 70, 229, 0.12);
    }

    .onboarding-save {
        margin: 1rem 1.25rem 1.25rem;
    }

    @media (max-width: 767.98px) {
        .onboarding-heading {
            padding: 1.15rem 1rem 0.75rem;
        }

        .onboarding-table {
            min-width: 980px;
        }

        .onboarding-table .name-column {
            width: 300px;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>