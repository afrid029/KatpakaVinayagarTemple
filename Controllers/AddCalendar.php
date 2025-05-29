<?php

 if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}


if(isset($_POST['submit'])){
    include('DbConnectivity.php');
       $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Calendar/";

    $type = $_POST['type'];
    $name = '';
    $image= '';
    $column = '';

    switch ($type) {
        case 'tamil-sum':
            # code...
            $name = 'tsum';
            $image = 'Tamil Summary';
            $column = 'tamEvent';
            break;
        case 'tamil-jan':
            $name = 'tjan';
            $image = 'January(T)';
            $column = 'tamJan';
            break;
        case 'tamil-feb':
            $name = 'tfeb';
            $image = 'February(T)';
            $column = 'tamFeb';
            break;
        case 'tamil-mar':
            $name = 'tmar';
            $image = 'March(T)';
            $column = 'tamMar';
            break;
        case 'tamil-apr':
            $name = 'tapr';
            $image = 'April(T)';
            $column = 'tamApr';
            break;
        case 'tamil-may':
            $name = 'tmay';
            $image = 'May(T)';
            $column = 'tamMay';
            break;
        case 'tamil-jun':
            $name = 'tjun';
            $image = 'June(T)';
            $column = 'tamJun';
            break;
        case 'tamil-jul':
            $name = 'tjul';
            $image = 'July(T)';
            $column = 'tamJul';
            break;
        case 'tamil-aug':
            $name = 'taug';
            $image = 'August(T)';
            $column = 'tamAug';
            break;
        case 'tamil-sep':
            $name = 'tsep';
            $image = 'September(T)';
            $column = 'tamSep';
            break;
        case 'tamil-oct':
            $name = 'toct';
            $image = 'October(T)';
            $column = 'tamOct';
            break;
        case 'tamil-nov':
            $name = 'tnov';
            $image = 'November(T)';
            $column = 'tamNov';
            break;
        case 'tamil-dec':
            $name = 'tdec';
            $image = 'December(T)';
            $column = 'tamDec';
            break;

        
        case 'eng-sum':
            # code...
            $name = 'esum';
            $image = 'English Summary';
            $column = 'engEvent';
            break;
        case 'eng-jan':
            $name = 'ejan';
            $image = 'January(E)';
            $column = 'engJan';
            break;
        case 'eng-feb':
            $name = 'efeb';
            $image = 'February(E)';
            $column = 'engFeb';
            break;
        case 'eng-mar':
            $name = 'emar';
            $image = 'March(E)';
            $column = 'engMar';
            break;
        case 'eng-apr':
            $name = 'eapr';
            $image = 'April(E)';
            $column = 'engApr';
            break;
        case 'eng-may':
            $name = 'emay';
            $image = 'May(E)';
            $column = 'engMay';
            break;
        case 'eng-jun':
            $name = 'ejun';
            $image = 'June(E)';
            $column = 'engJun';
            break;
        case 'eng-jul':
            $name = 'ejul';
            $image = 'July(E)';
            $column = 'engJul';
            break;
        case 'eng-aug':
            $name = 'eaug';
            $image = 'August(E)';
            $column = 'engAug';
            break;
        case 'eng-sep':
            $name = 'esep';
            $image = 'September(E)';
            $column = 'engSep';
            break;
        case 'eng-oct':
            $name = 'eoct';
            $image = 'October(E)';
            $column = 'engOct';
            break;
        case 'eng-nov':
            $name = 'enov';
            $image = 'November(E)';
            $column = 'engNov';
            break;
        case 'eng-dec':
            $name = 'edec';
            $image = 'December(E)';
            $column = 'engDec';
            break;
        
        default:
            # code...
            mysqli_close($db);
             echo json_encode([
            'status' => false,
            'message' => 'Anonymous issue found']);
            exit();
            break;
    }



    $result = true;

    
    $file = $_FILES[$name]["name"];
    $imageFileType = strtolower(pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDirectory . $image . "." . $imageFileType;
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $targetFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);

            $query = "UPDATE calendar set $column = '$targetFile' where ID = 2025";
            $res = mysqli_query($db, $query);

            $result = $res;
        } else {
            // deleteDirectory($targetDirectory);
            // $_SESSION['message'] = "Failed to upload Image. Try again later!";
            // $_SESSION['status'] = false;
            // $_SESSION['fromAction'] = true;
            mysqli_close($db);
            echo json_encode([
            'status' => false,
            'message' => 'Failed to upload Image. Try again later!'
            ]);
            exit();
            return;
        }

    // print_r($length);
    // exit();
    

    if($result){
        // mysqli_commit($db);
        mysqli_close($db);
        // $_SESSION['message'] = "Beneficiary Created successfully!";
        // $_SESSION['status'] = true;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => true,
            'message' => $image.' Calendar updated successfully!'
        ]);
        exit();
        // header('Location: /beneficent');

    }else {
        // mysqli_rollback($db);
        mysqli_close($db);
        // $_SESSION['message'] = "Unable to create. Try Again Later!";
        // $_SESSION['status'] = false;
        // $_SESSION['fromAction'] = true;
        echo json_encode([
            'status' => false,
            'message' => 'Unable to create. Try Again Later!'
        ]);
        exit();
       
    }

}
?>