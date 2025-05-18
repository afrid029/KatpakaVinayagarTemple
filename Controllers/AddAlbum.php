<?php
if(isset($_POST['submit'])){

    function deleteDirectory($dir) {
    if (!file_exists($dir)) return true;

    if (!is_dir($dir)) return unlink($dir); // delete file if not directory

    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;

        $path = $dir . DIRECTORY_SEPARATOR . $item;
        deleteDirectory($path);
    }

    return rmdir($dir); // remove empty directory
}

    // if (!isset($_COOKIE['user'])) {
    //     header('Location: /');
    //     exit();
    // }
    // SESSION_START();

    include('DbConnectivity.php');

    $query = "SELECT COUNT(DISTINCT ID) cnt from gallery";

    $result = mysqli_query($db, $query);
    
    $row = mysqli_fetch_assoc($result);
    $randomId = rand(100, 999);

    $ID = 'album'.$row['cnt']. $randomId;
    $album = $_POST['album'];


    mysqli_begin_transaction($db);

    $result = true;

    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Album";
    $customFolder = $ID.' '.$album;
    $targetDirectory =  $targetDirectory . '/' . $customFolder . '/';

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory);
    }

    $length = count($_FILES["image"]["name"]);

    // print_r($length);
    // exit();

    

    for ($i = 0; $i < $length; $i++) {
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"][$i], PATHINFO_EXTENSION));

        $timestamp = time(); // Current timestamp (seconds since Unix epoch)
        $randomNumber = rand(1000, 9999); // Random number to add some variability
        $targetFile = $targetDirectory . $ID . "_" . $timestamp . "_" . $randomNumber . "." . $imageFileType;

        
        if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $targetFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);

            $query = "INSERT INTO gallery (ID, event, image) VALUES ('$ID', '$album','$targetFile')";
            $res = mysqli_query($db, $query);

            $result = $result && $res;
        } else {
            deleteDirectory($targetDirectory);
            $_SESSION['message'] = "Failed to upload Images. Try again later!";
            $_SESSION['status'] = false;
            $_SESSION['fromAction'] = true;
            mysqli_rollback($db);
            mysqli_close($db);
            echo json_encode([
            'status' => false,
            'message' => 'Failed to upload Images. Try again later!'
        ]);
            exit();
            break;
            return;
        }
    }

    

    if($result){
        mysqli_commit($db);
        mysqli_close($db);
        $_SESSION['message'] = "Beneficiary Created successfully!";
        $_SESSION['status'] = true;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => 'Album Created successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        mysqli_rollback($db);
        mysqli_close($db);
        $_SESSION['message'] = "Unable to create. Try Again Later!";
        $_SESSION['status'] = false;
        $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to create. Try Again Later!'
        ]);
        exit();
       
    }

}
?>