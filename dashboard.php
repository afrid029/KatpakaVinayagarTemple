<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/R1.PNG" />
    <title>கற்பக விநாயகர் தேவஸ்தானம்</title>
    <meta charset="UTF-8">
 

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
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/dashboard.css">
    <link rel="stylesheet" href="/Assets/CSS/login.css">
    <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/DeleteModel.css">
    <style>
        .font-english {
            font-family: 'Roboto', sans-serif;
        }

        .font-tamil {
            font-family: 'Anek Tamil', sans-serif;
        }
    </style>
</head>
<nav class="bg-red-900">
    <div class="nav-bg"></div>
    <div class="mx-auto">
        <div class="relative flex h-25 items-center justify-between flxdir">
            <div class="nav-container">
                <div class="nav-content">
                    <h3>Dashboard</h3>
                </div>
            </div>
            <div class="logout">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#FFFFFF">
                    <path
                        d="M480-120q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840v106q-106.26 0-180.13 73.87Q226-586.26 226-480q0 106.26 73.87 180.13Q373.74-226 480-226v106Zm160-141.35L565.35-337l90-90H347v-106h308.35l-90-91L640-698.65 858.65-480 640-261.35Z" />
                </svg>
                <a href="/logout">Logout</a>
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

            console.log('Alert triggerdd');


            setTimeout(() => {
                document.getElementById('alertSecond').style.display = 'none';
            }, 7000);
        </script>
    <?php
    }
    $_SESSION['fromAction'] = false;

    if (!isset($_COOKIE['user'])) {
        header('Location: /');
        echo "<script>window.location.pathname = '/'</script>";
        exit();
    } else {

        $data = base64_decode($_COOKIE['user']);

        // Extract the IV (the first 16 bytes)
        $iv = substr($data, 0, 16);

        // Extract the encrypted email (the rest of the string)
        $encryptedData = substr($data, 16);
        $key = 'YD3rEAXKcb4rc67whX13gR81LAc7YQjXLZgQowkU3/Q=';
        // Decrypt the email using AES-256-CBC decryption
        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);

        // $query = "SELECT * from users where email = '$decryptedEmail'";
        $passedArray = unserialize($decryptedData);
        // $result = mysqli_query($db, $query);

        $_SESSION['email'] = $passedArray['email'];
        $_SESSION['isSuperAdmin'] = $passedArray['isAdmin'];
    }

    ?>

    <div class="add-buttons">
        <div onclick="handleModel('event-model', true)" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
            </svg> &nbsp;
            Event
        </div>
        <div onclick="addListener()" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
            </svg> &nbsp;
            Album
        </div>

        <?php 
            if($_SESSION['isSuperAdmin'] == true){
                ?>
                <div onclick="handleModel('user-model', true)" class="createBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                                <path d="M427-427H180.78v-106H427v-246.22h106V-533h246.22v106H533v246.22H427V-427Z" />
                            </svg> &nbsp;
                            Admin
                </div>
                <?php
            }
        ?>
        

    </div>
    <!-- Alert -->
    <div class="alert-container" id="alert">
        <div class="alert" id="alertCont">
            <p id="alert-text"></p>
        </div>

    </div>

    <!-- Add Event -->
    <div id="event-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="handleModel('event-model', false)" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Create Upcoming Event</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="add-event-form" method="post" oninput="validateEventForm()">
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="title">Title</label>
                                    <input type="text" name="title" id="title" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="description">Description</label>
                                    <textarea type="textarea" name="description" id="description" required></textarea>
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="date">Date</label>
                                    <input type="date" name="date" id="date" required></input>
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="time">Time</label>
                                    <input type="time" name="time" id="time" required></input>
                                </div>

                                <button type="submit" id="event-submit" name="submit" disabled="true" class="upload">
                                    Create
                                </button>

                                <button style="display: none;" id="event-submiting" disabled="true" class="upload">
                                    Creating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit Event -->
    <div id="edit-event-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="handleModel('edit-event-model', false)" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Edit Event</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="edit-event-form" method="post" oninput="validateEditEventForm()">
                            <input type="text" name="event-id" id="event-id" hidden>
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="edit-title">Title</label>
                                    <input type="text" name="edit-title" id="edit-title" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="edit-description">Description</label>
                                    <textarea type="textarea" name="edit-description" id="edit-description"
                                        required></textarea>
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="edit-date">Date</label>
                                    <input type="date" name="edit-date" id="edit-date" required></input>
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="edit-time">Time</label>
                                    <input type="time" name="edit-time" id="edit-time" required></input>
                                </div>

                                <button type="submit" id="edit-event-submit" name="submit" disabled="true"
                                    class="upload">
                                    Update
                                </button>

                                <button style="display: none;" id="edit-event-submiting" disabled="true" class="upload">
                                    Updating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Event -->
    <div class="del-modal-overlay" id="deleteEventModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">

            <form id="delete-event-form" method="post" class="del-form">
                <input type="text" hidden name='ID' id='del-event-id'>
                <div class="delMsg">
                    <h4>Do you want to delete this Event ?</h4>
                </div>
                <div class="option-btn ">
                    <button onclick="handleModel('deleteEventModel', false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-event-submit" type="submit">Yes</button>
                    <button style="display: none;" id="del-event-submiting" disabled="true" class="opt yes"> Yes
                    </button>
                </div>

            </form>
        </div>
    </div>

     <!-- Add Admin -->
    <div id="user-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="handleModel('user-model', false)" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Create User</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="add-user-form" method="post" oninput="validateUserForm()">
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="email">email</label>
                                    <input type="email" name="email" id="email" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="password">Password</label>
                                    <input type="password" name="password" id="password" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="repassword">Re Password</label>
                                    <input type="password" name="repassword" id="repassword" required />
                                </div>
                                

                                <button type="submit" id="user-submit" name="submit" disabled="true" class="upload">
                                    Create
                                </button>

                                <button style="display: none;" id="user-submiting" disabled="true" class="upload">
                                    Creating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit User -->
    <div id="edit-user-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="handleModel('edit-user-model', false)" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Edit Admin</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="edit-user-form" method="post" oninput="validateEditUserForm()">
                            <input type="number" name="edit-userid" id="edit-userid" hidden>
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="edit-email">Email</label>
                                    <input type="email" name="edit-email" id="edit-email" required />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="edit-password">Password</label>
                                    <input type="password" name="edit-password" id="edit-password"  />
                                </div>
                                <div class="FormRow">
                                    <label htmlFor="edit-repassword">Re Password</label>
                                    <input type="password" name="edit-repassword" id="edit-repassword"  />
                                </div>
                                
                                <div class="">
                                    <label for="form-active">Active</label>
                                    <input type="radio" name="status" id="form-active">
                                </div>
                                <div class="flex items-center gap-3">
                                    <label for="form-deactive">Deactive</label>
                                    <input type="radio" name="status" id="form-deactive">
                                </div>

                                <button type="submit" id="edit-user-submit" name="submit" disabled="true"
                                    class="upload">
                                    Update
                                </button>

                                <button style="display: none;" id="edit-user-submiting" disabled="true" class="upload">
                                    Updating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Gallery -->
    <div id="gallery-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="removeListener()" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Create Album</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="add-album-form" method="post" oninput="validateAlbumForm()">
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="album">Album Name</label>
                                    <input type="text" name="album" id="album" required />
                                </div>

                                <!-- Images -->
                                <div class="FormRow">
                                    <small
                                        style="color: gray; display: flex; width: 100%; font-size: 12px; margin-bottom: 5px; font-family: Lato, serif">Attach
                                        Image(s)</small>
                                    <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg"
                                        id="select-image" name="image[]" placeholder="Upload Images" multiple hidden>
                                    <button class="image-btn" type="button" onclick="openImage()">select images</button>
                                    <small class="small">Images required</small>
                                    <div id="preview-container"
                                        style="display: flex; justify-content: center; gap: 5px; flex-wrap:wrap; margin-top: 10px;">
                                    </div>
                                </div>

                                <script>
                                    let allFiles = [];

                                    function openImage() {
                                        document.getElementById('select-image').click();
                                    }

                                    function PreviewImages(event) {
                                        // console.log("val");
                                        const newFiles = Array.from(event.target.files);
                                        // const files = event.target.files;
                                        // if (newFiles.length + allFiles.length > 6) {
                                        //     alert('You can select a maximum of 6 images.');
                                        //     event.target.value = '';
                                        //     validateAlbumForm(); // Clear the input (prevents submitting the 7th file)
                                        //     return;
                                        // }
                                        allFiles = [...allFiles, ...newFiles];
                                        // console.log(allFiles);
                                        // console.log(fileNames);
                                        event.target.value = '';
                                        displayImages();
                                        validateAlbumForm();
                                        // Loop through the selected files
                                    }

                                    function displayImages() {
                                        const previewContainer = document.getElementById('preview-container');
                                        previewContainer.innerHTML =
                                            ''; // Clear the container before showing new images
                                        for (let i = 0; i < allFiles.length; i++) {
                                            const file = allFiles[i];
                                            // Check if the selected file is an image
                                            if (file.type.startsWith('image/')) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    const divEl = document.createElement('div');
                                                    divEl.style.width = '100px';
                                                    divEl.style.height = 'auto';
                                                    divEl.style.position = 'relative';
                                                    divEl.style.display = 'flex'
                                                    divEl.style.flexDirection = 'column'
                                                    divEl.style.gap = '5px'
                                                    divEl.style.backgroundColor = '#CBCBCB'
                                                    divEl.style.borderRadius = '10px'
                                                    const imgElement = document.createElement('img');
                                                    imgElement.src = e.target.result;
                                                    imgElement.style.borderRadius = '10px'
                                                    imgElement.style.height = '100px';
                                                    imgElement.style.width =
                                                        '100px'; // Optional: resize the image for preview
                                                    imgElement.style.objectFit =
                                                        'cover'; // Optional: resize the image for preview
                                                    // imgElement.style.margin = '10px';
                                                    const delButton = document.createElement('button');
                                                    delButton.textContent = 'Delete'
                                                    delButton.style.position = 'relative';
                                                    delButton.style.backgroundColor = '#670e0e';
                                                    delButton.style.border = 'transparent';
                                                    delButton.style.borderRadius = '10px';
                                                    delButton.style.padding = '5px';
                                                    delButton.style.color = 'white';
                                                    delButton.style.cursor = 'pointer';
                                                    delButton.type = 'button';
                                                    delButton.onclick = function() {
                                                        removeImage(i);
                                                    }
                                                    // Optional: add margin between images
                                                    divEl.appendChild(imgElement)
                                                    divEl.appendChild(delButton)
                                                    previewContainer.appendChild(divEl);
                                                };
                                                reader.readAsDataURL(
                                                    file); // Read the file as a data URL for previewing
                                            } else {
                                                alert('Please select only image files.');
                                            }
                                        }
                                    }

                                    function removeImage(index) {
                                        // Remove the file from the allFiles array
                                        allFiles.splice(index, 1);
                                        // Re-render the file list
                                        displayImages();
                                        validateAlbumForm();
                                    }
                                </script>

                                <button type="submit" id="album-submit" name="submit" disabled="false" class="upload">
                                    Create
                                </button>

                                <button style="display: none;" id="album-submitting" disabled="true" class="upload">
                                    Creating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit Gallery NOT IMPLEMENTED -->
    <div id="edit-gallery-model" class="model-overlay">
        <div class="model-body">
            <div class="model-content">
                <div class="login-form">
                    <div onclick="handleModel('edit-gallery-model', false);" class="close-btn">x</div>
                    <div class="login-title">
                        <h4>Edit Album</h4>
                        <hr>
                    </div>
                    <div class="login-content">
                        <form id="edit-album-form" method="post">
                            <input type="text" name="ID" id="album-id" hidden>
                            <div class="Form">
                                <div class="FormRow">
                                    <label htmlFor="edit-album">Album Name</label>
                                    <input type="text" name="album" id="edit-album" required />
                                </div>

                                <!-- Images -->
                                <!-- <div class="FormRow">
                                    <small
                                        style="color: gray; display: flex; width: 100%; font-size: 12px; margin-bottom: 5px; font-family: Lato, serif">Attach
                                        Image(s)</small>
                                    <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg"
                                        id="edit-select-image" name="image[]" placeholder="Upload Images" multiple hidden>
                                    <button class="image-btn" type="button" onclick="openEditImage()">select images</button>
                                    <small class="small">Images required</small>
                                    <div id="edit-preview-container"
                                        style="display: flex; justify-content: center; gap: 5px; flex-wrap:wrap; margin-top: 10px;">
                                    </div>
                                </div> -->

                                <!-- <script>
                                    let allEditFiles = [];

                                    function openEditImage() {
                                        document.getElementById('edit-select-image').click();
                                    }

                                    function PreviewEditImages(event) {
                                        // console.log("val");
                                        const newFiles = Array.from(event.target.files);
                                        // const files = event.target.files;
                                        // if (newFiles.length + allFiles.length > 6) {
                                        //     alert('You can select a maximum of 6 images.');
                                        //     event.target.value = '';
                                        //     validateAlbumForm(); // Clear the input (prevents submitting the 7th file)
                                        //     return;
                                        // }
                                        allEditFiles = [...allFiles, ...newFiles];
                                        // console.log(allFiles);
                                        // console.log(fileNames);
                                        event.target.value = '';
                                        displayEditImages();
                                        validateEditAlbumForm();
                                        // Loop through the selected files
                                    }

                                    function displayEditImages() {
                                        const previewContainer = document.getElementById('edit-preview-container');
                                        previewContainer.innerHTML =
                                            ''; // Clear the container before showing new images
                                            
                                            
                                        for (let i = 0; i < allEditFiles.length; i++) {
                                            const file = allEditFiles[i];
                                            console.log(file);
                                            // Check if the selected file is an image
                                            if (file.type.startsWith('image/')) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    const divEl = document.createElement('div');
                                                    divEl.style.width = '100px';
                                                    divEl.style.height = 'auto';
                                                    divEl.style.position = 'relative';
                                                    divEl.style.display = 'flex'
                                                    divEl.style.flexDirection = 'column'
                                                    divEl.style.gap = '5px'
                                                    divEl.style.backgroundColor = '#CBCBCB'
                                                    divEl.style.borderRadius = '10px'
                                                    const imgElement = document.createElement('img');
                                                    imgElement.src = e.target.result;
                                                    imgElement.style.borderRadius = '10px'
                                                    imgElement.style.height = '100px';
                                                    imgElement.style.width =
                                                        '100px'; // Optional: resize the image for preview
                                                    imgElement.style.objectFit =
                                                        'cover'; // Optional: resize the image for preview
                                                    // imgElement.style.margin = '10px';
                                                    const delButton = document.createElement('button');
                                                    delButton.textContent = 'Delete'
                                                    delButton.style.position = 'relative';
                                                    delButton.style.backgroundColor = '#670e0e';
                                                    delButton.style.border = 'transparent';
                                                    delButton.style.borderRadius = '10px';
                                                    delButton.style.padding = '5px';
                                                    delButton.style.color = 'white';
                                                    delButton.style.cursor = 'pointer';
                                                    delButton.type = 'button';
                                                    delButton.onclick = function() {
                                                        removeEditImage(i);
                                                    }
                                                    // Optional: add margin between images
                                                    divEl.appendChild(imgElement)
                                                    divEl.appendChild(delButton)
                                                    previewContainer.appendChild(divEl);
                                                };
                                                reader.readAsDataURL(
                                                    file); // Read the file as a data URL for previewing
                                            } else {
                                                alert('Please select only image files.');
                                            }
                                        }
                                    }

                                    function removeEditImage(index) {
                                        // Remove the file from the allFiles array
                                        allEditFiles.splice(index, 1);
                                        // Re-render the file list
                                        displayEditImages();
                                        validateEditAlbumForm();
                                    }
                                </script> -->

                                <button type="submit" id="edit-album-submit" name="submit" class="upload">
                                    Update
                                </button>

                                <button style="display: none;" id="edit-album-submitting" disabled="true" class="upload">
                                    Updating...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Delete Gallery -->
    <div class="del-modal-overlay" id="deleteAlbumModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">

            <form id="delete-album-form" method="post" class="del-form">
                <input type="text" hidden name='ID' id='del-album-id'>
                <div class="delMsg">
                    <h4>Do you want to delete this Album ?</h4>
                </div>
                <div class="option-btn ">
                    <button onclick="handleModel('deleteAlbumModel', false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-album-submit" type="submit">Yes</button>
                    <button style="display: none;" id="del-album-submiting" disabled="true" class="opt yes"> Yes
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- View Admins -->
     <?php 
        if($_SESSION['isSuperAdmin'] == true) {
            ?>
                <div class="event-viewer">
        <div class="event-viewer-title">
            <h2 class="event-ttl">Admins</h2>
            <hr>
        </div>
        <div id="loading-spinner-admin" class="loading-spinner"></div>
        <div id="admin-viewer-content" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        
        </div>

    </div>
            <?php
        }

    ?>

    <!-- View Events -->
    <div class="event-viewer">
        <div class="event-viewer-title">
            <h2 class="event-ttl">Events</h2>
            <hr>
        </div>
        <div id="loading-spinner" class="loading-spinner"></div>
        <div id="event-viewer-content" class="event-viewer-content">

        </div>

    </div>

    <!-- View Gallery -->

    <div class="album-viewer">
        <div class="album-viewer-title">
            <h2 class="event-ttl">Albums</h2>
            <hr>
        </div>
        <div id="loading-spinner2" class="loading-spinner"></div>
        <div id="album-viewer-content" class="album-viewer-content">

        </div>

        <div id="table-pagi"></div>

    </div>

    <!-- Add Calendar -->

    <div class="form-bg">
        <h2 class="event-ttl">Calendar Update</h2>
        <hr style="margin-top: 2%; margin-bottom: 2%">
        <div id="cal-Form" class="cal-body">

            <div class="tamil">
                <h3>Tamil</h3>
                <form method="post" id="tamil-sum">
                    <div style="
                        background-color: #f9b44d30;
                        padding: 5px;
                        border-radius: 8px;
                        width: 95%;
                        margin: auto" class="month">
                        <label for="tsum">Summary</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tsum" id="tsum"
                            required />
                        <button id="tamil-sum-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-jan">
                    <div class="month">
                        <label for="tjan">January</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tjan" id="tjan"
                            required />
                        <button id="tamil-jan-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-feb">
                    <div class="month">
                        <label for="tfeb">February</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tfeb" id="tfeb"
                            required />
                        <button id="tamil-feb-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-mar">
                    <div class="month">
                        <label for="tmar">March</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tmar" id="tmar"
                            required />
                        <button id="tamil-mar-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-apr">
                    <div class="month">
                        <label for="tapr">April</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tapr" id="tapr"
                            required />
                        <button id="tamil-apr-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-may">
                    <div class="month">
                        <label for="tmay">May</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tmay" id="tmay"
                            required />
                        <button id="tamil-may-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-jun">
                    <div class="month">
                        <label for="tjun">June</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tjun" id="tjun"
                            required />
                        <button id="tamil-jun-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-jul">
                    <div class="month">
                        <label for="tjul">July</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tjul" id="tjul"
                            required />
                        <button id="tamil-jul-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-aug">
                    <div class="month">
                        <label for="taug">August</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="taug" id="taug"
                            required />
                        <button id="tamil-aug-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-sep">
                    <div class="month">
                        <label for="tsep">September</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tsep" id="tsep"
                            required />
                        <button id="tamil-sep-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-oct">
                    <div class="month">
                        <label for="toct">October</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="toct" id="toct"
                            required />
                        <button id="tamil-oct-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-nov">
                    <div class="month">
                        <label for="tnov">November</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tnov" id="tnov"
                            required />
                        <button id="tamil-nov-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="tamil-dec">
                    <div class="month">
                        <label for="tdec">December</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="tdec" id="tdec"
                            required />
                        <button id="tamil-dec-btn">Update</button>
                    </div>
                </form>

            </div>
            <div class="english">
                <h3>English</h3>
                <form method="post" id="eng-sum">
                    <div style="
                        background-color: #f9b44d30;
                        padding: 5px;
                        border-radius: 8px;
                        width: 95%;
                        margin: auto" class="month">
                        <label for="ejan">Summary</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="esum" id="esum"
                            required />
                        <button id="eng-sum-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-jan">
                    <div class="month">
                        <label for="ejan">January</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="ejan" id="ejan"
                            required />
                        <button id="eng-jan-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-feb">
                    <div class="month">
                        <label for="efeb">February</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="efeb" id="efeb"
                            required />
                        <button id="eng-feb-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-mar">
                    <div class="month">
                        <label for="emar">March</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="emar" id="emar"
                            required />
                        <button id="eng-mar-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-apr">
                    <div class="month">
                        <label for="eapr">April</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="eapr" id="eapr"
                            required />
                        <button id="eng-apr-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-may">
                    <div class="month">
                        <label for="emay">May</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="emay" id="emay"
                            required />
                        <button id="eng-may-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-jun">
                    <div class="month">
                        <label for="ejun">June</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="ejun" id="ejun"
                            required />
                        <button id="eng-jun-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-jul">
                    <div class="month">
                        <label for="ejul">July</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="ejul" id="ejul"
                            required />
                        <button id="eng-jul-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-aug">
                    <div class="month">
                        <label for="eaug">August</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="eaug" id="eaug"
                            required />
                        <button id="eng-aug-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-sep">
                    <div class="month">
                        <label for="esep">September</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="esep" id="esep"
                            required />
                        <button id="eng-sep-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-oct">
                    <div class="month">
                        <label for="eoct">October</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="eoct" id="eoct"
                            required />
                        <button id="eng-oct-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-nov">
                    <div class="month">
                        <label for="enov">November</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="enov" id="enov"
                            required />
                        <button id="eng-nov-btn">Update</button>
                    </div>
                </form>
                <form method="post" id="eng-dec">
                    <div class="month">
                        <label for="edec">December</label>
                        <input type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="edec" id="edec"
                            required />
                        <button id="eng-dec-btn">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Add Notice -->
    <!-- Tamil -->
    <div class="bg-white !my-2 !py-6 rounded-lg w-full flex flex-col !px-3 md:!px-10">
        <h2 class="text-base md:text-mg lg:text-lg xl:text-xl !pl-3 text-[#a52a2a] font-semibold">Upload Notice (Tamil)</h2>
        <hr style="margin-top: 2%; margin-bottom: 2%">
        <form class="w-full flex flex-col gap-4 !px-2" id="add-notice-tamil" method="post">
            <div class="flex w-full !pt-2 shrink-1 gap-4 items-center flex-wrap justify-start">
                <input class="w-full md:w-[80%] border-0 border-b border-[#9A9999] focus:border-b-2 focus:border-[#9A9999] focus:ring-0 focus:outline-none" name="noticeTitle" type="text" placeholder="Notice Title" required>
                <div class="flex gap-2 shrink  ">
                    <input type="file" class="border-2 shrink min-w-0 w-[50%] lg:w-full border-[#F1F1F1] border-solid rounded-md !p-2" accept="image/jpeg, image/png, image/gif, image/jpg" name="tamnotice"
                        id="tamnotice" required />
                    <button type="submit" id="tamil-notice" class="bg-[#f9b44d] disabled:bg-[#CFC39F] rounded-lg cursor-pointer font-semibold shrink-0 !p-2">Upload</button>
                </div>
            </div>
        </form>

        <div id="loading-spinner3" class="loading-spinner"></div>
        <div id="tamil-notices" class="flex flex-col w-full md:w-[85%] gap-4 !py-6">

        </div>


    </div>
    <!-- English -->
    <div class="bg-white !my-2 !py-6 rounded-lg w-full flex flex-col !px-3 md:!px-10">
        <h2 class="text-base md:text-mg lg:text-lg xl:text-xl !pl-3 text-[#a52a2a] font-semibold">Upload Notice (English)</h2>
        <hr style="margin-top: 2%; margin-bottom: 2%">
        <form class="w-full flex flex-col gap-4 !px-2" id="add-notice-english" method="post">
            <div class="flex w-full !pt-2 shrink-1 gap-4 items-center flex-wrap justify-start">
                <input class="w-full md:w-[80%] border-0 border-b border-[#9A9999] focus:border-b-2 focus:border-[#9A9999] focus:ring-0 focus:outline-none" name="noticeTitle" type="text" placeholder="Notice Title" required>
                <div class="flex gap-2 shrink  ">
                    <input type="file" class="border-2 shrink min-w-0 w-[50%] lg:w-full border-[#F1F1F1] border-solid rounded-md !p-2" accept="image/jpeg, image/png, image/gif, image/jpg" name="engnotice"
                        id="engnotice" required />
                    <button type="submit" id="english-notice" class="bg-[#f9b44d] disabled:bg-[#CFC39F] rounded-lg cursor-pointer font-semibold shrink-0 !p-2">Upload</button>
                </div>
            </div>
        </form>

        <div id="loading-spinner4" class="loading-spinner"></div>
        <div id="english-notices" class="flex flex-col w-full md:w-[85%] gap-4 !py-6">

        </div>


    </div>

    <!-- View Image -->
    <div id="image-viewer" class=" hidden fixed top-0 left-0 w-full h-full bg-white/40 rounded-2xl shadow-[0_4px_30px_rgba(0,0,0,0.1)] backdrop-blur-[9.6px]">
        <span onclick="closeImageViewer()" class="cursor-pointer top-2 right-2 fixed w-8 aspect-square flex items-center justify-center rounded-full bg-black text-white font-english">X</span>

        <div id="noticeImg" class="bg-contain bg-contain bg-no-repeat bg-center w-full h-full"></div>   

    </div>

    <!-- Delete Notice -->
    <div class="del-modal-overlay" id="deleteNoticeModel">
        <div class="del-modal-content" onclick="event.stopPropagation()">

            <form id="delete-notice-form" method="post" class="del-form">
                <input type="text" hidden name='ID' id='del-notice-id'>
                <div class="delMsg">
                    <h4>Do you want to delete this Notice ?</h4>
                </div>
                <div class="option-btn ">
                    <button onclick="handleModel('deleteNoticeModel', false)" class="opt no" type="button">No</button>
                    <button name="del-submit" class="opt yes" id="del-notice-submit" type="submit">Yes</button>
                    <button style="display: none;" id="del-notice-submiting" disabled="true" class="opt yes"> Yes
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>

<script>
    function handleModel(ID, status) {
        const model = document.getElementById(ID);
        if (status) {
            model.style.display = "block";
        } else {
            model.style.display = "none";
        }
    }
    // Add Event
    function validateEventForm() {
        const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;
        const date = document.getElementById("date").value;
        const time = document.getElementById("time").value;
        const submit = document.getElementById("event-submit");
        // const submiting = document.getElementById("event-submiting");
        if (title && description && date && time) {
            submit.disabled = false;
        } else {
            submit.disabled = true;
        }
    }
    document.getElementById("add-event-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("event-submit");
        const submiting = document.getElementById("event-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault(); // Prevent the default form submission
        const form = document.getElementById("add-event-form");
        const formData = new FormData(form); // Create a FormData object from the form
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddEvent.php", true); // Adjust the URL to your PHP script
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('event-model', false);
                    form.reset();
                    validateEventForm();
                    loadEvent();
                    // navigate(1);
                } else {
                    alertRise(false, response.message)
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        }
        xhr.send(formData);
    })
    //Edit Event
    function EditEvent(data) {
        document.getElementById("event-id").value = data.ID
        document.getElementById("edit-title").value = data.title
        document.getElementById("edit-description").value = data.description
        document.getElementById("edit-date").value = data.date
        document.getElementById("edit-time").value = data.time
        validateEditEventForm();
        handleModel('edit-event-model', true);
    }

    function validateEditEventForm() {
        const title = document.getElementById("edit-title").value;
        const description = document.getElementById("edit-description").value;
        const date = document.getElementById("edit-date").value;
        const time = document.getElementById("edit-time").value;
        const submit = document.getElementById("edit-event-submit");
        // const submiting = document.getElementById("event-submiting");
        if (title && description && date && time) {
            submit.disabled = false;
        } else {
            submit.disabled = true;
        }
    }
    document.getElementById("edit-event-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("edit-event-submit");
        const submiting = document.getElementById("edit-event-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault(); // Prevent the default form submission
        const form = document.getElementById("edit-event-form");
        const formData = new FormData(form); // Create a FormData object from the form
        formData.append('edit-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddEvent.php", true); // Adjust the URL to your PHP script
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-event-model', false);
                    form.reset();
                    validateEditEventForm();
                    loadEvent();
                    // navigate(1);
                } else {
                    alertRise(false, response.message)
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        }
        xhr.send(formData);
    })
    //Delete Event
    function DeleteEvent(data) {
        document.getElementById('del-event-id').value = data.ID;
        handleModel('deleteEventModel', true)
    }
    document.getElementById('delete-event-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-event-submit');
        const submiting = document.getElementById('del-event-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        // const id =  document.getElementById('del-event-id').value;
        const form = document.getElementById('delete-event-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddEvent.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (xhr.status) {
                    alertRise(true, response.message);
                    handleModel('deleteEventModel', false);
                    loadEvent();
                } else {
                    alertRise(false, response.message);
                }
            } else {
                console.log('XHR Error', xhr.status);
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        }
        xhr.send(formData);
    })



     // Add User
    function validateUserForm() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const repassword = document.getElementById("repassword").value;
        const submit = document.getElementById("user-submit");
        // const submiting = document.getElementById("event-submiting");
        if (email && password && password == repassword) {
            submit.disabled = false;
        } else {
            submit.disabled = true;
        }
    }
    document.getElementById("add-user-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("user-submit");
        const submiting = document.getElementById("user-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault(); // Prevent the default form submission
        const form = document.getElementById("add-user-form");
        const formData = new FormData();
        formData.append('email', document.getElementById("email").value);
        formData.append('password', document.getElementById("password").value);
        formData.append('submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddUser.php", true); // Adjust the URL to your PHP script
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('user-model', false);
                    form.reset();
                    validateUserForm();
                    loadUsers();
                    // navigate(1);
                } else {
                    alertRise(false, response.message)
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        }
        xhr.send(formData);
    })


    //Edit User
    function editUser(id) {
         document.getElementById('edit-userid').value = '';
         document.getElementById('edit-email').value = '';
        document.getElementById('edit-password').value = '';
        document.getElementById('edit-repassword').value = '';
        document.getElementById('form-active').checked = false;
        document.getElementById('form-deactive').checked = false
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetUser.php?id=' + id, true);
        document.getElementById('edit-user-model').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response.data)
                 document.getElementById('edit-userid').value = response.data[0].id;
                 document.getElementById('edit-email').value  = response.data[0].email;
                if(response.data[0].isActive == true) {
                    document.getElementById('form-active').checked = true;
                }else {
                    document.getElementById('form-deactive').checked = true;
                }

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
        // const submiting = document.getElementById("event-submiting");
        if (email) {
            if (password.length > 0 || repassword.length > 0) {
                if(password == repassword){

                    submit.disabled = false;
                } else {
                    submit.disabled = true;
                }
            } else {
                submit.disabled = false;
            }
        } else {
            submit.disabled = true;
        }
    }
    document.getElementById("edit-user-form").addEventListener("submit", function(event) {
        const submit = document.getElementById("edit-user-submit");
        const submiting = document.getElementById("edit-user-submiting");
        submit.style.display = "none";
        submiting.style.display = "block";
        event.preventDefault(); // Prevent the default form submission
        const form = document.getElementById("edit-user-form");
        const formData = new FormData; // Create a FormData object from the form

        const userid = document.getElementById('edit-userid').value;
        const email = document.getElementById('edit-email').value;
        const password = document.getElementById('edit-password').value;
        const status = document.getElementById('form-active').checked ? true : false;
        formData.append('userid', userid);
        formData.append('email', email);
        formData.append('password', password);
        formData.append('active', status);
        formData.append('edit-submit', true)
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddUser.php", true); // Adjust the URL to your PHP script
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-user-model', false);
                    form.reset();
                    validateEditUserForm();
                    loadUsers();
                    // navigate(1);
                } else {
                    alertRise(false, response.message)
                }   
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submiting.style.display = "none";
        }
        xhr.send(formData); 
    })

    //Add Album
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
        const selectedImage = document.getElementById('select-image').value;
        let button = document.getElementById('album-submit');
        //console.log(selectedImage);
        if (album && allFiles.length > 1) {
            button.disabled = false;
        } else {
            console.log("false");
            button.disabled = true;
        }
    }
    document.getElementById("add-album-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // console.log("kjhjkhk");
        let submit = document.getElementById("album-submit");
        let submitting = document.getElementById("album-submitting");
        submit.style.display = "none";
        submitting.style.display = "block";
        // event.preventDefault();
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
                    alertRise(true, response.message)
                    removeListener();
                    document.getElementById('add-album-form').reset();
                    validateAlbumForm();
                    allFiles = [];
                    displayImages();
                    loadAlbum(1)
                } else {
                    alertRise(false, response.message)
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submitting.style.display = "none";
        }
        xhr.send(formData);
    })

    //Edit Album NOT IMPLEMENTED
    function EditAlbum(data) {
        // console.log(data.images.split(" ,"));
        document.getElementById('edit-album').value = data.event;
        document.getElementById('album-id').value = data.ID;
        handleModel('edit-gallery-model', true);
    }

    function addEditListener() {
        document.getElementById('edit-select-image').addEventListener('change', PreviewEditImages);
        handleModel('edit-gallery-model', true);
    }

    function removeEditListener() {
        document.getElementById('select-image').removeEventListener('change', PreviewEditImages);
        handleModel('edit-gallery-model', false);
    }

    function validateEditAlbumForm() {
        const album = document.getElementById('edit-album').value.length > 0;
        const selectedImage = document.getElementById('edit-select-image').value;
        let button = document.getElementById('edit-album-submit');
        //console.log(selectedImage);
        if (album && allEditFiles.length > 0) {
            console.log("true");
            button.disabled = false;
        } else {
            console.log("false");
            button.disabled = true;
        }
    }
    document.getElementById("edit-album-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // console.log("kjhjkhk");
        let submit = document.getElementById("edit-album-submit");
        let submitting = document.getElementById("edit-album-submitting");
        submit.style.display = "none";
        submitting.style.display = "block";
        // event.preventDefault();
        const form = document.getElementById('edit-album-form')
        const formData = new FormData(form);
        // allEditFiles.forEach(file => {
        //     formData.append('image[]', file);
        // });

        formData.append('edit-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddAlbum.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    // removeEditListener();
                    handleModel('edit-gallery-model', false);
                    document.getElementById('edit-album-form').reset();
                    // validateEditAlbumForm();
                    // allEditFiles = [];
                    // displayEditImages();
                    loadAlbum(1)
                } else {
                    alertRise(false, response.message)
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            submit.style.display = "block";
            submitting.style.display = "none";
        }
        xhr.send(formData);
    })
    // Delete Album
    function DeleteAlbum(data) {
        document.getElementById('del-album-id').value = data.ID;
        handleModel('deleteAlbumModel', true)
    }
    document.getElementById('delete-album-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-album-submit');
        const submiting = document.getElementById('del-album-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        // const id =  document.getElementById('del-event-id').value;
        const form = document.getElementById('delete-album-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddAlbum.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (xhr.status) {
                    alertRise(true, response.message);
                    handleModel('deleteAlbumModel', false);
                    loadAlbum(1);
                } else {
                    alertRise(false, response.message);
                }
            } else {
                console.log('XHR Error', xhr.status);
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        }
        xhr.send(formData);
    })
    //Add Calendar
    document.getElementById("cal-Form").addEventListener('submit', function(event) {
        event.preventDefault();
        const id = event.target.id
        const btn = document.getElementById(id + '-btn');
        btn.disabled = true;
        console.log(event.target.id);
        const form = document.getElementById(id);
        const formData = new FormData(form);
        formData.append('type', id)
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
            } else {
                console.log('XHR Request Error', xhr.status);
            }
            btn.disabled = false;
        }
        xhr.send(formData);
    });
    //Add Notice
    document.getElementById("add-notice-tamil").addEventListener("submit", function(event) {
        event.preventDefault();
        const submit = document.getElementById("tamil-notice");
        submit.disabled = true;
        submit.innerText = "Uploading...";
        const form = document.getElementById("add-notice-tamil");
        const formData = new FormData(form);
        formData.append('lang', 't')
        formData.append('tamilsubmit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddNotice.php", true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    //handleModel('notice-model', false)
                    form.reset();
                    //validateNoticeForm();
                    loadNotices();
                } else {
                    alertRise(false, response.message);
                }
                submit.disabled = false;
                submit.innerText = "Upload";
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }
        xhr.send(formData);
    })
    document.getElementById("add-notice-english").addEventListener("submit", function(event) {
        event.preventDefault();
        const submit = document.getElementById("english-notice");
        submit.disabled = true;
        submit.innerText = "Uploading...";
        const form = document.getElementById("add-notice-english");
        const formData = new FormData(form);
        formData.append('lang', 'e')
        formData.append('englishsubmit', true);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "Controllers/AddNotice.php", true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message);
                    //handleModel('notice-model', false)
                    form.reset();
                    //validateNoticeForm();
                    loadNotices();
                } else {
                    alertRise(false, response.message);
                }
                submit.disabled = false;
                submit.innerText = "Upload";
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }
        xhr.send(formData);
    })
    //View Notice
    function viewNotice(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetNoticeImage.php?id=' + id, true);
        document.getElementById('image-viewer').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                const image = response.data[0].image.split('<?php echo $_SERVER['DOCUMENT_ROOT']  ?>')[1];
                // document.getElementById('noticeImg').src =image;
                document.getElementById('noticeImg').style.backgroundImage = 'url(' + image + ')';



            }
        };
        xhr.send();
    }

    //Delete Notice
    function deleteNotice(id) {
         document.getElementById('del-notice-id').value = id;
        handleModel('deleteNoticeModel', true)
    }
     document.getElementById('delete-notice-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const submit = document.getElementById('del-notice-submit');
        const submiting = document.getElementById('del-notice-submiting');
        submit.style.display = 'none';
        submiting.style.display = 'block';
        // const id =  document.getElementById('del-event-id').value;
        const form = document.getElementById('delete-notice-form');
        const formData = new FormData(form);
        formData.append('del-submit', true);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/Controllers/AddNotice.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);
                if (xhr.status) {
                    alertRise(true, response.message);
                    handleModel('deleteNoticeModel', false);
                    loadNotices();
                } else {
                    alertRise(false, response.message);
                }
            } else {
                console.log('XHR Error', xhr.status);
            }
            submit.style.display = 'block';
            submiting.style.display = 'none';
        }
        xhr.send(formData);
    })

    //Close Notice Viewer
    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
    }

    //ON load handles.
    function loadEvent() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllEvents.php', true);
        document.getElementById('loading-spinner').style.display = 'block';
        // const onload = document.getElementById('onrowload');
        // onload.classList.add('onrowload');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner').style.display = 'none';
                // document.getElementById('onrowload').style.display = 'none';
                // onload.classList.remove('onrowload');
                var response = JSON.parse(xhr.responseText);
                const dataContainer = document.getElementById('event-viewer-content')
                dataContainer.innerHTML = response.html;
                // resizeWindow();
                // dataContainer.classList.remove('fade-in'); // Remove the class to reset animation
                // void dataContainer.offsetWidth; // Trigger reflow
                // dataContainer.classList.add('fade-in'); // Apply fade-in animation
                // document.getElementById('table-pagi').innerHTML = response.pagination;
                // if (page === 1) {
                //     // document.getElementById('count').textContent = "From " + response.total + " donations";
                //     DisplayNumber(response.total, 'current')
                // }
            }
        };
        xhr.send();
    }

    function loadAlbum(page) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllAlbums.php?page=' + page, true);
        document.getElementById('loading-spinner2').style.display = 'block';
        // const onload = document.getElementById('onrowload');
        // onload.classList.add('onrowload');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner2').style.display = 'none';
                // document.getElementById('onrowload').style.display = 'none';
                // onload.classList.remove('onrowload');
                var response = JSON.parse(xhr.responseText);
                const dataContainer = document.getElementById('album-viewer-content')
                dataContainer.innerHTML = response.html;
                // resizeWindow();
                // dataContainer.classList.remove('fade-in'); // Remove the class to reset animation
                // void dataContainer.offsetWidth; // Trigger reflow
                // dataContainer.classList.add('fade-in'); // Apply fade-in animation
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

    function loadUsers() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetAllUsers.php', true);
        document.getElementById('loading-spinner-admin').style.display = 'block';
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('loading-spinner-admin').style.display = 'none';
                // document.getElementById('onrowload').style.display = 'none';
                // onload.classList.remove('onrowload');
                var response = JSON.parse(xhr.responseText);
                const users = document.getElementById('admin-viewer-content');
                users.innerHTML = response.html;
            }
        };
        xhr.send();
    }
    // Load the first page initially
    window.onload = function() {
        loadEvent();
        loadAlbum(1);
        loadNotices();
        <?php
            if($_SESSION['isSuperAdmin'] == true) {
                echo "loadUsers();";
            }
        ?>
    };
    //Alert Raise
    function alertRise(status, message) {
        document.getElementById('alert-text').innerText = message;
        if (status) {
            document.getElementById('alertCont').style.backgroundColor = '#1D7524';
        } else {
            document.getElementById('alertCont').style.backgroundColor = '#E44C4C';
        }
        setTimeout(() => {
            document.getElementById('alert').style.display = 'flex';
        }, 1000);
        setTimeout(() => {
            document.getElementById('alert').style.display = 'none';
        }, 6000);
    }
</script>