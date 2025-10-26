
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
                            <i class="bi bi-tags me-1 text-primary"></i> Popular Skills
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-2" id="popularSkill"></div>
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
    function isMobile() {
        return /Android|iPhone|iPad|iPod|Windows Phone/i.test(navigator.userAgent);
    }

    var skill = "<?php echo $skill; ?>";
    getSkillPost(skill);
    function getSkillPost(skill){
        $.ajax({
            url: "<?php echo base_url('getskillpost'); ?>",
            method: "POST",
            data: {skill: skill},
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
                        let shortText = fullText.length > 150 ? fullText.substring(0, 150) + "..." : fullText;
                        let showReadMore = fullText.length > 150;
                        $('#posts').append(`
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
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex gap-3">
                                            <a href="javascript:void(0);" class="like-btn text-muted text-decoration-none" data-postid="${val.id}" data-liked="${likedData}">
                                                <i class="bi ${heartClass}"></i> <span class="like-count">${val.love}</span>
                                            </a>
                                            <a href="javascript:void(0);" class="share-btn text-muted text-decoration-none" data-postid="${val.id}"><i class="bi bi-share"></i></a>
                                        </div>
                                        <small class="text-muted"><i class="bi bi-tag"></i> ${val.skill}</small>
                                    </div>
                                </div>
                            </div>
                        `);

                    })
                }
                if(data.status == false){
                    $('#posts').html(
                        `<div class="text-center py-5 border rounded-3 bg-light" id="noPostBox">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 150" width="120" opacity="0.7">
                                <rect x="20" y="40" width="160" height="90" rx="10" ry="10" fill="#f8f9fa" stroke="#ced4da" stroke-width="2"/>
                                <path d="M20 60 L60 30 L140 30 L180 60 Z" fill="#e9ecef" stroke="#adb5bd" stroke-width="2"/>
                                <circle cx="100" cy="95" r="14" fill="#dee2e6"/>
                                <line x1="100" y1="95" x2="100" y2="83" stroke="#adb5bd" stroke-width="3"/>
                                <circle cx="100" cy="72" r="2" fill="#adb5bd"/>
                            </svg>
                            <h5 class="fw-semibold text-muted mb-2">No posts yet</h5>
                            <p class="text-secondary mb-3">No one shared any posts yet. Check back later!</p>
                        </div>`
                    );
                }
            },
            complete: function () {

            }
        });
    }

    if (!isMobile()) {
        getPopularSkill();
    }
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
                        if(val.slug == skill){
                            var aclass='skill-active';
                        }else{
                            var aclass='';
                        }
                        
                        $('#popularSkill').append(
                            `<a href="<?= base_url('posts/'); ?>${val.slug}" class="badge bg-primary-subtle text-primary border border-primary ${aclass}">${val.name}</a>`
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