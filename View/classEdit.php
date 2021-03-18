<?php
require "includes/header.php"
?>

<h1>Edit Class Data</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>

<form method="post" id="create-user">

    <input type="hidden" name="id" value="<?php echo $class->getclassid(); ?>" />

    <label for="first_name">Name:</label>
    <input type="text" name="name" id="name" required value="<?php echo $class->getclassname(); ?>"/>

    <label for="last_name">Location:</label>
    <input type="text" name="location" id="location" required value="<?php echo $class->getclasslocation(); ?>"/>

    <label for="teacher">Teacher:</label>
    <input type="text" name="teacher" id="teacher" value="<?php echo $class->getteacherid(); ?>"/>

    <input type="submit" value="Edit Class" />

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