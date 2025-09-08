<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>Notice | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <meta charset="UTF-8">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_circle_left" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_circle_right" /> -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        anekTamil: ['"Anek Tamil"', 'sans-serif'], // custom family
                        roboto: ['"Roboto"', 'sans-serif'], // custom family
                    },
                },
                screens: {
                    xs: "480px", // extra small devices
                    sm: "640px", // small devices
                    md: "768px", // medium devices
                    lg: "1024px", // large devices
                    xl: "1280px", // extra large
                    "2xl": "1536px" // double extra large
                }
            }
        }
    </script>
    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/nav.css"> -->
    <!-- <link rel="stylesheet" href="/Assets/CSS/alert.css">!-->
    <link rel="stylesheet" href="/Assets/CSS/pagination.css">
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/model2.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/login.css"> -->
    <!-- <link rel="stylesheet" href="Assets/CSS/eventTile.css"> -->
    <link rel="stylesheet" href="Assets/CSS/collection.css">

</head>
<nav class="bg-red-900">
    <div class="nav-bg"></div>
    <div class="mx-auto">
        <div class="relative flex h-40 items-center justify-between flxdir">
            <div class="nav-container ">
                <div class="nav-image">
                    <img src="/Assets/Images/R1.PNG" class="nav-image-img w-[5rem] h-[5rem] aspect-square" alt="" srcset="">
                </div>
                <div class="nav-content">
                    <h3>அருள்மிகு கற்பக விநாயகர் தேவஸ்தானம் - பிரம்றன்</h3>
                    <h3>Arulmigu Katpaga Vinayagar Hindu Temple - Brampton</h3>
                </div>
            </div>

            <div class="mobile-nav-container">
                <div class="mobile-nav-image">
                    <img src="/Assets/Images/R1.PNG" class="mobile-nav-image-img" alt="" srcset="">
                </div>
                <div class="mobile-nav-content">
                    <h3>அருள்மிகு கற்பக விநாயகர் தேவஸ்தானம் - பிரம்றன்</h3>
                    <h3>Arulmigu Katpaga Vinayagar Hindu Temple - Brampton</h3>
                </div>
            </div>

            <ul class="nav-list">
                <li><a href="/">Home</a></li>
                <li><a href="/calendar">Calendar</a></li>
                <li class="active">Notice</li>
                <li><a href="/gallery">Gallery</a></li>
                <li onclick="gotoAbout()">About</li>

            </ul>

            <div class="openMenu">
                <span class="material-symbols-outlined open-animate">
                    menu
                </span>
            </div>
            <div class="closeMenu">
                <span class="material-symbols-outlined close-animate">
                    close
                </span>
            </div>
        </div>
    </div>
</nav>

<body>

    <!-- Mobile Navigations -->
    <div class="mobile-nav">
        <div class="mobile-nav-list">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/">Home</a>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/calendar">Calendar</a>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/notice">Notice</a>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/gallery">Gallery</a>
            </div>
            <div onclick="gotoAbout()">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                About
            </div>

        </div>

    </div>

    <div class="bg-white w-full flex flex-col p-4 ">
        <div class="flex flex-col w-full p-4 mb-8">
            <h2 class="font-anekTamil font-semibold text-sm md:text-md text-[#7f1d1d] mb-3">தமிழ் துண்டுப்பிரசுரங்கள்</h2>
            <hr class="w-full mb-4">
            <div id="loading-spinner-tamil" class="loading-spinner"></div>
            <div id="tamil-notices" class="w-full justify-center grid grid-cols-2 xs:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-x-8  gap-y-2">

            </div>

        </div>
        <div class="flex flex-col w-full p-4 mb-8">
            <h2 class="font-roboto font-semibold text-sm md:text-md text-[#7f1d1d] mb-3">English Notices</h2>
            <hr class="w-full mb-4">
            <div id="loading-spinner-eng" class="loading-spinner"></div>
            <div id="english-notices" class="w-full grid grid-cols-2 xs:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-x-8  gap-y-2">

            </div>

        </div>
    </div>

    <!-- Image Viewer -->
    <div id="image-viewer" class="model-overlay">
        <div class="model-body relative">
            <div onclick="closeImageViewer()" class=" absolute top-4 right-4 rounded-full flex items-center justify-center w-8 h-auto aspect-square xl:text-2xl z-[10000] bg-black text-white">x</div>
            <div class="model-content ">
                <div class="image-viewer-container">
                    <div class="image-viewer ">
                        <img id="frontImg" class="md:!w-[80%] lg:!w-[75%] xl:!w-[70%] 2xl:!w-[70%]" src="" alt="Front Page">
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- AboutUs -->
     <?php include('Components/aboutus.php') ?>
</body>

<script>
    function gotoAbout(val) {
        closeMobileMenu();
        const element = document.querySelector('.about');
        if (!val) {
            // slideBar(false);
            const rect = element.getBoundingClientRect();

            // Scroll the page down by the position of the element plus an additional 100px
            window.scrollTo({
                top: window.scrollY + rect.top, // Current scroll position + element's top position + 100px
                behavior: 'smooth' // Smooth scrolling
            });
        } else {
            const rect = element.getBoundingClientRect();

            // Scroll the page down by the position of the element plus an additional 100px
            window.scrollTo({
                top: window.scrollY + rect.top - 200, // Current scroll position + element's top position + 100px
                behavior: 'smooth' // Smooth scrolling
            });
        }

    }
    const openMenue = document.querySelector('.openMenu');
    const closeMenu = document.querySelector('.closeMenu');
    const mobileNav = document.querySelector('.mobile-nav');
    openMenue.addEventListener('click', openMobileMenu)

    function openMobileMenu() {
        openMenue.setAttribute('style', 'display: none');
        closeMenu.setAttribute('style', 'display: block');
        mobileNav.setAttribute('style', 'display: block');
    }
    closeMenu.addEventListener('click', closeMobile)

    function closeMobile() {
        openMenue.setAttribute('style', 'display: block');
        closeMenu.setAttribute('style', 'display: none');
        mobileNav.setAttribute('style', 'display: none');
    }

    function closeMobileMenu() {

        mobileNav.setAttribute('style', 'display: none');
        //  closeMenu.setAttribute('style', 'display: none');
        // openMenue.setAttribute('style', 'display: block');
    }

    function openImage(src) {
        document.getElementById('frontImg').setAttribute('src', src)
        document.getElementById('image-viewer').style.display = 'block'
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
                // document.getElementById('onrowload').style.display = 'none';
                // onload.classList.remove('onrowload');
                var response = JSON.parse(xhr.responseText);
                const tamilNotices = document.getElementById('tamil-notices');
                const englishNotices = document.getElementById('english-notices');
                tamilNotices.innerHTML = response.tamil;
                englishNotices.innerHTML = response.english;
            }
        };
        xhr.send();
    }

    window.onload = function() {
        loadNotices();
    };
</script>