<?php
    //including the header component
    include_once "components/header.php";
    
    //including the validation file
    include_once "backend/validation.php";

    /**
     * if all fiels are validated and are as expected then proceed to addNew Student Data
     * into the DB
     */
    if (isset($validation) && !count($validation)) {
        header("Location:backend/addNew.php?$dataStr");
    }
?>
<body>
    <fieldset>
        <legend>
            <h2>Add New Student</h2>
        </legend>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
            <tr>
                <!-- assign the previous name value if exist, so the user don't have fill form after every refresh , after validation -->
                <td><input type="text" name="name" placeholder="Enter Student Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"></td>
                <?php 
                    /**
                     * check for name validation message if exist then print it
                     */
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
                <!-- assign the previous phone value if exist, so the user don't have fill form after every refresh , after validation -->
                <td><input type="tel" name="phone" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>"></td>
                <?php 
                    /**
                     * check for phone validation message if exist then print it
                     */
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
                <!-- assign the previous email value if exist, so the user don't have fill form after every refresh , after validation -->
                <td><input type="text" name="email" placeholder="Enter Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"></td>
                <?php 
                    /**
                     * check for email validation message if exist then print it
                     */
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
                <!-- assign the previous course value if exist, so the user don't have fill form after every refresh , after validation -->
                <td><input type="text" name="course" placeholder="Course" value="<?php if(isset($_POST['course'])) echo $_POST['course'];?>"></td>
                <?php 
                    /**
                     * check for course validation if exist then print it
                     */
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