<?php
//   if (!isset($_COOKIE['user'])) {
//     header('Location: /');
//     echo "<script>window.location.pathname = '/'</script>";
//     exit();
// }

if(isset($_POST['submit'])){

    include("DbConnectivity.php");

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
  

    $query = "SELECT count(*) as cnt FROM programs";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $randomNumber = rand(100, 999);
    $ID = 'event'. $row['cnt'] . $randomNumber;

    $query = "INSERT INTO programs VALUE('$ID', '$title', '$description', '$date', '$time')";
    $result = mysqli_query($db, $query);
    
    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Program Added Successfully'
        ]);

        mysqli_close($db);

        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to add Program. try again later'
        ]);

        mysqli_close($db);
        exit();
    }

} elseif (isset($_POST['edit-submit'])) {
    include("DbConnectivity.php");

    $ID = $_POST['event-id'];
    $title = $_POST['edit-title'];
    $description = $_POST['edit-description'];
    $date = $_POST['edit-date'];
    $time = $_POST['edit-time'];

    $query = "UPDATE programs 
    set title = '$title',
    description = '$description',
    date = '$date',
    time = '$time'
    where ID = '$ID'";
    $result = mysqli_query($db, $query);
    
    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Program Updated Successfully'
        ]);

        mysqli_close($db);

        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to Update Program. try again later'
        ]);

        mysqli_close($db);
        exit();
    }
} elseif(isset($_POST['del-submit'])){
    include('DbConnectivity.php');

    $ID = $_POST['ID'];

    $query = "DELETE from programs where ID = '$ID'";
    $result = mysqli_query($db, $query);

    if($result){
         echo json_encode([
            'status' => true,
            'message' => 'Program Deleted Successfully'
        ]);

    } else {
         echo json_encode([
            'status' => false,
            'message' => 'Unable to delete. Try again later'
        ]);

    }
}

// elseif(isset($_POST['edit-submit'])){
//     include('DBConnectivity.php');

//     $name = $_POST['bookName'];
//     $author = $_POST['bookAuthor'];
//     $donor = $_POST['bookDonor'];
//     $price = $_POST['amount'];
//     $count = $_POST['count'];
//     $ID = $_POST['ID'];

//     $query = "SELECT * FROM books WHERE ID = '$ID'";
//     $result = mysqli_query($db, $query);
//     $fetchedRow = mysqli_fetch_assoc($result);

//     $isBack = false;
//     $isFront = false;

//     $targetFrontFile;
//     $targetBackFile;

//     if(isset($_FILES['frontImage']) && $_FILES['frontImage']['error'] == 0) {
//         if(file_exists($fetchedRow['frontpage'])){
//               unlink($fetchedRow['frontpage']);
//         }
      
//         $isFront = true;
//         $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Books/";

//         // Get the file extension
//         $imageFileType = strtolower(pathinfo($_FILES["frontImage"]["name"], PATHINFO_EXTENSION));
    
//         // Generate a unique file name using timestamp and a random number
//         $randomNumber = rand(100, 999); // Random number to add some variability
//         $targetFrontFile = $targetDirectory . $name . '-Front'.  $randomNumber . "." . $imageFileType;
    
//         if (move_uploaded_file($_FILES["frontImage"]["tmp_name"], $targetFrontFile)) {
//             // echo "The file has been uploaded successfully as: " . basename($targetFile);
//         } else {
    
//             echo json_encode([
//                 'status' => false,
//                 'message' => 'Unable to upload Image. try again later'
//             ]);
//             mysqli_close($db);
    
//             exit();
//         }
//     } 


//     if(isset($_FILES['backImage']) && $_FILES['backImage']['error'] == 0) {
//         if(file_exists($fetchedRow['backpage'])){
//             unlink($fetchedRow['backpage']);
//         }
        
//         $isBack = true;
//         $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Books/";

//         // Get the file extension
//         $imageFileType = strtolower(pathinfo($_FILES["backImage"]["name"], PATHINFO_EXTENSION));
    
//         // Generate a unique file name using timestamp and a random number
//         $randomNumber = rand(100, 999); // Random number to add some variability
//         $targetBackFile = $targetDirectory . $name . '-Back'.  $randomNumber . "." . $imageFileType;
    
//         if (move_uploaded_file($_FILES["backImage"]["tmp_name"], $targetBackFile)) {
//             // echo "The file has been uploaded successfully as: " . basename($targetFile);
//         } else {
    
//             echo json_encode([
//                 'status' => false,
//                 'message' => 'Unable to upload Image. try again later'
//             ]);
//             mysqli_close($db);
    
//             exit();
//         }
//     } 
    

//     if($isBack && $isFront){
//         $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', frontpage = '$targetFrontFile', backpage = '$targetBackFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
//     } elseif($isBack){
//         $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', backpage = '$targetBackFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
//     } elseif($isFront){
//         $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', frontpage = '$targetFrontFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
//     } else {
//         $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', amount = '$price', count = '$count' WHERE ID = '$ID'";
//     }

//     $result = mysqli_query($db, $query);


//     if($result){
//         echo json_encode([
//             'status' => true,
//             'message' => 'Book Updated Successfully'
//         ]);

//         mysqli_close($db);

//         exit();
//     } else {
//         echo json_encode([
//             'status' => false,
//             'message' => 'Unable to update Book. try again later'
//         ]);

//         mysqli_close($db);
//         exit();
//     }
// } else {
//     header('Location: /');
//     exit();
// }
?>