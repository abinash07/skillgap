<main id="main" class="main">
    <section class="section profile py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <img 
                        src="<?= base_url(); ?>assets/img/testimonials-2.jpg" 
                        alt="Profile" 
                        class="rounded-circle img-fluid mb-3 shadow"
                        style="width: 150px; height: 150px; object-fit: cover;"
                    >
                    <h5 class="mb-2 fw-semibold">John Doe</h5>
                    <button class="btn btn-primary btn-sm mb-3 px-4">Follow</button>
                    <div class="d-flex justify-content-around text-center border-top pt-3">
                        <div>
                            <h6 class="mb-0">1.2K</h6>
                            <small class="text-muted">Views</small>
                        </div>
                        <div>
                            <h6 class="mb-0">350</h6>
                            <small class="text-muted">Followers</small>
                        </div>
                        <div>
                            <h6 class="mb-0">180</h6>
                            <small class="text-muted">Following</small>
                        </div>
                    </div>

                    <div class="text-start mt-4 small">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-fill me-2 text-primary"></i>
                            <span>john.doe@email.com</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-globe me-2 text-primary"></i>
                            <a href="https://johndoe.com" target="_blank" class="text-decoration-none">johndoe.com</a>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-briefcase-fill me-2 text-primary"></i>
                            <span>Software Engineer</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-building me-2 text-primary"></i>
                            <span>Currently at Google</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-mortarboard-fill me-2 text-primary"></i>
                            <span>B.Tech in Computer Science</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="microblog-tab" data-bs-toggle="tab" data-bs-target="#microblog" type="button" role="tab" aria-controls="microblog" aria-selected="true">Posts</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                        </li>
                    </ul>

                    <div class="tab-content border border-top-0 p-3 rounded-bottom" id="profileTabsContent">
                        <div class="tab-pane fade show active" id="microblog" role="tabpanel" aria-labelledby="microblog-tab">
                            <h6 class="fw-semibold mb-3">Recent Posts</h6>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">🚀 Learning Bootstrap 5.3 is super fun and flexible!</p>
                                <small class="text-muted">Posted 2 hours ago</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">💡 Always remember to stay consistent in your learning journey.</p>
                                <small class="text-muted">Posted yesterday</small>
                            </div>

                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">🚀 Learning Bootstrap 5.3 is super fun and flexible!</p>
                                <small class="text-muted">Posted 2 hours ago</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">💡 Always remember to stay consistent in your learning journey.</p>
                                <small class="text-muted">Posted yesterday</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">🚀 Learning Bootstrap 5.3 is super fun and flexible!</p>
                                <small class="text-muted">Posted 2 hours ago</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">💡 Always remember to stay consistent in your learning journey.</p>
                                <small class="text-muted">Posted yesterday</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">🚀 Learning Bootstrap 5.3 is super fun and flexible!</p>
                                <small class="text-muted">Posted 2 hours ago</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">💡 Always remember to stay consistent in your learning journey.</p>
                                <small class="text-muted">Posted yesterday</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">🚀 Learning Bootstrap 5.3 is super fun and flexible!</p>
                                <small class="text-muted">Posted 2 hours ago</small>
                            </div>
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1">💡 Always remember to stay consistent in your learning journey.</p>
                                <small class="text-muted">Posted yesterday</small>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            
                            <div class="row g-3">
                                
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="card-title mb-1 fw-semibold">HTML</h6>
                                            </div>
                                            <p class="small text-muted mb-2">Evidence: <a href="#">Portfolio Link</a></p>
                                            <ul class="list-unstyled small mb-0">
                                                <li><strong>Added:</strong> 12 Jan 2025</li>
                                                <li><strong>Posts:</strong> 8 related posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                               
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="card-title mb-1 fw-semibold">Python</h6>
                                            </div>
                                            <p class="small text-muted mb-2">Evidence: <a href="#">GitHub Repo</a></p>
                                            <ul class="list-unstyled small mb-0">
                                                <li><strong>Added:</strong> 20 Feb 2025</li>
                                                <li><strong>Posts:</strong> 5 related posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                               
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="card-title mb-1 fw-semibold">FastAPI</h6>
                                            </div>
                                            <p class="small text-muted mb-2">Evidence: <a href="#">Demo Project</a></p>
                                            <ul class="list-unstyled small mb-0">
                                                <li><strong>Added:</strong> 25 Mar 2025</li>
                                                <li><strong>Posts:</strong> 3 related posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="card-title mb-1 fw-semibold">Angular</h6>
                                            </div>
                                            <p class="small text-muted mb-2">Evidence: <a href="#">Live App</a></p>
                                            <ul class="list-unstyled small mb-0">
                                                <li><strong>Added:</strong> 10 Apr 2025</li>
                                                <li><strong>Posts:</strong> 6 related posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>