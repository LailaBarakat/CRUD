<?php
require "includes/header.php"
?>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>


<form method="post" id="create-user">
    <div class="form-group container">
        <input class="form-control" type="hidden" name="id" value="<?php echo $teacher->getid(); ?>" />

        <label class="form-label" for="first_name">First name:</label>
        <input class="form-control" type="text" name="first_name" id="first_name" required value="<?php echo $teacher->getfirst_name(); ?>"/>

        <label class="form-label" for="last_name">Last name:</label>
        <input class="form-control" type="text" name="last_name" id="last_name" required value="<?php echo $teacher->getlast_name(); ?>"/>

        <label class="form-label" for="email">Email:</label>
        <input class="form-control" type="text" name="email" id="email" value="<?php echo $teacher->getemail(); ?>"/>

        <input class="btn btn-primary mt-3" type="submit" value="Update Teacher" />
    </div>

</form>

<?php require "includes/footer.php" ?>

<!--<style>-->
<!--    label {-->
<!--        cursor: pointer;-->
<!--    }-->
<!--    label {-->
<!--        display: block;-->
<!--    }-->
<!--    form#create-user {-->
<!--        margin-left: 10px;-->
<!--    }-->
<!--</style>-->

</body>
</html>
