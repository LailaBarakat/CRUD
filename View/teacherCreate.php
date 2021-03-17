<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Add New Teacher</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>


<form method="post" id="create-teacher">

    <input type="hidden" name="id" value="" />

    <label for="first_name">First name:</label>
    <input type="text" name="first_name" id="first_name" required value=""/>

    <label for="last_name">Last name:</label>
    <input type="text" name="last_name" id="last_name" required value=""/>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value=""/>

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