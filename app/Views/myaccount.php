<link rel="stylesheet" href="https://foliotek.github.io/Croppie/croppie.css">
<script src="https://foliotek.github.io/Croppie/croppie.js"></script>
<style>
    .sk-modal{			
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
    }
    .sk-modal::-webkit-scrollbar{
        display: none;
    }
    .modal-body{
        background-color: #fefefe;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 0;
        border: 1px solid #888;
        width: 95%;
        max-width: 400px;
        border-radius: 5px;
    }
    .modal-close{
        font-size: 20px;
        color: #262626;
        position: absolute;
        top: 6px;
        right: 2.5%;
        cursor: pointer;
    }

    .skimagecrop{
        width: 100%;
        border-radius: 5px;
    }
    #formhead{
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }
    #upload-demo{
        width: 100%;
        height: 400px;
        padding-bottom: 40px;
    }
    .skimagecrop button{
        background-color: #1877F2;
        color: white;
        padding: 12px 20px;
        border: none;
        cursor: pointer;
        text-align: center;
        width: 95%;
        margin: 10px 2.5%;
        border-radius: 5px;
        position: relative;
    }
    .skimagecrop button:hover {
        opacity: 0.8;
    }
    .crop-option:after{
        content: "";
        display: table;
        clear:both;
    }

    .paper-clip{
        position: absolute;
        right: 15px;
        top: 8px;
        font-size: 20px;
        transform: rotate(-122deg);
    }
    .description-text.clamped {
        display: inline;
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        max-width: 90%;
    }
    
</style>

<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="profile bg-white" style="padding: 30px 20px;">
                        <img src="<?= base_url('uploads/profile/'); ?><?= $account->image; ?>" alt="Profile" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #E4E7FA;">
                        <h5 class="fw-semibold mb-0"><?= $account->name; ?></h5>
                        <p class="mb-2 fw-semibold" style="font-size: 14px; cursor: pointer;">@<?= $account->username; ?> <i id="shareLink" class="bi bi-share text-primary"></i></p>

                        <!-- <button class="btn btn-primary btn-sm mb-3 mt-2" style="font-size: 13px;">Follow</button> -->
                        <button id="followBtn" class="btn btn-primary btn-sm mb-3 mt-2" style="font-size: 13px;"><span id="buttonText"></span></button>
                        <a href="<?= base_url(); ?>settings" class="btn btn-primary btn-sm mb-3 mt-2" style="font-size: 13px;"><i class="bi bi-gear-fill"></i></a>

                        <p id="bio"><?= $account->bio; ?></p>

                        <div class="d-flex justify-content-around text-center border-top pt-3">
                            <div>
                                <h6 class="mb-0"><?= $account->views; ?></h6>
                                <small class="text-muted">Views</small>
                            </div>
                            <div>
                                <h6 class="mb-0" id="follower"><?= $account->follower; ?></h6>
                                <small class="text-muted">Followers</small>
                            </div>
                            <div>
                                <h6 class="mb-0" id="following"><?= $account->following; ?></h6>
                                <small class="text-muted">Following</small>
                            </div>
                        </div>

                        <div class="text-start mt-4 small">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-envelope-fill me-2 text-primary"></i>
                                <span><?= $account->email; ?></span>
                            </div>
                            <!-- <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-globe me-2 text-primary"></i>
                                <a href="https://johndoe.com" target="_blank" class="text-decoration-none">johndoe.com</a>
                            </div> -->
                            <?php if(!empty( $account->occupation)){ ?>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-briefcase-fill me-2 text-primary"></i>
                                <span><?= $account->occupation; ?></span>
                            </div>
                            <?php } ?>
                            <!-- <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-building me-2 text-primary"></i>
                                <span>Currently at Google</span>
                            </div> -->
                            <?php if(!empty($account->education)){ ?>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-mortarboard-fill me-2 text-primary"></i>
                                <span><?= $account->education; ?></span>
                            </div>
                            <?php } ?>
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
                                    <button class="nav-link" id="mySkillTab" data-bs-toggle="tab" data-bs-target="#profile-skill" aria-selected="true" role="tab">My Skills</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Change Password</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                    <div id="posts"></div>
                                </div>

                                <div class="tab-pane fade profile-skill" id="profile-skill" role="tabpanel">
                                    <div class="row g-3" id="skill"></div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                                    <form id="profileEditForm">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img id="uploadpreview" src="<?= base_url('uploads/profile/'); ?><?= $account->image; ?>" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="javascript:void(0);" onclick="chooseImage();" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <input type="file" name="img-input" id="img-input" style="display: none; visibility: hidden; width: 1px;" accept="image/png, image/gif, image/jpeg"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="name" id="name" value="<?= $account->name; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="email" class="form-control" name="email" id="Email" value="<?= $account->email; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bio" class="col-md-4 col-lg-3 col-form-label">Bio</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control" name="bio" id="bio" style="height: 100px"><?= $account->bio; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Occupation</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="occupation" id="occupation" value="<?= $account->occupation; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="education" class="col-md-4 col-lg-3 col-form-label">Education</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="education" id="education" value="<?= $account->education; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Link" class="col-md-4 col-lg-3 col-form-label">Link 1</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="link_one" id="link_one" value="<?= $account->link_one; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Link" class="col-md-4 col-lg-3 col-form-label">Link 2</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="link_two" id="link_two" value="<?= $account->link_two; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Link" class="col-md-4 col-lg-3 col-form-label">Link 3</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="link_three" id="link_three" value="<?= $account->link_three; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Link" class="col-md-4 col-lg-3 col-form-label">Link 4</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="link_four" id="link_four" value="<?= $account->link_four; ?>">
                                            </div>
                                        </div>
                                        <div id="profileAlert" class="mt-3"></div>

                                        <input type="hidden" name="old_image" id="old_image" value="<?= $account->image; ?>">
                                        <button type="submit" class="btn btn-primary" id="saveBtn">
                                            <span class="button-text">Save Changes</span>
                                            <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                        </button>
                                    </form>
                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                    <form id="reset_password_form">
                                        <div class="row mb-3">
                                            <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter your current password" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter your new password" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter your confirm password" required>
                                            </div>                          
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<div class="sk-modal" id="cropModal">
    <div id="cover"> </div>
    <div class="modal-body" id="modal-more">
        <div class="modal-close" onclick='closeit();'><i class="fa fa-times"></i></div>
        <div class="skimagecrop">
            <p id="formhead">Crop</p>
            <div id="upload-demo" class="center-block" style="display: block;"></div>
            <p id="errormsg"></p>
            <button type="button" id="cropImageBtn" class="btn btn-primary">
                <div id="loader"><div class="spnier"></div></div> Upload
            </button>
        </div>
    </div>
</div>


<div class="share-modal">
    <div class="share-body">
        <div class="share-close" id='closeShare'><i class="fa fa-times"></i></div>
        <p id="share-modal-head">Share</p>
        <div class="sharebox1">

            <a href=''><i class="bi bi-share"></i></a>
            <a href="javascript:void(0)" onclick="copyElementText('profilelink')"><i id='copy' class="bi bi-copy"></i></a>
            <a href='https://www.facebook.com/sharer/sharer.php?u=https://skillkr.com/<?= $account->username; ?>' target="_blank"><i id="facebook" class="bi bi-facebook"></i></a>
            <a href='https://api.whatsapp.com/send?text=https://skillkr.com/<?= $account->username; ?>' target="_blank"><i id="whatsapp" class="bi bi-whatsapp"></i></a>

            <p id="sharehelptext">Let's people see your skill, Share your profile to rich more people.</p>
        </div>
        <p id="profilelink" style="display: none;">https://skillkr.com/<?= $account->username; ?></p>
    </div>
</div>

<div class="share-modal-two">
    <div class="share-body">
        <div class="share-close" id='closeShare'><i class="fa fa-times"></i></div>
        <p id="share-modal-head-two">Share</p>
        <div class="sharebox1">

            <a href=''><i class="bi bi-share"></i></a>
            <a href="javascript:void(0)" onclick="copyElementText('profilelink')"><i id='copy' class="bi bi-copy"></i></a>
            <a href='' target="_blank"><i id="facebook" class="bi bi-facebook"></i></a>
            <a href='' target="_blank"><i id="whatsapp" class="bi bi-whatsapp"></i></a>

            <p id="sharehelptext">Let's people see your skill, Share your profile to rich more people.</p>
        </div>
        <p id="profilelink" style="display: none;"></p>
    </div>
</div>

<script>
    var mySkillTabCliked = 0;
    var isFollowed = <?php echo $account->is_followed == 1 ? 'true' : 'false'; ?>;
    let buttonText = "<?php echo $account->is_followed == 1 ? 'Following' : 'Follow'; ?>";
    $('#buttonText').html(buttonText);

    getMyPost();
    function getMyPost(){
        $.ajax({
            url: "<?php echo base_url('getmypost'); ?>",
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
                        $('#posts').append(
                            `<div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="<?= base_url('uploads/profile/'); ?><?= $account->image; ?>" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                        <div>
                                            <p class="mb-0" style="color: #252525;"><strong>${val.name}</strong></p>
                                            <p class="mb-0"><small class="text-muted">${val.time}</small></p>
                                        </div>
                                    </div>
                                    <p class="mb-2 description-text-container">
                                        <span class="description-text clamped">
                                            ${shortText}
                                        </span>
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
                    $('#posts').html(
                        `<div class="text-center py-5 my-4 border rounded-3 bg-light" id="noPostBox">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 150" width="120" opacity="0.7">
                                <rect x="20" y="40" width="160" height="90" rx="10" ry="10" fill="#f8f9fa" stroke="#ced4da" stroke-width="2"/>
                                <path d="M20 60 L60 30 L140 30 L180 60 Z" fill="#e9ecef" stroke="#adb5bd" stroke-width="2"/>
                                <circle cx="100" cy="95" r="14" fill="#dee2e6"/>
                                <line x1="100" y1="95" x2="100" y2="83" stroke="#adb5bd" stroke-width="3"/>
                                <circle cx="100" cy="72" r="2" fill="#adb5bd"/>
                            </svg>
                            <h5 class="fw-semibold text-muted mb-2">No posts available</h5>
                            <p class="text-secondary mb-3">You haven’t shared anything yet. Start by adding your first post!</p>
                            <a href="<?= base_url('addpost'); ?>" class="btn btn-primary btn-sm px-4">
                                <i class="bi bi-plus-circle me-1"></i> Add Post
                            </a>
                        </div>`
                    );
                }
            },
            complete: function () {

            }
        });
    }

    $('#mySkillTab').on('click',function(e){
        e.preventDefault();
        if(mySkillTabCliked == 0){
            getMySkill();
            mySkillTabCliked++;
        }
    });


    function getMySkill(){
        $.ajax({
            url: "<?php echo base_url('getmyskill'); ?>",
            method: "POST",
            data: {},
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
                    $('#skill').html(
                        `<div class="text-center py-5 my-4 border rounded-3 bg-light" id="noPostBox">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 150" width="120" opacity="0.7">
                                <rect x="20" y="40" width="160" height="90" rx="10" ry="10" fill="#f8f9fa" stroke="#ced4da" stroke-width="2"/>
                                <path d="M20 60 L60 30 L140 30 L180 60 Z" fill="#e9ecef" stroke="#adb5bd" stroke-width="2"/>
                                <circle cx="100" cy="95" r="14" fill="#dee2e6"/>
                                <line x1="100" y1="95" x2="100" y2="83" stroke="#adb5bd" stroke-width="3"/>
                                <circle cx="100" cy="72" r="2" fill="#adb5bd"/>
                            </svg>
                            <h5 class="fw-semibold text-muted mb-2">No skills yet</h5>
                            <p class="text-secondary mb-3">You haven’t shared anything yet. Start by adding your first skill!</p>
                            <a href="<?= base_url('addskill'); ?>" class="btn btn-primary btn-sm px-4">
                                <i class="bi bi-plus-circle me-1"></i> Add Skill
                            </a>
                        </div>`
                    );
                }
            },
            complete: function () {

            }
        });
    }




    $(document).ready(function() {
        $("#profileEditForm").on("submit", function(e) {
            e.preventDefault();

            const form = this;
            form.classList.add('was-validated');
            if (!form.checkValidity()) return;

            const formData = new FormData(form);
            const $btn = $("#saveBtn");
            const $spinner = $btn.find(".spinner-border");
            const $text = $btn.find(".button-text");
            const $alert = $("#profileAlert");

            // Disable button and show loader
            $btn.prop("disabled", true);
            $spinner.removeClass("d-none");
            $text.text("Saving...");

            $.ajax({
                url: "<?= base_url('/updateaccount'); ?>",
                type: "POST",
                enctype: "multipart/form-data",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        $alert.html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i> ${res.message || 'Profile updated successfully!'}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        `);
                    } else {
                        $alert.html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-1"></i> ${res.message || 'Failed to update profile.'}
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
                    $text.text("Save Changes");
                }
            });
        });
    });

    $(document).ready(function() {
        $('#reset_password_form').on('submit', function(e) {
            e.preventDefault();

            const form = this;
            const $btn = $(form).find('button[type="submit"]');
            const originalBtnText = $btn.text();
            const $alertContainer = $('#resetPasswordAlert');

            // Optional: simple validation
            const newPassword = $('#new_password').val();
            const confirmPassword = $('#confirm_password').val();
            if (newPassword !== confirmPassword) {
                if (!$alertContainer.length) {
                    $(form).prepend('<div id="resetPasswordAlert"></div>');
                }
                $('#resetPasswordAlert').html('<div class="alert alert-danger">New password and confirm password do not match.</div>');
                return;
            }

            // Disable button while processing
            $btn.prop('disabled', true).text('Changing...');

            $.ajax({
                url: "<?= base_url('/change_password'); ?>",
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function(res) {
                    if (!$alertContainer.length) {
                        $(form).prepend('<div id="resetPasswordAlert"></div>');
                    }

                    if (res.status) {
                        $('#resetPasswordAlert').html(`<div class="alert alert-success">${res.message}</div>`);
                        form.reset();
                    } else {
                        $('#resetPasswordAlert').html(`<div class="alert alert-danger">${res.message || 'Failed to update password.'}</div>`);
                    }
                },
                error: function(xhr, status, error) {
                    if (!$alertContainer.length) {
                        $(form).prepend('<div id="resetPasswordAlert"></div>');
                    }
                    $('#resetPasswordAlert').html('<div class="alert alert-danger">Server error! Please try again later.</div>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text(originalBtnText);
                }
            });
        });
    });


    var $uploadCrop,
    rawImg;
    var quality = 0.8;

    function chooseImage(){
        document.getElementById('img-input').click();
    }

    $('#img-input').on('change', function (ev) {
        var userImage = document.getElementById('img-input');
        var filename = userImage.value;
        if(filename!=''){
            var extdot = filename.lastIndexOf(".")+1;
            var image_ext = filename.substr(extdot,filename.lenght).toLowerCase();
            if (image_ext == "jpg" || image_ext == "jpeg" || image_ext == "png" || image_ext == "gif"|| image_ext == "jgfif") {

                $uploadCrop = $('#upload-demo').croppie({
                    viewport: {
                        width: 200,
                        height: 200,
                        //type: 'circle'
                    },
                    enforceBoundary: true,
                    enableExif: true,
                    mouseWheelZoom: false,
                });

                const file = ev.target.files[0];
                const blobURL = URL.createObjectURL(file);
                const skimg = new Image();
                skimg.src = blobURL;

                skimg.onload = function () {
                    $('#cropModal').css('display','block');
                    $uploadCrop.croppie('bind', {
                        url: blobURL
                    }).then(function () {
                        console.log('jQuery bind complete');
                    });
                };

            }else{
                $("#modal").show();
                $("#pm").html("Only jpg, jpeg, png, gif file allow to upload.");
            }
        }
    });

    $('#cropImageBtn').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            size: {width: 200, height: 200},
            size: 'original',
            quality: quality
        }).then(function (resp) {
            $('#uploadpreview').attr('src', resp);
            $('#cropModal').css('display','none');
            //uploadProfilePicture(resp);

            if ($('#cropped_image').length === 0) {
                $('#profileEditForm').append('<input type="hidden" name="cropped_image" id="cropped_image">');
            }
            $('#cropped_image').val(resp);

            closeit();
        });
    });


    function destroyCroppie() {
        if ($uploadCrop) {
            $uploadCrop.croppie('destroy');
            $uploadCrop = null;
            $('#img-input').val(null);
            $('#cropModal').css('display','none');
        }
    }

    function closeit(){
        destroyCroppie();
    }


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

    $('#shareLink').on('click',function(e){
        e.preventDefault();
        $('.share-modal').css('display','block');
    });

    $(window).click(function (event) {
        if ($(event.target).is(".share-modal-two")) {
            $(".share-modal").css("display", "none");
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
        let currentCount2 = parseInt($('#following').text());
        let followed = isFollowed;

        if(!followed){
            $('#buttonText').html('Following');
            $('#follower').text(currentCount + 1);
            $('#following').text(currentCount2 + 1);
            isFollowed = true;
            $.ajax({
                url: "<?= base_url('insertmyfollow'); ?>",
                method: "POST",
                data: { follow: 1 },
                success: function(res){
                    console.log("Liked successfully:", res);
                },
                error: function(){
                    console.log("Error while liking post");
                }
            });
        } else {
            // $('#buttonText').html('Follow');
            // $('#follower').text(currentCount - 1);
            // $('#following').text(currentCount2 - 1);
            // isFollowed = false;
            // $.ajax({
            //     url: "<?= base_url('insertmyfollow'); ?>",
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