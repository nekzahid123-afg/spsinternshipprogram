<?php
$page_title = 'Employee Detail';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$text_field = static function (string $label, string $value = '', string $type = 'text'): void {
    echo '<div class="detail-field"><label>' . htmlspecialchars($label) . '</label><input type="' . $type . '" class="form-control" value="' . htmlspecialchars($value) . '"></div>';
};
$select_field = static function (string $label, array $options = ['Select']): void {
    echo '<div class="detail-field"><label>' . htmlspecialchars($label) . '</label><select class="form-select">';
    foreach ($options as $option)
        echo '<option>' . htmlspecialchars($option) . '</option>';
    echo '</select></div>';
};
$file_field = static function (string $label, string $accept = ''): void {
    echo '<div class="detail-field"><label>' . htmlspecialchars($label) . '</label><input type="file" class="form-control" accept="' . htmlspecialchars($accept) . '"></div>';
};
$table = static function (array $headers, string $message = 'No records available'): string {
    $markup = '<div class="table-responsive"><table class="table detail-table"><thead><tr>';
    foreach ($headers as $header)
        $markup .= '<th>' . htmlspecialchars($header) . '</th>';
    $markup .= '</tr></thead><tbody><tr>';
    foreach ($headers as $index => $header) {
        $value = '-';
        if (in_array($header, ['Sr', 'Sr#', 'Sr No.'], true)) {
            $value = '1';
        } elseif ($header === 'Action') {
            $value = '<a href="#" class="action-icon action-view" title="View"><i class="fa fa-eye"></i></a><a href="#" class="action-icon action-edit" title="Edit"><i class="fa fa-pencil"></i></a>';
        } elseif (in_array($header, ['Name', 'Title', 'Course Name', 'Vendor Name', 'Product Name', 'Service Name', 'Customer Name', 'Partner Name'], true)) {
            $value = 'Generic ' . $header;
        } elseif (in_array($header, ['Role', 'Level Title', 'Department', 'Group', 'Practice', 'Product', 'Vendor', 'Job Title', 'Corp. Role', 'Dept. Role', 'Func. Role'], true)) {
            $value = 'Sample ' . $header;
        } elseif (in_array($header, ['Training Taken', 'Test Taken'], true)) {
            $value = 'Yes';
        } elseif ($header === 'Date' || $header === 'Completed On' || $header === 'Start Date' || $header === 'End Date') {
            $value = '2026-01-15';
        } elseif ($header === 'Attach') {
            $value = 'View';
        } elseif (in_array($header, ['Speaking', 'Writing', 'Listening'], true)) {
            $value = 'Good';
        } elseif (in_array($header, ['KPI Target', 'KPI Actual', 'Bonus Target', 'Bonus Actual', '% Multiplier', 'Practice Multiplier'], true)) {
            $value = '100%';
        } elseif ($header === 'Plan') {
            $value = 'Standard';
        } elseif ($header === 'Duration') {
            $value = '1 year';
        }
        $markup .= '<td>' . $value . '</td>';
    }
    return $markup . '</tr></tbody></table></div>';
};
$accordion = static function (string $id, string $title, string $body, bool $open = false, string $parent = ''): void {
    $collapse_ids = [
        'learning-development' => 'collapseLearning',
        'attachments' => 'collapseAttachments',
        'communication-skills' => 'collapseCommSkills',
        'certifications' => 'collapseCertifications',
        'badges' => 'collapseBadges',
        'loaded-cost' => 'collapseLoadedCost'
    ];
    $collapse_id = $collapse_ids[$id] ?? 'collapse' . str_replace(' ', '', ucwords(str_replace('-', ' ', $id)));
    $parent_attribute = $parent !== '' ? ' data-bs-parent="#' . $parent . '"' : '';
    echo '<div class="accordion-item"><h2 class="accordion-header" id="heading-' . $collapse_id . '"><button class="accordion-button' . ($open ? '' : ' collapsed') . ' section-accordion-btn" type="button" data-bs-toggle="collapse" data-bs-target="#' . $collapse_id . '" aria-expanded="' . ($open ? 'true' : 'false') . '" aria-controls="' . $collapse_id . '">' . $title . '</button></h2><div id="' . $collapse_id . '" class="accordion-collapse collapse' . ($open ? ' show' : '') . '" aria-labelledby="heading-' . $collapse_id . '"' . $parent_attribute . '><div class="accordion-body">' . $body . '</div></div></div>';
};
?>
<main class="container-fluid py-3 detail-page">
    <div class="detail-heading">
        <div>
            <div class="detail-breadcrumb"><a href="<?php echo $base_url; ?>/index.php">Home</a><i
                    class="fa fa-angle-right"></i><a
                    href="<?php echo $base_url; ?>/modules/employee_management/index.php">HR</a><i
                    class="fa fa-angle-right"></i><span>Employee Detail</span></div>
            <h1 class="page-title"><i class="fa fa-list-alt"></i> Employee Detail</h1>
        </div>
        <a class="btn btn-light detail-back" href="<?php echo $base_url; ?>/modules/employee_management/index.php"><i
                class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="row g-4 detail-columns">
        <div class="col-xl-5">
            <section class="card detail-section">
                <div class="detail-section-header">Employee:</div>
                <div class="card-body detail-section-body">
                    <ul class="nav nav-tabs detail-form-tabs" role="tablist">
                        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#personal-info" type="button">Personal Info</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#contact-info" type="button">Contact</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#organization-info" type="button">Organization</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#documents-info" type="button">Documents</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#guardian-education-info" type="button">Guardian &amp;
                                Education</button></li>
                        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#supervisor-info" type="button">Supervisor</button></li>
                    </ul>
                    <div class="tab-content detail-form-tab-content">
                        <div class="tab-pane fade show active" id="personal-info">
                            <div class="detail-form-grid">
                                <?php $text_field('Name');
                                $select_field('Type', ['Select', 'Permanent', 'Contract', 'Intern']);
                                $select_field('Work Status', ['Select', 'Full time', 'Part time', 'Intern']);
                                $text_field('Email', '', 'email');
                                $text_field('Personal Email', '', 'email');
                                $text_field('Employee CNIC');
                                $select_field('Gender', ['Select', 'Male', 'Female', 'Other']);
                                $text_field('Date of Birth', '', 'date'); ?>
                                <div class="detail-field detail-field-wide"><label>Residential address</label><textarea
                                        class="form-control" rows="2"></textarea></div>
                                <?php $select_field('Job Title', ['Select Job Title']);
                                $text_field('Business Area');
                                $text_field('LinkedIn Url', '', 'url'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-info">
                            <div class="detail-form-grid">
                                <?php $text_field('Office No');
                                $text_field('Mobile No');
                                $text_field('Emergency No');
                                $text_field('Home No');
                                $select_field('Location', ['Select Location']);
                                $select_field('Office Location', ['Select Office Location']); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="organization-info">
                            <div class="detail-form-grid">
                                <?php $select_field('Department', ['Select Department']);
                                $select_field('Group', ['Select Group']);
                                $select_field('Practice', ['Select Practice']);
                                $select_field('Hire Source', ['Select hire source']);
                                $select_field('Company', ['Select -']); ?>
                                <div class="detail-field detail-check-field"><label>SPS Corporate</label><input
                                        type="checkbox" class="form-check-input"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="documents-info">
                            <div class="detail-form-grid">
                                <?php $file_field('Employee Picture', 'image/*');
                                $select_field('Educational Level', ['Select Educational Level']);
                                $file_field('Upload Degree', '.doc,.docx,.pdf');
                                $select_field('Field of Studies', ['Select Field of Studies']);
                                $file_field('CNIC Front Picture', 'image/*');
                                $file_field('CNIC Back Picture', 'image/*');
                                $file_field('Upload Resume', '.doc,.docx,.pdf'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="guardian-education-info">
                            <div class="detail-form-grid">
                                <?php $text_field('Parent/Guardian Name');
                                $text_field('Parent/Guardian Contact'); ?>
                                <div class="detail-field detail-field-wide"><label>Parent/Guardian
                                        Address</label><textarea class="form-control" rows="2"></textarea></div>
                                <?php $text_field('University');
                                $text_field('Field of Study');
                                $text_field('Passing Year');
                                $text_field('Course');
                                $text_field('Grade/GPA'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="supervisor-info">
                            <div class="detail-form-grid">
                                <?php $select_field('Name', ['Select Supervisor']);
                                $text_field('Email', '', 'email'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <button type="button" class="btn btn-primary detail-save"><i class="fa fa-save"></i> Save Employee
                Details</button>

            <div class="accordion detail-accordion" id="leftAccordion">
                <?php
                $accordion('learning-development', 'Learning and Development:', '<div class="detail-card-body">' . $table(['Sr', 'Course Name', 'Training Taken', 'Test Taken']) . '</div>', false, 'leftAccordion');
                $accordion('attachments', 'Attachments: <a class="detail-add-link" href="#"><i class="fa fa-plus"></i> Add New</a>', '<div class="detail-card-body">' . $table(['Sr', 'Title']) . '</div>', false, 'leftAccordion');
                $accordion('communication-skills', 'Communication Skills: <a class="detail-add-link" href="#"><i class="fa fa-plus"></i> Add New</a>', '<div class="detail-card-body">' . $table(['Sr', 'Added By', 'Speaking', 'Writing', 'Listening', 'Date', 'Action']) . '</div>', false, 'leftAccordion');
                $accordion('certifications', 'Employee Certifications <a class="detail-add-link" href="#"><i class="fa fa-plus"></i> Add Certification</a>', '<div class="detail-card-body">' . $table(['Sr', 'Vendor', 'Group', 'Practice', 'Product', 'Title', 'Code', 'URL', 'Type', 'Completed On']) . '</div>', false, 'leftAccordion');
                $accordion('badges', 'Employee Badges <a class="detail-add-link" href="#"><i class="fa fa-plus"></i> Add Badge</a>', '<div class="detail-card-body">' . $table(['Sr', 'Vendor', 'Group', 'Practice', 'Product', 'Title', 'URL', 'Completed On']) . '</div>', false, 'leftAccordion');
                $loaded_cost = '<div class="loaded-filters"><div><strong>Name:</strong><input class="form-control" type="text"></div><div><strong>Location:</strong><select class="form-select"><option>Select Location</option></select></div><button class="btn btn-outline-primary" type="button" title="Refresh"><i class="fa fa-refresh"></i></button></div><div class="loaded-rate-panel"><p class="loaded-note">* All Inputs are based on Annual Values</p><h3>Loaded Rate:</h3><div class="rate-grid"><label>Base Hourly Rate:</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" value="0" type="number"></div><label>+ Individual Load:</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" value="0.00" type="number"></div><label>Practice Load:</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" value="0.00" type="number"></div><label>Loaded Rate:</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" value="0.00" type="number" readonly></div><label>Loaded Rate (Last Year):</label><div class="input-group"><span class="input-group-text">$</span><input class="form-control" value="0.00" type="number" readonly></div></div><button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update Loaded Rate</button></div>';
                $accordion('loaded-cost', 'Employee Loaded Cost (Q1 - 2026)', $loaded_cost, false, 'leftAccordion');
                ?>
            </div>
        </div>

        <div class="col-xl-7">
            <section class="card detail-section job-title-panel">
                <div class="detail-section-header">Job Title:</div>
                <div class="card-body detail-section-body">
                    <h2><span class="status-pill">No job title found.</span></h2>
                </div>
            </section>
            <div class="accordion detail-accordion" id="rightAccordion">
                <?php
                $corporate_roles = '<div class="table-responsive"><table class="table detail-table"><thead><tr><th>Role</th><th>Level</th><th>Level Title</th><th>Rank</th><th>Action</th></tr></thead><tbody><tr><td><a href="#" class="detail-table-link">Developer</a></td><td>2</td><td>Associate</td><td>-</td><td><a href="#" class="action-icon action-view" title="View"><i class="fa fa-eye"></i></a><a href="#" class="action-icon action-edit" title="Edit"><i class="fa fa-pencil"></i></a><a href="#" class="action-icon action-edit" title="Report"><i class="fa fa-file-text-o"></i></a><a href="#" class="action-icon action-delete" title="Delete"><i class="fa fa-trash"></i></a></td></tr></tbody></table></div>';
                $accordion('corporate-roles', 'Corporate Roles:', $corporate_roles, true, 'rightAccordion');
                $accordion('departmental-roles', 'Departmental Roles: <a class="icon-add-btn" href="#" title="Add"><i class="fa fa-plus"></i></a>', '<div class="detail-card-body">' . $table(['Role', 'Level', 'Level Title', 'Rank', 'Action']) . '</div>', false, 'rightAccordion');
                $accordion('employment-history', 'Employment History: <a class="icon-add-btn" href="#" title="Add"><i class="fa fa-plus"></i></a>', '<div class="detail-card-body">' . $table(['Sr#', 'Start Date', 'End Date', 'Job Title', 'Corp. Role', 'Dept. Role', 'Func. Role', 'Duration', 'Attach', 'Action']) . '</div>', false, 'rightAccordion');
                $attributes = '<div class="attribute-stack"><div class="attribute-block"><div class="subsection-heading">Customer: <a class="icon-add-btn" href="#" title="Add"><i class="fa fa-plus"></i></a></div><div class="table-responsive"><table class="table detail-table"><thead><tr><th>ID</th><th>Name</th><th>Action</th></tr></thead><tbody><tr><td>1</td><td>Al-Arabia Sugar Mills Limited (AASML)</td><td><a href="#" class="detail-table-link">Edit</a></td></tr><tr><td>2</td><td>America Abroad Media</td><td><a href="#" class="detail-table-link">Edit</a></td></tr></tbody></table></div></div><div class="attribute-block"><div class="subsection-heading">Projects: <a class="icon-add-btn" href="#" title="Add"><i class="fa fa-plus"></i></a></div>' . $table(['ID', 'Name', 'Action']) . '</div><div class="attribute-block"><div class="subsection-heading">Products: <a class="icon-add-btn" href="#" title="Add"><i class="fa fa-plus"></i></a></div>' . $table(['ID', 'Name', 'Action']) . '</div></div>';
                $accordion('department-attributes', 'Department Attributes: <span class="icon-add-btn section-heading-plus"><i class="fa fa-plus"></i></span>', $attributes, false, 'rightAccordion');
                $accordion('kpis', 'Comp Framework: / KPIs: <span class="icon-add-btn section-heading-plus"><i class="fa fa-plus"></i></span>', '<div class="period-row"><label>KPIs:</label><select class="form-select"><option>2026 - Q1</option><option>2026 - Q2</option></select></div>', false, 'rightAccordion');
                $accordion('personal-leadership', 'Personal Leadership: <span class="icon-add-btn section-heading-plus"><i class="fa fa-plus"></i></span>', '<div class="detail-card-body">' . $table(['Leadership Incentives', '% Multiplier', 'Practice Multiplier', 'KPI Target', 'KPI Actual', 'Bonus Target', 'Bonus Actual', 'Plan']) . '</div>', false, 'rightAccordion');
                $leadership = '<div class="leadership-stack">';
                $leadership_tables = [['Vendors:', ['Sr No.', 'Vendor Name', 'Practice Multiplier', '% Multiplier', 'KPI Target', 'KPI Actual', 'Bonus Target', 'Bonus Actual', 'Plan']], ['Products:', ['Sr No.', 'Department', 'Group', 'Practice', 'Vendor', 'Product Name', 'Practice Multiplier', '% Multiplier', 'KPI Target', 'KPI Actual', 'Bonus Target']], ['Services:', ['Sr No.', 'Department', 'Group', 'Practice', 'Vendor', 'Service Name', 'Practice Multiplier', '% Multiplier', 'KPI Target', 'KPI Actual', 'Bonus Target']], ['Practices:', ['Sr No.', 'Department', 'Group', 'Practice', 'Practice Multiplier', '% Multiplier', 'KPI Target']], ['Customers:', ['Sr No.', 'Customer Name']], ['Partners:', ['Sr No.', 'Partner Name', 'Practice Multiplier', '% Multiplier', 'KPI Target', 'KPI Actual', 'Bonus Target']]];
                foreach ($leadership_tables as $leadership_table) {
                    $leadership .= '<div class="attribute-block"><div class="subsection-heading">' . htmlspecialchars($leadership_table[0]) . '</div><div class="detail-card-body">' . $table($leadership_table[1]) . '</div></div>';
                }
                $accordion('corporate-leadership', 'Corporate Leadership: <span class="icon-add-btn section-heading-plus"><i class="fa fa-plus"></i></span>', $leadership . '</div>', false, 'rightAccordion');
                ?>
            </div>
        </div>
    </div>
</main>
<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>