<?php 
    include_once "components/header.php";
    session_start();
?>
    <body>
        <?php
            if (isset($_SESSION['msg'])){
                ?>
                    <section>
                <?php 
                    echo $_SESSION['msg'];    //print the message of the session , let the user know about operation
                    unset($_SESSION['msg']);
                ?>  
                    <a class="button" href="index.php">X</a>
                    </section>
                <?php 
            }
        ?>
        <table>
        <?php
            /**
             * check whether the search query exist or not , if exist then fetch the data according the user's search , else fetch all the data from the db
             */
            if (isset($_GET['search']) && $_GET['search'] != "") {
                $search = "%".$_GET['search']."%";
                $statement = "SELECT * FROM students WHERE `name` LIKE ? OR `course` LIKE ?";
                $data = queryExecute($statement, [$search,$search], $conn); // executes the required query
            } else {
                $statement = "SELECT * FROM students";
                $data = queryExecute($statement,[], $conn); //executes the required query
            }
            $sno = 1;
            if ($data && count($data)) {
                ?>
                    <tr>
                        <td>S.No</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Course</td>
                        <td>Actions</td>
                    </tr>
                <?php 
                foreach ($data as $student) {
                    ?>
                        <tr>
                            <td><?php echo $sno++;?></td>
                            <td><?php echo $student['name'];?></td>
                            <td><?php echo $student['email'];?></td>
                            <td><?php echo $student['phone'];?></td>
                            <td><?php echo $student['course'];?></td>
                            <td><a class="button btn-edit" href="edit.php?id=<?php echo $student['id'];?>">Edit</a>
                            <a class="button btn-delete" href="backend/delete.php?id=<?php echo $student['id'];?>">Delete</a></td>
                        </tr>
                    <?php 
                }
            } else {
              ?>
                <tr><h2>No Student Data Exist!</h2></tr>  
              <?php 
            }
        ?>
    </table>
</body>
</html>