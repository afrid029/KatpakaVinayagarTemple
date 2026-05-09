<?php SESSION_START() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendar | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/Assets/CSS/main.css">
    <link rel="stylesheet" href="/Assets/CSS/index-page.css">
    <style>
        .cal-page {
            background: var(--bg);
            min-height: 80vh;
        }

        .cal-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 32px 5%;
        }

        .cal-month-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg-card);
            border-radius: var(--radius-md);
            padding: 14px 20px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-sm);
        }

        .cal-month-bar h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            font-family: var(--font-tamil);
        }

        .cal-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cal-toggle small {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-sub);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background: var(--primary);
            border-radius: 24px;
            transition: 0.3s;
        }

        .slider:before {
            content: "";
            position: absolute;
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background: #fff;
            border-radius: 50%;
            transition: 0.3s;
        }

        input:checked+.slider {
            background: var(--accent);
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }

        .cal-image-wrap {
            background: var(--bg-card);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            position: relative;
        }

        .cal-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 16px;
        }

        .cal-nav-btn {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .cal-nav-btn:hover {
            background: var(--primary-light);
        }

        .cal-nav-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .bgimg {
            width: 100%;
            padding-bottom: 80%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        .bgimg2 {
            padding-bottom: 30%;
        }

        .bgimgx {
            width: 100%;
            height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .cal-event-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-sub);
            padding: 8px 16px 0;
        }
    </style>
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
            <a href="/calendar" class="nav-link active">Calendar</a>
            <a href="/notice" class="nav-link">Notice</a>
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

    <div class="cal-page">
        <div class="cal-wrapper">
            <!-- Month bar -->
            <div class="cal-month-bar">
                <h4 id="month">Loading...</h4>
                <div class="cal-toggle">
                    <small>த</small>
                    <label class="switch">
                        <input type="checkbox" id="toggleSwitch">
                        <span class="slider"></span>
                    </label>
                    <small>E</small>
                </div>
            </div>

            <!-- Calendar image -->
            <div class="cal-image-wrap">
                <div class="cal-nav">
                    <button class="cal-nav-btn backbtn" id="calBackBtn">
                        <span class="material-symbols-outlined" style="font-size:20px;">arrow_circle_left</span>
                    </button>
                    <button class="cal-nav-btn rightBtn" id="calNextBtn">
                        <span class="material-symbols-outlined" style="font-size:20px;">arrow_circle_right</span>
                    </button>
                </div>
                <div id="bgimg" class="bgimg"></div>
                <hr style="border-color:var(--border);margin:0 16px;">
                <p class="cal-event-title">Event Summary</p>
                <div id="bgimg2" class="bgimg bgimg2"></div>
            </div>
        </div>
    </div>

    <!-- About -->
    <?php include('Components/aboutus.php') ?>

    <!-- Image Viewer -->
    <div id="image-viewer" class="modal-overlay" style="display:none;background:rgba(0,0,0,0.85);">
        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
            <button onclick="closeImageViewer()" style="position:fixed;top:14px;right:14px;width:36px;height:36px;border-radius:50%;background:#000;color:#fff;border:none;font-size:1rem;cursor:pointer;z-index:10;display:flex;align-items:center;justify-content:center;">&#x2715;</button>
            <img id="frontImg" src="" alt="Calendar" style="max-width:95vw;max-height:92vh;object-fit:contain;border-radius:8px;">
        </div>
    </div>

</body>

</html>

<!-- Login Modal -->
<?php include('Components/loginModel.php') ?>

<script>
    /* ─── Drawer ─── */
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

    /* ─── About scroll ─── */
    function gotoAbout(val) {
        const element = document.querySelector('.about-section');
        if (!element) return;
        const rect = element.getBoundingClientRect();
        window.scrollTo({
            top: window.scrollY + rect.top - (val ? 200 : 0),
            behavior: 'smooth'
        });
    }

    /* ─── Touch swipe ─── */
    let startX, startY, endX, endY;
    let isSwipe = false;
    const swipeArea = document.getElementById('bgimg');

    swipeArea.addEventListener('touchstart', e => {
        isSwipe = false;
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });
    swipeArea.addEventListener('touchmove', e => {
        const dx = e.touches[0].clientX - startX;
        const dy = e.touches[0].clientY - startY;
        if (Math.abs(dx) > 10 || Math.abs(dy) > 10) isSwipe = true;
    });
    swipeArea.addEventListener('touchend', e => {
        if (!isSwipe) return;
        endX = e.changedTouches[0].clientX;
        const dx = endX - startX;
        const dy = (e.changedTouches[0].clientY) - startY;
        if (Math.abs(dx) > Math.abs(dy)) {
            if (dx < 30) {
                next = 1;
                month += 1;
                updateIndex();
            } else if (dx > -30) {
                next = -1;
                month -= 1;
                updateIndex();
            }
        }
    });

    /* ─── Image viewers ─── */
    swipeArea.addEventListener('click', e => {
        if (isSwipe) {
            e.preventDefault();
            return;
        }
        const path = e.target.style.backgroundImage.slice(5, -2);
        document.getElementById('frontImg').setAttribute('src', path);
        document.getElementById('image-viewer').style.display = 'block';
    });
    document.getElementById('bgimg2').addEventListener('click', e => {
        const path = e.target.style.backgroundImage.slice(5, -2);
        document.getElementById('frontImg').setAttribute('src', path);
        document.getElementById('image-viewer').style.display = 'block';
    });

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
    }

    /* ─── Calendar logic ─── */
    let isTamil = true;
    let calendar;
    let month;
    let monthName;
    let year;
    let next = 0;
    const backBtn = document.getElementById('calBackBtn');
    const rightBtn = document.getElementById('calNextBtn');
    const posterImg = document.getElementById('bgimg');
    const eventPoster = document.getElementById('bgimg2');
    const curMonth = document.getElementById('month');

    rightBtn.addEventListener('click', function() {
        next = 1;
        month += 1;
        updateIndex();
    });
    backBtn.addEventListener('click', function() {
        next = -1;
        month -= 1;
        updateIndex();
    });

    document.getElementById('toggleSwitch').addEventListener('change', function() {
        isTamil = !this.checked;
        next = 0;
        setCalendarImage();
    });

    function updateIndex() {
        setCalendarImage();
    }

    function setMonth() {
        const today = new Date();
        month = today.getMonth() + 1;
        year = today.getFullYear();
        setCalendarImage();
    }

    function setCalendarImage() {
        let key, summary;
        if (month == 1) {
            backBtn.disabled = true;
        } else {
            backBtn.disabled = false;
        }
        if (month == 12) {
            rightBtn.disabled = true;
        } else {
            rightBtn.disabled = false;
        }

        if (isTamil) {
            summary = 'tamEvent';
            const tamilMonths = ['', 'tamJan', 'tamFeb', 'tamMar', 'tamApr', 'tamMay', 'tamJun', 'tamJul', 'tamAug', 'tamSep', 'tamOct', 'tamNov', 'tamDec'];
            const tamilNames = ['', 'தை', 'மாசி', 'பங்குனி', 'சித்திரை', 'வைகாசி', 'ஆனி', 'ஆடி', 'ஆவணி', 'புரட்டாதி', 'ஐப்பசி', 'கார்த்திகை', 'மார்கழி'];
            key = tamilMonths[month];
            monthName = tamilNames[month];
        } else {
            summary = 'engEvent';
            const engMonths = ['', 'engJan', 'engFeb', 'engMar', 'engApr', 'engMay', 'engJun', 'engJul', 'engAug', 'engSep', 'engOct', 'engNov', 'engDec'];
            const engNames = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            key = engMonths[month];
            monthName = engNames[month];
        }

        let selectImg = calendar[key].split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>')[1];
        let selectEvent = calendar[summary].split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>')[1];

        if (next == -1) {
            posterImg.classList.add('moveRightOff');
            posterImg.style.backgroundImage = `url('${selectImg}')`;
            setTimeout(() => {
                posterImg.classList.remove('moveRightOff');
                posterImg.classList.add('moveRightIn');
            }, 300);
            setTimeout(() => {
                posterImg.classList.remove('moveRightIn');
            }, 600);
        } else if (next == 1) {
            posterImg.style.backgroundImage = `url('${selectImg}')`;
            posterImg.classList.add('moveleftOff');
            setTimeout(() => {
                posterImg.classList.remove('moveleftOff');
                posterImg.classList.add('moveLeftIn');
            }, 300);
            setTimeout(() => {
                posterImg.classList.remove('moveLeftIn');
            }, 600);
        } else {
            posterImg.style.backgroundImage = `url('${selectImg}')`;
        }

        eventPoster.style.backgroundImage = `url('${selectEvent}')`;
        curMonth.innerHTML = monthName + ' - ' + year;
    }


    function loadCalendar() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetCalendar.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                calendar = response.data[0];
                setMonth();
            }
        };
        xhr.send();
    }

    window.onload = function() {
        loadCalendar();
    };
</script>