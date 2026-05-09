<?php SESSION_START() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/Assets/CSS/main.css">
    <link rel="stylesheet" href="/Assets/CSS/index-page.css">
    <link rel="stylesheet" href="/Assets/CSS/dashboard-page.css">
</head>

<body>

    <!-- NAV -->
    <nav class="site-nav">
        <div class="nav-bg"></div>
        <div class="nav-brand">
            <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu" onclick="toggleDrawer()">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg>
            </button>
            <div class="nav-brand-center">
                <img src="/Assets/Images/R1.PNG" class="nav-logo" alt="Temple Logo">
                <div class="nav-title">
                    <span class="nav-title-tamil">அருள்மிகு கற்பக விநாயகர் தேவஸ்தானம் - பிரம்றன்</span>
                    <span class="nav-title-english">Arulmigu Katpaga Vinayagar Hindu Temple - Brampton</span>
                </div>
            </div>
            <a href="/logout" class="nav-action">
                <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                </svg>
                Logout
            </a>
        </div>
        <div class="nav-links-bar">
            <a href="/" class="nav-link">Home</a>
            <a href="/calendar" class="nav-link">Calendar</a>
            <a href="/notice" class="nav-link">Notice</a>
            <a href="/gallery" class="nav-link">Gallery</a>
            <span class="nav-link active">Dashboard</span>
        </div>
    </nav>

    <!-- NAV DRAWER -->
    <div class="nav-drawer" id="navDrawer">
        <button class="nav-drawer-close" onclick="closeDrawer()" aria-label="Close">&#x2715;</button>
        <a href="/" class="nav-drawer-link">Home</a>
        <a href="/calendar" class="nav-drawer-link">Calendar</a>
        <a href="/notice" class="nav-drawer-link">Notice</a>
        <a href="/gallery" class="nav-drawer-link">Gallery</a>
        <span class="nav-drawer-link active">Dashboard</span>
        <a href="/logout" class="nav-drawer-link">Logout</a>
    </div>

    <?php
    if (isset($_SESSION['fromAction']) && $_SESSION['fromAction'] === true):
    ?>
        <div class="alert-container" id="alertSecond" style="display:flex;">
            <div class="alert" id="alertContSecond">
                <p><?php echo htmlspecialchars($_SESSION['message']); ?></p>
            </div>
        </div>
        <?php if ($_SESSION['status'] === true): ?>
            <script>
                document.getElementById('alertContSecond').style.backgroundColor = '#1D7524';
            </script>
        <?php else: ?>
            <script>
                document.getElementById('alertContSecond').style.backgroundColor = '#E44C4C';
            </script>
        <?php endif; ?>
        <script>
            document.getElementById('alertSecond').style.display = 'flex';
            setTimeout(() => {
                document.getElementById('alertSecond').style.display = 'none';
            }, 7000);
        </script>
    <?php
        $_SESSION['fromAction'] = false;

        if (!isset($_COOKIE['user'])) {
            header('Location: /');
            echo "<script>window.location.pathname = '/'</script>";
            exit();
        } else {
            $data = base64_decode($_COOKIE['user']);
            $iv = substr($data, 0, 16);
            $encryptedData = substr($data, 16);
            $key = 'YD3rEAXKcb4rc67whX13gR81LAc7YQjXLZgQowkU3/Q=';
            $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
            $passedArray = unserialize($decryptedData);
            $_SESSION['email'] = $passedArray['email'];
            $_SESSION['isSuperAdmin'] = $passedArray['isAdmin'];
        }
    endif;
    ?>

    <!-- TOAST ALERT -->
    <div class="alert-container" id="alert">
        <div class="alert" id="alertCont">
            <p id="alert-text"></p>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="dash-actions">
        <button onclick="handleModel('event-model',true)" class="dash-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
            </svg>
            Event
        </button>
        <button onclick="addListener()" class="dash-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
            </svg>
            Album
        </button>
        <?php if ($_SESSION['isSuperAdmin'] == true): ?>
            <button onclick="handleModel('user-model',true)" class="dash-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                    <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
                </svg>
                Admin
            </button>
        <?php endif; ?>
    </div>

    <!-- ADMINS SECTION (superAdmin only) -->
    <?php if ($_SESSION['isSuperAdmin'] == true): ?>
        <div class="dash-section">
            <div class="dash-section-title">
                <h2>Admins</h2>
            </div>
            <div id="loading-spinner-admin" class="loading-spinner"></div>
            <div id="admin-viewer-content" class="admin-viewer-content"></div>
        </div>
    <?php endif; ?>

    <!-- EVENTS SECTION -->
    <div class="dash-section">
        <div class="dash-section-title">
            <h2>Events</h2>
        </div>
        <div id="loading-spinner" class="loading-spinner"></div>
        <div id="event-viewer-content" class="event-viewer-content"></div>
    </div>

    <!-- ALBUMS SECTION -->
    <div class="dash-section">
        <div class="dash-section-title">
            <h2>Albums</h2>
        </div>
        <div id="loading-spinner2" class="loading-spinner"></div>
        <div id="album-viewer-content" class="album-viewer-content"></div>
        <div id="table-pagi"></div>
    </div>

    <!-- CALENDAR UPDATE -->
    <div class="dash-section">
        <div class="dash-section-title">
            <h2>Calendar Update</h2>
        </div>
        <div id="cal-Form" class="cal-body">
            <div class="cal-lang-col tamil">
                <h3>Tamil</h3>
                <form method="post" id="tamil-sum">
                    <div class="month-row summary-row">
                        <label>Summary</label>
                        <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tsum" id="tsum" required>
                        <button id="tamil-sum-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-jan">
                    <div class="month-row"><label>January</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tjan" id="tjan" required><button id="tamil-jan-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-feb">
                    <div class="month-row"><label>February</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tfeb" id="tfeb" required><button id="tamil-feb-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-mar">
                    <div class="month-row"><label>March</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tmar" id="tmar" required><button id="tamil-mar-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-apr">
                    <div class="month-row"><label>April</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tapr" id="tapr" required><button id="tamil-apr-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-may">
                    <div class="month-row"><label>May</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tmay" id="tmay" required><button id="tamil-may-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-jun">
                    <div class="month-row"><label>June</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tjun" id="tjun" required><button id="tamil-jun-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-jul">
                    <div class="month-row"><label>July</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tjul" id="tjul" required><button id="tamil-jul-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-aug">
                    <div class="month-row"><label>August</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="taug" id="taug" required><button id="tamil-aug-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-sep">
                    <div class="month-row"><label>September</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tsep" id="tsep" required><button id="tamil-sep-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-oct">
                    <div class="month-row"><label>October</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="toct" id="toct" required><button id="tamil-oct-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-nov">
                    <div class="month-row"><label>November</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tnov" id="tnov" required><button id="tamil-nov-btn">Update</button></div>
                </form>
                <form method="post" id="tamil-dec">
                    <div class="month-row"><label>December</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tdec" id="tdec" required><button id="tamil-dec-btn">Update</button></div>
                </form>
            </div>
            <div class="cal-lang-col english">
                <h3>English</h3>
                <form method="post" id="eng-sum">
                    <div class="month-row summary-row">
                        <label>Summary</label>
                        <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="esum" id="esum" required>
                        <button id="eng-sum-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-jan">
                    <div class="month-row"><label>January</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="ejan" id="ejan" required><button id="eng-jan-btn">Update</button></div>
                </form>
                <form method="post" id="eng-feb">
                    <div class="month-row"><label>February</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="efeb" id="efeb" required><button id="eng-feb-btn">Update</button></div>
                </form>
                <form method="post" id="eng-mar">
                    <div class="month-row"><label>March</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="emar" id="emar" required><button id="eng-mar-btn">Update</button></div>
                </form>
                <form method="post" id="eng-apr">
                    <div class="month-row"><label>April</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="eapr" id="eapr" required><button id="eng-apr-btn">Update</button></div>
                </form>
                <form method="post" id="eng-may">
                    <div class="month-row"><label>May</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="emay" id="emay" required><button id="eng-may-btn">Update</button></div>
                </form>
                <form method="post" id="eng-jun">
                    <div class="month-row"><label>June</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="ejun" id="ejun" required><button id="eng-jun-btn">Update</button></div>
                </form>
                <form method="post" id="eng-jul">
                    <div class="month-row"><label>July</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="ejul" id="ejul" required><button id="eng-jul-btn">Update</button></div>
                </form>
                <form method="post" id="eng-aug">
                    <div class="month-row"><label>August</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="eaug" id="eaug" required><button id="eng-aug-btn">Update</button></div>
                </form>
                <form method="post" id="eng-sep">
                    <div class="month-row"><label>September</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="esep" id="esep" required><button id="eng-sep-btn">Update</button></div>
                </form>
                <form method="post" id="eng-oct">
                    <div class="month-row"><label>October</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="eoct" id="eoct" required><button id="eng-oct-btn">Update</button></div>
                </form>
                <form method="post" id="eng-nov">
                    <div class="month-row"><label>November</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="enov" id="enov" required><button id="eng-nov-btn">Update</button></div>
                </form>
                <form method="post" id="eng-dec">
                    <div class="month-row"><label>December</label><input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="edec" id="edec" required><button id="eng-dec-btn">Update</button></div>
                </form>
            </div>
        </div>
    </div>

    <!-- NOTICES UPLOAD - TAMIL -->
    <div class="dash-section">
        <div class="dash-section-title">
            <h2>Upload Notice (Tamil)</h2>
        </div>
        <form class="notice-upload-form" id="add-notice-tamil" method="post">
            <input type="text" name="noticeTitle" placeholder="Notice Title" required>
            <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="tamnotice" id="tamnotice" required>
            <button type="submit" id="tamil-notice" class="notice-upload-btn">Upload</button>
        </form>
        <div id="loading-spinner3" class="loading-spinner"></div>
        <div id="tamil-notices" class="flex flex-col gap-2 mt-4"></div>
    </div>

    <!-- NOTICES UPLOAD - ENGLISH -->
    <div class="dash-section">
        <div class="dash-section-title">
            <h2>Upload Notice (English)</h2>
        </div>
        <form class="notice-upload-form" id="add-notice-english" method="post">
            <input type="text" name="noticeTitle" placeholder="Notice Title" required>
            <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" name="engnotice" id="engnotice" required>
            <button type="submit" id="english-notice" class="notice-upload-btn">Upload</button>
        </form>
        <div id="loading-spinner4" class="loading-spinner"></div>
        <div id="english-notices" class="flex flex-col gap-2 mt-4"></div>
    </div>

    <!-- ══ MODALS ══════════════════════════════ -->

    <!-- Add Event -->
    <div id="event-model" class="model-overlay" style="display:none;">
        <div class="model-body">
            <div class="modal-box">
                <div class="modal-header">
                    <h4>Create Upcoming Event</h4>
                    <button class="modal-close" onclick="handleModel('event-model',false)">&#x2715;</button>
                </div>
                <div class="modal-body">
                    <form id="add-event-form" method="post" oninput="validateEventForm()">
                        <div class="Form">
                            <div class="FormRow"><label>Title</label><input type="text" name="title" id="title" required></div>
                            <div class="FormRow"><label>Description</label><textarea name="description" id="description" required></textarea></div>
                            <div class="FormRow"><label>Date</label><input type="date" name="date" id="date" required></div>
                            <div class="FormRow"><label>Time</label><input type="time" name="time" id="time" required></div>
                            <button type="submit" id="event-submit" name="submit" disabled class="upload">Create</button>
                            <button type="button" style="display:none;" id="event-submiting" disabled class="upload">Creating...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Event -->
    <div id="edit-event-model" class="model-overlay" style="display:none;">
        <div class="model-body">
            <div class="modal-box">
                <div class="modal-header">
                    <h4>Edit Event</h4>
                    <button class="modal-close" onclick="handleModel('edit-event-model',false)">&#x2715;</button>
                </div>
                <div class="modal-body">
                    <form id="edit-event-form" method="post" oninput="validateEditEventForm()">
                        <input type="text" name="event-id" id="event-id" hidden>
                        <div class="Form">
                            <div class="FormRow"><label>Title</label><input type="text" name="edit-title" id="edit-title" required></div>
                            <div class="FormRow"><label>Description</label><textarea name="edit-description" id="edit-description" required></textarea></div>
                            <div class="FormRow"><label>Date</label><input type="date" name="edit-date" id="edit-date" required></div>
                            <div class="FormRow"><label>Time</label><input type="time" name="edit-time" id="edit-time" required></div>
                            <button type="submit" id="edit-event-submit" name="submit" disabled class="upload">Update</button>
                            <button type="button" style="display:none;" id="edit-event-submiting" disabled class="upload">Updating...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Event -->
    <div class="del-modal-overlay" id="deleteEventModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">
            <form id="delete-event-form" method="post" class="del-form">
                <input type="text" hidden name="ID" id="del-event-id">
                <div class="delMsg">
                    <h4>Do you want to delete this Event?</h4>
                </div>
                <div class="option-btn">
                    <button onclick="handleModel('deleteEventModel',false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-event-submit" type="submit">Yes</button>
                    <button type="button" style="display:none;" id="del-event-submiting" disabled class="opt yes">Yes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Admin (superAdmin only) -->
    <?php if ($_SESSION['isSuperAdmin'] == true): ?>
        <div id="user-model" class="model-overlay" style="display:none;">
            <div class="model-body">
                <div class="modal-box">
                    <div class="modal-header">
                        <h4>Create Admin User</h4>
                        <button class="modal-close" onclick="handleModel('user-model',false)">&#x2715;</button>
                    </div>
                    <div class="modal-body">
                        <form id="add-user-form" method="post" oninput="validateUserForm()">
                            <div class="Form">
                                <div class="FormRow"><label>Email</label><input type="email" name="email" id="email" required></div>
                                <div class="FormRow"><label>Password</label><input type="password" name="password" id="password" required></div>
                                <div class="FormRow"><label>Repeat Password</label><input type="password" name="repassword" id="repassword" required></div>
                                <button type="submit" id="user-submit" name="submit" disabled class="upload">Create</button>
                                <button type="button" style="display:none;" id="user-submiting" disabled class="upload">Creating...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Edit User -->
    <div id="edit-user-model" class="model-overlay" style="display:none;">
        <div class="model-body">
            <div class="modal-box">
                <div class="modal-header">
                    <h4>Edit Admin</h4>
                    <button class="modal-close" onclick="handleModel('edit-user-model',false)">&#x2715;</button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" method="post" oninput="validateEditUserForm()">
                        <input type="number" name="edit-userid" id="edit-userid" hidden>
                        <div class="Form">
                            <div class="FormRow"><label>Email</label><input type="email" name="edit-email" id="edit-email" required></div>
                            <div class="FormRow"><label>New Password (leave blank to keep)</label><input type="password" name="edit-password" id="edit-password"></div>
                            <div class="FormRow"><label>Repeat Password</label><input type="password" name="edit-repassword" id="edit-repassword"></div>
                            <div class="flex items-center gap-6 mb-4">
                                <div class="flex items-center gap-2"><input type="radio" name="status" id="form-active" style="accent-color:var(--primary);width:16px;height:16px;"><label for="form-active" style="font-size:0.9rem;font-weight:500;">Active</label></div>
                                <div class="flex items-center gap-2"><input type="radio" name="status" id="form-deactive" style="accent-color:var(--primary);width:16px;height:16px;"><label for="form-deactive" style="font-size:0.9rem;font-weight:500;">Deactive</label></div>
                            </div>
                            <button type="submit" id="edit-user-submit" name="submit" disabled class="upload">Update</button>
                            <button type="button" style="display:none;" id="edit-user-submiting" disabled class="upload">Updating...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Album -->
    <div id="gallery-model" class="model-overlay" style="display:none;">
        <div class="model-body">
            <div class="modal-box">
                <div class="modal-header">
                    <h4>Create Album</h4>
                    <button class="modal-close" onclick="removeListener()">&#x2715;</button>
                </div>
                <div class="modal-body">
                    <form id="add-album-form" method="post" oninput="validateAlbumForm()">
                        <div class="Form">
                            <div class="FormRow"><label>Album Name</label><input type="text" name="album" id="album" required></div>
                            <div class="FormRow">
                                <small style="color:var(--text-light);font-size:0.78rem;">Attach Image(s)</small>
                                <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" id="select-image" name="image[]" multiple hidden>
                                <button class="image-btn" type="button" onclick="openImage()">Select Images</button>
                                <small class="small">At least 2 images required</small>
                                <div id="preview-container" style="display:flex;justify-content:center;gap:5px;flex-wrap:wrap;margin-top:10px;"></div>
                            </div>
                            <button type="submit" id="album-submit" name="submit" class="upload">Create</button>
                            <button type="button" style="display:none;" id="album-submitting" disabled class="upload">Creating...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let allFiles = [];

        function openImage() {
            document.getElementById('select-image').click();
        }

        function PreviewImages(event) {
            const newFiles = Array.from(event.target.files);
            allFiles = [...allFiles, ...newFiles];
            event.target.value = '';
            displayImages();
            validateAlbumForm();
        }

        function displayImages() {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = '';
            for (let i = 0; i < allFiles.length; i++) {
                const file = allFiles[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const divEl = document.createElement('div');
                        divEl.style.cssText = 'width:100px;height:auto;position:relative;display:flex;flex-direction:column;gap:5px;background-color:#CBCBCB;border-radius:10px;';
                        const imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.style.cssText = 'border-radius:10px;height:100px;width:100px;object-fit:cover;';
                        const delButton = document.createElement('button');
                        delButton.textContent = 'Delete';
                        delButton.style.cssText = 'position:relative;background-color:#670e0e;border:transparent;border-radius:10px;padding:5px;color:white;cursor:pointer;';
                        delButton.type = 'button';
                        delButton.onclick = function() {
                            removeImage(i);
                        };
                        divEl.appendChild(imgElement);
                        divEl.appendChild(delButton);
                        previewContainer.appendChild(divEl);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        function removeImage(index) {
            allFiles.splice(index, 1);
            displayImages();
            validateAlbumForm();
        }
    </script>

    <!-- Edit Album -->
    <div id="edit-gallery-model" class="model-overlay" style="display:none;">
        <div class="model-body">
            <div class="modal-box">
                <div class="modal-header">
                    <h4>Edit Album</h4>
                    <button class="modal-close" onclick="handleModel('edit-gallery-model',false)">&#x2715;</button>
                </div>
                <div class="modal-body">
                    <form id="edit-album-form" method="post">
                        <input type="text" name="ID" id="album-id" hidden>
                        <div class="Form">
                            <div class="FormRow"><label>Album Name</label><input type="text" name="album" id="edit-album" required></div>
                            <button type="submit" id="edit-album-submit" name="submit" class="upload">Update</button>
                            <button type="button" style="display:none;" id="edit-album-submitting" disabled class="upload">Updating...</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Album -->
    <div class="del-modal-overlay" id="deleteAlbumModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">
            <form id="delete-album-form" method="post" class="del-form">
                <input type="text" hidden name="ID" id="del-album-id">
                <div class="delMsg">
                    <h4>Do you want to delete this Album?</h4>
                </div>
                <div class="option-btn">
                    <button onclick="handleModel('deleteAlbumModel',false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-album-submit" type="submit">Yes</button>
                    <button type="button" style="display:none;" id="del-album-submiting" disabled class="opt yes">Yes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Notice -->
    <div class="del-modal-overlay" id="deleteNoticeModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">
            <form id="delete-notice-form" method="post" class="del-form">
                <input type="text" hidden name="ID" id="del-notice-id">
                <div class="delMsg">
                    <h4>Do you want to delete this Notice?</h4>
                </div>
                <div class="option-btn">
                    <button onclick="handleModel('deleteNoticeModel',false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-notice-submit" type="submit">Yes</button>
                    <button type="button" style="display:none;" id="del-notice-submiting" disabled class="opt yes">Yes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notice Image Viewer -->
    <div id="image-viewer" style="display:none;position:fixed;inset:0;background:rgba(255,255,255,0.5);backdrop-filter:blur(10px);z-index:3000;">
        <button onclick="closeImageViewer()" style="position:fixed;top:12px;right:12px;width:36px;height:36px;border-radius:50%;background:#000;color:#fff;border:none;font-size:1rem;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:10;">&#x2715;</button>
        <div id="noticeImg" style="width:100%;height:100%;background-size:contain;background-repeat:no-repeat;background-position:center;"></div>
    </div>

</body>

</html>

<script>
    function handleModel(ID, status) {
        const model = document.getElementById(ID);
        if (status) {
            model.style.display = "flex";
        } else {
            model.style.display = "none";
        }
    }

    function validateEventForm() {
        const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;
        const date = document.getElementById("date").value;
        const time = document.getElementById("time").value;
        document.getElementById("event-submit").disabled = !(title && description && date && time);
    }
    document.getElementById("add-event-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("event-submit");
        const submiting = document.getElementById("event-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault();
        const form = document.getElementById("add-event-form");
        const formData = new FormData(form);
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddEvent.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    handleModel('event-model', false);
                    form.reset();
                    validateEventForm();
                    loadEvent();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        };
        xhr.send(formData);
    });

    function EditEvent(data) {
        document.getElementById("event-id").value = data.ID;
        document.getElementById("edit-title").value = data.title;
        document.getElementById("edit-description").value = data.description;
        document.getElementById("edit-date").value = data.date;
        document.getElementById("edit-time").value = data.time;
        validateEditEventForm();
        handleModel('edit-event-model', true);
    }

    function validateEditEventForm() {
        const title = document.getElementById("edit-title").value;
        const description = document.getElementById("edit-description").value;
        const date = document.getElementById("edit-date").value;
        const time = document.getElementById("edit-time").value;
        document.getElementById("edit-event-submit").disabled = !(title && description && date && time);
    }
    document.getElementById("edit-event-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("edit-event-submit");
        const submiting = document.getElementById("edit-event-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault();
        const form = document.getElementById("edit-event-form");
        const formData = new FormData(form);
        formData.append('edit-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddEvent.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    handleModel('edit-event-model', false);
                    form.reset();
                    validateEditEventForm();
                    loadEvent();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        };
        xhr.send(formData);
    });

    function DeleteEvent(data) {
        document.getElementById('del-event-id').value = data.ID;
        handleModel('deleteEventModel', true);
    }
    document.getElementById('delete-event-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-event-submit');
        const submiting = document.getElementById('del-event-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        const form = document.getElementById('delete-event-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddEvent.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                alertRise(true, response.message);
                handleModel('deleteEventModel', false);
                loadEvent();
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        };
        xhr.send(formData);
    });

    function validateUserForm() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const repassword = document.getElementById("repassword").value;
        document.getElementById("user-submit").disabled = !(email && password && password == repassword);
    }
    document.getElementById("add-user-form") && document.getElementById("add-user-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("user-submit");
        const submiting = document.getElementById("user-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault();
        const form = document.getElementById("add-user-form");
        const formData = new FormData();
        formData.append('email', document.getElementById("email").value);
        formData.append('password', document.getElementById("password").value);
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddUser.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    handleModel('user-model', false);
                    form.reset();
                    validateUserForm();
                    loadUsers();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        };
        xhr.send(formData);
    });

    function editUser(id) {
        document.getElementById('edit-userid').value = '';
        document.getElementById('edit-email').value = '';
        document.getElementById('edit-password').value = '';
        document.getElementById('edit-repassword').value = '';
        document.getElementById('form-active').checked = false;
        document.getElementById('form-deactive').checked = false;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetUser.php?id=' + id, true);
        document.getElementById('edit-user-model').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById('edit-userid').value = response.data[0].id;
                document.getElementById('edit-email').value = response.data[0].email;
                document.getElementById(response.data[0].isActive ? 'form-active' : 'form-deactive').checked = true;
                validateEditUserForm();
            }
        };
        xhr.send();
    }

    function validateEditUserForm() {
        const email = document.getElementById("edit-email").value;
        const password = document.getElementById("edit-password").value;
        const repassword = document.getElementById("edit-repassword").value;
        const submit = document.getElementById("edit-user-submit");
        if (email) {
            submit.disabled = (password.length > 0 || repassword.length > 0) ? (password !== repassword) : false;
        } else {
            submit.disabled = true;
        }
    }
    document.getElementById("edit-user-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("edit-user-submit");
        const submiting = document.getElementById("edit-user-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault();
        const form = document.getElementById("edit-user-form");
        const formData = new FormData();
        formData.append('userid', document.getElementById('edit-userid').value);
        formData.append('email', document.getElementById('edit-email').value);
        formData.append('password', document.getElementById('edit-password').value);
        formData.append('active', document.getElementById('form-active').checked ? true : false);
        formData.append('edit-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddUser.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    handleModel('edit-user-model', false);
                    form.reset();
                    validateEditUserForm();
                    loadUsers();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        };
        xhr.send(formData);
    });

    function addListener() {
        document.getElementById('select-image').addEventListener('change', PreviewImages);
        handleModel('gallery-model', true);
    }

    function removeListener() {
        document.getElementById('select-image').removeEventListener('change', PreviewImages);
        handleModel('gallery-model', false);
    }

    function validateAlbumForm() {
        const album = document.getElementById('album').value.length > 0;
        document.getElementById('album-submit').disabled = !(album && allFiles.length > 1);
    }
    document.getElementById("add-album-form").addEventListener("submit", function(event) {
        event.preventDefault();
        let submit = document.getElementById("album-submit");
        let submitting = document.getElementById("album-submitting");
        submit.style.display = "none";
        submitting.style.display = "block";
        const formData = new FormData();
        allFiles.forEach(file => {
            formData.append('image[]', file);
        });
        formData.append('album', document.getElementById('album').value);
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddAlbum.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    removeListener();
                    document.getElementById('add-album-form').reset();
                    validateAlbumForm();
                    allFiles = [];
                    displayImages();
                    loadAlbum(1);
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submitting.style.display = "none";
        };
        xhr.send(formData);
    });

    function EditAlbum(data) {
        document.getElementById('edit-album').value = data.event;
        document.getElementById('album-id').value = data.ID;
        handleModel('edit-gallery-model', true);
    }
    document.getElementById("edit-album-form").addEventListener("submit", function(event) {
        event.preventDefault();
        let submit = document.getElementById("edit-album-submit");
        let submitting = document.getElementById("edit-album-submitting");
        submit.style.display = "none";
        submitting.style.display = "block";
        const form = document.getElementById('edit-album-form');
        const formData = new FormData(form);
        formData.append('edit-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddAlbum.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    handleModel('edit-gallery-model', false);
                    document.getElementById('edit-album-form').reset();
                    loadAlbum(1);
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.style.display = "block";
            submitting.style.display = "none";
        };
        xhr.send(formData);
    });

    function DeleteAlbum(data) {
        document.getElementById('del-album-id').value = data.ID;
        handleModel('deleteAlbumModel', true);
    }
    document.getElementById('delete-album-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-album-submit');
        const submiting = document.getElementById('del-album-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        const form = document.getElementById('delete-album-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddAlbum.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                alertRise(true, response.message);
                handleModel('deleteAlbumModel', false);
                loadAlbum(1);
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        };
        xhr.send(formData);
    });
    document.getElementById("cal-Form").addEventListener('submit', function(event) {
        event.preventDefault();
        const id = event.target.id;
        const btn = document.getElementById(id + '-btn');
        btn.disabled = true;
        const form = document.getElementById(id);
        const formData = new FormData(form);
        formData.append('type', id);
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddCalendar.php", true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    form.reset();
                } else {
                    alertRise(false, response.message);
                }
            }
            btn.disabled = false;
        };
        xhr.send(formData);
    });
    document.getElementById("add-notice-tamil").addEventListener("submit", function(event) {
        event.preventDefault();
        const submit = document.getElementById("tamil-notice");
        submit.disabled = true;
        submit.innerText = "Uploading...";
        const form = document.getElementById("add-notice-tamil");
        const formData = new FormData(form);
        formData.append('lang', 't');
        formData.append('tamilsubmit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddNotice.php", true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    form.reset();
                    loadNotices();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.disabled = false;
            submit.innerText = "Upload";
        };
        xhr.send(formData);
    });
    document.getElementById("add-notice-english").addEventListener("submit", function(event) {
        event.preventDefault();
        const submit = document.getElementById("english-notice");
        submit.disabled = true;
        submit.innerText = "Uploading...";
        const form = document.getElementById("add-notice-english");
        const formData = new FormData(form);
        formData.append('lang', 'e');
        formData.append('englishsubmit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddNotice.php", true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    form.reset();
                    loadNotices();
                } else {
                    alertRise(false, response.message);
                }
            }
            submit.disabled = false;
            submit.innerText = "Upload";
        };
        xhr.send(formData);
    });

    function viewNotice(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetNoticeImage.php?id=' + id, true);
        document.getElementById('image-viewer').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                const image = response.data[0].image.split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>')[1];
                document.getElementById('noticeImg').style.backgroundImage = 'url(' + image + ')';
            }
        };
        xhr.send();
    }

    function deleteNotice(id) {
        document.getElementById('del-notice-id').value = id;
        handleModel('deleteNoticeModel', true);
    }
    document.getElementById('delete-notice-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-notice-submit');
        const submiting = document.getElementById('del-notice-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        const form = document.getElementById('delete-notice-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddNotice.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                alertRise(true, response.message);
                handleModel('deleteNoticeModel', false);
                loadNotices();
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        };
        xhr.send(formData);
    });

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
    }

    function loadEvent() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllEvents.php', true);
        document.getElementById('loading-spinner').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner').style.display = 'none';
                var response = JSON.parse(xhr.responseText);
                document.getElementById('event-viewer-content').innerHTML = response.html;
            }
        };
        xhr.send();
    }

    function loadAlbum(page) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllAlbums.php?page=' + page, true);
        document.getElementById('loading-spinner2').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner2').style.display = 'none';
                var response = JSON.parse(xhr.responseText);
                document.getElementById('album-viewer-content').innerHTML = response.html;
                document.getElementById('table-pagi').innerHTML = response.pagination;
            }
        };
        xhr.send();
    }

    function loadNotices() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllNotices.php', true);
        document.getElementById('loading-spinner3').style.display = 'block';
        document.getElementById('loading-spinner4').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner3').style.display = 'none';
                document.getElementById('loading-spinner4').style.display = 'none';
                var response = JSON.parse(xhr.responseText);
                document.getElementById('tamil-notices').innerHTML = response.tamil;
                document.getElementById('english-notices').innerHTML = response.english;
            }
        };
        xhr.send();
    }

    function loadUsers() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllUsers.php', true);
        document.getElementById('loading-spinner-admin').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner-admin').style.display = 'none';
                var response = JSON.parse(xhr.responseText);
                document.getElementById('admin-viewer-content').innerHTML = response.html;
            }
        };
        xhr.send();
    }

    function alertRise(status, message) {
        document.getElementById('alert-text').innerText = message;
        document.getElementById('alertCont').style.backgroundColor = status ? '#1D7524' : '#E44C4C';
        setTimeout(() => {
            document.getElementById('alert').style.display = 'flex';
        }, 500);
        setTimeout(() => {
            document.getElementById('alert').style.display = 'none';
        }, 6000);
    }

    function toggleDrawer() {
        document.getElementById('navDrawer').classList.toggle('is-open');
    }

    function closeDrawer() {
        document.getElementById('navDrawer').classList.remove('is-open');
    }
    window.onload = function() {
        loadEvent();
        loadAlbum(1);
        loadNotices();
        <?php if ($_SESSION['isSuperAdmin'] == true): ?>
            loadUsers();
        <?php endif; ?>
    };
</script>