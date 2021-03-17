<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Students</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>

<!--students table-->
<table class="table table-striped table-wide">
    <thead>
    <tr>
        <th width="20%">Location</th>
        <th width="20%">Name</th>
        <th width="20%">Teacher ID</th>
        <td colspan="2" width="20%"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($classes AS $class):?>
        <tr>
            <td><?php echo htmlspecialchars($class->getlocation())?></td>
            <td><?php echo htmlspecialchars($class->getname())?></td>
            <td><?php echo htmlspecialchars($class->getteacherid())?></td>
            <td>
                <a href="?id=<?php echo $class->getid()?>" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $class->getid()?>" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
            <td>
                <input type="submit" name="Info" value="info" class="btn btn-success">
            </td>
        </tr>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

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

<?php require "includes/footer.php"?>
