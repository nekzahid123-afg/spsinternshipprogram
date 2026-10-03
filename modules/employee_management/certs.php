<?php
$page_title = 'Manage Certifications';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$certification_types = [
    [
        'vendor' => 'Microsoft',
        'group' => 'Cloud',
        'practice' => 'Technology',
        'product' => 'Azure',
        'title' => 'Azure Fundamentals',
        'code' => 'AZ-900',
        'url' => 'https://learn.microsoft.com/certifications',
        'type' => 'Professional'
    ],
    [
        'vendor' => 'Amazon Web Services',
        'group' => 'Cloud',
        'practice' => 'Technology',
        'product' => 'AWS',
        'title' => 'Cloud Practitioner',
        'code' => 'CLF-C02',
        'url' => 'https://aws.amazon.com/certification',
        'type' => 'Professional'
    ]
];
?>

<div class="container-fluid py-3 certifications-page">
    <div class="certifications-heading">
        <div class="page-title-wrap">
            <h4 class="page-title"><i class="fa fa-certificate"></i> Manage Certifications</h4>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCertificationModal">
            <i class="fa fa-plus"></i> Add New Certification
        </button>
    </div>

    <div class="card certifications-card">
        <div class="card-body">
            <div class="table-responsive certifications-table-wrap">
                <table class="table detail-table certifications-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Vendor</th>
                            <th>Group</th>
                            <th>Practice</th>
                            <th>Product</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>URL</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($certification_types as $certification): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($certification['vendor']); ?></td>
                                <td><?php echo htmlspecialchars($certification['group']); ?></td>
                                <td><?php echo htmlspecialchars($certification['practice']); ?></td>
                                <td><?php echo htmlspecialchars($certification['product']); ?></td>
                                <td><?php echo htmlspecialchars($certification['title']); ?></td>
                                <td><?php echo htmlspecialchars($certification['code']); ?></td>
                                <td><a class="certification-url"
                                        href="<?php echo htmlspecialchars($certification['url']); ?>" target="_blank"
                                        rel="noopener">View URL</a></td>
                                <td><?php echo htmlspecialchars($certification['type']); ?></td>
                                <td>
                                    <a href="#" class="action-icon action-edit" title="Edit"
                                        aria-label="Edit certification"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="action-icon action-delete" title="Delete"
                                        aria-label="Delete certification"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCertificationModal" tabindex="-1" aria-labelledby="addCertificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content certification-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="addCertificationModalLabel"><i class="fa fa-plus"></i> Add New Certification
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="certVendor">Vendor</label>
                            <input id="certVendor" class="form-control" type="text" name="vendor">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="certGroup">Group</label>
                            <input id="certGroup" class="form-control" type="text" name="group">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="certPractice">Practice</label>
                            <input id="certPractice" class="form-control" type="text" name="practice">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="certProduct">Product</label>
                            <input id="certProduct" class="form-control" type="text" name="product">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label" for="certTitle">Title</label>
                            <input id="certTitle" class="form-control" type="text" name="title">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="certCode">Code</label>
                            <input id="certCode" class="form-control" type="text" name="code">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label" for="certUrl">URL</label>
                            <input id="certUrl" class="form-control" type="url" name="url">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="certType">Type</label>
                            <select id="certType" class="form-select" name="type">
                                <option value="Professional">Professional</option>
                                <option value="Technical">Technical</option>
                                <option value="Internal">Internal</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Certification</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .certifications-page {
        max-width: 1480px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .certifications-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .certifications-heading .page-title-wrap {
        margin: 0;
    }

    .certifications-heading .page-title {
        color: #1e293b;
        font-size: clamp(1.35rem, 2.2vw, 2rem);
        font-weight: 700;
    }

    .certifications-heading .page-title .fa {
        color: var(--primary-brand, #4f46e5);
    }

    .certifications-card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: var(--card-shadow, 0 0.5rem 1.25rem rgba(15, 23, 42, 0.08));
        overflow: hidden;
    }

    .certifications-card .card-body {
        padding: 1rem;
    }

    .certifications-table-wrap {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
    }

    .certifications-table {
        min-width: 1080px;
    }

    .certifications-table th,
    .certifications-table td {
        white-space: nowrap;
    }

    .certifications-table th {
        padding: 0.75rem 0.8rem;
    }

    .certifications-table td {
        padding: 0.7rem 0.8rem;
    }

    .certification-url {
        color: var(--primary-brand, #4f46e5);
        font-weight: 600;
        text-decoration: none;
    }

    .certification-url:hover {
        color: var(--primary-brand-dark, #4338ca);
        text-decoration: underline;
    }

    .certification-modal .modal-header {
        background: #f8fafc;
        border-bottom-color: #e2e8f0;
    }

    .certification-modal .modal-title {
        color: #243b53;
        font-weight: 700;
    }

    .certification-modal .modal-title .fa {
        color: var(--primary-brand, #4f46e5);
        margin-right: 0.35rem;
    }

    .certification-modal .form-label {
        color: #334155;
        font-size: 0.84rem;
        font-weight: 600;
        margin-bottom: 0.35rem;
    }

    .certification-modal .form-control,
    .certification-modal .form-select {
        border-color: #dfe3ea;
        border-radius: 8px;
        min-height: 38px;
    }

    .certification-modal .form-control:focus,
    .certification-modal .form-select:focus {
        border-color: rgba(79, 70, 229, 0.55);
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.12);
    }

    @media (max-width: 575.98px) {
        .certifications-heading {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>