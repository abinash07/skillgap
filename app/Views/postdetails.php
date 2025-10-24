<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    <div id="posts"></div>
                </div>
                <div class="col-md-4">

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