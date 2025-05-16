<?php
    try {
        $username = "root";
        $password = "";
        $db = "student_management_system";
        $host = "localhost";
        $conn = new PDO("mysql:host=$host;dbname=$db",$username,$password);
        if (!$conn) {
            throw Exception("Can't Connect To the DB"); 
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>