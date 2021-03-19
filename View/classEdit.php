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

    <div class="form-group container container-fluid">
        <input class="form-control" type="hidden" name="id" value="<?php echo $class->getclassid(); ?>" />

        <label class="form-label" for="first_name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" required value="<?php echo $class->getclassname(); ?>"/>

        <label class="form-label"  for="last_name">Location:</label>
        <input class="form-control" type="text" name="location" id="location" required value="<?php echo $class->getclasslocation(); ?>"/>
        <label class="form-label"  for="teacher">Teacher:</label>
        <select name="teacher" id="teacher">
            <?php foreach ($teachers as $teacher): ?>
                <option value="<?php echo $teacher->getid() ?>"><?php echo $teacher->getteachername() ?></option>
            <?php endforeach; ?>
        </select>

        <input  class="btn btn-primary ml-4" type="submit" value="Update Class" />
    </div>
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