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

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_circle_left" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_circle_right" /> -->

    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/nav.css"> -->
    <!-- <link rel="stylesheet" href="/Assets/CSS/alert.css">!-->
    <link rel="stylesheet" href="/Assets/CSS/pagination.css"> 
    <!-- <link rel="stylesheet" href="/Assets/CSS/model.css"> -->
    <link rel="stylesheet" href="/Assets/CSS/model2.css">
    <!-- <link rel="stylesheet" href="/Assets/CSS/login.css"> -->
    <!-- <link rel="stylesheet" href="Assets/CSS/eventTile.css"> -->
    <link rel="stylesheet" href="Assets/CSS/collection.css">

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
                <li ><a href="/">Home</a></li>
                <li ><a href="/calendar">Calendar</a></li>
                <li onclick="openNoticeModel()">Notice</li>
                <li class="active">Gallery</li>
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
                <a href="/">Home</a></div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                <a href="/calendar">Calendar</a></div>
            <div onclick="openNoticeModel()">
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
            <div onclick="gotoAbout()">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    fill="#F19E39">
                    <path
                        d="M337.69-662 394-814.46V-902h52v96h68v-96h52v87.54L622.31-662H337.69ZM106-106v-412h52v96h89.31l6.15-20h453.08l6.15 20H802v-96h52v412H586v-192H374v192H106Zm168.69-388 41.77-116h327.08l41.77 116H274.69Z" />
                </svg>
                About</div>
        
        </div>

    </div>

    <!-- Gallery -->

      <div class="gallery">

        <div class="gallery-bg"></div>
        <div class="gallery-title">
            <div class="gallery-head">
                <h3>Gallery</h3>
               
            </div>
            <hr>
        </div>

        <div id="gallery-content" class="gallery-content">

        </div>

        <div id="table-pagi"></div>
    </div>


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
            <div id="bgimg3" class="bgimg">
                
            </div>
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
            const single = el.split('katpakaVinayakar');
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
            // console.log(1);
            
        } else if(currentIndex == albumImages.length-1){
            rightBtn.style.display = 'none'
             backBtn.style.display = 'block';
            // console.log(2);
            
        }else {
            backBtn.style.display = 'block';
            rightBtn.style.display = 'block';
            // console.log(3);
            
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
        
        if(noticeIndex == 1) {
            
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
                notice.push(
                    tamilN.split('katpakaVinayakar')[1]
                )
                let englishN = response.data[0].eng;
                notice.push(
                    englishN.split('katpakaVinayakar')[1]
                )

                console.log(notice);
                
                

            }
        }
        xhr.send();
    }

    
     function loadAlbum(page) {
        
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllAlbum.php?page='+page, true);
        xhr.onload = function() {
            // console.log("sdsadsad");
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById("gallery-content").innerHTML = response.html;
                document.getElementById('table-pagi').innerHTML = response.pagination;
            }
        }
        xhr.send();
    }

     window.onload = function() {
       
        loadAlbum(1);
        loadNotice();
       
    };
</script>
</html>