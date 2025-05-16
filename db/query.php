<?php
    include_once "connection.php";
    function queryExecute($statement, $data, $conn)
    {
        try {
            $query = $conn->prepare($statement);
            if (count($data) && !isset($_GET['search']) && !isset($_GET['id'])) {
                if (!$query->execute($data)) {
                    throw new Exception("Data Submission Failed!");
                }
                echo "hello";
                return true;
            } else {
                if (!isset($_GET['search']) && !isset($_GET['id']) && !$query->execute()) {
                    throw new Exception("Data Fetch Failed!");
                } else if(!$query->execute($data)){
                    throw new Exception("Data Fetch Failed!");
                }
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
?>