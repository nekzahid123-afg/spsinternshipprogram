<?php
$page_title = 'OnBoarding Steps';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$onboarding_steps = [
    'Write a Detailed Job Description',
    'Craft a Compelling Job Offer',
    'Create a Pre-Boardin Process',
    'Make a Good First Impression',
    "Establish You Organization' Culture an Values",
    'Introduc Your New Hir to the Team',
    'Plan a Trainig Schedule',
    'Set Expectations Around the Role and Performance',
    'Provide Ongoing Support and Feedback',
    'Re-Board When Necessary'
];
?>

<div class="container-fluid py-3 onboarding-steps-page">
    <div class="onboarding-steps-card">
        <div class="onboarding-steps-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> OnBoarding Steps for Employee</h4>
        </div>

        <form method="post" action="">
            <div class="table-responsive onboarding-steps-table-wrap">
                <table class="table onboarding-steps-table mb-0">
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
                            <th>Applied</th>
                            <th>Not Applied</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($onboarding_steps as $index => $step):
                            $step_id = 'onboarding-step-' . ($index + 1);
                            ?>
                            <tr>
                                <td class="sr-cell"><?php echo $index + 1; ?></td>
                                <td class="name-cell"><?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="radio-cell">
                                    <input class="form-check-input" type="radio" name="steps[<?php echo $step_id; ?>]"
                                        value="applied"
                                        aria-label="Applied for <?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                                <td class="radio-cell">
                                    <input class="form-check-input" type="radio" name="steps[<?php echo $step_id; ?>]"
                                        value="not_applied"
                                        aria-label="Not applied for <?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?>">
                                </td>
                                <td class="notes-cell">
                                    <textarea class="form-control" name="notes[<?php echo $step_id; ?>]" rows="3"
                                        aria-label="Notes for <?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?>"></textarea>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary onboarding-steps-save"><i class="fa fa-save"></i> Save</button>
        </form>
    </div>
</div>

<style>
    .onboarding-steps-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .onboarding-steps-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .onboarding-steps-heading {
        padding: 1.5rem 1.75rem 0.8rem;
        background: #fff;
        border-bottom: 1px solid #e2e8f0;
    }

    .onboarding-steps-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .onboarding-steps-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .onboarding-steps-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .onboarding-steps-table {
        width: 100%;
        min-width: 1120px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        color: #123d68;
    }

    .onboarding-steps-table .sr-column {
        width: 54px;
    }

    .onboarding-steps-table .name-column {
        width: 370px;
    }

    .onboarding-steps-table .radio-column {
        width: 96px;
    }

    .onboarding-steps-table .notes-column {
        width: auto;
    }

    .onboarding-steps-table th,
    .onboarding-steps-table td {
        border-right: 1px solid #e4e7eb;
        border-bottom: 1px solid #e1e5e9;
    }

    .onboarding-steps-table th:last-child,
    .onboarding-steps-table td:last-child {
        border-right: 0;
    }

    .onboarding-steps-table thead th {
        padding: 0.55rem 0.5rem;
        background: #e9edf0;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
        line-height: 1.25;
        text-align: left;
        vertical-align: middle;
    }

    .onboarding-steps-table thead th:nth-child(3),
    .onboarding-steps-table thead th:nth-child(4) {
        text-align: center;
    }

    .onboarding-steps-table tbody tr:nth-child(even) td {
        background: #f8fafc;
    }

    .onboarding-steps-table tbody tr:hover td {
        background: #f1f5ff;
    }

    .onboarding-steps-table tbody td {
        min-height: 84px;
        padding: 0.45rem 0.6rem;
        background: #fff;
        font-size: 0.86rem;
        vertical-align: top;
    }

    .sr-cell {
        color: #1f2937;
    }

    .name-cell {
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
        min-height: 72px;
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

    .onboarding-steps-save {
        margin: 1rem 1.25rem 1.25rem;
    }

    @media (max-width: 767.98px) {
        .onboarding-steps-heading {
            padding: 1.15rem 1rem 0.75rem;
        }

        .onboarding-steps-table {
            min-width: 980px;
        }

        .onboarding-steps-table .name-column {
            width: 300px;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>