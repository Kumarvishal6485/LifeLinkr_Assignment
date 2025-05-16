<?php
    include_once "connection.php";

    /** 
     * @return true in case of delete and insert query
     * @return data in case of update and fetch query
     */
    function queryExecute($statement, $data, $conn)
    {
        try {
            $query = $conn->prepare($statement);
            // block for the delete and insert query
            if (count($data) && !isset($_GET['search']) && !isset($_GET['id'])) {
                if (!$query->execute($data)) {
                    throw new Exception("Data Submission Failed!");
                }
                return true;
            } else {
                // block to fetch all data 
                if (!isset($_GET['search']) && !isset($_GET['id']) && !$query->execute()) {
                    throw new Exception("Data Fetch Failed!");
                } else if(!$query->execute($data)){    //block for fetching specific id data or data to be searched
                    throw new Exception("Data Fetch Failed!");
                }
                $data = $query->fetchAll(PDO::FETCH_ASSOC); // return all the data in associative array form
                return $data;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
?>