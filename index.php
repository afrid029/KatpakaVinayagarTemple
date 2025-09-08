<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>கற்பக விநாயகர் தேவஸ்தானம்</title>
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

    <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/Form.css">
    
    <link rel="stylesheet" href="/Assets/CSS/pagination.css"> !-->
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/model2.css">
    <link rel="stylesheet" href="/Assets/CSS/login.css">
    <link rel="stylesheet" href="Assets/CSS/eventTile.css">
    <link rel="stylesheet" href="Assets/CSS/collection.css">

</head>

<!--  -->

<nav class="bg-red-900">
    <div class="nav-bg"></div>
    <div class="mx-auto">
        <div class="flxdir">
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
                <li><a href="/calendar">Calendar</a></li>
                <li><a href="/notice">Notice</a></li>
                <li><a href="/gallery">Gallery</a></li>
                <li onclick="gotoAbout()">About</li>


                <?php if(!isset($_COOKIE['user'])) { ?>
            <li class="login" onclick="openLogin()">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#FFFFFF">
                        <path
                            d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
                    </svg>
                    Login</li>

            <?php   } else {
                ?>
                <li  class="login">
               <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M192-192v-96l72-72v168h-72Zm126 0v-222l66-66 6 6v282h-72Zm126 0v-228l72 72v156h-72Zm126 0v-186l72-72v258h-72Zm126 0v-312l72-72v384h-72ZM192-378v-102l192-192 144 144 240-240v102L528-426 384-570 192-378Z"/></svg>
                <a style="color:white;" href="/dashboard" target="_blank">Dashboard</a></li>
                
                <?php
            }?>


                
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

    <?php
    if (isset($_SESSION['fromAction']) && $_SESSION['fromAction'] === true) { ?>

    <div class="alert-container" id="alertSecond">
        <div class="alert" id="alertContSecond">
            <p><?php echo $_SESSION['message'] ?></p>
        </div>
    </div>

    <?php
    if ($_SESSION['status'] === true) {
        echo "<script>document.getElementById('alertContSecond').style.backgroundColor = '#1D7524';</script>";
    } else {
        echo "<script>document.getElementById('alertContSecond').style.backgroundColor = '#E44C4C';</script>";
    }
    ?>
    <script>
        document.getElementById('alertSecond').style.display = 'flex';
        setTimeout(() => {
            document.getElementById('alertSecond').style.display = 'none';
        }, 5000);
    </script>
    <?php
    }
    $_SESSION['fromAction'] = false;

?>
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
                <a href="/calendar">Calendar</a></div>
            <div >
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
               <a href="/notice">Notice</a></div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/gallery">Gallery</a></div>
            <div onclick="gotoAbout()">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                About</div>

            <?php if(!isset($_COOKIE['user'])) { ?>
            <div onclick="openLogin()">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                Login</div>

            <?php   } else {
                ?>
                <div>
               <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF"><path d="M192-192v-96l72-72v168h-72Zm126 0v-222l66-66 6 6v282h-72Zm126 0v-228l72 72v156h-72Zm126 0v-186l72-72v258h-72Zm126 0v-312l72-72v384h-72ZM192-378v-102l192-192 144 144 240-240v102L528-426 384-570 192-378Z"/></svg>
                <a href="/dashboard">Dashboard</a></div>
                
                <?php
            }?>

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
            <div id="event-details" class="event-details">

            </div>
            <div class="events-right">
                <div class="events-img">

                </div>
                <div class="img-cover"></div>
                <!-- <img src="/Assets/Images/vin3.png" alt=""> -->
            </div>
        </div>
    </div>

    <!-- Gallery -->

    <div class="gallery">

        <div class="gallery-bg"></div>
        <div class="gallery-title">
            <div class="gallery-head">
                <h3>Gallery</h3>
                <h5><a href="/gallery">All gallery >></a></h5>
            </div>
            <hr>
        </div>

        <div id="gallery-content" class="gallery-content">

        </div>
    </div>

     <!-- AboutUs -->
     <?php include('Components/aboutus.php') ?>

    <?php include('Components/loginModel.php') ?>

    <!-- Album Model -->
    <div id="album-model" class="model-overlay2">
        <div class="model-content2">
            <div onclick="closeAlbumView()" class="close-btn2">Close</div>
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
        </div>
    </div>
    
  

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
                top: window.scrollY + rect.top -
                200, // Current scroll position + element's top position + 100px
                behavior: 'smooth' // Smooth scrolling
            });
        }
    }
    document.getElementById("event-details").addEventListener("click", function(event) {
        const cur = event.target.closest('.event');
        const descElement = cur.querySelectorAll('div')[4];
        let status = descElement.style.display == "block";
        if (status) {
            descElement.style.display = "none";
        } else {
            descElement.style.display = "flex";
        }
    })

    function openLogin() {
        // document.getElementById('frontImg').src = posters[currentIndex];
        closeMobileMenu();
        document.getElementById('login-model').style.display = 'block';
    }

    function closeLoginViewer() {
        document.getElementById('login-model').style.display = 'none';
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
    }
    let albumImages = [];
    let currentIndex = 0;
    let next = 0
    const backBtn = document.querySelector('.backbtn');
    const rightBtn = document.querySelector('.rightBtn');
    const posterImg = document.getElementById('bgimg');
    backBtn.addEventListener('click', goBack);
    rightBtn.addEventListener('click', goNext);

    function closeAlbumView() {
        document.getElementById('album-model').style.display = 'none';
        currentIndex = 0;
        next = 0;
        backBtn.style.display = 'none'
        rightBtn.style.display = 'block'
    }

    function openAlbum(data) {
        albumImages = [];
        // console.log(data);
        data.split(' ,').forEach((el) => {
            const single = el.split('<?php echo $_SERVER['DOCUMENT_ROOT'] ?>');
            albumImages.push(single[1]);
        })
        document.getElementById('bgimg').style.backgroundImage = `url('${albumImages[0]}')`;
        document.getElementById('album-model').style.display = 'block';
    }

    function goBack() {
        next = -1;
        currentIndex -= 1;
        updateAlbum();
    }

    function goNext() {
        next = 1;
        currentIndex += 1;
        updateAlbum();
    }

    function updateAlbum() {
        if (currentIndex == 0) {
            backBtn.style.display = 'none';
            rightBtn.style.display = 'block';
        } else if (currentIndex == albumImages.length - 1) {
            rightBtn.style.display = 'none'
            backBtn.style.display = 'block';
        } else {
            backBtn.style.display = 'block';
            rightBtn.style.display = 'block';
        }
        if (next == -1) {
            posterImg.classList.add('moveRightOff');
            posterImg.style.backgroundImage = `url('${albumImages[currentIndex]}')`;
            // posterImg.classList.add('moveRightIn');
            setTimeout(() => {
                posterImg.classList.remove('moveRightOff');
                posterImg.classList.add('moveRightIn');
            }, 300);
            setTimeout(() => {
                posterImg.classList.remove('moveRightIn');
            }, 600);
        } else {
            posterImg.style.backgroundImage = `url('${albumImages[currentIndex]}')`;
            posterImg.classList.add('moveleftOff');
            setTimeout(() => {
                posterImg.classList.remove('moveleftOff');
                posterImg.classList.add('moveLeftIn');
            }, 300);
            setTimeout(() => {
                posterImg.classList.remove('moveLeftIn');
            }, 600);
        }
    }

    //On Load Functions
    function loadEvent() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllEventHome.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("event-details").innerHTML = response.html;
            }
        }
        xhr.send();
    }

    function loadAlbum() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetTopAlbums.php', true);
        xhr.onload = function() {
            // console.log("sdsadsad");
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("gallery-content").innerHTML = response.html;
            }else {
                console.log(xhr.status)
            }
        }
        xhr.send();
    }
    window.onload = function() {
        loadEvent();
        loadAlbum();
    };
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