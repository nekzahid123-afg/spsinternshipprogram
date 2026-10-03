<?php
$page_title = 'Employee Letters & Documents';
require_once dirname(__DIR__, 2) . '/includes/header.php';
?>

<div class="container-fluid py-3 letters-page">
    <div class="letters-heading">
        <div class="page-title-wrap">
            <h4 class="page-title"><i class="fa fa-file-text-o"></i> Employee Letters &amp; Documents</h4>
        </div>
        <a class="btn btn-outline-primary" href="<?php echo $base_url; ?>/modules/employee_management/index.php">
            <i class="fa fa-times"></i> Close
        </a>
    </div>

    <div class="letters-grid">
        <article class="letter-card">
            <div class="letter-icon"><i class="fa fa-file-text-o"></i></div>
            <div class="letter-content">
                <h5>Experience Certificate</h5>
                <p>Generate an official certificate confirming an employee's experience and service.</p>
            </div>
            <a class="btn btn-primary letter-action" href="#">
                <i class="fa fa-download"></i> Generate
            </a>
        </article>

        <article class="letter-card">
            <div class="letter-icon"><i class="fa fa-tasks"></i></div>
            <div class="letter-content">
                <h5>Role and Responsibility</h5>
                <p>Generate a document outlining the employee's assigned role and responsibilities.</p>
            </div>
            <a class="btn btn-primary letter-action" href="#">
                <i class="fa fa-download"></i> Generate
            </a>
        </article>

        <article class="letter-card">
            <div class="letter-icon"><i class="fa fa-file-o"></i></div>
            <div class="letter-content">
                <h5>Appointment Letter</h5>
                <p>Generate an appointment document containing the employee's employment details.</p>
            </div>
            <a class="btn btn-primary letter-action" href="#">
                <i class="fa fa-download"></i> Generate
            </a>
        </article>
    </div>
</div>

<style>
    .letters-page {
        max-width: 1480px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .letters-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .letters-heading .page-title-wrap {
        margin: 0;
    }

    .letters-heading .page-title {
        color: #1e293b;
        font-size: clamp(1.35rem, 2.2vw, 2rem);
        font-weight: 700;
    }

    .letters-heading .page-title .fa {
        color: var(--primary-brand, #4f46e5);
    }

    .letters-heading .btn {
        white-space: nowrap;
    }

    .letters-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.1rem;
    }

    .letter-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        min-height: 160px;
        padding: 1.25rem;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: var(--card-shadow, 0 0.5rem 1.25rem rgba(15, 23, 42, 0.08));
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .letter-card:hover {
        transform: translateY(-4px);
        border-color: rgba(79, 70, 229, 0.3);
        box-shadow: 0 0.9rem 1.8rem rgba(15, 23, 42, 0.12);
    }

    .letter-icon {
        display: inline-flex;
        flex: 0 0 52px;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #eef2ff;
        color: var(--primary-brand, #4f46e5);
        font-size: 1.35rem;
    }

    .letter-content {
        flex: 1;
        min-width: 0;
    }

    .letter-content h5 {
        margin: 0 0 0.35rem;
        color: #243b53;
        font-size: 1.05rem;
        font-weight: 700;
    }

    .letter-content p {
        margin: 0;
        color: #64748b;
        font-size: 0.86rem;
        line-height: 1.5;
    }

    .letter-action {
        flex: 0 0 auto;
        white-space: nowrap;
    }

    @media (max-width: 991.98px) {
        .letters-grid {
            grid-template-columns: 1fr;
        }

        .letter-card {
            min-height: 125px;
        }
    }

    @media (max-width: 575.98px) {
        .letters-heading {
            align-items: flex-start;
            flex-direction: column;
        }

        .letter-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .letter-action {
            margin-left: 68px;
        }
    }
</style>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>