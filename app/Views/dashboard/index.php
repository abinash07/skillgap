<style>
    .section-box {
        border-radius: 10px;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
    }
    .light-blue-bg {
        background-color: #f0f6ff;
    }
    .light-green-bg {
        background-color: #f3fdf6;
    }
    .light-purple-bg {
        background-color: #f8f3ff;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start"><h6>Filter</h6></li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Skills</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-lightbulb"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>77</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">AI Score</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-magic"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>95%</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Critical Gaps</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-graph-down-arrow"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body" style="min-height: 444px;">
                                <h5 class="card-title">Skill Level Comparison</h5>
                                <canvas id="skillChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                    </div>

                    <div class="card-body">
                    <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                    <div class="activity">

                        <div class="activity-item d-flex">
                        <div class="activite-label">32 min</div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                        </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                        <div class="activite-label">56 min</div>
                        <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                        <div class="activity-content">
                            Voluptatem blanditiis blanditiis eveniet
                        </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                        <div class="activite-label">2 hrs</div>
                        <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                        <div class="activity-content">
                            Voluptates corrupti molestias voluptatem
                        </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                        <div class="activite-label">1 day</div>
                        <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                        <div class="activity-content">
                            Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                        </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                        <div class="activite-label">2 days</div>
                        <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                        <div class="activity-content">
                            Est sit eum reiciendis exercitationem
                        </div>
                        </div><!-- End activity item-->

                        <div class="activity-item d-flex">
                        <div class="activite-label">4 weeks</div>
                        <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                        <div class="activity-content">
                            Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                        </div>
                        </div><!-- End activity item-->

                    </div>

                    </div>
                </div>

                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body" style="min-height: 485px;">
                        <h5 class="card-title">Recommendations</h5>
                        

                        <!-- Immediate Actions -->
                        <div class="section-box light-blue-bg">
                            <h6 class="fw-bold text-primary">Immediate Actions</h6>
                            <ul class="mb-0">
                                <li>Complete assessments for 3 unassessed skills</li>
                                <li>Focus on 12 critical gap areas</li>
                                <li>Review high-priority recommendations</li>
                            </ul>
                        </div>

                        <!-- Medium Term Goals -->
                        <div class="section-box light-green-bg">
                            <h6 class="fw-bold text-success">Medium Term Goals</h6>
                            <ul class="mb-0">
                                <li>Improve overall completion rate to 80%</li>
                                <li>Reduce critical gaps by 50%</li>
                                <li>Establish regular assessment schedule</li>
                            </ul>
                        </div>

                        <!-- Long Term Vision -->
                        <div class="section-box light-purple-bg">
                            <h6 class="fw-bold text-danger">Long Term Vision</h6>
                            <ul class="mb-0">
                                <li>Achieve expert level in key competencies</li>
                                <li>Maintain skill currency through continuous learning</li>
                                <li>Mentor others in strong skill areas</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    const skills = [
        { name: "Excel", required: 5, current: 3 },
        { name: "SQL", required: 4, current: 2 },
        { name: "Python", required: 4, current: 2 },
        { name: "Power BI", required: 3, current: 3 },
        { name: "Communication", required: 4, current: 4 }
    ];
    const ctx = document.getElementById("skillChart").getContext("2d");
    const chart = new Chart(ctx, {
        type: "bar",
        data: {
        labels: skills.map(s => s.name),
        datasets: [
            {
            label: "Required Level",
            data: skills.map(s => s.required),
            backgroundColor: "rgba(255, 99, 132, 0.6)"
            },
            {
            label: "Current Level",
            data: skills.map(s => s.current),
            backgroundColor: "rgba(54, 162, 235, 0.6)"
            }
        ]
        },
        options: {
        scales: {
            y: {
            suggestedMin: 0,
            suggestedMax: 5,
            stepSize: 1
            }
        }
        }
    });
</script>