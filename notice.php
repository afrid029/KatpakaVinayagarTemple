<?php SESSION_START() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notice | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/Assets/CSS/main.css">
    <link rel="stylesheet" href="/Assets/CSS/index-page.css">
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
            <?php if (isset($_COOKIE['user'])): ?>
                <a href="/dashboard" class="nav-action">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                        <path d="M192-192v-96l72-72v168h-72Zm126 0v-222l66-66 6 6v282h-72Zm126 0v-228l72 72v156h-72Zm126 0v-186l72-72v258h-72Zm126 0v-312l72-72v384h-72ZM192-378v-102l192-192 144 144 240-240v102L528-426 384-570 192-378Z" />
                    </svg>
                    Dashboard</a>
                <a href="/logout" class="nav-action">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>
                    Logout</a>
            <?php else: ?>
                <button onclick="openLogin()" class="nav-action">
                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="currentColor">
                        <path d="M480-120q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840v106q-106.26 0-180.13 73.87Q226-586.26 226-480q0 106.26 73.87 180.13Q373.74-226 480-226v106Zm160-141.35L565.35-337l90-90H347v-106h308.35l-90-91L640-698.65 858.65-480 640-261.35Z" />
                    </svg>
                    Login</button>
            <?php endif; ?>
        </div>
        <div class="nav-links-bar">
            <a href="/" class="nav-link">Home</a>
            <a href="/calendar" class="nav-link">Calendar</a>
            <a href="/notice" class="nav-link active">Notice</a>
            <a href="/gallery" class="nav-link">Gallery</a>
            <a class="nav-link" onclick="gotoAbout()">About</a>
        </div>
    </nav>

    <!-- NAV DRAWER -->
    <div class="nav-drawer" id="navDrawer">
        <button class="nav-drawer-close" onclick="closeDrawer()" aria-label="Close">&#x2715;</button>
        <a href="/" class="nav-drawer-link">Home</a>
        <a href="/calendar" class="nav-drawer-link">Calendar</a>
        <a href="/notice" class="nav-drawer-link">Notice</a>
        <a href="/gallery" class="nav-drawer-link">Gallery</a>
        <a class="nav-drawer-link" onclick="gotoAbout();closeDrawer();">About</a>
        <?php if (isset($_COOKIE['user'])): ?>
            <a href="/dashboard" class="nav-drawer-link">Dashboard</a>
            <a href="/logout" class="nav-drawer-link">Logout</a>
        <?php else: ?>
            <button onclick="openLogin();closeDrawer();" class="nav-drawer-link">Login</button>
        <?php endif; ?>
    </div>
    <section class="section section-white">
        <div class="section-heading">
            <h2 style="font-family:var(--font-tamil);">தமிழ் துண்டுப்பிரசுரங்கள்</h2>
        </div>
        <div id="loading-spinner-tamil" class="loading-spinner" style="display:none;"></div>
        <div id="tamil-notices" class="notice-grid"></div>
    </section>

    <!-- English Notices -->
    <section class="section section-cream">
        <div class="section-heading">
            <h2>English Notices</h2>
        </div>
        <div id="loading-spinner-eng" class="loading-spinner" style="display:none;"></div>
        <div id="english-notices" class="notice-grid"></div>
    </section>

    <!-- About -->
    <?php include('Components/aboutus.php') ?>

    <!-- Login Modal -->
    <?php include('Components/loginModel.php') ?>

    <!-- Image Viewer -->
    <div id="image-viewer" onclick="closeImageViewer()" style="display:none;position:fixed;inset:0;z-index:9000;background:rgba(0,0,0,0.88);align-items:flex-start;justify-content:center;overflow-y:auto;">
        <div style="position:relative;width:100%;display:flex;justify-content:center;" onclick="event.stopPropagation()">
            <img id="frontImg" src="" alt="Notice" style="width:100%;height:auto;display:block;">
            <button onclick="closeImageViewer()" style="position:fixed;top:14px;right:14px;width:36px;height:36px;border-radius:50%;background:#111;color:#fff;border:2px solid #fff;font-size:1rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:10;">&#x2715;</button>
        </div>
    </div>

</body>

</html>

<script>
    function toggleDrawer() {
        document.getElementById('navDrawer').classList.toggle('is-open');
    }

    function closeDrawer() {
        document.getElementById('navDrawer').classList.remove('is-open');
    }

    function openLogin() {
        document.getElementById('login-model').style.display = 'flex';
    }

    function closeLoginViewer() {
        document.getElementById('login-model').style.display = 'none';
    }

    function gotoAbout(val) {
        const element = document.querySelector('.about-section');
        if (!element) return;
        const rect = element.getBoundingClientRect();
        window.scrollTo({
            top: window.scrollY + rect.top - (val ? 200 : 0),
            behavior: 'smooth'
        });
    }

    function openImage(src) {
        document.getElementById('frontImg').setAttribute('src', src);
        document.getElementById('image-viewer').style.display = 'flex';
    }

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
    }

    function loadNotices() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllNoticeUsers.php', true);
        document.getElementById('loading-spinner-tamil').style.display = 'block';
        document.getElementById('loading-spinner-eng').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner-tamil').style.display = 'none';
                document.getElementById('loading-spinner-eng').style.display = 'none';
                var response = JSON.parse(xhr.responseText);
                document.getElementById('tamil-notices').innerHTML = response.tamil;
                document.getElementById('english-notices').innerHTML = response.english;
            }
        };
        xhr.send();
    }

    window.onload = function() {
        loadNotices();
    };
</script>