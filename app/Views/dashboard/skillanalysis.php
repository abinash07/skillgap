<style>
    .user-avatar2 {
        width: 48px;
        height: 48px;
        background-color: #97144d;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
.small-box {
    position: relative;
    display: block;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.small-box>.inner {
    padding: 10px;
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255, 255, 255, 0.8);
    display: block;
    z-index: 10;
    background: rgba(0, 0, 0, 0.1);
    text-decoration: none;
}
.small-box>.small-box-footer:hover {
    color: #fff;
    background: rgba(0, 0, 0, 0.15);
}
.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}
.small-box p {
    font-size: 15px;
}
.small-box p>small {
    display: block;
    color: #f9f9f9;
    font-size: 13px;
    margin-top: 5px;
}
.small-box h3, .small-box p {
    z-index: 5;
}
.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: #FFF;
    opacity: 0.5;
}
.small-box:hover {
    text-decoration: none;
    color: #f9f9f9;
}
.small-box:hover .icon {
    font-size: 95px;
}
@media (max-width:767px) {
    .small-box {
    text-align: center;
    }
    .small-box .icon {
        display: none;
    }
    .small-box p {
        font-size: 12px;
    }
}


    .dot {
      height: 10px;
      width: 10px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 5px;
    }
    .dot-green { background-color: #28a745; }
    .dot-blue { background-color: #0d6efd; }
    .dot-yellow { background-color: #ffc107; }
    .dot-red { background-color: #dc3545; }
    .progress {
      height: 8px;
      background-color: #f1f3f5;
    }
    .bar-label {
      font-size: 0.95rem;
    }



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

    <section class="content">
        <div class="card mx-auto bg-white p-4 rounded">
            <div class="card-body d-flex mb-4">
                <div class="user-avatar2 me-3">
                    <span id="shortName">AN</span>
                </div>
                <div>
                    <h6 class="mb-0" id="candidateName">Abinash Nayak</span></h6>
                    <strong><span id="batchName">HR&KM</span> - <span id="paperName">Programmer</span></strong><br>
                    <small class="text-muted">Finished <span id="completedOn">02 May, 2025</span></small>
                </div>
                <div class="ms-auto d-flex align-items-center gap-5">
                    <div class="d-flex flex-wrap gap-4 justify-content-start">
                        <a href="https://tmipartners.tminetwork.com/index.php/indents" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                            <div class="small-box bg-primary rounded">
                                <div class="inner">
                                    <h3 class="text-white" id="totalOpenIndents">77</h3>
                                    <p class="text-white">Total Skills</p>
                                </div>
                                <div class="icon"><i class="bi bi-lightbulb"></i></div>
                            </div>
                        </a>
                        <a href="https://tmipartners.tminetwork.com/index.php/acceptedindent" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                            <div class="small-box bg-success rounded">
                                <div class="inner">
                                    <h3 class="text-white">95%</h3>
                                    <p class="text-white">AI Score</p>
                                </div>
                                <div class="icon"><i class="bi bi-magic"></i></div>
                            </div>
                        </a>
                        <a href="https://tmipartners.tminetwork.com/index.php/partners" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                            <div class="small-box bg-danger rounded">
                                <div class="inner">
                                    <h3 class="text-white">5</h3>
                                    <p class="text-white">Critial Gap</p>
                                </div>
                                <div class="icon"><i class="bi bi-graph-down-arrow"></i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="min-height: 444px;">
                        <h5 class="card-title">Skill Level Comparison</h5>
                        <canvas id="skillChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="min-height: 444px;">
                        <h5 class="card-title">Skill Gap Analysis</h5>
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Skill</th>
                                    <th>Required Level</th>
                                    <th>Current Level</th>
                                    <th>Gap</th>
                                    <th>Training Needed</th>
                                </tr>
                            </thead>
                            <tbody id="skillTable">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="min-height: 485px;">
                        <h5 class="card-title">Recommendations</h5>
                        <ul id="recommendations">
                        </ul>

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gap Severity Breakdown</h5>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 label"><i class="bi bi-circle-fill"></i> On Target</div>
                            <div class="col-lg-4 col-md-4 text-end">50</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 label"><i class="bi bi-circle-fill"></i> Minor Gap (≤10%)</div>
                            <div class="col-lg-4 col-md-4 text-end">5</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 label"><i class="bi bi-circle-fill"></i> Moderate Gap (11-20%)</div>
                            <div class="col-lg-4 col-md-4 text-end">50</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 label"><i class="bi bi-circle-fill"></i> Critical Gap (>20%)</div>
                            <div class="col-lg-4 col-md-4 text-end">50</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Skill Proficiency Distribution</h5>

                        <!-- Expert -->
                        <div class="d-flex justify-content-between align-items-center bar-label">
                        <div><span class="dot dot-green"></span> Expert (80–100%)</div>
                        <div>2</div>
                        </div>
                        <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width: 10%"></div>
                        </div>

                        <!-- Advanced -->
                        <div class="d-flex justify-content-between align-items-center bar-label">
                        <div><span class="dot dot-blue"></span> Advanced (60–79%)</div>
                        <div>5</div>
                        </div>
                        <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width: 25%"></div>
                        </div>

                        <!-- Intermediate -->
                        <div class="d-flex justify-content-between align-items-center bar-label">
                        <div><span class="dot dot-yellow"></span> Intermediate (40–59%)</div>
                        <div>7</div>
                        </div>
                        <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width: 35%"></div>
                        </div>

                        <!-- Beginner -->
                        <div class="d-flex justify-content-between align-items-center bar-label">
                        <div><span class="dot dot-red"></span> Beginner (0–39%)</div>
                        <div>4</div>
                        </div>
                        <div class="progress mb-3">
                        <div class="progress-bar bg-primary" style="width: 20%"></div>
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

  const skillTable = document.getElementById("skillTable");
  const recommendations = document.getElementById("recommendations");

  skills.forEach(skill => {
    const gap = skill.required - skill.current;
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${skill.name}</td>
      <td>${skill.required}</td>
      <td>${skill.current}</td>
      <td class="${gap > 0 ? 'text-danger' : 'text-success'}">${gap > 0 ? '-' + gap : '0'}</td>
      <td>${gap > 0 ? 'Yes' : 'No'}</td>
    `;
    skillTable.appendChild(row);

    if (gap > 0) {
      const li = document.createElement("li");
      li.textContent = `Improve ${skill.name} from level ${skill.current} to ${skill.required}.`;
      recommendations.appendChild(li);
    }
  });

  // Chart
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