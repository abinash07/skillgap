<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="skillSelect" class="form-label fw-semibold">
                                    Select Skill <span class="text-danger">*</span>
                                </label>
                                <select id="skillSelect" class="form-select">
                                    <option value="">-- Choose a skill --</option>
                                    <option value="webdev">Web Development</option>
                                    <option value="design">UI/UX Design</option>
                                    <option value="marketing">Digital Marketing</option>
                                    <option value="python">Python Programming</option>
                                    <option value="writing">Creative Writing</option>
                                </select>
                            </div>
                            <textarea class="form-control mb-3" rows="3" placeholder="Share your thoughts, skills, or updates..."></textarea>
                            <div class="text-end">
                                <button class="btn btn-primary btn-sm px-4"><i class="bi bi-send me-1"></i> Post</button>
                            </div>
                        </div>
                    </div>

                    <!-- Example Post -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="<?= base_url(); ?>assets/img/testimonials-2.jpg" class="rounded-circle me-2" alt="User" style="height: 45px;">
                                <div>
                                    <strong>John Doe</strong><br>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                            </div>
                            <p class="mb-2">🚀 Just finished building my first API using FastAPI! It was super fast and fun to learn.</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <a href="#" class="text-muted text-decoration-none"><i class="bi bi-heart"></i> 24</a>
                                    <a href="#" class="text-muted text-decoration-none"><i class="bi bi-chat"></i> 5</a>
                                </div>
                                <small class="text-muted"><i class="bi bi-tag"></i> FastAPI</small>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="<?= base_url(); ?>assets/img/testimonials-2.jpg" class="rounded-circle me-2" alt="User" style="height: 45px;">
                                <div>
                                    <strong>Priya Sharma</strong><br>
                                    <small class="text-muted">1 day ago</small>
                                </div>
                            </div>
                            <p class="mb-2">💡 Learning Angular components today — this framework is so powerful once you get the hang of it!</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-3">
                                    <a href="#" class="text-muted text-decoration-none"><i class="bi bi-heart"></i> 18</a>
                                    <a href="#" class="text-muted text-decoration-none"><i class="bi bi-chat"></i> 3</a>
                                </div>
                                <small class="text-muted"><i class="bi bi-tag"></i> Angular</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right side: Tags / Skills -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white fw-semibold">
                            <i class="bi bi-tags me-1 text-primary"></i> Popular Skills
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">HTML</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">CSS</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">JavaScript</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">Python</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">FastAPI</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">Angular</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">SQL</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">Docker</a>
                                <a href="#" class="badge bg-primary-subtle text-primary border border-primary">Machine Learning</a>
                            </div>
                        </div>
                    </div>

                    <!-- Optional: Suggested users -->
                    <div class="card mt-4 shadow-sm">
                        <div class="card-header bg-white fw-semibold">
                            <i class="bi bi-people me-1 text-primary"></i> Suggested Users
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item d-flex align-items-center">
                                <img src="<?= base_url(); ?>assets/img/testimonials-2.jpg" class="rounded-circle me-2" alt="User" style="height: 45px;">
                                <div>
                                    <strong>Ravi Kumar</strong><br>
                                    <small class="text-muted">Web Developer</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item d-flex align-items-center">
                                <img src="<?= base_url(); ?>assets/img/testimonials-2.jpg" class="rounded-circle me-2" alt="User" style="height: 45px;">
                                <div>
                                    <strong>Anjali Verma</strong><br>
                                    <small class="text-muted">Data Analyst</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>