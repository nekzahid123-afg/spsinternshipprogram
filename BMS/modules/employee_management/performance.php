<?php
$page_title = 'Performance Data';
require_once dirname(__DIR__, 2) . '/includes/header.php';

$employee_name = trim((string) ($_GET['employee'] ?? 'Nek Zahid Khan'));
$employee_name = $employee_name !== '' ? $employee_name : 'Employee';

$performance_monitor = [
    ['title' => 'TOO NEW', 'description' => 'Employee with less than 06 months of employment'],
    ['title' => 'MOVE', 'description' => 'Due to performance or organizational reasons, Employee to be moved out of current role.'],
    ['title' => 'MONITOR', 'description' => 'Employee with low performance. Might consider putting on performance implement plan.'],
    ['title' => 'DEVELOP IN PLACE', 'description' => 'Well-placed, solid, valued performer with ability to expand in current role.'],
    ['title' => 'TOP PERFORMANCE', 'description' => 'Best in team with potential and interest to take on bigger/higgher roles in future.'],
    ['title' => 'HIGH POTENTIAL', 'description' => 'Highest level of performance and potential.', 'highlight' => true]
];

$criteria = [
    ['title' => 'PERFORMANCE', 'description' => 'Whats is the employees performance rating in the last 03 Years.'],
    ['title' => 'AMBITION', 'description' => 'What are your Employees current and future goals?'],
    ['title' => 'RUNWAY', 'description' => 'How capable is the Employee to advance to new role?'],
    ['title' => 'Leadership', 'description' => 'Does your Employee demonstrate Leadership characteristics?'],
    ['title' => 'AGILITY', 'description' => 'How flexible and adaptive is your Employee? How do they deal with change?'],
    ['title' => 'Influence', 'description' => 'Do fellow colleagues/superiors value his/her opinion?']
];

$potential_assessment = [
    ['title' => 'Critical Role', 'description' => 'Positions that are crucial to achievements of organizations outcomes'],
    ['title' => 'Flight Risk', 'description' => 'Refers to the degree to which an Employee appears they may be ready to leave the company as perceived by manager.'],
    ['title' => 'Successor', 'description' => 'Employees who have knowledge skills and abilities to step into the roles within your team/department.'],
    ['title' => 'Hard to fill role', 'description' => 'Roles that require niche skills or background that is in high demand or have challenging job description.', 'highlight' => true]
];

$potential_performance = [
    ['title' => 'Risk', 'description' => 'Low Potential/Low Performance'],
    ['title' => 'Inconsistent Player', 'description' => 'Moderate Potential/Low Performance'],
    ['title' => 'Average Performer', 'description' => 'Low Potential/Moderate Performance'],
    ['title' => 'Potential Gem', 'description' => 'High Potential/Low Performance'],
    ['title' => 'Core Player', 'description' => 'Moderate Potential/Moderate Performance'],
    ['title' => 'Solid Performer', 'description' => 'Low Potential/High Performance'],
    ['title' => 'High Potential', 'description' => 'High Potential/Moderate Performance'],
    ['title' => 'High Performer', 'description' => 'Moderate Potential/High Performance'],
    ['title' => 'Star', 'description' => 'High Potential/High Performance', 'highlight' => true]
];
?>

<div class="container-fluid py-3 performance-page">
    <div class="performance-card">
        <div class="performance-heading">
            <h4 class="page-title"><i class="fa fa-server"></i> Performance Data
                <?php echo htmlspecialchars($employee_name); ?></h4>
            <div class="performance-actions">
                <a class="btn btn-success" href="#"><i class="fa fa-clock-o"></i> TimeLive</a>
                <a class="btn btn-success" href="#"><i class="fa fa-info-circle"></i> Demand</a>
                <a class="btn btn-outline-secondary"
                    href="<?php echo $base_url; ?>/modules/employee_management/index.php"><i
                        class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>

        <form class="performance-filter" method="get" action="">
            <label for="performanceYear">Year:</label>
            <select id="performanceYear" name="year" class="form-select">
                <option>2026</option>
                <option>2025</option>
                <option>2024</option>
            </select>
            <input type="hidden" name="employee" value="<?php echo htmlspecialchars($employee_name); ?>">
            <button type="submit" class="btn btn-primary">Show</button>
        </form>

        <section class="chart-grid" aria-label="Performance charts">
            <article class="chart-panel">
                <div class="chart-panel-heading">
                    <h5>Revenue and Margin</h5><i class="fa fa-bars"></i>
                </div>
                <div class="chart-canvas-wrap"><canvas id="revenueMarginChart"></canvas></div>
            </article>
            <article class="chart-panel">
                <div class="chart-panel-heading">
                    <h5>Percent Utilization</h5><i class="fa fa-bars"></i>
                </div>
                <div class="chart-canvas-wrap"><canvas id="utilizationChart"></canvas></div>
            </article>
            <article class="chart-panel">
                <div class="chart-panel-heading">
                    <h5>No of Certifications</h5><i class="fa fa-bars"></i>
                </div>
                <div class="chart-canvas-wrap"><canvas id="certificationsChart"></canvas></div>
            </article>
            <article class="chart-panel">
                <div class="chart-panel-heading">
                    <h5>Communication Skills</h5><i class="fa fa-bars"></i>
                </div>
                <div class="chart-canvas-wrap"><canvas id="communicationChart"></canvas></div>
            </article>
        </section>

        <section class="performance-section">
            <div class="section-heading">Skills Matrix</div>
            <div class="skills-placeholder">No skills matrix data available.</div>
        </section>

        <section class="performance-section">
            <div class="section-heading">Performance Monitor</div>
            <div class="monitor-grid">
                <?php foreach ($performance_monitor as $item): ?>
                    <article class="monitor-box<?php echo !empty($item['highlight']) ? ' highlighted' : ''; ?>">
                        <h5><?php echo htmlspecialchars($item['title']); ?></h5>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="criteria-grid">
                <?php foreach ($criteria as $item): ?>
                    <article class="criteria-box">
                        <h5><?php echo htmlspecialchars($item['title']); ?></h5>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="performance-section">
            <div class="section-heading">Employee Potential Assessment</div>
            <div class="assessment-grid">
                <?php foreach ($potential_assessment as $item): ?>
                    <article class="assessment-box<?php echo !empty($item['highlight']) ? ' highlighted' : ''; ?>">
                        <h5><?php echo htmlspecialchars($item['title']); ?></h5>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="performance-section">
            <div class="section-heading">Employee Potential Performance</div>
            <div class="potential-grid">
                <?php foreach ($potential_performance as $item): ?>
                    <article class="potential-box<?php echo !empty($item['highlight']) ? ' highlighted' : ''; ?>">
                        <h5><?php echo htmlspecialchars($item['title']); ?></h5>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>

<style>
    .performance-page {
        max-width: 1900px;
        margin: 0 auto;
        padding-bottom: 2rem;
    }

    .performance-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #dfe3ea;
        border-radius: 8px;
        box-shadow: 0 0.25rem 0.8rem rgba(15, 23, 42, 0.05);
    }

    .performance-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.5rem 1.75rem 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .performance-heading .page-title {
        margin: 0;
        color: #1e293b;
        font-size: clamp(1.4rem, 2.3vw, 2rem);
        font-weight: 500;
    }

    .performance-heading .page-title .fa {
        margin-right: 0.4rem;
        color: #334155;
    }

    .performance-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
    }

    .performance-filter {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        margin: 0.65rem 0.9rem;
        padding: 0.3rem 0.55rem;
        background: #f8fafc;
    }

    .performance-filter label {
        margin: 0;
        color: #334155;
        font-weight: 700;
    }

    .performance-filter .form-select {
        width: 150px;
        min-height: 38px;
    }

    .chart-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
        padding: 0.25rem 0.9rem 1rem;
    }

    .chart-panel {
        min-height: 310px;
        border: 1px solid #e2e8f0;
        background: #fff;
    }

    .chart-panel-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.75rem 1rem 0.2rem;
        color: #243b53;
    }

    .chart-panel-heading h5 {
        flex: 1;
        margin: 0;
        text-align: center;
        font-size: 1.15rem;
        font-weight: 600;
    }

    .chart-panel-heading i {
        color: #64748b;
    }

    .chart-canvas-wrap {
        position: relative;
        height: 250px;
        padding: 0 0.8rem 0.8rem;
    }

    .performance-section {
        margin: 1rem 0.9rem 1.5rem;
        border: 1px solid #4f9fc2;
        border-radius: 5px;
        overflow: hidden;
    }

    .section-heading {
        padding: 0.8rem 1rem;
        background: var(--primary-brand, #4f46e5);
        color: #fff;
        font-size: 1.15rem;
        font-weight: 600;
    }

    .skills-placeholder {
        min-height: 145px;
        padding: 1.5rem;
        color: #64748b;
        background: #fff;
    }

    .monitor-grid,
    .criteria-grid,
    .assessment-grid,
    .potential-grid {
        display: grid;
        gap: 1rem;
        padding: 1.5rem;
    }

    .monitor-grid {
        grid-template-columns: repeat(6, minmax(0, 1fr));
    }

    .criteria-grid {
        grid-template-columns: repeat(6, minmax(0, 1fr));
        padding-top: 0;
    }

    .assessment-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
        max-width: 1100px;
        margin: 0 auto;
    }

    .potential-grid {
        grid-template-columns: repeat(6, minmax(0, 1fr));
        align-items: stretch;
    }

    .monitor-box,
    .assessment-box,
    .potential-box {
        display: flex;
        min-height: 160px;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding: 1.2rem 0.85rem;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background: #f1f5f9;
        color: #1f2937;
        text-align: center;
    }

    .monitor-box h5,
    .assessment-box h5,
    .potential-box h5 {
        margin: 0;
        font-size: 1.08rem;
        font-weight: 700;
    }

    .monitor-box p,
    .assessment-box p,
    .potential-box p {
        margin: 1rem 0 0;
        font-size: 0.78rem;
        font-weight: 600;
        line-height: 1.45;
    }

    .criteria-box {
        min-height: 135px;
        padding: 0.9rem 0.65rem;
        border: 2px solid #60a5fa;
        border-radius: 8px;
        background: #eff6ff;
        color: #1e293b;
        text-align: center;
    }

    .criteria-box h5 {
        margin: 0 0 0.7rem;
        font-size: 0.94rem;
        font-weight: 700;
    }

    .criteria-box p {
        margin: 0;
        font-size: 0.76rem;
        line-height: 1.5;
    }

    .highlighted {
        background: var(--success-bg, #10b981);
        border-color: #059669;
        color: #fff;
    }

    @media (max-width: 1200px) {

        .monitor-grid,
        .potential-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .criteria-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {
        .performance-page {
            min-width: 0;
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }

        .performance-card,
        .performance-section {
            min-width: 0;
            overflow: visible;
        }

        .performance-section {
            margin-right: 0.5rem;
            margin-left: 0.5rem;
        }

        .performance-heading {
            align-items: flex-start;
            flex-direction: column;
            padding: 1.15rem 1rem 0.75rem;
        }

        .performance-actions {
            width: 100%;
        }

        .chart-grid {
            grid-template-columns: 1fr;
            min-width: 0;
            padding-right: 0.6rem;
            padding-left: 0.6rem;
        }

        .chart-panel,
        .chart-canvas-wrap {
            min-width: 0;
        }

        .performance-filter {
            align-items: flex-start;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .performance-filter .form-select {
            width: 100%;
        }

        .monitor-grid,
        .criteria-grid,
        .assessment-grid,
        .potential-grid {
            grid-template-columns: 1fr;
            min-width: 0;
            padding: 1rem;
        }

        .criteria-grid {
            padding-top: 0;
        }

        .monitor-box,
        .criteria-box,
        .assessment-box,
        .potential-box {
            min-width: 0;
            overflow-wrap: anywhere;
        }
    }
</style>

<script src="<?php echo $base_url; ?>/velzon/assets/libs/chart.js/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const chartDefaults = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
            scales: { y: { beginAtZero: true, grid: { color: '#e2e8f0' } }, x: { grid: { display: false } } }
        };

        new Chart(document.getElementById('revenueMarginChart'), {
            type: 'bar',
            data: {
                labels: months, datasets: [
                    { label: 'Margin', data: [18, 24, 20, 28, 32, 30, 36, 33, 38, 42, 40, 46], backgroundColor: '#75afe6' },
                    { label: 'Revenue', data: [30, 38, 35, 44, 48, 52, 58, 55, 63, 68, 72, 78], type: 'line', borderColor: '#4f46e5', backgroundColor: '#4f46e5', tension: 0.35 }
                ]
            }, options: chartDefaults
        });

        new Chart(document.getElementById('utilizationChart'), {
            type: 'line', data: { labels: months, datasets: [{ label: 'Utilization', data: [72, 75, 68, 81, 78, 84, 86, 82, 88, 90, 87, 92], borderColor: '#10b981', backgroundColor: 'rgba(16,185,129,.14)', fill: true, tension: 0.35 }] }, options: chartDefaults
        });

        new Chart(document.getElementById('certificationsChart'), {
            type: 'bar', data: { labels: months, datasets: [{ label: 'Certification', data: [0, 1, 1, 2, 2, 2, 3, 3, 4, 4, 5, 5], backgroundColor: '#75afe6' }] }, options: chartDefaults
        });

        new Chart(document.getElementById('communicationChart'), {
            type: 'line', data: { labels: months, datasets: [{ label: 'Communication Skills', data: [65, 68, 70, 72, 76, 78, 80, 82, 84, 86, 88, 90], borderColor: '#4f46e5', backgroundColor: 'rgba(79,70,229,.12)', fill: true, tension: 0.35 }] }, options: chartDefaults
        });
    });
</script>

<?php require_once dirname(__DIR__, 2) . '/includes/footer.php'; ?>