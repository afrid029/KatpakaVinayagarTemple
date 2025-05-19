<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>Calendar | கற்பக விநாயகர் தேவஸ்தானம்</title>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_circle_left" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_circle_right" /> -->

    <link rel="stylesheet" href="/Assets/CSS/calendar.css">
    <link rel="stylesheet" href="/Assets/CSS/nav.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/pagination.css"> !-->
    <!-- <link rel="stylesheet" href="/Assets/CSS/model.css"> -->
    <!-- <link rel="stylesheet" href="/Assets/CSS/model2.css"> -->
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
                <li class="active">Home</li>
                <li>Calendar</li>
                <li>Notice</li>
                <li>Gallery</li>
                <li>About</li>

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
                Home</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                Calendar</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                Notice</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                Gallery</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                About</div>
        </div>

    </div>

    <div class="main">
        <div class="left">
            <div class="side-bg"></div>

        </div>
        <div class="content">
            <div class="month">
                <div class="toggle">
                    <small>த</small>
                    <label class="switch">
                        <input type="checkbox" id="toggleSwitch">
                        <span class="slider"></span>
                    </label>
                    <small>E</small>
                </div>
                <h4>May - 2025</h4>
                <hr>
            </div>
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
    <div class="about">
        <div class="about-title">
            <h3>About Us</h3>
            <hr>
        </div>
        <div class="about-content">
            <h4>
                The Sri Katpaga Vinayagar Temple is located in Brampton (Mississauga), Ontario, Canada. Sri Katpaga
                Vinayagar is the main deity. The other deities in the temple include Sri Konanathar, Sri Mathumaiyamman,
                Sri Aancha Neyar Swami, Sri Nagapooshani Ambal, Sri Devi, Sri Mahavishnu(Vishnu), Sri Poomi Devi, Hari
                Hara Buthra Iyanar, Tadsanamoorthy, Sri Raja Rajeswary, Sri Valli, Sri Subramaniyar (Muruan), Sri
                Theivanai, Durkka, Nadarajar (Load Siva), Sri Aiyappa Swami, Navagrahas { 9 Planets – Sun(Surya),
                Moon(Chandra), Mars(Mangala), Mercury(Budha), Jupiter(Brihaspathi), Venus(Sukra), Saturn(Sani), Rahu and
                Ketu } and the Sri Kaala Vairavar.
            </h4>
        </div>
    </div>

</body>

</html>

<script>
    function openLogin() {
        // document.getElementById('frontImg').src = posters[currentIndex];
        document.getElementById('login-model').style.display = 'block';
    }

    function closeLoginViewer() {
        document.getElementById('login-model').style.display = 'none';
    }
    const openMenue = document.querySelector('.openMenu');
    const closeMenu = document.querySelector('.closeMenu');
    const mobileNav = document.querySelector('.mobile-nav');
    openMenue.addEventListener('click', () => {
        openMenue.setAttribute('style', 'display: none');
        closeMenu.setAttribute('style', 'display: block');
        mobileNav.setAttribute('style', 'display: block');
    })
    closeMenu.addEventListener('click', () => {
        openMenue.setAttribute('style', 'display: block');
        closeMenu.setAttribute('style', 'display: none');
        mobileNav.setAttribute('style', 'display: none');
    })
    let isTamil = true;
    let calendar;
    let month;
    let year;
    document.getElementById("toggleSwitch").addEventListener("change", function() {
        if (this.checked) {
            isTamil = false;
        } else {
            isTamil = true;
        }
    });

    function setMonth() {
        const today = new Date();
        month = today.getMonth() + 1; // getMonth() returns 0-11
        year = today.getFullYear(); // 

        setCalendarImage();
    }

    function setCalendarImage() {
        let key;
        let summary;
        if(isTamil){
           summary = 'tamEvent'
            switch (month) {
                case 1:
                    key = 'tamJan'
                    break;
                case 2:
                    key = 'tamFeb'
                    break;
                case 3:
                    key = 'tamMar'
                    break;
                case 4:
                    key = 'tamApr'
                    break;
                case 5:
                    key = 'tamMay'
                    break;
                case 6:
                    key = 'tamJun'
                    break;
                case 7:
                    key = 'tamJul'
                    break;
                case 8:
                    key = 'tamAug'
                    break;
                case 9:
                    key = 'tamSep'
                    break;
                case 10:
                    key = 'tamOct'
                    break;
                case 11:
                    key = 'tamNov'
                    break;
                case 12:
                    key = 'tamDec'
                    break;
            
                default:
                    break;
            }
        }else {
            summary = 'engEvent'
            switch (month) {
                case 1:
                    key = 'engJan'
                    break;
                case 2:
                    key = 'engFeb'
                    break;
                case 3:
                    key = 'engMar'
                    break;
                case 4:
                    key = 'engApr'
                    break;
                case 5:
                    key = 'engMay'
                    break;
                case 6:
                    key = 'engJun'
                    break;
                case 7:
                    key = 'engJul'
                    break;
                case 8:
                    key = 'engAug'
                    break;
                case 9:
                    key = 'engSep'
                    break;
                case 10:
                    key = 'engOct'
                    break;
                case 11:
                    key = 'engNov'
                    break;
                case 12:
                    key = 'engDec'
                    break;
            
                default:
                    break;
            }
        }

        let selectImg = calendar[key].split('katpakaVinayakar')[1];
        let selectEvent = calendar[summary].split('katpakaVinayakar')[1];
        // console.log(selectImg);
        

        document.getElementById('bgimg').style.backgroundImage = `url('${selectImg}')`;
        document.getElementById('bgimg').style.backgroundImage = `url('${selectEvent}')`;
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
console.log(calendar);

                setMonth()
            }
        }
        xhr.send();
    }
    window.onload = function() {
        loadCalendar();
    }
</script>