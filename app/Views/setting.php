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
                <div class="col-md-3 text-center mb-4 mb-md-0">
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
                                <a class="nav-link text-danger" href="#danger-section"><i class="bi bi-power me-2"></i>Logout</a>
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
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" name="email" class="form-control" value="contact@yourapp.com" required>
                                    <div class="form-text">Primary email used for login and notifications.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" value="+91 123 456 7890">
                                </div>
                                <div class="col-12 d-flex gap-2 mt-2">
                                    <button class="btn btn-primary" id="saveAccount">Save</button>
                                    <button type="button" class="btn btn-outline-secondary" id="verifyEmail">Verify Email</button>
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
                                        <input class="form-check-input" type="checkbox" id="notifComments" checked>
                                        <label class="form-check-label" for="notifComments">Comments & replies</label>
                                        </div>
                                        <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="notifMentions">
                                        <label class="form-check-label" for="notifMentions">Mentions</label>
                                        </div>
                                        <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="notifMonthly" checked>
                                        <label class="form-check-label" for="notifMonthly">Monthly summary</label>
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
                                        <option value="public" selected>Public — anyone can view</option>
                                        <option value="connections">Connections only</option>
                                        <option value="private">Private — only you</option>
                                    </select>
                                    <div class="form-text">Change who can view your profile and posts.</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Allow search engines to index my profile</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" id="indexing" type="checkbox" checked>
                                        <label class="form-check-label" for="indexing">Allow indexing</label>
                                    </div>
                                </div>

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
</script>