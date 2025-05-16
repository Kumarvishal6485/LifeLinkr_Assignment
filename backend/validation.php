<?php 
    if (isset($_POST['submit'])) {
        $data = $_POST;
        $validation = [];
        $dataStr = "";
        foreach ($data as $key => $value) {
            if (trim($value) == "") {
                $validation[$key] = ucfirst($key)." is Required**";
            } else {
                if ($key == "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $validation[$key] = "Enter a Valid Email";
                } elseif ($key == "phone" && !preg_match("/(\+91){0,1}[0-9]{10}/", $value)) {
                    $validation[$key] = "Enter a Valid Phone Number";
                } elseif (($key == "name" || $key == "course" )&& !preg_match("/[a-zA-Z\s]/",$value)) {
                    $validation[$key] = ($key == "name") ? "Enter a valid Name" : "Enter a valid Course";
                } elseif ($key != "submit") {
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