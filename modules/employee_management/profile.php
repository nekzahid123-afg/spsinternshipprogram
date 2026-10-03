<?php
$page_title = 'My Profile';
require_once dirname(__DIR__, 2) . '/includes/header.php';
?>

<div class="container-fluid py-3 profile-page">
    <style>
        .profile-page {
            max-width: 1480px;
            margin: 0 auto;
            padding-bottom: 2rem;
        }

        .profile-page .page-title-wrap {
            margin-bottom: 1.2rem;
        }

        .profile-page .page-title {
            color: #1e293b;
            font-weight: 700;
            margin: 0;
        }

        .profile-header-banner {
            position: relative;
            background: linear-gradient(120deg, #4F46E5 0%, #6366F1 100%);
            border-radius: 18px 18px 0 0;
            min-height: 150px;
            margin-bottom: 3.25rem;
            box-shadow: 0 10px 24px rgba(79, 70, 229, 0.15);
        }

        .profile-avatar-wrap {
            position: absolute;
            left: 50%;
            bottom: -52px;
            transform: translateX(-50%);
            width: 124px;
            height: 124px;
            border-radius: 50%;
            border: 4px solid #fff;
            background: #fff;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
            overflow: hidden;
        }

        .profile-avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 20%;
            display: block;
        }

        .profile-avatar-wrap .upload-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(15, 23, 42, 0.35);
            color: #fff;
            font-size: 1.3rem;
            opacity: 0;
            transition: opacity 0.2s ease;
            text-decoration: none;
        }

        .profile-avatar-wrap:hover .upload-overlay {
            opacity: 1;
        }

        .profile-name-block {
            text-align: center;
            padding-top: 84px;
        }

        .profile-name-block h2 {
            margin: 0;
            font-size: 1.9rem;
            font-weight: 800;
            color: #111827;
            letter-spacing: 0.02em;
        }

        .profile-name-block .profile-upload-link {
            display: inline-block;
            margin-top: 0.35rem;
            color: var(--bms-primary, #4F46E5);
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
        }

        .profile-name-block .profile-upload-link:hover {
            text-decoration: underline;
        }

        .profile-toolbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 0.75rem;
            margin: 0 0 1.25rem;
        }

        .profile-edit-actions {
            display: none;
            gap: 0.75rem;
        }

        .profile-page.profile-edit-mode .profile-edit-actions {
            display: flex;
        }

        .profile-page.profile-edit-mode .profile-toolbar .btn-primary {
            display: none;
        }

        .profile-card {
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 2px 12px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .profile-card-header {
            background: var(--bms-primary, #4F46E5);
            color: #fff;
            font-weight: 700;
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .profile-card-body {
            padding: 0.25rem 1rem 0;
        }

        .profile-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            padding: 14px 4px;
            border-bottom: 1px solid #E2E8F0;
        }

        .profile-row:last-child {
            border-bottom: none;
        }

        .profile-label {
            font-weight: 700;
            color: #334155;
            min-width: 140px;
        }

        .profile-value {
            color: #1E293B;
            text-align: right;
            flex: 1;
            word-break: break-word;
        }

        .profile-value a {
            color: var(--bms-primary, #4F46E5);
            text-decoration: none;
        }

        .profile-value a:hover {
            text-decoration: underline;
        }

        .profile-edit-field {
            display: none;
            width: 100%;
            max-width: 320px;
            margin-left: auto;
        }

        .profile-page.profile-edit-mode .profile-value {
            display: none;
        }

        .profile-page.profile-edit-mode .profile-edit-field {
            display: block;
        }

        .profile-page.profile-edit-mode .profile-row {
            align-items: center;
        }

        .profile-page.profile-edit-mode .form-control,
        .profile-page.profile-edit-mode .bio-textarea {
            background: #fff;
            border: 1px solid #d8d8d8;
            border-radius: 8px;
            color: #2b3a4a;
            min-height: 40px;
        }

        .profile-page.profile-edit-mode .profile-row .form-control:focus,
        .profile-page.profile-edit-mode .bio-textarea:focus {
            border-color: rgba(79, 70, 229, 0.5);
            box-shadow: 0 0 0 0.15rem rgba(79, 70, 229, 0.12);
        }

        .profile-page.profile-edit-mode .bio-textarea {
            resize: vertical;
            min-height: 180px;
        }

        .resume-file-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .resume-file-name {
            display: inline-block;
            max-width: 220px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .file-inline-input {
            display: none;
            width: 100%;
            max-width: 260px;
        }

        .profile-page.profile-edit-mode .file-inline-input {
            display: block;
        }

        .profile-page.profile-edit-mode .upload-button-link {
            display: none;
        }

        .btn-select-file {
            white-space: nowrap;
        }

        .profile-bio-card {
            margin-top: 1.5rem;
        }

        .bio-label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.82rem;
            font-weight: 700;
            color: #3b485b;
        }

        .bio-textarea {
            width: 100%;
            border: 1px solid #d8d8d8;
            border-radius: 8px;
            background: #f8fafc;
            color: #1f2937;
            min-height: 180px;
            resize: vertical;
            padding: 0.8rem 0.9rem;
        }

        .profile-section-card {
            margin-top: 1.5rem;
        }

        .profile-section-card .profile-card {
            margin-bottom: 0;
        }

        .profile-page .mini-add-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 999px;
            padding: 0.35rem 0.8rem;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
        }

        .profile-page .mini-add-btn:hover {
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 991.98px) {
            .profile-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-label {
                min-width: 0;
            }

            .profile-value,
            .profile-edit-field {
                width: 100%;
                text-align: left;
                margin-left: 0;
            }

            .resume-file-wrapper {
                justify-content: flex-start;
            }
        }
    </style>

    <div class="page-title-wrap">
        <h4 class="page-title"><i class="fa fa-user"></i> My Profile</h4>
    </div>

    <div class="profile-header-banner">
        <div class="profile-avatar-wrap">
            <img src="<?php echo $base_url; ?>/assets/images/nek.jpg" alt="Profile avatar">
            <a href="#" class="upload-overlay" title="Add Profile Picture">
                <i class="fa fa-camera"></i>
            </a>
        </div>
    </div>

    <div class="profile-name-block">
        <h2>NEK ZAHID KHAN</h2>
        <a href="#" class="profile-upload-link">Add Profile Picture</a>
    </div>

    <div class="profile-toolbar">
        <button type="button" class="btn btn-primary" id="toggleEditProfile">
            <i class="fa fa-pencil"></i> Edit Profile
        </button>
        <div class="profile-edit-actions">
            <button type="button" class="btn btn-primary" id="saveProfileChanges">
                <i class="fa fa-save"></i> Save Changes
            </button>
            <button type="button" class="btn btn-outline-secondary" id="cancelProfileChanges">
                <i class="fa fa-times"></i> Cancel
            </button>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="profile-card">
                <div class="profile-card-header">Employee Information</div>
                <div class="profile-card-body">
                    <div class="profile-row">
                        <span class="profile-label">Location</span>
                        <span class="profile-value">Lahore</span>
                        <span class="profile-edit-field"><input type="text" class="form-control" value="Lahore"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Group</span>
                        <span class="profile-value">Information Technology</span>
                        <span class="profile-edit-field"><input type="text" class="form-control"
                                value="Information Technology"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Level</span>
                        <span class="profile-value">6th Semester</span>
                        <span class="profile-edit-field"><input type="text" class="form-control"
                                value="6th Semester"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Date of Hire</span>
                        <span class="profile-value">Not provided</span>
                        <span class="profile-edit-field"><input type="text" class="form-control"
                                value="Not provided"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Status</span>
                        <span class="profile-value">Student</span>
                        <span class="profile-edit-field"><input type="text" class="form-control" value="Student"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Mobile No</span>
                        <span class="profile-value">+92 321 4755764</span>
                        <span class="profile-edit-field"><input type="text" class="form-control"
                                value="+92 321 4755764"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Home No</span>
                        <span class="profile-value">-</span>
                        <span class="profile-edit-field"><input type="text" class="form-control" value=""></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Emergency No</span>
                        <span class="profile-value">-</span>
                        <span class="profile-edit-field"><input type="text" class="form-control" value=""></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Email</span>
                        <span class="profile-value">nekzahid123@gmail.com</span>
                        <span class="profile-edit-field"><input type="email" class="form-control"
                                value="nekzahid123@gmail.com"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="profile-card">
                <div class="profile-card-header">Supervisor &amp; Resume</div>
                <div class="profile-card-body">
                    <div class="profile-row">
                        <span class="profile-label">Supervisor Name</span>
                        <span class="profile-value">-</span>
                        <span class="profile-edit-field"><input type="text" class="form-control" value=""></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Supervisor Email</span>
                        <span class="profile-value">-</span>
                        <span class="profile-edit-field"><input type="email" class="form-control" value=""></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">LinkedIn Url</span>
                        <span class="profile-value"><a href="#">LinkedIn | GitHub</a></span>
                        <span class="profile-edit-field"><input type="text" class="form-control"
                                value="LinkedIn | GitHub"></span>
                    </div>
                    <div class="profile-row">
                        <span class="profile-label">Resume</span>
                        <span class="profile-value">
                            <span class="resume-file-wrapper">
                                <span class="resume-file-name">No file selected</span>
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm btn-select-file upload-button-link">
                                    <i class="fa fa-upload"></i> Select File
                                </button>
                            </span>
                        </span>
                        <span class="profile-edit-field">
                            <input type="file" class="form-control file-inline-input" accept=".doc,.docx,.pdf">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-card profile-bio-card">
        <div class="profile-card-header">Bio</div>
        <div class="profile-card-body">
            <label class="bio-label">Bio</label>
            <textarea id="profileBioTextarea" class="bio-textarea" rows="8"
                readonly>BS Information Technology student focused on AI-driven software productivity, with hands-on experience building AI-powered tools using IBM Granite on watsonx.ai and Retrieval-Augmented Generation (RAG) pipelines. Proficient with AI coding agents and IDEs such as Codex, OpenCode, Google Antigravity, and IBM bob, with experience deploying applications on Vercel and Cloudflare Workers. Strong analytical and problem-solving mindset, eager to apply NLU and AI-driven strategies as part of IBM's NLU Service track.

Technical Skills: Front-End: HTML, CSS, JavaScript, React.js, Next.js | Back-End: C# .NET, Java, C, C++, MySQL | AI: IBM Granite (watsonx.ai), RAG Pipelines, Isolation-Forest Anomaly Detection, Prompt Engineering | Hosting and Deployment: Vercel, Cloudflare Workers | CMS/Platform: WordPress | Tools: Git, GitHub, VS Code, IntelliJ, N8N Automation, Lovable.

Projects: OrbitLens AI, Currency Exchanger App, Library Management System, Portfolio Website, and Online Learning Management System (EduVibe).

Work Experience: Tutor at Sunrise Public School, North Waziristan, KPK; Sports Volunteer supporting national sports events.

Certifications: Responsible AI and Risk Management (IBM SkillsBuild, Aug 2026); Critical Thinking in the AI Era (HP LIFE / HP Foundation, Jul 2026).</textarea>
        </div>
    </div>

    <div class="row g-4 mt-1 profile-section-card">
        <div class="col-lg-6">
            <div class="profile-card">
                <div class="profile-card-header">
                    <span>Attachments</span>
                    <a href="#" class="mini-add-btn"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="profile-card-body">
                    <div class="modern-table-wrap">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="empty-row">
                                    <td colspan="2">
                                        <div class="empty-state">
                                            <i class="fa fa-file-text-o"></i>
                                            <span>No attachments available</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="profile-card">
                <div class="profile-card-header">
                    <span>Communication Skills</span>
                    <a href="#" class="mini-add-btn"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="profile-card-body">
                    <div class="modern-table-wrap">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Added By</th>
                                    <th>Speaking</th>
                                    <th>Writing</th>
                                    <th>Listening</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="empty-row">
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i class="fa fa-comments-o"></i>
                                            <span>No communication skills recorded</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="profile-card">
                <div class="profile-card-header">Employee Roles</div>
                <div class="profile-card-body">
                    <div class="modern-table-wrap">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Group</th>
                                    <th>Practice</th>
                                    <th>Product</th>
                                    <th>Role</th>
                                    <th>Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="empty-row">
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fa fa-briefcase"></i>
                                            <span>No roles assigned</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="profile-card">
                <div class="profile-card-header">
                    <span>Certifications</span>
                    <a href="#" class="mini-add-btn"><i class="fa fa-plus"></i> Add Certification</a>
                </div>
                <div class="profile-card-body">
                    <div class="modern-table-wrap">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Vendor</th>
                                    <th>Group</th>
                                    <th>Practice</th>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>URL</th>
                                    <th>Type</th>
                                    <th>Completed On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>IBM SkillsBuild</td>
                                    <td>Artificial Intelligence</td>
                                    <td>Responsible AI</td>
                                    <td>Risk Management</td>
                                    <td>Responsible AI and Risk Management</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>Certificate</td>
                                    <td>Aug 2026</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>HP LIFE / HP Foundation</td>
                                    <td>Professional Skills</td>
                                    <td>Critical Thinking</td>
                                    <td>AI Era</td>
                                    <td>Critical Thinking in the AI Era</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>Certificate</td>
                                    <td>Jul 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12">
            <div class="profile-card">
                <div class="profile-card-header">
                    <span>Badges &amp; Accreditation</span>
                    <a href="#" class="mini-add-btn"><i class="fa fa-plus"></i> Add Badge</a>
                </div>
                <div class="profile-card-body">
                    <div class="modern-table-wrap">
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Vendor</th>
                                    <th>Group</th>
                                    <th>Practice</th>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>URL</th>
                                    <th>Completed On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="empty-row">
                                    <td colspan="9">
                                        <div class="empty-state">
                                            <i class="fa fa-shield"></i>
                                            <span>No badges or accreditation recorded</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const page = document.querySelector('.profile-page');
        const toggleButton = document.getElementById('toggleEditProfile');
        const saveButton = document.getElementById('saveProfileChanges');
        const cancelButton = document.getElementById('cancelProfileChanges');
        const bioField = document.getElementById('profileBioTextarea');

        const setEditMode = function (isEditable) {
            page.classList.toggle('profile-edit-mode', isEditable);
            if (bioField) {
                bioField.readOnly = !isEditable;
            }
        };

        if (toggleButton) {
            toggleButton.addEventListener('click', function () {
                setEditMode(true);
            });
        }

        if (saveButton) {
            saveButton.addEventListener('click', function () {
                setEditMode(false);
            });
        }

        if (cancelButton) {
            cancelButton.addEventListener('click', function () {
                setEditMode(false);
            });
        }
    });
</script>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>