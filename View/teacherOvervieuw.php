<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Teachers</h1>

<?php if(isset($message)):?>
    <div class="alert alert-success" role="alert">
        <?php echo $message?>
    </div>
<?php endif;?>

<!--students table-->
<table class="table table-striped table-wide">
    <thead>
    <tr>
        <th width="20%">First Name</th>
        <th width="20%">Last Name</th>
        <th width="20%">Email</th>
        <td colspan="2" width="20%"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($teachers AS $teacher):?>
        <tr>
            <td><?php echo htmlspecialchars($teacher->getfirst_name())?></td>
            <td><?php echo htmlspecialchars($teacher->getlast_name())?></td>
            <td><?php echo htmlspecialchars($teacher->getemail())?></td>
            <td>
                <a href="?id=<?php echo $teacher->getid()?>" class="btn btn-primary">Update</a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $teacher->getid()?>" />
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
