<style>
    .read-more {
        cursor: pointer;
    }
</style>
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
                                    <textarea name="content" id="content" class="form-control" rows="3" placeholder="Share your thoughts, skills, or updates..." required></textarea>
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
                    <div id="posts"></div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white fw-semibold">
                            <i class="bi bi-tags me-1 text-primary"></i> Popular Skills
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2" id="popularSkill"></div>
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

                    <!-- <div class="card shadow-sm">
                        <div class="card-header bg-white fw-semibold">
                            <span class="placeholder col-5 bg-secondary"></span>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center">
                                <span class="placeholder rounded-circle bg-secondary me-2" style="width:45px; height:45px;"></span>
                                <div class="flex-grow-1">
                                    <p class="placeholder-glow mb-1">
                                        <span class="placeholder col-6 bg-secondary"></span>
                                    </p>
                                    <p class="placeholder-glow mb-0">
                                        <span class="placeholder col-4 bg-secondary"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <span class="placeholder rounded-circle bg-secondary me-2" style="width:45px; height:45px;"></span>
                                <div class="flex-grow-1">
                                    <p class="placeholder-glow mb-1">
                                        <span class="placeholder col-6 bg-secondary"></span>
                                    </p>
                                    <p class="placeholder-glow mb-0">
                                        <span class="placeholder col-4 bg-secondary"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <span class="placeholder rounded-circle bg-secondary me-2" style="width:45px; height:45px;"></span>
                                <div class="flex-grow-1">
                                    <p class="placeholder-glow mb-1">
                                        <span class="placeholder col-6 bg-secondary"></span>
                                    </p>
                                    <p class="placeholder-glow mb-0">
                                        <span class="placeholder col-4 bg-secondary"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>                
            </div>
        </div>
    </section>
</main>

<script>

$(document).ready(function () {
    $('#content').summernote({
        placeholder: 'Write your question here...',
        height: 100,
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


getPost();
function getPost(){
    $.ajax({
        url: "<?php echo base_url('getpost'); ?>",
        method: "POST",
        data: {},
        dataType: 'JSON',         
        beforeSend: function () {
            for (let i = 0; i < 10; i++) {
                $('#posts').append(
                    `<div class="card mb-3 shadow-sm" id="skillCardSkeleton">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                            <span class="placeholder rounded-circle me-2" style="height:45px;width:45px;"></span>
                            <div class="w-50">
                                <p class="placeholder-glow mb-1">
                                <span class="placeholder col-6"></span>
                                </p>
                                <p class="placeholder-glow mb-0">
                                <span class="placeholder col-4"></span>
                                </p>
                            </div>
                            </div>

                            <p class="placeholder-glow mb-2">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-10"></span>
                            <span class="placeholder col-8"></span>
                            </p>

                            <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-3">
                                <span class="placeholder col-1" style="width: 15px;"></span>
                                <span class="placeholder col-1" style="width: 15px;"></span>
                            </div>
                            <span class="placeholder col-2"></span>
                            </div>
                        </div>
                    </div>`
                );
            }
        },
        success: function(data){
            if(data.status == true){
                $('#posts').html('');
                $.each(data.result, function (key, val) {
                    let heartClass = val.is_loved == 1 ? 'bi-heart-fill text-danger' : 'bi-heart';
                    let likedData = val.is_loved == 1 ? true : false;
                    let fullText = val.content || "";
                    let shortText = fullText.length > 180 ? fullText.substring(0, 180) + "..." : fullText;
                    let showReadMore = fullText.length > 180;
                    $('#posts').append(`
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="<?= base_url('uploads/profile/'); ?>${val.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                    <div>
                                        <strong>${val.name}</strong><br>
                                        <small class="text-muted">${val.time}</small>
                                    </div>
                                </div>

                                <div class="mb-2 description-wrapper">
                                    <span class="description-text clamped"
                                        data-full='${fullText}'
                                        data-short='${shortText}'>
                                        ${shortText}
                                    </span>
                                    ${showReadMore ? `<a href="<?= base_url('postdetails'); ?>/${val.id}" class="read-more small text-primary ms-1">Read more</a>` : ""}
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex gap-3">
                                        <a href="javascript:void(0);" class="like-btn text-muted text-decoration-none" data-postid="${val.id}" data-liked="${likedData}">
                                            <i class="bi ${heartClass}"></i> <span class="like-count">${val.love}</span>
                                        </a>
                                        <a href="#" class="text-muted text-decoration-none"><i class="bi bi-chat"></i> 5</a>
                                    </div>
                                    <small class="text-muted"><i class="bi bi-tag"></i> ${val.skill}</small>
                                </div>
                            </div>
                        </div>
                    `);

                })
            }
            if(data.status == false){

            }
        },
        complete: function () {

        }
    });
}


getPopularSkill();
function getPopularSkill(){
    $.ajax({
        url: "<?php echo base_url('getpopularskill'); ?>",
        method: "POST",
        data: {},
        dataType: 'JSON',         
        beforeSend: function () {
            $('#popularSkill').append(
                `<span class="placeholder bg-secondary col-3" style="height: 20px; width: 50px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; width: 150px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; border-radius: 20px;"></span>
                <span class="placeholder bg-secondary col-3" style="height: 20px; width: 50px; border-radius: 20px;"></span>
                `
            );
        },
        success: function(data){
            if(data.status == true){
                $('#popularSkill').html('');
                $.each(data.result, function (key, val) {
                    $('#popularSkill').append(
                        `<a href="#" class="badge bg-primary-subtle text-primary border border-primary">${val.name}</a>`
                    );
                })
            }
            if(data.status == false){

            }
        },
        complete: function () {

        }
    });
}



$(document).on('click', '.like-btn', function (e) {
    e.preventDefault();

    let $this = $(this);
    let postId = $this.data('postid');
    let $icon = $this.find('i');
    let $count = $this.find('.like-count');
    let currentCount = parseInt($count.text());
    let liked = $this.data('liked') || false; // default false

    if(!liked){
        // Like
        $icon.removeClass('bi-heart').addClass('bi-heart-fill text-danger');
        $count.text(currentCount + 1);
        $this.data('liked', true);

        // API call for like
        $.ajax({
            url: "<?= base_url('insertlove'); ?>",
            method: "POST",
            data: { postid: postId, like: 1 },
            success: function(res){
                console.log("Liked successfully:", res);
            },
            error: function(){
                console.log("Error while liking post");
            }
        });
    } else {
        // Dislike / Unlike
        $icon.removeClass('bi-heart-fill text-danger').addClass('bi-heart');
        $count.text(currentCount - 1);
        $this.data('liked', false);

        // API call for dislike
        $.ajax({
            url: "<?= base_url('insertlove'); ?>",
            method: "POST",
            data: { postid: postId, like: 0 },
            success: function(res){
                console.log("Disliked successfully:", res);
            },
            error: function(){
                console.log("Error while disliking post");
            }
        });
    }
});


</script>