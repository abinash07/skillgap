<style>
    .description-text.clamped {
        display: inline;
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        max-width: 90%;
    }
</style>

<main id="main" class="main">
    <!-- Search Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Search Skills, Posts & People</h2>

            <!-- Search Bar -->
            <form class="search-bar d-flex" role="search">
                <input class="form-control form-control-lg me-2" type="search" placeholder="Search for a skill or person..." aria-label="Search" />
                <button class="btn btn-primary btn-lg" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <!-- Filters -->
            <div class="text-center mt-4">
                <div class="btn-group" role="group" aria-label="Search filters">
                    <input type="radio" class="btn-check" name="filter" id="skills" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="skills"><i class="bi bi-lightbulb"></i> Skills</label>

                    <input type="radio" class="btn-check" name="filter" id="posts" autocomplete="off">
                    <label class="btn btn-outline-primary" for="posts"><i class="bi bi-chat-text"></i> Posts</label>

                    <input type="radio" class="btn-check" name="filter" id="people" autocomplete="off">
                    <label class="btn btn-outline-primary" for="people"><i class="bi bi-person"></i> People</label>
                </div>
            </div>

            <div class="row mt-5 g-4" id="searchResult">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title p-0">Python</h5>
                            <p class="card-text text-muted">Master data handling, APIs, and automation scripts.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title p-0">UI/UX Design</h5>
                            <p class="card-text text-muted">Explore creative design ideas and share your daily design micro-posts.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Posts</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title p-0">JavaScript</h5>
                            <p class="card-text text-muted">Enhance your frontend logic with daily micro-tips and code snippets.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Posts</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>


<script>
    $(document).ready(function() {
        $(".search-bar").on("submit", function(e) {
            e.preventDefault();

            let query = $("input[type='search']").val().trim();
            let filter = $("input[name='filter']:checked").attr('id');

            if (query === "") {
                alert("Please enter something to search.");
                return;
            }

            // AJAX Call
            $.ajax({
                url: "<?= base_url('searchme'); ?>",
                method: "POST",
                dataType: "json",
                data: { query: query, filter: filter },
                beforeSend: function() {
                    $("#searchResult").html(`<div class="text-center py-5"><div class="spinner-border text-primary" role="status"></div><p class="mt-3">Searching...</p></div>`);
                },
                success: function(response) {
                    if (response.status && response.result.length > 0) {
                        $('#searchResult').html('');
                        if(filter == 'skills'){
                            $.each(response.result, function(index, item) {
                                let fullText = item.description || "";
                                let shortText = fullText.length > 50 ? fullText.substring(0, 50) + "..." : fullText;
                                let showReadMore = fullText.length > 50;
                                $('#searchResult').append(
                                    `<div class="col-md-4">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-body">
                                                <h5 class="card-title p-0">${item.name}</h5>
                                                <p class="description-text-container">
                                                    <span class="description-text clamped" 
                                                        data-full="${fullText.replace(/"/g, '&quot;')}" 
                                                        data-short="${shortText.replace(/"/g, '&quot;')}">
                                                        ${shortText}
                                                    </span>
                                                    ${showReadMore ? `<a href="javascript:void(0);" class="read-more small text-primary ms-1">Read more</a>` : ""}
                                                </p>
                                                <a href="<?= base_url('posts/'); ?>${item.slug}" class="btn btn-outline-primary btn-sm">View Posts</a>
                                            </div>
                                        </div>
                                    </div>`
                                );
                            });
                        }
                        if(filter == 'posts'){
                            $.each(response.result, function(key, val) {
                                let fullText = val.content || "";
                                let shortText = fullText.length > 60 ? fullText.substring(0, 60) + "..." : fullText;
                                let showReadMore = fullText.length > 60;
                                $('#searchResult').append(
                                    `<div class="col-md-4">
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
                                    </div>`
                                );
                            });
                        }

                        if(filter == 'people'){
                            $.each(response.result, function(key, val) {
                                $('#searchResult').append(
                                    `<div class="col-md-4">
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-body">
                                                <a href="<?= base_url(''); ?>${val.username}">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="<?= base_url('uploads/profile/'); ?>${val.image}" class="rounded-circle me-2" alt="User" style="height: 45px; border: 2px solid #E4E7FA;">
                                                        <div>
                                                            <p class="mb-0" style="color: #252525;"><strong>${val.name}</strong></p>
                                                            <p class="mb-0"><small class="text-muted">Posts: ${val.no_of_post}</small></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>`
                                );
                            });
                        }
                    } else {
                        $("#searchResult").html(`<div class="text-center py-5 text-muted"><i class="bi bi-search"></i> No results found for "${query}"</div>`);
                    }
                },
                error: function() {
                    $("#searchResult").html(`<div class="text-center py-5 text-danger">Error fetching results. Please try again.</div>`);
                }
            });
        });
    });
</script>
