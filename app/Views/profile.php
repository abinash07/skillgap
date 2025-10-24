<style>
    .paper-clip{
        position: absolute;
        right: 15px;
        top: 8px;
        font-size: 20px;
        transform: rotate(-122deg);
    }
</style>
<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="profile bg-white" style="padding: 30px 20px;">
                        <img id="profileImg" src="<?= base_url('assets/img/user-img.png'); ?>" alt="Profile" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #E4E7FA;">
                        <h5 class="fw-semibold mb-0" id="name">---</h5>
                        <p class="mb-2 fw-semibold" style="font-size: 14px; cursor: pointer;"><span id="username"></span> <i id="shareLinkTwo" class="bi bi-share text-primary"></i></p>
                        
                        <button id="followBtn" class="btn btn-primary btn-sm mb-3 mt-2" style="font-size: 13px;"><span id="buttonText"></span></button>
                        <!-- <button class="btn btn-primary btn-sm mb-3 mt-2" style="font-size: 13px;">Following</button> -->
                        <button class="btn btn-primary btn-sm mb-3 mt-2" id="shareLink" style="font-size: 13px;"><i class="bi bi-three-dots-vertical"></i></button>
                        <p id="bio">---</p>
                        <div class="d-flex justify-content-around text-center border-top pt-3">
                            <div>
                                <h6 class="mb-0" id="view">---</h6>
                                <small class="text-muted">Views</small>
                            </div>
                            <div>
                                <h6 class="mb-0" id="follower">---</h6>
                                <small class="text-muted">Follower</small>
                            </div>
                            <div>
                                <h6 class="mb-0" id="following">---</h6>
                                <small class="text-muted">Following</small>
                            </div>
                        </div>

                        <div class="text-start mt-4 small">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-envelope-fill me-2 text-primary"></i>
                                <span id="email">---</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-briefcase-fill me-2 text-primary"></i>
                                <span id="occupation">---</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-building me-2 text-primary"></i>
                                <span id="education">---</span>
                            </div>
                            <!-- <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-globe me-2 text-primary"></i>
                                <a href="https://johndoe.com" target="_blank" class="text-decoration-none">johndoe.com</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card" style="box-shadow: none;">
                        <div class="card-body pt-3">
                            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">My Posts</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="userSkillTab" data-bs-toggle="tab" data-bs-target="#profile-skill" aria-selected="true" role="tab">My Skills</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                    <div id="posts"></div>
                                </div>
                                <div class="tab-pane fade profile-skill" id="profile-skill" role="tabpanel">
                                    <div class="row g-3" id="skill"></div>
                                </div>
                            </div>
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
        <p id="profilelink" style="display: none;">https://snapkar.com/workinghours.php?username=<?php echo $username; ?></p>
    </div>
</div>


<div class="share-modal-two">
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
        <p id="profilelink" style="display: none;">https://snapkar.com/workinghours.php?username=<?php echo $username; ?></p>
    </div>
</div>

<div class="share-modal-three">
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
        <p id="profilelink" style="display: none;">https://snapkar.com/workinghours.php?username=<?php echo $username; ?></p>
    </div>
</div>

<script>
    var username = "<?php echo $username; ?>";
    var userid = "";
    var isFollowed = false;
    var userSkillTabCliked = 0;

    getUserData(username);
    function getUserData(username){
        $.ajax({
            url: "<?php echo base_url('getuserdata'); ?>",
            method: "POST",
            data: {username: username},
            dataType: 'JSON',         
            beforeSend: function () {
                
            },
            success: function(data){
                if(data.status == true){
                    let buttonText = data.result.is_followed == 1 ? 'Following' : 'Follow';
                    isFollowed = data.result.is_followed == 1 ? true : false;
                    userid = data.result.userid;
                    $('#buttonText').html(buttonText);

                    $('#profileImg').attr('src', '<?= base_url('uploads/profile/'); ?>'+data.result.image);
                    $('#name').html(data.result.name);
                    $('#username').html('@'+data.result.username);
                    $('#bio').html(data.result.bio);
                    $('#view').html(data.result.views);
                    $('#follower').html(data.result.follower);
                    $('#following').html(data.result.following);
                    $('#email').html(data.result.email);
                    $('#occupation').html(data.result.occupation);
                    $('#education').html(data.result.education);
                }
                if(data.status == false){

                }
            },
            complete: function () {

            }
        });
    }


    getUserPost(username);
    function getUserPost(username){
        $.ajax({
            url: "<?php echo base_url('getuserpost'); ?>",
            method: "POST",
            data: {username: username},
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
                        $('#posts').append(
                            `<div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="<?= base_url('uploads/profile/'); ?>${val.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                        <div>
                                            <p class="mb-0" style="color: #252525;"><strong>${val.name}</strong></p>
                                            <p class="mb-0"><small class="text-muted">${val.time}</small></p>
                                        </div>
                                    </div>
                                    <p class="mb-2 description-text-container">
                                        <span class="description-text clamped">${shortText}</span>
                                        ${showReadMore ? `<a href="<?= base_url('postdetails'); ?>/${val.id}" class="read-more small text-primary ms-1">Read more</a>` : ""}
                                    </p>
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
                            </div>`
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


    $('#userSkillTab').on('click',function(e){
        e.preventDefault();
        if(userSkillTabCliked == 0){
            getUserSkill(username);
            userSkillTabCliked++;
        }
    });


    function getUserSkill(username){
        $.ajax({
            url: "<?php echo base_url('getuserskill'); ?>",
            method: "POST",
            data: {username: username},
            dataType: 'JSON',         
            beforeSend: function () {
                for (let i = 0; i < 10; i++) {
                    $('#skill').append(
                        `<div class="col-md-6">
                            <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                <div class="card-body">
                                    <h6 class="placeholder-glow mb-2">
                                        <span class="placeholder col-6 bg-secondary"></span>
                                    </h6>
                                    <p class="small placeholder-glow mb-2">
                                        <span class="placeholder col-8 bg-secondary"></span>
                                    </p>
                                    <ul class="list-unstyled small mb-0">
                                        <li class="placeholder-glow mb-1">
                                            <span class="placeholder col-5 bg-secondary"></span>
                                        </li>
                                        <li class="placeholder-glow">
                                            <span class="placeholder col-6 bg-secondary"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>`
                    );
                }
            },
            success: function(data){
                if(data.status == true){
                    $('#skill').html('');
                    $.each(data.result, function (key, val) {
                        let url = val.url 
                            ? `<p class="paper-clip"><a href="${val.url}" target="_blank"><i class="bi bi-paperclip"></i></a></p>` 
                            : "";

                        let fullText = val.description || "";
                        let shortText = fullText.length > 80 ? fullText.substring(0, 80) + "..." : fullText;
                        let showReadMore = fullText.length > 60;

                        $('#skill').append(`
                            <div class="col-md-6">
                                <div class="card h-100 shadow-sm" style="margin-bottom: 0;">
                                    <div class="card-body">
                                        <h6 class="card-title mb-1 fw-semibold" style="padding: 0;">${val.name}</h6>
                                        
                                        <p class="mb-0 description-text-container">
                                            <span class="description-text clamped" 
                                                data-full="${fullText.replace(/"/g, '&quot;')}" 
                                                data-short="${shortText.replace(/"/g, '&quot;')}">
                                                ${shortText}
                                            </span>
                                            ${showReadMore ? `<a href="javascript:void(0);" class="read-more small text-primary ms-1">Read more</a>` : ""}
                                        </p>

                                        <p class="small text-muted mb-0 mt-2">
                                            <strong>Added:</strong> ${val.formatted_date} &nbsp; | &nbsp; 
                                            <strong>Posts:</strong> ${val.no_of_post} related posts
                                        </p>
                                        ${url}
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }
                if(data.status == false){

                }
            },
            complete: function () {

            }
        });
    }

    



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

    $('#shareLink').on('click',function(e){
        e.preventDefault();
        $('.share-modal').css('display','block');
    });

    $('#shareLinkTwo').on('click',function(e){
        e.preventDefault();
        $('.share-modal-two').css('display','block');
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
        if ($(event.target).is(".share-modal-three")) {
            $(".share-modal").css("display", "none");
        }
        if ($(event.target).is(".share-modal-two")) {
            $(".share-modal-two").css("display", "none");
        }
        if ($(event.target).is(".share-modal")) {
            $(".share-modal").css("display", "none");
        }
    });

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

    $(document).on('click', '#followBtn', function (e) {
        e.preventDefault();

        let $this = $(this);
        let currentCount = parseInt($('#follower').text());
        let followed = isFollowed;

        if(!followed){
            // Follow
            $('#buttonText').html('Following');
            $('#follower').text(currentCount + 1);
            isFollowed = true;

            $.ajax({
                url: "<?= base_url('insertfollow'); ?>",
                method: "POST",
                data: { userid: userid, follow: 1 },
                success: function(res){
                    console.log("Liked successfully:", res);
                },
                error: function(){
                    console.log("Error while liking post");
                }
            });

            
        } else {
            // Unfollow
            // $('#buttonText').html('Follow');
            // $('#follower').text(currentCount - 1);
            // isFollowed = false;


            // $.ajax({
            //     url: "<?= base_url('insertfollow'); ?>",
            //     method: "POST",
            //     data: { userid: userid, follow: 0 },
            //     success: function(res){
            //         console.log("Disliked successfully:", res);
            //     },
            //     error: function(){
            //         console.log("Error while disliking post");
            //     }
            // });
        }

        $this.off('click');

    });

</script>