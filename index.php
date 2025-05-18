<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>கற்பக விநாயகர் தேவஸ்தானம்</title>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Mukta+Malar:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_circle_left" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_circle_right" /> -->

    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/Form.css">
    <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/pagination.css"> !-->
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/login.css">

</head>

<!--  -->

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
                <li class="login" onclick="openLogin()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#FFFFFF">
                        <path
                            d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
                    </svg>
                    Login</li>
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

    <!-- Banner -->
    <div class="banner">
        <div class="banner-circle"></div>
        <div class="banner-img">
            <h3>சகல வித்தைகளும் கைகூடி மகாமேதை எனும் நிலையை எட்டச் செய்பவர் இந்த விநாயகர்</h3>
        </div>
    </div>

    <!-- Live Tv -->
    <div class="livebody">
        <div class="body">
            <div class="bodybg"></div>
            <div class="livePlayer">
                <?php include('Components/LiveTv.php') ?>
            </div>
            <!-- <div class="poster">
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

            
            <img onclick="seeNotice()" id="posterimg" alt="" class="moveRight" srcset="">
        </div> -->
        </div>
    </div>
    <!-- Show Events -->
    <div class="events">
        <div class="events-title">
            <h3>Upcoming</h3>
            <hr>
        </div>
        <div class="events-container">
            <div class="event-details">
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>
                <?php include('Components/eventTile.php') ?>

            </div>
            <div class="events-right">
                <div class="events-img">

                </div>
                <div class="img-cover"></div>
                <!-- <img src="/Assets/Images/vin.jpg" alt=""> -->
            </div>
        </div>
    </div>

    <!-- Gallery -->

    <div class="gallery">

        <div class="gallery-bg"></div>
        <div class="gallery-title">
            <div class="gallery-head">
                <h3>Gallery</h3>
                <h5>All gallery >></h5>
            </div>
            <hr>
        </div>

        <div class="gallery-content">
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>

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

     <div class="footer bg-red-900">
        <div>
            <span class="text-gray-200">Designed By : </span> <a href="https://masspro.ca/en/" target="_blank">Mass
                Productions</a>
        </div>

    </div>

    <!-- Login Model -->
    <div id="login-model" class="model-overlay">
        <div class="model-body">
            <div onclick="closeLoginViewer()" class="close-btn">x</div>
            <div class="model-content">
                <div class="login-form">
                    <div class="login-title">
                        <h4>Login</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form action="/login" method="post" oninput="validateForm()"
                            onsubmit="return submitLoginform()">
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="email">Email</label>
                                    <input type="email" name="email" id="email" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="password">Password</label>
                                    <input type="password" name="password" id="password" required />
                                </div>

                                <button type="submit" id="submit" name="submit" disabled="true" class="upload"> Login
                                </button>

                                <button style="display: none;" id="submiting" disabled="true" class="upload"> logging
                                    in...
                                </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

   

</body>

<script>
    // const posters = ['/Assets/Images/noticet.jpg', '/Assets/Images/notice.jpg'];
    // const backBtn = document.querySelector('.backbtn');
    // const rightBtn = document.querySelector('.rightBtn');
    // const posterImg = document.getElementById('posterimg');
    // posterImg.setAttribute('src', posters[0]);
    // backBtn.addEventListener('click', updatePoster);
    // rightBtn.addEventListener('click', updatePoster);
    // // console.log(posters[0]);
    // let currentIndex = 0;
    // function updatePoster() {
    //     if(currentIndex ==  0) {
    //         currentIndex = 1;
    //         posterImg.classList.add('moveRightOff');
    //         posterImg.setAttribute('src', posters[currentIndex]);
    //         // posterImg.classList.add('moveRightIn');
    //         backBtn.setAttribute('style', 'display: block');
    //         rightBtn.setAttribute('style', 'display: none');
    //         setTimeout(() => {
    //             posterImg.classList.remove('moveRightOff');
    //             posterImg.classList.add('moveRightIn');
    //         }, 500);
    //          setTimeout(() => {
    //             posterImg.classList.remove('moveRightIn');
    //         }, 1000);
    //     } else {
    //         currentIndex = 0;
    //         posterImg.setAttribute('src', posters[currentIndex]);
    //         rightBtn.setAttribute('style', 'display: block');
    //         backBtn.setAttribute('style', 'display: none');
    //         posterImg.classList.add('moveleftOff');
    //           setTimeout(() => {
    //             posterImg.classList.remove('moveleftOff');
    //             posterImg.classList.add('moveLeftIn');
    //         }, 500);
    //          setTimeout(() => {
    //             posterImg.classList.remove('moveLeftIn');
    //         }, 1000);
    //     }
    // }
     function openLogin() {
        // document.getElementById('frontImg').src = posters[currentIndex];
        document.getElementById('login-model').style.display = 'block';
    }
    function closeLoginViewer() {
        document.getElementById('login-model').style.display = 'none';
        document.getElementById('frontImg').src = '';
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
</script>

<!-- <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('openIcon');
        const closeIcon = document.getElementById('closeIcon');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('block');
            openIcon.classList.remove('block');
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            closeIcon.classList.add('block');
        } else {
            mobileMenu.classList.remove('block');
            mobileMenu.classList.add('hidden');
            openIcon.classList.remove('hidden');
            openIcon.classList.add('block');
            closeIcon.classList.remove('block');
            closeIcon.classList.add('hidden');
        }
    })
    let bookPage = 1;
    let key;

    function loadPage(pagination) {
        const xhr = new XMLHttpRequest();
        document.querySelector('.loading').style.display = 'flex';
        if (pagination) {
            bookPage = pagination;
        }
        xhr.open("GET", "/Controllers/GetBooksForHome.php?page=" + bookPage + "&key=" + key, true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.querySelector('.loading').style.display = 'none';
                const content = document.querySelector(".books-content");
                const pagination = document.querySelector("#pagination");
                content.innerHTML = response.html;
                pagination.innerHTML = response.pagination;
                // cur = page;
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }
        xhr.send();
    }
    var closeSearch = document.getElementById("closeSearch");
    document.getElementById("search").addEventListener('input', function(event) {
        if (event.target.value.length > 0) {
            closeSearch.style.display = 'block';
        } else {
            closeSearch.style.display = 'none';
        }
    })

    function searchContent() {
        key = document.getElementById("search").value;
        bookPage = 1;
        loadPage();
    }

    function clearSearch() {
        key = undefined;
        document.getElementById('search').value = '';
        closeSearch.style.display = 'none';
        bookPage = 1;
        loadPage()
    }

    function seeBookImages(front, back, name, ID, donor) {
        document.getElementById('book-image').innerText = name;
        document.getElementById('bookCode').innerText = ID;
        document.getElementById('bookDonor').innerText = donor;
        let imgSrc = front;
        imgSrc = imgSrc.split("/");
        imgSrc = imgSrc[imgSrc.length - 1];
        imgSrc = "Public/Books/" + imgSrc;
        document.getElementById('frontImg').src = imgSrc;
        imgSrc = back;
        imgSrc = imgSrc.split("/");
        imgSrc = imgSrc[imgSrc.length - 1];
        imgSrc = "Public/Books/" + imgSrc;
        document.getElementById('backImg').src = imgSrc;
        document.getElementById('image-viewer').style.display = 'block';
    }

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
        document.getElementById('book-image').innerText = '';
        document.getElementById('frontImg').src = '';
        document.getElementById('backImg').src = '';
        document.getElementById('bookCode').innerText = '';
        document.getElementById('bookDonor').innerText = '';
    }
    window.onload = function() {
        loadPage(1);
    }
</script> -->

</html>