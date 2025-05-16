<?php 
    if (isset($_POST['submit'])) {
        $data = $_POST;
        $validation = [];
        $dataStr = "";
        /**
         * check for each input field whether data filled is as expected or not
         */
        foreach ($data as $key => $value) {
            if (trim($value) == "") {           // check for empty data
                $validation[$key] = ucfirst($key)." is Required**";
            } else {
                if ($key == "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {    // email validation
                    $validation[$key] = "Enter a Valid Email";
                } elseif ($key == "phone" && !preg_match("/(\+91){0,1}[0-9]{10}/", $value)) {   // phone validation
                    $validation[$key] = "Enter a Valid Phone Number";
                } elseif (($key == "name" || $key == "course" )&& !preg_match("/[a-zA-Z\s]/",$value)) { // name and course validation
                    $validation[$key] = ($key == "name") ? "Enter a valid Name" : "Enter a valid Course";
                } elseif ($key != "submit") {   // create the query string that will be concatenated to the link , to provide data to the backend
                    if ($dataStr == "") {
                        $dataStr = $key ."=".$value;
                    } else {
                        $dataStr = $dataStr . "&".$key ."=".$value;
                    }
                }
            }
        }
    }
?>