<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<main id="main" class="main">
    <section class="section profile">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">

                            <!-- Header -->
                            <div class="text-center mb-4">
                                <h4 class="fw-semibold mb-1"><i class="bi bi-lightbulb me-2 text-primary"></i>Add a New Skill</h4>
                                <p class="text-muted small mb-0">Showcase your expertise with supporting evidence</p>
                            </div>

                            <!-- Alert -->
                            <div id="alertContainer"></div>

                            <!-- Add Skill Form -->
                            <form id="addSkillForm" novalidate>
                            
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Skill Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="e.g. Python, UI Design" required>
                                    <div class="invalid-feedback">Please enter a skill name.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="evidenceLink" class="form-label fw-semibold">Evidence Link</label>
                                    <input type="url" class="form-control" name="url" id="url" placeholder="e.g. Portfolio link, GitHub repo, certificate URL">
                                    <div class="form-text">Optional: Add a link to validate your skill.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Briefly describe your experience with this skill"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="skillLevel" class="form-label fw-semibold">Skill Level</label>
                                    <select class="form-select" name="level" id="level" required>
                                    <option value="">-- Select Level --</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                    <option value="Expert">Expert</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your skill level.</div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                                    <span class="button-text"><i class="bi bi-plus-circle me-1"></i> Add Skill</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<script>

    $(document).ready(function() {
        var skills = [];

        $("#name").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?= base_url('/getpopularskill'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                        var skills = data.result.map(function(item) {
                            return item.name;
                        });
                        response(skills);
                    },
                    error: function() {
                        response([]);
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#name").val(ui.item.value);
                return false;
            }
        });
    });

    $(document).ready(function () {
        $("#addSkillForm").on("submit", function (e) {
            e.preventDefault();

            var formdata = new FormData(this);

            const form = this;
            form.classList.add('was-validated');

            if (!form.checkValidity()) return;


            const $btn = $("#submitBtn");
            const $spinner = $btn.find(".spinner-border");
            const $text = $btn.find(".button-text");
            const $alert = $("#alertContainer");

            // Disable button & show loader
            $btn.prop("disabled", true);
            $spinner.removeClass("d-none");
            $text.text("Adding...");

            $.ajax({
                url: "<?= base_url('/insertskill'); ?>",
                method: "POST",
                enctype: "multipart/form-data",
                data: formdata,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status) {
                        $alert.html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i> ${res.message || 'Skill added successfully!'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                        $("#addSkillForm")[0].reset();
                        form.classList.remove('was-validated');
                    } else {
                        $alert.html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i> ${res.message || 'Something went wrong!'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                    }
                },
                error: function () {
                    $alert.html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
                complete: function () {
                    $btn.prop("disabled", false);
                    $spinner.addClass("d-none");
                    $text.html('<i class="bi bi-plus-circle me-1"></i> Add Skill');
                }
            });
        });
    });
</script>