<?php 
    if (!isset($_GET['id'])) {
        header("Location:../index.php");
    }
    session_start();
    include_once "../db/connection.php";
    include_once "../db/query.php";

    // extract the data from the query string and create an array of it
    $data = [$_GET['name'], $_GET['phone'], $_GET['email'], $_GET['course'], $_GET['sid']];

    /**
     * update query execution 
     */
    try {
        $statement = "UPDATE students SET `name` = ? , `phone` = ? , `email` = ? , `course` = ? WHERE `id` = ?";
        if(queryExecute($statement, $data, $conn)) {
            $_SESSION['msg'] = "Student with Email ({$_GET['email']}) edited Successfully";
            header("Location:../index.php");
        }        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>