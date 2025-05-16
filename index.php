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
                <?php include('Components/Live;Tv.php') ?>
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
            <h3>நிகழ்வுகள்</h3>
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
                <div class="img-cover"></div>
                <!-- <img src="/Assets/Images/vin.jpg" alt=""> -->
            </div>
        </div>
    </div>

    <!-- Gallery -->

    <div class="gallery">

    <div class="gallery-bg"></div>
        <div class="gallery-title">
            <h3>Gallery</h3>
            <hr>
        </div>
        <div class="gallery-content">
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
            <?php include("Components/collection.php") ?>
           
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

    <div class="footer bg-red-900">
        <div>
            <span class="text-gray-200">Designed By : </span> Mass Production
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
    //  function seeNotice() {
    //     document.getElementById('frontImg').src = posters[currentIndex];
    //     document.getElementById('image-viewer').style.display = 'block';
    // }
    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
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