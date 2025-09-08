<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>Calendar | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <meta charset="UTF-8">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {},
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
    <style>
        .font-english {
            font-family: 'Roboto', sans-serif;
        }

        .font-tamil {
            font-family: 'Anek Tamil', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="/Assets/CSS/calendar.css">
    <link rel="stylesheet" href="/Assets/CSS/nav.css">
    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/pagination.css"> !-->
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/model3.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/login.css"> -->
    <!-- <link rel="stylesheet" href="Assets/CSS/eventTile.css"> -->
    <!-- <link rel="stylesheet" href="Assets/CSS/collection.css"> -->

</head>
<nav class="bg-red-900">
    <div class="nav-bg"></div>
    <div class="mx-auto">
        <div class="relative flex h-40 items-center justify-between flxdir">
            <div class="nav-container">
                <div class="nav-image">
                    <img src="/Assets/Images/R1.PNG" class="nav-image-img" alt="" srcset="">
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
                <li class="active">Calendar</li>
                <li><a href="/notice">Notice</a></li>
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
                Calendar
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

    <div class="main">
        <div class="left">
            <div class="side-bg"></div>

        </div>
        <div class="content">
            <div class="month">
                <h4 id="month">May - 2025</h4>
                <div class="toggle">
                    <small>த</small>
                    <label class="switch">
                        <input type="checkbox" id="toggleSwitch">
                        <span class="slider"></span>
                    </label>
                    <small>E</small>
                </div>


            </div>
            <hr>
            <div class="calendar">
                <div class="btn backbtn">
                    <span class="material-symbols-outlined">
                        arrow_circle_left
                    </span>
                </div>

                <div class="btn rightBtn ">
                    <span class="material-symbols-outlined">
                        arrow_circle_right
                    </span>
                </div>

                <div id="bgimg" class="bgimg">
                </div>

                <hr>
            </div>
            <div class="event-sum">
                <div id="bgimg2" class="bgimg bgimg2">
                </div>
            </div>

        </div>
        <div class="right">
            <div class="side-bg"></div>

        </div>
    </div>

    <!-- AboutUs -->
     <?php include('Components/aboutus.php') ?>

    <!-- Notice Model -->
    <div id="notice-model" class="model-overlay2">
        <div class="model-content2">
            <div onclick="closeNoticeModel()" class="close-btn2">Close</div>
            <div id="leftNot" class="btn backbtn">
                <span class="material-symbols-outlined">
                    arrow_circle_left
                </span>
            </div>

            <div id="rightNot" class="btn rightBtn ">
                <span class="material-symbols-outlined">
                    arrow_circle_right
                </span>
            </div>
            <div id="bgimg3" class="bgimgx">

            </div>
        </div>
    </div>

    <div id="image-viewer" class="model-overlay">
        <div class="model-body">
            <div onclick="closeImageViewer()" class="close-btn">x</div>
            <div class="model-content">
                <div class="image-viewer-container">
                    <div class="image-viewer">
                        <img id="frontImg" src="" alt="Front Page">
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>

<script>
    let startX, startY, endX, endY;
    let isSwipe = false;

    const swipeArea = document.getElementById("bgimg");

    // Handle touch start
    swipeArea.addEventListener("touchstart", (e) => {
        isSwipe = false;
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });

    // Handle touch move
    swipeArea.addEventListener("touchmove", (e) => {
        const moveX = e.touches[0].clientX;
        const moveY = e.touches[0].clientY;
        const dx = moveX - startX;
        const dy = moveY - startY;

        // If movement is more than a few pixels, treat as swipe
        if (Math.abs(dx) > 10 || Math.abs(dy) > 10) {
            isSwipe = true;
        }
    });

    // Handle touch end
    swipeArea.addEventListener("touchend", (e) => {
        if (!isSwipe) return; // Don't trigger swipe if it's a tap

        endX = e.changedTouches[0].clientX;
        endY = e.changedTouches[0].clientY;

        const dx = endX - startX;
        const dy = endY - startY;

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
        } else {
            //   if (dy > 30) {
            //     alert("Swiped Down");
            //   } else if (dy < -30) {
            //     alert("Swiped Up");
            //   }
        }
    });

    // Handle click
    swipeArea.addEventListener("click", (e) => {
        if (isSwipe) {
            // Ignore click if a swipe occurred
            e.preventDefault();
            return;
        }
        // alert("Clicked!");

        const input = e.target.style.backgroundImage;
        const path = input.slice(5, -2);


        document.getElementById('frontImg').setAttribute('src', path)
        document.getElementById('image-viewer').style.display = 'block'

    });

    // document.getElementById('bgimg').addEventListener('click', (e)=>{

    //         const input = e.target.style.backgroundImage;
    //             const path = input.slice(5, -2);


    //         document.getElementById('frontImg').setAttribute('src', path)
    //         document.getElementById('image-viewer').style.display = 'block'


    //     })
    document.getElementById('bgimg2').addEventListener('click', (e) => {

        const input = e.target.style.backgroundImage;
        const path = input.slice(5, -2);


        document.getElementById('frontImg').setAttribute('src', path)
        document.getElementById('image-viewer').style.display = 'block'


    })
    document.getElementById('bgimg3').addEventListener('click', (e) => {

        const input = e.target.style.backgroundImage;
        const path = input.slice(5, -2);


        document.getElementById('frontImg').setAttribute('src', path)
        document.getElementById('image-viewer').style.display = 'block'


    })

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
    }

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
    let isTamil = true;
    let calendar;
    let month;
    let monthName;
    let year;
    let next = 0;
    const backBtn = document.querySelector('.backbtn');
    const rightBtn = document.querySelector('.rightBtn');
    const posterImg = document.getElementById('bgimg');
    const eventPoster = document.getElementById('bgimg2')
    const curMonth = document.getElementById('month');

    rightBtn.addEventListener("click", function() {
        next = 1;
        month += 1;
        updateIndex();
    })
    backBtn.addEventListener("click", function() {
        next = -1;
        month -= 1;
        updateIndex();
    })

    document.getElementById("toggleSwitch").addEventListener("change", function() {
        if (this.checked) {
            isTamil = false;


        } else {
            isTamil = true;

        }
        next = 0;
        setCalendarImage();
        // updateIndex();
    });

    function updateIndex() {

        setCalendarImage();
    }

    function setMonth() {
        const today = new Date();
        month = today.getMonth() + 1; // getMonth() returns 0-11
        year = today.getFullYear(); // 

        setCalendarImage();
    }

    function setCalendarImage() {
        let key;
        let summary;

        if (month == 1) {
            backBtn.style.display = 'none';
        } else if (month == 12) {
            rightBtn.style.display = 'none'
        } else {
            backBtn.style.display = 'block';
            rightBtn.style.display = 'block';
        }


        if (isTamil) {
            summary = 'tamEvent'
            switch (month) {
                case 1:
                    key = 'tamJan'
                    monthName = "தை"
                    break;
                case 2:
                    key = 'tamFeb'
                    monthName = "மாசி"
                    break;
                case 3:
                    key = 'tamMar'
                    monthName = "பங்குனி"
                    break;
                case 4:
                    key = 'tamApr'
                    monthName = "சித்திரை"
                    break;
                case 5:
                    key = 'tamMay'
                    monthName = "வைகாசி"
                    break;
                case 6:
                    key = 'tamJun'
                    monthName = "ஆனி"
                    break;
                case 7:
                    key = 'tamJul'
                    monthName = "ஆடி"
                    break;
                case 8:
                    key = 'tamAug'
                    monthName = "ஆவணி"
                    break;
                case 9:
                    key = 'tamSep'
                    monthName = "புரட்டாதி"
                    break;
                case 10:
                    key = 'tamOct'
                    monthName = "ஐப்பசி"
                    break;
                case 11:
                    key = 'tamNov'
                    monthName = "கார்த்திகை"
                    break;
                case 12:
                    key = 'tamDec'
                    monthName = "மார்கழி"
                    break;

                default:
                    break;
            }
        } else {
            summary = 'engEvent'
            switch (month) {
                case 1:
                    key = 'engJan';
                    monthName = "January"
                    break;
                case 2:
                    key = 'engFeb'
                    monthName = "February"
                    break;
                case 3:
                    key = 'engMar'
                    monthName = "March"
                    break;
                case 4:
                    key = 'engApr'
                    monthName = "April"
                    break;
                case 5:
                    key = 'engMay'
                    monthName = "May"
                    break;
                case 6:
                    key = 'engJun'
                    monthName = "June"
                    break;
                case 7:
                    key = 'engJul'
                    monthName = "July"
                    break;
                case 8:
                    key = 'engAug'
                    monthName = "August"
                    break;
                case 9:
                    key = 'engSep'
                    monthName = 'September'
                    break;
                case 10:
                    key = 'engOct'
                    monthName = 'October'
                    break;
                case 11:
                    key = 'engNov'
                    monthName = 'November'
                    break;
                case 12:
                    key = 'engDec'
                    monthName = 'December'
                    break;

                default:
                    break;
            }
        }

        let selectImg = calendar[key].split('<?php echo $_SERVER['DOCUMENT_ROOT']  ?>')[1];
        let selectEvent = calendar[summary].split('<?php echo $_SERVER['DOCUMENT_ROOT']  ?>')[1];
        console.log(selectEvent);

        if (next == -1) {
            posterImg.classList.add('moveRightOff');
            // posterImg.style.backgroundImage = `url('${albumImages[currentIndex]}')`;
            posterImg.style.backgroundImage = `url('${selectImg}')`;
            // posterImg.classList.add('moveRightIn');
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


    //Notice Handling
    let notice = [];
    let noticeIndex = 0;
    const right = document.getElementById('rightNot');
    const left = document.getElementById('leftNot');
    const noticeImg = document.getElementById('bgimg3');

    left.addEventListener('click', updateNotice);
    right.addEventListener('click', updateNotice);

    function openNoticeModel() {
        closeMobileMenu();
        document.getElementById('notice-model').style.display = 'block';
        noticeImg.style.backgroundImage = `url('${notice[noticeIndex]}')`;
        noticeIndex = 1
        // updateNotice();


    }

    function closeNoticeModel() {
        document.getElementById('notice-model').style.display = 'none';
        noticeIndex = 0;
    }

    function updateNotice() {

        if (noticeIndex == 1) {

            // console.log('ssddsdfooooooooooo');

            noticeImg.classList.add('moveRightOff');
            // noticeImg.setAttribute('src', notice[currentIndex]);
            noticeImg.style.backgroundImage = `url('${notice[noticeIndex]}')`;
            console.log(notice[noticeIndex]);

            // // posterImg.classList.add('moveRightIn');
            // left.setAttribute('style', 'display: block');
            // right.setAttribute('style', 'display: none');
            right.style.display = 'none';
            left.style.display = 'block';

            setTimeout(() => {
                noticeImg.classList.remove('moveRightOff');
                noticeImg.classList.add('moveRightIn');
            }, 500);
            setTimeout(() => {
                noticeImg.classList.remove('moveRightIn');
            }, 1000);

            noticeIndex = 0;

        } else {

            noticeImg.style.backgroundImage = `url('${notice[noticeIndex]}')`;
            console.log(notice[noticeIndex]);

            // right.setAttribute('style', 'display: block');
            right.style.display = 'block';
            left.style.display = 'none';
            // left.setAttribute('style', 'display: none');
            noticeImg.classList.add('moveleftOff');
            setTimeout(() => {
                noticeImg.classList.remove('moveleftOff');
                noticeImg.classList.add('moveLeftIn');
            }, 500);

            setTimeout(() => {
                noticeImg.classList.remove('moveLeftIn');
            }, 1000);
            noticeIndex = 1;

        }
    }

    function loadNotice() {
        notice = [];
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetNotice.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);

                let tamilN = response.data[0].tamil;
                console.log(tamilN)
                notice.push(
                    tamilN.split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>')[1]
                )
                let englishN = response.data[0].eng;
                notice.push(
                    englishN.split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>')[1]
                )

                console.log(notice);



            }
        }
        xhr.send();
    }


    //OnLoad 
    function loadCalendar() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetCalendar.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);
                calendar = response.data[0];
                // console.log(calendar);

                setMonth()
            }
        }
        xhr.send();
    }
    window.onload = function() {
        loadCalendar();
        loadNotice();
    }
</script>