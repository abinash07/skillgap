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
                            <span style="float: right;">
                                <a class="btn btn-secondary btn-sm" href="<?= base_url(); ?>addskill">
                                    <i class="bi bi-plus-circle-dotted"></i> Add Skill
                                </a>
                            </span>
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
                        <div class="list-group list-group-flush" id="suggestedUser"></div>
                    </div>
                    <ul class="list-unstyled" style="font-size: 12px;">
                        <a href="<?= base_url(); ?>aboutus" class="text-secondary">About Us</a> || 
                        <a href="<?= base_url(); ?>contactus" class="text-secondary">Contact Us</a> ||
                        <a href="<?= base_url(); ?>terms" class="text-secondary">Terms & Conditions</a> ||
                        <a href="<?= base_url(); ?>privacy" class="text-secondary">Privacy Policy</a>
                        <li>© 2025 Skillkr</li>
                    </ul>
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
            <a href='' target="_blank"><i id="facebook" class="bi bi-facebook"></i></a>
            <a href='' target="_blank"><i id="whatsapp" class="bi bi-whatsapp"></i></a>
            <p id="sharehelptext">Let's people see your skills, Share your profile to rich more people.</p>
        </div>
        <p id="profilelink" style="display: none;"></p>
    </div>
</div>

<script>
    function isMobile() {
        return /Android|iPhone|iPad|iPod|Windows Phone/i.test(navigator.userAgent);
    }

    var skip = 0;
    var limit = 2;
    var allLoaded = false;
    getPost(skip, limit);

    $(window).data('ajaxready', true).scroll(function(e) {
        if ($(window).data('ajaxready') == false) return;
        if ($(window).scrollTop() >= ($(document).height() - $(window).height() - 300)) {
            $(window).data('ajaxready', false);

            skip += limit;
            getPost(skip, limit);
        }
    });

    //getPost();
    function getPost(skip, limit){
        $.ajax({
            url: "<?php echo base_url('getpost'); ?>",
            method: "POST",
            data: {skip: skip, top: limit},
            dataType: 'JSON',         
            beforeSend: function () {
                // for (let i = 0; i < 10; i++) {
                //     $('#posts').append(
                //         `<div class="card mb-3 shadow-sm" id="skillCardSkeleton">
                //             <div class="card-body">
                //                 <div class="d-flex align-items-center mb-2">
                //                 <span class="placeholder rounded-circle me-2" style="height:45px;width:45px;"></span>
                //                 <div class="w-50">
                //                     <p class="placeholder-glow mb-1">
                //                     <span class="placeholder col-6"></span>
                //                     </p>
                //                     <p class="placeholder-glow mb-0">
                //                     <span class="placeholder col-4"></span>
                //                     </p>
                //                 </div>
                //                 </div>

                //                 <p class="placeholder-glow mb-2">
                //                 <span class="placeholder col-12"></span>
                //                 <span class="placeholder col-10"></span>
                //                 <span class="placeholder col-8"></span>
                //                 </p>

                //                 <div class="d-flex align-items-center justify-content-between">
                //                 <div class="d-flex gap-3">
                //                     <span class="placeholder col-1" style="width: 15px;"></span>
                //                     <span class="placeholder col-1" style="width: 15px;"></span>
                //                 </div>
                //                 <span class="placeholder col-2"></span>
                //                 </div>
                //             </div>
                //         </div>`
                //     );
                // }

                $('#posts').append(`<div id="loadingSkeletons"></div>`);
                for (let i = 0; i < 5; i++) {
                    $('#loadingSkeletons').append(`
                        <div class="card mb-3 shadow-sm" id="skillCardSkeleton">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="placeholder rounded-circle me-2" style="height:45px;width:45px;"></span>
                                    <div class="w-50">
                                        <p class="placeholder-glow mb-1"><span class="placeholder col-6"></span></p>
                                        <p class="placeholder-glow mb-0"><span class="placeholder col-4"></span></p>
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
                        </div>
                    `);
                }

            },
            success: function(data){
                $('#loadingSkeletons').remove();
                if (data.status === true && data.result.length > 0) {
                    //$('#posts').html('');
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
                    $(window).data('ajaxready', true);
                }
                if(data.status == false){
                    $('#posts').append('<div class="text-center text-muted my-3">No more posts to load.</div>');
                }
            },
            complete: function () {
                
            }
        });
    }

    if (!isMobile()) {
        getPopularSkill();
        getSuggestedUser();
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
                        $('#popularSkill').append(
                            `<a href="<?= base_url('posts/'); ?>${val.slug}" class="badge bg-primary-subtle text-primary border border-primary">${val.name}</a>`
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

    function getSuggestedUser(){
        $.ajax({
            url: "<?php echo base_url('suggesteduser'); ?>",
            method: "POST",
            data: {},
            dataType: 'JSON',         
            beforeSend: function () {
                for (let i = 0; i < 10; i++) {
                    $('#suggestedUser').append(
                        `<div class="list-group-item d-flex align-items-center">
                            <span class="placeholder rounded-circle bg-secondary me-2" style="width:45px; height:45px;"></span>
                            <div class="flex-grow-1">
                                <p class="placeholder-glow mb-1">
                                    <span class="placeholder col-6 bg-secondary"></span>
                                </p>
                                <p class="placeholder-glow mb-0">
                                    <span class="placeholder col-4 bg-secondary"></span>
                                </p>
                            </div>
                        </div>`
                    );
                }
            },
            success: function(data){
                if(data.status == true){
                    $('#suggestedUser').html('');
                    $.each(data.result, function (key, val) {
                        $('#suggestedUser').append(
                            `<a href="<?= base_url(''); ?>${val.username}" class="list-group-item d-flex align-items-center">
                                <img src="<?= base_url('uploads/profile/'); ?>${val.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                <div>
                                    <strong>${val.name}</strong><br>
                                    <small class="text-muted">Posts: ${val.no_of_post}</small>
                                </div>
                            </a>`
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

    function copyElementText(id){
        var text = document.getElementById(id).innerText;
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
        elem.value = text;
        elem.select();
        document.execCommand("copy");
        document.body.removeChild(elem);
        $('#share-modal-head').html('**Link Copied!!');
    }
</script>