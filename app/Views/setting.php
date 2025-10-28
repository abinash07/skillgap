<style>
    .settings-sidebar { min-height: 400px; }
    .card-section { margin-bottom: 1.25rem; }
    .small-note { font-size: .85rem; color: #6c757d; }
    .danger-box { border-left: 4px solid #dc3545; background: rgba(220,53,69,0.03); }
    .avatar-placeholder { width:72px; height:72px; border-radius:50%; object-fit:cover; border:2px solid #e9eefb; }
</style>
<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center mb-4 mb-md-0 d-none d-lg-inline">
                    <div class="profile bg-white" style="padding: 30px 20px;">
                        <img src="<?= base_url('uploads/profile/'); ?><?= $account->image; ?>" alt="Profile" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #E4E7FA;">
                        <h5 class="fw-semibold mb-0"><?= $account->name; ?></h5>
                        <p class="mb-2 fw-semibold" style="font-size: 14px; cursor: pointer;">@<?= $account->username; ?></p>

                      
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
                            <nav class="nav flex-column" id="settingsNav">
                                <a class="nav-link" href="#account-section"><i class="bi bi-gear me-2"></i>Account</a>
                                <a class="nav-link" href="#notifications-section"><i class="bi bi-bell me-2"></i>Notifications</a>
                                <a class="nav-link" href="#privacy-section"><i class="bi bi-lock me-2"></i>Privacy</a>
                                <a class="nav-link" href="#password-section"><i class="bi bi-shield-lock me-2"></i>Change password</a>
                                <!-- <a class="nav-link" href="#preferences-section"><i class="bi bi-sliders me-2"></i>Preferences</a> -->
                                <a class="nav-link text-danger" href="<?= base_url(); ?>logout"><i class="bi bi-power me-2"></i>Logout</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div id="account-section" class="card card-section shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0 p-0">Account</h5>
                                <small class="small-note">Email, phone and connected accounts</small>
                            </div>
                            <form id="accountForm" class="row g-3">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?= $account->name; ?>" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?= $account->email; ?>" required>
                                    <div class="form-text">Primary email used for login and notifications.</div>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?= $account->username; ?>" required>
                                    <div class="form-text">This will be your unique profile identifier.</div>
                                    <div class="invalid-feedback">Username can contain only letters, numbers, and underscores. No spaces or special characters allowed.</div>
                                </div>

                                <div id="accountAlert"></div>

                                <div class="col-12 d-flex gap-2 mt-2">
                                    <button type="submit" id="saveAccount" class="btn btn-primary" id="saveBtn">
                                        <span class="button-text">Update Changes</span>
                                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                    </button>
                                    <!-- <button type="button" class="btn btn-outline-secondary" id="verifyEmail">Verify Email</button> -->
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="notifications-section" class="card card-section shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0 p-0">Notifications</h5>
                                <small class="small-note">Choose how you receive updates</small>
                            </div>

                            <form id="notificationsForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label d-block">Email Notifications</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notifComments" <?php if($setting[0]['notif_comment'] == 1){ ?> checked <?php } ?>>
                                            <label class="form-check-label" for="notifComments">Comments & replies</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notiflikes" <?php if($setting[0]['notif_like'] == 1){ ?> checked <?php } ?> >
                                            <label class="form-check-label" for="notiflikes">Likes and reactions</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notifMonthly" <?php if($setting[0]['notif_monthly'] == 1){ ?> checked <?php } ?>>
                                            <label class="form-check-label" for="notifMonthly">Monthly summary</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="notifUpdates" <?php if($setting[0]['notif_update'] == 1){ ?> checked <?php } ?>>
                                            <label class="form-check-label" for="notifUpdates">Product updates</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label d-block">Push / Device</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="pushMobile" checked>
                                            <label class="form-check-label" for="pushMobile">Mobile push</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="pushBrowser">
                                            <label class="form-check-label" for="pushBrowser">Browser push</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="notificationsAlert"></div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" id="saveNotifications">Save preferences</button>
                                    <button type="button" class="btn btn-link text-muted" id="resetNotifications">Reset defaults</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="privacy-section" class="card card-section shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0 p-0">Privacy</h5>
                                <small class="small-note">Control who sees your content</small>
                            </div>

                            <form id="privacyForm">
                                <div class="mb-3">
                                <label class="form-label">Profile visibility</label>
                                    <select class="form-select" id="profileVisibility">
                                        <option value="public"  <?php if($setting[0]['profile_visibility'] == "public"){ ?> selected <?php } ?>>Public — anyone can view</option>
                                        <option value="connections" <?php if($setting[0]['profile_visibility'] == "connections"){ ?> selected <?php } ?>>Connections only</option>
                                    </select>
                                    <div class="form-text">Change who can view your profile and posts.</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Allow search engines to index my profile</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" id="indexing" type="checkbox" <?php if($setting[0]['profile_indexing'] == 1){ ?> checked <?php } ?>>
                                        <label class="form-check-label" for="indexing">Allow indexing</label>
                                    </div>
                                </div>

                                <div id="privacyAlert"></div>

                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" id="savePrivacy">Save privacy</button>
                                    <button type="button" class="btn btn-outline-secondary" id="manageBlocked">Manage blocked users</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- <div id="preferences-section" class="card card-section shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title p-0">Preferences</h5>
                            <div class="row gy-3 mt-2">
                                <div class="col-md-4">
                                    <label class="form-label">Language</label>
                                    <select class="form-select" id="language">
                                        <option>English</option>
                                        <option>हिन्दी</option>
                                        <option>বাংলা</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Time zone</label>
                                    <select class="form-select" id="timezone">
                                        <option>(UTC+05:30) Asia/Kolkata</option>
                                        <option>(UTC+00:00) GMT</option>
                                        <option>(UTC+05:00) Pakistan</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label d-block">Theme</label>
                                    <div class="btn-group" role="group" aria-label="theme">
                                        <input type="radio" class="btn-check" name="theme" id="themeLight" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="themeLight">Light</label>

                                        <input type="radio" class="btn-check" name="theme" id="themeDark" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="themeDark">Dark</label>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary" id="savePreferences">Save preferences</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div id="password-section" class="card card-section shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title p-0">Change Password</h5>
                            <form id="changePasswordForm" class="row g-3 mt-2">
                                <div class="col-md-4">
                                    <input type="password" id="currentPassword" class="form-control" placeholder="Current password" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" id="newPassword" class="form-control" placeholder="New password" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm new password" required>
                                </div>

                                <div class="alert-container mb-2"></div>
                                <div class="col-12">
                                    <button class="btn btn-warning" id="changePasswordBtn"><i class="bi bi-key me-1"></i> Change password</button>
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
    $("#accountForm").on("submit", function(e) {
        e.preventDefault();

        const form = this;
        form.classList.add('was-validated');
        if (!form.checkValidity()) return;

        const username = $("#username").val().trim();
        const usernamePattern = /^[A-Za-z0-9_]+$/;

        if (!usernamePattern.test(username)) {
            $("#username")[0].setCustomValidity("Invalid");
            form.classList.add('was-validated');
            return;
        } else {
            $("#username")[0].setCustomValidity("");
        }

        const formData = new FormData(form);
        const $btn = $("#saveAccount");
        const $spinner = $('<span class="spinner-border spinner-border-sm me-2"></span>');
        const $alert = $("#accountAlert");

        // Disable button and show loader
        $btn.prop("disabled", true).prepend($spinner).text("Saving...");

        $.ajax({
            url: "<?= base_url('/updateaccountme'); ?>",
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
                            <i class="bi bi-check-circle me-1"></i>
                            ${res.message || 'Account updated successfully!'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                    setTimeout(() => {
                        $(".alert").fadeOut(500, function() { $(this).remove(); });
                    }, 3000);
                } else {
                    $alert.html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            ${res.message || 'Failed to update account.'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                    setTimeout(() => {
                        $(".alert").fadeOut(500, function() { $(this).remove(); });
                    }, 3000);
                }
            },
            error: function() {
                $alert.html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);
                setTimeout(() => {
                    $(".alert").fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            },
            complete: function() {
                $btn.prop("disabled", false).text("Update Changes").find(".spinner-border").remove();
            }
        });
    });

    // Realtime username restriction
    $("#username").on("input", function() {
        let cleaned = $(this).val().replace(/[^A-Za-z0-9_]/g, "");
        if ($(this).val() !== cleaned) {
            $(this).val(cleaned);
        }
    });




    // 🔹 Handle Notifications Form Submit
    $("#notificationsForm").on("submit", function(e) {
        e.preventDefault();

        const $btn = $("#saveNotifications");
        const $alert = $("#notificationsAlert");
        const $spinner = $('<span class="spinner-border spinner-border-sm me-2"></span>');

        // Disable button + show spinner
        $btn.prop("disabled", true).prepend($spinner).text("Saving...");

        // Gather checkbox values (1 if checked, 0 if not)
        const data = {
            notifComments: $("#notifComments").is(":checked") ? 1 : 0,
            notiflikes: $("#notiflikes").is(":checked") ? 1 : 0,
            notifMonthly: $("#notifMonthly").is(":checked") ? 1 : 0,
            notifUpdates: $("#notifUpdates").is(":checked") ? 1 : 0,
            pushMobile: $("#pushMobile").is(":checked") ? 1 : 0,
            pushBrowser: $("#pushBrowser").is(":checked") ? 1 : 0
        };

        $.ajax({
            url: "<?= base_url('/updatenotification'); ?>",
            type: "POST",
            data: data,
            dataType: "json",
            success: function(res) {
                const alertType = res.status ? 'success' : 'danger';
                const icon = res.status ? 'bi-check-circle' : 'bi-exclamation-triangle';
                const message = res.message || (res.status ? 'Preferences updated successfully!' : 'Failed to update preferences.');

                $alert.html(`
                    <div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
                        <i class="bi ${icon} me-1"></i> ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                setTimeout(() => {
                    $(".alert").fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            },
            error: function() {
                $alert.html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                setTimeout(() => {
                    $(".alert").fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            },
            complete: function() {
                $btn.prop("disabled", false).text("Save preferences").find(".spinner-border").remove();
            }
        });
    });

    // 🔹 Handle Reset Button
    $("#resetNotifications").on("click", function() {
        $("#notifMonthly, #notifUpdates, #pushMobile").prop("checked", true);
        $("#notiflikes, #pushBrowser").prop("checked", false);
    });



    // 🔹 Handle Privacy Form Submission
    $("#privacyForm").on("submit", function(e) {
        e.preventDefault();

        const $btn = $("#savePrivacy");
        const $alert = $("#privacyAlert");
        const $spinner = $('<span class="spinner-border spinner-border-sm me-2"></span>');

        $btn.prop("disabled", true).prepend($spinner).text("Saving...");

        const data = {
            profileVisibility: $("#profileVisibility").val(),
            profileIndexing: $("#indexing").is(":checked") ? 1 : 0
        };

        $.ajax({
            url: "<?= base_url('/updateprivacy'); ?>",
            type: "POST",
            data: data,
            dataType: "json",
            success: function(res) {
                const alertType = res.status ? 'success' : 'danger';
                const icon = res.status ? 'bi-check-circle' : 'bi-exclamation-triangle';
                const message = res.message || (res.status ? 'Privacy settings updated successfully!' : 'Failed to update privacy settings.');

                $alert.html(`
                    <div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
                        <i class="bi ${icon} me-1"></i> ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                setTimeout(() => {
                    $(".alert").fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            },
            error: function() {
                $alert.html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `);

                setTimeout(() => {
                    $(".alert").fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            },
            complete: function() {
                $btn.prop("disabled", false).text("Save privacy").find(".spinner-border").remove();
            }
        });
    });



    $("#changePasswordForm").on("submit", function (e) {
        e.preventDefault();

        const $btn = $("#changePasswordBtn");
        const $alert = $("#password-section .alert-container");
        const $spinner = $('<span class="spinner-border spinner-border-sm me-2"></span>');

        // Create alert container if not exist
        if ($alert.length === 0) {
            $("#password-section .card-body").prepend('<div class="alert-container mb-2"></div>');
        }

        // Get values
        const currentPassword = $("#currentPassword").val().trim();
        const newPassword = $("#newPassword").val().trim();
        const confirmPassword = $("#confirmPassword").val().trim();

        // Validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            showAlert("All fields are required.", "danger");
            return;
        }

        if (newPassword.length < 6) {
            showAlert("New password must be at least 6 characters long.", "warning");
            return;
        }

        if (newPassword !== confirmPassword) {
            showAlert("New and Confirm passwords do not match.", "danger");
            return;
        }

        // Disable button & show spinner
        $btn.prop("disabled", true).prepend($spinner).text("Changing...");

        const data = {
            old_password: currentPassword,
            new_password: newPassword,
            confirm_password: confirmPassword
        };

        $.ajax({
            url: "<?= base_url('/change_password'); ?>",
            type: "POST",
            data: data,
            dataType: "json",
            success: function (res) {
                const alertType = res.status ? "success" : "danger";
                const icon = res.status ? "bi-check-circle" : "bi-exclamation-triangle";
                const message = res.message || (res.status ? "Password changed successfully!" : "Failed to change password.");

                showAlert(`<i class="bi ${icon} me-1"></i> ${message}`, alertType);

                if (res.status) $("#changePasswordForm")[0].reset();
            },
            error: function () {
                showAlert(`<i class="bi bi-exclamation-octagon me-1"></i> Server error! Please try again later.`, "danger");
            },
            complete: function () {
                $btn.prop("disabled", false).html('<i class="bi bi-key me-1"></i> Change password');
            }
        });

        // Alert helper function
        function showAlert(message, type = "info") {
            const alertBox = $(`
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);

            $("#password-section .alert-container").html(alertBox);

            setTimeout(() => {
                alertBox.fadeOut(500, function () { $(this).remove(); });
            }, 3000);
        }
    });

});
</script>
