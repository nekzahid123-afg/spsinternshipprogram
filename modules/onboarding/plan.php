<?php
$page_title = 'Onboarding Plan';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$country = trim((string) ($_GET['country'] ?? 'PK'));
$country = $country !== '' ? $country : 'PK';

$onboarding_rows = [
    ['task' => 'Role Enablement', 'sub_task' => '1. The hiring manager will create a role under roles and responsibilities in BMS. 2. Create a job under manage jobs and fill out the form.', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Job Analysis', 'sub_task' => '1. Send email to PKHR and discuss the position and HR will OPEN it on SPS Website. 2. HR will post the job on LinkedIn, Indeed, Website', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Resume Screening + Phone Screening', 'sub_task' => 'HR will resume and phone screen the potential candidates and share the report with the hiring manager', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Technical Interview', 'sub_task' => 'Hiring manager will short list the candidates and will share the final list with HR to schedule the technical interview.', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'Final Interview', 'sub_task' => 'Hiring manager and HR will do final interview and fill shortlist the candidates to hire.', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'Offer Letter', 'sub_task' => 'HR will prepare the offer letters and will send them to the shortlisted candidates via BMS.', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Offer letter Accepted/Rejected', 'sub_task' => 'Those who have accepted the offer we can send the agreement and other letters.', 'module' => 'Recruitment/Pre Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'Draft Official Documents', 'sub_task' => 'HR will draft and send the NDA, Consent Letter, SPS Agreement and send it to the candidates.', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Email to SPS IT for Offical email configuration', 'sub_task' => 'HR will send email to IT to configure the email address and Device', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Email Accounting for TimeLive', 'sub_task' => 'HR will send email to Accounting to configure the timelive', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Email BMS for BMS Enablement', 'sub_task' => 'HR will send email to BMS to configure the BMS Account', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'HR and BMS Orientation', 'sub_task' => 'HR will send an email to new hire for HR and BMS Orientation', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'IT Orientation', 'sub_task' => 'HR will send an email to IT for IT Orientation', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Accounting Orientation', 'sub_task' => 'Reporting Manager will give job codes to the new hire', 'module' => 'Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'Job Code', 'sub_task' => 'HR will send O365 Account + Timelive + BMS Account Credentials to new hire', 'module' => 'Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'Getting Started with SPS (Email)', 'sub_task' => 'HR will send an Welcome Email to PKFT Emplopyees', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Send Welcome Email', 'sub_task' => 'HR will send an email to Accounting for Accounting Orientation', 'module' => 'Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Candidate Return Back the Signed Document', 'sub_task' => 'HR will send back the counter signed docs to Candidate', 'module' => 'Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'HR Orientation', 'sub_task' => '<strong>Welcome to SPS</strong><br>if onsite then we can book a meeting room at NSTP and arrange a onboarding lunch.<br>if online then we can have a general welcome introduction<br><strong>SPS Org Chart</strong><br>AI, Cloud, Security, Events, SPL, Sales, OPS<br><strong>SPS Website Overview</strong><br>About SPS Services, Products, Verticals, Partners, SPL, Activities<br><strong>SPS Policies and Benefit Summary</strong><br>HR will explain SPS policies, benefit summary, and Employee Handbook to the new hire<br><strong>Learning &amp; Development</strong><br>KYC - Getting Started with SPS, Leading your team to success, Operations, Sales, Technical.<br>KYB - OPS, Technical and Sales<br>KYR - OPS, Technical and Sales<br>Partner Management<br><strong>Personal Success Plan</strong><br>Objectives and Key Results<br>Roles, Personal Mission, Professional Development, KPI1, KPI2, KPI3, KPI4', 'module' => 'Orientation', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'IT Orientation', 'sub_task' => 'Your Device Access, Office 365, Teams, Helpdesk', 'module' => 'Orientation', 'responsible' => 'Talha Kaleem'],
    ['task' => 'BMS Orientation', 'sub_task' => 'HR, Sales (Products, Services, Partners, Customers, Contacts,RFP) Markekting, Education and SPL', 'module' => 'Orientation', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Accounting Orientation', 'sub_task' => 'Compensation & Benefits, Job Codes, Time live, Claim Expenses', 'module' => 'Orientation', 'responsible' => 'Select Employee'],
    ['task' => 'Meeting with Reporting Manager', 'sub_task' => 'The New hire will meet the Reporting manager. HR will schedule the initial meeting after the Orientation sessions', 'module' => 'Orientation', 'responsible' => 'Select Employee'],
    ['task' => 'Orientation Feedback', 'sub_task' => 'HR will send the On Boarding and Orientation Feedback form to new hire', 'module' => 'Orientation', 'responsible' => 'Hasnain Zahid'],
    ['task' => 'Send the Data on HR Server and BMS', 'sub_task' => 'HR will save all the data under Legal BMS and HR Server', 'module' => 'Post Onboarding', 'responsible' => 'Hasnain Zahid'],
    ['task' => '15 Days Perfromace Review', 'sub_task' => 'HR and Hiring manager will do 15 Days perfromace Review', 'module' => 'Post Onboarding', 'responsible' => 'Select Employee'],
    ['task' => 'One Month Perfromace Review', 'sub_task' => 'HR and Hiring manager will do 1 month perfromace Review', 'module' => 'Post Onboarding', 'responsible' => 'Select Employee']
];

$module_spans = [
    'Recruitment/Pre Onboarding' => 7,
    'Onboarding' => 11,
    'Orientation' => 6,
    'Post Onboarding' => 3
];
$module_rendered = [];
?>

<div class="container-fluid py-3 onboarding-plan-page">
    <div class="onboarding-plan-card">
        <div class="onboarding-plan-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Onboarding Plan for
                <?php echo htmlspecialchars($country); ?> Employee</h4>
            <button type="button" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send Email</button>
        </div>

        <div class="table-responsive onboarding-plan-table-wrap">
            <table class="table onboarding-plan-table mb-0">
                <colgroup>
                    <col class="sr-column">
                    <col class="module-column">
                    <col class="task-column">
                    <col class="sub-task-column">
                    <col class="responsible-column">
                </colgroup>
                <thead>
                    <tr class="plan-section-header">
                        <th colspan="5">HR Onboarding</th>
                    </tr>
                    <tr>
                        <th>Sr No.</th>
                        <th>Module</th>
                        <th>Task</th>
                        <th>Sub Task</th>
                        <th>Responsible Party</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($onboarding_rows as $index => $row): ?>
                        <tr class="<?php echo $index < 7 ? 'recruitment-row' : 'onboarding-row'; ?>">
                            <td class="sr-cell"><?php echo $index + 1; ?></td>
                            <?php if (!isset($module_rendered[$row['module']])):
                                $module_rendered[$row['module']] = true; ?>
                                <td class="module-cell" rowspan="<?php echo $module_spans[$row['module']]; ?>">
                                    <?php echo htmlspecialchars($row['module']); ?>
                                    <span class="cell-actions">
                                        <a href="#" class="action-icon action-edit" title="Edit module"
                                            aria-label="Edit module"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="action-icon action-add" title="Add module" aria-label="Add module"><i
                                                class="fa fa-plus"></i></a>
                                        <a href="#" class="action-icon action-delete" title="Delete module"
                                            aria-label="Delete module"><i class="fa fa-trash"></i></a>
                                    </span>
                                </td>
                            <?php endif; ?>
                            <td class="task-cell">
                                <span><?php echo htmlspecialchars($row['task']); ?></span>
                                <span class="cell-actions">
                                    <a href="#" class="action-icon action-edit" title="Edit task" aria-label="Edit task"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="#" class="action-icon action-add" title="Add sub-task"
                                        aria-label="Add sub-task"><i class="fa fa-plus"></i></a>
                                    <a href="#" class="action-icon action-delete" title="Delete task"
                                        aria-label="Delete task"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                            <td class="sub-task-cell"><?php echo $row['sub_task']; ?>
                                <span class="sub-task-actions">
                                    <a href="#" class="action-icon action-edit" title="Edit sub-task"
                                        aria-label="Edit sub-task"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="action-icon action-delete" title="Delete sub-task"
                                        aria-label="Delete sub-task"><i class="fa fa-trash"></i></a>
                                </span>
                            </td>
                            <td class="responsible-cell">
                                <select class="form-select" name="responsible_party[]"
                                    aria-label="Responsible party for <?php echo htmlspecialchars($row['task']); ?>">
                                    <option<?php echo $row['responsible'] === 'Select Employee' ? ' selected' : ''; ?>>Select
                                        Employee</option>
                                        <option<?php echo $row['responsible'] === 'Hasnain Zahid' ? ' selected' : ''; ?>>
                                            Hasnain Zahid</option>
                                            <option<?php echo $row['responsible'] === 'Talha Kaleem' ? ' selected' : ''; ?>>
                                                Talha Kaleem</option>
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

<style>
    .onboarding-plan-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .onboarding-plan-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .onboarding-plan-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.5rem 1.75rem 0.8rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .onboarding-plan-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.45rem, 2.35vw, 2rem);
        font-weight: 500;
    }

    .onboarding-plan-heading .page-title .fa {
        color: #334155;
        margin-right: 0.4rem;
    }

    .onboarding-plan-table-wrap {
        overflow-x: auto;
        border: 0;
    }

    .onboarding-plan-table {
        width: 100%;
        min-width: 1450px;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        color: #123d68;
    }

    .onboarding-plan-table .sr-column {
        width: 72px;
    }

    .onboarding-plan-table .module-column {
        width: 370px;
    }

    .onboarding-plan-table .task-column {
        width: 370px;
    }

    .onboarding-plan-table .sub-task-column {
        width: auto;
    }

    .onboarding-plan-table .responsible-column {
        width: 215px;
    }

    .onboarding-plan-table th,
    .onboarding-plan-table td {
        border-right: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }

    .onboarding-plan-table th:last-child,
    .onboarding-plan-table td:last-child {
        border-right: 0;
    }

    .onboarding-plan-table thead th {
        padding: 0.55rem 0.5rem;
        background: #d9d9d9;
        color: #243447;
        font-size: 0.82rem;
        font-weight: 700;
        text-align: left;
        vertical-align: middle;
    }

    .onboarding-plan-table .plan-section-header th {
        padding: 0.45rem;
        background: #bfdbf4;
        text-align: center;
    }

    .onboarding-plan-table tbody td {
        padding: 0.48rem 0.6rem;
        font-size: 0.86rem;
        line-height: 1.55;
        vertical-align: top;
    }

    .onboarding-plan-table tbody .recruitment-row td {
        background: #ecfdf5;
    }

    .onboarding-plan-table tbody .onboarding-row td {
        background: #fef3e2;
    }

    .onboarding-plan-table tbody tr:hover td {
        filter: brightness(0.98);
    }

    .sr-cell {
        color: #1f2937;
    }

    .module-cell {
        vertical-align: middle !important;
        color: #123d68;
    }

    .task-cell,
    .sub-task-cell {
        color: #123d68;
    }

    .sub-task-cell strong {
        color: #102f4e;
    }

    .cell-actions,
    .sub-task-actions {
        display: inline-flex;
        align-items: center;
        gap: 0.15rem;
        margin-left: 0.25rem;
        white-space: nowrap;
    }

    .sub-task-actions {
        display: block;
        margin: 0.25rem 0 0;
    }

    .action-icon.action-add {
        background: #4f46e5;
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

    @media (max-width: 767.98px) {
        .onboarding-plan-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.15rem 1rem 0.75rem;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>