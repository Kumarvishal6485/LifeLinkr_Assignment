<?php 
    if (!isset($_GET['id'])) {
        header("Location:index.php");
    }
    include_once "db/connection.php";
    include_once "db/query.php";
    include_once "backend/validation.php";
    include_once "components/header.php";
    include_once "components/navbar.php";
    if (isset($_GET['id'])) {
        $statement = "SELECT * FROM students WHERE id = ?";
        $id = $_GET['id'];
        $data = queryExecute($statement, [$id], $conn);
    }
    if (isset($validation) && !count($validation)) {
        header("Location:backend/edit.php?$dataStr");
    }
?>
<body>
    <fieldset>
        <legend>
            <h2>Edit Student Details</h2>
        </legend>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <td>
                    <input type="hidden" name="sid" value="<?php echo (isset($_POST['sid'])) ? $_POST['sid'] : $data[0]['id'];?>">
                </td>
            </tr>
            <tr>
                <td><input type="text" name="name" placeholder="Enter Student Name" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : $data[0]['name'];?>"></td>
                <?php 
                    if (isset($validation) && isset($validation['name'])) {
                        ?>
                            <td>
                                <span class="validation"><?php echo $validation['name'];?></span>
                            </td>
                        <?php 
                    }
                ?>
            </tr>
            <tr>
                <td><input type="tel" name="phone" placeholder="Enter Phone Number" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : $data[0]['phone'];?>"></td>
                <?php 
                    if (isset($validation) && isset($validation['phone'])) {
                        ?>
                            <td>
                                <span class="validation"><?php echo $validation['phone'];?></span>
                            </td>
                        <?php 
                    }
                ?>
            </tr>
            <tr>
                <td><input type="text" name="email" placeholder="Enter Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $data[0]['email'];?>"></td>
                <?php 
                    if (isset($validation) && isset($validation['email'])) {
                        ?>
                            <td>
                                <span class="validation"><?php echo $validation['email'];?></span>
                            </td>
                        <?php 
                    }
                ?>
            </tr>
            <tr>
                <td><input type="text" name="course" placeholder="Course" value="<?php echo (isset($_POST['course'])) ? $_POST['course'] : $data[0]['course'];?>"></td>
                <?php 
                    if (isset($validation) && isset($validation['course'])) {
                        ?>
                            <td>
                                <span class="validation"><?php echo $validation['course'];?></span>
                            </td>
                        <?php 
                    }
                ?>
            </tr>
            <tr>
                <td><center><input type="Submit" name="submit" value="Submit"></center></td>
            </tr>
        </table>
    </form>
    </fieldset>
</body>
</html>