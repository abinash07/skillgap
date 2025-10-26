<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    <div id="posts"></div>
                </div>
                <div class="col-md-4 d-none d-lg-inline">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white fw-semibold">
                            <i class="bi bi-tags me-1 text-primary"></i> Related Posts
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2" id="relatedPosts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="share-modal">
    <div class="share-body">
        <div class="share-close" id='closeShare'><i class="fa fa-times"></i></div>
        <p id="share-modal-head">Share</p>
        <div class="sharebox1">
            <a href=''><i class="bi bi-share"></i></a>
            <a href="javascript:void(0)" onclick="copyElementText('profilelink')"><i id='copy' class="bi bi-copy"></i></a>
            <a href=''><i id="facebook" class="bi bi-facebook"></i></a>
            <a href=''><i id="whatsapp" class="bi bi-whatsapp"></i></a>
            <p id="sharehelptext">Let's people see your skill, Share your profile to rich more people.</p>
        </div>
        <p id="profilelink" style="display: none;">https://snapkar.com/workinghours.php?username=</p>
    </div>
</div>

<script>
    var postId = "<?php echo $id; ?>";
    var skill = "";

    function isMobile() {
        return /Android|iPhone|iPad|iPod|Windows Phone/i.test(navigator.userAgent);
    }

    getSinglePost(postId);
    function getSinglePost(postId){
        $.ajax({
            url: "<?php echo base_url('getsinglepost'); ?>",
            method: "POST",
            data: {postid: postId},
            dataType: 'JSON',         
            beforeSend: function () {
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
            },
            success: function(data){
                if(data.status == true){
                    $('#posts').html('');
                    let heartClass = data.result.is_loved == 1 ? 'bi-heart-fill text-danger' : 'bi-heart';
                    let likedData = data.result.is_loved == 1 ? true : false;
                    skill = data.result.skill_slug;
                    $('#posts').html(`
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <a href="<?= base_url(''); ?>${data.result.username}">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="<?= base_url('uploads/profile/'); ?>${data.result.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                        <div>
                                            <p class="mb-0" style="color: #252525;"><strong>${data.result.name}</strong></p>
                                            <p class="mb-0"><small class="text-muted">${data.result.time}</small></p>
                                        </div>
                                    </div>
                                </a>
                                <div class="mb-3">
                                    ${data.result.content}
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex gap-3">
                                        <a href="javascript:void(0);" class="like-btn text-muted text-decoration-none" data-postid="${data.result.id}" data-liked="${likedData}">
                                            <i class="bi ${heartClass}"></i> <span class="like-count">${data.result.love}</span>
                                        </a>
                                        <a href="javascript:void(0);" class="share-btn text-muted text-decoration-none" data-postid="${data.result.id}"><i class="bi bi-share"></i></a>
                                    </div>
                                    <small class="text-muted"><i class="bi bi-tag"></i> ${data.result.skill}</small>
                                </div>
                            </div>
                        </div>
                    `);
                }
                if(data.status == false){

                }
            },
            complete: function () {
                if (!isMobile()) {
                    getRelatedPost(skill);
                }
            }
        });
    }

    
    function getRelatedPost(skill){
        $.ajax({
            url: "<?php echo base_url('relatedpost'); ?>",
            method: "POST",
            data: {skill: skill, postid: postId},
            dataType: 'JSON',         
            beforeSend: function () {
                for (let i = 0; i < 5; i++) {
                    $('#relatedPosts').append(
                        `<div class="card mb-3 shadow-sm w-100" id="skillCardSkeleton">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="placeholder rounded-circle me-2" style="height:40px;width:40px;"></span>
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
                                </p>
                            </div>
                        </div>`
                    );
                }
            },
            success: function(data){
                if(data.status == true){
                    $('#relatedPosts').html('');
                    $.each(data.result, function (key, val) {
                        let heartClass = val.is_loved == 1 ? 'bi-heart-fill text-danger' : 'bi-heart';
                        let likedData = val.is_loved == 1 ? true : false;
                        let fullText = val.content || "";
                        let shortText = fullText.length > 60 ? fullText.substring(0, 60) + "..." : fullText;
                        let showReadMore = fullText.length > 60;
                        $('#relatedPosts').append(`
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <a href="<?= base_url(''); ?>${val.username}">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="<?= base_url('uploads/profile/'); ?>${val.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                            <div>
                                                <p class="mb-0" style="color: #252525;"><strong>${val.name}</strong></p>
                                                <p class="mb-0"><small class="text-muted">${val.time}</small></p>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="mb-3 description-wrapper">
                                        <span class="description-text clamped">${shortText}</span>
                                        ${showReadMore ? `<a href="<?= base_url('postdetails'); ?>/${val.id}" class="read-more small text-primary ms-1">Read more</a>` : ""}
                                    </div>
                                </div>
                            </div>
                        `);

                    })
                }
                if(data.status == false){
                    $('#relatedPosts').html(
                        `<div class="text-center py-3 border rounded-3 bg-light w-100" id="noPostBox">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 150" width="120" opacity="0.7">
                                <rect x="20" y="40" width="160" height="90" rx="10" ry="10" fill="#f8f9fa" stroke="#ced4da" stroke-width="2"/>
                                <path d="M20 60 L60 30 L140 30 L180 60 Z" fill="#e9ecef" stroke="#adb5bd" stroke-width="2"/>
                                <circle cx="100" cy="95" r="14" fill="#dee2e6"/>
                                <line x1="100" y1="95" x2="100" y2="83" stroke="#adb5bd" stroke-width="3"/>
                                <circle cx="100" cy="72" r="2" fill="#adb5bd"/>
                            </svg>
                            <h5 class="fw-semibold text-muted mb-2">No related posts yet</h5>
                        </div>`
                    );
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

    $(document).on('click', '.share-btn', function (e) {
        e.preventDefault();

        let $this = $(this);
        let postId = $this.data('postid');
        let profileUrl = `https://skillkr.com/postdetails/${postId}`;
        $('#profilelink').text(profileUrl);
        $('#facebook').parent('a').attr('href',`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(profileUrl)}`);
        $('#whatsapp').parent('a').attr('href',`https://api.whatsapp.com/send?text=${encodeURIComponent("Check this out: " + profileUrl)}`);

        $('.share-modal').css('display','block');
    });

    $(window).click(function (event) {
        if ($(event.target).is(".share-modal")) {
            $(".share-modal").css("display", "none");
        }
    });
</script>