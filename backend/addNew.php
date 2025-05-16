<?php 
    include_once "../db/connection.php";
    include_once "../db/query.php";
    session_start();
    $data = [$_GET['name'], $_GET['email'], $_GET['phone'], $_GET['course']];  

    /**
     * insert statement of new student in the db , and execute the query
     */
    try {
        $statement = "INSERT INTO students (`name`, `email`, `phone`, `course`) VALUES (?, ?, ?, ?)";
        if(queryExecute($statement, $data, $conn)) {
            $_SESSION['msg'] = "Student Added Successfully";
            header("Location:../index.php");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>