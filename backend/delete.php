<?php 
    include_once "../db/connection.php";
    include_once "../db/query.php";
    session_start();
    if (!isset($_GET['id'])) {
        header("Location:../index.php");
    }
    $id = $_GET['id'];
    $statement = "DELETE FROM students WHERE id = ?";
    if (queryExecute($statement, [$id], $conn)) {
        $_SESSION['msg'] = "Student with Id ($id) deleted Successfully";
        header("Location:../index.php");
    }
?>