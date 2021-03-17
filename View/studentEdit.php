<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Edit Student Data</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>


<form method="post" id="create-user">

    <input type="hidden" name="id" value="<?php echo $student->getid(); ?>" />

    <label for="first_name">First name:</label>
    <input type="text" name="first_name" id="first_name" required value="<?php echo $student->getfirst_name(); ?>"/>

    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" id="last_name" required value="<?php echo $student->getlast_name(); ?>"/>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $student->getemail(); ?>"/>

    <label for="class">Class:</label>
    <input type="text" name="class" id="class" value="<?php echo $student->getclassid(); ?>"/>

    <input type="submit" value="Update Student" />

</form>

<?php require "includes/footer.php" ?>

<style>
    label {
        cursor: pointer;
    }
    label {
        display: block;
    }
    form#create-user {
        margin-left: 10px;
    }
</style>

</body>
</html>