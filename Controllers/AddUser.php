<?php
if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}

if (isset($_POST['submit'])) {

    include("DbConnectivity.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
     $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user(email,password) VALUE('$email', '$passwordHash')";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo json_encode([
            'status' => true,
            'message' => 'Admin Created Successfully'
        ]);

        mysqli_close($db);

        exit();
    } else {
       $message = mysqli_error($db);
        mysqli_close($db);
        echo json_encode([
            'status' => false,
            'message' => $message
        ]);
        exit();
    }
} elseif (isset($_POST['edit-submit'])) {
    include("DbConnectivity.php");

    $id =  $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['active'];
    
    if(strlen($password) > 0) {
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
         
        $query = "UPDATE user set password = '$passwordHash', isActive = $status, email = '$email'  WHERE id = $id";
    } else {
        $query = "UPDATE user set isActive = $status, email = '$email'  WHERE id = $id";
    }
    $result = mysqli_query($db, $query);

    if ($result) {
        mysqli_close($db);

        echo json_encode([
            'status' => true,
            'message' => 'Admin updated successfully!'
        ]);
    } else {
        $message = mysqli_error($db);
        mysqli_close($db);
        echo json_encode([
            'status' => false,
            'message' => $message
        ]);
    }

} elseif (isset($_POST['del-submit'])) {
    include('DbConnectivity.php');

    $ID = $_POST['ID'];

    $query = "DELETE from programs where ID = '$ID'";
    $result = mysqli_query($db, $query);

    if ($result) {

        mysqli_close($db);
        echo json_encode([
            'status' => true,
            'message' => 'Program Deleted Successfully'
        ]);

        exit();
    } else {
        mysqli_close($db);
        echo json_encode([
            'status' => false,
            'message' => 'Unable to delete. Try again later'
        ]);
        exit();
    }
}
