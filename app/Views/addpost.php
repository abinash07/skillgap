<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <form id="postForm">
                                <div class="mb-3">
                                    <label for="skillSelect" class="form-label fw-semibold">Select Skill <span class="text-danger">*</span></label>
                                    <select id="skillSelect" name="skillid" id="skillid" class="form-select" required>
                                        <option value="">Select Skill</option>
                                        <?php foreach($skill as $k => $v){ ?>
                                            <option value="<?= $v->slug; ?>"><?= $v->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a skill.</div>
                                </div>
                                <div class="mb-3">
                                    <textarea name="content" id="content" class="form-control" placeholder="Share your thoughts, skills, or updates..." required></textarea>
                                    <div class="invalid-feedback">Please enter some text.</div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary btn-sm px-4" id="postBtn">
                                        <span class="button-text"><i class="bi bi-send me-1"></i> Post</span>
                                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="postAlert" class="mt-2"></div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function () {
        $('#content').summernote({
            placeholder: 'Share your thoughts, skills, or updates...',
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],

            ]
        });

        $("#postForm").on("submit", function (e) {
            e.preventDefault();
            var formdata = new FormData(this);

            const form = this;
            form.classList.add('was-validated');

            if (!form.checkValidity()) return;

            const $btn = $("#postBtn");
            const $spinner = $btn.find(".spinner-border");
            const $text = $btn.find(".button-text");
            const $alert = $("#postAlert");

            // Disable button & show loader
            $btn.prop("disabled", true);
            $spinner.removeClass("d-none");
            $text.text("Posting...");

            $.ajax({
                url: "<?= base_url('/insertpost'); ?>",
                method: "POST",
                enctype: "multipart/form-data",
                data: formdata,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        $alert.html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i> ${res.message || 'Post added successfully!'}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `);
                        form.reset();
                        form.classList.remove('was-validated');
                    } else {
                        $alert.html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> ${res.message || 'Something went wrong!'}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `);
                    }
                },
                error: function() {
                    $alert.html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                },
                complete: function() {
                    $btn.prop("disabled", false);
                    $spinner.addClass("d-none");
                    $text.html('<i class="bi bi-send me-1"></i> Post');
                }
            });
        });
    });
</script>