<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Add New Class</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>


<form method="post" id="create-user">

    <input type="hidden" name="id" value="" />

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value=""/>

    <label for="location">Location:</label>
    <input type="text" name="location" id="location" required value=""/>

    <label for="teacher">Teacher:</label>
    <select name="teacher" id="teacher">
        <?php foreach ($teachers as $teacher):?>
            <option value="<?php echo $teacher->getid()?>"><?php echo $teacher->getteachername()?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Add to list" />

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